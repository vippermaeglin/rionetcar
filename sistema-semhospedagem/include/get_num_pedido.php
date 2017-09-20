<?php

include "../app.php"; 
 
$idnovopedido = get_num_pedido('normal');

if($_REQUEST['utm']=="0"){
	sleep(3);
}	 

$team = Table::Fetch('team', $_REQUEST['idoferta']);

$parametros = array( 'idoferta' => $team['idoferta'],'realname' => $login_user['realname'], 'nome' =>$team['title'] ,'quantity' => $_REQUEST['quantidade'] ,'origin' => $_REQUEST['valorpedido'],'remark' => $_REQUEST['remark']);
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

$emailadmin = $INI['mail']['user'];
if($INI['mail']['user']==""){
 $emailadmin = $INI['mail']['from'];
}
   
//emvia email para cliente
$mensagem = file_get_contents($INI["system"]["wwwprefix"]."/templates/confirmacao_pedido.php", false, $request);
enviar( $login_user['email'],ASSUNTO_NOVO_PEDIDO,$mensagem);

//emvia email para administrador
$assunto = utf8_encode("Notificação de novo pedido");
$mensagemadmin = file_get_contents($INI["system"]["wwwprefix"]."/templates/nova_solicitacao_pedido_admin.php", false, $request);
enviar( $emailadmin ,$assunto,$mensagemadmin);

$mensagem="";
unset($mensagem);
	
echo $idnovopedido;


?>