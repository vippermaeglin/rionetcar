<?php

  header('Content-Type: text/html; charset=ISO-8859-1');

 if ($_POST) {
 
	$table = new Table('feedback', $_POST);
	$table->city_id = abs(intval($city['id']));
	$table->create_time = time();
	$table->category = 'suggest';
	$table->title = htmlspecialchars($table->nome);
	$table->content = $_POST['txtMensagem'];
	$table->contact = htmlspecialchars($table->email); 
	
    $sql = "INSERT INTO `feedback` ( `city_id`, `user_id`, `category`, `title`, `contact`, `content`, `create_time`,cpfncpj,telefonecontato,assunto) VALUES
			( ".abs(intval($city['id'])).", ".$login_user_id.", 'suggest', '".htmlspecialchars($_POST['nome'])."', '".htmlspecialchars($_POST['email'])."', '".htmlentities($_POST['txtMensagem'])."', ".time().", '".htmlentities($_POST['cpfncpj'])."', '".$_POST['telefonecontato']."', '".htmlentities($_POST['assunto'])."')";
	 mysql_query($sql); 
	 
	$body = 
	    "<h2>Contato</h2><br>
		<h3> Dados do Contato</h3>
		<p>Nome: ".utf8_encode($_REQUEST["nome"])."</p>
		<p>Email: ".$_REQUEST["email"]."</p> 
		<p>CPF/CNPJ: ".$_POST['cpfncpj']."</p> 
		<p>Telefone: ".$_POST['telefonecontato']."</p> 
		<p>Assunto: ".utf8_encode($_POST['assunto'])."</p> 
		<h3> Mensagem</h3>
		
		<p>".utf8_encode($_REQUEST["txtMensagem"])."</p>" ;

	if($INI['mail']['mail'] == "smtp"){
		$para = $INI['mail']['user'];  
	}
	else{
		$para = $INI['mail']['from'];
	} 
	 if(enviar($para,"Fale Conosco",utf8_decode($body))){
		  $enviou =  true;
 	 }
 	 else{
		$enviou =  false;
	 } 
}
 
?>