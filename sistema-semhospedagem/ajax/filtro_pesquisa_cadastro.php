<?php
include ('../app.php');
echo "<!--".PHP_EOL;
print_r($_POST);
echo "-->".PHP_EOL;
if (isset($_POST['filtro'])) {
	$FILTRO = $_POST['filtro'];
	echo "<option></option>";
	switch ($FILTRO) {
	
	case 'cidades':
		$cidades = mysql_query("SELECT a.* FROM `cidades` a WHERE a.uf = '{$_POST['estado']}' ORDER BY a.nome ASC");		
	 
		while ($row = mysql_fetch_array($cidades, MYSQL_ASSOC)) {			
			echo "<option value='{$row['nome']}'>{$row['nome']}</option>";		
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
		echo "<!--".PHP_EOL;
		echo "SELECT * FROM `fabricante` WHERE tipo = '{$tipo}' ORDER BY nome ASC";
		echo "-->".PHP_EOL;
		while ($row = mysql_fetch_array($fabricantes, MYSQL_ASSOC)) {
			echo "<option value='{$row['id']}'>{$row['nome']}</option>";
		}
		if (mysql_num_rows($fabricantes) <= 0) {
			echo "<option>Nenhum encontrado</option>";
			}
		break;
	case 'modelo':
		$modelos = mysql_query("SELECT * FROM modelo WHERE fabricante = {$_POST['fabricante']} ORDER BY nome ASC");
		while ($row = mysql_fetch_array($modelos, MYSQL_ASSOC)) {
		echo "<option value='{$row['id']}'>{$row['nome']}</option>";
		}
		break;
	
	default:
		echo "<option>Erro ao filtrar</option>";
		break;
	}
}
?>