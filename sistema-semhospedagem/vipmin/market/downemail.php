<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

need_manager();
need_auth('market');
 
 
	$city_id = $_POST['city_id'];
	$source = $_POST['source']; 

	$emails = array(); 
	 
		$rows = DB::LimitQuery('subscribe', array(
					'condition' => array(
						//'city_id' => $city_id,
						),
					'select' => 'email',
					));
		foreach($rows As $one) {
			$emails[] = array('email'=>$one['email']);
		}
	 

	if ( $emails ) {
		$kn = array(
				'email' => 'Email',
				);
		$name = "email_".date('Ymd');
		down_xls($emails, $kn, $name);
	}
	die('Nenhum email encontrado para a(s) cidade(s) escolhida(s)');
 
