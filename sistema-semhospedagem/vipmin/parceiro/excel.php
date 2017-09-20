<?php

require_once("../../include/configure/db.php");
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Content-type: application/x-msexcel");
header("Content-Disposition: attachment;filename = \"RelatorioParceiros.xls\"");
header("Content-Description: Gerado por Jefferson Ventura - VipCom");

function numeroToMoeda($numero, $qtdDecimais = 2) {
	$numero = number_format($numero, $qtdDecimais);
	$numero = explode('.', $numero);
	return sprintf('%s,%s', str_replace(',', '.', $numero[0]), $numero[1]);
}

/* filter start */
$title = ($_GET['title'] != 'undefined') ? $_GET['title'] : null;
$username = ($_GET['username'] != 'undefined') ? $_GET['username'] : null;
$contact = ($_GET['contact'] != 'undefined') ? $_GET['contact'] : null;
$cidade = ($_GET['cidade'] != 'undefined') ? $_GET['cidade'] : null;
$homepage = ($_GET['homepage'] != 'undefined') ? $_GET['homepage'] : null;
$mobile = ($_GET['mobile'] != 'undefined') ? $_GET['mobile'] : null;
$bank_name = ($_GET['bank_name'] != 'undefined') ? $_GET['bank_name'] : null;

$conecta = mysql_connect($value['host'],$value['user'],$value['pass']);
mysql_select_db($value['name']);

$consulta = array();
$consulta[] = 'SELECT * FROM partner AS p';

if($title){
	$consulta[] = 'WHERE p.title = "' . $title . '"';
}

if($username){
	if($title){
		$consulta[] = 'AND p.username = "' . $username . '"';
	}else{
		$consulta[] = 'WHERE p.username = "' . $username . '"';
	}
}

if($contact){
	if($title || $username){
		$consulta[] = 'AND p.contact = "' . $contact . '"';
	}else{
		$consulta[] = 'WHERE p.contact = "' . $contact . '"';
	}
}

if($cidade){
	if($title || $username || $contact){
		$consulta[] = 'AND p.cidade = "' . $cidade . '"';
	}else{
		$consulta[] = 'WHERE p.cidade = "' . $cidade . '"';
	}
}

if($homepage){
	if($title || $username || $contact || $cidade){
		$consulta[] = 'AND p.homepage = "' . $homepage . '"';
	}else{
		$consulta[] = 'WHERE p.homepage = "' . $homepage . '"';
	}
}

if($mobile){
	if($title || $username || $contact || $cidade || $homepage){
		$consulta[] = 'AND p.mobile = "' . $mobile . '"';
	}else{
		$consulta[] = 'WHERE p.mobile = "' . $mobile . '"';
	}
}

if($bank_name){
	if($title || $username || $contact || $cidade || $homepage || $mobile){
		$consulta[] = 'AND p.bank_name = "' . $bank_name . '"';
	}else{
		$consulta[] = 'WHERE p.bank_name = "' . $bank_name . '"';
	}
}

$consulta[] = 'ORDER BY p.id DESC';

$consulta = implode("\n", $consulta);

$resultado = mysql_query($consulta);

$i = 0;

?>
<table cellpadding="3" cellspacing="3" border="0">
	<thead>
		<tr>
			<th>Id</th>
			<th>Nome</th>
			<th>Usuario</th>
			<th>E-mail</th>
			<th>Cidade</th>
			<th>Site</th>
			<th>Telefone</th>
			<th>Banco</th>
			<th>Agencia</th>
			<th>Conta</th>
		</tr>
	</thead>
	<tbody>
		<?php while($reg = mysql_fetch_array($resultado)) : ?>
		<?php if($i % 2) { $style = 'background-color: #CCCCCC;'; } else { $style = ''; } ?>
		<tr> 
			<td style="text-align:left"><?=$reg['id']?></td>
			<td style="text-align:left"><?=$reg['title']?></td>
			<td style="text-align:left"><?=$reg['username']?></td>
			<td style="text-align:left"><?=$reg['contact']?></td>
			<td style="text-align:left"><?=$reg['cidade']?></td>
			<td style="text-align:left"><?=$reg['homepage']?></td>
			<td style="text-align:left"><?=$reg['mobile']?></td>
			<td style="text-align:left"><?=$reg['bank_name']?></td>
			<td style="text-align:left"><?=$reg['bank_no']?></td>
			<td style="text-align:left"><?=$reg['bank_user']?></td>
		</tr>
		<?php $i++; endwhile; ?>
	</tbody>
</table>