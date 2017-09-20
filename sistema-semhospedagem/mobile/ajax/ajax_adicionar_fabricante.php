<html>
<head>
<title>
Adicionar novo fabricante
</title>
<script>
var campoFabricante;
var janelaPai;
</script>
</head>
<body>
<style>
body {
	background: #E1E5E8;
}

.clear {
	clear: both;
}

form {
	display: block;
	background: white;
	width: 350px;
	height: 125px;
	border: 10px solid #C1D0D3;
	position: relative;
}

form label {
	width: 100%;
	display: block;
	margin-left: 9px;
	margin-top: 20px;
}

form label input[type='text'] {
	width: 95%;
}

form input[type='submit'] {
	position: absolute;
	right: 8px;
	bottom: 10px;
	width: 90px;
	height: 40px;
	font-size: 18px;
	background: #E1E5E8;
	border: 1px solid black;
}
</style>
<form method="POST" action="" name="adicionarFabricante">
<label for="Fabricante">
Fabricante:
<input type="text" name="fabricante" id="input_fabricante" <?php if (isset($_POST['fabricante']) && $_POST['fabricante'] != '') { echo "value='{$_POST['fabricante']}'"; } ?>>
</label>
<input type="submit" value="Adicionar">
</form>
<?php
if (isset($_POST['fabricante']) && $_POST['fabricante'] != '') {
	try {
		$PDO = new PDO('mysql:host=localhost;dbname=classic_car', 'classic_tk21', 'orbsat2006');
		$PDO->beginTransaction();
		$PDO->exec("INSERT INTO fabricante values (NULL, '{$_POST['fabricante']}');");
		$PDO->commit();
	} catch (Exception $e) {
		echo $e->getMessage();
	}
?>
<script>
campoFabricante.value = "<?php echo $_POST['fabricante']; ?>";
window.close();
</script>
<?php
}
?>
</body>
</html>