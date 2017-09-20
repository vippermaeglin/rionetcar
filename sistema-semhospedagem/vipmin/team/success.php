<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

need_manager();
need_auth('team');

$now = time();
$condition = array(
	'system' => 'Y',
	"end_time < $now",
	"now_number >= min_number"
);

/* filter start */
$team_type = strval($_GET['team_type']);
if ($team_type) { $condition['team_type'] = $team_type; }
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
$partner = Table::Fetch('partner', Utility::GetColumn($teams, 'partner_id'));

$selector = 'success';
$condition_p[] = " tipo = 'parceiro' or tipo is null";
$partners = DB::LimitQuery('partner', array(
			'condition' => array( $condition_p ),
			'order' => 'ORDER BY id DESC',
			));
$partners = Utility::OptionArray($partners, 'id', 'title');

include template('manage_team_index');
