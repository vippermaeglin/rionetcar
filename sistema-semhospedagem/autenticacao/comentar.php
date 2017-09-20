<?php  
require_once(dirname(dirname(__FILE__)) . '/app.php');
require_once(dirname(dirname(__FILE__)) . '/util/Util.php');
   
if ( $_POST ) { 
		 
    $team = Table::Fetch('team', $_POST['team_id']);
		 
	$sql	="INSERT INTO `ask` (`user_id`, `team_id`, `city_id`, `type`, `comment`, `content`, `create_time`,`aprovado` ) VALUES (".$login_user_id.", '".$_POST['team_id']."','".$_POST['city_id']."', 'ask', '', '".htmlspecialchars($_POST['content'])."', Now(),'N')";
	$rs 	=  mysql_query($sql);
	if(!$rs){
		$error =  "Não foi possível cadastrar o seu comentário. Tente novamente mais tarde.";	 
		$msqerro = mysql_error(); 
		echo $error . " - ".$msqerro;
	}
	
	echo "====".print_r($login_user);
	
	$body = 
	"<h2>Comentário de Oferta Aguardando Moderação</h2><br>
	 <h3> Dados do Comentário</h3>
	
	<p>Oferta: ".$team['title']."</p>
	<p>Nome: ".$login_user['name']."</p>
	<p>Email: ".$login_user['email']."</p>";
	
	if($_POST['tel']){
		$body.= "<p>Telefone: ".$login_user['tel']."</p>";
	}
	 
	$body.= "<h3> Comentário</h3>
	<p>".htmlspecialchars($_REQUEST["content"])."</p>" ;

	if(enviar( $INI['mail']['user'],"[Comentário de Oferta Aguardando Moderação]",$body)){
		  $enviou =  true;
	}
 	
}



 