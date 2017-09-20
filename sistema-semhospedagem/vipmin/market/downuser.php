<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

	need_manager();
	need_auth('market');
 
	$gender = $_POST['gender'];
	$newbie = $_POST['newbie'];
	$city_id = $_POST['city_id']; 

	$condition = array( 
	);

	$users = DB::LimitQuery('user', array(
		'condition' => $condition,
		'user' => 'ORDER BY id DESC',
	));

	if (!$users) die('-ERR ERR_NO_DATA');

	$name = 'user_'.date('Ymd');
	$kn = array(
		'id' => 'ID',
		'email' => 'Email', 
		'realname' => 'Nome', 
		'mobile' => 'Celular', 
		);

	$gender = array(
		'M' => 'Masculino',
		'F' => 'Feminino',
	);
	$newbie = array(
		'Y' => 'yes',
		'N' => 'no',
	);

	$eusers = array();
	foreach( $users AS $one ) {
		//$one['gender'] = $gender[$one['gender']];
		//$one['newbie'] = $newbie[$one['newbie']];
		$eusers[] = $one;
	}
	down_xls($eusers, $kn, $name); 
