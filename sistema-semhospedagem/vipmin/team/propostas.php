<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');
 
need_manager(); 
 
$now = time();
  
$condition[] = "user_id = ".$_SESSION['user_id'];
 
/* filter end */ 
$count = Table::Count('propostas', $condition);
list($pagesize, $offset, $pagestring) = pagestring($count, 20);

$propostas = DB::LimitQuery('propostas', array(
	//'condition' => $condition,
	'order' => 'ORDER BY id DESC',
	'size' => $pagesize,
	'offset' => $offset,
));
 
$selector = 'index';
include template('manage_team_propostas');


