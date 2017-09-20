<?php
require_once(dirname(__FILE__) . '/app.php');
 
$id = abs(intval($_GET['idusuariopai']));
if ($id) { 
	if ($login_user_id) {
		ZInvite::CreateFromId($id, $login_user_id);

		$userfetch = Table::Fetch('user', $id);
		 
		 $nomeuser  = $userfetch["realname"];
		 $emailuser  = $userfetch["email"];

		$nomeamigo = $login_user_id["realname"];
         
		$systeminvitecredit = $INI['system']['invitecredit'] ;
		
		$parametros = array( 'nomeamigo' => $nomeamigo, 'nomeuser' => $nomeuser);
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

        $mensagem = file_get_contents($INI["system"]["wwwprefix"]."/templates/pre_ganhar_credito.php", false, $request);

		enviar($emailuser ,ASSUNTO_PRE_COMISSAO, $mensagem);

	} else {
		$longtime = 86400 * 3; //3 dias expira o convite
		cookieset('_rid', $id, $longtime);
	}
	
}


redirect( WEB_ROOT  . '/cadastro');

 
