<?php

require_once(dirname(dirname(__FILE__)) . '/app.php');

$flag_0 =0;
$flag_1 = 0;
 
$arq = trim($_REQUEST['arq']);
 
if(file_exists(WWW_MOD."/enterprise.inc")){
	$file = WWW_ROOT."/media/slideshowbannersheader/thumbs/".$arq;
	$file_or = WWW_ROOT."/media/slideshowbannersheader/".$arq;	
}
else{
	$file = WWW_ROOT."/media/slideshowbanners/thumbs/".$arq;
	$file_or = WWW_ROOT."/media/slideshowbanners/".$arq;

}
 
if(file_exists($file_or)){
	if(!unlink($file_or)){
		echo "Não foi possível apagar fisicamente a foto maior";	
	} else {
		$flag_0 = 1;
	}
}
else{
	echo "Arquivo $file inexistente";
}	

if(file_exists($file)){
	if(!unlink($file)){
		echo "Não foi possível apagar fisicamente a foto thumb";	
	} else {
		$flag_1 = 1;
	}
}
else{
	echo "Arquivo $file inexistente";
}

if($flag_0 == 1 || $flag_1 == 1) {
	/* Caso alguma das imagens sejam apagadas, é executado uma query para apagar o link
	   referente a imagem.		
	*/
	$sql = "delete from linkbanners where file = '" . $arq . "'";
	$rs = mysql_query($sql);
}	
 
?>