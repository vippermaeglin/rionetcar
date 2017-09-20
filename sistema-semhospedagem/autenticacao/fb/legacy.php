<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

# We require the library
require("facebook.php");

# Creating the facebook object
$facebook = new Facebook(array(
	'appId'  => $INI['other']['app_id_login'],
	'secret' => $INI['other']['admin_id_login'], 
	'cookie' => true
));

# Let's see if we have an active session
$session = $facebook->getSession();

if(!empty($session)) {
	# Active session, let's try getting the user id (getUser()) and user info (api->('/me'))
	try{
		$uid = $facebook->getUser();
		
		# users.getInfo
		/*
		$api_call = array(
			'method' => 'users.getinfo',
			'uids' => $uid,
			'fields' => 'uid, first_name, last_name, pic_square, pic_big, sex'
		);
		$users_getinfo = $facebook->api($api_call);
		print_r($users_getinfo);
		*/
		
		# FQL
		$fql_query  =   array(
			'method' => 'fql.query',
			'query' => 'SELECT email,uid, first_name, last_name FROM user WHERE uid = ' . $uid
		);
		$fql_info = $facebook->api($fql_query);
		//print_r($fql_info);
		
		if($fql_info){
			
			$sql ="SELECT * FROM user WHERE email = '".$fql_info[0]['email']."'";
			$query 	= mysql_query($sql);
			$row = mysql_fetch_object($query);  
			
			# If not, let's add it to the database
			if($row->email == ""){
				$realname = $fql_info[0]['first_name']. " ".$fql_info[0]['last_name'];
				$senha = mt_rand();
				$senhamd5 = md5($senha.'@4!@#$%@');
				$bonus_cadastro = $INI['system']['bonus_cadastro'];
				$bonus_cadastro  =  str_replace(",",".",$bonus_cadastro);
			
				$sql = "INSERT INTO user (fb_userid, username,realname,email,password,senha,create_time,money) VALUES ( '{$fql_info[0]['uid']}','{$fql_info[0]['email']}', '$realname', '{$fql_info[0]['email']}','$senhamd5','$senha','".time()."','$bonus_cadastro')";
				$query 	= @mysql_query($sql);
				if($query){
					$user_id = mysql_insert_id();
					
					ZSubscribe::Create($fql_info[0]['email'], "0");
					$secret = md5($fql_info[0]['email']."0");
					$sql = "INSERT INTO `email_list_subscribers` ( `listid`, `emailaddress`, `domainname`, `format`, `confirmed`, `confirmcode`, `requestdate`, `requestip`, `confirmdate`, `confirmip`, `subscribedate`, `bounced`, `unsubscribed`, `unsubscribeconfirmed`, `formid`) VALUES ( 2, '".$email."', '".$dominio."', 'h', '1', '82cca631f30c3a42f7366e5ceeb38eee', '', '', '', '', '', 0, 0, '0', 0);";
					$rs = @mysql_query($sql);
					$param = "&user=new";
					
					$api_call = array( 
						'method' => 'users.hasAppPermission', 
						'uid' => $uid, 
						'ext_perm' => 'publish_stream' 
					); 
					$can_post = $facebook->api($api_call); 
					if($can_post){ 
						$realname = $fql_info[0]['first_name']. " ".$fql_info[0]['last_name'];
						$facebook->api('/'.$uid.'/feed', 'post', array(  
							'message' => $INI['system']['sitename'].' '.$INI['system']['sitetitle'],  
							'name' =>  $INI['system']['sitename'].' '.$INI['system']['sitetitle'],  
							'description' => utf8_encode($realname. " se cadastrou no site de compra coletiva <a href='$ROOTPATH'>$ROOTPATH</a>. Trabalhamos com as melhores ofertas com até 90% de desconto."),  
							//'caption' => $ROOTPATH,  
							'picture' => $ROOTPATH.'/include/logo/logo.png',  
							'link' => $ROOTPATH  
						)); 
					} 
 
				}
				 
			}
			else{
				$user_id = $row->id ; 
				$api_call = array( 
					'method' => 'users.hasAppPermission', 
					'uid' => $uid, 
					'ext_perm' => 'publish_stream' 
				); 
				$can_post = $facebook->api($api_call); 
				if($can_post){ 
					$realname = $fql_info[0]['first_name']. " ".$fql_info[0]['last_name'];
					$facebook->api('/'.$uid.'/feed', 'post', array(  
						'message' => $INI['system']['sitename'].' '.$INI['system']['sitetitle'],  
						'name' =>  $INI['system']['sitename'].' '.$INI['system']['sitetitle'],  
						'description' => utf8_encode($realname. " está fazendo compras no site de compra coletiva <a href='$ROOTPATH'>$ROOTPATH</a>. Trabalhamos com as melhores ofertas com até 90% de desconto."),  
						//'caption' => $ROOTPATH,  
						'picture' => $ROOTPATH.'/include/logo/logo.png',  
						'link' => $ROOTPATH  
					)); 
				} 
			}			
			
			// this sets variables in the session 
			$_SESSION['fb_uid'] = $fql_info[0]['uid'];  
			$_SESSION['fb_email'] = $fql_info[0]['email'];
			$_SESSION['fb_username'] = $fql_info[0]['email'];
			$_SESSION['realname'] = $realname;
			 
			ZLogin::Login($user_id);
			 
		
		header("Location: ".$ROOTPATH."/index.php?login_fb=true&user_id=".$user_id."".$param);
			 
		}
		 
		
	} catch (Exception $e){}
} else {
	# There's no active session, let's generate one
	$login_url = $facebook->getLoginUrl();
	header("Location: ".$login_url);
}