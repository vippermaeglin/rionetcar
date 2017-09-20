<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

need_manager();
need_auth('team');

$now = time();
if($_REQUEST['acao']=='site'){
	$condition = array(
		'system' => 'Y',
		'team_type not in ("simples","pacote")',
		"end_time > {$now}",
	);
}
else{
	$condition = array(
		'system' => 'Y',
		'team_type not in ("simples","pacote")',
	);
}

/* filter start */
$team_type = strval($_GET['team_type']);
$team_title = strval($_GET['team_title']);
$city_id = strval($_GET['city_id']);
$partner_id = strval($_GET['partner_id']);
$idoferta = strval($_GET['idoferta']);

if ($team_type) { $condition['team_type'] = $team_type; }
if ($city_id) { $condition['city_id'] = $city_id; }
if ($partner_id) { $condition['partner_id'] = $partner_id; }
if ($team_title) { 
	$condition[] = "title LIKE '%".mysql_escape_string($team_title)."%'";
 }
 if ($idoferta) { $condition['id'] = $idoferta; }
 
 //Verifica se o anúncio foi 'excluido' pelo anunciante.
$condition[] = "excluido <> '1'";
 
 
$codaquisicao =  $_GET['codaquisicao']  ; 
if ($codaquisicao) $condition['partner_plano_id'] = $codaquisicao;

/* filter end */ 
$count = Table::Count('team', $condition);
list($pagesize, $offset, $pagestring) = pagestring($count, 20);

$teams = DB::LimitQuery('team', array(
	'condition' => $condition,
	'order' => 'ORDER BY id DESC',
	'size' => $pagesize,
	'offset' => $offset,
));
$cities = Table::Fetch('cidades', Utility::GetColumn($teams, 'city_id'));
$groups = Table::Fetch('category', Utility::GetColumn($teams, 'group_id'));
$user = Table::Fetch('user', Utility::GetColumn($teams, 'partner_id'));


$condition_p[] = " id <> 1";
$users = DB::LimitQuery('user', array( 
			'condition' => array( $condition_p ),
			'order' => 'ORDER BY id DESC',
			));
$users = Utility::OptionArray($users, 'id', 'realname');
 

$selector = 'index';
include template('manage_team_index');


