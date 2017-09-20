<?php

require_once("../../include/configure/db.php");
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Content-type: application/x-msexcel");
header("Content-Disposition: attachment;filename = \"RelatorioUsuarios.xls\"");
header("Content-Description: Gerado por Jefferson Ventura - VipCom");

function numeroToMoeda($numero, $qtdDecimais = 2) {
	$numero = number_format($numero, $qtdDecimais);
	$numero = explode('.', $numero);
	return sprintf('%s,%s', str_replace(',', '.', $numero[0]), $numero[1]);
}

/* filter start */
$id = ($_GET['id'] != 'undefined') ? $_GET['id'] : null;
$realname = ($_GET['realname'] != 'undefined') ? $_GET['realname'] : null;
$email = ($_GET['email'] != 'undefined') ? $_GET['email'] : null;
$mobile = ($_GET['mobile'] != 'undefined') ? $_GET['mobile'] : null;
$cpf = ($_GET['cpf'] != 'undefined') ? $_GET['cpf'] : null;
$address = ($_GET['address'] != 'undefined') ? $_GET['address'] : null;
$bairro = ($_GET['bairro'] != 'undefined') ? $_GET['bairro'] : null;
$cidadeusuario = ($_GET['cidadeusuario'] != 'undefined') ? $_GET['cidadeusuario'] : null;
$estado = ($_GET['estado'] != 'undefined') ? $_GET['estado'] : null;
$money = ($_GET['money'] != 'undefined') ? $_GET['money'] : null;
$local = ($_GET['local'] != 'undefined') ? $_GET['local'] : null;

$conecta = mysql_connect($value['host'],$value['user'],$value['pass']);
mysql_select_db($value['name']);

$consulta = array();
$consulta[] = 'SELECT * FROM user AS u';

if($id){
	$consulta[] = 'WHERE u.id = "' . $id . '"';
}

if($realname){
	if($id){
		$consulta[] = 'AND u.realname = "' . $realname . '"';
	}else{
		$consulta[] = 'WHERE u.realname = "' . $realname . '"';
	}
}

if($email){
	if($id || $realname){
		$consulta[] = 'AND u.email = "' . $email . '"';
	}else{
		$consulta[] = 'WHERE u.email = "' . $email . '"';
	}
}

if($mobile){
	if($id || $realname || $email){
		$consulta[] = 'AND u.mobile = "' . $mobile . '"';
	}else{
		$consulta[] = 'WHERE u.mobile = "' . $mobile . '"';
	}
}

if($cpf){
	if($id || $realname || $email || $mobile){
		$consulta[] = 'AND u.cpf = "' . $cpf . '"';
	}else{
		$consulta[] = 'WHERE u.cpf = "' . $cpf . '"';
	}
}

if($address){
	if($id || $realname || $email || $mobile || $cpf){
		$consulta[] = 'AND u.address = "' . $address . '"';
	}else{
		$consulta[] = 'WHERE u.address = "' . $address . '"';
	}
}

if($bairro){
	if($id || $realname || $email || $mobile || $cpf || $address){
		$consulta[] = 'AND u.bairro = "' . $bairro . '"';
	}else{
		$consulta[] = 'WHERE u.bairro = "' . $bairro . '"';
	}
}

if($cidadeusuario){
	if($id || $realname || $email || $mobile || $cpf || $address || $bairro){
		$consulta[] = 'AND u.cidadeusuario = "' . $cidadeusuario . '"';
	}else{
		$consulta[] = 'WHERE u.cidadeusuario = "' . $cidadeusuario . '"';
	}
}

if($estado){
	if($id || $realname || $email || $mobile || $cpf || $address || $bairro || $cidadeusuario){
		$consulta[] = 'AND u.estado = "' . $estado . '"';
	}else{
		$consulta[] = 'WHERE u.estado = "' . $estado . '"';
	}
}

if($money){
	if($id || $realname || $email || $mobile || $cpf || $address || $bairro || $cidadeusuario || $estado){
		$consulta[] = 'AND u.money = "' . $money . '"';
	}else{
		$consulta[] = 'WHERE u.money = "' . $money . '"';
	}
}

if($local){
	if($id || $realname || $email || $mobile || $cpf || $address || $bairro || $cidadeusuario || $estado || $money){
		$consulta[] = 'AND u.local = "' . $local . '"';
	}else{
		$consulta[] = 'WHERE u.local = "' . $local . '"';
	}
}

$consulta[] = 'ORDER BY u.id DESC';

$consulta = implode("\n", $consulta);

$resultado = mysql_query($consulta);

$i = 0;

?>
<table cellpadding="3" cellspacing="3" border="0">
	<thead>
		<tr>
			<th>Id</th>
			<th>Nome</th>
			<th>E-mail</th>
			<th>Telefone</th>
			<th>CPF</th>
			<th>Endere&ccedil;o</th>
			<th>Bairro</th>
			<th>Cidade</th>
			<th>UF</th>
			<th>Saldo</th>
			<th>Data Cadastro</th>
		</tr>
	</thead>
	<tbody>
		<?php while($reg = mysql_fetch_array($resultado)) : ?>
		<?php if($i % 2) { $style = 'background-color: #CCCCCC;'; } else { $style = ''; } ?>
		<tr> 
			<td style="text-align:left"><?=$reg['id']?></td>
			<td style="text-align:left"><?=$reg['realname']?></td>
			<td style="text-align:left"><?=$reg['email']?></td>
			<td style="text-align:left"><?=$reg['mobile']?></td>
			<td style="text-align:left"><?=$reg['cpf']?></td>
			<td style="text-align:left"><?=$reg['address']?></td>
			<td style="text-align:left"><?=$reg['bairro']?></td>
			<td style="text-align:left"><?=$reg['cidadeusuario']?></td>
			<td style="text-align:left"><?=$reg['estado']?></td>
			<td style="text-align:left"><?=numeroToMoeda($reg['money'])?></td>
			<td style="text-align:left"><?=date('d/m/Y', $reg['create_time'])?></td>
		</tr>
		<?php $i++; endwhile; ?>
	</tbody>
</table>