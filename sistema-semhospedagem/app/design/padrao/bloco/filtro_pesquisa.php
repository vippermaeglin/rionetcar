<?php
include ('../app.php');
echo "<!--";
print_r($_POST);
echo "-->";
if (isset($_POST['filtro'])) {
	$FILTRO = $_POST['filtro'];
	echo "<option></option>";
	switch ($FILTRO) { 
	case 'fabricante':
		$fabricantes = mysql_query("SELECT DISTINCT car_fabricante from team where car_tipo != '' AND car_tipo = '{$_POST['tipo']}'");
		while ($row = mysql_fetch_array($fabricantes, MYSQL_ASSOC)) {
			echo "<option value='{$row['car_fabricante']}'>{$row['car_fabricante']}</option>";
		}
		break;
	case 'modelo':
		$modelos = mysql_query("SELECT DISTINCT car_modelo from team where car_modelo != '' AND car_fabricante = '{$_POST['fabricante']}'");
		while ($row = mysql_fetch_array($modelos, MYSQL_ASSOC)) {
		echo "<option value='{$row['car_modelo']}'>{$row['car_modelo']}</option>";
		}
		break;
	case 'ano':
		$ano_inicio = mysql_query("SELECT car_ano FROM team WHERE car_fabricante = 'Volkswagen' and car_modelo = 'gol' ORDER BY car_ano ASC LIMIT 1");
		$ano_fim = mysql_query("SELECT car_ano FROM team WHERE car_fabricante = 'Volkswagen' and car_modelo = 'gol' ORDER BY car_ano DESC LIMIT 1");
		$ano = mysql_fetch_row($ano_inicio);
		$anof = mysql_fetch_row($ano_fim);
		for ($i = $ano[0];$i<=$anof[0];$i++) {
			echo "<option value='{$i}'>{$i}</option>";
		}
		break;
	default:
		echo "<option>Erro ao filtrar</option>";
		break;
	}
}
?>