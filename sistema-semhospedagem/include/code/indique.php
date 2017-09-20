<?php

 
 header('Content-Type: text/html; charset=ISO-8859-1');

if($_POST['recipients']) {
 
	$emails = $_POST['recipients'];
	$emails = preg_split('/[\s,;]+/', $emails, -1, PREG_SPLIT_NO_EMPTY);
	$emails_array = array();
	  
	$request_params = array(
		'http' => array(
			'method'  => 'POST',
			'header'  => implode("\r\n", array(
				'Content-Type: application/x-www-form-urlencoded',
				'Content-Length: ' . strlen(http_build_query($_POST)),
			)),
			'content' => http_build_query($_POST),
		)
	);

	$request  = stream_context_create($request_params);
    $mensagem = file_get_contents($INI["system"]["wwwprefix"]."/templates/indicacao_amigo.php", false, $request); 
 
	foreach($emails AS $one) { 
		 
		if(Utility::ValidEmail($one)){
		 
			if(enviar($one, ASSUNTO_INDICACAO, $mensagem)){
				$enviou =  true;
			}
			else{
				$enviou =  false;
			}
			sleep(7);
		}
		else{
			echo "Email Inexistente";
		}
	}
	
	$mensagem="";
	unset($mensagem);
 
}
 
$condition = array(
		'user_id' => $login_user_id,
		'credit > 0',
		'pay' => 'Y',
		);
$money = Table::Count('invite', $condition, 'credit');
$count = Table::Count('invite', $condition);

$systeminvitecredit = $INI['system']['invitecredit'] ;
$creditinvite 		=  $INI['credit']['invite'] ;



?>