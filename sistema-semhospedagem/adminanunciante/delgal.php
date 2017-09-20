<?php

require_once(dirname(dirname(__FILE__)) . '/app.php');


$acao 		= $_REQUEST['acao'];
$arq 		= trim($_REQUEST['arq']);
$idoferta 	= $_REQUEST['id'];
$campotabela = $_REQUEST['gal'];

if($acao=="galeria"){

$file = WWW_ROOT."/media/superbackground/thumbs/".$arq;
$file_or = WWW_ROOT."/media/superbackground/".$arq;
 
	if(file_exists($file_or)){
		if(!unlink($file_or)){
			echo "Não foi possível apagar fisicamente a foto maior";	
		}
	}
	else{
		echo "Arquivo $file inexistente";
	}	
	
	if(file_exists($file)){
		if(!unlink($file)){
			echo "Não foi possível apagar fisicamente a foto thumb";	
		}
	}
	else{
		echo "Arquivo $file inexistente";
	}
	
	if(!$rs){
		echo mysql_error(); 
	}
	exit;
}


$sql =  "select ".$campotabela." as fotogaleria from team where id= ".$idoferta;
$rs 	= mysql_query($sql);
$row 	= mysql_fetch_object($rs);
$foto 	= $row->fotogaleria;
  
$sql =  "update team set  ".$campotabela." = '' where  id= ".$idoferta;
$rs = mysql_query($sql);
 
$file = WWW_ROOT."/media/".$foto;
 
$imgbase = WWW_ROOT."/media/".substr($foto,0,-4)."_".$campotabela.".jpg";
//$imgbase = WWW_ROOT."/media/".substr($team['estatica_home'],0,-4)."_estatica_home.jpg";

if(file_exists( $imgbase)){
	if(!unlink($imgbase)){
		//echo "Não foi possível apagar fisicamente a foto derivada, mais ela foi apagada de sua oferta e não aparecerá o site";	
	}
}
else{
	//echo "Foto derivada não encontrada para exclusão. ".$imgbase ;
}

if(file_exists($file)){
	
	if(!unlink($file)){
		//echo "Não foi possível apagar fisicamente a foto, mais ela foi apagada de sua oferta e não aparecerá o site";	
	}
}
else{
	//echo "Foto não encontrada para exclusão. ".$file ;
}

if(!$rs){
	echo mysql_error(); 
}
 
?>