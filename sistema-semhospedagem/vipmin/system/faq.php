<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

need_auth('market');
 
/* filter end */ 
$count = Table::Count('faq', $condition);
list($pagesize, $offset, $pagestring) = pagestring($count, 20);

$fag = DB::LimitQuery('faq', array(
	'condition' => $condition,
	'order' => 'ORDER BY id DESC',
	'size' => $pagesize,
	'offset' => $offset,
)); 
  
$selector = 'index';
include template('manage_system_faq');


