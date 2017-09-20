<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

need_manager();
need_auth('market'); 
$id =  $_REQUEST['id'] ;
  
$planos_publicacao = Table::Fetch('planos_publicacao', $id);

$sql = "ALTER TABLE  `planos_publicacao` ADD  `type_plan` VARCHAR(200) NULL  ";
$rs = @mysql_query($sql);

$sql = "ALTER TABLE  `planos_publicacao` ADD  `qtd_vitrine` INT NULL";
$rs = @mysql_query($sql);

$sql = "ALTER TABLE  `planos_publicacao` ADD  `qtd_anuncios_destaque` INT NULL";
$rs = @mysql_query($sql);
 
if(!empty($planos_publicacao)){
	$edicao = true; 
}

if ( !$edicao ) { // cadastro
	
	if( !is_post()){
		include template('manage_order_edit');
	}
	else{
  
		$table = new Table('planos_publicacao', $_POST);
		$table->SetStrip('location', 'other');  
		 
		$flag = $table->insert(array(
			'username', 'user_id', 'city_id', 'title', 'group_id',
			'bank_name', 'bank_user', 'bank_no', 'create_time',
			'location', 'other', 'homepage', 'contact', 'mobile', 'phone',
			'password', 'address', 'open', 'display',
			'image', 'image1', 'image2', 'longlat','chavesms',  'bairro', 'cep', 'estado', 'cidade','numero','descricao','tipo','qtdeanuncio','ehdestaque','temvideo','atevender', 'type_plan', 'qtd_vitrine', 'qtd_anuncios_destaque'
		));
		
		if($flag){
			Session::Set('notice', 'Plano cadastrado com sucesso.');
			redirect( WEB_ROOT . "/vipmin/order/index.php");
		}
		else{
			Session::Set('notice', 'Erro na alteração dos dados');
			redirect( WEB_ROOT . "/vipmin/order/index.php");
		}
	
	} 
}

else  { // edicao
 
	if(!is_post()){
		include template('manage_order_edit');
	}
	else{
		$table = new Table('planos_publicacao', $_POST);   
	  
		$up_array = array(
			'nome', 'dias', 'valor', 'ativo', 'texto', 'qtdeanuncio','ehdestaque','temvideo','atevender', 'type_plan', 'qtd_vitrine', 'qtd_anuncios_destaque'
		);
		   
		$flag = $table->update( $up_array );
		
		if ( $flag) {
			Session::Set('notice', 'Dados do plano alterados com sucesso');
			redirect( WEB_ROOT . "/vipmin/order/index.php");
		}
		else{
			Session::Set('notice', 'Erro na alteração dos dados');
			redirect( WEB_ROOT . "/vipmin/order/index.php");
		}
	} 
}

