<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

need_manager();
need_auth('team'); 
$now = time();
 

/* filter start */
$team_type = strval($_GET['team_type']);
$team_title = strval($_GET['team_title']);
$city_id = strval($_GET['city_id']);
$partner_id = strval($_GET['partner_id']);

$uname = strval($_REQUEST['uemail']);

if ($uname) {
	$ucon = array( "email like '%".mysql_escape_string($uname)."%' OR username like '%".$uname."%'");
	$uhave = DB::LimitQuery('user', array( 'condition' => $ucon,));
	$condition['partner_id'] = Utility::GetColumn($uhave, 'id');
}

$codaquisicao =  $_GET['codaquisicao']  ; if ($codaquisicao) $condition['id'] = $codaquisicao;
$status =  $_GET['status']  ; if ($status) $condition['status'] = $status;
 
 
/* filter end */ 

$count = Table::Count('partner_planos', $condition);
list($pagesize, $offset, $pagestring) = pagestring($count, 20);

$registros = DB::LimitQuery('partner_planos', array(
	'condition' => $condition,
	'order' => 'ORDER BY id DESC',
	'size' => $pagesize,
	'offset' => $offset,
)); 
 
include template('manage_order_historico');


