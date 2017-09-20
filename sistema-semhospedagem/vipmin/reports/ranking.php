<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

need_manager();
need_auth('order');
 
/*
if(isset($_GET['datapedido'])){
	$datapedido = explode('/', $_GET['datapedido']);
	$datapedido = implode('-', array_reverse($datapedido));
	$condition[] = "datapedido like '".$datapedido."%'";
} 
*/ 

$count = Table::Count('team', $condition);
list($pagesize, $offset, $pagestring) = pagestring($count, 20);

$orders = DB::LimitQuery('team', array(
	'condition' => $condition,
	'order' => 'ORDER BY clicados DESC',
	'size' => $pagesize,
	'offset' => $offset,
));

  
include template('manage_reports_ranking');