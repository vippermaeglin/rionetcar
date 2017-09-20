<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');
unset($_SESSION['user_id']);  
unset($_SESSION['FB_LOGOUT_URL']);  
unset($_SESSION['access_token']);  
if ( $_POST ) {
	$login_admin = ZUser::GetLogin($_POST['username'], $_POST['password']);
	if ( !$login_admin || $login_admin['manager'] != 'Y' ) {
		Session::Set('error', 'Nome de usuário e senha não conferem!');
		redirect( WEB_ROOT . '/vipmin/login.php');
	} else {
		Session::Set('admin_id', $login_admin['id']);

	ZLogin::Remember($login_admin); 
		ZUser::SynLogin($login_admin['username'], $_POST['password']); 
		ZCredit::Login($login_admin['admin_id']); 


		redirect( WEB_ROOT . '/vipmin/index.php');
	}
}

include template('manage_login');