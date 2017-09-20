<?php
  
require_once(dirname(dirname(dirname(__FILE__))) . '/util/Util.php');
 
function enviar($to,$subject, $message){
	global $INI; 
	
	 $refer	= $_SERVER['HTTP_REFERER'];
	 
    if($INI['mail']['mail']=="smtp"){
		 
		$mailer = new PHPMailer();
		$mailer->IsSMTP();
		$mailer->SMTPDebug = 1;
		$mailer->IsHTML(true);
		$mailer->CharSet="UTF-8"; 
		$mailer->Port 	= $INI['mail']['port']; //Indica a porta de conexão para a saída de e-mails
		$mailer->Host 	= $INI['mail']['host'];
		$mailer->SMTPAuth = true; //define se haverá ou não autenticação no SMTP
		$mailer->Username = $INI['mail']['user']; //Informe o e-mai o completo
		$mailer->Password = $INI['mail']['pass']; //Senha da caixa postal
		$mailer->FromName =  $INI['system']['sitename'] ; //Nome que será exibido para o destinatário
		$mailer->From = $INI['mail']['user']; //Obrigatório ser a mesma caixa postal indicada em "username"
		$mailer->AddAddress($to); //Destinatários
		//$mailer->AddBCC('teste@gmail.com', 'teste'); // Cópia Oculta
		$mailer->Subject =  $subject ;
		$mailer->Body =  $message ;
		
		if(!$mailer->Send())
		{
		    Util::log2("Nao foi possivel enviar email por smtp... (".$mailer->Host.") - Referencia: ".$refer);
			return false; 
		}
		else{
			 //Util::log2("Email enviado com sucesso... (".$mailer->Host.") - Referencia: ".$refer);
			return true;
		} 
	}
	 else if($INI['mail']['mail']=="mail"){
		if(!Util::enviaemail($to,$subject, $message)){
		    Util::log2("Nao foi possivel enviar email para $to por phpmail... - Referencia: ".$refer. ". Assunto: ".$subject. ". Mensagem: ".$message);
			return false;
		}
		else{
			// Util::log2("Email enviado com sucesso por phpmail para $to ... - Referencia: ".$refer. ". Assunto: ".$subject. ". Mensagem: ".$message);
			 return true;
		}
	}
	 else if($INI['mail']['mail']=="smtpforce"){
		 if(!Util::smtpforce($to,$subject, $message)){
			 //Util::log2("Nao foi possivel enviar email por smtpforce... - Referencia: ".$refer); 
		 }
		 else{
			// Util::log2("Email enviado com sucesso por smtp force... - Referencia: ".$refer);	
		}
	 }
	
}




function mail_custom($emails=array(), $subject, $message) {
	global $INI; 
	
	settype($emails, 'array');

	$options = array(
		'contentType' => 'text/html',
		'encoding' => $encoding,
	);
 
	$to = array_shift($emails);
	 
	enviar($to,$subject,$message);
 
}


function mail_sign($user) {
 
	global $INI;
	 
	if ( empty($user) ) return true;
 
	$to = $user['email'];
 
	
	$message = '
	
	<img src="'.$INI['system']['wwwprefix'].'/include/logo/logo.jpg" alt="'.$INI['system']['sitename'].'">
	<p></p>
	<p>Obrigado por cadastrar-se no '.$INI['system']['sitename'].'</p>
 
	<p>Em breve, você receberá em seu e-mail, imperdíveis promoções da sua cidade e região.</p>

	<p>São muitas opções de restaurantes, teatros, shows, spas, entre outras promoções.</p>

	<p>Complete agora seu cadastro e aproveite as melhores promoções!</p>

	<p>Entre no endereço '.$INI['system']['wwwprefix'].'/cadastro e faça seu cadastro agora mesmo.</p>

	<p>Não se esqueça, de após concluído seu cadastro, convidar seus amigos! e ganhar pontos por indicação.</p>

	<p></p>
	<p></p>
	<p>Boas compras,</p>
	<p></p>
	<p></p>
	
	<p><b>Equipe '.$INI['system']['sitename'].'</p>
	<p>'.$INI['mail']['user'].'</b></p>

	';
	
	$subject = 'Obrigado por se cadastrar no '.$INI['system']['sitename'];
 
	enviar($to,$subject,$message);
 
}


function mail_sign_cadastro($user) {
 
	global $INI;
	 
	if ( empty($user) ) return true;
	 
	$to = $user['email'];
   
    
  $parametros = array( 'realname' => $login_user['realname'], 'title' => $team['title'], 'quantity' => $order['quantity'],  'body2' => $body2 ,'origin' => $order['origin'],'bonus_cadastro' => $INI['system']['bonus_cadastro'] );
	
   $request_params = array(
		'http' => array(
			'method'  => 'POST',
			'header'  => implode("\r\n", array(
				'Content-Type: application/x-www-form-urlencoded',
				'Content-Length: ' . strlen(http_build_query($parametros)),
			)),
			'content' => http_build_query($parametros),
		)
	);

	$request  = stream_context_create($request_params);
	$mensagem = file_get_contents($INI["system"]["wwwprefix"]."/templates/cadastro.php");

	$assunto = 'Obrigado por se cadastrar no '.$INI['system']['sitename'];
 
	enviar($to,$assunto,$mensagem);
	 
}

function mail_cadastro_fb($id) {
 
	global $INI;
	    
  $user = Table::Fetch('user', $id);
 
  $parametros = array( 'email' => $user['email'],'senha' =>$user['senha'],'realname' => $user['realname'],'bonus_cadastro' => $INI['system']['bonus_cadastro'] );
	
   $request_params = array(
		'http' => array(
			'method'  => 'POST',
			'header'  => implode("\r\n", array(
				'Content-Type: application/x-www-form-urlencoded',
				'Content-Length: ' . strlen(http_build_query($parametros)),
			)),
			'content' => http_build_query($parametros),
		)
	);

	$request  = stream_context_create($request_params);
	$mensagem = file_get_contents($INI["system"]["wwwprefix"]."/templates/cadastro_from_facebook.php", false, $request);

	$assunto = 'Obrigado por se cadastrar no '.$INI['system']['sitename'];
 
	enviar($user['email'],$assunto,$mensagem);
 
	 
}


function mail_sign_news($email) {
 
	global $INI;
	 
	$to = $email;
  
   //$parametros = array( 'realname' => $login_user['realname'], 'title' => $team['title'], 'quantity' => $order['quantity'],  'body2' => $body2 ,'origin' => $order['origin'] );
	
   $request_params = array(
		'http' => array(
			'method'  => 'POST',
			'header'  => implode("\r\n", array(
				'Content-Type: application/x-www-form-urlencoded',
				'Content-Length: ' . strlen(http_build_query($parametros)),
			)),
			'content' => http_build_query($parametros),
		)
	);

	$request  = stream_context_create($request_params);

	$assunto = 'Obrigado por se cadastrar em nossa newsletter';

	$mensagem = file_get_contents($INI["system"]["wwwprefix"]."/templates/cadastro_newsletter.php");

	 
	enviar($to,$assunto,$mensagem);
}

function mail_sign_confirmacao($email,$secret) {
 
	global $INI;
	 
	$to = $email;
 
    $parametros = array( 'secret' => $secret, 'email' => $email  );
	
	
   $request_params = array(
		'http' => array(
			'method'  => 'POST',
			'header'  => implode("\r\n", array(
				'Content-Type: application/x-www-form-urlencoded',
				'Content-Length: ' . strlen(http_build_query($parametros)),
			)),
			'content' => http_build_query($parametros),
		)
	);

	$request  = stream_context_create($request_params);

	$assunto = 'Ativação de cadastro';

	$mensagem = file_get_contents($INI["system"]["wwwprefix"]."/templates/cadastro_newsletter_confirmar.php", false, $request);

	 
	enviar($to,$assunto,$mensagem);
}

function mail_sign_id($id) {
	$user = Table::Fetch('user', $id);
	mail_sign($user);
}

function mail_cadastro($id) {
	$user = Table::Fetch('user', $id);
	mail_sign_cadastro($user);
}

 

function mail_sign_email($email) {
	$user = Table::Fetch('user', $email, 'email');
	mail_sign($user);
}

function mail_repass($user) {
	global $INI;
	
	if ( empty($user) ) return true;
	
	$from = $INI['mail']['from'];
	$to = $user['email'];
  
	$subject = $INI['system']['sitename'] . ' - Envio de senha';
	
    $message = '
	
	<img src="'.$INI['system']['wwwprefix'].'/include/logo/logo.jpg" alt="'.$INI['system']['sitename'].'">
	<p></p>
	<p>Olá  '.$user['realname'].' segue os dados abaixo pra você poder entrar no '.$INI['system']['sitename'].' e aproveitar todas as nossas ofertas.</p>
 
	<p>Usuário : '.$user['email'].' </p>
	<p>Senha : '.$user['senha'].' </p>
  
	<p></p>
	<p></p>
	<p>Boas compras,</p>
	<p></p>
	<p></p>
	
	<p><b>Equipe '.$INI['system']['sitename'].'</p>
	<p>'.$INI['mail']['user'].'</b></p>

	';
	 
	enviar($to,$subject,$message);
 
}

/*
FUNCAO PARA ENVIO DE NEWSLETTER DA OFERTA
*/
function mail_subscribe($city, $team, $partner, $subscribe,$tipo=false)
{
	/* AQUI VOCÊ INFORMA O MODELO QUE IREMOS USAR PARA ENVIAR A NEWS */
	 //$ARQUIVOMODELO = "newsletter_oferta.php";
	 $ARQUIVOMODELO = "newsletter_oferta_modelo3.php";
	/*******************************************************/

	global $INI;
	$encoding = $INI['mail']['encoding'] ? $INI['mail']['encoding'] : 'UTF-8';
	$week = array('Day','1','2','3','4','5','6');
	$today = date('Y Years n Months j Days Weeks') . $week[date('w')];
	 
   $parametros = array(  'tipo' => $tipo,'idoferta' => $team['id'], 'nome_cidade' => $city['name'],  'secret' => $subscribe['secret'] ,'nomeparceiro' => $partner['title'],'homepage' => $partner['homepage'] ,'imagemparceiro' => $partner['image'],'address' => $partner['address'],'complemento' => $partner['chavesms'],'phone' => $partner['phone'],'complemento' => $partner['chavesms']);
	 
   $request_params = array(
		'http' => array(
			'method'  => 'POST',
			'header'  => implode("\r\n", array(
				'Content-Type: application/x-www-form-urlencoded',
				'Content-Length: ' . strlen(http_build_query($parametros )),
			)),
			'content' => http_build_query($parametros ),
		)
	);

	$request  = stream_context_create($request_params);
	$mensagem = file_get_contents($INI["system"]["wwwprefix"]."/templates/".$ARQUIVOMODELO, false, $request);

	$to = $subscribe['email'];

	$assunto =  "Ofertas do dia: {$team['title']}";
	
	enviar($to,$assunto,$mensagem);
}


function mail_invitation($emails, $content, $name) {
	global $INI;
	if(empty($emails)) return;

	$emails = preg_split('/[\s,]+/', $emails, -1, PREG_SPLIT_NO_EMPTY);
	$subject = "Olá, o seu amigo  [{$name}] está convidando você para se cadastrar no {$INI['system']['sitename']}";
	$vars = array(
			'name' => $name,
			'content' => $content,
			);
	$message = render('mail_invite', $vars);

	$step = ceil(count($emails)/20);
	for($i=0; $i<$step; $i++) {
		$offset = $i * 20;
		$tos = array_slice($emails, $offset, 20);
		mail_custom($tos, $subject, $message);
	}
	return true;
}
