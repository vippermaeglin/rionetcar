<?php

require_once "./app.php";
 
$idoferta = strval($_REQUEST['idoferta']);
$nome_proposta = strval($_REQUEST['nome_proposta']); 
$email_proposta = strval($_REQUEST['email_proposta']);
$ddd_proposta = strval($_REQUEST['ddd_proposta']);
$telefone_proposta = strval($_REQUEST['telefone_proposta']);
$proposta = strval($_REQUEST['proposta']);
$chkFinanciar = strval($_REQUEST['chkFinanciar']);
$chkTroca = strval($_REQUEST['chkTroca']);
$chkCopia = strval($_REQUEST['chkCopia']);
$chkPromo = strval($_REQUEST['chkPromo']);
$financiar_parcelas = strval($_REQUEST['financiar_parcelas']);
$financiar_entrada = strval($_REQUEST['financiar_entrada']);
$financiar_valor = strval($_REQUEST['financiar_valor']);
$team  = Table::Fetch('team',$idoferta);
 

if($chkFinanciar=="Financiar"){
$proposta=
"
<h3>Proposta de Financiamento</h3>
<b>Valor a financiar:</b> $financiar_valor<br>
<b>Entrada:</b> $financiar_entrada<br>
<b>Parcelas:</b> $financiar_parcelas<br><br>".$proposta;
} 
if($chkCopia=="Carro"){
	$proposta="Caso tenha interesse, gostaria de estar dando como o meu veículo na troca.<br><br>".$proposta;
} 

if($ddd_proposta=="DDD"){
	$ddd_proposta="";
}
if($telefone_proposta=="Telefone"){
	$telefone_proposta="";
} 
$user_id = $team['partner_id'];
$user  = Table::Fetch('user',$user_id);
	  
if ( $_POST ) { 
	session_start(); 
	
	if(!(isset($_POST['formMobile']))) {
		
		if ($_POST['captcha'] == $_SESSION['cap_code']) {
			  // Captcha CORRETO
		} else { 
				echo  utf8_encode("O código da imagem está errado.");
				exit;
		} 
	}
	$dominio = getDomino($email_proposta);
	
	if(!checkdnsrr ($dominio)){
			echo  utf8_encode("Por favor, informe um email válido");
			exit;
	}
	
	$city_id=0;
	if($chkPromo=="Promo"){
		ZSubscribe::Create($email_proposta, $city_id);
	}

	include("templates/template_new.class.php");

	
	$dataenvio = date("d/m/Y H:i:s");
	$team  = Table::Fetch('team',$idoferta);
	$link = $INI['system']['wwwprefix']."/produto/". $idoferta."/".urlamigavel( tratanome(buscaTituloAnuncio($team)));
	$user  = Table::Fetch('user',$team['partner_id']);

	$template = new Template_new('templates/envioproposta.html');
	$template->set("baseurl", $ROOTPATH);
	$template->set("nomesite", $INI['system']['sitename']);
	$template->set("username", $user['realname']);
	$template->set("nomeproposta", $nome_proposta);
	$template->set("teamid", $idoferta);
	$template->set("teamtitle", $team['title']);
	$template->set("teamanomodelo", $team['modelo_ano']);
	$template->set("teamprice", number_format($team['team_price'], 2, ',', '.'));
	$template->set("emailproposta", $email_proposta);
	$template->set("dddproposta", $ddd_proposta);
	$template->set("telefoneproposta", $telefone_proposta);
	$template->set("dataenvio", $dataenvio);
	$template->set("mensagem", $proposta);
	$template->set("link", $link);
	$template->set("helpmail", $INI['mail']['helpemail']);
	$template->set("veiculotroca", $veiculotroca );


	//echo $template->output();
	//exit;

	if(enviar( $user['email'],ASSUNTO_PROPOSTA,utf8_decode($template->output()))){
			$enviado=true;
	}
	
	if($chkCopia=="Copia"){
		$mensagem = "Esta é uma c&oacute;pia da proposta enviada para o vendedor do ve&iacute;culo.<br><br>".$template->output();
		enviar( $email_proposta,ASSUNTO_PROPOSTA,utf8_decode($mensagem));		 
	}

	$mensagem="";
	unset($mensagem);
	
	$data = date("Y-m-d H:i:s");
  
	$insert = array(
	'idoferta', 'nome_proposta', 'email_proposta', 'ddd_proposta',
	'telefone_proposta', 'proposta', 'data', 'user_id', 
	);
	
	$propostas = $_POST;
	
	$propostas['data'] = $data;
	$propostas['user_id'] = $team['partner_id'];
	
	$table = new Table('propostas', $propostas);
	
	if (  !$enviado ) {
		echo utf8_encode("Sua proposta não foi enviada por email, você pode tentar entrar em contato com o anunciante pelo email ".$partner['contact']) ;	
	}
	else if ( !$table->insert($insert) and $enviado ) {
		echo utf8_encode("Sua proposta foi enviada por email, mas não conseguimos salvá-la. ".mysql_error()) ;
	}
	
	 

}
 
