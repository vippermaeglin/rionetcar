<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');
require_once(dirname(__FILE__) . '/current.php');

need_manager();
need_auth('team');

$id = abs(intval($_GET['id']));
$team = $eteam = Table::Fetch('team', $id);

if ( is_get() && empty($team) ) {
	$team = array();
	$team['id'] = 0;
	$team['user_id'] = $login_user_id;
	$team['begin_time'] = strtotime('+0 days');
	$team['end_time'] = strtotime('+1 days');
	$team['expire_time'] = strtotime('+1 months +1 days');
	$team['min_number'] = 10;
	$team['per_number'] = 1;
	$team['market_price'] = 1;
	$team['team_price'] = 1;
	$team['delivery'] = 'coupon';
	$team['address'] = $profile['address'];
	$team['mobile'] = $profile['mobile'];
	$team['fare'] = 5;
	$team['farefree'] = 0;
	$team['bonus'] = abs(intval($INI['system']['invitecredit']));
	$team['conduser'] = $INI['system']['conduser'] ? 'Y' : 'N';
	$team['buyonce'] = 'Y';
}
else if ( is_post() ) {
	$team = $_POST;
	$insert = array(
		'title', 'market_price', 'team_price', 'end_time',
		'begin_time', 'expire_time', 'min_number', 'max_number',
		'summary', 'notice', 'per_number', 'product',
		'image', 'image1', 'image2', 'flv', 'now_number',
		'gal_image1', 'gal_image2', 'gal_image3', 'gal_image4', 'gal_image5', 'gal_image6',
		'detail', 'userreview', 'card', 'systemreview',
		'conduser', 'buyonce', 'bonus', 'sort_order',
		'delivery', 'mobile', 'address', 'fare',
		'express', 'credit', 'farefree', 'pre_number',
		'user_id', 'city_id', 'group_id', 'partner_id',
		'team_type', 'sort_order', 'farefree', 'state','posicionamento',
		'condbuy',
		);

	$team['user_id'] = $login_user_id;
	$team['state'] = 'none';
	$team['begin_time'] = strtotime($team['begin_time']);
	$team['city_id'] = abs(intval($team['city_id']));
	$team['partner_id'] = abs(intval($team['partner_id']));
	$team['sort_order'] = abs(intval($team['sort_order']));
	$team['fare'] = abs(intval($team['fare']));
	$team['farefree'] = abs(intval($team['farefree']));
	$team['pre_number'] = abs(intval($team['pre_number']));
	$team['end_time'] = strtotime($team['end_time']);
	$team['expire_time'] = strtotime($team['expire_time']);
	$team['image'] = upload_image('upload_image',$eteam['image'],'team',true);
	$team['image1'] = upload_image('upload_image1',$eteam['image1'],'team');
	$team['image2'] = upload_image('upload_image2',$eteam['image2'],'team');

	// galeria de imagens
	$team['gal_image1'] = upload_image('gal_upload_image1',$eteam['gal_image1'],'team');
	$team['gal_image2'] = upload_image('gal_upload_image2',$eteam['gal_image2'],'team');
	$team['gal_image3'] = upload_image('gal_upload_image3',$eteam['gal_image3'],'team');
	$team['gal_image4'] = upload_image('gal_upload_image4',$eteam['gal_image4'],'team');
	$team['gal_image5'] = upload_image('gal_upload_image5',$eteam['gal_image5'],'team');
	$team['gal_image6'] = upload_image('gal_upload_image6',$eteam['gal_image6'],'team');

	//team_type == goods
	if($team['team_type'] == 'goods'){
		$team['min_number'] = 1;
		$tean['conduser'] = 'N';
	}

	if ( !$id ) {
		$team['now_number'] = $team['pre_number'];
	} else {
		$field = strtoupper($table->conduser)=='Y' ? null : 'quantity';
		$now_number = Table::Count('order', array(
					'team_id' => $id,
					'state' => 'pay',
					), $field);
		$team['now_number'] = ($now_number + $team['pre_number']);

		/* Increased the total number of state is not sold out */
		if ( $team['max_number'] > $team['now_number'] ) {
			$team['close_time'] = 0;
			$insert[] = 'close_time';
		}
	}

	$insert = array_unique($insert);
	$table = new Table('team', $team);
	$table->SetStrip('summary', 'detail', 'systemreview', 'notice');


	if ( $team['id'] && $team['id'] == $id ) {
		$table->SetPk('id', $id);
		$table->update($insert);
		Session::Set('notice', 'Informações modificadas com sucesso!');
		redirect( WEB_ROOT . "/vipmin/oferta/index.php");
	}
	else if ( $team['id'] ) {
		Session::Set('error', 'Edição ilegal');
		redirect( WEB_ROOT . "/vipmin/oferta/index.php");
	}

	if ( $table->insert($insert) ) {
		Session::Set('notice', 'Nova oferta adicionada');
		redirect( WEB_ROOT . "/vipmin/oferta/index.php");
	}
	else {
		Session::Set('error', 'Falha ao editar oferta');
		redirect(null);
	}
}

$groups = DB::LimitQuery('category', array(
			'condition' => array( 'zone' => 'group', ),
			));
$groups = Utility::OptionArray($groups, 'id', 'name');

$partners = DB::LimitQuery('partner', array(
			'order' => 'ORDER BY id DESC',
			));
$partners = Utility::OptionArray($partners, 'id', 'title');
$selector = $team['id'] ? 'edit' : 'create';
include template('manage_team_edit');
