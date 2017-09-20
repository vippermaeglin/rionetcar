<?php
include ('../../app.php');
echo "<!--".PHP_EOL;
print_r($_POST);
echo "-->".PHP_EOL;
if (isset($_POST['filtro'])) {
	$FILTRO = $_POST['filtro'];
	echo "<option></option>";
	switch ($FILTRO) {
	
	case 'cidades':
		$cidades = mysql_query("SELECT a.* FROM `cidades` a WHERE a.uf = '{$_POST['estado']}' and a.id in ( select b.city_id  from team b where b.city_id = a.id and ( b.status is null or b.status = 1 ) and (pago = 'sim' or anunciogratis = 's') and begin_time < '".time()."' and end_time > '".time()."' ) ORDER BY a.nome ASC");		
		if (mysql_num_rows($cidades) <= 0) {
			echo "<option value='0'>Nenhum an&uacute;ncio para este estado</option>";
		} else {
			while ($row = mysql_fetch_array($cidades, MYSQL_ASSOC)) {			
				echo "<option value='{$row['id']}'>{$row['nome']}</option>";		
			}
		}
		break;		
		 
		
	case 'fabricante':
		$fabricantes = mysql_query("SELECT * FROM `fabricante` ORDER BY nome ASC");		
		while ($row = mysql_fetch_array($fabricantes, MYSQL_ASSOC)) {			
			echo "<option value='{$row['id']}'>{$row['nome']}</option>";		
		}		
		break;			
	case 'fabricante2':
		$tipo = $_POST['tipo'];
		$fabricantes = mysql_query("SELECT * FROM `fabricante` WHERE tipo = '{$tipo}' ORDER BY nome ASC");
		//echo "<!--".PHP_EOL;
		//echo "SELECT * FROM `fabricante` WHERE tipo = '{$tipo}' ORDER BY nome ASC";
		//echo "-->".PHP_EOL;
		while ($row = mysql_fetch_array($fabricantes, MYSQL_ASSOC)) {
			echo "<option value='{$row['id']}'>{$row['nome']}</option>";
		}
		if (mysql_num_rows($fabricantes) <= 0) {
			echo "<option>Nenhum encontrado</option>";
		}
		break;
	case 'modelo':
		$modelos = mysql_query("SELECT * FROM modelo WHERE fabricante = {$_POST['fabricante']} ORDER BY nome ASC");

		while($row = mysql_fetch_array($modelos, MYSQL_ASSOC)) {
			
			$nome = explode(" ", $row['nome']);
			$nome[0] = strtoupper($nome[0]);

			if(!(in_array($nome[0], $modelosunicos))) {
				$modelosunicos[] = $nome[0];
			}
		}	
		
		foreach($modelosunicos as $key => $value) {			
			echo "<option value='{$value}'>{$value}</option>";		
		}	

		break;
	
	default:
		echo "<option>Erro ao filtrar</option>";
		break;
	}
}
?>