<?php

$condition[] = "featured not in ('none')";
$condition[] = "status = 'Y'";
$condition[] = 'id_category = '.$idcategoria;

$articles = DB::LimitQuery('magazine_article', array(
	'condition' => $condition,
)); 

?>