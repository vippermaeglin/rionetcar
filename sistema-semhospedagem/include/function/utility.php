<?php
function get_city($ip=null) {
	return;
	/*
	$cities = option_category('city', false, true);
	$ip = ($ip) ? $ip : Utility::GetRemoteIP();
	$url = "http://open.baidu.com/ipsearch/s?wd={$ip}&tn=baiduip";
	$res = mb_convert_encoding(Utility::HttpRequest($url), 'UTF-8', 'GBK');
	if ( preg_match('#Fromï¼š<b>(.+)</b>#Ui', $res, $m) ) {
		foreach( $cities AS $one) {
			if ( FALSE !== strpos($m[1], $one['name']) ) {
				return $one;
			}
		}
	}
	return array();
	*/
}

function mail_zd($email) {
	global $option_mail;
	if ( ! Utility::ValidEmail($email) ) return false;
	preg_match('#@(.+)$#', $email, $m);
	$suffix = strtolower($m[1]);
	return $option_mail[$suffix];
}

function nanooption($string) {
	if ( preg_match_all('#{(.+)}#U', $string, $m) ){
		return $m[1];
	}
	return array();
}

global $striped_field;
$striped_field = array(
	'username',
	'realname',
	'name',
	'tilte',
	'email',
	'address',
	'mobile',
	'url',
	'logo',
	'contact',
);

global $option_gender;
$option_gender = array(
		'F' => 'feminino',
		'M' => 'masculino',
		);
global $option_pay;
$option_pay = array(
		'pay' => 'pago',
		'unpay' => 'aguardando pagamento',
		);
global $option_service;
$option_service = array(
		'alipay' => 'alipay',
		'pagamentodg' => 'Pagamento Digital',
		'mercadopago' => 'Mercado Pago',
		'moip' => 'Moip',
		'cash' => 'pagar com dinheiro',
		'credit' => 'pagar com crédito',
		'other' => 'outros',
		);
global $option_delivery;
$option_delivery = array(
		'express' => 'express',
		'coupon' => 'cupom',
		'pickup' => 'entrega imediata',
		);
global $option_flow;
$option_flow = array(
		'buy' => 'comprar',
		'invite' => 'convidar',
		'store' => 'creditar',
		'withdraw' => 'retirar',
		'coupon' => 'cupom de desconto',
		'refund' => 'reembolsar',
		'register' => 'registrar',
		'charge' => 'trocar',
		);
global $option_mail;
$option_mail = array(
		'gmail.com' => 'https://mail.google.com/',
		'hotmail.com' => 'http://hotmail.com/',
		'yahoo.com' => 'http://mail.yahoo.com/',
		);
global $option_cond;
$option_cond = array(
		'Y' => ' ativar oferta pelo número de compradores mínimo atingido',
		'N' => ' ativar oferta pelo número de vendas mínimo atingido',
		);
global $option_open;
$option_open = array(
		'Y' => 'Mostrar',
		'N' => 'Não mostrar',
		);
global $option_buyonce;
$option_buyonce = array( 
		'N' => 'É possível comprar mais de uma oferta ou promoção',
		'Y' => 'Não é possível comprar mais de uma oferta ou promoção',
		);
global $option_teamtype;
$option_teamtype = array(
		'' => 'Informe o modelo desta oferta',
		'cupom' => 'Modelo CupomNow',
		'normal' => 'Modelo Tradicional',
	    'participe' => 'Modelo Promocional',
	 	 'off' => 'Oferta paga 100% no parceiro',
	 	 'especial' => 'Oferta Especial',
		);
global $option_yn;
$option_yn = array(
		'Y' => 'sim',
		'N' => 'não',
		);
global $option_alipayitbpay;
$option_alipayitbpay= array(
		'1h' => '1 hora',
		'2h' => '2 horss',
		'3h' => '3 horas',
		'1d' => '1 dia',
		'3d' => '3 dias',
		'7d' => '7 dias',
		'15d' => '15 dias',
		);




