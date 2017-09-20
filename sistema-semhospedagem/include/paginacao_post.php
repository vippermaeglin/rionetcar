<?php
 
include "../app.php";  

header("Content-Type: text/html; charset=ISO-8859-1"); 
$per_page = 48;

$cidade = $_REQUEST['cidade'];
$estado = $_REQUEST['estado'];

$page 		= $_REQUEST['page'];
$start 		= ($page-1)*$per_page;
 
$temoferta = $BlocosOfertas->ofertas_recentes($start,$per_page, $cidade, $estado); // esse metodo traz as ofertas recentes de parceiros e anunciantes, porem para ofertas de anunciantes a oferta deve ser valida ( data final < que data corrente)
 

if(!$temoferta and !$temoferta_website){
	include(DIR_BLOCO."/categoria_sem_oferta.php"); 
}
 

?>