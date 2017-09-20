<?php
   
import('configure');
import('current');
import('utility');
import('mailer');
import('sms');
import('upgrade');
import('uc');
import('cron');


function getImagemDestaque($estatica){
		
		global $INI; 
	 
		$imgbaseestatica = substr($estatica,0,-4)."_imgdestaque.jpg"; 
	 
		if(file_exists(WWW_ROOT."/media/".$imgbaseestatica)){
			return $INI['system']['wwwprefix']."/media/".$imgbaseestatica;
		}  
}
function getImagemDestaquePagina($id){
		
		global $INI;  
		if(file_exists(WWW_ROOT."/media/paginas/".$id.".png")){
			return $INI['system']['wwwprefix']."/media/paginas/".$id.".png";
		}  
}


function getOfertasPacote($id){ 
  
	$sql	=	"select id,title,team_price,market_price from team where idpacote='".$id."' and begin_time < '".time()."' and end_time > '".time()."' and now_number < max_number ";
	$rs		=	mysql_query($sql);
  
	if(mysql_num_rows($rs) >0){
		$conteudo	 =	"<div class=\'boxmaior\'><div class=csescolha>Escolha a sua oferta</div><br/><br/>";
		while($row	= mysql_fetch_array($rs)){
		 
			$idoferta		=	$row['id'];
			$title			=	utf8_decode($row['title']);
			$team_price	 	=	number_format($row['team_price'],2, ',', '.');
			$market_price 	=	number_format($row['market_price'],2, ',', '.');
			$economia 		=	number_format($row['market_price'] - $row['team_price'],2, ',', '.');
			$porcentagem	= 	round(100 - $row['team_price']/$row['market_price']*100,0);
	  
			 if(!$style){
				$style=" style=background:#F0F4F4"; 
			 }
			 else{
				$style=false;
			 }
			$conteudo	.=  "<table><tr $style ><td style=width:650px;>";
			$conteudo	.= 	"<div class=descricaooferta style=\'width: 628px;\'>".$title."</div>";
			$conteudo	.= 	"<div class=descricaooferta style=\'width: 628px;\'><b>De R$ ".$market_price ." por R$ ".$team_price.". ".$porcentagem."% de desconto. Economise R$ ".$economia ."</b></div> <br>";
			$conteudo	.=  "</td><td style=width:50px;><label for=$i><div  style=\'padding:10px;width:96px;\' class=view-deal-button><a  class=button small href=javascript:enviacart($idoferta);>Quero esta</a></div><label></td></tr></table>";

		}
		 $conteudo	.=  "</div>";
	}
	else{
		 $conteudo	.= 	"<font color=#303030 size=10> Não existem mais ofertas disponíveis para este pacote. <br>Já estão canceladas ou esgotadas.<br><br> Por favor, tente verificar a disponibilidade mais tarde. </font><br/><br/>";
	}
	
	return $conteudo;
}
function ePacote($id){ 
  
	$sql	=	"select id from team where idpacote='".$id."'  limit 1";
	$rs		=	mysql_query($sql);
  
	if(mysql_num_rows($rs) >0){
		return true;
	}
	else{
		return false;
	} 
}
function mostratopo(){ 
	global $INI, $idpagina;
	if( $INI['option']['redirecionador'] == "Y" or $idpagina or $_REQUEST['page'] or $_REQUEST['idoferta'] ){
		return true;
	}
	else{
		return false;
	} 
}

function RemoveXSS($val) { 
   // remove all non-printable characters. CR(0a) and LF(0b) and TAB(9) are allowed 
   // this prevents some character re-spacing such as <java\0script> 
   // note that you have to handle splits with \n, \r, and \t later since they *are* allowed in some inputs 
  // $val = preg_replace('/([\x00-\x08,\x0b-\x0c,\x0e-\x19])/', '', $val); 
    
   // straight replacements, the user should never need these since they're normal characters 
   // this prevents like <IMG SRC=&#X40&#X61&#X76&#X61&#X73&#X63&#X72&#X69&#X70&#X74&#X3A &#X61&#X6C&#X65&#X72&#X74&#X28&#X27&#X58&#X53&#X53&#X27&#X29> 
   $search = 'abcdefghijklmnopqrstuvwxyz'; 
   $search .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
   $search .= '1234567890!@#$%^&*()'; 
   $search .= '~`";,:?+/={}[]-_|\'\\'; 
   for ($i = 0; $i < strlen($search); $i++) { 
   
      // ;? matches the ;, which is optional 
      // 0{0,7} matches any padded zeros, which are optional and go up to 8 chars 
    
      // &#x0040 @ search for the hex values 
      $val = preg_replace('/(&#[xX]0{0,8}'.dechex(ord($search[$i])).';?)/i', $search[$i], $val); // with a ; 
      // &#00064 @ 0{0,7} matches '0' zero to seven times 
      $val = preg_replace('/(&#0{0,8}'.ord($search[$i]).';?)/', $search[$i], $val); // with a ; 
   } 
    
   // now the only remaining whitespace attacks are \t, \n, and \r 
   $ra1 = Array('javascript', 'vbscript', 'expression', 'applet', 'meta', 'xml', 'blink', 'link', 'style', 'script', 'embed', 'object', 'iframe', 'frame', 'frameset','ilayer', 'layer', 'bgsound', 'title', 'base'); 
   $ra2 = Array('onabort', 'onactivate', 'onafterprint', 'onafterupdate', 'onbeforeactivate', 'onbeforecopy', 'onbeforecut', 'onbeforedeactivate', 'onbeforeeditfocus','onbeforepaste', 'onbeforeprint', 'onbeforeunload', 'onbeforeupdate', 'onblur', 'onbounce', 'oncellchange', 'onchange', 'onclick', 'oncontextmenu', 'oncontrolselect','oncopy', 'oncut', 'ondataavailable', 'ondatasetchanged', 'ondatasetcomplete', 'ondblclick', 'ondeactivate', 'ondrag', 'ondragend', 'ondragenter', 'ondragleave', 'ondragover','ondragstart', 'ondrop', 'onerror', 'onerrorupdate', 'onfilterchange', 'onfinish', 'onfocus', 'onfocusin', 'onfocusout', 'onhelp', 'onkeydown', 'onkeypress', 'onkeyup','onlayoutcomplete', 'onload', 'onlosecapture', 'onmousedown', 'onmouseenter', 'onmouseleave', 'onmousemove', 'onmouseout', 'onmouseover', 'onmouseup', 'onmousewheel','onmove', 'onmoveend', 'onmovestart', 'onpaste', 'onpropertychange', 'onreadystatechange', 'onreset', 'onresize', 'onresizeend', 'onresizestart', 'onrowenter', 'onrowexit','onrowsdelete', 'onrowsinserted', 'onscroll', 'onselect', 'onselectionchange', 'onselectstart', 'onstart', 'onstop', 'onsubmit', 'onunload'); 
   $ra = array_merge($ra1, $ra2); 
    
   $found = true; // keep replacing as long as the previous round replaced something 
   while ($found == true) { 
      $val_before = $val; 
      for ($i = 0; $i < sizeof($ra); $i++) { 
         $pattern = '/'; 
         for ($j = 0; $j < strlen($ra[$i]); $j++) { 
            if ($j > 0) { 
               $pattern .= '('; 
               $pattern .= '(&#[xX]0{0,8}([9ab]);)'; 
               $pattern .= '|'; 
               $pattern .= '|(&#0{0,8}([9|10|13]);)'; 
               $pattern .= ')*'; 
            } 
            $pattern .= $ra[$i][$j]; 
         } 
         $pattern .= '/i'; 
         $replacement = substr($ra[$i], 0, 2).'<x>'.substr($ra[$i], 2); // add in <> to nerf the tag 
         $val = preg_replace($pattern, $replacement, $val); // filter out the hex tags 
         if ($val_before == $val) { 
            // no replacements were made, so exit the loop 
            $found = false; 
         } 
      } 
   }  
   return $val; 
}

function current_teamcategory($gid='0') {
	global $city;
 
	foreach(option_hotcategory('group') AS $id=>$name) {
		$a["$id"] = $name;
	}
	$l = "/team/index.php?gid={$gid}";
	if (!$gid) $l = "/team/index.php";
	return current_link($l, $a, true);
}

function current_teamcategory_principal($gid='0') {
	global $city;
 
	foreach(option_hotcategory('group') AS $id=>$name) {
		$a["$id"] = $name;
	}
	$l = "/team/index.php?gid={$gid}";
	if (!$gid) $l = "/team/index.php";
	return current_link_principal($l, $a, true);
}

function current_teamcategory_recentes($gid='0') {
	global $city;
 
	foreach(option_hotcategory('group') AS $id=>$name) {
		$a["$id"] = $name;
	}
	$l = "/team/index.php?gid={$gid}";
	if (!$gid) $l = "/team/index.php";
	return current_link_recentes($l, $a, true);
}

function current_teamcategoryhome($gid='0') {
	global $city;
  
	foreach(option_hotcategory('group') AS $id=>$name) {
		$a["/". $city['ename']."/Categoria/$id"] = $name;
	}
	 
	return current_link_home($l, $a, true);
} 

function tratacidade($nome) {

	    $var =    $nome  ;
		
		/*$var = ereg_replace("[áàâãª]","a",$var);
		$var = ereg_replace("[ÉÈÊ]","E",$var);
		$var = ereg_replace("[éèê]","e",$var);
		$var = ereg_replace("[Í]","I",$var);
		$var = ereg_replace("[ÓÒÔÕ]","O",$var);
		$var = ereg_replace("[óòôõº]","o",$var);
		$var = ereg_replace("[ÚÙÛ]","U",$var);
		$var = ereg_replace("[í]","i",$var);
		$var = ereg_replace("[úùû]","u",$var);
		$var = str_replace("Ç","C",$var);
		$var = str_replace("ç","c",$var);
		//$var = str_replace(" ","-",$var);
		$var = str_replace("_","-",$var);*/
		 
 
		return $var;

	}     
	
function retornaNomeEstado($uf) {
	
	  if($uf=="AC"){
		return "Acre";
		} else if($uf=="AL"){
		return "Alagoas";
	 } else if($uf=="AM"){
		return "Amazonas";
	 } else if($uf=="AP"){
		return "Amapá";
	 } else if($uf=="BA"){
		return "Bahia";
	 } else if($uf=="CE"){
		return "Ceará";
	 } else if($uf=="DF"){
		return "Distrito Federal";
	 } else if($uf=="ES"){
		return "Espírito Santo";
	 } else if($uf=="GO"){
		return "Goiás";
	 } else if($uf=="MA"){
		return "Maranhão";
	 } else if($uf=="MG"){
		return "Minas Gerais";
	 } else if($uf=="MS"){
		return "Mato Grosso do Sul";
	 } else if($uf=="MT"){
		return "Mato Grosso";
	 } else if($uf=="PA"){
		return "Pará";
	 } else if($uf=="PB"){
		return "Paraíba";
	 } else if($uf=="PE"){
		return "Pernambuco";
	 } else if($uf=="PI"){
		return "Piauí";
	 } else if($uf=="PR"){
		return "Paraná";
	 } else if($uf=="RJ"){
		return "Rio de Janeiro";
	 } else if($uf=="RN"){
		return "Rio Grande do Norte";
	 } else if($uf=="RO"){
		return "Rondônia";
	 } else if($uf=="RR"){
		return "Roraima";
	 } else if($uf=="RS"){
		return "Rio Grande do Sul";
	 } else if($uf=="SC"){
		return "Santa Catarina";
	 } else if($uf=="SE"){
		return "Sergipe";
	 } else if($uf=="SP"){
		return "São Paulo";
	 } else if($uf=="TO"){
		return "Tocantins";
	 } 
	 else if($uf=="TODOS" or $uf==""){
		return "Todos os Estados";
	 }  
   
	}












function getNavegador(){
	$browser_cliente = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';
	
	if(strpos($browser_cliente, 'Gecko') !== false)  {     
		return "firefox";  
	}  elseif(strpos($browser_cliente, 'MSIE') !== false)  {      
		return  "ie";
	}  else  {      
		return  "outros";
	}
}	
function upload_image($input, $image=null, $type="team", $scale=false,$marcadagua=false) {
	  global $INI;
	 $img = new canvas();
	 
	$year = date("Y"); $day = date("md"); $n = time().rand(1000,9999).".jpg";
	$z = $_FILES[$input];
	if ($z && strpos($z["type"], "image")===0 && $z["error"]==0) {
		if (!$image) {
			RecursiveMkdir( IMG_ROOT . "/" . "{$type}/{$year}/{$day}" );
			$image = "{$type}/{$year}/{$day}/{$n}";
			$path = IMG_ROOT . "/" . $image;
		} else {
			RecursiveMkdir( dirname(IMG_ROOT ."/" .$image) );
			$path = IMG_ROOT . "/" .$image;
		}
		if ($type=="user") {
			move_uploaded_file($z["tmp_name"], $path); 
			$npath = preg_replace('#(\d+)\.(\w+)$#', "\\1_destaque.\\2", $path);
			$img->carrega(WWW_ROOT."/media/".$image)->redimensiona( 449, null) ->grava($npath);
		}
	 
		else if($type=="team") {

			move_uploaded_file($z["tmp_name"], $path);  
			 
			$npath =  $path;  
		    $img->carrega(WWW_ROOT."/media/".$image)->redimensiona( 800, null)->grava($npath);  // redimensionando a foto original 
			
			$npath = preg_replace('#(\d+)\.(\w+)$#', "\\1_thumb.\\2", $path);
			Image::Convert($path , $npath, 80, 60, Image::MODE_CUT);

			$npath = preg_replace('#(\d+)\.(\w+)$#', "\\1_detalhe.\\2", $path);
			$img->carrega(WWW_ROOT."/media/".$image)->redimensiona( 900, null) ->grava($npath); 
			
			  /*
			 $npath = preg_replace('#(\d+)\.(\w+)$#', "\\1_destaque.\\2", $path);
			 $img->carrega(WWW_ROOT."/media/".$image)->grava($npath);	 
			 */
			  $npath = preg_replace('#(\d+)\.(\w+)$#', "\\1_destaque.\\2", $path);
			 $img->carrega(WWW_ROOT."/media/".$image)->redimensiona( 449, null) ->grava($npath);
			     
			//$npath = preg_replace('#(\d+)\.(\w+)$#', "\\1_lateral.\\2", $path);
		    //Image::Convert($path, $npath, 110, 67, Image::MODE_CUT);
			 
			//$npath = preg_replace('#(\d+)\.(\w+)$#', "\\1_lateral_nacional.\\2", $path);
			//Image::Convert($path, $npath, 215, 139, Image::MODE_CUT);
  
			$tampopw=225;
			$tampoph=null; 
			$npath = preg_replace('#(\d+)\.(\w+)$#', "\\1_popular.\\2", $path); 
			$img->carrega(WWW_ROOT."/media/".$image)->redimensiona( $tampopw,$tampoph )->grava($npath);
			 

			$npath = preg_replace('#(\d+)\.(\w+)$#', "\\1_popular_mini.\\2", $path); //usado nos thumbs do slide detalhe da oferta
			$img->carrega(WWW_ROOT."/media/".$image)->redimensiona( 95,62 )->grava($npath);
			//Image::Convert($path, $npath, 323,null, Image::MODE_CUT);

		}	
		else if($type=="estatica") {

			move_uploaded_file($z["tmp_name"], $path);  
			$npath = preg_replace('#(\d+)\.(\w+)$#', "\\1_imgdestaque.\\2", $path); 
			$img->carrega(WWW_ROOT."/media/".$image)->redimensiona( 220,null )->grava($npath);
			
		}	
		else if($type=="magazine_article") {

			move_uploaded_file($z["tmp_name"], $path);  
			$npath = preg_replace('#(\d+)\.(\w+)$#', "\\1_imgmagazine.\\2", $path); 
			$img->carrega(WWW_ROOT."/media/".$image)->redimensiona( 800,null )->grava($npath);
			
		}
		else if($type=="magazine_cover") {

			move_uploaded_file($z["tmp_name"], $path);  
			$npath = preg_replace('#(\d+)\.(\w+)$#', "\\1_imgmagazine.\\2", $path); 
			$img->carrega(WWW_ROOT."/media/".$image)->redimensiona( 800,null )->grava($npath);
			
		}
	 	 else if($type=="parceiro") {

			move_uploaded_file($z["tmp_name"], $path);
			$npath = preg_replace('#(\d+)\.(\w+)$#', "\\1_parceiromini.\\2", $path);
			//$img->carrega(WWW_ROOT."/media/".$image)->redimensiona( 128,null )->grava($npath);
			Image::Convert($path, $npath, 104, null, Image::MODE_CUT);
			 
			
		} 
	 
	  
	}
	return $image;
}

function upload_video($input, $image=null, $type="team", $scale=false) {
	 global $INI;  
	 $img = new canvas();
	 
    $nomevideo = $_FILES[$input]['name']; 
	$year = date("Y"); $day = date("md"); 
	$n = time().rand(1000,9999)."_$nomevideo";
	$z = $_FILES[$input];
	
	
	if ($z  && $z["error"]==0) {
		if (!$image) {
			RecursiveMkdir( IMG_ROOT . "/" . "{$type}/{$year}/{$day}" );
			$image = "{$type}/{$year}/{$day}/{$n}";
			$path = IMG_ROOT . "/" . $image;
		} else {
			RecursiveMkdir( dirname(IMG_ROOT ."/" .$image) );
			$path = IMG_ROOT . "/" .$image;
		}
		 
		 if($type=="team") {
	 
			move_uploaded_file($z["tmp_name"], $path);  
			 
			$npath = preg_replace('#(\d+)\.(\w+)$#', "\\1_thumbv.\\2", $path);
			Image::Convert($path , $npath, 80, 60, Image::MODE_CUT);
			 
		    $npath = preg_replace('#(\d+)\.(\w+)$#', "\\1_destaque.\\2", $path);
		    $img->carrega(WWW_ROOT."/media/".$image)->grava($npath);	 
	 
		}	 
	}
	return $image;
}


 function magic_gpc($string) {
	if(SYS_MAGICGPC) {
		if(is_array($string)) {
			foreach($string as $key => $val) {
				$string[$key] = magic_gpc($val);
			}
		} else {
			$string = stripslashes($string);
		}
	}
	return $string;
}
 
function template($tFile) {

	global $INI; 
	if ( 0===strpos($tFile, 'manage') ) {
		return __template($tFile);
	}
	if ($INI['skin']['template']) {
 
		$templatedir = DIR_TEMPLATE. '/' . $INI['skin']['template'];
		$checkfile = $templatedir . '/html_header.html';
		if ( file_exists($checkfile) ) {
		 
			return __template($INI['skin']['template'].'/'.$tFile);
		}
		
	} 
	return __template($tFile);
}

function render($tFile, $vs=array()) {
    ob_start();
    foreach($GLOBALS AS $_k=>$_v) {
        ${$_k} = $_v;
    }
	foreach($vs AS $_k=>$_v) {
		${$_k} = $_v;
	}
	include template($tFile);
    return render_hook(ob_get_clean());
}

function render_hook($c) {
	global $INI;
	$c = preg_replace('#href="/#i', 'href="'.WEB_ROOT.'/', $c);
	$c = preg_replace('#src="/#i', 'src="'.WEB_ROOT.'/', $c);
	$c = preg_replace('#action="/#i', 'action="'.WEB_ROOT.'/', $c);

	 
	$page = strval($_SERVER['REQUEST_URI']);
	if($INI['skin']['theme'] && !preg_match('#/vipmin/#i',$page)) {
		$themedir = WWW_ROOT. '/media/theme/' . $INI['skin']['theme'];
		$checkfile = $themedir. '/css/index.css';
		if ( file_exists($checkfile) ) {
			$c = preg_replace('#/media/css/#', "/media/theme/{$INI['skin']['theme']}/css/", $c);
			$c = preg_replace('#/media/img/#', "/media/theme/{$INI['skin']['theme']}/img/", $c);
		}
	}
	if (strtolower(cookieget('locale','zh_cn'))=='zh_tw') {
		require_once(DIR_FUNCTION  . '/tradition.php');
		$c = str_replace(explode('|',$_charset_simple), explode('|',$_charset_tradition),$c);
	}
 
	$c = obscure_rep($c);
	return $c;
}

function output_hook($c) {
	global $INI;
	if ( 0==abs(intval($INI['system']['gzip'])))  die($c);
	$HTTP_ACCEPT_ENCODING = $_SERVER["HTTP_ACCEPT_ENCODING"];
	if( strpos($HTTP_ACCEPT_ENCODING, 'x-gzip') !== false )
		$encoding = 'x-gzip';
	else if( strpos($HTTP_ACCEPT_ENCODING,'gzip') !== false )
		$encoding = 'gzip';
	else $encoding == false;
	if (function_exists('gzencode')&&$encoding) {
		$c = gzencode($c);
		header("Content-Encoding: {$encoding}");
	}
	$length = strlen($c);
	header("Content-Length: {$length}");
	die($c);
}

$lang_properties = array();
function I($key) {
    global $lang_properties, $LC;
    if (!$lang_properties) {
        $ini = DIR_ROOT . '/i18n/' . $LC. '/properties.ini';
        $lang_properties = Config::Instance($ini);
    }
    return isset($lang_properties[$key]) ?
        $lang_properties[$key] : $key;
}

function json($data, $type='eval') {
    $type = strtolower($type);
    $allow = array('eval','alert','updater','dialog','mix', 'refresh');
    if (false==in_array($type, $allow))
        return false;
    Output::Json(array( 'data' => $data, 'type' => $type,));
}

function retira_acento ($txt){

$txt= ereg_replace("[????]","A", $txt );
$txt= ereg_replace("[?????]","a",$txt);
$txt= ereg_replace("[???]","E",$txt);
$txt= ereg_replace("[???]","e",$txt);
$txt= ereg_replace("[?]","I",$txt);
$txt= ereg_replace("[????]","O",$txt);
$txt= ereg_replace("[?????]","o",$txt);
$txt= ereg_replace("[???]","U",$txt);
$txt= ereg_replace("[?]","i",$txt);
$txt= ereg_replace("[???]","u",$txt);
$txt= str_replace("?","C",$txt);
$txt= str_replace("?","c",$txt);

return $txt;

}

function retira_acentos($string)
{
  $array1 = array(   "á", "à", "â", "ã", "ä", "é", "è", "ê", "ë", "í", "ì", "î", "ï", "ó", "ò", "ô", "õ", "ö", "ú", "ù", "û", "ü", "ç"
                     , "Á", "À", "Â", "Ã", "Ä", "É", "È", "Ê", "Ë", "Í", "Ì", "Î", "Ï", "Ó", "Ò", "Ô", "Õ", "Ö", "Ú", "Ù", "Û", "Ü", "Ç" );
  $array2 = array(   "a", "a", "a", "a", "a", "e", "e", "e", "e", "i", "i", "i", "i", "o", "o", "o", "o", "o", "u", "u", "u", "u", "c"
                     , "A", "A", "A", "A", "A", "E", "E", "E", "E", "I", "I", "I", "I", "O", "O", "O", "O", "O", "U", "U", "U", "U", "C" );
  return str_replace( $array1, $array2, $string );
}

function redirect($url=null, $notice=null, $error=null) {
	$url = $url ? obscure_rep($url) : $_SERVER['HTTP_REFERER'];
	$url = $url ? $url : '/';
	if ($notice) Session::Set('notice', $notice);
	if ($error) Session::Set('error', $error);
    header("Location: {$url}");
    exit;
}
function write_php_file($array, $filename=null){
	$v = "<?php\r\n\$INI = ";
	$v .= var_export($array, true);
	$v .=";\r\n?>";
	return file_put_contents($filename, $v);
}

function write_ini_file($array, $filename=null){
	$ok = null;
	if ($filename) {
		$s =  ";;;;;;;;;;;;;;;;;;\r\n";
		$s .= ";; SYS_INIFILE\r\n";
		$s .= ";;;;;;;;;;;;;;;;;;\r\n";
	}
	foreach($array as $k=>$v) {
		if(is_array($v))   {
			if($k != $ok) {
				$s  .=  "\r\n[{$k}]\r\n";
				$ok = $k;
			}
			$s .= write_ini_file($v);
		}else   {
			if(trim($v) != $v || strstr($v,"["))
				$v = "\"{$v}\"";
			$s .=  "$k = \"{$v}\"\r\n";
		}
	}

	if(!$filename) return $s;
	return file_put_contents($filename, $s);
}

function save_config($type='ini') {
	return configure_save();
	global $INI; $q = ZSystem::GetSaveINI($INI);
	if ( strtoupper($type) == 'INI' ) {
		if (!is_writeable(SYS_INIFILE)) return false;
		return write_ini_file($q, SYS_INIFILE);
	}
	if ( strtoupper($type) == 'PHP' ) {
		if (!is_writeable(SYS_PHPFILE)) return false;
		return write_php_file($q, SYS_PHPFILE);
	}
	return false;
}

function save_system($ini) {
	$system = Table::Fetch('system', 1);
	$ini = ZSystem::GetUnsetINI($ini);
	$value = Utility::ExtraEncode($ini);
	$table = new Table('system', array('value'=>$value));
	if ( $system ) $table->SetPK('id', 1);
	return $table->update(array( 'value'));
}

function atualiza_qtde_visualizacao($idoferta) {
 
	$sql = "select visualizados from team where id = $idoferta";
    $rs = mysql_query($sql);	
	$linha = mysql_fetch_object($rs);
	
	if($linha->visualizados){
	  
	   $sql = "update team set visualizados = visualizados + 1 where id = $idoferta";
		mysql_query($sql); 
	}
	else{ 
		$sql = "update team set visualizados =  1 where id = $idoferta";
		mysql_query($sql);
	} 
}
function get_num_pedido($tipo) {
	$data = date("Y-m-d H:i:s");
	
	$valorped = str_replace("","",$_REQUEST['valorpedido']);
	$valorped = str_replace(",",".",$valorped);
	
    $sql	=	"INSERT INTO `order`(datapedido,service,user_id,team_id,quantity,price,origin,tipo,city_id) values ('".$data."','".$_REQUEST['gateway']."','".$_REQUEST['idusuario']."','".$_REQUEST['idoferta']."','".$_REQUEST['quantidade']."','".$_REQUEST['valor_unitario']."','".$valorped."','".$tipo."','".$_REQUEST['city_id']."' )";
	$rs = mysql_query($sql);
	if(!$rs){
		echo $sql." ".mysql_error();
	}
	else{
		if($tipo=="promocional"){ // atualiza o contator promocional
			$sql = "update team set now_number = now_number+1 where id =".$_REQUEST['idoferta'];
			mysql_query($sql);
		}
	
		$idnovopedido = mysql_insert_id();
		if($tipo!="promocional"){
			$usuario 	= Table::Fetch('user', $_REQUEST['idusuario']);
			$nome 		= $usuario['realname'] ;
			$qtde 		= $_REQUEST['quantidade']; 
			$sql 		=  "insert into order_amigos (nome,order_id,qtde) values ('$nome',$idnovopedido,$qtde)";
			mysql_query($sql);
		}
		 
		return $idnovopedido;
	}
}

function get_id_pagamento() {
 
	$sql = "select max(id) as id from pagamentos";
    $rs = mysql_query($sql);	
	$linha = mysql_fetch_object($rs);
	$idpagamento = $linha->id;
	if($idpagamento==""){
		$idpagamento=1;	
	}
	$idpagamento = (int)$idpagamento + 1;
	return $idpagamento;
 
}

//$sql	=	"update team set anunciogratis = 'sim' where id=".$idnovo;
//$rs = @mysql_query($sql);
				
function insere_dados_pagamento($team_id,$idpedido,$valor,$partner_id,$idplano,$status_pagamento,$mensagem) {
  
	global $INI,$ROOTPATH;
  
	$data = date("Y-m-d H:i:s");
	 
	if($status_pagamento=="Sucesso"){
		 $sql	=	"update team set pago = 'sim' where id=".$team_id;
		 $rs = @mysql_query($sql);
		  
		if($rs){
			Util::log($team_id. " - Anuncio ".$team_id." atualizado para pago na tabela team com sucesso");
		}
		else{
			Util::log($team_id. " - Erro ao atualizar o anuncio ".$team_id." para pago na tabela team. ". mysql_error(). " ".$sql);
		}
	
		alteradatafim_anuncio($team_id,$idplano);
		  
		$team = Table::Fetch('team', $team_id);
		
		if($INI['option']['moderacaoanuncios']=="Y"){		
			$body =
			"<html><head></head><body style='font-size:12px;'><meta http-equiv='Content-Type' content='text/html; charset=utf8' /><meta http-equiv='Content-Language' content='pt-br' />
			<div> Ol&aacute;, o an&uacute;ncio ".$team_id." foi pago e agora voc&ecirc; precisa moder&aacute;-lo antes de sua publica&ccedil;&atilde;o.</div><br>
			Para moderar este an&uacute;ncio entre na administra&ccedil;&atilde;o no menu an&uacute;ncios, clique em editar o an&uacute;ncio ".$team_id." e altere o status Modera&ccedil;&atilde;o<br>

			<p>Moderar: <a href='".$ROOTPATH."/vipmin'>$ROOTPATH/vipmin</a> </p>
			<br>
			<b> Dados do An&uacute;ncio</b>

			<p>An&uacute;ncio: ".$team['title']."</p> 
			<p>Descri&ccedil;&atilde;o: ".$team['summary']."</p></body></html>" ;
		
		
			$emailadmin = $INI['mail']['from'];
			
			 if(enviar( $emailadmin,utf8_decode($INI["system"]["sitename"])." - ".buscaTituloAnuncio($team)." (".$team_id.")  An&uacute;ncio pago e aguardando modera&ccedil;&atilde;o" , $body )){
				 $enviou =  true;
			 }
			 else{
				$enviou =  false;
			 }
		 }
	} 
}
   
 
function verificarepublicacao($republica,$idanuncio){

    if($republica=="true"){
	
		Util::log($idanuncio. " -  é republicacao");
 	
		
		$sql = "INSERT INTO team (  `user_id`,  `title`, `summary`, `city_id`, `group_id`, `partner_id`, `system`, `team_price`,   `team_type`, `sort_order`, `expire_time`, `begin_time`, `end_time`,     `car_tipo`, `car_fabricante`, `car_modelo`, `car_ano`,`km`,`numero_portas`,`cor`,`combustivel`,`motor`,`transmissao`,`cilindros`,`tracao`,`vea_caracter`,`estadoveiculo` ,`modelo_ano`,`uf`, `ehdestaque`,`mostrarpreco`,`mostrarseguranca`,`status`,`pago`,`anunciogratis`,`image`,`image1`,`image2`,`gal_image1`,`gal_image2`,`gal_image3`,`create_time`) 
		SELECT `user_id`,  `title`, `summary`, `city_id`, `group_id`, `partner_id`, `system`, `team_price`,  `team_type`, `sort_order`, `expire_time`, `begin_time`, `end_time`,  `car_tipo`, `car_fabricante`, `car_modelo`, `car_ano`,`km`,`numero_portas`,`cor`,`combustivel`,`motor`,`transmissao`,`cilindros`,`tracao`,`vea_caracter`,`estadoveiculo` ,`modelo_ano`,`uf`, `ehdestaque`,`mostrarpreco`,`mostrarseguranca`,`status`,`pago`,`anunciogratis`,`image`,`image1`,`image2`,`gal_image1`,`gal_image2`,`gal_image3`,`create_time` FROM team
		WHERE id = ".$idanuncio ;
		$rs = mysql_query($sql);
		
		if($rs){
			Util::log($idanuncio. " -  duplicado com sucesso");
			return mysql_insert_id();
		}
		else{
			Util::log($idanuncio. " -  erro ao republicar ".mysql_error());
			echo $idanuncio. " -  erro ao republicar ".mysql_error() ;
		}
	
	}

}
function finalizaanuncio() {

    Util::log($_REQUEST['team_id']. " - finalizando anuncio gratis");
	$team_id = $_REQUEST['team_id'];
	$planos_publicacao = Table::Fetch('planos_publicacao', $_REQUEST['idplano']); 
	global $INI;
 
	$data = date("Y-m-d H:i:s");
  
	 $sql	=	"update team set anunciogratis= 's' where id=".$team_id;
	 $rs = @mysql_query($sql);
	 if($rs){
		Util::log($team_id. " - campo anunciogratis atualizado para sim com sucesso");
	 }
	 else{
		Util::log($team_id. " - Erro ao atualizar o campo anunciogratis");
	 }
	  
	if($_REQUEST['idplano']){
		Util::log($team_id. " - ID do plano finalizado eh: ".$_REQUEST['idplano']);
		gravaplano($_REQUEST['partner_id'],$_REQUEST['idplano'],"gratis");
	}
	else{
	  Util::log($team_id. " - ID do plano esta vazio");
	}
	
	alteradatafim_anuncio($team_id,$_REQUEST['idplano']);
 
	$team = Table::Fetch('team', $team_id); 
	$partner = Table::Fetch('partner', $team['partner_id'] );
 

	if($planos_publicacao['ehdestaque']=="Y"){



		$sql =	"update team set  ehdestaque='Y' where id=".$team['id'];
		$rs =    mysql_query($sql);

		Util::log($team_id. " - $sql ");

	}
	  
	$partner_plano_id = get_partner_plano_id($team['partner_id']);
	atualiza_partner_plano_id($team['id'],$partner_plano_id); 
	if($INI['option']['moderacaoanuncios']=="Y"){
	 $body =
		"<html><head></head><body style='font-size:12px;'><meta http-equiv='Content-Type' content='text/html; charset=utf8' />
		<h2> O An&uacute;ncio ".$team_id." precisa ser moderado antes de sua publica&ccedil;&atilde;o.</h2><br>
		Para moderar este an&uacute;ncio entre na administra&ccedil;&atilde;o e no menu an&uacute;ncios, procure pelo <b>an&uacute;ncio '".$team_id."'</b> e clique em  editar. Altere o status Modera&ccedil;&atilde;o<br>
		<h3> Dados do An&uacute;ncio</h3>

		 
		<b><p>Detalhes</p></b>
		<p>Tipo: ".utf8_decode($partner['tipo'])."</p> 
		<p>Nome: ".utf8_decode($partner['title'])."</p> 
		<p>Email: ".utf8_decode($partner['username'])."</p> 
		<p>Cidade: ".utf8_decode($partner['cidade'])."</p>
		 <p> </p> 
		 <p> </p> 
		 
		<b><p>Dados do an&uacute;ncio</p></b>
		<p>An&uacute;ncio: ".utf8_decode($team['title'])."</p>
		<p>Descri&ccedil;ao: ".utf8_decode($team['summary'])."</p>
		
		<p></p>
		<p></p>
		Atenciosamente
		<p></p>
		<b>".utf8_decode($INI["system"]["sitename"])."</b>
		<br>
		<a href='".$ROOTPATH."/vipmin'>Acessar a administração</a><br>
		". $ROOTPATH."</a>
		
		</body></html>" ;
	
		$emailadmin = $INI['mail']['from'];
		
		 if(enviar( $emailadmin,utf8_decode($INI["system"]["sitename"])." - ".utf8_encode("Anúncio aguardando moderação"),utf8_encode($body))){
			 $enviou =  true;
		 }
		 else{
			$enviou =  false;
		 }
	}

}

function envia_email_anuncios_finalizados(){
	global $INI,$ROOTPATH;
    $sql = "select p.username, p.realname as nome, t.title,t.id from team t, user p where status='1' and (pago='sim' or anunciogratis='s') and avisa is null and p.id = t.partner_id and t.end_time < ".time();
	$rs = mysql_query($sql);
	
 
	while($l = mysql_fetch_assoc($rs)){
	 
		$realname 	= utf8_decode($l[nome]);
		$email	 	= utf8_decode($l[username]);
		$title	 	= utf8_decode($l[title]);
		$id	 		= $l[id];
		
	    $body =
		"<html><head></head><body style='font-size:12px;'><meta http-equiv='Content-Type' content='text/html; charset=utf8' />
		<p> Ol&aacute; $realname,  estamos enviando este email para informar que o seu  an&uacute;ncio <b>".$title."</b> expirou e foi finalizado.</p>
		<p>Para republicar o seu an&uacute;ncio novamente <a href='".$ROOTPATH."/adminanunciante'>clique aqui</a> para acessar os seus an&uacute;ncios </p>
		
		<p></p>
		<p></p>
		Atenciosamente
		<p></p>
		<b>".utf8_decode($INI["system"]["sitename"])."</b>
		<br> 
		". $ROOTPATH."</a>
		
		</body></html>" ;
	
		$emailadmin = $INI['mail']['from'];
	 
		 if(enviar( $email,utf8_decode($INI["system"]["sitename"])." - ".utf8_encode("Anúncio Finalizado"),utf8_encode($body))){
			 
			 $enviou =  true;
			 $sql	 =	"update team set avisa='Y' where id=".$id;
			 $rs 	 =  mysql_query($sql);
		 
		 }
		 else{
			$enviou =  false;
		 }
	 
	}
}
 
 
 function getdiasplanocliente($plano_id){ 
	Util::log("getdiasplanocliente()" ); 

	$planos_publicacao  = Table::Fetch('planos_publicacao',$plano_id );
	if($planos_publicacao[atevender]=='S'){
		return 60; //  republicacao manual pelo cliente gratuitamente a cada 60 dias
	}
	
	$sql = "select dias from partner_planos where status in ('gratis','aprovado') and plano_id = $plano_id order by id desc";
    $rs = mysql_query($sql);	
	$linha = mysql_fetch_object($rs);
	$dias = $linha->dias;
	
	Util::log("Dias de publicacao : ".$dias); 
	
	return $dias;
	
}
function getdiasplano($plano_id){

	$sql = "select dias from planos_publicacao where id = $plano_id";
    $rs = mysql_query($sql);	
	$linha = mysql_fetch_object($rs);
	$dias = $linha->dias;
	return $dias;
	
}
function alteradatafim_anuncio($team_id,$plano_id){
	 
	$dias = getdiasplano($plano_id);
	
	if(!empty($dias)){
		Util::log($team_id. " - Os dias para o plano id $plano_id é $dias dia(s) ");
	}
	else{
		Util::log($team_id. " - Erro ao buscar os dias do plano $plano_id. ". mysql_error(). " ".$sql);
		return;
	}
 
	$begin_time =   strtotime('+0 days');  
    $end_time   =   strtotime('+'.$dias.' days'); 
	
	$sql	=	"update team set end_time= '$end_time', begin_time='$begin_time' where id=".$team_id;
	$rs = @mysql_query($sql);

	
	//Util::log($sql);
	
	if($rs){
		Util::log($team_id. " - Periodo de veiculacao do anuncio atualizados com sucesso");
	}
	else{
		Util::log($team_id. " - Erro ao atualizar o periodo de veiculacao do anuncio plano $plano_id. ". mysql_error());
	}
	
}

function estapago($team_id) {
  
 	$sql = "select id from pagamentos where team_id =".$team_id." and status_pagamento= 'Sucesso'";
    $rs = mysql_query($sql);	
	if(mysql_num_rows($rs) >0){
		return true;
	}
	  
}

function buscaParcelas() {

	$valor = $_REQUEST['valor'];
	
	$opcoes='	<option value="1">1</option>';
	if( ($valor/2) >= 5 ){ $opcoes.='	<option value="2">2</option>';}
	if( ($valor/3) >= 5 ){$opcoes.='	<option value="3">3</option>';}
	if( ($valor/4) >= 5 ){$opcoes.='	<option value="4">4</option>';}
	if( ($valor/5) >= 5 ){$opcoes.='	<option value="5">5</option>';}
	if( ($valor/6) >= 5 ){$opcoes.='	<option value="6">6</option>';}
	if( ($valor/7) >= 5 ){$opcoes.='	<option value="7">7</option>';}
	if( ($valor/8) >= 5 ){$opcoes.='	<option value="8">8</option>';}
	if( ($valor/9) >= 5 ){$opcoes.='	<option value="9">9</option>';}
	if( ($valor/10) >= 5 ){$opcoes.='	<option value="10">10</option>';}
	if( ($valor/11) >= 5 ){$opcoes.='	<option value="11">11</option>';}
	if( ($valor/12) >= 5 ){$opcoes.='	<option value="12">12</option>';}
	
	return $opcoes;
 	   
}

 


function verifica_regras_pre_compra() {
 
	$team = Table::Fetch('team', $_REQUEST['idoferta']);
	
	$ERROR 				=	"";
	$oferta_esgotada 	=  false;
	$end_time 			= date('YmdHis', $team['end_time']); 
	$date 				= date('YmdHis');
	
	$ex_con = array(
			'user_id' => $_REQUEST['idusuario'],
			'team_id' => $_REQUEST['idoferta'],
			'state' => 'unpay',
			);
	$order = DB::LimitQuery('order', array(
		'condition' => $ex_con,
		'one' => true,
	));

	if ( !$team ) { 
			$ERROR = 'Desculpe, esta oferta não existe mais em nossos registros' ;
			return utf8_encode($ERROR);
	}
	if (strtoupper($team['buyonce'])=='Y') {
		$ex_con['state'] = 'pay';
		if ( Table::Count('order', $ex_con) ) {
			$ERROR = 'Você já comprou esta oferta. Informamos que para esta oferta, você só pode comprar uma vez. Obrigado !';
			return utf8_encode($ERROR);
		}
	}
	if ($team['per_number']>0) {
		$now_count = Table::Count('order', array(
			'user_id' => $_REQUEST['idusuario'],
			'team_id' => $_REQUEST['idoferta'],
			'state' => 'pay',
		), 'quantity');
		
		$team['per_number'] -= $now_count;
		
		if ($team['per_number']<=0) {
			$ERROR = 'Você chegou ao limite de compra para esta oferta, por favor, dê uma olhada em outras ofertas!' ;
			return utf8_encode($ERROR);
		}
	}
	if( $team['begin_time']>time()){
		$ERROR = 'Desculpe, acabamos de adiar o início desta oferta. Por favor, dê uma olhada em outras ofertas.' ;
		return utf8_encode($ERROR);
	}
	if ( $team['end_time']<=time() ) { 
		$ERROR = 'Desculpe, esta oferta acabou de finalizar. Por favor, dê uma olhada em outras ofertas.' ;
		return utf8_encode($ERROR);
	}
	if($_REQUEST['acao']!='participar'){
		if( $team['now_number'] >= $team['max_number'] ){ 
			$ERROR = 'Desculpe, esta oferta esgotou-se neste momento. Por favor, dê uma olhada em outras ofertas.' ;
			return utf8_encode($ERROR);
		 } 
	 }
	if($_REQUEST['acao']=='participar'){
		 if (strtoupper($team['buyonce'])=='Y') {
			$ex_con = array(
					'user_id' => $_REQUEST['idusuario'],
					'team_id' => $_REQUEST['idoferta'], 
					);
			$order = DB::LimitQuery('order', array(
				'condition' => $ex_con,
				'one' => true,
			));
			
			if ( Table::Count('order', $ex_con) ) {
				$ERROR = 'Você já está participando desta promoção. Informamos que para esta promoção, você só pode participar uma vez. Obrigado !';
				return utf8_encode($ERROR);
			}
		}
		
	}
   
	return utf8_encode($ERROR);
}

function get_funcao_js() {
	global $login_user_id,$team,$INI;  
	
	if($login_user_id){
	 
		if(ePacote($team['id'])){
			$conteudo = getOfertasPacote($team['id']);
			$funcao_JS = "abreboxOfertasPacote('$conteudo');";
		}
		else if($team['processo_compra']=="" or $team['processo_compra']=="0"){
			$funcao_JS = "J('#dadospedido').submit();"; 
		}
		else{
			$funcao_JS = "calc(1);";
		}
	}
	else{
		if($team['processo_compra']=="" or $team['processo_compra']=="0"){
			$funcao_JS = "set_utm(0);"; 
		}
		else{
			$funcao_JS = "calc(),set_utm();";
		}
	}
	if($team['url_comprar']!=""){
		$funcao_JS = "envia_url_comprar();";
	}
	
	if($team['team_type'] =="participe"){
		if($login_user_id){
			$funcao_JS = "participar(1);";
		}
		else{
			$funcao_JS = "participar(),set_utm();";
		}
	
	}
	
	return $funcao_JS;
}
function atualiza_click($idoferta) {

	$sql = "select clicados from team where id = $idoferta";
    $rs = mysql_query($sql);	
	$linha = mysql_fetch_object($rs);
	
	if($linha->clicados){
	   $sql = "update team set clicados = clicados + 1 where id = $idoferta";
		mysql_query($sql);	
	}
	else{
		$sql = "update team set clicados = 1 where id = $idoferta";
		mysql_query($sql);
	}
	
	$ip =  $_SERVER['REMOTE_ADDR'];
	$data = date('Y-m-d H:i:s');
	 
}

function atualiza_click_day($idoferta) {
	
	$data = date("Y-m-d");
	
	$sql = "select count(*) as total from click where id_team = " . $idoferta . " and date = '" . $data . "'";
	$rs = mysql_query($sql);
	$row = mysql_fetch_assoc($rs);
	
	if($row['total'] >= 1) {
		
		/* Atualiza o registro. */
		$sqlU = "update click set view = view + 1 where id_team = " . $idoferta;
		$rsU = mysql_query($sqlU);
	}
	else {
		
		/* Insere um novo registro. */
		$view = 1;
		
		$sqlI = "insert into click(id_team, date, view) values(" . $idoferta .", '" . $data . "', " . $view . ")";
		$rsI = mysql_query($sqlI);
		
		unset($view);
	}
}

function need_post() {
	return is_post() ? true : redirect(WEB_ROOT . '/index.php');
}
function need_manager($super=false) {
 
 	/*$sql =  "select manager from user where id = ".abs(intval($_SESSION['user_id']));
	$rs  = mysql_query($sql);
	$row = mysql_fetch_object($rs);
	
	if($row->manager=="Y"){
	 
		return true;
	}
	*/
	
	if ( ! is_manager() ) {
		redirect( WEB_ROOT . '/vipmin/login.php' );
	}
	 
	if ( ! $super ) return true;
	

	  
	if ( abs(intval($_SESSION['user_id'])) == 1 ) return true;
	return redirect( WEB_ROOT . '/vipmin/misc/index.php');
}


function busca_parceiro_usuario($email){
	
	$sql = "select id from partner where username='$email'";
	$rs = mysql_query($sql);
	$l = mysql_fetch_assoc($rs);
	return $l['id'];
	 
}
 

function need_anunciante($super=false) { 
  
	if($_SESSION['user_id']=="1"){
		return redirect( WEB_ROOT . '/adminanunciante/loginnegado.php');
	}
	
	//if ( abs(intval($_SESSION['partner_id']))) { 
	//	return true;
	//}  A sessao do adminanunciante a partir da versao premium é sempre do usuario
	
	if ( abs(intval($_SESSION['user_id']))) {
		
		//$dados  = Table::Fetch('user',$_SESSION['user_id']);
		//$idpartner = busca_parceiro_usuario($dados['email']);
		//$_SESSION['partner_id'] = $idpartner;
		//if($idpartner){

			return true;
		//}

	}
	
	
	return redirect( WEB_ROOT . '/adminanunciante/login.php');
}

function need_partner() {
	return is_partner() ? true : redirect( WEB_ROOT . '/lojista/login.php');
}

function need_open($b=true) {
	if (true===$b) {
		return true;
	}
	if ($AJAX) json('Este recurso não está aberto', 'alert');
	Session::Set('error', 'Características página que você visita não está aberto');
	redirect( WEB_ROOT . '/index.php');
}

function getUltimoIdOferta() {

/*
	$sql 			=  "select id from team order by id desc limit 1";
	$rs  			= mysql_query($sql);
	$row 			= mysql_fetch_object($rs);
	$idofertateam 	= $row->id;
	
	$sql 			=  "select id from team order by id desc limit 1";
	$rs  			= mysql_query($sql);
	$row 			= mysql_fetch_object($rs);
	$idofertateam 	= $row->id;
	*/
	
	$sql 		=  "select valor from configuracao where campo='ultimo_id_oferta'";
	$rs  		= mysql_query($sql);
	$row 		= mysql_fetch_object($rs);
	$idoferta 	= $row->valor;
	
	if($idoferta==""){
		$idoferta=0;
	}
	
	$idnovaoferta = $idoferta + 1;
	
	mysql_query("update configuracao set valor = '$idnovaoferta'  where campo='ultimo_id_oferta'");

	return $idnovaoferta;
	
}
function need_auth($b=true) {

	global $AJAX, $INI, $login_user;
   /*
    $sql =  "select manager from user where id = ".abs(intval($_SESSION['user_id']));
	$rs  = mysql_query($sql);
	$row = mysql_fetch_object($rs);
	
	if($row->manager=="Y"){
	 
		return true;
	}*/
 
	if (is_string($b)) {
		$auths = $INI['authorization'][$login_user['id']];
		 
		if(in_array($b, $auths)){
			 
		}
		$b = is_manager(true) || in_array($b, $auths);
	}
	if (true===$b) {
		return true;
	}
 
	 if ($AJAX) json('????', 'alert');
	die(include template('manage_misc_noright'));
}

function is_manager($super=false, $weak=false) {
	global $login_user;
	
	/*$sql =  "select manager from user where id = ".abs(intval($_SESSION['user_id']));
	$rs  = mysql_query($sql);
	$row = mysql_fetch_object($rs);
	
	if($row->manager=="Y"){
	 
		return true;
	}*/

	
	if ( $weak===false &&( !$_SESSION['admin_id'] || $_SESSION['admin_id'] != $login_user['id']) ) {
		return false;
	}
	if ( ! $super ) return ($login_user['manager'] == 'Y');
	return $login_user['id'] == 1;
}
function is_partner() {
	return ($_SESSION['partner_id']>0);
}

function is_newbie(){ return (cookieget('newbie')!='N'); }
function is_get() { return ! is_post(); }
function is_post() {
	return strtoupper($_SERVER['REQUEST_METHOD']) == 'POST';
}

function is_login() {
	return isset($_SESSION['user_id']);
}

function get_loginpage($default=null) {
	$loginpage = Session::Get('loginpage', true);
	if ($loginpage)  return $loginpage;
	if ($default) return $default;
	return WEB_ROOT . '/index.php';
}

function cookie_city($city) {
 
}

function ename_city($ename=null) {
	return DB::LimitQuery('category', array(
		'condition' => array(
			'zone' => 'city',
			'ename' => $ename,
		),
		'one' => true,
	));
}

function cookieset($k, $v, $expire=0) {
	$pre = substr(md5($_SERVER['HTTP_HOST']),0,4);
	$k = "{$pre}_{$k}";
	if ($expire==0) {
		$expire = time() + 365 * 86400;
	} else {
		$expire += time();
	}
	setCookie($k, $v, $expire, '/');
}

function cookieget($k, $default='') {
	$pre = substr(md5($_SERVER['HTTP_HOST']),0,4);
	$k = "{$pre}_{$k}";
	return isset($_COOKIE[$k]) ? strval($_COOKIE[$k]) : $default;
}

function moneyit($k) {
    return rtrim(rtrim(sprintf("%1.2f",$k), ' '), '.');

    }

function moneyit2($k) {
$moeda2 = number_format($k, '0');  
return rtrim($moeda2);
}

function moneyit3($k) {
$moeda3 = number_format($k, 2, ',', '.'); 
return rtrim($moeda3);
}


 
function debug($v, $e=false) {
	global $login_user_id;
	if ($login_user_id==100000) {
		echo "<pre>";
		var_dump( $v);
		if($e) exit;
	}
}

function getparam($index=0, $default=0) {
	if (is_numeric($default)) {
		$v = abs(intval($_GET['param'][$index]));
	} else $v = strval($_GET['param'][$index]);
	return $v ? $v : $default;
}
function getpage() {
	$c = abs(intval($_GET['page']));
	return $c ? $c : 1;
}
function pagestring($count, $pagesize, $wap=false) {
	$p = new Pager($count, $pagesize, 'page');
	if ($wap) {
		return array($pagesize, $p->offset, $p->genWap());
	}
	return array($pagesize, $p->offset, $p->genBasic());
}

function uencode($u) {
	return base64_encode(urlEncode($u));
}
function udecode($u) {
	return urlDecode(base64_decode($u));
}
function share_facebook($team) {
	global $login_user_id;
	global $INI;
	if ($team)  {
		$query = array(
				'u' => $INI['system']['wwwprefix'] . "/team.php?id={$team['id']}&r={$login_user_id}",
				't' => $team['title'],
				);
	}
	else {
		$query = array(
				'u' => $INI['system']['wwwprefix'] . "/r.php?r={$login_user_id}",
				't' => $INI['system']['sitename'] . '(' .$INI['system']['wwwprefix']. ')',
				);
	}

	$query = http_build_query($query);
	return 'http://www.facebook.com/sharer.php?'.$query;
}

 
function share_twitter($team) {
	global $login_user_id;
	global $INI;
	if ($team)  {
		$query = array(
				'status' => $INI['system']['wwwprefix'] . "/team.php?id={$team['id']}&r={$login_user_id}" . ' ' . $team['title'],
				);
	}
	else {
		$query = array(
				'status' => $INI['system']['wwwprefix'] . "/r.php?r={$login_user_id}" . ' ' . $INI['system']['sitename'] . '(' .$INI['system']['wwwprefix']. ')',
				);
	}

	$query = http_build_query($query);
	return 'http://twitter.com/?'.$query;
}

 
function share_renren($team) {
	global $login_user_id;
	global $INI;
	if ($team)  {
		$query = array(
				'link' => $INI['system']['wwwprefix'] . "/team.php?id={$team['id']}&r={$login_user_id}",
				'title' => $team['title'],
				);
	}
	else {
		$query = array(
				'link' => $INI['system']['wwwprefix'] . "/r.php?r={$login_user_id}",
				'title' => $INI['system']['sitename'] . '(' .$INI['system']['wwwprefix']. ')',
				);
	}

	$query = http_build_query($query);
	return 'http://share.renren.com/share/buttonshare.do?'.$query;
}

function share_kaixin($team) {
	global $login_user_id;
	global $INI;
	if ($team)  {
		$query = array(
				'rurl' => $INI['system']['wwwprefix'] . "/team.php?id={$team['id']}&r={$login_user_id}",
				'rtitle' => $team['title'],
				'rcontent' => strip_tags($team['summary']),
				);
	}
	else {
		$query = array(
				'rurl' => $INI['system']['wwwprefix'] . "/r.php?r={$login_user_id}",
				'rtitle' => $INI['system']['sitename'] . '(' .$INI['system']['wwwprefix']. ')',
				'rcontent' => $INI['system']['sitename'] . '(' .$INI['system']['wwwprefix']. ')',
				);
	}
	$query = http_build_query($query);
	return 'http://www.kaixin001.com/repaste/share.php?'.$query;
}

function share_douban($team) {
	global $login_user_id;
	global $INI;
	if ($team)  {
		$query = array(
				'url' => $INI['system']['wwwprefix'] . "/team.php?id={$team['id']}&r={$login_user_id}",
				'title' => $team['title'],
				);
	}
	else {
		$query = array(
				'url' => $INI['system']['wwwprefix'] . "/r.php?r={$login_user_id}",
				'title' => $INI['system']['sitename'] . '(' .$INI['system']['wwwprefix']. ')',
				);
	}
	$query = http_build_query($query);
	return 'http://www.douban.com/recommend/?'.$query;
}

function tratanome($title){

	$var = ereg_replace("[ÁÀÂÃ]","A", utf8_decode($title) );
	$var = ereg_replace("[áàâãª]","a",$var);
	$var = ereg_replace("[ÉÈÊ]","E",$var);
	$var = ereg_replace("[éèê]","e",$var);
	$var = ereg_replace("[Í]","I",$var);
	$var = ereg_replace("[ÓÒÔÕ]","O",$var);
	$var = ereg_replace("[óòôõº]","o",$var);
	$var = ereg_replace("[ÚÙÛ]","U",$var);
	$var = ereg_replace("[í]","i",$var);
	$var = ereg_replace("[úùû]","u",$var);
	$var = str_replace("Ç","C",$var);
	$var = str_replace("ç","c",$var);
	return $var;

}
 
 

function urlamigavel($nome){
	return  str_replace("++","+",utf8_decode(str_replace("r$","",strtolower(str_replace("-","",str_replace("'","",str_replace(",","",str_replace("!","",str_replace("/","",str_replace("%","",str_replace(".","",str_replace(" ","+",$nome)))))))))))) .".html";
}

function share_sina($team) {
	global $login_user_id;
	global $INI;
	if ($team)  {
		$query = array(
				'url' => $INI['system']['wwwprefix'] . "/team.php?id={$team['id']}&r={$login_user_id}",
				'title' => $team['title'],
				);
	}
	else {
		$query = array(
				'url' => $INI['system']['wwwprefix'] . "/r.php?r={$login_user_id}",
				'title' => $INI['system']['sitename'] . '(' .$INI['system']['wwwprefix']. ')',
				);
	}
	$query = http_build_query($query);
	return 'http://v.t.sina.com.cn/share/share.php?'.$query;
}

function share_mail($team) {
	global $login_user_id;
	global $INI;
	if (!$team) {
		$team = array(
				'title' => $INI['system']['sitename'] . '(' . $INI['system']['wwwprefix'] . ')',
				);
	}
	$pre[] = "Found a good site--{$INI['system']['sitename']}?Every day is a New deal!";
	if ( $team['id'] ) {
		$pre[] = "Customers today are:{$team['title']}";
		$pre[] = "I think you will be interested in:";
		$pre[] = $INI['system']['wwwprefix'] . "/team.php?id={$team['id']}&r={$login_user_id}";
		 
		$sub = "You are interested in?{$team['title']}";
	} else {
		$sub = $pre[] = $team['title'];
	}
	$sub = mb_convert_encoding($sub, 'GBK', 'UTF-8');
	$query = array( 'subject' => $sub, 'body' => $pre, );
	$query = http_build_query($query);
	return 'mailto:?'.$query;
}

function domainit($url) {
	if(strpos($url,'//')) { preg_match('#[//]([^/]+)#', $url, $m);
} else { preg_match('#[//]?([^/]+)#', $url, $m); }
return $m[1];
}

function getDomino($email){
	$email = explode("@",$email);
	return $email[1];	
} 
 
if(! function_exists ( 'checkdnsrr' )){ 
	function checkdnsrr ( $host , $type = '' ){ 
		if(!empty( $host )){ 
			$type = (empty( $type )) ? 'MX' : $type ; 
			exec ( 'nslookup -type=' . $type . ' ' . escapeshellcmd ( $host ), $result ); 
			$it = new ArrayIterator ( $result ); 
			foreach(new RegexIterator ( $it , '~^' . $host . '~' , RegexIterator :: GET_MATCH ) as $result ){ 
				if( $result ){ 
					return true ; 
				} 
			} 
		} 
		return false ; 
	} 
}

function RecursiveMkdir($path) {
	if (!file_exists($path)) {
		RecursiveMkdir(dirname($path));
		@mkdir($path, 0777,true);
	}
	 
}

function need_login($wap=false) {
	if ( isset($_SESSION["user_id"]) ) {
		if (is_post()) {
			unset($_SESSION["loginpage"]);
			unset($_SESSION["loginpagepost"]);
		}
		return $_SESSION["user_id"];
	}
 
	$_SESSION["loginpagepost"] = $_SERVER["REQUEST_URI"];
	 
	if (true===$wap) {
		return redirect(WEB_ROOT . "/wap/login.php");
	}
 
	return redirect(WEB_ROOT . "/index.php?acao=needlogin");
}

function user_image($image=null) {
global $INI;
	if (!$image) {
		return $INI['system']['imgprefix'] . '/media/img/user-no-avatar.gif';
	}
	return $INI['system']['imgprefix'] . '/media/' .$image;
}

function team_image($image=null, $index=false) {
	global $INI;
	if (!$image) return null;
	if ($index) {
		$path = WWW_ROOT . '/media/' . $image;
		$image = preg_replace('#(\d+)\.(\w+)$#', "\\1_index.\\2", $image);
		$dest = WWW_ROOT . '/media/' . $image;
		if (!file_exists($dest) && file_exists($path) ) {
			Image::Convert($path, $dest, 200, 120, Image::MODE_SCALE);
		}
	}
	return $INI['system']['imgprefix'] . '/media/' .$image;
}

function userreview($content) {
	$line = preg_split("/[\n\r]+/", $content, -1, PREG_SPLIT_NO_EMPTY);
	$r = '<ul>';
	foreach($line AS $one) {
		$c = explode('|', htmlspecialchars($one));
		$c[2] = $c[2] ? $c[2] : '/';
		$r .= "<li>{$c[0]}<span><a href=\"{$c[2]}\" target=\"_blank\">{$c[1]}</a>";
		$r .= ($c[3] ? "?{$c[3]}?":'') . "</span></li>\n";
	}
	return $r.'</ul>';
}

function invite_state($invite) {
	if ('Y' == $invite['pay']) return 'Já comprou';
	if ('C' == $invite['pay']) return 'Não Aprovado';
	if ('N' == $invite['pay'] && $invite['buy_time']) return 'Ainda não comprou';
	if (time()-$invite['create_time']>7*86400) return 'Expirado';
	return 'Não Comprei';
}

function team_state(&$team) {
	if ( $team['now_number'] >= $team['min_number'] ) {
		if ($team['max_number']>0) {
			if ( $team['now_number']>=$team['max_number'] ){
				if ($team['close_time']==0) {
					$team['close_time'] = $team['end_time'];
				}
				return $team['state'] = 'soldout';
			}
		}
		if ( $team['end_time'] <= time() ) {
			$team['close_time'] = $team['end_time'];
		}
		return $team['state'] = 'success';
	} else {
		if ( $team['end_time'] <= time() ) {
			$team['close_time'] = $team['end_time'];
			return $team['state'] = 'failure';
		}
	}
	return $team['state'] = 'none';
}

 

function state_explain($team, $error='false') {
	$state = team_state($team);
	$state = strtolower($state);
	switch($state) {
		case 'none': return 'Oferta em curso';
		case 'soldout': return 'Oferta esgotada';
		case 'failure': if($error) return 'Oferta não atingiu min. de compradores';
		case 'success': return 'Sucesso na oferta';
		default: return 'Oferta Finalizada';
	}
}

function get_zones($zone=null) {
	$zones = array(
			'city' => 'Cidade',
			'group' => 'Categoria',
			//'public' => 'Categoria do Forum',
			//'grade' => 'User Grade',
			//'express' => 'Express',
			'partner' => 'Categoria de parceria',
			);
	if ( !$zone ) return $zones;
	if (!in_array($zone, array_keys($zones))) {
		$zone = 'city';
	}
	return array($zone, $zones[$zone]);
}

 
function down_xls($data, $keynames, $name='dataxls') {
	$xls[] = "<html><meta http-equiv=content-type content=\"text/html; charset=UTF-8\"><body><table border='1'>";
	$xls[] = "<tr><td>ID</td><td>" . implode("</td><td>", array_values($keynames)) . '</td></tr>';
	foreach($data As $o) {
		$line = array(++$index);
		foreach($keynames AS $k=>$v) {
			$line[] = $o[$k];
		}
		$xls[] = '<tr><td>'. implode("</td><td>", $line) . '</td></tr>';
	}
	$xls[] = '</table></body></html>';
	$xls = join("\r\n", $xls);
	header('Content-Disposition: attachment; filename="'.$name.'.xls"');
	die(mb_convert_encoding($xls,'UTF-8','UTF-8'));
}

function option_hotcategory($zone='city', $force=false, $all=false) {
	$cates = option_category($zone, $force, true);
	$r = array();
	foreach($cates AS $id=>$one) {
		if ('Y'==strtoupper($one['display'])) $r[$id] = $one;
	}
	return $all ? $r: Utility::OptionArray($r, 'id', 'name');
}

function option_category($zone='city', $force=false, $all=false) {
	$cache = $force ? 0 : 86400*30;
	$cates = DB::LimitQuery('category', array(
		'condition' => array( 'zone' => $zone, ),
		'order' => 'ORDER BY sort_order DESC, id DESC',
		'cache' => $cache,
	));
	$cates = Utility::AssColumn($cates, 'id');
	return $all ? $cates : Utility::OptionArray($cates, 'id', 'name');
}

function option_yes($n, $default=false) {
	global $INI;
	if (false==isset($INI['option'][$n])) return $default;
	$flag = trim(strval($INI['option'][$n]));
	return abs(intval($flag)) || strtoupper($flag) == 'Y';
}

function option_yesv($n, $default='N') {
	return option_yes($n, $default=='Y') ? 'Y' : 'N';
}



function team_discount($team, $save=false) {
	if ($team['market_price']<0 || $team['team_price']<0 ) {
		return '?';
	}
	return moneyit((10*$team['team_price']/$team['market_price']));
}

function desconto($team_price, $market_price) {
	 
	return moneyit((10*$team_price/$market_price));
}

function team_origin($team, $quantity=0) {
	$origin = $quantity * $team['team_price'];
	if ($team['delivery'] == 'express'
			&& ($team['farefree']==0 || $quantity < $team['farefree'])
		) {
			$origin += $team['fare'];
		}
	return $origin;
}

function error_handler($errno, $errstr, $errfile, $errline) {
	switch ($errno) {
		case E_PARSE:
		case E_ERROR:
			echo "<b>Fatal ERROR</b> [$errno] $errstr<br />\n";
			echo "Fatal error on line $errline in file $errfile";
			echo "PHP " . PHP_VERSION . " (" . PHP_OS . ")<br />\n";
			exit(1);
			break;
		default: break;
	}
	return true;
}

function obscure_rep($u) {
	if(!option_yes('encodeid')) return $u;
	if(preg_match('#/vipmin/#', $_SERVER['REQUEST_URI'])) return $u;
	return preg_replace_callback('#(\?|&)id=(\d+)(\b)#i', obscure_cb, $u);
}
function obscure_did() {
	$gid = strval($_GET['id']);
	if ($gid && strpos($gid, 'WR')===0) {
		$_GET['id'] = base64_decode(substr($gid,2))>>2;
	}
}
function obscure_cb($m) {
	$eid = obscure_eid($m[2]);
	return "{$m[1]}id={$eid}{$m[3]}";
}
function obscure_eid($id) {
	return 'WR'.base64_encode($id<<2);
}
obscure_did();



function trimarray($o) {
	if (!is_array($o)) return trim($o);
	foreach($o AS $k=>$v) { $o[$k] = trimarray($v); }
	return $o;
}
$_POST = trimarray($_POST);


set_error_handler('error_handler');

function img_parceiro() {
	return ($_SESSION['partner_id']>0);
}

function exibe_filhos($id_categoria, $indent='',$idpai=false,$id=false){
 
 	if($id){
			$aux =  " and id <> ".$id;
	}
													
	$sql = "select * from category where idpai=$id_categoria and tipo <>'pagina' and tipo <> 'sistema'  $aux order by sort_order desc";
	$rs = mysql_query($sql);
	

	while($l = mysql_fetch_assoc($rs)){
	    $selected ="";
		if($idpai == $l['id']){
				$selected =  " selected ";
		}
		$tipocategoria = $l[tipo];
		$nomecategoria = $l[name];
		
		if($tipocategoria=="")
		
		echo "<option value='$l[id]' $selected  >$indent $l[name]</option>";
		exibe_filhos($l["id"], $indent . $indent,$idpai,$id);
	}
}
function exibe_filhos_page($id_categoria, $indent='',$idpai=false){
 
  
	$sql = "select * from category where idpai=$id_categoria";
	$rs = mysql_query($sql);
	
	while($l = mysql_fetch_assoc($rs)){
	    $selected ="";
		if($idpai == $l['id']){
				$selected =  " selected ";
		}
		echo "<option value='$l[id]' $selected  >$indent $l[name]</option>";
		exibe_filhos($l["id"], $indent . $indent,$idpai,$id);
	}
}
	
function getImagem($team,$aux=false){
	global $INI; 
	
	if($aux== "popular"){ 
		$imgbase = substr($team['estatica_home'],0,-4)."_estatica_home.jpg";
		if(file_exists(WWW_ROOT."/media/".$imgbase)){
			return $INI['system']['wwwprefix']."/media/".$imgbase;
		} 
	}
	else if($aux== "lateral"){ 
		$imgbase = substr($team['estatica_direita'],0,-4)."_estatica_direita.jpg";
		if(file_exists(WWW_ROOT."/media/".$imgbase)){
			return $INI['system']['wwwprefix']."/media/".$imgbase;
		} 
	}
	else if($aux=="detalhe"){ 
		$imgbase = substr($team['estatica_detalhe'],0,-4)."_estatica_detalhe.jpg";
		if(file_exists(WWW_ROOT."/media/".$imgbase)){
			return $INI['system']['wwwprefix']."/media/".$imgbase;
		} 
	}
	 
	 if($aux != ""){
		 $aux = "_".$aux;
	  }
	  
	  if(!$team['image']){
		if(file_exists(WWW_MOD."/fit.inc")){
		return $INI['system']['wwwprefix']."/skin/padrao/images/semfotofit.png";
		}
		else{
			return $INI['system']['wwwprefix']."/skin/padrao/images/semfoto.jpg";
		}
	  }
	  else{
		return $INI['system']['wwwprefix']."/media/".substr($team['image'],0,-4).$aux.".jpg";
	 }
	
}


//bannerslideshow
function getbannerslideshow(){ 
       
  global $ROOTPATH ;
  
  $dir =  WWW_ROOT."/media/slideshowbannersheader";
  $dh =  opendir($dir);
  
  if($dh){
    
   while ($file = readdir($dh)){
   
    if($file =="." or $file == ".." or $file =="thumbs"){
     continue;
    } 
    $itens[] = $file ; 
   } 
   
   sort($itens);
   
   foreach ($itens as $file) {
    
    
    $sql = "select link from linkbanners where file='$file'";
    $rs = mysql_query($sql);
    $row = mysql_fetch_object($rs);
    $link = $row->link;
        
    $imagens.="<li><a href='$link'><img src='$ROOTPATH/media/slideshowbannersheader/".trim($file)."' class='cubeJelly' /></a><!-- <div class='label_text'><p>Label</p></div> --></li>";
    } 
   
  } 
  
 return  $imagens;
}


//superbanner
function getsuperslide(){ 
			    
		global $ROOTPATH ;
		
		$dir =  WWW_ROOT."/media/superbackground";
		$dh =  opendir($dir);
		
		if($dh){
		  
			while ($file = readdir($dh)){
			
				if($file =="." or $file == ".." or $file =="thumbs"){
					continue;
				} 
				$itens[] = $file ; 
			} 
			
			sort($itens);
			
			foreach ($itens as $file) {
			
				$imagens.="{image :  '$ROOTPATH/media/superbackground/".trim($file)."', title : 'teste', thumb : 'teste', url : '$ROOTPATH/media/superbackground/".trim($file)."'},";
			 } 
			
		}
		$imagens = substr($imagens, 0, -1); 
	return 	$imagens;
}

function calculaFrete($cod_servico, $cep_origem, $cep_destino, $peso, $altura, $largura, $comprimento, $valor_declarado)
{
    #OFICINADANET###############################
    # Código dos Serviços dos Correios
    # 41106 PAC sem contrato
    # 40010 SEDEX sem contrato
    # 40045 SEDEX a Cobrar, sem contrato
    # 40215 SEDEX 10, sem contrato
    ############################################
	  
	$cod_servico = 41106;

	$valor_declarado = number_format($valor_declarado, 2, ',', '.');
	 
    $correios = "http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx?nCdEmpresa=&sDsSenha=&sCepOrigem=".$cep_origem."&sCepDestino=".$cep_destino."&nVlPeso=".$peso."&nCdFormato=1&nVlComprimento=".$comprimento."&nVlAltura=".$altura."&nVlLargura=".$largura."&sCdMaoPropria=n&nVlValorDeclarado=". $valor_declarado ."&sCdAvisoRecebimento=n&nCdServico=".$cod_servico."&nVlDiametro=0&StrRetorno=xml";
    $xml = simplexml_load_file($correios);
    if($xml->cServico->Erro == '0')
        return $xml->cServico->Valor;
    else
        return false;
}

function getCepDestino($dados){ 

	if(empty($dados['entrega_cep'])){
			return $dados['zipcode'];
	 }
	else{
		return $dados['entrega_cep'];
	}
	
}

function getEnderecoClienteEntrega($dados){ 
	  
	if(empty($dados['entrega_endereco'])){
			getEnderecoClienteCobranca($dados);
			return;
	}
	$endereco = ucfirst(utf8_decode($dados['entrega_endereco'])). ", ".ucfirst($dados['entrega_numero']);
	if($dados['entrega_complemento']!=""){
		$endereco.= " ".ucfirst(utf8_decode($dados['entrega_complemento']));
	}
	$endereco .=  ", ".ucfirst(utf8_decode($dados['entrega_bairro'])). ", ".ucfirst(utf8_decode($dados['entrega_cidade'])). " - ".strtoupper(utf8_decode($dados['entrega_estado'])). " - ".$dados['entrega_cep'];
	echo $endereco ;
 
}
function getEnderecoClienteCobranca($dados){ 
	
	if(empty($dados['cobranca_endereco'])){
			getEnderecoCliente($dados);
			return;
	}
	
	$endereco = ucfirst(utf8_decode($dados['cobranca_endereco'])). ", ".ucfirst($dados['cobranca_numero']);
	if($dados['cobranca_complemento']!=""){
		$endereco.= " ".ucfirst(utf8_decode($dados['cobranca_complemento']));
	}
	$endereco .=  ", ".ucfirst(utf8_decode($dados['cobranca_bairro'])). ", ".ucfirst(utf8_decode($dados['cobranca_cidade'])). " - ".strtoupper(utf8_decode($dados['cobranca_estado'])). " - ".$dados['cobranca_cep'];
	echo $endereco ;
 
}
function getEnderecoCliente($dados){ 
	
	$endereco = ucfirst(utf8_decode($dados['address'])). ", ".ucfirst(utf8_decode($dados['bairro'])). ", ".ucfirst(utf8_decode($dados['cidadeusuario'])). " - ".strtoupper($dados['estado']). " - ".$dados['zipcode'];
	echo $endereco ;
 
}

function displaySubStringWithStrip($string, $length=NULL)
{
    if ($length == NULL)
            $length = 50;
   
    $stringDisplay = substr(strip_tags($string), 0, $length);
    if (strlen(strip_tags($string)) > $length)
        $stringDisplay .= ' ...';
    return $stringDisplay;
}
 
function getEnderecoEntregaPedido($dados){ 
	   
	$endereco = ucfirst($dados['entrega_endereco']). ", ".ucfirst($dados['entrega_numero']);
	if($dados['entrega_complemento']!=""){
		$endereco.= " ".ucfirst($dados['entrega_complemento']);
	}
	$endereco .=  ", ".ucfirst( $dados['entrega_bairro'] ). ", ".ucfirst($dados['entrega_cidade']). " - ".strtoupper($dados['entrega_estado']). " - ".$dados['entrega_cep'];
	echo $endereco ;
 
}

function getEnderecoEntregaPedidoUser($dados){ 
	   
	$endereco = ucfirst(utf8_decode($dados['entrega_endereco'])). ", ".ucfirst($dados['entrega_numero']);
	if($dados['entrega_complemento']!=""){
		$endereco.= " ".ucfirst(utf8_decode($dados['entrega_complemento']));
	}
	$endereco .=  ", ".ucfirst(utf8_decode($dados['entrega_bairro'])). ", ".ucfirst(utf8_decode($dados['entrega_cidade'])). " - ".strtoupper(utf8_decode($dados['entrega_estado'])). " - ".$dados['entrega_cep'];
	echo $endereco ;
 
}
 

function getEnderecoCobrancaPedido($dados){ 
  
	$endereco = ucfirst($dados['cobranca_endereco']). ", ".ucfirst($dados['cobranca_numero']);
	if($dados['cobranca_complemento']!=""){
		$endereco.= " ".ucfirst($dados['cobranca_complemento']);
	}
	$endereco .=  ", ".ucfirst($dados['cobranca_bairro']). ", ".ucfirst($dados['cobranca_cidade']). " - ".strtoupper($dados['cobranca_estado']). " - ".$dados['cobranca_cep'];
	echo $endereco ;
 
}

function data($var){
	return date('d/m/Y', strtotime($var));
}

function getEnderecoCobrancaPedidoAdmin($idpedido){ 
  
	$dados  = Table::Fetch('order_enderecos',$idpedido,'idpedido');
  
	$endereco = ucfirst($dados['cobranca_endereco']). ", ".ucfirst($dados['cobranca_numero']);
	if($dados['cobranca_complemento']!=""){
		$endereco.= " ".ucfirst($dados['cobranca_complemento']);
	}
	$endereco .=  ", ".ucfirst($dados['cobranca_bairro']). ", ".ucfirst($dados['cobranca_cidade']). " - ".strtoupper($dados['cobranca_estado']). " - ".$dados['cobranca_cep'];
	echo $endereco ;
 
}

function getEnderecoEntregaPedidoAdmin($idpedido){ 
	   
	 $dados  = Table::Fetch('order_enderecos',$idpedido,'idpedido');
	   
	$endereco = ucfirst($dados['entrega_endereco']). ", ".ucfirst($dados['entrega_numero']);
	if($dados['entrega_complemento']!=""){
		$endereco.= " ".ucfirst($dados['entrega_complemento']);
	}
	$endereco .=  ", ".ucfirst( $dados['entrega_bairro'] ). ", ".ucfirst($dados['entrega_cidade']). " - ".strtoupper($dados['entrega_estado']). " - ".$dados['entrega_cep'];
	echo $endereco ;
 
}

function geraBreadcrumb( ){ 
	   
	   global $city,$INI;
	 
	
	$linkcidade =  "<a  class='breadlink' href='".$INI['system']['wwwprefix']."/". strtolower(str_replace(" ","-",utf8_decode($city['name'])))."/ofertas/". $city['id']."'>".utf8_decode($city['name'])."</a>";
 
	$idcategoria = $_REQUEST['idcategoria'];
	
	if($idcategoria and empty($_POST['cppesquisa'])){
			$categoria  = Table::Fetch('category',$idcategoria); 
			$linkcategoria =  "<a class='breadlink' href='".$INI['system']['wwwprefix']."/index.php?idcategoria=$idcategoria'>".utf8_decode($categoria['name'])."</a>";
			
			$Breadcrumb = $linkcidade ."<span style='font-size:13px;face:verdana;color:#ccc'> ></span> ".$linkcategoria;
	}
	else{
			$Breadcrumb = $linkcidade ;
	}
	 echo $Breadcrumb;
	  
}

function buscaTituloAnuncio($team){ 
												
	$fabricante = mysql_query("SELECT id, nome FROM fabricante where id = '".$team['car_fabricante']."'");
	$row = mysql_fetch_array($fabricante);
	$fabricantecarro=$row['nome'];	
	
	$sql="SELECT nome FROM modelo WHERE id = '".$team['car_modelo']."'";
	$modelo = mysql_query($sql);
	$row = mysql_fetch_array($modelo);
    $modelocarro=$row['nome'];
	
	//$titulo = $fabricantecarro. " ".$modelocarro. " -".$team['car_ano']. "/".$team['modelo_ano']; 
	$titulo = $fabricantecarro. " ".$modelocarro; 
	
	return $titulo;

}
function verificaatualizacao($idteam) {
	 
	Util::log($idteam. " -  verificaatualizacao()");
	if($idteam!=""){
		$team  = Table::Fetch('team',$idteam);
		$partner_plano_id  = $team[partner_plano_id];
		$partner_planos  = Table::Fetch('partner_planos',$partner_plano_id);
		$planos_publicacao  = Table::Fetch('planos_publicacao',$partner_planos[plano_id]);

		Util::log($idteam. " - partner_plano_id ".$partner_plano_id );
		Util::log($idteam. " - plano_id ".$partner_planos[plano_id] );
		
		if($partner_planos[status] != "aprovado"){
			 $sql =	"update partner_planos set status='aprovado' where id=".$partner_plano_id;
			 $rs  =    mysql_query($sql);
			
		    Util::log($idteam. " -   ".$sql);
		  
			if($planos_publicacao['ehdestaque']=="Y"){
				$aux = ",ehdestaque='Y'";
			}	 	
		
			 $sql =	"update team set  pago='sim' $aux where id=".$idteam;
			 $rs =  mysql_query($sql); 
			 Util::log($idteam. " -   ".$sql);
		}
	}
	else { 
		Util::log("ID VAZIO" );
	}
		
}


function get_info_plano($anuncianteid){

	Util::log("get_info_plano()" ); 
	Util::log("ID anunciante: ".$anuncianteid); 
  
	 $sql = "select id, data,plano_id from partner_planos where status in ('aprovado','gratis') and  partner_id = $anuncianteid  order by id desc limit 1";
	 $rs = mysql_query($sql);
	 $row =  mysql_fetch_assoc($rs);
	 $data = $row[data];
	 $plano_id = $row[plano_id];
	 $id = $row[id];
	 
	 $planos_publicacao  = Table::Fetch('planos_publicacao',$plano_id );
	 $nome =  $planos_publicacao['nome'] ;
	 
	 $txt  =  "<b>Cod Aquisi&ccedil;&atilde;o: $id - PLANO : ".$nome. "</b> - Data: ".datahora($data) ;
	 
	 return $txt;
	 
}

function precotabelafipe($ano,$modelo,$tipo){ 
	 $sql 	= "select * from ano_modelo where modelo = '$modelo' and nome like '$ano%' order by id desc limit 1";
	 $rs 	= mysql_query($sql);
	 $row 	=  mysql_fetch_assoc($rs); 
	 $valor = $row[valor]; 
	 if(trim($valor)!=""){
		return moneyit3($valor);
	 }
	 else {
		return "";
	 } 
}
function datahora($var){
	return date('d/m/Y H:i:s', strtotime($var));
}

function get_saldo($anuncianteid){

	Util::log("get_saldo()" ); 
	Util::log("ID anunciante: ".$anuncianteid); 

	//$partner_planos  = Table::Fetch('partner_planos',$anuncianteid,'partner_id');
	
	 $sql = "select * from partner_planos where status in ('aprovado','gratis') and partner_id = $anuncianteid   order by id desc limit 1";
	 $rs = mysql_query($sql);
	 $row =  mysql_fetch_assoc($rs);
	 $partner_plano_id = $row[id];
	 $quandidade_plano_adquirido = $row[qtdeanuncio] ;
	 
	  if(empty($quandidade_plano_adquirido)){
			$quandidade_plano_adquirido = 0;
	}
		 
	 Util::log($sql);
	 Util::log("partner_plano_id -  ".$partner_plano_id);
	 Util::log("quandidade_plano_adquirido -  ".$quandidade_plano_adquirido);
	 
	 
	 if(mysql_num_rows($rs)>0){
		 $sql2 = "select sum(contador) as total from team where partner_plano_id = ".$partner_plano_id;
		 $rs2 = mysql_query($sql2);
		 $row2 =  mysql_fetch_assoc($rs2);
		 $qtde_ativos = $row2[total];
		 if(empty($qtde_ativos)){
			$qtde_ativos = "0";
		 }
		 
		Util::log($sql2);
		Util::log("qtde_ativos -  ".$qtde_ativos);  
	 
		$saldo = (int)$quandidade_plano_adquirido - (int)$qtde_ativos;
		Util::log("saldo -  ".$saldo); 
		return $saldo; 
	 
	 }
	 else {
		Util::log("Nao existem plano aprovado deste anunciante id $anuncianteid "); 
		return "-1";
	 }
	 
	
}

function atualiza_partner_plano_id($idanuncio,$partner_plano_id){
	  
	 Util::log("atualiza_partner_plano_id() - idanuncio:  $idanuncio - partner_plano_id: $partner_plano_id");
      if($idanuncio != ""){
		$sql	=	"update team set partner_plano_id = $partner_plano_id where id=".$idanuncio;
		$rs     =  mysql_query($sql); 
		Util::log("$sql");
	 }
	 else{
		Util::log("Nao precisa atualizar o partner_plano_id da oferta uma vez que o usuario esta adquirindo o plano na area publica");
	 } 
}

function gravaplano($partner_id,$idplano,$status,$idanuncio,$idupgrades){ 
		
		Util::log("gravaplano()" ); 
		Util::log("ID anunciante: ".$partner_id); 
		
		$data = date("Y-m-d H:i:s");
		$dias 	= getdiasplano($idplano);
		$planos_publicacao = Table::Fetch('planos_publicacao',$idplano); 
		$qtdeanuncio = $planos_publicacao[qtdeanuncio];
		$valor = $planos_publicacao[valor];
		//if($valor==""){
		//	$valor =  "0,00";
		//}
		//if($status==""){
		//	$status="gratis";
		//}
	    $sql	=	"INSERT INTO `partner_planos`( partner_id,data, plano_id,dias,status,qtdeanuncio,valor ) values ( '".$partner_id."','".$data."','".$idplano."','".$dias."','$status','$qtdeanuncio','$valor')";
		$rs 	=  mysql_query($sql);
		
		if(!$rs){
			echo "$data -  Não foi possível inserir este plano $idplano em partner_planos.".mysql_error();
			Util::log($_REQUEST['team_id']. " -  Não foi possível inserir este plano $idplano em partner_planos.".mysql_error());
		}
		else{
			Util::log($_REQUEST['team_id']. " -  Plano $idplano inserido com sucesso na tabela partner_planos para anunciante $partner_id");
			$partner_plano_id = mysql_insert_id();
			  
		    Util::log($RetornoPagamento->id_anuncio. " - VERIFICANDO ID DE UPGRADE NA REFERENCIA");
		    $referenciarr	 = explode("AREAPUBLICA",$idupgrades);
			$referencia = $referenciarr['1']; 
		    Util::log($RetornoPagamento->id_anuncio. " - ".$referencia);
			
			cadastraupgrade($referencia, $partner_plano_id );
			atualiza_partner_plano_id($idanuncio,$partner_plano_id);
			return $partner_plano_id;
		} 	
}

function cadastraupgrade($idupgrades,$idpartnerplanos){
	
		Util::log("cadastraupgrade()" ); 
		Util::log("ID upgrades : ".$idupgrades);
		Util::log("idpartnerplanos : ".$idpartnerplanos);
		
	 $data = date("Y-m-d H:i:s");
     $arrayupgrades = explode(",",$idupgrades);
	 
	 foreach($arrayupgrades as $k=>$v) {
		
		if($v!=""){
			$sql	=	"INSERT INTO `planos_upgrade_partner_plano`( idupgrade,idpartnerplanos, usou, data ) values ( '".$v."','".$idpartnerplanos."','','".$data."')";
			$rs 	=  mysql_query($sql);
			if(!$rs){
				Util::log($sql. " - ". mysql_error());
			}
		}
 
	 }
	
}

function get_partner_plano_id($anuncianteid){

		Util::log("get_partner_plano_id()" ); 
		Util::log("ID anunciante: ".$anuncianteid); 
	
	 $sql = "select * from partner_planos where status in ('aprovado','gratis') and partner_id = $anuncianteid order by id desc limit 1";
	 $rs = mysql_query($sql);
	 $row =  mysql_fetch_assoc($rs);
	 $partner_plano_id = $row[id]; 
	 
	 
	 Util::log($sql); 
	 Util::log("partner_plano_id :".$partner_plano_id ); 
	 
	 return  $partner_plano_id; 
}
 
function busca_plano_cliente($partner_id){ 
	
	/*
	$sql = "select plano_id from partner_planos where status in ('gratis','pago','') and partner_id = $partner_id order by id DESC limit 1"; 
    $rs = mysql_query($sql);
 
	if(!$rs){
		Util::log("Erro na consulta do ultimo plano contratado para o cliente: $partner_id ". mysql_error());
		return;
	} 
	$linha = mysql_fetch_object($rs);
	$plano_id = $linha->plano_id;
	return $plano_id;
	
	*/
	
	
	Util::log("busca_plano_cliente()" ); 
	Util::log("ID anunciante: ".$partner_id); 

	//$partner_planos  = Table::Fetch('partner_planos',$anuncianteid,'partner_id');
	
	 $sql = "select plano_id from partner_planos where partner_id = $partner_id   order by id desc limit 1";
	 $rs = mysql_query($sql);
	 $row =  mysql_fetch_assoc($rs); 
	 $plano_id = $row[plano_id] ;
	 
	 Util::log( $sql );
	 Util::log( "plano_id  ".$plano_id  );
	 
	 return $plano_id;
	
}

function buscaprecosfipe($modelo,$ano){

     $sql 	= "select valor from ano_modelo where modelo = '$modelo' and nome like '$ano%' order by id desc limit 1";
	 $rs 	= mysql_query($sql);
	 $row 	=  mysql_fetch_assoc($rs); 
	 if(mysql_num_rows($rs)){	
		$fipe[precotabelafipe] = "R$ ".moneyit3($row[valor]); 
	 }
	 
	 $sql 	= "select AVG(team_price) valormedio from team where car_modelo  = '$modelo' and modelo_ano = '$ano'";
	 $rs 	= mysql_query($sql);
	 $row 	=  mysql_fetch_assoc($rs); 
	 
	 if( !empty($row[valormedio]) and $row[valormedio] != 0){	 
		$fipe[precotabelamedia] = "R$ ".moneyit3($row[valormedio]); 
	 }
	 
	$sql 	= "select MAX(team_price) valor from team where car_modelo  = '$modelo' and modelo_ano = '$ano'";
	$rs 	= mysql_query($sql);
	$row 	=  mysql_fetch_assoc($rs); 
	if(mysql_num_rows($rs)){	
		$fipe[maiorprecoanunciado] = "R$ ".moneyit3($row[valor]); 
	}	
	
	$sql 	= "select MIN(team_price) valor from team where car_modelo  = '$modelo' and modelo_ano = '$ano'";
	$rs 	= mysql_query($sql);
	$row 	=  mysql_fetch_assoc($rs); 
	if(mysql_num_rows($rs)){	
		$fipe[menorprecoanunciado] = "R$ ".moneyit3($row[valor]); 
	}
	 
	 
	 return $fipe;

}

function getfones($userid){ 
		 
	global $INI,$ROOTPATH,$PATHSKIN;	
	$usuario 	= Table::Fetch('user',$userid); 
	$tipoanunciante 		= $usuario['tipoanunciante'] ; 
	$pessoaresponsavel 		=  $usuario['pessoaresponsavel']  ;
	$dddfixo 				= $usuario['ddd'] ;
	$telfixo 				= $usuario['telefonefixo'] ; 
	$dddcel 			 	= $usuario['ddd2'] ;
	$celular 				= $usuario['celular'] ; 
	$nextel 				= $usuario['nextel'] ;
	$site 					= $usuario['site'] ;
	$nomeaunciante 			=  $usuario['realname'] ;
	
	if($dddfixo){
		$telfixo = "($dddfixo) $telfixo"; 
	}
	if($dddcel){
		$celular= "($dddcel) $celular"; 
	}
	//echo "==".$tipoanunciante ;
	//echo "==".$userid ;
	?>
	<div style="height:300px;width:100%">
	<div>
	<h1 class="size-29-light vermelho-padrao"><img  src='<?php echo $PATHSKIN."/images/iconetel.png"?>'> Telefones</h1>
	<div class="span-8 box-info-PF last" style="width:100%;">
		<div class="span-4 size-17" style="margin-bottom:11px;">
		<? 
		if($tipoanunciante!="Particular"){
			echo $nomeaunciante;  // mostra o nome completo da agencia (apenas para agencias)
		}  
		?></div>
		<div class="span-4 last size-16 boxTelefones">
			<div class="span-4 last size-12 ">Telefone: <?=$telfixo?></div>  
			<div class="span-4 last size-12 ">Celular: <?=$celular?></div>  
			<? if($tipoanunciante!="Particular"){?> <div class="span-4 last size-12 ">Nextel: <?=$nextel?></div>  <? } ?> 
			<? if($tipoanunciante=="Particular"){?><div style="position: relative;top:9px;" class="span-4 last size-12 "><b>Falar com <?=utf8_encode(getnomeanunciante($userid))?></b></div> <? } ?> 
			<? if($tipoanunciante!="Particular"){?><div style="position: relative;top:9px;" class="span-4 last size-12 "><b>Falar com <?=$pessoaresponsavel?></b></div>   <? } ?> 
		</div>
	</div>
	<br> 
	<p class="span-8 last size-11" style="width:100%;position:relative;text-alig:left;">
		<img  src='<?php echo $PATHSKIN."/images/atention.png"?>'> 
		Ao ligar, informe ter visto o an&uacute;ncio no site <?=utf8_decode($INI['system']['sitename'])?>
	</p> 
	</div> 
		<!-- 
	   <? if($usuario['imagem'] !=""){?> 
		<div style="clear:both; width: 300px; float: left;margin-top:11px;text-align:center;">  
			<a href="<?=$partner['homepage']?>" target="_blank"><img style="max-width: 240px;"src='<?php echo $ROOTPATH."/media/".substr($usuario['imagem'],0,-4).".jpg";?>'></a> 
		</div>
		<? } ?>
		-->
						
	<?php if($site != ""){?>
		  <div><a  style="text-decoration:none;color:black;margin-top:8px;position:relative;text-align:left;width:100%;" href="<?php  echo $site; ?>" target="_blank"><?php echo domainit($site); ?></a></div> 
	<?php }  
	?>
	</div>
	<?
}

function preco_especial_revenda($team_id){ 
		 
	global $INI,$ROOTPATH,$PATHSKIN,$login_user;
    
	// busca informacoes do anuncio	
	$team 		= Table::Fetch('team',$team_id);
	$usuario 	= Table::Fetch('user',$team['partner_id']);
	//$partner 	= Table::Fetch('partner',$team['partner_id']);  
	$tipoanunciante 		= $usuario['tipoanunciante'] ; 
	$agencia 			    = $partner['title'] ;
	$pessoaresponsavel 		= $usuario['pessoaresponsavel'] ;
	$dddfixo 				= $usuario['ddd'] ;
	$telfixo 				= $usuario['telefonefixo'] ; 
	$dddcel 			 	= $usuario['ddd2'] ;
	$celular 				= $usuario['celular'] ; 
	$nextel 				= $usuario['nextel'] ;
	$nomeaunciante 			=  $usuario['realname'] ;
	
	if($dddfixo){
		$telfixo = "($dddfixo) $telfixo"; 
	}
	if($dddcel){
		$celular= "($dddcel) $celular"; 
	}
	// busca informações do usuario logada  
	// if( gettipoanunciante($login_user)=="" or gettipoanunciante($login_user)=="Particular"){
	 
	// }
	?>
	<div>
	<h1 class="size-18-light preto-padrao">De  <?=number_format($team['team_price'],2, ',', '.')?></h1>
	<h1 class="size-29-light preto-padrao">Por  <?=number_format($team['precorevendas'],2, ',', '.')?></h1>
	<div class="span-4 last size-12 "><? echo utf8_encode("Este pre&ccedil;o &eacute; exclusivo para revendas e ag&ecirc;ncias de ve&iacute;culos.")?>
	</div>
	<br>
	<h1 class="size-20-light vermelho-padrao">Telefones</h1>
	<div class="span-8 box-info-PF last" style="width:100%;">
		<div class="span-4 size-16"> </div>
		<div class="span-4 last size-16 boxTelefones">
			<div class="span-4 last size-12 ">Telefone: <?=$telfixo?></div>  
			<div class="span-4 last size-12 ">Celular: <?=$celular?></div>  
			<? if($tipoanunciante!="Particular"){?><div class="span-4 last size-12 ">Nextel: <?=$nextel?></div>  <? } ?> 
			<? if($tipoanunciante=="Particular"){?><div style="position: relative;top:9px;" class="span-4 last size-12 "><b>Falar com <?=getnomeanunciante($team['partner_id'])?></b></div> <? } ?> 
			<? if($tipoanunciante!="Particular"){?><div style="position: relative;top:9px;" class="span-4 last size-12 "><b>Falar com <?=$pessoaresponsavel?></b></div>   <? } ?> 
		</div>
	</div>
	<br> 
	<p class="span-8 last size-11"><img  src='<?php echo $PATHSKIN."/images/atention.png"?>'> Ao ligar, informe ter visto o an&uacute;ncio no site <?=utf8_decode( $INI['system']['sitename'])?></p> 
	<div class="span-8 last  infomotors"> </div> 
	</div> 
	   <? if($usuario['imagem'] !=""){?> 
		<div style="clear:both; width: 300px; float: left;margin-top:11px;text-align:center;">  
			<a href="<?=$usuario['site']?>" target="_blank"><img style="max-width: 240px;"src='<?php echo $ROOTPATH."/media/".substr($usuario['image'],0,-4).".jpg";?>' title='<?php echo utf8_decode($usuario['title']); ?>' alt='<?php echo utf8_decode($usuario['title']); ?>'></a> 
		</div>
		<? } ?>
						
	<?php if($partner['homepage'] != ""){?>
		<!-- <div><a  style="text-decoration:none;color:black;" href="<?php  echo $partner['homepage']; ?>" target="_blank"><?php echo domainit($partner['homepage']); ?></a></div>-->
	<?php }  
}


function gettipoanunciante($userid){
	$usuario  = Table::Fetch('user',$userid);
	return  $usuario['tipoanunciante']; 
}

function getnomeanunciante($userid){
	$usuario 	= Table::Fetch('user',$userid);
	$nome = explode(" ",$usuario['realname']); 
	return utf8_decode($nome[0]);
}

 

function getsaldomes($user_id) { 
   
	$sql 	=  "select * from partner_planos where partner_id = ".$user_id." and status in ('aprovado','gratis') order by id desc limit 1 ";
    $rs 	= mysql_query($sql);
    $row 	= mysql_fetch_assoc($rs);
   
   $qtde_plano  =  $row[qtdeanuncio];
   $plano_id  	=  $row[plano_id];
   $data  		=  $row[data];
   $status  	=  $row[status];
   $id  		=  $row[id];
    
	if($plano_id){
		if($status=="aprovado" or $status=="gratis" ){
		    $sql 	=  "select count(id) as qtde from team where partner_id = ".$user_id." and partner_plano_id  =  $id  ";
			$rs  	= mysql_query($sql);
			$row 	= mysql_fetch_assoc($rs);
		    $qtde_anuncios_publicados   =  $row[qtde];
			
			 $saldomes =  $qtde_plano - $qtde_anuncios_publicados; 
			 return  $saldomes ;
		}
		else if($status=="" ){
			return "-2";
		}
	}
	else{
		return "-99";
	}
	
	return $id;
}


function verifica_situacao_plano_atual($iduser) {
  
	$situacao = getsaldomes($iduser);
	echo $situacao; 
}

function gettotal_pago_upgrade($partner_plano_id) {
  
	Util::log("gettotal_pago_upgrade() $partner_plano_id " ); 
  
	$sql = "select sum(b.preco) total from planos_upgrade_partner_plano a, planos_upgrade b  where a.idupgrade = b.id and  idpartnerplanos = $partner_plano_id";
	$rs =  mysql_query($sql);
	if(!$rs){
		Util::log(mysql_error());
	}
	$row = mysql_fetch_object($rs);
	$total_pago_upgrades = $row->total;
	Util::log("total_pago_upgrades -  $total_pago_upgrades " ); 
	return $total_pago_upgrades ; 
}

function temvideo($partner_plano_id){
	
	Util::log("temvideo() $partner_plano_id " ); 
	$UPGRADE = "VIDEO";

	$partner_planos  = Table::Fetch('partner_planos',$partner_plano_id );
	$planos_publicacao  = Table::Fetch('planos_publicacao',$partner_planos[plano_id] );
	if($partner_planos[status] == "aprovado" or $partner_planos[status] == "gratis"){
			Util::log("partner_plano_id aprovado ($partner_plano_id) - PLANO_ID ".$partner_planos[plano_id] ); 
			if($planos_publicacao[temvideo]==$UPGRADE){
				Util::log("O plano ".$partner_planos[plano_id]. " ja tem video" ); 
				return true;
			} 
		    $sql 	=  "select  * from planos_upgrade_partner_plano where usou = '' and  idupgrade = '$UPGRADE' and idpartnerplanos = ".$partner_plano_id ;
			$rs  	= mysql_query($sql);
			if(mysql_num_rows($rs)){
				Util::log("upgrade existe" ); 
				return true;
			}
			else{
				Util::log("upgrade NAO existe  $sql " ); 
				return false;
			}
	}
}

function temdestaque($partner_plano_id){
	
	Util::log("temdestaque() $partner_plano_id " ); 
	$UPGRADE = "DESTAQUE";

	$partner_planos  = Table::Fetch('partner_planos',$partner_plano_id );
	$planos_publicacao  = Table::Fetch('planos_publicacao',$partner_planos[plano_id] );
	if($partner_planos[status] == "aprovado" or $partner_planos[status] == "gratis"){
			Util::log("partner_plano_id aprovado ($partner_plano_id) - PLANO_ID ".$partner_planos[plano_id] ); 
			if($planos_publicacao[ehdestaque]==$UPGRADE){
				Util::log("O plano ".$partner_planos[plano_id]. " ja eh destaque na busca" ); 
				return true;
			} 
		    $sql 	=  "select  * from planos_upgrade_partner_plano where usou = '' and  idupgrade = '$UPGRADE' and idpartnerplanos = ".$partner_plano_id ;
			$rs  	= mysql_query($sql);
			if(mysql_num_rows($rs)){
				Util::log("upgrade existe" ); 
				return true;
			}
			else{
				Util::log("upgrade NAO existe  $sql " ); 
				return false;
			}
	}
}
function temvitrine($partner_plano_id){
	
	Util::log("temdestaque() $partner_plano_id " ); 
	$UPGRADE = "VITRINE";

	$partner_planos  = Table::Fetch('partner_planos',$partner_plano_id );
	$planos_publicacao  = Table::Fetch('planos_publicacao',$partner_planos[plano_id] );
	if($partner_planos[status] == "aprovado" or $partner_planos[status] == "gratis"){
			Util::log("partner_plano_id aprovado ($partner_plano_id) - PLANO_ID ".$partner_planos[plano_id] ); 
			if($planos_publicacao[ehvitrine]==$UPGRADE){
				Util::log("O plano ".$partner_planos[plano_id]. " ja eh vitrine" ); 
				return true;
			} 
		    $sql 	=  "select * from planos_upgrade_partner_plano where usou = '' and  idupgrade = '$UPGRADE' and idpartnerplanos = ".$partner_plano_id ;
			$rs  	= mysql_query($sql);
			if(mysql_num_rows($rs)){
				Util::log("upgrade existe" ); 
				return true;
			}
			else{
				Util::log("upgrade NAO existe  $sql " ); 
				return false;
			}
	}
}

function atualiza_usou_video($partner_id){

	$partner_plano_id = get_partner_plano_id($partner_id);
	Util::log("atualiza_usou_video() $partner_plano_id " ); 
	$UPGRADE = "VIDEO";
	
	$partner_planos  = Table::Fetch('partner_planos',$partner_plano_id );
	$planos_publicacao  = Table::Fetch('planos_publicacao',$partner_planos[plano_id] );
	
	if($planos_publicacao[temvideo]==$UPGRADE){
		Util::log("O plano ".$partner_planos[plano_id]. " ja tem video" ); 
		return true;
	}
	$sql 	=  "update planos_upgrade_partner_plano set usou='S' where  idupgrade = '$UPGRADE' and idpartnerplanos = ".$partner_plano_id ;
	$rs  	= mysql_query($sql);
	if($rs){
		Util::log("planos_upgrade_partner_plano ATUALIZADO COM SUCESSSO" ); 
		return true;
	}
	else{
		Util::log("ERRO NA ATUALIZACAO DO planos_upgrade_partner_plano $sql ". mysql_error() ); 
		return false;
	} 			
}

function atualiza_usou_destaque_busca($partner_id){

	$partner_plano_id = get_partner_plano_id($partner_id);
	Util::log("atualiza_usou_video() $partner_plano_id " ); 
	$UPGRADE = "DESTAQUE";
	
	$partner_planos  = Table::Fetch('partner_planos',$partner_plano_id );
	$planos_publicacao  = Table::Fetch('planos_publicacao',$partner_planos[plano_id]);
	
	if($planos_publicacao[ehdestaque] == $UPGRADE){
		Util::log("O plano ".$partner_planos[plano_id]. " ja eh destaque" ); 
		return $UPGRADE;
	}
	$sql 	=  "update planos_upgrade_partner_plano set usou='S' where  idupgrade = '$UPGRADE' and idpartnerplanos = ".$partner_plano_id ;
	$rs  	= mysql_query($sql);
	if($rs){
		Util::log("planos_upgrade_partner_plano ATUALIZADO COM SUCESSSO" ); 
		return "a";
	}
	else{
		Util::log("ERRO NA ATUALIZACAO DO planos_upgrade_partner_plano $sql ". mysql_error() ); 
		return "a";
	} 			
}

function atualiza_usou_vitrine($partner_id){

	$partner_plano_id = get_partner_plano_id($partner_id);
	Util::log("atualiza_usou_vitrine() $partner_plano_id"); 
	
	$partner_planos  = Table::Fetch('partner_planos',$partner_plano_id );
	$planos_publicacao  = Table::Fetch('planos_publicacao',$partner_planos[plano_id] );
	
	if($planos_publicacao[qtd_vitrine] > 0){
		Util::log("O plano " . $partner_planos[plano_id] . " ja eh vitrine" ); 
		return $planos_publicacao[qtd_vitrine];
	}
	
	$sql 	=  "update planos_upgrade_partner_plano set usou='S' where  idupgrade = '$UPGRADE' and idpartnerplanos = ".$partner_plano_id ;
	$rs  	= mysql_query($sql);
	
	if($rs){
		Util::log("planos_upgrade_partner_plano ATUALIZADO COM SUCESSSO" ); 
		return true;
	}
	else{
		Util::log("ERRO NA ATUALIZACAO DO planos_upgrade_partner_plano $sql ". mysql_error() ); 
		return false;
	} 			
}


function envia_email_plano_aprovado($partner_plano_id) {
  
	Util::log("envia_email_plano_aprovado() $partner_plano_id " );
  
	global $INI,$ROOTPATH;
	$site = utf8_decode( $INI['system']['sitename']);
	
	$partner_planos  = Table::Fetch('partner_planos',$partner_plano_id );
	$dias = $partner_planos['dias'];
	$planos_publicacao  = Table::Fetch('planos_publicacao',$partner_planos[plano_id] );
	$nomeplano = utf8_decode($planos_publicacao['nome']);
	$atevender = utf8_decode($planos_publicacao['atevender']);
	
	if($atevender =="S"){
		$periodo = " <p>Dias de Publica&ccedil;&atilde;o: At&eacute; vender </p>";
	}
	else{
		$periodo = " <p>Dias de Publica&ccedil;&atilde;o: $dias  dia(s) </p>";
	}
	
	
	$user  = Table::Fetch('user',$partner_planos[partner_id] );
	$nomeuser = utf8_decode($user['realname']);
	$email = utf8_decode($user['email']);
	$senha = utf8_decode($user['senha']);
	$data = date("Y-m-d H:i:s"); 
			
	$body =
	"<html><head></head><body style='font-size:12px;'><meta http-equiv='Content-Type' content='text/html; charset=utf8' /><meta http-equiv='Content-Language' content='pt-br' />
	<div> Ol&aacute; $nomeuser, o seu plano foi aprovado e agora voc&ecirc; j&aacute; pode cadastrar o(s) seu(s) an&uacute;ncio(s). </div><br>
	Acesse o link $ROOTPATH/adminanunciante e entre com o email <b>$email</b> e senha <b>$senha</b>
	<br>
	<b>Dados do Plano</b>
	<p>Plano: $nomeplano</p>
	$periodo
	  
	 <BR>
	 <p>Atenciosamente</p> 
	 <p>Equipe $site</p> 
	 
	 </body></html>" ;
   
	 if(enviar( $email, "O seu plano foi aprovado" , $body )){
			Util::log("email enviado com sucesso para $email cod aquisicao: $partner_plano_id " );
			$sql = "update partner_planos set enviouemail = 'S' where id = $partner_plano_id";
			mysql_query($sql); 
	 }
	 else{
		$enviou =  false;
			Util::log("erro no envio do email para $email cod aquisicao: $partner_plano_id " );
	 }
	  
	  // ENVIO DE EMAIL PARA O ADMIN
	  
	 $body =
	"<html><head></head><body style='font-size:12px;'><meta http-equiv='Content-Type' content='text/html; charset=utf8' /><meta http-equiv='Content-Language' content='pt-br' />
	<div> Prezado administrador, a aquisi&ccedil;&atilde;o COD.: $partner_plano_id foi aprovada com sucesso.  </div><br>
	Um email foi enviado ao cliente <b>$nomeuser ($email ) </b>  com os dados de acesso para iniciar o cadastro do(s) an&uacute;ncio(s).
	<br>
	<b>Dados do Plano</b>
	<p>Plano: $nomeplano</p>
	$periodo
	  
	 <BR>
	 <p>Atenciosamente</p> 
	 <p>Equipe $site</p> 
	 
	 </body></html>" ;
 
	$emailadmin = $INI['mail']['from'];
	
	 if(enviar( $emailadmin, "Plano Aprovado" , $body )){
		 $enviou =  true;
	 }
	 else{
		$enviou =  false;
	 }
	 
} 
	
function formataplaca($placa){

	  return $placa{0}."XX - XX".$placa{6}.$placa{7};
}
function campo_precominimo($PrecoDe){

	for ($i=1000;$i<=30000;$i=$i+1000) {
		$valor = number_format($i, 2);
		$valorl = str_replace(',','#',$valor);
		$valorl = str_replace('.',',',$valorl);
		$valorl = str_replace('#','.',$valorl);
		$sem = str_replace(',','',$valor);
		if (isset($PrecoDe) && $PrecoDe == $sem)
			echo "<option value='{$sem}' selected='selected'>{$valorl}</option>";
		else
			echo "<option value='{$sem}'>{$valorl}</option>";
	}
	for ($i=40000;$i<=100000;$i=$i+10000) {
		$valor = number_format($i, 2);
		$valorl = str_replace(',','#',$valor);
		$valorl = str_replace('.',',',$valorl);
		$valorl = str_replace('#','.',$valorl);
		$sem = str_replace(',','',$valor);
		if (isset($PrecoDe) && $PrecoDe == $sem)
			echo "<option value='{$sem}' selected='selected'>{$valorl}</option>";
		else
			echo "<option value='{$sem}'>{$valorl}</option>";
	}
	for ($i=150000;$i<=1000000;$i=$i+100000) {
		$valor = number_format($i, 2);
		$valorl = str_replace(',','#',$valor);
		$valorl = str_replace('.',',',$valorl);
		$valorl = str_replace('#','.',$valorl);
		$sem = str_replace(',','',$valor);
		if (isset($PrecoDe) && $PrecoDe == $sem)
			echo "<option value='{$sem}' selected='selected'>{$valorl}</option>";
		else
			echo "<option value='{$sem}'>{$valorl}</option>";
	}
	for ($i=1000000;$i<=10000000;$i=$i+1000000) {
		$valor = number_format($i, 2);
		$valorl = str_replace(',','#',$valor);
		$valorl = str_replace('.',',',$valorl);
		$valorl = str_replace('#','.',$valorl);
		$sem = str_replace(',','',$valor);
		if (isset($PrecoDe) && $PrecoDe == $sem)
			echo "<option value='{$sem}' selected='selected'>{$valorl}</option>";
		else
			echo "<option value='{$sem}'>{$valorl}</option>";
	}
}
function campo_precomaximo($PrecoAte){

	for ($i=1000;$i<=30000;$i=$i+1000) {
		$valor = number_format($i, 2);
		$valorl = str_replace(',','#',$valor);
		$valorl = str_replace('.',',',$valorl);
		$valorl = str_replace('#','.',$valorl);
		$sem = str_replace(',','',$valor);
		if (isset($PrecoAte) && $PrecoAte == $sem)
			echo "<option value='{$sem}' selected='selected'>{$valorl}</option>";
		else
			echo "<option value='{$sem}'>{$valorl}</option>";
	}
	for ($i=40000;$i<=100000;$i=$i+10000) {
		$valor = number_format($i, 2);
		$valorl = str_replace(',','#',$valor);
		$valorl = str_replace('.',',',$valorl);
		$valorl = str_replace('#','.',$valorl);
		$sem = str_replace(',','',$valor);
		if (isset($PrecoAte) && $PrecoAte == $sem)
			echo "<option value='{$sem}' selected='selected'>{$valorl}</option>";
		else
			echo "<option value='{$sem}'>{$valorl}</option>";
	}
	for ($i=150000;$i<=1000000;$i=$i+100000) {
		$valor = number_format($i, 2);
		$valorl = str_replace(',','#',$valor);
		$valorl = str_replace('.',',',$valorl);
		$valorl = str_replace('#','.',$valorl);
		$sem = str_replace(',','',$valor);
		if (isset($PrecoAte) && $PrecoAte == $sem)
			echo "<option value='{$sem}' selected='selected'>{$valorl}</option>";
		else
			echo "<option value='{$sem}'>{$valorl}</option>";
	}
	for ($i=1000000;$i<=10000000;$i=$i+1000000) {
		$valor = number_format($i, 2);
		$valorl = str_replace(',','#',$valor);
		$valorl = str_replace('.',',',$valorl);
		$valorl = str_replace('#','.',$valorl);
		$sem = str_replace(',','',$valor);
		if (isset($PrecoAte) && $PrecoAte == $sem)
			echo "<option value='{$sem}' selected='selected'>{$valorl}</option>";
		else
			echo "<option value='{$sem}'>{$valorl}</option>";
	}
}

function watermark($image, $marcaImagem){

	/*
	
	Como chamar a função.
	
	if($_FILES['gal_upload_image4']['tmp_name']) {	
		$team['gal_image4'] = upload_image('gal_upload_image4',$eteam['gal_image4'],'team');
		$dirImagem = "../../media/" . $team['gal_image4'];
		$marcaImagem = $ROOTPATH . "/include/marca/marca_dagua.png";
		watermark($dirImagem, $marcaImagem);
	}
	
	*/
	
	//$overlay = '../../../photos/photosets/stamp.png';
	$overlay = $marcaImagem;
	$opacity = "20";
	if (!file_exists($image)) {
		die("Image does not exist.");
	}
	// Set offset from bottom-right corner
	$w_offset = 0;
	$h_offset = 100;
	$extension = strtolower(substr($image, strrpos($image, ".") + 1));

	// Load image from file
	switch ($extension)
	{
		case 'jpg':
		$background = imagecreatefromjpeg($image);
		break;
		case 'jpeg':
		$background = imagecreatefromjpeg($image);
		break;
		case 'png':
		$background = imagecreatefrompng($image);
		break;
		case 'gif':
		$background = imagecreatefromgif($image);
		break;
		default:
		die("Image is of unsupported type.");
	}
	// Find base image size
	$swidth = imagesx($background);
	$sheight = imagesy($background);
	// Turn on alpha blending
	imagealphablending($background, true);
	// Create overlay image
	//$overlay = imagecreatefrompng($overlay);
	// Get the size of overlay
	$owidth = imagesx($overlay);
	$oheight = imagesy($overlay);

	$photo = imagecreatefromjpeg($image);
	$watermark = imagecreatefrompng($overlay);
			 // This is the key. Without ImageAlphaBlending on, the PNG won't render correctly.
	imagealphablending($photo, true);
			// Copy the watermark onto the master, $offset px from the bottom right corner.
	$offset = 10;
	imagecopy($photo, $watermark, imagesx($photo) - imagesx($watermark) - $offset, imagesy($photo) - imagesy($watermark) - $offset, 0, 0, imagesx($watermark), imagesy($watermark));
			// Output to the browser
	//header("Content-Type: image/jpeg");
	imagejpeg($photo,$image);
	// Overlay watermark
	// Destroy the images
	imagedestroy($background);
	imagedestroy($overlay);
}

function temvitrine_anunciante($partner_plano_id){

	$partner_planos  = Table::Fetch('partner_planos', $partner_plano_id);
	$planos_publicacao  = Table::Fetch('planos_publicacao', $partner_planos[plano_id]);
	
	return $planos_publicacao['qtd_vitrine'];
	
}

function detectResolution() {
	
	$useragent=$_SERVER['HTTP_USER_AGENT'];

	if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))) {
		return true;
	}
	else {
		return false;
	}
}

function getCity($id){
	$cidade = Table::Fetch("cidades", $id);
	return $cidade['nome'];
}