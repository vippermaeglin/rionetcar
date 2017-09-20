<?php
  
 if($RetornoPagamento->status_transacao == STATUS_APROVADO){
 
	Util::log($idpartnerplano." - Status aprovado. Preparando para atualizar tabela de anuncios.");
	Util::log($idpartnerplano. " - Verificando a existencia do anuncio...");
	
	/***************************** TRATAMENTO DE SERVICO E CREDITO ****************************************/
	if($RetornoPagamento->pedido_inexistente){
		Util::log($idpartnerplano. " - anuncio nao foi localizado nos registros. Parando retorno.");  
		exit;
	}
	else{
		Util::log($idpartnerplano. " - Anuncio ". $idpartnerplano." encontrado. Verificando status do pagamento.");
	} 
	
	/***************************** INICIO DA ATUALIZACAO DO ANUNCIO NO SITE ****************************************/
	 
	if($RetornoPagamento->status_pedido_site == '' or $RetornoPagamento->status_pedido_site == 'nao' or $republica=="true"){  // se o anuncio estiver com status ja pago porem for uma republicacao, devera proceguir
		Util::log($idpartnerplano. " - Anuncio encontrado com status nao pago. Preparando para atualizar...");
		 
		  if($republica=="true"){
				Util::log($idpartnerplano. " - republicacao retorno automatico.");
				$idanuncio = $idpartnerplano;
				$team = Table::Fetch('team', $idanuncio);

				$idplano =  busca_plano_cliente($team['partner_id']);
				alteradatafim_anuncio($idanuncio,$idplano); 
			  
				$partner_plano_id = get_partner_plano_id($team['partner_id']);
				
				if($partner_plano_id == $team[partner_plano_id]){
				
					$sql =	"update team set contador=contador+1 where id=".$idanuncio;
					$rs =    mysql_query($sql);	
				} 
				atualiza_partner_plano_id($idanuncio,$partner_plano_id); 
				
			//$idpartnerplano = verificarepublicacao($republica,$idpartnerplano);
		 }
		 
	     Util::log($idpartnerplano. " - alterando o periodo do anuncio");
		insere_dados_pagamento($idpartnerplano,$RetornoPagamento->idPedido,$RetornoPagamento->valor_unitario,$RetornoPagamento->partner_id,$idplano,"Sucesso","Retorno Automatico - ".$RetornoPagamento->status_transacao);
	     
		Util::log($idpartnerplano. " - buscando o id da tabela partner_planos para atualizar o status");		 
		//$dias 	= getdiasplano($idplano);
		 
		$sql =	"select id from partner_planos where partner_id=".$RetornoPagamento->partner_id." and plano_id=".$idplano. " order by id DESC limit 1";
		$rs = @mysql_query($sql);
		$row = mysql_fetch_object($rs);
		$idpartnerplano = $row->id;
		
		Util::log($idpartnerplano. " - $sql");
		
		Util::log($idpartnerplano. " - Atualizando a tabela partner_planos com status aprovado para id $idpartnerplano ");
		$valor_unitario = str_replace(",",".",$RetornoPagamento->valor_unitario) ;
		$sql =	"update partner_planos set valor_pago = ".$valor_unitario."', retorno_automatico = '".$RetornoPagamento->status_transacao."', status='aprovado' where id=".$idpartnerplano;
		$rs = @mysql_query($sql);
		if($rs){
			Util::log($idpartnerplano. " - atualizacao partner_planos feita com sucesso");
		}
		else{
			Util::log($idpartnerplano. " - Nao foi possivel atualizar partner_planos $sql ".mysql_error());
		}
		  
		Util::log($idpartnerplano. " - Atualizando a quantidade de anuncios para o plano escolhido... id anunciante: ".$RetornoPagamento->partner_id);
		   	
	    $planos_publicacao = Table::Fetch('planos_publicacao', $idplano); 
		$qtdeanuncio = $planos_publicacao['qtdeanuncio'];
		if(!empty($qtdeanuncio)){ 
		
			if($planos_publicacao['ehdestaque']=="DESTAQUE"){
				$aux = ",ehdestaquebusca='Y'";
			}	 	  
			$sql =	"update team set pago='sim' $aux where id=".$idpartnerplano;
			$rs = @mysql_query($sql);
			if($rs){
				Util::log($idpartnerplano. " - Campo  pago atualizado para sim com sucesso para o anuncio ".$idpartnerplano);
			}
			else{
				Util::log($idpartnerplano. " - Nao foi possivel atualizar o campo  pago. ".mysql_error());
			} 
		}
		else{
			Util::log($idpartnerplano. " - sem atualizaחדo de anuncios no pacote. Quantidade 0,vazia ou nula: $qtdeanuncio");
		}
	
	}
	else if ( $RetornoPagamento->status_pedido_site == 'sim' ) { // pago == sim
		Util::log($idpartnerplano. " - Anuncio ja estava com status de pago no banco de dados. saindo...");
	}
	 
	Utility::Redirect( WEB_ROOT );	
} 
	
?>