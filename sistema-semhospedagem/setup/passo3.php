<?php

/**
 * Error reporting
 */
error_reporting(E_ALL | E_STRICT);

set_time_limit(0);

require_once( dirname(dirname(__FILE__)) . '/include/application.php');
 
          
if($_POST["id"]=="03"){
	
$error = false;
 
$db = $_POST['db'];
$m = mysql_connect($db['host'], $db['user'], $db['pass']);

if(!$m){
	$error .=  "Nao foi possivel conectar no servidor com os dados informados."; 
	redirect('passo2.php?id=02&error='.$error);
}

if ( !mysql_select_db($db['name'], $m)  && !mysql_query("CREATE database `{$db['name']}`;", $m) ) {
	$error .=  "Nao foi possivel conectar neste banco de dados. Este banco de dados nao existe no seu servidor e nao conseguimos cria-lo. Desculpe, crie manualmente."; 
	redirect('passo2.php?id=02&error='.$error);
}

  
mysql_select_db($db['name'], $m);

$dir =  dirname(dirname(__FILE__));
$sql = '';
$f = file($dir . '/vipcomdump.sql');

if(!$f){
    $error .=  "O arquivo ".$dir . "/vipcomdump.sql nao existe ou esta vazio. Nao foi possivel criar as tabelas."; 
	redirect('passo2.php?id=02&error='.$error);

}

foreach($f AS $l) {
	if ( strpos(trim($l), '--')===0 || strpos(trim($l), '/*') === 0 || !trim($l)) {
		continue;
	}
	$sql .= $l;
}

mysql_query("SET names UTF8;");


$sqls = explode(';', $sql);
$errosql = "";
foreach($sqls AS $sql) {
	$sql = str_replace("\r\n"," ",trim($sql));
	if($sql!=""){
	$rs = mysql_query($sql, $m);
		if(!$rs){
			$errosql.=mysql_error();	
			//$error=1;
		}
	}
}

$PHP = $INI = array(
	'db' => $db,
);

$servername = $_SERVER['SERVER_NAME'];
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
<style type="text/css">
.tx {
	font-size: 11px;
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
                        <li id="menu2"><a href="passo2.php?id=02"><em><b>Instalando</b></em></a></li>
                        <li id="menu3"><a href="#"><em><b>Configurando</b></em></a></li> 
                        <li id="menu4"><a href="#"><em><b>Finalizando</b></em></a></li>
						
                    </ul>
                </nav></div>
            </div>
        </header>
        <section id="content" class="p-1">
            <div class="inside1">
            
              <?php if(!$error and $errosql ==""){?>
                    <a href="javascript:Proximo();" class="link-1"><em><b>Próximo</b></em></a>
                <?php }  ?>
                    
              <form id="form" method="post" action="passo4.php">
                   <input type="hidden" name="id" value="04" />
                      
                   <div class="wholetip clear"> 
					<?php
						 $msg="";
					   // if ( save_config() ) {
					    save_config();
						if ( 1==1 ) {
							
							if($errosql !=""){
								$msg.="<h3 style=background:red;height:43px;color:#FFF>Ouve erros na execução do SQL par criar as tabelas do banco de dados.</h3> 
								 <br><b>Sugerimos apagar todas as tabelas do banco e executar o aquivo vipcomdump.sql manualmente. Talvez sua versão de mysql não seja compatível com esse dump.  
								 
								 depois execute este sql no phpmyadmin para criacao do usuario administrador:<br>
								
								INSERT INTO `user` (`id`, `local`, `email`, `username`, `realname`, `bairro`, `password`, `avatar`, `gender`, `newbie`, `mobile`, `qq`, `money`, `score`, `zipcode`, `address`, `city_id`, `enable`, `manager`, `secret`, `recode`, `sns`, `ip`, `login_time`, `create_time`, `fb_userid`, `fl_facebook`, `twitter_userid`, `cpf`, `senha`, `estado`, `cidadeusuario`, `entrega_cep`, `entrega_endereco`, `entrega_numero`, `entrega_complemento`, `entrega_bairro`, `entrega_cidade`, `entrega_estado`, `entrega_telefone`, `cobranca_cep`, `cobranca_endereco`, `cobranca_numero`, `cobranca_complemento`, `cobranca_bairro`, `cobranca_cidade`, `cobranca_estado`, `cobranca_telefone`, `numero`, `complemento`) VALUES
								(1, '', 'suportevipcom@gmail.com', 'admin', 'admin', 'Lobato', '325825be566fa25abab599ff5e00442b', NULL, 'M', 'Y', '(27)2345-6678', NULL, 0.00, 700, '40480020', 'Rua  Sansuê', 1, 'Y', 'Y', 'aff1e1db94a260db2e6b079fb7c645e2', NULL, NULL, '192.168.0.2', 1346620888, 1346620888, NULL, 'registered', NULL, '00000000191', '1234567890', 'BA', 'Salvador', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2772', 'apto 541');

								<br>
								Então poderá entrar área da adminitração com os dados:
								<br>
								".$_SERVER['SERVER_NAME']."/vipmin
								<br>
								usuário: admin
								<br>
								senha: 1234567890
								
								<br>
								 Segue os erros abaixo: </b><br><br> ".$errosql;	
							}
							else{
								$msg.=  "<h3>Instalação do banco de dados feita com sucesso. Não se esqueça de renomeiar o diretório setup</h3> ";
							}
							echo $msg;
						}
				   ?>
                   <?php if($error!="" or $errosql !=""){?>
                   <br><br> 
                    <div id="obs" name="obs" style="background:red;color:#fff;font-size:12px;"></div>
                   <? }?>
                   </div>
                   
                 <?php if($error=="" and $errosql ==""){?>
                    
                   <div class="tail"></div>
                    <div class="wholetip clear">
                      <h1> Configurações Básicas</h1></div>
                     <div style="margin:20px; line-height:19px;"><h4>&nbsp;</h4>
                      <input type="hidden" name="id" value="04" />
                      <table width="781" border="0">
                      
                          <tr>
                            <td width="164" height="30">Email do Administrador</td>
                            <td width="607">  <input type="text" size="30" id="emailadmin" name="emailadmin" class="f-input" value=""/>
                            <span class="box">Para entrar no gerenciador</span></td>
                          </tr>
                          <tr>
                           <td height="30">Login</td>
                            <td>  <input type="text" size="30" id="loginadmin" name="loginadmin" class="f-input" value=""/>
                            <span class="box">Para entrar no gerenciador </span></td>
                          </tr>
                            <tr>
                           <td height="30">Nome</td>
                            <td>  <input type="text" size="30" id="nomeadmin" name="nomeadmin" class="f-input" value=""/>
                             </td>
                          </tr>
                          
                           <td height="30">Senha</td>
                            <td>  <input type="password" size="30"  id="senhaadmin" name="senhaadmin" class="f-input" value=""/>
                              <span class="box">Senha 
                            para entrar no gerenciador </span></td>
                          </tr>
                          
                           <tr>
                            <td width="164" height="30">Título do site</td>
                            <td width="607">  <input type="text" size="30" name="system[sitename]" id="sitename" class="f-input" value=""/></td>
                          </tr>
                          <tr>
                            <td height="30">Subtítulo</td>
                            <td>  <input type="text" size="30" name="system[sitetitle]" id="sitetitle" class="f-input" value=""/>
                            </td>
                          </tr>
                          <tr>
                            <td height="29">Google Analítics</td>
                            <td><input type="text" size="30" name="system[googleanalitics]"   class="f-input" value=""/></td>
                          </tr>
                           <tr>
                            <td height="32">Palavra Chave</td>
                            <td><input type="text" size="30" name="system[seochaves]" id="team-create-keyword" class="f-input" value="classificados, descontos, anúncios" />
                             <span class="box">separe as palavras chaves por vírgula.</span></td>
                          </tr>
                      
                          <tr>
                            <td height="27">Descrição do Site</td>
                            <td>
                            <input type="text" size="30"   name="system[seodescricao]" id="team-create-description" class="f-input" value="<?=$servername .", O seu site de classificados de todos os dias. Anuncie aqui você também. São milhares de ofertas diárias." ?>" />
                             </td>
                          </tr>
                          
                              <tr>
                            <td height="30">Twitter</td>
                            <td><span class="field">
                              <input type="text" size="30" name="other[twitter]" class="f-input"/>
                              </span><span class="box">Ex: http://www.twitter.com/VipcomColetivas </span></td>
                          </tr>
                          <tr>
                            <td height="29">Facebook</td>
                            <td><span class="field">
                              <input type="text" size="30" name="other[facebook]" class="f-input"/>
                              <span class="box">Ex:
                              http://www.facebook.com/profile.php?id=100002078605414 </span></span></td>
                          </tr>
                      
                          
                           <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp; </td>
                          </tr>
					 </table>
                     
                    </div>
                    
                   <div class="tail"></div>
                    <div class="wholetip clear">
                      <h1> Configurações de Email</h1></div>
                     <div style="margin:20px; line-height:19px;"><h4>&nbsp;</h4>
                      <input type="hidden" name="id" value="04" />
                        <table width="781" height="202" border="0">
                          <tr>
                            <td width="210">Forma de envio </td>
                            <td width="561">  <input name="mail[mail]" id="tipomail" type="radio" value="smtp" />&nbsp;SMTP&nbsp;<input type="radio" name="mail[mail]"  id="tipomail" value='mail'  checked />&nbsp;PHP MAIL 
                             </td>
                          </tr>
                          <tr>
                            <td>Servidor smtp</td>
                            <td> <input type="text" size="30" name="mail[host]" id="host" class="f-input" value="" /></td>
                          </tr>
                          <tr>
                            <td>Porta smtp</td>
                            <td><input type="text" size="30" name="mail[port]" id="port" class="number" value="587"/>
                            <span class="box">                            Normalmente porta 25 para outras hospedagens ,ou se for SSL porta 465</span></td>
                          </tr>
                          <tr>
                            <td>Username(email)</td>
                            <td><input type="text" size="30" name="mail[user]" id="user" class="f-input" value=""  /></td>
                          </tr>
                           <tr>
                            <td>Senha do email</td>
                            <td> <input type="password" size="30" name="mail[pass]" id="pass" class="f-input" value=""  /></td>
                          </tr>
                      
                          <tr>
                            <td>Remetente do email</td>
                            <td> <input type="text" size="30" name="mail[from]" id="from" class="f-input" value=""/>
                            <span class="box">Email que vai ser mostrado para o destinatário</span></td>
                          </tr>
                           <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp; </td>
                          </tr>
					 </table>
                     
                    </div>
               
					<div class="tail"></div>
                    
                   <?php  } ?>
					  
                  <?php if(!$error and $errosql ==""){?>
                    	<a href="javascript:Proximo();" class="link-1"><em><b>Próximo</b></em></a>
                    <?php }  ?>
                     
                        <input type="hidden" size="30" name="other[usuario_twitter]" class="f-input" value="VipcomColetivas"/> 
                        <input type="hidden" size="30" name="other[box-facebook]" class="f-input" value="http://www.facebook.com/VipcomColetiva"/>	
                        <input type="hidden" size="30"  name="option[email_home]" class="f-input" value="Y"/>	
                        <input type="hidden" size="30"  name="option[bloco_tkdeveloper]" class="f-input" value="N"/>	
                        <input type="hidden" size="30"  name="option[botaocomprar]" class="f-input" value="Y"/>	
                        <input type="hidden" size="30"  name="option[bloco_googlemaps]" class="f-input" value="Y"/>	
                        <input type="hidden" size="30" name="option[convidados_newsletter]" class="f-input" value="Y"/>	
                        <input type="hidden" size="30"  name="option[bloco_convide]" class="f-input" value="N"/>	 	
                        <input type="hidden" size="30" name="option[bloco_parceiro]" class="f-input" value="N"/>	
                        <input type="hidden" size="30"  name="option[bloco_maisbuscadas]" class="f-input" value="N"/>	
                        <input type="hidden" size="30" name="option[bloco_anuncie]" class="f-input" value="N"/>	
                        <input type="hidden" size="30" name="option[convidados_newsletter]" class="f-input" value="Y"/>	
              		    <input type="hidden" size="30" name="system[currency]" class="number" value="R$"/>
               			<input type="hidden" size="30" name="system[currencyname]" class="number" value="BRL"/>
               			<input type="hidden" size="30" name="option[modelo]"   value="2"/>
               			<input type="hidden" size="30" name="option[bloco_banners]"   value="Y"/>
               			<input type="hidden" size="30" name="option[bloco_rank]"   value="N"/> 
						
               			<input type="hidden" size="30" name="other[colormenusuperior]" value="#094281"/>
               			<input type="hidden" size="30" name="other[colormenusuperiorhover]" value="#094281"/>
               			<input type="hidden" size="30" name="other[colormenusuperiorborder]" value="#224774"/>
               			<input type="hidden" size="30" name="other[background_titulo_destaque]" value="#303030"/> 
               			<input type="hidden" size="30" name="other[botaodetalhe]" value="#222222"/> 
               			<input type="hidden" size="30" name="other[botaodetalhehover]" value="#303030"/> 
               			<input type="hidden" size="30" name="other[colortitulocidade]" value="#0f0f0f"/>
               			<input type="hidden" size="30" name="other[coloremailofertas]" value="#000000"/>
               			<input type="hidden" size="30" name="other[colorfundocidades]" value="#336105"/>
               			<input type="hidden" size="30" name="other[colortextoh3]" value="#a1e042"/>
               			<input type="hidden" size="30" name="other[color_destaque_titulo]" value="#244973"/>
               			<input type="hidden" size="30" name="other[color_destaque_titulo_txt]" value="#FFF"/>
               			<input type="hidden" size="30" name="other[color_destaque_botao]" value="#CACFDC"/>
               			<input type="hidden" size="30" name="other[color_detalhe_oferta_home]" value="#E7E9EF"/>
               			<input type="hidden" size="30" name="other[color_detalhe_oferta_home_txt]" value="#303030"/>
               			<input type="hidden" size="30" name="other[oferta_valor]" value="#000"/>
               			<input type="hidden" size="30" name="other[color_qtd_vendido]" value="#FF7300"/>
               			<input type="hidden" size="30" name="other[color_contadornovo]" value="#80B300"/>
               			<input type="hidden" size="30" name="other[color_fundo_meio_rodape]" value="#03254B"/> 
               			<input type="hidden" size="30" name="other[cor_letra_topo]" value="#fff"/> 
               			<input type="hidden" size="30" name="other[rodapedetalhe]" value="#F2F2F2"/>  
               			<input type="hidden" size="30" name="other[color_fundo_laterais_rodape]" value="#f1f6f9"/>  
               			<input type="hidden" size="30" name="other[background_titulos]" value="#F1F1F1"/>  
               			<input type="hidden" size="30" name="other[background_oferta_nacional]" value="#B33191"/>  
               			<input type="hidden" size="30" name="other[fundooferta]" value="#fff"/>  
               			<input type="hidden" size="30" name="other[topodetalhe]" value="url(/skin/padrao/background/body-bg11.png)"/>  
              </form>
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
$("#menu2").attr("class","")
$("#menu3").attr("class","current")
$("#menu4").attr("class","")

function Proximo(){
	
	if(document.getElementById("emailadmin").value==""){
		alert("Por favor, informe o email do administrador");
		document.getElementById("emailadmin").focus();
		return	
	 }
	 
	 if(document.getElementById("loginadmin").value==""){
		alert("Por favor, informe o login do administrador");
		document.getElementById("loginadmin").focus();
		return	
	 }
	 
	  if(document.getElementById("nomeadmin").value==""){
		alert("Por favor, informe o nome do administrador");
		document.getElementById("nomeadmin").focus();
		return	
	 }
	 
	  if(document.getElementById("senhaadmin").value==""){
		alert("Por favor, informe a senha do administrador");
		document.getElementById("senhaadmin").focus();
		return	
	 }
	  
	  if(document.getElementById("sitename").value==""){
		alert("Por favor, informe o título do site");
		document.getElementById("sitename").focus();
		return	
	 }
	 
	 if(document.getElementById("sitetitle").value==""){
		alert("Por favor, informe o subtítulo do site");
		document.getElementById("sitetitle").focus();
		return	
	 }
	 
	 if(document.getElementById("from").value==""){
		alert("Por favor, informe o remetente do email");
		document.getElementById("from").focus();
		return	
	 }
	  
    alert("Você pode alterar todas estas configurações pela administração, caso desejar.")
	document.getElementById("form").submit();
	
}

 
</script>

<?php }

else{
 	header("Location: index.php");
}
?>
