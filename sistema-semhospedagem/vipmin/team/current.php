<?php
function current_manageteam($selector='edit', $id=0) {
	$selector = $selector ? $selector : 'edit';
	$a = array(
		"/vipmin/team/edit.php?id={$id}" => utf8_encode('Informações Básicas'),
		"/vipmin/team/editseo.php?id={$id}" => 'Motores de Busca',
	);
	$l = "/vipmin/team/{$selector}.php?id={$id}";
	return current_link($l, $a);
}
