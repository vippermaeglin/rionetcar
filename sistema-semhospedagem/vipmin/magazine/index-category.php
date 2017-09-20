<?php

require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

need_manager();

/* Recupera as informações para preencher a tabela. */
$condition = array();

/* Filtro por nome das categorias para revista. */
if(isset($_GET['name'])){
	
	$name = strip_tags($_GET['name']);
	$name = strval($name);
	
	if(!empty($name)){
		/* Caso seja informado algum valor, é feito um filtro no banco de dados. */
		$condition[] = "name LIKE '%" . $name . "%'"; 
	}
}

if(isset($_GET['id'])){

	$id = strip_tags($_GET['id']);
	$id = strval($id);
	
	if(!empty($id)){
		/* Caso seja informado algum valor, é feito um filtro no banco de dados. */
		$condition[] = "id = " . $id; 
	}
}

/* Fim dos filtros de busca */

/* É feito uma busca das informações, e o numero de linhas retornadas. */
$count = Table::Count('magazine_category', $condition);
list($pagesize, $offset, $pagestring) = pagestring($count, 20);
$magazine_category = DB::LimitQuery('magazine_category', array(
	'condition' => $condition,
	'order' => 'ORDER BY id ASC',
	'size' => $pagesize,
	'offset' => $offset,
));

/* Carrega a template da página */
include template('manage_magazine_index-category');

?>