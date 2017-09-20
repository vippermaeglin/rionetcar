<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

need_manager();
$condition = array();

($zone = strval($_GET['zone'])) || ($zone = 'city');
if ( $zone ) { $condition['zone'] = $zone; } 

$stringzone = "&zone=".$zone;
/*
if($zone =="group" ){
	$condition = array( 
		'tipo is null', 
	);
}*/

$cates = get_zones();

$count = Table::Count('category', $condition);
list($pagesize, $offset, $pagestring) = pagestring($count, 20);
 
$categories = DB::LimitQuery('category', array(
	'condition' => $condition,
	'order' => 'ORDER BY display ASC, idpai, sort_order DESC, id DESC',
	'size' => $pagesize,
	'offset' => $offset,
));

include template('manage_category_index');
