<?php

require_once(dirname(dirname(__FILE__)) . '/app.php');
 
$file 		= $_REQUEST['file'];
$acao 		= $_REQUEST['acao'];

if($acao == "topo"){
	$sql =  "update home_config set topo = '$file'";
	$rs = mysql_query($sql);
}
else{
	$sql =  "update home_config set background = '$file'";
	$rs = mysql_query($sql);
}
if(!$rs ){
	  echo "Não foi possível alterar o background: ".mysql_error();	
}
sleep(1);

?>