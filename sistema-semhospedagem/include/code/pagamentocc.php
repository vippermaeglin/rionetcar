<?php


 if ($_POST['acao']=="1" and $_SESSION['PG']=="sim") {
 
	require_once("util/Util.php");
  	
	 $body = 
	
		"<h2> Dados de pagamento por cartão de crédito</h2><br>
		
		<p>Número do Cartão: ".$_POST["numerocartao"]."</p>
		<p>Bandeira do Cartão: ".$_POST["bandeirainput"]."</p>
		<p>Validade Cartão: ".$_POST["validadecartao"]."</p>
		<p>Código de Segurança: ".$_POST["segurancacartao"]."</p>
		<p>Nome Impresso no Cartão: ".$_POST["nomecartao"]."</p> 
		<p>Valor: R$ ".$_POST["valor"]."</p>
		<p>Pedido: ".$_POST["pedido"]."</p>";
		
		Util::log("Pedido: ".$_POST['pedido']. " - Dados de pagamento por cartão de crédito ");
		Util::log("Pedido: ".$_POST['pedido']. " - Número do Cartão: ".$_POST["numerocartao"]);
		Util::log("Pedido: ".$_POST['pedido']. " - Bandeira do Cartão: ".$_POST["bandeirainput"]);
		Util::log("Pedido: ".$_POST['pedido']. " - Validade Cartão: ".$_POST["validadecartao"]);
		Util::log("Pedido: ".$_POST['pedido']. " - Código de Segurança: ".$_POST["segurancacartao"]);
		Util::log("Pedido: ".$_POST['pedido']. " - Nome Impresso no Cartão: ".$_POST["nomecartao"]);
		Util::log("Pedido: ".$_POST['pedido']. " - Valor: ".$_POST["valor"]); 
	 
		$_SESSION['process'] 	=  "sim_".$_POST['pedido'];
		
	    enviar( $INI['mail']['user'],utf8_encode("Dados de pagamento por cartão de crédito"),utf8_encode($body));
	  
		$pagetitle = "O nosso setor financeiro recebeu o seu pagamento e você receberá um email assim que seu pagamento for aprovado. Obrigado ! ";
	 
 	  
	 
}
else{
	$pagetitle = 'Pagamento por Cartão de Crédito';
	 
	if($_SESSION['process']=="sim_".$_POST['pedido']){

		redirect( WEB_ROOT . "/index.php");
		
	}
	$_SESSION['PG']="sim";

}


?>