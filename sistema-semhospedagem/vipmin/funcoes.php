<?php

require_once(dirname(dirname(__FILE__)) . '/app.php');
 
if($_REQUEST['acao']=="destaque"){ 
	$sql 			=  "select * from team where posicionamento = 6 and begin_time < '".time()."' and end_time > '".time()."' and now_number < max_number";
	$rs 			= mysql_query($sql);
	$row 			= mysql_fetch_object($rs);
	$titulo 		= $row->title;
	$id 			= $row->id;

	if($titulo != ""){
		echo "Já existe uma oferta como destaque. ( ".$id ."-".$titulo ." ). Por favor, retire o destaque desta oferta antes de colocar uma outra como destaque. Até que você faça isso, iremos deixar esta oferta no bloco lateral.";
	}
}
if($_REQUEST['acao']=="destaquenacional"){ 
	$sql 			=  "select * from team where posicionamento = 10 and begin_time < '".time()."' and end_time > '".time()."' and now_number < max_number";
	$rs 			= mysql_query($sql);
	$row 			= mysql_fetch_object($rs);
	$titulo 		= $row->title;
	$id 			= $row->id;

	if($titulo != ""){
		echo "Já existe uma oferta como destaque nacional. ( ".$id ."-".$titulo ." ). Por favor, retire o destaque nacional desta oferta antes de colocar uma outra como destaque nacional. Até que você faça isso, iremos deixar esta oferta no bloco lateral.";
	}
}
?>