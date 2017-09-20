<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

need_manager();
$condition = array();

$idmodelo = strval($_GET['idmodelo']);
$nome = strval($_GET['nome']);

if(isset($_GET['fabricante']) AND $_GET['fabricante'] != ""){
	$query = "SELECT id FROM fabricante WHERE nome LIKE '%".$_GET['fabricante']."%'";
	$rs = mysql_query($query);
	$fabricante = mysql_fetch_assoc($rs);
	
	if ($fabricante) { $condition['fabricante'] = $fabricante['id'];}
}

 if ($idmodelo) { $condition['id'] = $idmodelo; } 
 if ($nome) { 
	$condition[] = "nome LIKE '%".mysql_escape_string($nome)."%'";
 }

$count = Table::Count('modelo', $condition);
list($pagesize, $offset, $pagestring) = pagestring($count, 20);
 
$categories = DB::LimitQuery('modelo', array(
	'condition' => $condition,
	'order' => 'ORDER BY fabricante, nome',
	'size' => $pagesize,
	'offset' => $offset,
));

include template('manage_category_indexmodelos');

?>
 <script> 
 function resetFilter(){
	location.href  = '<?php echo $_SERVER["PHP_SELF"] ?>';
 }
 </script>