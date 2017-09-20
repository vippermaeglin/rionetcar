<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

need_manager();
need_auth('market');

$condition = array();

/* filter */ 
 
$title = strval($_GET['title']);
if ($title ) {
	$condition[] = "title like '%".mysql_escape_string($title)."%'";
} 
$username = strval($_GET['username']);
if ($username ) {
	$condition[] = "username like '%".mysql_escape_string($username)."%'";
} 
$contact = strval($_GET['contact']);
if ($contact ) {
	$condition[] = "contact like '%".mysql_escape_string($contact)."%'";
} 
$cidade = strval($_GET['cidade']);
if ($cidade ) {
	$condition[] = "cidade like '%".mysql_escape_string($cidade)."%'";
} 
$homepage = strval($_GET['homepage']);
if ($homepage ) {
	$condition[] = "homepage like '%".mysql_escape_string($homepage)."%'";
} 
$mobile = strval($_GET['mobile']);
if ($mobile ) {
	$condition[] = "mobile like '%".mysql_escape_string($mobile)."%'";
} 
$bank_name = strval($_GET['bank_name']);
if ($bank_name ) {
	$condition[] = "bank_name like '%".mysql_escape_string($bank_name)."%'";
}  
/* filter end */ 
$count = Table::Count('partner', $condition);
list($pagesize, $offset, $pagestring) = pagestring($count, 20);

$partners = DB::LimitQuery('partner', array(
	'condition' => $condition,
	'order' => 'ORDER BY head DESC, id DESC',
	'size' => $pagesize,
	'offset' => $offset,
));
$groups = option_category('partner');
$cities = option_category('city');

include template('manage_partner_index');
