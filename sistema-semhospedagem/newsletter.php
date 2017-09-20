<?php
require_once(dirname(__FILE__) . '/app.php');

$tip = strval($_GET['tip']);

if ( $_POST ) {

	$dominio = getDomino($_POST['email']);
	$city_id = $_POST['city_id'];
	
	if(!$city_id or $city_id == "undefined"){
	  
		$city_id = $_COOKIE["codcidade"];
	} 
	
	if (!$city or  $city_id == "undefined"){ 	 
		if(isset($_COOKIE["codcidade"])){ 	
		 
			$city = Table::Fetch('category', $_COOKIE["codcidade"]); 
		}
	}
	 
	if (!$city) $city = get_city();
	if (!$city) $city = array_shift($hotcities);

	 $city_id = $city["id"]; 
	 

	if(!checkdnsrr ($dominio)){
		echo  utf8_encode("Por favor, informe um email válido");
		exit;
	} 

	//if( 1 == 1){
	if( $INI['option']['confirmacaoemail'] == "Y"){
	
		$sql 	=  "select * from subscribe where email= '".$_POST['email']."'";
		$rs 	= mysql_query($sql);
		$row 	= mysql_fetch_object($rs);
		
		$email 	= $row->email;
		$ativo 	= $row->ativo;
		
		if(!empty($email) and empty($ativo)){ // falta confirmar
			 echo utf8_encode("Não se preocupe, o seu email já esta cadastrado conosco. Porém estamos aguardando a sua confirmação. Entre no seu email e clique no link para ativar.");
			 exit;
		}
		if(!empty($email) and  $ativo == "s"){ // confirmado
			 echo utf8_encode("Não se preocupe, o seu email já esta cadastrado conosco. Em breve você receberá exclusivas shows e eventos em seu email. Obrigado !");
			 exit;
		}
		if( empty($email) and empty($ativo)){ // usuario novo tentando cadastrar
			 $secret = md5($_POST['email']);
			 $sql =  "insert into subscribe (email,city_id,secret) values ('".$_POST['email']."',$city_id,'$secret' )";
			 $rs = mysql_query($sql);
			 
			 mail_sign_confirmacao($_POST['email'],$secret);
			 echo utf8_encode("Enviamos para o seu email um link de confirmação para prosseguirmos com o seu cadastro. Por favor, entre no seu email e clique no link para confirmar.");
			 exit;
			  
		}
		exit;

	}
	
	$sql 	=  "select email from subscribe where email= '".$_POST['email']."'";
	$rs 	= mysql_query($sql);
	$row 	= mysql_fetch_object($rs);
	$email = $row->email;
	if($email != ""){
		 echo utf8_encode("Não se preocupe, o seu email já esta cadastrado conosco. Você irá receber em seu e-mail nossas melhores ofertas ! Obrigado.");
		 exit;

	}
  
	ZSubscribe::Create($_POST['email'], $city_id);
	mail_sign_news($_POST['email']);

	
	$email = $_POST['email']; 
	$dominio = explode("@",$email);
	$dominio = $dominio[1];
		 
	$sql = "INSERT INTO `email_list_subscribers` ( `listid`, `emailaddress`, `domainname`, `format`, `confirmed`, `confirmcode`, `requestdate`, `requestip`, `confirmdate`, `confirmip`, `subscribedate`, `bounced`, `unsubscribed`, `unsubscribeconfirmed`, `formid`) VALUES ( 2, '".$email."', '".$dominio."', 'h', '1', '82cca631f30c3a42f7366e5ceeb38eee', '', '', '', '', '', 0, 0, '0', 0);";
	$rs = @mysql_query($sql);
			
	echo "1"; 
}
 
