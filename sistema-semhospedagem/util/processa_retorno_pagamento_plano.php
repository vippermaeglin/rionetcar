<?php
  
 if($RetornoPagamento->status_transacao == STATUS_APROVADO){ 
	Util::log($idpartnerplano. " - Verificando a existencia do plano...");
	
	/***************************** TRATAMENTO DE SERVICO E CREDITO ****************************************/
	$partner_planos 		 	= Table::Fetch('partner_planos',$idpartnerplano);
		
	if($partner_planos['id'] ==""){
		Util::log($idpartnerplano. " - Partner plano nao foi localizado nos registros. Parando retorno.");  
		exit;
	}
	else{
		Util::log($idpartnerplano. " - Partner plano ". $idpartnerplano." encontrado. Verificando status do pagamento.");
	} 
	
	/***************************** INICIO DA ATUALIZACAO DO ANUNCIO NO SITE ****************************************/
	 
	if($partner_planos['status']==""){  
		Util::log($idpartnerplano. " - Plano encontrado com status nao pago. Preparando para atualizar...");
		$idpartnerplano = $partner_planos['id'];
		  
		Util::log($idpartnerplano. " - Atualizando a tabela partner_planos com status aprovado para id $idpartnerplano ");
		//$valor_unitario = number_format( $RetornoPagamento->valor_unitario, 2, ',', '.') ;
		$valor_unitario = str_replace(",",".",$RetornoPagamento->valor_unitario) ;
		$sql =	"update partner_planos set valor_pago = ".$valor_unitario.", retorno_automatico = '".$RetornoPagamento->status_transacao."', status='aprovado' where id=".$idpartnerplano;
		$rs = @mysql_query($sql);
		if($rs){
			Util::log($idpartnerplano. " - atualizacao partner_planos feita com sucesso");
		}
		else{
			Util::log($idpartnerplano. " - Nao foi possivel atualizar partner_planos $sql ".mysql_error());
		}
		 
		// versao premium
			Util::log($idpartnerplano. " - VERIFICANDO ID DE UPGRADE NA REFERENCIA");
		    $referenciarr	 = explode("AREAPUBLICA",$referencia);
			$referencia = $referenciarr['1'];
			
			envia_email_plano_aprovado($idpartnerplano);
			
		if ($referencia !="") { 
			Util::log($idpartnerplano. " - ID UPGRADE LOCALIZADO -->".$referencia);
			
			$idsupgrade = $_POST['Referencia'];
			Util::log($idpartnerplano. " Parametro referencia existe: idsupgrade $idsupgrade");
			
			cadastraupgrade($idsupgrade,$idpartnerplano); 
			 /*
			$idsupgradearray = explode(",",$idsupgrade);
			
			Util::log($idpartnerplano. " - Inserindo os ids do upgrade, itens avulsos para o plano $idpartnerplano ");
			reset($idsupgradearray);
			$data = date("Y-m-d H:i:s");
			while (list($key, $val) = each($idsupgradearray )) {
				 
				$sql =	"insert into planos_upgrade_partner_plano (idupgrade,idpartnerplanos) values ('$val','$idpartnerplano',)";
				$rs = @mysql_query($sql);
				if($rs){
					Util::log($idpartnerplano. " - inclusao de idupgrade $val feita com sucesso");
				}
				else{
					Util::log($idpartnerplano. " - Nao foi possivel a inclusao do idupgrade $valna  planos_upgrade_partner_plano $sql ".mysql_error());
				} 
			} 
			*/
		}    
		else{
			Util::log($idpartnerplano. " - ID UPGRADE VAZIO -->".$referencia);
		}
		//fim versao premium  
	}
	else   { // aprovado == sim
		Util::log($idpartnerplano. " - Partner plano ja estava com status de pago no banco de dados. ". $partner_planos['status'] ." saindo...");
	}
	 
	Utility::Redirect( WEB_ROOT );	
} 
	
?>