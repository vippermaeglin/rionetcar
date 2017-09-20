<?

$others_side_ns = abs(intval($INI['system']['sideteam']));
$others_team_id = abs(intval($team['id']));
$others_city_id = abs(intval($city['id']));
$others_now = time();

if($_REQUEST["idcategoria"]){

	$oc = array(
			'city_id' => array($others_city_id, 0),
			'team_type in ("normal","cupom","off","pacote")',
			"group_id = ".$_REQUEST["idcategoria"],
		 
			);
	$others = DB::LimitQuery('team', array(
				'condition' => $oc,
				'order' => 'ORDER BY `begin_time` DESC, `id` DESC',
				));
}
else{
	$oc = array(
			'city_id' => array($others_city_id, 0),
			'team_type in ("normal","cupom","off","pacote")',
		 	"begin_time < '$others_now'",
		//	"end_time > '$others_now'",
			);
	$others = DB::LimitQuery('team', array(
				'condition' => $oc,

				'order' => 'ORDER BY `end_time` DESC , `now_number`' ,
				));
}

?>
