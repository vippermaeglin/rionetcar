<?php
header('Content-Type:text/json; charset="utf-8"');

require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

need_manager();
need_auth('design');
$json = array('erro' => false);
if ($_POST) {
	
	$img = $_POST['img'];
	$dirimg = '../../skin/padrao/images/' . $img;
	$tam_img = getimagesize('$dirimg');

	$w = ($tam_img[0] > 100) ? 100 : $tam_img[0];
	$h = ($tam_img[1] > 50) ? 50: $tam_img[1];
	
	$json['img'] = sprintf('<img width="%s" heigth="%s" alt="%s" title="%s" src="%s">', $w, $h, $img, $img, $dirimg);

	echo json_encode($json);
}