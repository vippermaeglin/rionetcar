<?php

require_once(dirname(dirname(__FILE__)). '/app.php');

$sql = "ALTER TABLE  `team` ADD  `url_comprar` VARCHAR( 250 ) NULL  ";
$rs = @mysql_query($sql);

$sql = "ALTER TABLE  `team` ADD  `processo_compra` VARCHAR( 20 ) NULL  ";
$rs = @mysql_query($sql);

$sql = "ALTER TABLE  `team` ADD  `marcadagua` VARCHAR( 10 ) NULL  ";
$rs = @mysql_query($sql); 

$sql = "ALTER TABLE  `team` ADD  `retornoparticipe` TEXT NULL  ";
$rs = @mysql_query($sql);

 
?>