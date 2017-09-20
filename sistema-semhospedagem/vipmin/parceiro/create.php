<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

need_manager();
need_auth('market');

if ( is_get() && empty($team) ) {
	$team = array();
	$team['id'] = "";
	$team['user_id'] = $login_user_id;
	$team['begin_time'] = strtotime('+0 days');
	$team['begin_time2'] = date('H:i');
	$team['end_time2'] = date('H:i');
	$team['end_time'] = strtotime('+1 days');
	$team['expire_time'] = strtotime('+1 months +1 days');
	$team['min_number'] = 10;
	$team['per_number'] = 1;
	$team['minimo_pessoa'] = 1;
	$team['pre_number'] = 10;
	$team['max_number'] = 1000;
	//$team['market_price'] = 1;
	$team['team_price'] = 1;
	$team['delivery'] = 'coupon';
	$team['address'] = $profile['address'];
	$team['mobile'] = $profile['mobile'];
	$team['fare'] = 5;
	$team['farefree'] = 0;
	$team['bonus'] = abs(intval($INI['system']['invitecredit']));
	$team['conduser'] = $INI['system']['conduser'] ? 'Y' : 'N';
 
	
}

else if ( is_post() ) {

	$_POST['location']="1t";

	$table = new Table('partner', $_POST);
	$table->SetStrip('location', 'other');
	$table->create_time = time();
	$table->user_id = $login_user_id;
	$table->password = ZPartner::GenPassword($table->password);
	$table->tipo =  "parceiro";
	$table->group_id = abs(intval($table->group_id));
	$table->city_id = abs(intval($table->city_id));
	$table->open = (strtoupper($table->open)=='Y') ? 'Y' : 'N';
	$table->display = (strtoupper($table->display)=='Y') ? 'Y' : 'N';
	$table->image = upload_image('upload_image', null, 'parceiro', true);  
 
	$table->insert(array(
		'username', 'user_id', 'city_id', 'title', 'group_id',
		'bank_name', 'bank_user', 'bank_no', 'create_time',
		'location', 'other', 'homepage', 'contact', 'mobile', 'phone',
		'password', 'address', 'open', 'display',
		'image', 'image1', 'image2', 'longlat','chavesms',  'bairro', 'cep', 'estado', 'cidade','numero','descricao','tipo'
	));
	redirect( WEB_ROOT . '/vipmin/parceiro/index.php');
}

include template('manage_partner_create');
