<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

need_manager();
need_auth('market');

$id = abs(intval($_GET['id']));
$team = Table::Fetch('team', $id);

if ( $team['delivery']=='express' ) {
	$oc = array(
		'state' => 'pay',
		'team_id' => $id,
	);
	$orders = DB::LimitQuery('order', array(
		'condition' => $oc,
		'order' => 'ORDER BY pay_time DESC, id DESC',
	));
	$kn = array(
		'username' => 'Username',
		'email' => 'Email',
		'realname' => 'Name',
		'mobile' => 'Mobile',
		'address' => 'Address',
		'quantity' => 'Quantity',
		'condbuy' => 'Options',
		'remark' => 'Remarks',
		'date' => 'Date',
	);

	foreach($orders As $k=>$o) {
		$o['date'] = date('d-m-Y H:i', $o['pay_time']);
		$orders[$k] = $o;
	}

	$name = "team_{$id}_".date('Ymd');
	down_xls($orders, $kn, $name);
}
else {
	$cc = array(
		'team_id' => $id,
		);
	$coupons = DB::LimitQuery('coupon', array(
				'condition' => $cc,
				'order' => 'ORDER BY create_time ASC',
				));
	$users = Table::Fetch('user', Utility::GetColumn($coupons, 'user_id'));
	$orders = Table::Fetch('order', Utility::GetColumn($coupons, 'order_id'));
	$kn = array(
			'username' => 'Username',
			'email' => 'Email',
			'realname' => 'Name',
			'mobile' => 'Mobile',
			'condbuy' => 'Options',
			'id' => "{$INI['system']['couponname']} No.",
			'secret' => "{$INI['system']['couponname']} Password",
			'cmobile' => 'Consumer phone',
			'date' => 'Generation time',
	);

	foreach($coupons As $k=>$o) {
		$u = $users[$o['user_id']];
		$r = $orders[$o['order_id']];

		$o['username'] = $u['username'];
		$o['realname'] = $u['realname'];
		$o['condbuy'] = $r['condbuy'];
		$o['mobile'] = $u['mobile'];
		$o['email'] = $u['email'];
		$o['cmobile'] = $o['mobile'] ? $o['mobile'] : $u['mobile'];
		$o['date'] = date('d-m-Y H:i', $o['create_time']);
		$coupons[$k] = $o;
	}
	$name = "team_{$id}_".date('Ymd');
	down_xls($coupons, $kn, $name);
}
