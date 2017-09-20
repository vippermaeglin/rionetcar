<?php

/* Arquivo app.php original. */
require_once(dirname(dirname(__FILE__)) . '/app.php');

/*
if(!detectResolution()) {
	header("Location: " . $ROOTPATH);
	exit;
}
*/

/* Arquivo app.php mobile. */
require_once(dirname(__FILE__) . '/app.php');

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
	require_once(DIR_DESIGN_M."/".$_REQUEST["page"].".php");
	exit;
} 
if($idoferta or $INI['option']['redirecionador'] == "Y" ){ 
	require_once(DIR_DESIGN_M."/detalhe_anuncio.php");
}

else if($idartigo){ 
	require_once(DIR_DESIGN_M."/magazine.php");
}
else if($idcategoria){ 
	require_once(DIR_DESIGN_M."/home_magazine_category.php");
}
else if($idprint){ 
	require_once(DIR_DESIGN_M."/home_print_offer.php");
}
else if($INI['option']['paginainicial'] != "" ){ 
	$idpagina  = $INI['option']['paginainicial'];
	require_once(DIR_DESIGN_M."/pagina.php");
}
else{ 
	require_once(DIR_DESIGN_M."/home.php");
}
 
?> 