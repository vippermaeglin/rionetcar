<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

need_manager();
need_auth('team');

$now = time();
$condition = array(
	'team_type in ("simples","pacote")',
	'system' => 'Y', 
);

/* filter start */ 
$team_title = strval($_GET['team_title']);
$city_id = strval($_GET['city_id']);
$partner_id = strval($_GET['partner_id']);

if ($team_type) { $condition['team_type'] = $team_type; }
if ($city_id) { $condition['city_id'] = $city_id; }
if ($partner_id) { $condition['partner_id'] = $partner_id; }
if ($team_title) { 
	$condition[] = "title LIKE '%".mysql_escape_string($team_title)."%'";
 }
 
/* filter end */ 
$count = Table::Count('team', $condition);
list($pagesize, $offset, $pagestring) = pagestring($count, 20);

$teams = DB::LimitQuery('team', array(
	'condition' => $condition,
	'order' => 'ORDER BY id DESC',
	'size' => $pagesize,
	'offset' => $offset,
));
$cities = Table::Fetch('category', Utility::GetColumn($teams, 'city_id'));
$groups = Table::Fetch('category', Utility::GetColumn($teams, 'group_id'));
$partner = Table::Fetch('partner', Utility::GetColumn($teams, 'partner_id'));

$condition_p[] = " tipo = 'parceiro' or tipo is null";
$partners = DB::LimitQuery('partner', array(
			'condition' => array( $condition_p ),
			'order' => 'ORDER BY id DESC',
			));
$partners = Utility::OptionArray($partners, 'id', 'title');
 

$selector = 'index';
include template('manage_team_configuraveis');


