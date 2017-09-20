<?php

$condition[] = "featured not in ('none')";
$condition[] = "status = 'Y'";

$articles = DB::LimitQuery('magazine_article', array(
	'condition' => $condition,
)); 

?>