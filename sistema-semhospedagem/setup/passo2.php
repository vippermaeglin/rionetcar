<?php

/**
 * Error reporting
 */
error_reporting(E_ALL | E_STRICT);

require_once( dirname(dirname(__FILE__)) . '/include/application.php');
 

if($_REQUEST["id"]=="02"){
   $db = array(
		'host' => 'localhost',
		'user' => 'root',
		'pass' => '',
		'name' => '',
	);
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <title> Setup Vipcom</title>
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
<style type="text/css">
.neg {
}
</style>
</head>

<body id="page7">
<div class="tail-top"><div class="bgtopo"></div>
    <div class="main">
        <header> 
             <h1><a href="index.php"></a></h1>
            <div class="inside">
                <div class="container"><nav>
                    <ul class="menu"> 
                        <li id="menu1"><a href="index.php"><em><b> Requisitos  </b></em></a></li>
						<li id="menu2"><a href="#"><em><b>Instalando</b></em></a></li>
                        <li id="menu3"><a href="#"><em><b>Configurando</b></em></a></li> 
                        <li id="menu4"><a href="#"><em><b>Finalizando</b></em></a></li>
						
                    </ul>
                </nav></div>
            </div>
        </header>
        <section id="content" class="p-1">
            <div class="inside1">
            
              <?php if(!$error){?>
                    <a href="javascript:Proximo();" class="link-1"><em><b>Próximo</b></em></a>
                <?php } 
                else{ ?>
                    <a href="javascript:Atualizar();" class="link-1"><em><b>Fiz a correção, atualize</b></em></a>
                    <a style="margin-left:5px; color:blue;" href="../phpinfo.php" target="_blank"> <span style="color:red"> clique aqui</span></a> para ver as configurações completas de seu servidor <br><br>
                <?php } ?>
                   
                <form id="form" method="post" action="passo3.php">
                <input type="hidden" name="id" value="03" />
                  
                   <div class="wholetip clear"> 
                    <?php if($error!=""){?>  
                      <div id="obs" name="obs" style="background:red;color:#fff;font-size:12px;">  </div>
                   <?}?>
                   </div>
                   
                   <div class="tail"></div>
                    <div class="wholetip clear"><h1> Configurações de Banco de Dados</h1></div>
					<div class="wholetip clear"><h3>Estes dados são fornecidos somente pela sua hospedagem</h3></div>
                    
                <div style="margin:20px; line-height:19px;"><h4>&nbsp;</h4>
                    
						<? if($_REQUEST["error"]){?><span style="background:red;height:43px;color:#FFF;font-size:14px;"><?php echo   $_REQUEST["error"]  ?></span><br><br> <? } ?>
                        
                    
                  <table width="781" height="222" border="0">
                        <tr>
                          <td width="155" height="33">Servidor </td>
                          <td width="616"><input type="text" size="30" name="db[host]" id="host" class="f-input" value="localhost" />
                            <span class="bg"><span class="box">Geralmente localhost ou nome do domínio</span></span></td>
                        </tr>
                        <tr>
                          <td height="31">Usuário</td>
                          <td><input type="text" size="30" name="db[user]" id="user" class="f-input" value="" /></td>
                        </tr>
                        <tr>
                          <td height="31">Senha</td>
                          <td><input type="password" size="30" name="db[pass]" id="settings-password2" class="f-input" value="" /></td>
                        </tr>
                        <tr>
                          <td height="32">Nome do banco</td>
                          <td><input type="text" size="30" name="db[name]" id="nomebanco" class="f-input" value="" /></td>
                        </tr>
                        <tr>
                          <td height="57">Url do site</td>
                          <td><input type="text" size="50" name="db[url]" id="url" class="f-input" value="http://<?php echo $_SERVER['SERVER_NAME']?>" />
                            <span class="bg"><span class="box">Url onde o sistema irá rodar. <br>
                            </span></span><span class="fleft">Se for em um subdiretório chamado teste então será: http:// <?php echo $_SERVER['SERVER_NAME']?> /teste </span></td>
                        </tr>
                          
                        <tr style="color:#303030;">
                          <td colspan="2" bgcolor="#CCFFCC"> <span class="neg"><span class="container1">Se o banco não existir, vamos tentar criá-lo.</span></span></td>
                        </tr>
</table>
                  </div>
              
              </form>
                     
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
$("#menu2").attr("class","current")
$("#menu3").attr("class","")
$("#menu4").attr("class","")

function Proximo(){
	if(document.getElementById("host").value==""){
		alert("Por favor, informe o nome do servidor");
		document.getElementById("host").focus();
		return	
	 }
	 if(document.getElementById("user").value==""){
		alert("Por favor, informe o nome do usuário");
		document.getElementById("user").focus();
		return	
	 }
	if(document.getElementById("nomebanco").value==""){
		alert("Por favor, informe o nome do banco de dados");
		document.getElementById("nomebanco").focus();
		return	
	 }
	 if(document.getElementById("url").value==""){
		alert("Por favor, informe a url");
		document.getElementById("url").focus();
		return	
	 }
	
	if(confirm("Nós estamos prestes a apagar todas as suas tabelas deste banco de dados caso existam. Você tem certeza disto ?")){
		document.getElementById("form").submit();
	}
}

function Atualizar(){
	 
	Proximo();
	
}

</script>

<?php }

else{
 	header("Location: index.php");
}
?>
