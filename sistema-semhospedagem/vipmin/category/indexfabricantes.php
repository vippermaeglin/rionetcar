<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

need_manager();
$condition = array();

$nome = strval($_GET['nome']);

if ($nome) { 
	$condition[] = "nome LIKE '%".mysql_escape_string($nome)."%'";
 }

$count = Table::Count('fabricante', $condition);
list($pagesize, $offset, $pagestring) = pagestring($count, 20);
 
$categories = DB::LimitQuery('fabricante', array(
	'condition' => $condition,
	'order' => 'ORDER BY tipo, nome ASC',
	'size' => $pagesize,
	'offset' => $offset,
));

include template('manage_category_indexfabricantes');
