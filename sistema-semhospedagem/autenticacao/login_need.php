<?php  
require_once(dirname(dirname(__FILE__)) . '/app.php');

 

if ( $_POST ) {
	$acao =  $_POST['acao'];
	
	if($_POST['acao']=="login") { 
		
		$login_user = ZUser::GetLogin($_POST['email'], $_POST['password']);
			if ( !$login_user ) {
				 
				Session::Set('error', "<BR>Não foi possível fazer o seu login. Por favor, verifique os seus dados.");
				redirect(WEB_ROOT . '/index.php?page=autentica&acao='.$acao.'&erro=1');
				
			} else if (option_yes('emailverify') && $login_user['enable']=='N' 	&& $login_user['secret']) {
				Session::Set('error', $_POST['email']);
				redirect(WEB_ROOT .'/verificaemail.php');
				
			} else {
				Session::Set('user_id', $login_user['id']);
				ZLogin::Remember($login_user);
				ZUser::SynLogin($login_user['username'], $_POST['password']);
				ZCredit::Login($login_user['id']);
			   
			if(isset($_SESSION["loginpagepost"])){
				 
					redirect($_SESSION["loginpagepost"]); 			
			}
			else{
			 
				redirect(get_loginpage(WEB_ROOT));
			} 
		}
	}	
	
	else if($_POST['acao']=="loginimportacontato") { 
		
		$login_user = ZUser::GetLogin($_POST['email'], $_POST['password']);
			if ( !$login_user ) {
				 
				 echo "0";
				 
			} else if (option_yes('emailverify') && $login_user['enable']=='N' 	&& $login_user['secret']) {
				
					echo "01";
				
			} else {
				Session::Set('user_id', $login_user['id']);
				ZLogin::Remember($login_user);
				ZUser::SynLogin($login_user['username'], $_POST['password']);
				ZCredit::Login($login_user['id']);
			    
		}
	}
	  
	else if($_POST['acao']=="cadastro") { 
	  
		$u = array();
		$u['username'] = strval($_POST['usernamecad']);
		$u['realname'] = strval($_POST['usernamecad']);
		$u['cpf'] = strval($_POST['cpf']);
		$u['password'] = strval($_POST['passwordcaduser']);
		$u['email'] = strval($_POST['emailcadastrouser']);
		$u['city_id'] =  $_POST['websitesuser3'] ; 
		$u['local'] = strval($_POST['local']);
		$u['mobile'] = strval($_POST['mobile']);
        $nome =  $u['realname'];
		$user =  $u['username'];
		$admin_notify = $INI['mail']['user'];
		$dtcriacao =  date("dd/mm/YYYY"); 
		$email = $u['email'];
		 
		$dominio = explode("@",$email);
		$dominio = $dominio[1];
		 
		if ( $_POST['receberofertas'] ) {
			
			  ZSubscribe::Create($u['email'],  intval($u['city_id']));
			 
			  $secret = md5($u['email'].$u['city_id']);
			
			  $sql = "INSERT INTO `email_list_subscribers` ( `listid`, `emailaddress`, `domainname`, `format`, `confirmed`, `confirmcode`, `requestdate`, `requestip`, `confirmdate`, `confirmip`, `subscribedate`, `bounced`, `unsubscribed`, `unsubscribeconfirmed`, `formid`) VALUES ( 2, '".$email."', '".$dominio."', 'h', '1', '82cca631f30c3a42f7366e5ceeb38eee', '', '', '', '', '', 0, 0, '0', 0);";
			  $rs = @mysql_query($sql);
		 	 
		}
	  
		if ( ! Utility::ValidEmail($u['email'], true) ) {
			echo utf8_encode("Falha no cadastro. O endereço de email informado não é válido.");
			exit;
		}
		 
		if ($_POST['passwordcaduser2']==$_POST['passwordcaduser'] && $_POST['passwordcaduser']) {
	 
			if ( option_yes('emailverify') ) {
				$u['enable'] = 'Y';
			}
		 // print_r($u);
			if ( $user_id = ZUser::Create($u) ) {
			 
				//if ( option_yes('emailverify') ) {
				
				if ( 1== 0) {  // mudar depois
					mail_sign_id($user_id);
					Session::Set('unemail', $_POST['emailcadastrouser']);
					redirect( WEB_ROOT . '/autenticacao/signuped.php');
				} else {
				 
					ZLogin::Login($user_id);
					mail_cadastro($user_id);
					  
					if(isset($_SESSION["loginpagepost"])){
						redirect( $_SESSION["loginpagepost"]); 			
					}
					else{
						redirect( WEB_ROOT . '/index.php');
					} 
				 }
			} else {
				$au = Table::Fetch('user', $_POST['emailcadastrouser'], 'email');
				//print_r($au);
				if ( $au['email'] ) { 
					echo utf8_encode("Falha no cadastro, e-mail já cadastrado."); 
					exit;
				} else if ( $au['username'] ) {
					echo utf8_encode("Falha no registro, apelido já cadastrado.");
					exit;
				}
				else{
					echo utf8_encode("Falha no registro, não foi possível fazer o seu cadastro. Por favor, volte mais tarde, nossa equipe já foi avisada.");
					exit;
				}
			}
		} else {
			 
			echo utf8_encode("Falha no cadastro. As suas senhas estão diferentes.");
		}
	
	}
}

$currefer = strval($_GET['r']);
if ($currefer) { Session::Set('loginpage', udecode($currefer)); }

 

 