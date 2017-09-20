<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

need_manager();
need_auth('order');
 
if(isset($_GET['datapedido'])){
	$datapedido = explode('/', $_GET['datapedido']);
	$datapedido = implode('-', array_reverse($datapedido));
	$condition[] = "datapedido like '".$datapedido."%'";
}

 
  

$count = Table::Count('planos_publicacao', $condition);
list($pagesize, $offset, $pagestring) = pagestring($count, 20);

$orders = DB::LimitQuery('planos_publicacao', array(
	'condition' => $condition,
	'order' => 'ORDER BY id',
	'size' => $pagesize,
	'offset' => $offset,
));

  
include template('manage_order_index');

