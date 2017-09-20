<?php
function current_manageteam($selector='edit', $id=0) {
	$selector = $selector ? $selector : 'edit';
	$a = array(
		"/adminanunciante/team/edit.php?id={$id}" => utf8_encode('Informações Básicas'),
		"/adminanunciante/team/editseo.php?id={$id}" => 'Motores de Busca',
	);
	$l = "/adminanunciante/team/{$selector}.php?id={$id}";
	return current_link($l, $a);
}
