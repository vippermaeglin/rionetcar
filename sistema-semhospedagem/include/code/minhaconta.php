<?php
need_login();

$condition = array( 'user_id' => $login_user_id, 'team_id > 0', );
$selector = strval($_GET['status']);

  if ( $selector == 'unpay' ) {
	$condition['state'] = 'unpay';
}
else if ( $selector == 'pay' ) {
	$condition['state'] = 'pay';
}

$count = Table::Count('order', $condition);
 

list($pagesize, $offset, $pagestring) = pagestring($count, 100);
$orders = DB::LimitQuery('order', array(
	'condition' => $condition,
	'order' => 'ORDER BY id DESC',

));

 

$team_ids = Utility::GetColumn($orders, 'team_id');
$teams = Table::Fetch('team', $team_ids);
foreach($teams AS $tid=>$one){
	team_state($one);
	$teams[$tid] = $one;
}



?>