<?php

require_once(dirname(dirname(__FILE__)) . '/app.php');

$idcidade 			= $_REQUEST['idcidade'];
$ativo 				= $_REQUEST['ativo'];
$urlbanner 	 		= $_REQUEST['urlbanner'];
$ativarlink 	 	= $_REQUEST['ativarlink'];
$oferta_quero 	 	= $_REQUEST['oferta_quero'];
$linkoutrasofertas 	= $_REQUEST['linkoutrasofertas'];
$bannerpop 	 		= $_REQUEST['bannerpop'];
$texto_secundario 	 = $_REQUEST['txtsecundario'];
$texto_principal 	 = $_REQUEST['txtprincipal'];
$txtsecundario_ativo = $_REQUEST['txtsecundario_ativo'];
$txtprincipal_ativo = $_REQUEST['txtprincipal_ativo'];
$faixa 	 			= $_REQUEST['faixa'];
$balao 	 			= $_REQUEST['balao']; 
$acao 	 			= $_REQUEST['acao']; 
$rand 	 			= $_REQUEST['rand']; 
 
/*
$sql =  "select gal_image".$gal." as fotogaleria from team where id= ".$idoferta;
$rs 	= mysql_query($sql);
$row 	= mysql_fetch_object($rs);
$foto 	= $row->fotogaleria;
 
*/
if($acao=="config"){

	$sql =  "delete from home_config";
	$rs = mysql_query($sql);

	$sql =  "insert into home_config (randomico) values ('$rand') ";
	$rs = mysql_query($sql);
	  
	if(!$rs){
		echo "Não foi possível fazer a atualização da home.". mysql_error(); 
	}

}
else{

	$sql =  "delete from home where idcidade = ".$idcidade;
	$rs = mysql_query($sql);

	if(!$rs){
		echo "Não foi possível fazer a atualização da home para esta cidade. ". mysql_error(); 
	}
	else{
		 
		$sql =  "insert into home (idcidade,ativo,linksimagem,linkoutrasofertas,oferta_quero,popup,urlbanner,texto_secundario,texto_principal,txtsecundario_ativo,txtprincipal_ativo,faixa,balao) values ('$idcidade','$ativo','$ativarlink','$linkoutrasofertas','$oferta_quero','$bannerpop','$urlbanner','$texto_secundario','$texto_principal','$txtsecundario_ativo','$txtprincipal_ativo','$faixa','$balao') ";
		$rs = mysql_query($sql);
		  
		if(!$rs){
			echo "Não foi possível fazer a atualização da home para esta cidade. ". mysql_error(); 
		}
	}

}
 
?>