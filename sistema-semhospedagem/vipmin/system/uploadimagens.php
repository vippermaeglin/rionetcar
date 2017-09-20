<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

need_manager();
need_auth('design');
$json = array('erro' => false);
if ($_POST) {
	
	$img_nova = (isset($_FILES['img_nova']) ? $_FILES['img_nova'] : null);
	$img_original = (isset($_POST['img_original']) ? $_POST['img_original'] : null);
	$dir_destino = '../../skin/padrao/images/' . $img_original;
	
	if(move_uploaded_file($img_nova["tmp_name"], $dir_destino)){
		$json['msg'] = 'Imagem alterada com sucesso!';
	}else{
		$json['msg'] = 'Erro ao alterar imagem!';
		$json['erro'] = true;
	}

	json_encode($json);
}else{
	include template('manage_system_uploadimagens');
}