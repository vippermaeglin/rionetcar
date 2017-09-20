<?php 

//require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

//$url = $INI['system']['wwwprefix'];
//print_r($INI);

//require_once($url ."/util/Util.php");

function sms_send($phone, $content) {
	global $INI;
	  
	//if (mb_strlen($content, 'UTF-8') < 20) {
		//return 'comprimento do SMS é inferior a 20 caracteres';
	//}
	
	//$user = strval($INI['sms']['user']);
	//$pass = strtolower(md5($INI['sms']['pass']));
	
	//if(null==$user) return true;
	$content = urlEncode($content);
	$chave = $INI['sms']['user'];
	
	Util::log("Chave do sms: ".$chave."\n");
	
	Util::log("http://sms.mapainformatica.com.br:8080/py/sms/send?auth=".$chave."&mobile={$phone}&content=".$content);
	
	//just replace below url and its parameters remember to keep values in {} intact
	 $api = "http://sms.mapainformatica.com.br:8080/py/sms/send?auth=".$chave."&mobile={$phone}&content=".$content;
	 $res = Utility::HttpRequest($api);
	
	$smssite = $INI['system']['sitename']." - Entre em contato com a empresa http://sms.mapainformatica.com.br";
	$msg = $res;
	if($res == "auth invalid"){
		$msg = "Chave Invalida";
		Util::log("$msg - $smssite\n");
		enviar( $INI['mail']['user'],$msg,$smssite);
		return false;
	}
	else if($res == "limit of messages passed"){
		$msg = "Limite de sms do mes foi ultrapassado";
		Util::log("$msg - $smssite\n");
		enviar( $INI['mail']['user'],$msg,$smssite);
		return false;
	}
	else if($res == "ERRO: nao foi informado o mobile"){
		$msg = "Nao foi informado o numero para o envido do sms";
		Util::log("$msg - $smssite\n");
		enviar( $INI['mail']['user'],$msg,$smssite);
		return false;
	}	
	else if($res == "ERRO: nao foi informado o content"){
		$msg = "Nao foi informado o conteudo para o envido do sms";
		Util::log("$msg - $smssite\n");
		enviar( $INI['mail']['user'],$msg,$smssite);
		return false;
	} else if(!is_numeric($res)){
		Util::log("$msg - $smssite\n");
		enviar( $INI['mail']['user'],$msg,$smssite);
		return false;
	} else{
		Util::log("sms enviado para o número ".$phone);
		return true;
		
	}
	
	//return trim(strval($res))=='+OK' ? true : strval($res);
}
 


function sms_send_marketing($phone, $content ) {
	
	global $INI;
 
 
	$content = urlEncode($content);
	//just replace below url and its parameters remember to keep values in {} intact
	//$api = "http://smssitename.com/sms?user={$user}&pass={$pass}&phones={$phone}&content={$content}";
	
	$arrcelular = explode(",",$phone);
	$chave = $INI['sms']['user'];
	 
	for($a=0; $a < count($arrcelular); $a++){
		$cel = $arrcelular[$a];
		$api = "http://sms.mapainformatica.com.br:8080/py/sms/send?auth=".$chave."&mobile=$cel&content={$content}";
		$res = Utility::HttpRequest($api);
		$smssite = "Entre em contato com a empresa http://sms.mapainformatica.com.br";
		$msg = $res;
		
		if($res == "auth invalid"){
			$msg = "Chave Invalida";
			Util::log("$msg - $smssite\n");
			enviar( $INI['mail']['user'],$msg,$smssite);
			return false;
		}
		else if($res == "limit of messages passed"){
			$msg = "Limite de sms do mes foi ultrapassado";
			Util::log("$msg - $smssite\n");
			enviar( $INI['mail']['user'],$msg,$smssite);
			return false;
		}
		else if($res == "ERRO: nao foi informado o mobile"){
			$msg = "Nao foi informado o numero para o envido do sms";
			Util::log("$msg - $smssite\n");
			enviar( $INI['mail']['user'],$msg,$smssite);
			//return false;
		}	
		else if($res == "ERRO: nao foi informado o content"){
			$msg = "Nao foi informado o conteudo para o envido do sms";
			Util::log("$msg - $smssite\n");
			enviar( $INI['mail']['user'],$msg,$smssite);
			//return false;
		} else if(!is_numeric($res)){
			Util::log("$msg - $smssite\n");
			enviar( $INI['mail']['user'],$msg,$smssite);
			return false;
		} else{
			//return true;
			Util::log("sms enviado para o número ".$phone);
		}
	}
	//return trim(strval($res))=='+OK' ? true : strval($res);
}

function sms_secret($mobile, $secret, $enable=true) {
	global $INI;
	$funccode = $enable ? 'Cadastrar' : 'Descadastrar';
	$content = "{$INI['system']['sitename']} N. do celular:{$mobile} SMS{$funccode}Cod, de Autenticação:{$secret}?";
	sms_send($mobile, $content);
}

function sms_coupon($coupon, $mobile=null) {
	global $INI;
	
	Util::log($_REQUEST['ProdID_1']. " - Preparando para enviar sms com o cupom.");
						
	if ( $coupon['consume'] == 'Y' || $coupon['expire_time'] < strtotime(date('d-m-Y'))) {
		Util::log($_REQUEST['ProdID_1']. " - Cupom consumido ou vencido. SMS nao enviado.");
		return $INI['system']['couponname'] . 'prescrito';
	}

	$user = Table::Fetch('user', $coupon['user_id']);
	$order = Table::Fetch('order', $coupon['order_id']);

   Util::log($_REQUEST['ProdID_1']. " - Verificando celular da compra (nao do usuario).");
	if (!Utility::IsMobile($mobile)) {
		$mobile = $order['mobile'];
		if (!Utility::IsMobile($mobile)) {
			$mobile= $user['mobile'];
		}
	}
	if (!Utility::IsMobile($mobile)) {
		Util::log($_REQUEST['ProdID_1']. " - celular inválido. - (".$order['mobile'].")");
		return 'Por favor, defina o número de telefone válido para poder receber mensagens de texto';
	}
	$team = Table::Fetch('team', $coupon['team_id']);
	$partner = Table::Fetch('partner', $coupon['partner_id']);
	$location = $partner['location'];
	$title	 = $partner['title'];
	
	
	$coupon['end'] = date('Y-n-j', $coupon['expire_time']);
	$coupon['name'] = $team['product'];
	/*$content = render('manage_tpl_smscoupon', array(
				'partner' => $partner,
				'coupon' => $coupon,
				'user' => $user,
				));*/
	$content =  "Ola, o seu pedido feito no site de compras coletivas ".$INI['system']['sitename']. " ja foi processado. Cupom N. ".$coupon['id']. ". Digija-se a ".$title." - ".$location.". Obrigado e Bom proveito.";


	if (true===($code=sms_send($mobile, $content))) {
		Table::UpdateCache('coupon', $coupon['id'], array(
					'sms' => array('`sms` + 1'),
					'sms_time' => time(),
					));
		return true;
	}
	return $code;
}

function sms_coupon_teste($mobile) {
	global $INI;
	 
	Util::log($_REQUEST['ProdID_1']. " - Preparando para enviar sms com o cupom.");
						
	$content =  "Segue seu Cupom N. GGFT566E. Dirija-se a Casa&Moda - Rua Bem me Quer 61. Obrigado e Bom proveito. ".$INI['system']['sitename'];


	if (true===($code=sms_send($mobile, $content))) {
		Table::UpdateCache('coupon', $coupon['id'], array(
					'sms' => array('`sms` + 1'),
					'sms_time' => time(),
					));
		return true;
	}
	return false;
}


