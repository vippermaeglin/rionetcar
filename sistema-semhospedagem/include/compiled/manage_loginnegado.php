<html xmlns="http://www.w3.org/1999/xhtml" id="<?php echo $INI['sn']['sn']; ?>">
	<head>
		<meta http-equiv=content-type content="text/html; charset=UTF-8">
		<title><?php echo $INI['system']['sitename']; ?> - Vipmin - Autenticação</title>
		<link rel="shortcut icon" href="/media/icon/favicon.ico" /> 
		<link rel="stylesheet" href="/media/css/login_otimizado.css" type="text/css" media="screen" charset="utf-8" /> 
		
		
		<script type="text/javascript" src="/media/js/jquery-1.4.2.min.js"></script> 
		 
		<link rel="stylesheet" type="text/css" href="/js/colorbox/colorbox.css"/> 
		<script type="text/javascript" src="/js/colorbox/jquery.colorbox-min.js"></script> 

		<script>
			window.DOM = { get: function(id) { return document.getElementById(id) } };
		</script>
		<style id="wrc-middle-css" type="text/css">
		 .wrc_whole_window{	display: none;	position: fixed; 	z-index: 2147483647;	background-color: rgba(40, 40, 40, 0.9);	word-spacing: normal;	margin: 0px;	padding: 0px;	border: 0px;	left: 0px;	top: 0px;	width: 100%;	height: 100%;	line-height: normal;	letter-spacing: normal;}.wrc_middle_main {	font-family: Segoe UI, Arial Unicode MS, Arial, Sans-Serif;	font-size: 14px;	width: 600px;	height: auto;	margin: 0px auto;	margin-top: 15%;    background: url(chrome-extension://icmlaeflemplmjndnaapfdbbnpncnbda/skin/images/background-body.jpg) repeat-x left top;	background-color: rgb(39, 53, 62);}.wrc_middle_logo {    background: url(chrome-extension://icmlaeflemplmjndnaapfdbbnpncnbda/skin/images/logo.jpg) no-repeat left bottom;    width: 140px;    height: 42px;    color: orange;    display: table-cell;    text-align: right;    vertical-align: middle;}.wrc_icon_warning {	margin: 20px 10px 20px 15px;	float: left;	background-color: transparent;}.wrc_middle_title {    color: #b6bec7;	height: auto;    margin: 0px auto;	font-size: 2.2em;	white-space: nowrap;	text-align: center;}.wrc_middle_hline {    height: 2px;	width: 100%;    display: block;}.wrc_middle_description {	text-align: center;	margin: 15px;	font-size: 1.4em;	padding: 20px;	height: auto;	color: white;	min-height: 3.5em;}.wrc_middle_actions_main_div {	margin-bottom: 15px;	text-align: center;}.wrc_middle_actions_blue_button {	-moz-appearance: none;	border-radius: 7px;	-moz-border-radius: 7px/7px;	border-radius: 7px/7px;	background-color: rgb(0, 173, 223) !important;	display: inline-block;	width: auto;	cursor: Pointer;	border: 2px solid #00dddd;}.wrc_middle_actions_blue_button:hover {	background-color: rgb(0, 159, 212) !important;}.wrc_middle_actions_blue_button:active {	background-color: rgb(0, 146, 200) !important;	border: 2px solid #00aaaa;}.wrc_middle_actions_blue_button div {	display: inline-block;	width: auto;	cursor: Pointer;	margin: 3px 10px 3px 10px;	color: white;	font-size: 1.2em;	font-weight: bold;}.wrc_middle_action_low {	font-size: 0.9em;	white-space: nowrap;	cursor: Pointer;	color: grey !important;	margin: 10px 10px 0px 10px;	text-decoration: none;}.wrc_middle_action_low:hover {	color: #aa4400 !important;}.wrc_middle_actions_rest_div {	padding-top: 5px;	white-space: nowrap;	text-align: center;}.wrc_middle_action {	white-space: nowrap;	cursor: Pointer;	color: red !important;	font-size: 1.2em;	margin: 10px 10px 0px 10px;	text-decoration: none;}.wrc_middle_action:hover {	color: #aa4400 !important;}
  
			a:link, a:visited, a:active {
				color: #FFFFFF;
				text-decoration: none;
			}
			.atencao {

				border: 2px solid #FAAA17;
				background-color: #E5E5E5;
				background-image: -moz-linear-gradient(#FBFBFB, #E5E5E5 30px);
				border-radius: 3px 3px 3px 3px;
				color: #444444;
				font-size: 12px;
				font-weight: bold;
				padding: 5px 5px 8px;
				text-shadow: 0 1px 0 #FFFFFF;
			}
			.valido {
				border: 2px solid #7CA00D;
				background-color: #E5E5E5;
				background-image: -moz-linear-gradient(#FBFBFB, #E5E5E5 30px);
				border-radius: 3px 3px 3px 3px;
				color: #444444;
				font-size: 12px;
				font-weight: bold;
				padding: 5px 5px 8px;
				text-shadow: 0 1px 0 #FFFFFF;
			}	
			.invalido {
				border: 2px solid #B1061D;
				background-color: #E5E5E5;
				background-image: -moz-linear-gradient(#FBFBFB, #E5E5E5 30px);
				border-radius: 3px 3px 3px 3px;
				color: #444444;
				font-size: 12px;
				font-weight: bold;
				padding: 5px 5px 8px;
				text-shadow: 0 1px 0 #FFFFFF;
			}
		</style>

	</head>
<body>	
 
								
<div id="preload_images"></div>


<input id="dest_uri" value="/" type="hidden">

<div style="opacity: 1; visibility: visible;text-align:center;" id="login-wrapper" class="login-whisp">
    <div id="notify">
        <noscript>
            <div class="error-notice">
                <img src="/cPanel_magic_revision_1335428098/unprotected/cpanel/images/notice-error.png" alt="Error" align="left"/>
                JavaScript desabilitado em seu navegador.
                Para Vipmin funcionar corretamente, você deve habilitar o JavaScript.
                Se você não ativar o JavaScript, algumas características no Vipmin não irá funcionar corretamente.
            </div>
			</noscript>

        <div id="login-status" class="error-notice" style="visibility: hidden">
            <span class="login-status-icon"></span>
            <div id="login-status-message"> </div>
        </div>
    </div>
 

    <div id="content-container">
        <div id="login-container">
            <div id="login-sub-container">
                <div id="login-sub-header">
				<? if($INI['option']['auth_setup']!="N"){?>
                    <img src="/media/css/i/logovi.png" alt="logo">
				<? } 
				else{?>
					<h2 style="color:#fff;">Autenticação</h2>
				<?}?>
                </div>
                <div id="login-sub">
                    <div id="forms">

                        
                        <form id="login_form" action="loginpos.php" method="post" target="_top">
                            <div class="input-req-login"><label for="user">Nome de Usuário</label></div>
                            <div class="input-field-login icon username-container">
                                <input name="username" id="username" autofocus="autofocus" value="" placeholder="Digite seu nome de usuário." class="std_textbox" tabindex="1" required="" type="text">
                            </div>
                            <div style="margin-top:30px;" class="input-req-login"><label for="pass">Senha</label></div>
                            <div class="input-field-login icon password-container">
                                <input name="password" id="password" placeholder="Digite a senha" class="std_textbox" tabindex="2" required="" type="password">
                            </div>
                            <div style="width: 285px;">
                                <div class="login-btn">
                                    <button name="login" onclick="javascript:entrar();" type="button" id="login_submit" tabindex="3">Entrar</button>
									<div class="divsenha" style="float: right; margin-left:32px;"><a class='tk_esquecisenha' href="#">Esquecí minha senha</a></div>
                                </div>

                                                            </div>
                            <div class="clear" id="push"></div>
                        </form>

                    <!--CLOSE forms -->
                    </div>

                <!--CLOSE login-sub -->
                </div>
            <!--CLOSE login-sub-container -->
            </div>
        <!--CLOSE login-container -->
        </div>
	
	<? if($INI['option']['auth_setup']!="N"){?>
	
        <div style="display: block;" id="locale-footer">
            <div class="locale-container">
            
                <ul id="locales_list">
                     
                        <li><a target="_blank" href="http://www.sistemacomprascoletivas.com.br/sistemacompracoletiva/nossos-produtos/plano-de-email-marketing/">Planos de Email Marketing</a></li>
                    
                        
                        <li><a target="_blank" href="http://www.sistemacomprascoletivas.com.br/sistemacompracoletiva/nossos-produtos/marketing-propaganda/templates-para-newsletter/">Criação de Campanhas</a></li>
                    
                        
                        <li><a  target="_blank" href="http://www.sistemacomprascoletivas.com.br/sistemacompracoletiva/nossos-produtos/marketing-propaganda/vipcom-arte/">Arte para Ofertas</a></li>
                    
                        
                        <li><a  target="_blank" href="http://www.sistemacomprascoletivas.com.br/sistemacompracoletiva/nossos-produtos/marketing-propaganda/vipcom-arte/">Logotipo</a></li>
                    
                        
                        <li><a  target="_blank" href="http://www.sistemacomprascoletivas.com.br/sistemacompracoletiva/nossos-produtos/marketing-propaganda/vipcom-banners/">Banners</a></li>
                    
                        
                        <li><a  target="_blank" href="http://www.sistemacomprascoletivas.com.br/sistemacompracoletiva/nossos-produtos/marketing-propaganda/redes-sociais/">Marketing Redes Sociais</a></li>
						
                        <li><a  target="_blank" href="http://www.agrupi.com/">Agregador de Ofertas</a></li>
                     
                </ul>
            </div>
        </div>
	<? } ?>
    
	</div>
<!--Close login-wrapper -->
</div>


	 <!-- DIV PARA ESQUECI SENHA -->
	 <div style='display:none'>
		 <div id='inline_esquecisenha' style='background:#fff; height:110px; padding:10px; width:345px !important'>
			<div>
				<form method="POST" id="formauth" style="width: 345px !important">
					<div style="float: left; width: 235px;">
							<div style="margin-bottom: 5px;"><span style="color:303030;font-size:12px;">E-mail</span></div>
							<input type="text" value="Insira seu e-mail" onblur="if(this.value=='') this.value='Insira seu e-mail'" onfocus="if(this.value =='Insira seu e-mail' ) this.value=''" id="email" 	style="width:184px;"	name="email">
					 </div>
					<div style="float: left; padding-top: 20px; width: 88px;"> 
						<button style="box-shadow:0px;"  href="#" onclick="enviar();" type="button" id="login_submit" tabindex="3">Enviar</button>
					</div>
					 
					<div id="loading" style="clear: both;color:303030;font-size:12px;"> </div> 
					  
				</form>
			</div>
		</div>
   </div> 
   
</body>	

<script>
    // Homerolled.   We're not logged in and don't have access to cjt and yui.

        var MESSAGES = {
            "ajax_timeout" : "A conexão expirou. Por favor, tente novamente.",
            "authenticating" : "Redirecionando …",
            "changed_ip" : "O seu endereço de IP mudou. Faça o login novamente.",
            "expired_session" : "Sua sessão expirou. Faça o login novamente.",
            "invalid_login" : "O login é inválido.",
            "invalid_session" : "O cookie da sessão é inválida. Faça o login novamente.",
            "invalid_username" : "O nome de usuário apresentado é inválido.",
            "network_error" : "Erro de rede ao enviar o seu pedido de login. Por favor, tente novamente. Se esta condição persistir, contacte o seu fornecedor de serviços de rede.",
            "no_username" : "Você deve especificar um nome de usuário para login.",
            "prevented_xfer" : "A sessão não poderia ser transferido porque não estavam acessando este serviço através de uma conexão segura. Conecte-se agora para continuar.",
            "session_locale" : "The locale selected here will be in effect for the current browser session, regardless of your account’s saved locale preference.",
            "success" : "Login successful. Redirecting …",
            "token_incorrect" : "O token de segurança em seu pedido é inválido.",
            "token_missing" : "O token de segurança está faltando o seu pedido.",
            "": 0
    };
    delete MESSAGES[""];

		window.IS_LOGOUT = false;

    </script>
	  
   	<? if($INI['option']['auth_setup']!="N"){?> <div class="copyright">Este ambiente é melhor visualizado em navegadores Firefox e Google Chrome - Copyright © 2012 Vipcom, Inc.</div> <? } ?>
 
<script>
 
function enviar(){ 
	
	if(jQuery("#email").val() == "" ||  jQuery("#email").val() == "Insira seu e-mail" ){
	    alert("Por favor, informe seu email.");
		jQuery("#loading").html("");
		document.getElementById("email").focus();
		return;
	}
 
	jQuery.ajax({
		   type: "POST",
		   cache: false,
		   async: false,
		   url: "<?php echo $INI['system']['wwwprefix']?>/autenticacao/repass.php",
		   data: "email="+jQuery("#email").val(),
		   success: function(retorno){
		   
		   if(jQuery.trim(retorno)==""){  
				alert("Sua senha foi enviada com sucesso para o seu email")
			 } 
		   else {
			  	alert(retorno);
				jQuery("#loading").html("");
		   }
		}
	});
}

function entrar(){
	  
	if(jQuery("#username").val() == ""){
	    alert("Por favor, informe seu usuário."); 
		document.getElementById("username").focus();
		return;
	}
	if(jQuery("#password").val() == ""){
	    alert("Por favor, informe sua senha."); 
		document.getElementById("password").focus();
		return;
	}
	
	jQuery("#login-status-message").html("Realizando autenticação. Aguarde...");
	$("#login-status").attr("class","atencao")
	$("#login-status").css("visibility", "visible"); 
	
	
	jQuery.ajax({
		   type: "POST",
		   cache: false,
		   async: false,
		   url: "login.php",
		   data: "username="+jQuery("#username").val()+"&password="+jQuery("#password").val(),
		   success: function(retorno){
		   
		   if(jQuery.trim(retorno)==""){  
		   
				jQuery("#login-status-message").html("Sucesso ! Direcionando para o painel de controle.");
				$("#login-status").attr("class","valido")  
				$("form#login_form").submit();
				 
			 } 
		   else {	
		   
				jQuery("#login-status-message").html("Falha na Autenticação.");
				$("#login-status").attr("class","invalido") 
				 
		   }
		}
	});
}

</script>

 <script>
jQuery(document).ready(function(){
	jQuery(".tk_esquecisenha").colorbox({inline:true, href:"#inline_esquecisenha",width:"450px",height:"210px"}); 
});
</script>

<?
	$txt =  'Atenção, esta área é apenas para anuciantes. \nO seu usuário é um administrador, desta forma, caso você queira acessar a administração, acesse '.$ROOTPATH.'/vipmin' ;
	
	if($loginnegado){?>
		 <script>alert('<?=$txt?>')</script>
 <? }
?>

</html>