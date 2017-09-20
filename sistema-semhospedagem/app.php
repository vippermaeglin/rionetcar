<?php

require_once(dirname(__FILE__). '/include/application.php');
require_once(dirname(__FILE__). '/include/ini.php');
/* magic_quota_gpc */
$_GET = magic_gpc($_GET);
$_POST = magic_gpc($_POST);
//$_COOKIE = magic_gpc($_COOKIE);

/* process currefer*/
$currefer = uencode(strval($_SERVER['REQUEST_URI']));

/* session,cache,configure,webroot register */
Session::Init();
$INI = ZSystem::GetINI();
/* end */
 
/* biz logic */
$currency = $INI['system']['currency'];
$login_user_id = ZLogin::GetLoginId();
$login_user = Table::Fetch('user', $login_user_id);
$hotcities = option_hotcategory('city', false, true);
$allcities = option_category('city', false, true);

$systeminvitecredit = $INI['system']['invitecredit'] ;

//$city = cookie_city(null);

/* not allow access app.php */
if($_SERVER['SCRIPT_FILENAME']==__FILE__){
	redirect( WEB_ROOT . '/index.php');
}
/* end */
$AJAX = ('XMLHttpRequest' == @$_SERVER['HTTP_X_REQUESTED_WITH']);
if (false==$AJAX) { 
 
	// se nao está na área publica, nao muda o encode
	if(!strpos($_SERVER["REQUEST_URI"],"vipmin") and !strpos($_SERVER["REQUEST_URI"],"lojista")){
		header("Content-Type: text/html; charset=ISO-8859-1"); 
	
	 }
	else{
	 	header("Content-Type: text/html; charset=UTF-8");  
	}

run_cron();

} else {
	header("Cache-Control: no-store, no-cache, must-revalidate");
}

$ROOTPATH 	 = $INI['system']['wwwprefix'];
$PATHSKIN 	 = $ROOTPATH."/skin/padrao";
$ROOTDESIGN  = $ROOTPATH."/app/design/padrao"; 

require_once("util/Util.php");
require_once("templates/assuntos_emails.php");
require_once("util/Layout.php");
require_once("util/BlocosOfertas.php");
require_once("util/Parceiro.php");
require_once("util/Categoria.php");
require_once("util/canvas.php");
require_once "util/PagSeguroLibrary/PagSeguroLibrary.php";
 
$Layout 			= new Layout();
$BlocosOfertas 		= new BlocosOfertas();
$Parceiro 			= new Parceiro();
$Categoria 			= new Categoria();

$codcidade 		=  $_REQUEST['idcidade'];
$acao 			=  $_REQUEST['acao'];
$request_uri 	= 'index';
$idoferta 		= false;

if(isset($codcidade) and  is_numeric($codcidade )){
	setcookie("codcidade",$codcidade, time()+60*60*24*30,"/");
	$city = Table::Fetch('category', $codcidade);
} 
else if(isset($_COOKIE["codcidade"])){ 	

	$city = Table::Fetch('category', $_COOKIE["codcidade"]); 
}
if (!$city) $city = get_city();
if (!$city) $city = array_shift($hotcities);
  
 
?>