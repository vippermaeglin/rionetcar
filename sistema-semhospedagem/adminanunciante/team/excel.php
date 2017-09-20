<?php

require_once("../../include/configure/db.php");
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Content-type: application/x-msexcel; charset='utf-8'");
header("Content-Disposition: attachment;filename = \"RelatorioOfertas.xls\"");
header("Content-Description: Gerado por Jefferson Ventura- VipCom");

function numeroToMoeda($numero, $qtdDecimais = 2) {
	$numero = number_format($numero, $qtdDecimais);
	$numero = explode('.', $numero);
	return sprintf('%s,%s', str_replace(',', '.', $numero[0]), $numero[1]);
}

/* filter start */
$team_type = ($_GET['team_type'] != 'undefined') ? $_GET['team_type'] : null;
$team_title = ($_GET['team_title'] != 'undefined') ? $_GET['team_title'] : null;
$city_id = ($_GET['city_id'] != 'undefined') ? $_GET['city_id'] : null;
$partner_id = ($_GET['partner_id'] != 'undefined') ? $_GET['partner_id'] : null;

$conecta = mysql_connect($value['host'],$value['user'],$value['pass']);
mysql_select_db($value['name']);

#group_id (categorias), preco_comissao,market_price,per_number,min_number,max_number,now_number
#title, name, parceiro, begin_time, end_time, team_price
  
$consulta = array();
$consulta[] = 'SELECT t.id, t.title, t.begin_time, t.end_time, t.team_type, t.preco_comissao, t.market_price, t.per_number, 
t.min_number, t.max_number, t.now_number, t.team_price, c.name AS cidade, p.title AS parceiro
FROM team AS t 
LEFT JOIN category AS c ON c.id = t.city_id AND c.zone = "city"
LEFT JOIN partner AS p ON p.id = t.partner_id';

if($team_title){
	$consulta[] = 'WHERE t.title LIKE "%' . $team_title . '%"';
}

if($team_type){

	if($team_title){
		$consulta[] = 'AND t.team_type = "' . $team_type . '"';
	}else{
		$consulta[] = 'WHERE t.team_type = "' . $team_type . '"';
	}
}

if($city_id){
	if($team_title || $team_type){
		$consulta[] = 'AND t.city_id = ' . $city_id;
	}else{
		$consulta[] = 'WHERE t.city_id = ' . $city_id;
	}

}

if($partner_id){
	if($team_title || $team_type || $city_id){
		$consulta[] = 'AND t.partner_id = ' . $partner_id;
	}else{
		$consulta[] = 'WHERE t.partner_id = ' . $partner_id;
	}	
}

$consulta[] = 'ORDER BY t.id DESC';

$consulta = implode("\n", $consulta);

mysql_set_charset('utf8', $conecta);

$resultado = mysql_query($consulta);

$i = 0;

?>
<table cellpadding="3" cellspacing="3" border="0">
	<thead>
		<tr>
			<th>Oferta</th>
			<th>Cidade</th>
			<th>Parceiro</th>
			<th>Periodo</th>
			<th>Max. Pessoa</th>
			<th>Min./Ativar</th>
			<th>Estoque</th>
			<th>Comissao</th>
			<th>Preco Antigo</th>
			<th>Preco</th>
		</tr>
	</thead>
	<tbody>
		<?php while($reg = mysql_fetch_array($resultado)) : ?>
		<?php if($i % 2) { $style = 'background-color: #CCCCCC;'; } else { $style = ''; } ?>
		<tr> 
			<td style="whidth:250px; text-align:left"><?=utf8_decode($reg['title'])?></td>
			<td style="text-align:left"><?=utf8_decode($reg['cidade'])?></td>
			<td style="text-align:left"><?=utf8_decode($reg['parceiro'])?></td>
			<td style="text-align:left"><?=date('d/m/Y', $reg['begin_time']) . ' a ' . date('d/m/Y', $reg['end_time'])?></td>
			<td style="text-align:left"><?=$reg['per_number']?></td>
			<td style="text-align:left"><?=$reg['min_number']?></td>
			<td style="text-align:left"><?=$reg['max_number']?></td>
			<td style="text-align:left"><?=$reg['now_number']?></td>
			<td style="text-align:left"><?=numeroToMoeda($reg['preco_comissao'])?></td>
			<td style="text-align:left"><?=numeroToMoeda($reg['market_price'])?></td>
			<td style="text-align:left"><?=numeroToMoeda($reg['money'])?></td>
			<td style="text-align:left"><?=numeroToMoeda($reg['team_price'])?></td>
		</tr>
		<?php $i++; endwhile; ?>
	</tbody>
</table>