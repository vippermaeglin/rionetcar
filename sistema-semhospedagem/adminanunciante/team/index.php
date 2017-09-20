<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');
 
need_anunciante(); 
 
$now = time();
if($_REQUEST['acao']=='site'){
	$condition = array( 
		"end_time > {$now}",
		'partner_id' => $_SESSION['user_id'], 
		"status is null or status = 1",
	);
}
else{
	$condition = array(
		 'partner_id' => $_SESSION['user_id'], 
	);
}

/* filter start */
$team_type = strval($_GET['team_type']);
$team_title = strval(RemoveXSS($_GET['team_title']));
$city_id = strval($_GET['city_id']); 

if ($team_type) { $condition['team_type'] = $team_type; }
if ($city_id) { $condition['city_id'] = $city_id; } 
if ($team_title) { 
	$condition[] = "title LIKE '%".mysql_escape_string($team_title)."%'";
 }
 
 //Verifica se o anúncio foi 'excluido' pelo anunciante.
$condition[] = "excluido <> '1'";
 
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
//$partner = Table::Fetch('partner', Utility::GetColumn($teams, 'partner_id'));

//$condition_p[] = " tipo = 'parceiro' or tipo is null";
//$partners = DB::LimitQuery('partner', array(
	//		'condition' => array( $condition_p ),
		//	'order' => 'ORDER BY id DESC',
			//));
//$partners = Utility::OptionArray($partners, 'id', 'title');
 

$selector = 'index';
include template('manage_team_anunciante_index');


