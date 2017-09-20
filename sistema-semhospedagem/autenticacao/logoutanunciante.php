<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');
session_start();

ob_get_clean();
if(isset($_SESSION['user_id']) or isset($_SESSION['partner_id'])) {
	unset($_SESSION['user_id']);
	$_SESSION['partner_id']="";
	
	unset($_SESSION['partner_id']);
	ZLogin::NoRemember();
	ZUser::SynLogout();  
	
	if($_SESSION['access_token']!=''){
 
	   unset($_COOKIE['user_id']);
	   unset($_COOKIE['partner_id']);
	 
	  // print_r($_COOKIE);
	  // exit;
		redirect( WEB_ROOT . '/index.php');
	}
	if($fblogouturl!='')
    	redirect($fblogouturl);
	else
	  redirect( WEB_ROOT . '/index.php');

}
 
 
redirect( WEB_ROOT . '/index.php');
