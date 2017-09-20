<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

need_manager();
need_auth('admin');

$email = strval($_GET['email']);

$uname = strval($_GET['uname']);
$mobile = strval($_GET['mobile']);
$cpf = abs(intval($_GET['cpf']));
$ucity = abs(intval($_GET['ucity']));
$cs = strval($_GET['cs']);
$address = strval($_GET['address']);
$bairro = strval($_GET['bairro']);
$cidadeusuario = strval($_GET['cidadeusuario']);
$saldo =  $_GET['saldo']  ;  
  
$condition = array();

 
/* filter */
$id =  $_GET['id']  ; if ($id) $condition['id'] = $id;

$realname = strval($_GET['realname']);
 
$estado =  $_GET['estado']  ; if ($estado) $condition['estado'] = $estado;
$money =  $_GET['money']  ; if ($money) $condition['money'] = $money;

if ($saldo=="true") {
	$condition[] = "money > 0";
}
if ($mobile) { 
	$condition[] = "mobile like '%".mysql_escape_string($mobile)."%'";
}
if ($local) { 
	$local[] = "local like '%".mysql_escape_string($local)."%'";
}
if ($cidadeusuario) { 
	$condition[] = "cidadeusuario like '%".mysql_escape_string($cidadeusuario)."%'";
}
if ($bairro) { 
	$condition[] = "bairro like '%".mysql_escape_string($bairro)."%'";
}
if ($address) { 
	$condition[] = "address like '%".mysql_escape_string($address)."%'";
}
if ($cpf) { 
	$condition[] = "cpf like '%".mysql_escape_string($cpf)."%'";
}
if ($email) { 
	$condition[] = "email like '%".mysql_escape_string($email)."%'";
}
if ($realname) { 
	$condition[] = "realname like '%".mysql_escape_string($realname)."%'";
}
  
if (abs(intval($ucity))) {
	$condition['city_id'] = abs(intval($ucity));
}
/* end */ 
$count = Table::Count('user', $condition);
list($pagesize, $offset, $pagestring) = pagestring($count, 20);

$users = DB::LimitQuery('user', array(
	'condition' => $condition,
	'order' => 'ORDER BY id DESC',
	'size' => $pagesize,
	'offset' => $offset,
));

include template('manage_user_index');
