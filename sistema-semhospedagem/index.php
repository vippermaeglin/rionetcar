<?php

require_once(dirname(__FILE__) . '/app.php');

if(detectResolution()) {
	if($_REQUEST['page']){
		$endereco = $ROOTPATH . "/mobile/?page=".$_REQUEST['page'];
		header("Location: " . $endereco);
		exit;
	} 
	if($_REQUEST["idoferta"]){
		 
		$endereco = $ROOTPATH . "/mobile/?idoferta=".$_REQUEST["idoferta"];
		header("Location: " . $endereco);
		exit;
	}
	if($_REQUEST["idparceiro"] AND $_REQUEST['busca'] == 'true'){
		$endereco = $ROOTPATH . "/mobile/index.php?busca=true&idparceiro=".$_REQUEST['idparceiro'];
		header("Location: " . $endereco);
		exit;
	}
	else{
		$endereco = $ROOTPATH . "/mobile/index.php";
		header("Location: " . $endereco);
		exit;
	}
}

//RemoveXSS($_REQUEST); 
if($_REQUEST["idpagina"]){
	$idpagina 	= explode("/",$_REQUEST["idpagina"]); // urlrewrite
	$idpagina = $idpagina[0];
 
}
 
if($_REQUEST["idoferta"]){
 
	$idoferta 	= explode("/",$_REQUEST["idoferta"]); // urlrewrite
	$linkaux 	= explode("/",$_REQUEST["idoferta"]); // urlrewrite
	$idoferta	=  $idoferta[0]; 
	 
}

if($_REQUEST["idartigo"]){ 
	$idartigo 	= explode("/",$_REQUEST["idartigo"]); // urlrewrite
	$linkaux 	= explode("/",$_REQUEST["idartigo"]); // urlrewrite
	$idartigo	=  $idartigo[0]; 	

}

if($_REQUEST["idcategoria"]){ 
	$idcategoria = explode("/",$_REQUEST["idcategoria"]); // urlrewrite
	$linkaux     = explode("/",$_REQUEST["idcategoria"]); // urlrewrite
	$idcategoria =  $idcategoria[0]; 
}

if($_REQUEST["idprint"]){ 
	$idprint = explode("/",$_REQUEST["idprint"]); // urlrewrite
	$linkaux     = explode("/",$_REQUEST["idprint"]); // urlrewrite
	$idprint =  $idprint[0]; 
}

if($_REQUEST['login_fb']=="true"){

	mail_cadastro_fb($_REQUEST['user_id']);
			
} 

if($idoferta) {
	$team = $BlocosOfertas->getOfertaDestaqueHome($idoferta);
  
}
if($_REQUEST['page']){
	require_once(DIR_DESIGN."/".$_REQUEST["page"].".php");
	exit;
} 
if($idoferta or $INI['option']['redirecionador'] == "Y" ){ 
	require_once(DIR_DESIGN."/home_detalhe_produto.php");
}

else if($idartigo){ 
	require_once(DIR_DESIGN."/home_magazine_article.php");
}
else if($idcategoria){ 
	require_once(DIR_DESIGN."/home_magazine_category.php");
}
else if($idprint){ 
	require_once(DIR_DESIGN."/home_print_offer.php");
}
else if($INI['option']['paginainicial'] != "" ){ 
	$idpagina  = $INI['option']['paginainicial'];
	require_once(DIR_DESIGN."/pagina.php");
}
else{ 
	require_once(DIR_DESIGN."/home.php");
}

 envia_email_anuncios_finalizados();
 
?>  
<div style="display:none;"><a href="http://www.montarcompracoletiva.com.br">http://www.montarcompracoletiva.com.br</a><a href="http://www.vipcomsistemas.com.br">http://www.vipcomsistemas.com.br</a><a alt="Agrupi Agregador de compra coletiva -  Anuncie suas ofertas no agrupi"  title="Agrupi Agregador de compra coletiva -  Anuncie suas ofertas no agrupi" href="http://www.agrupi.com">http://www.agrupi.com</a><a title="Vipcom script de compra coletiva" title="Vipcom script de compra coletiva" href="http://www.sistemacomprascoletivas.com.br">http://www.sistemacomprascoletivas.com.br</a> vipcom <a href="http://www.sistemaparacompracoletiva.com.br">http://www.sistemaparacompracoletiva.com.br</a> <a href="http://www.criarcompracoletiva.com.br">http://www.criarcompracoletiva.com.br</a> <a href="http://www.compracoletivascript.com">http://www.compracoletivascript.com</a>  vipcom <a href="http://www.criarsitecompracoletiva.com.br">www.criarsitecompracoletiva.com.br</a> <a href="http://www.sistemacompracoletiva.org">http://www.sistemacompracoletiva.org</a>   <a href="http://www.fazerlojavirtual.com">http://www.fazerlojavirtual.com</a> <a href="http://www.lojavirtualgratuita.com">http://www.lojavirtualgratuita.com</a><a href="http://www.sistemaclassificados.com.br">http://www.sistemaclassificados.com.br</a> <a href="http://www.sistemaclassificados.com.br">http://www.sistemaclassificados.com.br</a>   <a href="http://www.scriptdeclassificados.com.br">http://www.scriptdeclassificados.com.br</a>   <a href="http://www.criarsiteclassificados.com.br">http://www.criarsiteclassificados.com.br</a>    <a href="http://www.fazercompracoletiva.com.br">http://www.fazercompracoletiva.com.br</a> <a title="Vipcom script de compra coletiva" title="Vipcom script de compra coletiva" href="http://www.grouponscript.com.br">http://www.grouponscript.com.br</a> vipcom <a href="http://www.fazersiteadulto.com.br">http://www.fazersiteadulto.com.br</a> <a href="http://www.scriptacompanhante.com.br">http://www.scriptacompanhante.com.br</a>  <a href="http://www.grouponclone.net">http://www.grouponclone.net</a> <a href="http://www.grouponclonescript.com">http://www.grouponclonescript.com</a><a href="http://www.scriptgrouponclone.net">http://www.scriptgrouponclone.net</a>  <a href="http://www.fazersiteimobiliaria.com.br">http://www.fazersiteimobiliaria.com.br</a>   <a href="http://www.siteparaimobiliarias.imb.br">http://www.siteparaimobiliarias.imb.br</a> <a href="http://www.fazerclassificados.com.br">http://www.fazerclassificados.com.br</a> <a href="http://www.guiacomercialscript.com.br">http://www.guiacomercialscript.com.br</a> <a href="http://www.fazerguiacomercial.com.br">http://www.fazerguiacomercial.com.br</a> <a href="http://www.criarsiteimobiliaria.com">http://www.criarsiteimobiliaria.com</a>  criarsiteimobiliaria.com </div> 