<?php
	require_once( dirname(dirname(__FILE__)) . '/app.php');
	
	$idcidade 	= $_REQUEST['idcidade'];
	$url 		= $_REQUEST['url'];
   //echo "==".$ROOTPATH."/include/imagemhome/banner_".$idcidade.".jpg";
?>
<? if($url!= "" and $url != "http://"){?>
	<a href="<?=$url?>"><img src="<?=$ROOTPATH?>/include/imagemhome/banner_<?=$idcidade?>.jpg"></a>
<? }
else{?>
	<img src="<?=$ROOTPATH?>/include/imagemhome/banner_<?=$idcidade?>.jpg">
<? } ?>