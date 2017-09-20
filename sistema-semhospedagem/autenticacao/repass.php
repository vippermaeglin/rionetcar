<?php

require_once(dirname(dirname(__FILE__)) . '/app.php');

$user = Table::Fetch('user', strval($_POST['email']), 'email');
if ( $user ) {
	//$user['recode'] = $user['recode'] ? $user['recode'] : md5(json_encode($user));
	//Table::UpdateCache('user', $user['id'], array(
		//'recode' => $user['recode'],
//	));
 
	mail_repass($user);
	//redirect( WEB_ROOT .'/account/repass.php?action=ok');
}
else{
	echo 'Email não localizado no nosso banco de dados';
}
