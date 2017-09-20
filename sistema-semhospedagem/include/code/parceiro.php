<?php

header('Content-Type: text/html; charset=ISO-8859-1');

if($_POST["acao"] == "enviadados"){
  
	 $body = 
	"<h2> Formul&aacute;rio de Contato de Parceria</h2><br>
	<h3> Dados Gerais</h3>

	<p>Nome: ".utf8_decode($_REQUEST["nome"])."</p>
	<p>Sobrenome:	".utf8_decode($_REQUEST["sobrenome"])."</p>
	<p>Empresa: ".utf8_decode($_REQUEST["empresa"])."</p>
	<p>Email: ".$_REQUEST["email"]."</p> 

	<h3> Dados do Neg&oacute;cio</h3>

	<p>Categoria: ".utf8_decode($_REQUEST["categoria"])."</p>
	<p>Telefone: ".$_REQUEST["telefoneparceiro"]."</p> 
	<p>Site: ".$_REQUEST["site"]."</p>
	<p>Endere&ccedil;o: ".utf8_decode($_REQUEST["enderecoparceiro"])."</p> 
	<p>Estado: ".utf8_decode($_REQUEST["websites3parceiro"])."</p>
	<p>Cidade: ".utf8_decode($_REQUEST["cidade"])."</p>
	<p>Bairro: ".utf8_decode($_REQUEST["bairroparceiro"])."</p>
	<p>Cep: ".$_REQUEST["cepparceiro"]."</p>

	<h3> Outras Informa&ccedil;&oatilde;es</h3>

	<p>Mais Informa&ccedil;&otilde;es: ".utf8_decode($_REQUEST["informacoes"])."</p>" ;
	 
	if($INI['mail']['mailparceria'] != ""){
		$para = $INI['mail']['mailparceria']; 
	}
	else if($INI['mail']['mail'] == "smtp"){
		$para = $INI['mail']['user'];  
	}
	else{
		$para = $INI['mail']['mailparceria'];
	}
    
	 if(enviar( $para,"Contato de Parceria",utf8_encode($body))){
		 $enviou =  true;
 	 }
 	 else{
		$enviou =  false;
	 }
}



?>