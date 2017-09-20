<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');

$action = strval($_GET['action']);
$cid = strval($_GET['id']);
$sec = strval($_GET['secret']);

if ($action == 'dialog') {
	$html = render('ajax_dialog_coupon');
	json($html, 'dialog');
}
else if($action == 'query') {
	$coupon = Table::FetchForce('coupon', $cid);
	$partner = Table::Fetch('partner', $coupon['partner_id']);
	$team = Table::Fetch('team', $coupon['team_id']);
	$e = date('d-m-Y', $team['expire_time']);

	if (!$coupon) {
		$v[] = "#{$cid}&nbsp;Inválido";
	} else if ( $coupon['consume'] == 'Y' ) {
		$v[] = $INI['system']['couponname'] . 'Inválido';
		$v[] = 'Consumido em:' . date('d-m-Y H:i:s', $coupon['consume_time']);
	} else if ( $coupon['expire_time'] < strtotime(date('d-m-Y')) ) {
		$v[] = "#{$cid}&nbsp;Expirado";
		$v[] = 'data da expiração:' . date('d-m-Y', $coupon['expire_time']);
	} else {
		$v[] = "#{$cid}&nbsp;- <b>Válido</b>";
		$v[] = "{$team['title']}";
		$v[] = "Valido até&nbsp;{$e}";
	}
	$v = join('<br/>', $v);
	$d = array(
			'html' => $v,
			'id' => 'coupon-dialog-display-id',
			);
	json($d, 'updater');
}

else if($action == 'consume') {
	$coupon = Table::FetchForce('coupon', $cid);
	$partner = Table::Fetch('partner', $coupon['partner_id']);
	$team = Table::Fetch('team', $coupon['team_id']);

	if (!$coupon) {
		$v[] = "#{$cid}&nbsp;Inválido";
		$v[] = 'Consumo falhou!';
	}
	else if ($coupon['secret']!=$sec) {
		$v[] = 'Senha Incorreta';
		$v[] = 'Consumo falhou!';
	} else if ( $coupon['expire_time'] < strtotime(date('d-m-Y')) ) {
		$v[] = "#{$cid}&nbsp;Expirado";
		$v[] = 'Expiração' . date('d-m-Y', $coupon['consume_time']);
		$v[] = 'Falha no consumo!';
	} else if ( $coupon['consume'] == 'Y' ) {
		$v[] = "#{$cid}&nbsp;Já consumido!";
		$v[] = 'Consumido em:' . date('d-m-Y H:i:s', $coupon['consume_time']);
		$v[] = 'Falha no consumo!';
	} else {
		ZCoupon::Consume($coupon);
		//credit to user'money'
		$tip = ($coupon['credit']>0) ? " Rebate:{$coupon['credit']}$" : '';
		$v[] = $INI['system']['couponname'] . 'Válido';
		$v[] = 'Validade:' . date('d-m-Y H:i:s', time());
		$v[] = 'Cupom consumido' . $tip;
	}
	$v = join('<br/>', $v);
	$d = array(
			'html' => $v,
			'id' => 'coupon-dialog-display-id',
			);
	json($d, 'updater');
}
else if ($action == 'sms') {
	$coupon = Table::Fetch('coupon', $cid);
	if ( $coupon['sms']>=5 && !is_manager() ) {
		json('SMS Coupon up to 5 times', 'alert');
	}
	$interval = abs(intval($INI['sms']['interval']));
	$lefttime = $interval + $coupon['sms_time'] - time();
	if ( !is_manager() && $lefttime>0 ) {
		json("Olá, faltam {$lefttime} segundos, tente enviar novamente os SMS", 'alert');
	}
	if (!$coupon||!is_login()||($coupon['user_id']!= ZLogin::GetLoginId()&&!is_manager())) {
		json('Download ilegal', 'alert');
	}
	$flag = sms_coupon($coupon);
	if ( $flag === true ) {
		json('SMS enviado com sucesso. Verifique por favor!', 'alert');
	} else if ( is_string($flag) ) {
		json($flag, 'alert');
	}
	json("Envio de SMS falhou. Codigo de erro: {$code}", 'alert');
}

