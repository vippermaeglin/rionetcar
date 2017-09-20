<?php

class BlocosOfertas{
  	
	public $ofertadestaqueprincipal;	
	public $nomeurl; 		
	public $descricao; 	
	public $economia; 	
	public $porcentagem; 	
	public $linkoferta; 	
	public $tituloferta; 	
	public $imagemoferta;        
	public $id;			 
	public $detalhe_oferta; 
	public $url_comprar; 
	public $metodo_pagamento; 
	public $bonuslimite;		 
	public $fim_oferta;		 
	public $inicio_oferta;	 
	public $tipo_oferta;		 
	public $obs_pagamento;	 
	public $venda_maxima;		 
	public $minimo_pessoa;	 
	public $minimo_ativar;	 
	public $id_parceiro;		 
	public $preco_comissao;	 
	public $id_categoria;		 
	public $id_cidade;		 
	public $layout;			 
	public $vendidos;			 
	public $preco;			 
	public $processo_compra;			 
	public $preco_antigo;		  
	public $pre_number;		 
	public $per_number;		 
	public $imagemoferta2;
	public $imagemoferta3;
	public $imagemoferta4;
	public $imagemoferta5;
	public $imagemoferta6;
	public $imagemoferta7;
	public $imagemoferta8;	
	public $imagemoferta9;	
	public $tambarraprogresso;	
	public $porcentoarrecadado;	
	public $oferta_ativa;	
	public $titulofertaresumo;	
	public $republicacao;	
	public $pontos;	
	public $pontosgerados;	
	public $mostrarpreco;	
	public $visualizados;	
	public $mostrarseguranca;	
	
	public function getDados($team,$nm_imagem=false){
  
		global $INI, $ROOTPATH, $PATHSKIN;
		
		$this->id 				= $team['id'];
		$this->pontosgerados  	= number_format($team['pontosgerados'],null,"",".") ;
		$this->pontos 		 	= number_format($team['pontos'],null,"",".") ;
		$this->oferta_ativa 	= false; 
		$this->detalhe_oferta	= $team['notice']; 
		$this->visualizados		= $team['visualizados']; 
		$this->republicacao		= $team['republicacao']; 
		$this->mostrarseguranca	 = $team['mostrarseguranca']; 
		$this->metodo_pagamento	= $team['metodo_pagamento']; 
		$this->bonuslimite		= $team['bonuslimite']; 
		$this->mostrarpreco		= $team['mostrarpreco']; 
		$this->fim_oferta		= $team['end_time']; 
		$this->inicio_oferta	= $team['begin_time']; 
		$this->tipo_oferta		= $team['team_type']; 
		$this->obs_pagamento	= $team['detail']; 
		$this->venda_maxima		= $team['max_number'];
		$this->url_comprar		= $team['url_comprar'];
		$this->processo_compra	= $team['processo_compra'];
		$this->minimo_pessoa	= $team['minimo_pessoa'];
		$this->minimo_ativar	= $team['min_number'];
		$this->id_parceiro		= $team['partner_id']; 
		$this->id_categoria		= $team['group_id'];
		$this->id_cidade		= $team['city_id'];
		$this->layout			= $team['layout'];
		$this->vendidos			= $team['now_number'];
		$this->pre_number		= $team['pre_number']; 
		$this->per_number		= $team['per_number']; 
		$this->restante			= $team['max_number'] - $team['now_number'];
		
		$this->verificatipo($team);
	
		$this->nomeurl 			= urlamigavel(tratanome($team['title']));
		$descricao 				= strip_tags(nl2br(utf8_decode($team['summary'])));
		
		if($descricao){
			$descricao.=". ";	
		}
		$this->descricao ="";
		$descricao   =utf8_decode($this->getmaisdescricao($team,$descricao));
	 
		if($team['uf']){
			$descricao  .= " em ".utf8_decode($this->getCidade($team['city_id'])). "-".$team['uf'];
		}
		
		$this->descricao 		= substr($descricao ,0,269)."...";
		$this->linkoferta 		= $this->getLinkOferta($team); 
		$this->tituloferta 		= utf8_decode(buscaTituloAnuncio($team));

		if($this->metodo_pagamento=="dinheiro"){
			$this->titulofertaresumo = utf8_encode(substr(buscaTituloAnuncio($team),0,90) ."...") ;
		}
		else{
			$this->titulofertaresumo =  substr(buscaTituloAnuncio($team),0,90) ."..." ;
		}
		$this->oferta_esgotada	=	false;
		$this->oferta_cancelada	=	false;
		$this->preco_comissao   = 	number_format($team['preco_comissao'],2, ',', '.'); 
		$esgotado 				=	false;
		$end_time 				= 	date('YmdHis', $team['end_time']); 
		$date 					= 	date('YmdHis');
	 
	 	if($team['preco_comissao']!="" and $team['preco_comissao']!="0.00" ){
			$this->precovirtual		= $this->preco_comissao;
		}
		else{
			$this->precovirtual		= $this->preco;
		}
		
		if($this->tipo_oferta == "normal" or $this->tipo_oferta == "cupom"){
			if($team['max_number']!="" and $team['max_number']!=0){
				if((int)$this->vendidos >= (int)$this->venda_maxima){
					$this->oferta_esgotada=true;
				} 
			} 
			if( $end_time < $date ){
				$this->oferta_cancelada=true;
			}
		} 
		if( $end_time  < $date){
				$this->oferta_cancelada=true;
			}
			
		if(!$this->oferta_esgotada and !$this->oferta_cancelada and (int)$this->vendidos >= (int)$this->minimo_ativar){
			$this->oferta_ativa 	= true;
		}
		
		/*
		$this->imagemoferta 	= $PATHSKIN."/images/produto-sem-foto.jpg"; 
		$this->imagemoferta2 	= $PATHSKIN."/images/produto-sem-foto.jpg";  
		$this->imagemoferta3 	= $PATHSKIN."/images/produto-sem-foto.jpg"; 
		$this->imagemoferta4 	= $PATHSKIN."/images/produto-sem-foto.jpg"; 
		$this->imagemoferta5 	= $PATHSKIN."/images/produto-sem-foto.jpg"; 
		$this->imagemoferta6 	= $PATHSKIN."/images/produto-sem-foto.jpg"; 
		$this->imagemoferta7 	= $PATHSKIN."/images/produto-sem-foto.jpg"; 
		$this->imagemoferta8 	= $PATHSKIN."/images/produto-sem-foto.jpg"; 
		$this->imagemoferta9 	= $PATHSKIN."/images/produto-sem-foto.jpg";  
		$this->imagemoferta10 	= $PATHSKIN."/images/produto-sem-foto.jpg"; 
		$this->imagemoferta11 	= $PATHSKIN."/images/produto-sem-foto.jpg"; 		
		
		$this->imagemofertathumb 	= $PATHSKIN."/images/semfotov.jpg"; 
		$this->imagemoferta2thumb 	= $PATHSKIN."/images/semfotov.jpg";
		$this->imagemoferta3thumb 	= $PATHSKIN."/images/semfotov.jpg";
		$this->imagemoferta4thumb 	= $PATHSKIN."/images/semfotov.jpg";
		$this->imagemoferta5thumb 	= $PATHSKIN."/images/semfotov.jpg";
		$this->imagemoferta6thumb 	= $PATHSKIN."/images/semfotov.jpg";
		$this->imagemoferta7thumb 	= $PATHSKIN."/images/semfotov.jpg";
		$this->imagemoferta8thumb 	= $PATHSKIN."/images/semfotov.jpg";
		$this->imagemoferta9thumb 	= $PATHSKIN."/images/semfotov.jpg";
		$this->imagemoferta10thumb 	= $PATHSKIN."/images/semfotov.jpg";
		$this->imagemoferta11thumb 	= $PATHSKIN."/images/semfotov.jpg";
	 
		if($nm_imagem){
		    if($team['image']){
				$this->imagemoferta 	= $INI['system']['wwwprefix']."/media/".substr($team['image'],0,-4)."_".$nm_imagem; 
				$this->imagemofertathumb 	= $INI['system']['wwwprefix']."/media/".substr($team['image'],0,-4)."_popular_mini.jpg";
			}
			if($team['image1']){
				$this->imagemoferta2 	= $INI['system']['wwwprefix']."/media/".substr($team['image1'],0,-4)."_".$nm_imagem;
				$this->imagemoferta2thumb 	= $INI['system']['wwwprefix']."/media/".substr($team['image1'],0,-4)."_popular_mini.jpg";
			}
			if($team['image2']){
				$this->imagemoferta3 	= $INI['system']['wwwprefix']."/media/".substr($team['image2'],0,-4)."_".$nm_imagem;
				$this->imagemoferta3thumb 	= $INI['system']['wwwprefix']."/media/".substr($team['image2'],0,-4)."_popular_mini.jpg";
			}
			if($team['gal_image1']){
				$this->imagemoferta4 	= $INI['system']['wwwprefix']."/media/".substr($team['gal_image1'],0,-4)."_".$nm_imagem;
				$this->imagemoferta4thumb 	= $INI['system']['wwwprefix']."/media/".substr($team['gal_image1'],0,-4)."_popular_mini.jpg";
			}
			if($team['gal_image2']){
				$this->imagemoferta5 	= $INI['system']['wwwprefix']."/media/".substr($team['gal_image2'],0,-4)."_".$nm_imagem;
				$this->imagemoferta5thumb 	= $INI['system']['wwwprefix']."/media/".substr($team['gal_image2'],0,-4)."_popular_mini.jpg";
			}
			if($team['gal_image3']){
				$this->imagemoferta6 	= $INI['system']['wwwprefix']."/media/".substr($team['gal_image3'],0,-4)."_".$nm_imagem;
				$this->imagemoferta6thumb 	= $INI['system']['wwwprefix']."/media/".substr($team['gal_image3'],0,-4)."_popular_mini.jpg";
			}
			if($team['gal_image4']){
				$this->imagemoferta7 	= $INI['system']['wwwprefix']."/media/".substr($team['gal_image4'],0,-4)."_".$nm_imagem;
				$this->imagemoferta7thumb 	= $INI['system']['wwwprefix']."/media/".substr($team['gal_image4'],0,-4)."_popular_mini.jpg";
			}
			if($team['gal_image5']){			
				$this->imagemoferta8 	= $INI['system']['wwwprefix']."/media/".substr($team['gal_image5'],0,-4)."_".$nm_imagem;
				$this->imagemoferta8thumb 	= $INI['system']['wwwprefix']."/media/".substr($team['gal_image5'],0,-4)."_popular_mini.jpg";
			}
			if($team['gal_image6']){
				$this->imagemoferta9 	= $INI['system']['wwwprefix']."/media/".substr($team['gal_image6'],0,-4)."_".$nm_imagem;
				$this->imagemoferta9thumb 	= $INI['system']['wwwprefix']."/media/".substr($team['gal_image6'],0,-4)."_popular_mini.jpg";
			}
			 
			if($team['gal_image7']){			
				$this->imagemoferta10 	= $INI['system']['wwwprefix']."/media/".substr($team['gal_image7'],0,-4)."_".$nm_imagem; 
				$this->imagemoferta10thumb 	= $INI['system']['wwwprefix']."/media/".substr($team['gal_image7'],0,-4)."_popular_mini.jpg";
			} 		
		}
		else{ 
			$this->imagemoferta 	= $INI['system']['wwwprefix']."/media/".$team['image']; 
			$this->imagemoferta2 	= $INI['system']['wwwprefix']."/media/".$team['image1']; 
			$this->imagemoferta3 	= $INI['system']['wwwprefix']."/media/".$team['image2']; 
			$this->imagemoferta4 	= $INI['system']['wwwprefix']."/media/".$team['gal_image1']; 
			$this->imagemoferta5 	= $INI['system']['wwwprefix']."/media/".$team['gal_image2']; 
			$this->imagemoferta6 	= $INI['system']['wwwprefix']."/media/".$team['gal_image3']; 
			$this->imagemoferta7 	= $INI['system']['wwwprefix']."/media/".$team['gal_image4']; 
			$this->imagemoferta8 	= $INI['system']['wwwprefix']."/media/".$team['gal_image5']; 
			$this->imagemoferta9 	= $INI['system']['wwwprefix']."/media/".$team['gal_image6'];  
			$this->imagemoferta10 	= $INI['system']['wwwprefix']."/media/".$team['gal_image9']; 
			$this->imagemoferta11 	= $INI['system']['wwwprefix']."/media/".$team['gal_image10']; 
		}
		*/
		
		$this->imagemoferta 	= ""; 
		$this->imagemoferta2 	= "";  
		$this->imagemoferta3 	= ""; 
		$this->imagemoferta4 	= ""; 
		$this->imagemoferta5 	= ""; 
		$this->imagemoferta6 	= ""; 
		$this->imagemoferta7 	= ""; 
		$this->imagemoferta8 	= ""; 
		$this->imagemoferta9 	= "";  
		$this->imagemoferta10 	= ""; 
		$this->imagemoferta11 	= ""; 		
		
		$this->imagemofertathumb 	= ""; 
		$this->imagemoferta2thumb 	= "";
		$this->imagemoferta3thumb 	= "";
		$this->imagemoferta4thumb 	= "";
		$this->imagemoferta5thumb 	= "";
		$this->imagemoferta6thumb 	= "";
		$this->imagemoferta7thumb 	= "";
		$this->imagemoferta8thumb 	= "";
		$this->imagemoferta9thumb 	= "";
		$this->imagemoferta10thumb 	= "";
		$this->imagemoferta11thumb 	= "";
		
	  $nm_imagem=""; 
	  if($team['image']){
			$this->imagemoferta 	= $INI['system']['wwwprefix']."/media/".$team['image']; 
			$this->imagemofertathumb 	= $INI['system']['wwwprefix']."/media/".substr($team['image'],0,-4)."_destaque.jpg";
		}
		if($team['image1']){
			$this->imagemoferta2 	= $INI['system']['wwwprefix']."/media/".$team['image1'];
			$this->imagemoferta2thumb 	= $INI['system']['wwwprefix']."/media/".substr($team['image1'],0,-4)."_destaque.jpg";
		}
		if($team['image2']){
			$this->imagemoferta3 	= $INI['system']['wwwprefix']."/media/".$team['image2'];
			$this->imagemoferta3thumb 	= $INI['system']['wwwprefix']."/media/".substr($team['image2'],0,-4)."_destaque.jpg";
		}
		if($team['gal_image1']){
			$this->imagemoferta4 	= $INI['system']['wwwprefix']."/media/".$team['gal_image1'];
			$this->imagemoferta4thumb 	= $INI['system']['wwwprefix']."/media/".substr($team['gal_image1'],0,-4)."_destaque.jpg";
		}
		if($team['gal_image2']){
			$this->imagemoferta5 	= $INI['system']['wwwprefix']."/media/".$team['gal_image2'];
			$this->imagemoferta5thumb 	= $INI['system']['wwwprefix']."/media/".substr($team['gal_image2'],0,-4)."_destaque.jpg";
		}
		if($team['gal_image3']){
			$this->imagemoferta6 	= $INI['system']['wwwprefix']."/media/".$team['gal_image3'];
			$this->imagemoferta6thumb 	= $INI['system']['wwwprefix']."/media/".substr($team['gal_image3'],0,-4)."_destaque.jpg";
		}
		if($team['gal_image4']){
			$this->imagemoferta7 	= $INI['system']['wwwprefix']."/media/".$team['gal_image4'];
			$this->imagemoferta7thumb 	= $INI['system']['wwwprefix']."/media/".substr($team['gal_image4'],0,-4)."_destaque.jpg";
		}
		if($team['gal_image5']){			
			$this->imagemoferta8 	= $INI['system']['wwwprefix']."/media/".$team['gal_image5'];
			$this->imagemoferta8thumb 	= $INI['system']['wwwprefix']."/media/".substr($team['gal_image5'],0,-4)."_destaque.jpg";
		}
		if($team['gal_image6']){
			$this->imagemoferta9 	= $INI['system']['wwwprefix']."/media/".$team['gal_image6'];
			$this->imagemoferta9thumb 	= $INI['system']['wwwprefix']."/media/".substr($team['gal_image6'],0,-4)."_destaque.jpg";
		} 
		if($team['gal_image7']){			
			$this->imagemoferta10 	= $INI['system']['wwwprefix']."/media/".$team['gal_image7']; 
			$this->imagemoferta10thumb 	= $INI['system']['wwwprefix']."/media/".substr($team['gal_image7'],0,-4)."_destaque.jpg";
		} 
	}
	
	function getCidade($idcidade){
		
			$sql 	= "select nome,uf from cidades where id = ".$idcidade;
			$rsd 	= mysql_query($sql);
			$row 	= mysql_fetch_object($rsd) ; 
			return $row->nome."-".$row->uf;
					
	}
	
	public function getmaisdescricao($team,$descricao){
		
		$descricao .= "Descrição: ";
		
		if($team['estadoveiculo']){
			$descricao .=  " Veículo ".$team['estadoveiculo'];
		}
		if($team['car_ano']){
			$descricao .=  ", ano ".$team['car_ano'];
		}
		if($team['numero_portas']){
			$descricao .=  ", ".$team['numero_portas']." portas";
		}
		if($team['motor']){
			$descricao .=  ", motor ".$team['motor'];
		}
		if($team['km']){
			$descricao .=  ", ".$team['km']." km rodados";
		}
		if($team['cor']){
			$descricao .=  ", cor ".$team['cor'];
		}	
		if($team['transmissao']){
			$descricao .=  ", transmissão ".$team['transmissao'];
		}
		if($team['combustivel']){
			$descricao .=  ", combustível ".$team['combustivel'];
		}
		if($team['car_tipo'] == "Carro") {
			$descricao .=  "<br /><br /> Carroceria: ". $team['car_carroceria'];
		}
		else if($team['car_tipo'] == "Moto"){
			$descricao .=  "<br /><br /> Estilo: ". $team['moto_estilo'];
		}
		if($team['vea_necessidades']) {
			$descricao .=  "<br /><br /> Necessidades: ". $team['vea_necessidades'];
		}
		 
		$vea_caracter = explode(",",$team['vea_caracter']);
	 
		//print_r($vea_caracter);
			
		$descricao .= "<br /><br />Opcionais e Itens de Série: ";
		if (in_array('vea_arcondicionado',$vea_caracter)){
			$descricao .=  ", ar condicionado";
		}	
		if (in_array('vea_arquente',$vea_caracter)){ 
			$descricao .=  ", ar quente";
		}
		if (in_array('vea_bancosdecouro',$vea_caracter)){ 
			$descricao .=  ", banco de couro";
		}	
		if (in_array('vea_direcaohidraulica',$vea_caracter)){ 
			$descricao .=  ", direção hidráulica";
		}	
		if (in_array('vea_espelhoseletricos',$vea_caracter)){ 
			$descricao .=  ", espelhos elétricos";
		}
		if (in_array('vea_limpadortraseiro',$vea_caracter)){ 
			$descricao .=  ", limpador traseiro";
		}
		if (in_array('vea_travacentral',$vea_caracter)){ 
			$descricao .=  ", trava central";
		}
		if (in_array('vea_travaeletrica',$vea_caracter)){ 
			$descricao .=  ", trava elétrica";
		}
		if (in_array('vea_travamentoportas',$vea_caracter)){ 
			$descricao .=  ", travamento de portas";
		}		
		if (in_array('vea_computadordebordo',$vea_caracter)){ 
			$descricao .=  ", computador de bordo";
		}
		if (in_array('vea_desembacadortraseiro',$vea_caracter)){ 
			$descricao .=  ", desembaçador trazeiro";
		}
		if (in_array('vea_pilotoautomatico',$vea_caracter)){ 
			$descricao .=  ", piloto automático";
		}
		if (in_array('vea_radioamfm',$vea_caracter)){ 
			$descricao .=  ", rádio AM/FM";
		}
		if (in_array('vea_rodasdeligaleve',$vea_caracter)){ 
			$descricao .=  ", rodas de liga leve";
		}	
		if (in_array('vea_vidroeletrico',$vea_caracter)){ 
			$descricao .=  ", vidro elétrico";
		}
		if (in_array('vea_airbagmotorista',$vea_caracter)){ 
			$descricao .=  ", airbag motorista";
		}	
		if (in_array('vea_airbags',$vea_caracter)){ 
			$descricao .=  ", airbags";
		}
		if (in_array('vea_alarmedistancia',$vea_caracter)){ 
			$descricao .=  ", alarme a distância";
		}
		if (in_array('vea_blindagem',$vea_caracter)){ 
			$descricao .=  ", blindado";
		}	
		if (in_array('vea_faroldeneblina',$vea_caracter)){ 
			$descricao .=  ", farol de neblina";
		}
		if (in_array('vea_freiosabs',$vea_caracter)){ 
			$descricao .=  ", freios abs";
		}
		if (in_array('vea_insulfilme',$vea_caracter)){ 
			$descricao .=  ", insulfilme";
		}
		if (in_array('vea_insulfilmeblindado',$vea_caracter)){ 
			$descricao .=  ", insulfilme blindado";
		}
		if (in_array('vea_pneureserva0km',$vea_caracter)){ 
			$descricao .=  ", pneu reserva 0km";
		}	
		if (in_array('vea_tocafitas',$vea_caracter)){ 
			$descricao .=  ", toca fitas";
		}
		if (in_array('vea_vidrosverdes',$vea_caracter)){ 
			$descricao .=  ", vidros verdes";
		}
		if (in_array('vea_vidrosverdes',$vea_caracter)){ 
			$descricao .=  ", vidros verdes";
		}	
		if (in_array('vea_cdplayer',$vea_caracter)){ 
			$descricao .=  ", cd player";
		}
		if (in_array('vea_cdplayermp3',$vea_caracter)){ 
			$descricao .=  ", cd player e mp3";
		}
		if (in_array('vea_disqueteira',$vea_caracter)){ 
			$descricao .=  ", disqueteira";
		}	
		if (in_array('vea_dvd',$vea_caracter)){ 
			$descricao .=  ", dvd";
		}
		if (in_array('vea_protetordemotorecarter',$vea_caracter)){ 
			$descricao .=  ", protetor de motor e carter";
		}
		if (in_array('vea_tetosolar',$vea_caracter)){ 
			$descricao .=  ", teto solar";
		}
		if (in_array('vea_alarme',$vea_caracter)){ 
			$descricao .=  ", alarme";
		}	
		if (in_array('vea_alforge',$vea_caracter)){ 
			$descricao .=  ", alforge";
		}
		if (in_array('vea_amortecedor',$vea_caracter)){ 
			$descricao .=  ", amortecedor de direção";
		}	
		if (in_array('vea_bagageiro',$vea_caracter)){ 
			$descricao .=  ", bagageiro";
		}
		if (in_array('vea_bau',$vea_caracter)){ 
			$descricao .=  ", baú";
		}	
		if (in_array('vea_bolha',$vea_caracter)){ 
			$descricao .=  ", bolha";
		}
		if (in_array('vea_carenagem',$vea_caracter)){ 
			$descricao .=  ", carenagem";
		}	
		if (in_array('vea_escapamento',$vea_caracter)){ 
			$descricao .=  ", escapamento esportivo";
		}
		if (in_array('vea_milha',$vea_caracter)){ 
			$descricao .=  ", farol de milha";
		}
		if (in_array('vea_guidaoalum',$vea_caracter)){ 
			$descricao .=  ", guidão de alumínio";
		}
		if (in_array('vea_injecao',$vea_caracter)){ 
			$descricao .=  ", injeção eletrônica";
		}
		if (in_array('vea_mata',$vea_caracter)){ 
			$descricao .=  ", mata cachorro";
		}	
		if (in_array('vea_partida',$vea_caracter)){ 
			$descricao .=  ", partida elétrica";
		}
		if (in_array('vea_pneuesp',$vea_caracter)){ 
			$descricao .=  ", pneu especial";
		}
		if (in_array('vea_rodas',$vea_caracter)){ 
			$descricao .=  ", rodas de liga leve";
		}	
		if (in_array('vea_travas',$vea_caracter)){ 
			$descricao .=  ", travas";
		}	
		if (in_array('vea_ctrlvolante',$vea_caracter)){ 
			$descricao .=  ", Controles no volante";
		}
		if (in_array('vea_altbancomanual',$vea_caracter)){ 
			$descricao .=  ", Controle manual de altura do banco ";
		}
		if (in_array('vea_altbancoauto',$vea_caracter)){ 
			$descricao .=  ", Controle eletrônico de altura do banco";
		}
		if (in_array('vea_altvolante',$vea_caracter)){ 
			$descricao .=  ", Controle de altura do volante";
		}
		if (in_array('vea_distvolante',$vea_caracter)){ 
			$descricao .=  ", Controle de distância do volante";
		}
		if (in_array('vea_camerare',$vea_caracter)){ 
			$descricao .=  ", Câmera de ré";
		}
		if (in_array('vea_multimidia',$vea_caracter)){ 
			$descricao .=  ", Multimídia";
		}
		if (in_array('vea_sersortraseira',$vea_caracter)){ 
			$descricao .=  ", Sensor traseiro de proximidade";
		}
		if (in_array('vea_sensordianteira',$vea_caracter)){ 
			$descricao .=  ", Sensor dianteiro de proximidade";
		}
		
		//$descricao =  utf8_decode($descricao);
		return $descricao;
	}
	public function verificatipo($team){
	  
			 if($this->tipo_oferta =="pacote"){
			 
				// busca a oferta filha com valor mais barato para substituir no detalhe da oferta pacote
				$sql 	= "select id,team_price,market_price from team where idpacote = ".$team['id']."  and begin_time < '".time()."' and end_time > '".time()."' and now_number < max_number order by team_price asc limit 1 ";
				$rsd 	= mysql_query($sql);
				$row 	= mysql_fetch_assoc($rsd) ; 
			 
				if(mysql_num_rows($rsd)>0){
					$this->preco			= number_format($row['team_price'], 2, ',', '.'); 
					$this->preco_antigo		= number_format($row['market_price'], 2, ',', '.');  
					$this->economia 		= number_format($row['market_price'] - $row['team_price'],2, ',', '.'); 
					$this->porcentagem 		= round(100 - $row['team_price']/$row['market_price']*100,0);
				}
				else{
					$sql 	= "select id,team_price,market_price from team where idpacote = ".$team['id']."  order by team_price asc limit 1 ";
					$rsd 	= mysql_query($sql);
					$row 	= mysql_fetch_assoc($rsd) ; 
					
					$this->preco			= number_format($row['team_price'], 2, ',', '.'); 
					$this->preco_antigo		= number_format($row['market_price'], 2, ',', '.');  
					$this->economia 		= number_format($row['market_price'] - $row['team_price'],2, ',', '.'); 
					$this->porcentagem 		= round(100 - $row['team_price']/$row['market_price']*100,0);
				}
			}
			else{
				$this->preco			= number_format($team['team_price'], 2, ',', '.'); 
				$this->preco_antigo		= number_format($team['market_price'], 2, ',', '.');  
				$this->economia 		= number_format($team['market_price'] - $team['team_price'],2, ',', '.'); 
				$this->porcentagem 		= round(100 - $team['team_price']/$team['market_price']*100,0);	
			}
	}
	
	public function ofertas_destaques(){ 
	  
		global $city,$PATHSKIN;
		
		$order = " order by `sort_order` DESC, `id` DESC ";
		if( $INI['option']['ofertasdestaquerand'] == "Y"){
			$order =  "order by rand()";
		} 
	  
		$sql 		 = "select * from team where id <> ".$this->ofertadestaqueprincipal." and  posicionamento = 1 and city_id in(".$city['id'].",0 )  and begin_time < '".time()."' and end_time > '".time()."' and now_number < max_number $order ";
		$rsd 		 = mysql_query($sql);
		
		while ($team = mysql_fetch_assoc($rsd)) {
		
			$this->getDados($team);
			include(DIR_BLOCO."/bloco_oferta_meio_home.php");
			
		 }  
	}
	public function ofertas_destaques_website_produtoafiliado(){ 
	    global $PATHSKIN;
		
		$order = " order by `sort_order` DESC, `id` DESC ";
		if( $INI['option']['ofertasdestaquerand'] == "Y"){
			$order =  "order by rand()";
		} 
	  
		$sql 		 = "select * from produtos_afiliados where id <> ".$this->ofertadestaqueprincipal." and posicionamento = 1 and  begin_time < '".time()."' and end_time > '".time()."'  $order ";
		$rsd 		 = mysql_query($sql);
		
		while ($team = mysql_fetch_assoc($rsd)) {
		
			$this->getDados($team);
			include(DIR_BLOCO."/bloco_oferta_meio_home.php");
			
		 }
	}
	
	public function getLinkOferta($team){ 
	     global $INI;
		 
		 $destino =  "produto";
		 
	    return $INI['system']['wwwprefix']."/".$destino."/". $team['id']."/".urlamigavel( tratanome(buscaTituloAnuncio($team)));
	}	
	
	public function getComissao($team){ 
	       
		if($team){
			if($team['preco_comissao'] != "" and $team['preco_comissao'] != "0" and $team['preco_comissao'] != "0.00"){
				$comissao = true;
				return number_format($team['preco_comissao'], 2, ',', '.');
			}
		}
		return false;
	}	
	 
	public function ofertas_recentes($start,$per_page,$idofertadetalhe=false){ 
	    global  $city,$PATHSKIN,$INI,$ROOTPATH;
		 
		 $this->getOfertaDestaqueHome();
		 
		if($_REQUEST["idcategoria"]){
			$sqlcat =  " and group_id = ".$_REQUEST["idcategoria"];
		}
		if($idofertadetalhe){
			$sqlcat .=" and id <> ".$idofertadetalhe;
		}
				
		if(!(empty($_REQUEST['cidade']))) {
			$condition .= " and city_id = " . $_REQUEST['cidade'] .  " ";
		}	
		
		if(!(empty($_REQUEST['estado']))) {
			$condition .= " and uf = '" . $_REQUEST['estado'] . "' ";
		}
	 
		$sql 		= "select * from user u where (u.tipoanunciante = 'Revenda' or u.tipoanunciante = 'Concessionaria') and u.id in ( select t.partner_id from team t where t.partner_id = u.id and  begin_time < '".time()."' and end_time > '".time()."' and ( status is null or status = 1 ) and ( pago = 'sim' or anunciogratis = 's' ) " . $condition . " ) order by id DESC limit $start,$per_page";
		$rsd 		= mysql_query($sql);
		  
		while ($partner = mysql_fetch_assoc($rsd))
		{ 
			 include(DIR_BLOCO."/lista_revendas.php"); 
			 
		}
		return $temoferta;
	}

 
	
	public function produtoafiliado_categoria($start,$per_page){ 
	
	    global  $city,$PATHSKIN,$INI,$ROOTPATH;
		 
		$sql 		= "select * from produtos_afiliados where posicionamento <> 5 and begin_time < '".time()."' and group_id = ".$_REQUEST['idcategoria']." order by `begin_time` DESC , `now_number` DESC limit $start,$per_page ";
		$rsd 		= mysql_query($sql);
		   
		while ($value = mysql_fetch_assoc($rsd))
		{ 
			$temoferta = true;
			$this->getDados($value,"recentes_mod2.jpg");
			include(DIR_BLOCO."/bloco_recentes.php"); 
			 
		}
		return $temoferta;
	}	
	
	public function ofertas_categoria($start,$per_page){ 
	
	    global  $city,$PATHSKIN,$INI,$ROOTPATH ;
		 
		$sql 		= "select * from team where  begin_time < '".time()."' and group_id = ".$_REQUEST['idcategoria']." order by `begin_time` DESC  limit $start,$per_page ";
		$rsd 		= mysql_query($sql);
		if(!$rsd){
				echo mysql_error();
				exit;
		}
		
		while ($value = mysql_fetch_assoc($rsd))
		{ 
			$temoferta = true;
			$this->getDados($value,"recentes_mod2.jpg");
			 
			require DIR_BLOCO."/bloco_recentes.php"; 
			 
		}
		return $temoferta;
	}		

	
	public function tem_outras_ofertas(){ 
	
		global $city,$id_ofertas_destaque, $idoferta,$id_oferta_destaque,$idcidade,$horaatual;
 
		if($this->ofertadestaqueprincipal != ""){
			$sqlaux = " and id not in (".$this->ofertadestaqueprincipal.")";
		} 
		if($id_oferta_destaque!= ""){ // oferta destaque
			$sqlaux .= " and id not in ($id_oferta_destaque)";
		} 
		if($id_ofertas_destaque!= ""){ // multi ofertas destaques
			$sqlaux.= " and id not in ($id_ofertas_destaque)";
		} 
		$sql   = "select id from team where  city_id in(".$city['id'].",0 ) and posicionamento=4 and  begin_time < '".time()."' and end_time > '".time()."' $sqlaux order by `sort_order` DESC, `id` DESC LIMIT 1";
		$maisofertas  	= mysql_query($sql);
		if(mysql_num_rows($maisofertas) > 0){
			return true;
		}
		else{
			return false;
		}
	}	
	
	public function tem_ofertas_cidade(){ 
	
		global $city ;

		$posicao = "3,4,1,5";
 
		if($this->ofertadestaqueprincipal != ""){
		//	$sqlaux = " and id not in (".$this->ofertadestaqueprincipal.")";
		} 
		if($id_oferta_destaque!= ""){ // oferta destaque
		//	$sqlaux .= " and id not in ($id_oferta_destaque)";
		} 
		if($id_ofertas_destaque!= ""){ // multi ofertas destaques
			//$sqlaux.= " and id not in ($id_ofertas_destaque)";
		} 
	    $sql   = " select id from team where city_id in(".$city['id'].",0 )   and begin_time < '".time()."' and end_time > '".time()."' $sqlaux  limit 1 ";
		$maisofertas  	= mysql_query($sql);
		if(mysql_num_rows($maisofertas) > 0){
			return true;
		}
		else{
			return false;
		}
	}
	public function tem_ofertas_anunciante($idanunciante){ 
	  
		$sql   = " select id from produtos_afiliados where partner_id=$idanunciante and  begin_time < '".time()."' and end_time > '".time()."' and posicionamento <> 5 order by `sort_order` DESC, `id` DESC  limit 1 ";
		$maisofertas  	= mysql_query($sql);
		if(mysql_num_rows($maisofertas) > 0){
			return true;
		}
		else{
			return false;
		}
	}
	
	public function tem_ofertas_parceiro_posicao($posicao){ 
	
		global $city,$id_oferta_destaque,$idoferta ;
  
		if($this->ofertadestaqueprincipal != ""){
			$sqlaux = " and id not in (".$this->ofertadestaqueprincipal.")";
		} 
		if($id_oferta_destaque!= ""){ // oferta destaque
			$sqlaux .= " and id not in ($id_oferta_destaque)";
		} 
		if($id_ofertas_destaque!= ""){ // multi ofertas destaques
			$sqlaux.= " and id not in ($id_ofertas_destaque)";
		} 
	    $sql   = "select id from team where city_id in(".$city['id'].",0 ) and posicionamento in($posicao) and begin_time < '".time()."' and end_time > '".time()."' $sqlaux order by `sort_order` DESC, `id` DESC limit 1";
		$maisofertas  	= mysql_query($sql);
		if(mysql_num_rows($maisofertas) > 0){
			return true;
		}
		else{
			return false;
		}
	}
	
	public function tem_ofertas_afiliado_posicao($posicao){ 
	
		global $city,$id_oferta_destaque,$idoferta ;
  
		if($this->ofertadestaqueprincipal != ""){
			$sqlaux = " and id not in (".$this->ofertadestaqueprincipal.")";
		} 
		if($id_oferta_destaque!= ""){ // oferta destaque
			$sqlaux .= " and id not in ($id_oferta_destaque)";
		} 
		if($id_ofertas_destaque!= ""){ // multi ofertas destaques
			$sqlaux.= " and id not in ($id_ofertas_destaque)";
		} 
		$sql   = "select id from produtos_afiliados where  posicionamento in($posicao) and begin_time < '".time()."' and end_time > '".time()."' $sqlaux order by `sort_order` DESC, `id` DESC limit 1";
		$maisofertas  	= mysql_query($sql);
		if(mysql_num_rows($maisofertas) > 0){
			return true;
		}
		else{
			return false;
		}
	}
  
	public function blocos_website_produtosafiliados($posicao){ 
	
		global $idoferta,$city,$PATHSKIN,$INI;
	 
		if($this->ofertadestaqueprincipal != ""){
			$sqlaux = " and id not in (".$this->ofertadestaqueprincipal.")";
		} 
		$sql  			= "select * from produtos_afiliados where posicionamento in($posicao) and begin_time < '".time()."' and end_time > '".time()."' $sqlaux order by `sort_order` DESC, `id` DESC ";
		$result  		= mysql_query($sql);	

		while ($value = mysql_fetch_assoc($result)){ 

			$botao = "btn-quero.png";
			if($value['team_type']=="off"){
				$botao = "bt_imprimir_cupom.png";
			}
			else if($value['team_type']=="cupom"){
				$botao = "comprar_cupom.png";
			} 
			 $this->getDados($value,"lateral.jpg"); 
			 include(DIR_BLOCO."/bloco_oferta.php"); 
		}
	}
	
	public function coluna_direita($posicao){ 
	
		global $idoferta,$city,$PATHSKIN,$INI;

		if($this->ofertadestaqueprincipal != ""){
			$sqlaux = " and id not in (".$this->ofertadestaqueprincipal.")";
		} 
		 
		$order = " order by `sort_order` DESC, `id` DESC ";
		if( $INI['option']['rand_direita'] == "Y"){
			$order =  "order by rand()";
		}
		if( $INI['option']['ofertas_finalizadas_direita'] == "N"){
			$condicao =  " and end_time > '".time()."'";
		} 

	     $sql  			= "select * from team where posicionamento in($posicao)  and city_id in(0,".$city['id']." )  and begin_time < '".time()."' $sqlaux  $condicao $order ";
		$result  		= mysql_query($sql);	

		while ($value = mysql_fetch_assoc($result)){ 
    
			if( !strpos($_SERVER["QUERY_STRING"],"IDOFERTASDESTAQUE")){
			 }
			$botao = "btn-quero.png";
			if($value['team_type']=="off"){
				$botao = "bt_imprimir_cupom.png";
			}
			else if($value['team_type']=="cupom"){
				$botao = "comprar_cupom.png";
			} 
			
			if($posicao=="10"){
				$this->getDados($value,"lateral_nacional.jpg"); 
				include(DIR_BLOCO."/bloco_oferta_nacional.php");  
			}
			else{
				$this->getDados($value,"lateral.jpg"); 
				include(DIR_BLOCO."/bloco_oferta_direita.php"); 
			}
		}
	}
	
	public function blocos($posicao){ 
	
		global $idoferta,$city,$PATHSKIN,$INI;

		if($this->ofertadestaqueprincipal != ""){ 
			$sqlaux = " and id not in (".$this->ofertadestaqueprincipal.")";
		} 
		else if($idoferta != ""){ 
			$sqlaux = " and id not in (".$idoferta.")";
		} 
		if($sqlaux==""){
			$posicao = "4";
		}
	    $sql  			= "select * from team where posicionamento in($posicao)  and city_id in(0,".$city['id']." )  and begin_time < '".time()."' and end_time > '".time()."' $sqlaux order by `sort_order` DESC, `id` DESC ";
		$result  		= mysql_query($sql);	
 
		while ($value = mysql_fetch_assoc($result)){ 
    
			if( !strpos($_SERVER["QUERY_STRING"],"IDOFERTASDESTAQUE")){
			 }
		 
			 $this->getDados($value,"lateral.jpg"); 
			 include(DIR_BLOCO."/bloco_oferta.php"); 
		}
	}
	
	public function getBlocoPrincipal($idoferta){ 
		global $PATHSKIN,$login_user_id,$INI,$ROOTPATH,$team,$city;
		require_once(DIR_BLOCO."/bloco_home.php");
		 
	}		
	
	public function getBlocoDetalheProduto($idoferta,$tipo=null){ 
		global $PATHSKIN,$login_user_id,$INI,$ROOTPATH,$team,$login_user;
		
		$partner   = Table::Fetch('partner',$team['partner_id']);
		
		if($tipo=="especial"){
			require_once(DIR_BLOCO."/detalhe_produto_especial.php");
		}
		else{
			require_once(DIR_BLOCO."/detalhe_produto.php"); 
		}
	}		
	
	public function getBlocoDireita(){ 
		global $PATHSKIN,$login_user_id,$INI,$ROOTPATH,$team;
		include_once(DIR_BLOCO."/coluna_direita.php");
		 
	}	
	 
	public function getOferta($idOferta){ 
	
		$sql  			= "select * from team where team_id = $idOferta ";
		$result  		= mysql_query($sql);
		$team 			= mysql_fetch_assoc($result);

		$nomeurl 	=    urlamigavel( tratanome($value['title'])) ;
		$temoferta	=	true;
		$end_time 	= 	date('YmdHis', $value['end_time']); 
		$date 		= 	date('YmdHis');
		$ofertafechada = false;
		 if( $end_time  < $date){
			$ofertafechada = true;
			 continue;
		  }
		$esgotado =	false;
		if($value['now_number'] >= $value['max_number']){
			$esgotado=true;
		}
		$discount_rate = round(100 - $value['team_price']/$value['market_price']*100,0);
		$summary = substr($value['summary'],0,200)."...";
		
		if($value['now_number'] < $value['min_number']){  
			$min = $value['min_number'] - $value['now_number'] ; 
		}
		$imagem  	=  $value['image'] ; 
		if( !strpos($_SERVER["QUERY_STRING"],"IDOFERTASDESTAQUE")){
			//$value['title'] =  utf8_decode($value['title']);
		 }
		$botao = "btn-quero.png";
		if($value['team_type']=="off"){
			$botao = "bt_imprimir_cupom.png";
		}
		else if($value['team_type']=="cupom"){
			$botao = "comprar_cupom.png";
		}
		 
		$comissao = false;
		if($team['preco_comissao'] != "" and $team['preco_comissao'] != "0" and $team['preco_comissao'] != "0.00"){
			$comissao = true;
			$valoronline = number_format($team['preco_comissao'], 2, ',', '.');
		}
	
		$team['economia'] 		= number_format($team['market_price'] - $team['team_price'],2);
		$team['linkoferta']		= $INI['system']['wwwprefix']."/produto/". $team['id']."/".urlamigavel( tratanome(buscaTituloAnuncio($team))) ;
		$team['tituloferta'] 	= utf8_decode(buscaTituloAnuncio($team)); 
		$team['imagemoferta'] 	= $INI['system']['wwwprefix']."/media/".$team['image']; 
		$team['desconto'] 		= round(100 - $team['team_price']/$team['market_price']*100,0);
		
		return $team;
		  
	} 

	public function getOfertaDestaqueHome($idoferta=false){ 
	
		global $city,$INI,$ROOTPATH;
		$horaatual =  time(); 
		//$aux_imagem= "destaque_op.jpg";
		 
		 $order = " order by `sort_order` DESC, `id` DESC "; 
		 $sql   = "select * from team where posicionamento in(6)  and city_id in(0,".$city['id']." )  and begin_time < '".time()."' and end_time > '".time()."' $order limit 1";
		 $result  		= mysql_query($sql);
		  
		 if($idoferta){ 
		    $aux_imagem= "destaque.jpg";
			$sql  			= "select * from team where id = $idoferta $order limit 1";
			$result  		= mysql_query($sql);
		 }
		 
		if(mysql_num_rows($result) == 0){
			$sql  			= "select * from team where posicionamento <> '5' and city_id in(0,".$city['id']." )  and begin_time < '".time()."' and end_time > '".time()."' $order  limit 1";
			$result  		= mysql_query($sql);
		}
		 
		$team 	= mysql_fetch_assoc($result); 
		
		if($team){
		
			$this->ofertadestaqueprincipal = $team['id'];
			$this->getDados($team,$aux_imagem);
		   
		}
		
		return $team;
	 
	}

}

 
?>