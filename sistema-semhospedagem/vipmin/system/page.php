<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

need_auth('market');

/* filter start */ 
$titulo = strval($_GET['titulo']); 
if ($titulo) { 
	$condition[] = "titulo LIKE '%".mysql_escape_string($titulo)."%'";
 }
 
if($_GET['status']==="0" or $_GET['status']==="1"){
	$status = strval($_GET['status']);  
	$condition[] = "status = ". $status ;
 }
 
/* filter end */ 
$count = Table::Count('page', $condition);
list($pagesize, $offset, $pagestring) = pagestring($count, 20);

$pages = DB::LimitQuery('page', array(
	'condition' => $condition,
	'order' => 'ORDER BY id DESC',
	'size' => $pagesize,
	'offset' => $offset,
)); 
  
$selector = 'index';
include template('manage_system_page');


