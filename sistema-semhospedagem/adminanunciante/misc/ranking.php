 <?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

need_anunciante();
need_auth('order');

$iuser = strval($_GET['iuser']);
$puser = strval($_GET['puser']);
$mes_selecionado = strval($_GET['mes']);
$ano = strval($_GET['ano']); 
 
$arr_meses = array(
  '01' => 'Janeiro',
  '02' => 'Fevereiro',
  '03' => 'Março',
  '04' => 'Abril',
  '05' => 'Maio',
  '06' => 'Junho',
  '07' => 'Julho',
  '08' => 'Agosto',
  '09' => 'Setembro',
  '10' => 'Outubro',
  '11' => 'Novembro',
  '12' => 'Dezembro'
);
 

//$condition = array( 'credit >= 0', 'pay' => 'N', 'buy_time >= 0'); // pay = N indica que a comissao ainda nao foi paga para quem convidou, ou seja, o admin ainda nao aprovou.
 
/* filter */
/*
if ($iuser) { 
	 $condition = " and ( b.username like '%".$iuser."%' or b.realname like '%".$iuser."%' ) ";
}*/
/*
if ($puser) {
	$field = strpos($puser, '@') ? 'email' : 'username';
	$field = is_numeric($puser) ? 'id' : $field;
	$puser_u = Table::Fetch('user', $puser, $field);
	if($puser_u) $condition['other_user_id'] = $puser_u['id'];
	else $puser= null;
}
if ($iday) { 
	//$condition[] = "left(from_unixtime(create_time),10) = '".mysql_escape_string($iday)."'"; 
}
 */
 
/* filter end */
//print_r($condition);
/*
$count = Table::Count('invite', $condition);
$summary = Table::Count('invite', $condition, 'credit');

list($pagesize, $offset, $pagestring) = pagestring($count, 20);
*/

$sql = "select count(a.user_id) as quantidadeindicacoes, b.username,b.realname,a.*  from invite a, user b where a.user_id = b.id group by a.user_id order by quantidadeindicacoes desc";
$res = mysql_query($sql);
$ranking = 0 ; 
while($row = mysql_fetch_object($res)){ 

	$ranking++ ;
	 
	$id = $row->user_id;
	$quantidadeindicacoes = $row->quantidadeindicacoes;
	
	$username = $row->username;
    $realname = $row->realname;
	$username =  explode("@",$username);
	$username = $username[0];
					
    $vetoruser[$username]["id"] = $id ;
    $vetoruser[$username]["ranking"] = $ranking;
    $vetoruser[$username]["data"] = $row->create_time;
    $vetoruser[$username]["bairro"] = $row->bairro; 
    $vetoruser[$username]["ip"] = $row->user_ip; 
    $vetoruser[$username]["realname"] = $realname; 
    $vetoruser[$username]["quantidadeindicacoes"] = $quantidadeindicacoes; 
    
}
  

//echo $sql = "select count(a.user_id) as quantidadeindicacoes, b.username,a.*  from invite a, user b where a.user_id = b.id $condition group by a.user_id order by quantidadeindicacoes desc  " ;
//$res = mysql_query($sql);
 
 	 
/*
$invites = DB::LimitQuery('invite', array(
	'condition' => $condition,
	'order' => 'ORDER BY id DESC',
	'size' => $pagesize,
	'offset' => $offset,
));
*/
//$team_ids = Utility::GetColumn($invites, 'team_id');
//$teams = Table::Fetch('team', $team_ids);

//$user_ids = Utility::GetColumn($invites, 'user_id');
//$user_ido = Utility::GetColumn($invites, 'other_user_id');
//$admin_ids = Utility::GetColumn($invites, 'admin_id');
//$user_ids = array_merge($user_ids, $user_ido, $admin_ids);
//$users = Table::Fetch('user', $user_ids);

include template('manage_misc_ranking');



