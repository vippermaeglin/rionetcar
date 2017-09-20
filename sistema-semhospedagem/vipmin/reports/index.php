<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

need_manager();
need_auth('order');

$count = Table::Count('click', $condition);
list($pagesize, $offset, $pagestring) = pagestring($count, 20);

if(isset($_REQUEST['data_begin'])) {
	
	$dataBegin = implode("-", array_reverse(explode("/", strip_tags(urldecode($_REQUEST['data_begin'])))));
}
else {
	
	$dataBegin = date("Y-m-d");
}

if(isset($_REQUEST['data_end'])) {

	$dataEnd = implode("-", array_reverse(explode("/", strip_tags(urldecode($_REQUEST['data_end'])))));
}
else {
	
	$dataEnd = date("Y-m-d");
}


if(!(empty($dataEnd)) && !(empty($dataBegin))) {
	
	$condition[] = "date BETWEEN '" . $dataBegin . "' AND '" . $dataEnd . "'";
}

$orders = DB::LimitQuery('click', array(
	'condition' => $condition,
	'order' => 'ORDER BY view DESC',
	'group' => 'group by id_team',
	'size' => $pagesize,
	'offset' => $offset,
));

  
include template('manage_reports_index');