<?php

require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

session_start();

if(!empty($_SESSION)){
	header("Location: ".$ROOTPATH);
} 

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
		# req_perms is a comma separated list of the permissions needed  
		  
		$url = $facebook->getLoginUrl(array(  
			'req_perms' => 'email,publish_stream' ,  
			'next' => $ROOTPATH.'/autenticacao/fb/legacy.php',  
			'cancel_url' => $ROOTPATH  
		));  

		header("Location: {$url} "); 
		
		//$user = $facebook->api('/me');
	} catch (Exception $e){}
	
	 //echo "============".print_r($user);
	
	if(!empty($user)){
		# We have an active session, let's check if we have already registered the user
			$query 	= mysql_query("SELECT * FROM user WHERE AND fb_userid = ". $user[0]['uid']);
			$result = mysql_fetch_array($query);
			
			# If not, let's add it to the database
			if(empty($result)){
				$realname = $user[0]['first_name']. " ".$user[0]['last_name'];
				$senha = mt_rand();
			    $sql = "INSERT INTO user (fb_userid, username,realname,email,foto,password,senha,create_time) VALUES ( '{$user[0]['uid']}','{$user[0]['email']}', '$realname', '{$user[0]['email']}', '{$user[0]['pic_square']}','$senha','$senha','".time()."')";
				$query 	= mysql_query($sql);
				
				$query 	= mysql_query("SELECT * FROM users WHERE id = " . mysql_insert_id());
				$result = mysql_fetch_array($query);
			}		
			
			// this sets variables in the session 
			$_SESSION['fb_uid'] = $user[0]['uid'];  
			$_SESSION['fb_email'] = $user[0]['email'];
			$_SESSION['fb_username'] = $user[0]['email'];
			$_SESSION['realname'] = $realname;
	 
	} else {
		# For testing purposes, if there was an error, let's kill the script
		die("Houve um erro ao buscar os seus dados.");
	}
} else {
	# There's no active session, let's generate one
	$login_url = $facebook->getLoginUrl();
	header("Location: ".$login_url);
}