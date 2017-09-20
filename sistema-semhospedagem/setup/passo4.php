<?php

/**
 * Error reporting
 */
 
$servername = $_SERVER['SERVER_NAME'];
 
//error_reporting(E_ALL | E_STRICT);

require_once( dirname(dirname(__FILE__)) . '/app_setup.php');
  
              
if($_POST["id"]=="04"){
	
	$error = false;
	$system = Table::Fetch('system', 1);

	if ($_POST) {
		 
		 //email
		$INI = Config::MergeINI($INI, $_POST);
		$INI = ZSystem::GetUnsetINI($INI);
		 save_config();
		$value = Utility::ExtraEncode($INI);
		$table = new Table('system', array('value'=>$value));
		if ( $system ) $table->SetPK('id', 1);
		$flag = $table->update(array( 'value'));
	 
		
		$_POST['other']['pay'] = stripslashes($_POST['other']['pay']);
		$INI = Config::MergeINI($INI, $_POST);
		$INI = ZSystem::GetUnsetINI($INI);
		save_config();
	
		// epay
		$value = Utility::ExtraEncode($INI);
		$table = new Table('system', array('value'=>$value));
		if ( $system ) $table->SetPK('id', 1);
		$flag = $table->update(array( 'value'));
		
		// system
		$INI = Config::MergeINI($INI, $_POST);
		$INI = ZSystem::GetUnsetINI($INI);
		$INI['system']['gzip'] = abs(intval($INI['system']['gzip']>0));
		$INI['system']['partnerdown'] = abs(intval($INI['system']['partnerdown']>0));
		$INI['system']['conduser'] = abs(intval($INI['system']['conduser']>0));
		$INI['system']['currencyname'] = strtoupper($INI['system']['currencyname']);

		save_config();

		$value = Utility::ExtraEncode($INI);
		$table = new Table('system', array('value'=>$value));
		if ( $system ) $table->SetPK('id', 1);
		$flag = $table->update(array( 'value'));
	
		 // criando o usuário admin
		 
		 $senha 	= $_REQUEST['senhaadmin'];
		 $senha 	= ZUser::GenPassword($senha);
		 $ip 		= Utility::GetRemoteIp();
		  
		// $sql	="INSERT INTO `user` (`email`, `username`, `realname`, `password`, `avatar`, `gender`, `newbie`, `mobile`, `qq`, `money`, `score`, `zipcode`, `address`, `city_id`, `enable`, `manager`, `secret`, `recode`, `sns`, `ip`, `login_time`, `create_time`, `fb_userid`, `fl_facebook`, `twitter_userid`, `cpf`, `senha`) VALUES ('".$_REQUEST['emailadmin']."', '".$_REQUEST['loginadmin']."','".$_REQUEST['nomeadmin']."', '".$senha."', NULL, 'M', 'N', '', '', 0.00, 20, '--------', '', 0, 'Y', 'Y', '', 'd2f27b112ef30b54683fa32240f6ef42', NULL, '".$ip ."', 1294999432, 1294999432, NULL, 'new', NULL, '', '".$_REQUEST['senhaadmin']."')";
		 
		  $sql	=  " delete from user where id = 1"; 
		 $rs 	=  mysql_query($sql);
		 
	 
		 $sql	= 
		 " 
		INSERT INTO `user` ( `id`,`email`, `username`, `realname`,   `password`, `senha`,`manager` ) VALUES
		( 1,'".$_REQUEST['emailadmin']."', '".$_REQUEST['loginadmin']."', '".$_REQUEST['nomeadmin']."',  '$senha', '".$_REQUEST['senhaadmin']."','Y' );
		 "; 
		$rs 	=  mysql_query($sql);
		
		 if(!$rs){
			$error=  "Erro na criação do seu usuário de administrador.";	 
			$msqerro = mysql_error(); 
		 }
		 else{
		 
			$idusuario = mysql_insert_id();
				
			 $sql	= 
			 " 
			 INSERT INTO `partner` ( id, `numero`, `cidade`, `bairro`, `pagseguro`, `cep`, `estado`, `username`, `password`, `title`, `group_id`, `homepage`, `city_id`, `bank_name`, `bank_no`, `bank_user`, `location`, `contact`, `image`, `image1`, `image2`, `phone`, `address`, `other`, `mobile`, `open`, `enable`, `head`, `user_id`, `create_time`, `longlat`, `display`, `chavesms`, `tipo`, `bannerparceiro`, `cpf`) VALUES
			 ( $idusuario, '2772', 'belo horizonte', 'Barro Preto', NULL, '30411244', 'MG', '".$_REQUEST['emailadmin']."', '".$_REQUEST['senhaadmin']."', '".$_REQUEST['nomeadmin']."', 0, NULL, 1, NULL, NULL, NULL, '',  '".$_REQUEST['emailadmin']."', NULL, NULL, NULL, '2345-6678', 'rua ceará', NULL, '2345-6678', 'N', 'Y', 0, 2, 1346623484, NULL, 'Y', NULL, 'parceiro', NULL, '0000000001-91');
			 "; 
			 $rs 	=  mysql_query($sql);
			
			 if(!$rs){
				$error .=  "Erro na criação do anunciante do administrador.";	 
				$msqerro =  mysql_error(); 
			 }
		 
		} 
	
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Setup Vipcom</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
  <link rel="stylesheet" href="css/layout.css" type="text/css" media="all">
  <link rel="stylesheet" href="css/style.css" type="text/css" media="all">
  <script type="text/javascript" src="js/jquery-1.4.2.min.js" ></script>
  <script type="text/javascript" src="js/cufon-yui.js"></script>
  <script type="text/javascript" src="js/cufon-replace.js"></script>  
<script type="text/javascript" src="js/Avanti_400.font.js"></script>
<script type="text/javascript" src="js/Century_Gothic_400.font.js"></script>
 
<script src="../media/js/index.js" type="text/javascript"></script>
    
  <!--[if lt IE 7]>
     <script type="text/javascript" src="http://info.template-help.com/files/ie6_warning/ie6_script_other.js"></script>
  <![endif]-->
  <!--[if lt IE 9]>
  	<script type="text/javascript" src="js/html5.js"></script>
  <![endif]-->
</head>

<body id="page7">
<div class="tail-top"><div class="bgtopo"></div>
    <div class="main">
        <header> 
             <h1><a href="index.php"></a></h1>
            <div class="inside">
                <div class="container"><nav>
                    <ul class="menu"> 
                        <li id="menu1"><a href="index.php"><em><b> Requisitos </b></em></a></li>
                        <li id="menu2"><a href="passo2.php?id=02"><em><b>Instalando</b></em></a></li>
                        <li id="menu3"><a href="#"><em><b>Configurando</b></em></a></li> 
                        <li id="menu4"><a href="#"><em><b>Finalizando</b></em></a></li>
						 
                    </ul>
                </nav></div>
            </div>
        </header>
        <section id="content" class="p-1">
            <div class="inside1">
             
                  	 <div class="tail"></div>
                     
                     <h3> <?=utf8_decode("Seu sistema  já está configurado e pronto pra usar")?></h3>
                     <? if($error!=""){?>
                     	<h3 style="background:red;height:43px;color:#FFF"><?=utf8_decode($error)?></h3>
                     	<?php echo utf8_decode($msqerro); ?><br><br>
                       <?=utf8_decode("Por favor, entre com usuário: admin e senha: 1234567890")?>
                     <? } ?>
                    
                	 <div style="margin:20px; line-height:19px;"><h4>&nbsp;</h4>
                    <h3><?=utf8_decode(" O que você quer fazer agora")?> </h3>
						<a  style="color:#00C" target="_blank" href="<?=$INI['system']['wwwprefix']?>/"><img src="../skin/padrao/icones/Places-user-home-icon.png"  title="Apenas ir para o site" alt="Apenas ir para o site">  </a>   <a  style="color:#00C"  target="_blank" href="<?=$INI['system']['wwwprefix']?>/vipmin"> <img src="../skin/padrao/icones/paineladmin.png"   title="<?=utf8_decode("ir para a administração do site")?>" alt="<?=utf8_decode("ir para a administração do site")?>"></a>  
                     </div>
                      
			<a href="#" class="link"> </a>
            </div>
        </section>
        <footer>      
            <div class="inside"></div>
        </footer>
        <!-- coded by Ann -->
    </div>
</div>
    
<script type="text/javascript"> Cufon.now(); </script>
</body>
</html>

<script language="javascript">
  
$("#menu1").attr("class","")
$("#menu2").attr("class","")
$("#menu3").attr("class","")
$("#menu4").attr("class","current")

function Proximo(){
	
	document.getElementById("form").submit();
	
}

function Atualizar(){
	 
	location.href="passo3.php"
	
}

</script>

<?php }

else{
 	header("Location: index.php");
}
?>
