<?php
function current_manageteam($selector='edit', $id=0) {
	$selector = $selector ? $selector : 'edit';
	$a = array(
		"/vipmin/oferta/edit.php?id={$id}" => 'Basic information',
		"/vipmin/oferta/editzz.php?id={$id}" => 'Miscellaneous Information',
		"/vipmin/oferta/editseo.php?id={$id}" => 'SEO Information',
	);
	$l = "/vipmin/oferta/{$selector}.php?id={$id}";
	return current_link($l, $a);
}
