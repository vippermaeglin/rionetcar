<?php

/**
 * Error reporting
 */
error_reporting(E_ALL | E_STRICT);

require_once( dirname(dirname(__FILE__)) . '/include/application.php');
header('Content-Type: text/html; charset=ISO8859-1;'); 

 
$writeable['configure'] 		= is_writable(dirname(dirname(__FILE__)) . '/include/configure/');
$writeable['configure_files'] 	= is_writable(dirname(dirname(__FILE__)) . '/include/configure/system.php');
$writeable['data']		 		= is_writable(dirname(dirname(__FILE__)) . '/include/data/');
$writeable['logo'] 				= is_writable(dirname(dirname(__FILE__)) . '/include/logo/'); 
$writeable['logofiles'] 	 	= is_writable(dirname(dirname(__FILE__)) . '/include/logo/logo.png'); 
$writeable['team'] 				= is_writable(dirname(dirname(__FILE__)) . '/media/team/');   
$writeable['parceiro'] 		 	= is_writable(dirname(dirname(__FILE__)) . '/media/parceiro/');   
$writeable['estatica'] 		 	= is_writable(dirname(dirname(__FILE__)) . '/media/estatica/');   
$writeable['slideshowbannersheader']  	= is_writable(dirname(dirname(__FILE__)) . '/media/slideshowbannersheader/');   
$writeable['slideshowbanners']  	= is_writable(dirname(dirname(__FILE__)) . '/media/slideshowbanners/');   
$writeable['superbackground']  	= is_writable(dirname(dirname(__FILE__)) . '/media/superbackground/');   
$writeable['paginas']  			= is_writable(dirname(dirname(__FILE__)) . '/media/paginas/');   
$writeable['log'] 				= is_writable(dirname(dirname(__FILE__)) . '/log/'); 
$writeable['tmp'] 				= is_writable(dirname(dirname(__FILE__)) . '/tmp/'); 
$writeable['uploads'] 			= is_writable(dirname(dirname(__FILE__)) . '/uploads/'); 
$writeable['skin'] 				= is_writable(dirname(dirname(__FILE__)) . '/skin/padrao/images/'); 
$writeable['upload'] 		 	= is_writable(dirname(dirname(__FILE__)) . '/skin/padrao/upload/'); 
$writeable['background'] 	 	= is_writable(dirname(dirname(__FILE__)) . '/skin/padrao/background/');  
$writeable['skinfiles'] 	 	= is_writable(dirname(dirname(__FILE__)) . '/skin/padrao/images/logo_footer.png');  


//$inis = ini_get_all();

//print_r($inis);
 
$erro_server_php = "";
$erro_server_apache = "";
$erro_diretivas_php="";
 
 if (version_compare(phpversion(), '5.2.0', '<')===true) {
   $erro_server_php .=   '<li><font color=red>Ops!, você está usando uma versão inválida de PHP para o nosso sistema.</h3></div><p>O Vipcom suporta PHP 5.2.0 ou superior.  .</font></li>';
    
}

 
// PHP: lista das extenções carregadas 
$php_loaded_extensions = (get_loaded_extensions() !== false) ? array_map('strtolower', get_loaded_extensions()) : array(); 

if(!$php_loaded_extensions or count($php_loaded_extensions)==0){
	$erro_server_php .=  "<li><font color=red>Não conseguimos encontrar nenhum módulo do seu php ou o php não está instalado</font></li>.";	
}


$allow_url_fopen	 	= ini_get("allow_url_fopen");
//$allow_url_include 		= ini_get("allow_url_include");
$short_open_tag 		= ini_get("short_open_tag");
$upload_max_filesize 	= ini_get("upload_max_filesize");
$upload_tmp_dir 		= ini_get("upload_tmp_dir");
$safe_mode 				= ini_get("safe_mode");
//$use_cookies 		    = ini_get("use_cookies");


if($allow_url_fopen!="on" and $allow_url_fopen!="1"){
	 $erro_diretivas_php .=  "<li><font color=red>A diretiva do php allow_url_fopen precisa estar ativada, veja no seu arquivo php.ini essa configuração.</font></li>.";	 
}
 
 /*
if($allow_url_include!="on" and $allow_url_include!="1"){
	$erro_diretivas_php .=  "<li><font color=red>A diretiva do php allow_url_include precisa estar ativada, veja no seu arquivo php.ini essa configuração.</font></li>.";	 
}
*/
if($short_open_tag!="on" and $short_open_tag!="1"){
	$erro_diretivas_php .=  "<li><font color=red>A diretiva do php short_open_tag precisa estar ativada, veja no seu arquivo php.ini essa configuração.</font></li>.";	 
}
 
 
if($safe_mode!="" and $safe_mode!="0"){
	$erro_diretivas_php .=  "<li><font color=red>A diretiva do php safe_mode precisa estar desativada, veja no seu arquivo php.ini essa configuração.</font></li>.";	 
}
/*
if($use_cookies!="on" and $use_cookies!="1"){
	$erro_diretivas_php .=  "<li><font color=red>A diretiva do php use_cookies precisa estar ativada, veja no seu arquivo php.ini essa configuração.</font></li>.";	 
}
*/
/** Módulos e extensões necessários */ 
$apache_modules_required = array 
( 
'mod_rewrite', 
'mod_php5' 
); 

$php_extensions_required = array 
( 
'mysql', 
'gd',  
'json', 
'curl', 
'session',
'mbstring'
); 

/** Apache: verifica se os módulos necessários foram carregados   
foreach ($apache_modules_required as $apache_module): 
      
	if (in_array($apache_module, $apache_loaded_modules) === false): 
		$erro_server_apache .=  "<li><font color=red>A extensão " . $apache_module . " do PHP não foi carregada.</font></li>"; 
		
	endif; 
	
endforeach; 
 */
 
 /** Apache: verifica se os módulos necessários foram carregados */ 
foreach ($php_extensions_required as $php_module): 
      
	if (in_array($php_module, $php_loaded_extensions) === false): 
		$erro_server_php .=  "<li><font color=red>A extensão " . $php_module . " do PHP não foi carregada.</font></li>"; 
		
	endif; 
	
endforeach; 

/*
echo '<h1>Apache</h1>'; 
echo '<pre>'; 
print_r($apache_loaded_modules); 
echo '</pre>'; 

echo '<h1>PHP</h1>'; 
echo '<pre>'; 
print_r($php_loaded_extensions); 
echo '</pre>';
*/

//Session::Init();

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
                        <li id="menu1"><a href="#"><em><b>Requisitos  </b></em></a></li>
                        <li id="menu2"><a href="#"><em><b>Instalando</b></em></a></li>
                        <li id="menu3"><a href="#"><em><b>Configurando</b></em></a></li> 
                        <li id="menu4"><a href="#"><em><b>Finalizando</b></em></a></li>
                    </ul>
                </nav></div>
            </div>
        </header>
        <section id="content" class="p-1">
            <div class="inside1">
             
               <br><br> 
 <?php if(!$error and !$erro_server_apache and !$erro_server_php  and !$erro_diretivas_php){?>
                    	<a href="javascript:Proximo();" class="link-1"><em><b>Próximo</b></em></a>
                         <script>
							document.getElementById("obs").style.display="none";
                         </script>
                    <?php } 
					else{ ?>
                    	<a href="javascript:Atualizar();" class="link-1"><em><b>Fiz a correção, atualize</b></em></a>
              		<?php } ?>
					
              <form id="form" method="post" action="passo2.php">
                   <input type="hidden" name="id" value="02" />
                  
                   <div class="wholetip clear"><h3> Instalação do sistema para <?php echo php_uname();?></h3>
                     <div id="obs" name="obs" style="background:red;color:#fff;font-size:12px;">  </div>
                   </div>
                   
                   <div class="tail"></div>
                    <div class="wholetip clear"><h1> Configurações de diretório</h1></div>
                    <div style="margin:20px; line-height:19px;"><h4>&nbsp;</h4>
                      <ul>
                        <li>Diretório include/configure/ ---------------- <?php if(!$writeable['configure']){$error=true; echo '<font color="red">Este diretório e todos os seus arquivos devem ter permissão de escrita</font>. ' ; }else{ echo '<font color="green">Ok, consigo escrever.</font>'; } ?></li>
                        <li>Diretório include/configure/ e todos os arquivos ---------------- <?php if(!$writeable['configure_files']){$error=true; echo '<font color="red">Agora você deve dar permissão de escrita em todos os arquivos do diretório</font>  ' ; }else{ echo '<font color="green">Ok, consigo escrever.</font>'; } ?> </li>
                    	<li>Diretório include/data/ ----------------  <?php if(!$writeable['data']){$error=true; echo '<font color="red">Este diretório deve ter permissão de escrita</font> ' ; }else{ echo '<font color="green">Ok, consigo escrever.</font>'; } ?> </li>
                       <li>Diretório include/logo/ ----------------  <?php if(!$writeable['logo']){$error=true; echo '<font color="red">Este diretório e todos os seus arquivos deve ter permissão de escrita</font>' ; }else{ echo '<font color="green">Ok, consigo escrever.</font>'; } ?> </li>
                    	<li>Diretório include/logo/logo.png ----------------  <?php if(!$writeable['logofiles']){$error=true; echo '<font color="red">Este arquivo deve ter permissão de escrita</font>' ; }else{ echo '<font color="green">Ok, consigo escrever.</font>'; } ?> </li>
                        <li>Diretório media/team/ ----------------  <?php if(!$writeable['team']){$error=true; echo '<font color="red">Este diretório deve ter permissão de escrita</font>' ; }else{ echo '<font color="green">Ok, consigo escrever.</font>'; } ?> </li>
                        <li>Diretório media/estatica/ ----------------  <?php if(!$writeable['estatica']){$error=true; echo '<font color="red">Este diretório deve ter permissão de escrita</font>' ; }else{ echo '<font color="green">Ok, consigo escrever.</font>'; } ?> </li>
                        <li>Diretório media/superbackground/ ----------------  <?php if(!$writeable['superbackground']){$error=true; echo '<font color="red">Este diretório deve ter permissão de escrita</font>' ; }else{ echo '<font color="green">Ok, consigo escrever.</font>'; } ?> </li>
                        <li>Diretório media/slideshowbannersheader/ ----------------  <?php if(!$writeable['slideshowbannersheader']){$error=true; echo '<font color="red">Este diretório deve ter permissão de escrita</font>' ; }else{ echo '<font color="green">Ok, consigo escrever.</font>'; } ?> </li>
                        <li>Diretório media/slideshowbanners/ ----------------  <?php if(!$writeable['slideshowbanners']){$error=true; echo '<font color="red">Este diretório deve ter permissão de escrita</font>' ; }else{ echo '<font color="green">Ok, consigo escrever.</font>'; } ?> </li>
                        <li>Diretório media/paginas/ ----------------  <?php if(!$writeable['paginas']){$error=true; echo '<font color="red">Este diretório deve ter permissão de escrita</font>' ; }else{ echo '<font color="green">Ok, consigo escrever.</font>'; } ?> </li>
                        <li>Diretório media/parceiro/ ----------------  <?php if(!$writeable['parceiro']){$error=true; echo '<font color="red">Este diretório deve ter permissão de escrita</font>' ; }else{ echo '<font color="green">Ok, consigo escrever.</font>'; } ?> </li>
                     	 <li>Diretório log/ ----------------  <?php if(!$writeable['log']){$error=true; echo '<font color="red">Este diretório deve ter permissão de escrita</font>' ; }else{ echo '<font color="green">Ok, consigo escrever.</font>'; } ?> </li>
                        <li>Diretório tmp/ ----------------  <?php if(!$writeable['tmp']){$error=true; echo '<font color="red">Este diretório deve ter permissão de escrita</font>' ; }else{ echo '<font color="green">Ok, consigo escrever.</font>'; } ?> </li>
                     	<li>Diretório uploads/ ----------------  <?php if(!$writeable['uploads']){$error=true; echo '<font color="red">Este diretório deve ter permissão de escrita</font>' ; }else{ echo '<font color="green">Ok, consigo escrever.</font>'; } ?> </li>
                     	<li>Diretório skin/padrao/upload/ ----------------  <?php if(!$writeable['upload']){$error=true; echo '<font color="red">Este diretório deve ter permissão de escrita</font>' ; }else{ echo '<font color="green">Ok, consigo escrever.</font>'; } ?> </li>
                     	<li>Diretório skin/padrao/images/ ----------------  <?php if(!$writeable['skin']){$error=true; echo '<font color="red">Este diretório deve ter permissão de escrita</font>' ; }else{ echo '<font color="green">Ok, consigo escrever.</font>'; } ?> </li>
                     	<li>Diretório skin/padrao/images/* ----------------  <?php if(!$writeable['skinfiles']){$error=true; echo '<font color="red">Este diretório e todos os seus arquivos devem ter permissão de escrita</font>' ; }else{ echo '<font color="green">Ok, consigo escrever.</font>'; } ?> </li>
                     	<li>Diretório skin/padrao/background/ ----------------  <?php if(!$writeable['background']){$error=true; echo '<font color="red">Este diretório e todos os seus arquivos devem ter permissão de escrita</font>' ; }else{ echo '<font color="green">Ok, consigo escrever.</font>'; } ?> </li>
                     	 
                     </ul>
                    </div>
                    <div class="tail"></div>
                    <div class="wholetip clear"><h1>Bibliotecas do PHP </h1></div>
                    <div style="margin:20px; line-height:15px;"><h4>&nbsp;</h4>
                      <ul>
                       <?php if($erro_server_php!="") { echo $erro_server_php ;echo "<br><span style=color:black>Contate o suporte de sua hospedagem para ativar. Você tem apenas estas:</span><br><br>" ; 
						
							echo '<pre>'; 
								print_r($php_loaded_extensions); 
							echo '</pre>';
							
							}
					 		else{
								echo '<font color="green">Ok, tudo certo por aqui.</font>';
						 	}
						?>
                         </ul>
                   	 </div>
                     
                    <div class="tail"></div>
                     <div class="wholetip clear"><h1>Diretivas do PHP </h1></div>
                    <div style="margin:20px; line-height:15px;"><h4>&nbsp;</h4>
                      <ul>
                        <?php if($erro_diretivas_php!="") { echo $erro_diretivas_php ;echo "<br><span style=color:black>Contate o suporte de sua hospedagem para ativar.</span>" ; }
					 		else{
								echo '<font color="green">Ok, tudo certo por aqui.</font>';
						 	}
						?>
                      </ul>
                    </div>
                
                     
                    <?php if(!$error and !$erro_server_apache and !$erro_server_php  and !$erro_diretivas_php){?>
                    	<a href="javascript:Proximo();" class="link-1"><em><b>Próximo</b></em></a>
                         <script>
							document.getElementById("obs").style.display="none";
                         </script>
                    <?php } 
					else{ ?>
                    	<a href="javascript:Atualizar();" class="link-1"><em><b>Fiz a correção, atualize</b></em></a>
              		<?php } ?>
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
  
$("#menu1").attr("class","current")
$("#menu2").attr("class","")
$("#menu3").attr("class","")
$("#menu4").attr("class","")

function Proximo(){
	
	document.getElementById("form").submit();
	
}

function Atualizar(){
	 
	location.href="index.php"
	
}

</script>

