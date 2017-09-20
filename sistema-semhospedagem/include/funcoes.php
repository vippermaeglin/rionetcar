<?php

include "../app.php"; 

if($_REQUEST['acao']=='verifica_regras_pre_compra'){
	$error =  verifica_regras_pre_compra();
	echo trim($error);
}
if($_REQUEST['acao']=='verifica_situacao_plano_atual'){
	$error =  verifica_situacao_plano_atual($_REQUEST['idusuarioplano']);
	echo trim($error);
}
else if($_REQUEST['acao']=='insere_dados_pagamento'){
	insere_dados_pagamento($_REQUEST['team_id'],$_REQUEST['idpedido'],$_REQUEST['valor'],$_REQUEST['partner_id'],$_REQUEST['idplano'],$_REQUEST['status_pagamento'],$_REQUEST['mensagem']);
}
else if($_REQUEST['acao']=='buscaParcelas'){
	buscaParcelas();
}
else if($_REQUEST['acao']=='finalizaanuncio'){
	finalizaanuncio();
}
else if($_REQUEST['acao']=='gravaplano'){
	echo gravaplano($_REQUEST['partner_id'],$_REQUEST['idplano'],"",$_REQUEST['idanuncio'],$_REQUEST['idupgrades']);
}
else if($_REQUEST['acao']=='getfones'){
	getfones($_REQUEST['iduser'],$_REQUEST['partner_id']);
}
else if($_REQUEST['acao']=='preco_especial_revenda'){
	preco_especial_revenda($_REQUEST['team_id']);
}
else if($_REQUEST['acao']=='atualizapagamentoanuncio'){
	atualizapagamentoanuncio();
}
else  if($_REQUEST['acao']=='get_id_pagamento'){
	echo get_id_pagamento(); 
}
else  if($_REQUEST['acao']=='precotabelafipe'){
	echo precotabelafipe($_REQUEST['ano'],$_REQUEST['modelo'],$_REQUEST['tipo']);
}
else  if($_REQUEST['acao']=='frete'){ 
	$qtd =  $_REQUEST['qtd'] ;
	$id =  $_REQUEST['idoferta'] ;
	$team = Table::Fetch('team', $id); 
	$peso = $team['peso'];
	$peso = str_replace(",",".",$peso);
	$pesototal = (int)$qtd  * $peso ;
	
	if( $team['fretegratuito'] == "1"){
		$valor = "0,00";
	}
	else if( $team['valorfrete'] != "" and $team['valorfrete'] != "0,00" ){
		$valor = $team['valorfrete'];
	}
	else{
		$valor = calculaFrete(41106, $team['ceporigem'], $_REQUEST['cep_destino'], $pesototal, $team['altura'], $team['largura'] , $team['comprimento'] , $team['team_price']);
	}
	echo $valor;
}

else  if($_REQUEST['acao']=='pegadata'){ 
	echo date("d/m/Y H:i:s");
}
else  if($_REQUEST['acao']=='participar'){
	$error =  verifica_regras_pre_compra();
	 if(trim($error)==""){
		get_num_pedido('promocional');
		$team = Table::Fetch('team', $_REQUEST['idoferta']);
		$descricao = str_replace("<p>","",$team['retornoparticipe']);
		$descricao = str_replace("</p>","<br>",	$descricao );
		echo  $descricao ;
		
	 }
	 else{
		echo trim($error);
	}
}
?>