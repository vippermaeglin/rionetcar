<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

need_manager();

/* Inicia a validaчуo e gravaчуo das informaчѕes no banco de dados. */
if(isset($_GET["id"])){
	$id = strip_tags($_GET["id"]);
}

if(!empty($id)){ //Ediчуo de informaчуo
	
	/* Caso o formulсrio com as alteraчѕes sejam enviadas. */
	if(is_post()){

		$table = new Table('magazine_article', $_POST);
		
		/* Щ buscado algumas informaчѕes acerca do artigo. */
		$magazine_article = Table::Fetch('magazine_article', $id);
		
		/* Щ informado a hora de criaчуo e ediчуo com o mesmo valor. */
		$date = date("Y-m-d H:i:s");
		$table->modified = $date;
		
			
		/* Caso novas imagens sejam enviadas, o banco щ atualizado,
		   senуo as informaчѕes anteriores sуo mantidas.
		*/
		if(empty($_FILES["image_cover"]["name"])){
			$table->image_cover = $magazine_article['image_cover'];
		}else
		{
			$table->image_cover = upload_image('image_cover', null, 'magazine_cover');
		}
		
		if(empty($_FILES["image_article"]["name"])){
			$table->image_article = $magazine_article['image_article'];
		}else
		{
			$table->image_article = upload_image('image_article', null, 'magazine_article');
		}
			
		$up_array = array(
			'id_category', 'status', 'title', 'subtitle',
			'resume', 'featured', 'image_cover', 'image_article', 'content_article', 'tip_article', 'modified'
		);
	
		$flag = $table->update($up_array);
			
		/* Caso tenha gravado щ informado ao usuсrio. */
		if($flag){
			$msg = utf8_encode("Informaчѕes do artigo foram atualizadas com sucesso!");
			Session::Set('notice', $msg);
			redirect( WEB_ROOT . "/vipmin/magazine/index-article.php");
		}else{
			$msg = utf8_encode("Ocorreu um erro ao atualizar as informaчѕes!");
			Session::Set('notice', $msg);
			redirect( WEB_ROOT . "/vipmin/magazine/index-article.php");			
		}
	}else{
		/* Busca as informaчѕe do artigo de acordo com a ID. */
		$magazine_article = Table::Fetch('magazine_article', $id);
		$name_category = Table::Fetch('magazine_category', $magazine_article['id_category']);
	}
}
else{ // Inserir novas informaчѕes
	if(is_post()){
		$table = new Table('magazine_article', $_POST);
		
		/* Щ informado a hora de criaчуo e ediчуo com o mesmo valor. */
		$date = date("Y-m-d H:i:s");
		$table->created = $date;
		$table->modified = $date;
		
		/* Imagens sуo tratadas para serem gravadas. */
		if(isset($_FILES)){	
			$table->image_cover = upload_image('image_cover', null, 'magazine_cover');
			$table->image_article = upload_image('image_article', null, 'magazine_article');
		}
		
		$up_array = array(
			'id_category', 'status', 'title', 'subtitle',
			'resume', 'featured', 'image_cover', 'image_article', 'content_article', 'tip_article', 'created', 'modified'
		);

		$flag = $table->insert($up_array);
			
		/* Caso tenha gravado щ informado ao usuсrio. */
		if($flag){
			Session::Set('notice', 'Novo artigo cadastrado com sucesso!');
			redirect( WEB_ROOT . "/vipmin/magazine/index-article.php");
		}else{
			$msg = utf8_encode("Erro ao  cadastrar informaчѕes. Revise os campos!");
			Session::Set('notice', $msg);
		}
	}
}

/* Busca as categorias cadastradas no site. */
$condition_p[] = " status = 'Y'";
$magazine_category = DB::LimitQuery('magazine_category', array( 
	'condition' => array($condition_p),
	'order' => 'ORDER BY id DESC',
));

/* Carrega a template da pсgina. */
include template('manage_magazine_edit-article');

?>