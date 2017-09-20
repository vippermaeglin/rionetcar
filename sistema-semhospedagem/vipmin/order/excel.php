<?php

require_once("../../include/configure/db.php");
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Content-type: application/x-msexcel");
header("Content-Disposition: attachment;filename = \"RelatorioPedidos.xls\"");
header("Content-Description: Gerado por Jefferson Ventura - VipCom");

function numeroToMoeda($numero, $qtdDecimais = 2) {
	$numero = number_format($numero, $qtdDecimais);
	$numero = explode('.', $numero);
	return sprintf('%s,%s', str_replace(',', '.', $numero[0]), $numero[1]);
}

/* filter start */
$id = ($_GET['id'] != 'undefined') ? $_GET['id'] : null;

if($_GET['datapedido'] != 'undefined'){
	$datapedido = explode('/', $_GET['datapedido']);
	$datapedido = implode('-', array_reverse($datapedido));
}else{
	$datapedido = null;
}

$uemail = ($_GET['uemail'] != 'undefined') ? $_GET['uemail'] : null;
$team_id = ($_GET['team_id'] != 'undefined') ? $_GET['team_id'] : null;
$quantity = ($_GET['quantity'] != 'undefined') ? $_GET['quantity'] : null;
$origin = ($_GET['origin'] != 'undefined') ? $_GET['origin'] : null;
$state = ($_GET['state'] != 'undefined') ? $_GET['state'] : null;
$credit = ($_GET['credit'] != 'undefined') ? $_GET['credit'] : null;

$conecta = mysql_connect($value['host'],$value['user'],$value['pass']);
mysql_select_db($value['name']);
 
$consulta = array();
$consulta[] = 'SELECT o.id, o.create_time, o.quantity, o.origin, o.state, o.credit, o.pay_time, o.condbuy,
t.title, 
u.email, u.realname, u.cpf, u.address, u.bairro, c.name AS cidade, u.mobile, u.estado,
p.title AS parceiro,
o.valorfrete, oe.entrega_cep, oe.entrega_endereco, oe.entrega_numero, oe.entrega_complemento, oe.entrega_bairro, oe.entrega_cidade, 
oe.entrega_estado, oe.entrega_telefone
FROM `order` AS o 
LEFT JOIN team AS t ON t.id = o.team_id
LEFT JOIN partner AS p ON p.id = t.partner_id
LEFT JOIN user AS u ON u.id = o.user_id
LEFT JOIN category AS c ON c.id = u.city_id AND c.zone = "city"
LEFT JOIN order_enderecos AS oe ON o.id = oe.idpedido';

if($id){
	$consulta[] = 'WHERE o.id = ' . $id;
}

if($datapedido){

	if($id){
		$consulta[] = 'AND o.datapedido LIKE "' . $datapedido . '%"';
	}else{
		$consulta[] = 'WHERE o.datapedido LIKE "' . $datapedido . '%"';
	}
}

if($uemail){

	if($uemail || $datapedido){
		$consulta[] = 'AND o.uemail LIKE "%' . $uemail . '%"';
	}else{
		$consulta[] = 'WHERE o.uemail LIKE "%' . $uemail . '%"';
	}
}

if($team_id){
	if($id || $datapedido || $uemail){
		$consulta[] = 'AND o.team_id = ' . $team_id;
	}else{
		$consulta[] = 'WHERE o.team_id = ' . $team_id;
	}

}

if($quantity){
	if($id || $datapedido || $uemail || $team_id){
		$consulta[] = 'AND o.quantity = ' . $quantity;
	}else{
		$consulta[] = 'WHERE o.quantity = ' . $quantity;
	}	
}

if($origin){
	if($id || $datapedido || $uemail || $team_id || $quantity){
		$consulta[] = 'AND o.origin = ' . $origin;
	}else{
		$consulta[] = 'WHERE o.origin = ' . $origin;
	}	
}

if($state){
	if($id || $datapedido || $uemail || $team_id || $quantity || $origin){
		$consulta[] = 'AND o.state = "' . $state . '"';
	}else{
		$consulta[] = 'WHERE o.state = "' . $state . '"';
	}	
}

if($credit){
	if($id || $datapedido || $uemail || $team_id || $quantity || $origin || $state){
		$consulta[] = 'AND o.credit = ' . $credit;
	}else{
		$consulta[] = 'WHERE o.credit = ' . $credit;
	}	
}

$consulta[] = 'ORDER BY o.id DESC';

$consulta = implode("\n", $consulta);

mysql_set_charset('utf8', $conecta);

$resultado = mysql_query($consulta);

$i = 0;

?>
<table cellpadding="3" cellspacing="3" border="">
	<thead>
		<tr>
			<th>Pedido</th>
			<th>Data Pedido</th>
			<th>Data Pagamento</th>
			<th>Ofertas</th>
			<th>Parceiro</th>
			<th>Usuario</th>
			<th>Com Frete</th>
			<th>Nome</th>
			<th>Telefone</th>
			<th>CPF</th>
			<th>Endereco</th>
			<th>Bairro</th>
			<th>Cidade</th>
			<th>Estado</th>
			<th>Endereco Entrega</th>
			<th>Bairro Entrega</th>
			<th>Cidade Entrega</th>
			<th>Estado Entrega</th>
			<th>Qtde.</th>
			<th>Valor Pedido</th>
			<th>Valor Frete</th>
			<th>Total</th>
			<th>Opcao de Compra</th>
			<th>Status</th>
			<th>Pag.c/Credito</th>
		</tr>
	</thead>
	<tbody>
		<?php while($reg = mysql_fetch_array($resultado)) : ?>
		<?php if($i % 2) { $style = 'background-color: #CCCCCC;'; } else { $style = ''; } ?>
		<?php
			switch ($reg['state']) {
				case 'pay':
					$state = 'Pago';
					break;
				
				case unpay:
					$state = 'Pendente';
					break;
			}

			$total = ($reg['valorfrete'] > 0) ? $reg['origin'] + $reg['valorfrete'] : $reg['valorfrete'];
		?>
		<tr> 
			<td style="text-align:left"><?=$reg['id']?></td>
			<td style="text-align:left"><?=date('d/m/Y', $reg['create_time'])?></td>
			<td style="text-align:left"><?=date('d/m/Y', $reg['pay_time'])?></td>
			<td style="text-align:left"><?=utf8_decode($reg['title'])?></td>
			<td style="text-align:left"><?=utf8_decode($reg['parceiro'])?></td>
			<td style="text-align:left"><?=utf8_decode($reg['email'])?></td>
			<td style="text-align:left"><?=utf8_decode(($reg['valorfrete'] > 0) ? 'Sim' : 'Não') ?></td>
			<td style="text-align:left"><?=utf8_decode($reg['realname'])?></td>
			<td style="text-align:left"><?=utf8_decode($reg['mobile'])?></td>
			<td style="text-align:left"><?=utf8_decode($reg['cpf'])?></td>
			<td style="text-align:left"><?=utf8_decode($reg['address'])?></td>
			<td style="text-align:left"><?=utf8_decode($reg['bairro'])?></td>
			<td style="text-align:left"><?=utf8_decode($reg['cidade'])?></td>
			<td style="text-align:left"><?=utf8_decode($reg['estado'])?></td>
			<td style="text-align:left"><?=utf8_decode($reg['entrega_endereco'])?></td>
			<td style="text-align:left"><?=utf8_decode($reg['entrega_bairro'])?></td>
			<td style="text-align:left"><?=utf8_decode($reg['entrega_cidade'])?></td>
			<td style="text-align:left"><?=utf8_decode($reg['entrega_estado'])?></td>
			<td style="text-align:left"><?=$reg['quantity']?></td>
			<td style="text-align:left"><?=numeroToMoeda($reg['origin'])?></td>
			<td style="text-align:left"><?=numeroToMoeda($reg['valorfrete'])?></td>
			<td style="text-align:left"><?=numeroToMoeda($total)?></td>
			<td style="text-align:left"><?=utf8_decode($reg['condbuy'])?></td>
			<td style="text-align:left"><?=$state?></td>
			<td style="text-align:left"><?=numeroToMoeda($reg['credit'])?></td>
		</tr>
		<?php $i++; endwhile; ?>
	</tbody>
</table>