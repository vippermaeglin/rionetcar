<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

need_manager();
need_auth('market');
 
$id = abs(intval($_GET['id']));
$partner = Table::Fetch('partner', $id);
$sql = "ALTER TABLE  `partner` ADD  `max_anuncios` INT( 11 ) NULL";
$rs = @mysql_query($sql);
 
$sql = "ALTER TABLE `partner` DROP INDEX `UNQ_ct`";
$rs = @mysql_query($sql);

if(!empty($partner)){
	$edicao = true; 
}

if ( !$edicao ) { // cadastro
	
	if( !is_post()){
		include template('manage_partner_edit');
	}
	else{

		$_POST['location']="1t";

		$table = new Table('partner', $_POST);
		$table->SetStrip('location', 'other');
		$table->create_time = time();
		$table->user_id 	= $login_user_id;
		$table->username 	= $table->contact;
		$table->password 	= ZPartner::GenPassword($table->password);
		$table->group_id 	= abs(intval($table->group_id));
		$table->city_id 	= abs(intval($table->city_id));
		$table->open 		= (strtoupper($table->open)=='Y') ? 'Y' : 'N';
		$table->display 	= (strtoupper($table->display)=='Y') ? 'Y' : 'N';
		$table->image = upload_image('upload_image', null, 'parceiro', true);
		$table->image1 = upload_image('upload_image1', null, 'parceiro2', true);
		
		if ($_POST['max_anuncios'] > 0 && $_POST['qtd_max_anuncios'] || '') {
			$table->max_anuncios = $_POST['qtd_max_anuncios'];
		} else {
			$table->max_anuncios = $_POST['max_anuncios'];	
		} 
		$flag = $table->insert(array(
			'username', 'user_id', 'city_id', 'title', 'group_id',
			'bank_name', 'bank_user', 'bank_no', 'create_time',
			'location', 'other', 'homepage', 'contact', 'mobile', 'phone',
			'password', 'address', 'open', 'display',
			'image', 'image1', 'image2', 'longlat','chavesms',  'bairro', 'cep', 'estado', 'cidade','numero','descricao','tipo','cpf', 'max_anuncios'
		));
		
		if($flag){
			Session::Set('notice', 'anunciante cadastrado com sucesso.');
			redirect( WEB_ROOT . "/vipmin/parceiro/index.php");
		}
		else{
			Session::Set('notice', 'Erro na alteração dos dados');
			redirect( WEB_ROOT . "/vipmin/parceiro/index.php");
		}
	
	} 
}

else  { // edicao
 
	if(!is_post()){
		include template('manage_partner_edit');
	}
	else{
		$table = new Table('partner', $_POST);
		$table->SetStrip('location', 'other');
		$table->group_id = abs(intval($table->group_id));
		$table->username 	= $table->contact;
		$table->city_id = abs(intval($table->city_id));
		$table->open = (strtoupper($table->open)=='Y') ? 'Y' : 'N';
		$table->display = (strtoupper($table->display)=='Y') ? 'Y' : 'N';
		$table->image = upload_image('upload_image', null, 'parceiro', true);  
		$table->image1 = upload_image('upload_image1', null, 'parceiro2', true);  
	 
		if ($_POST['max_anuncios'] > 0 && $_POST['qtd_max_anuncios'] || '') {
			$table->max_anuncios = $_POST['qtd_max_anuncios'];
		} else {
			$table->max_anuncios = $_POST['max_anuncios'];	
		}
 
		if($table->password ){
			$table->password 	= ZPartner::GenPassword($table->password);
		 
			$up_array = array(
					'username', 'title', 'bank_name', 'bank_user', 'bank_no',
					'location', 'other', 'homepage', 'contact', 'mobile', 'phone',
					'address', 'group_id', 'open', 'city_id', 'display',
					'image', 'image1', 'image2', 'longlat','chavesms',  'bairro', 'cep', 'estado', 'cidade','numero','descricao','password','tipo','cpf','max_anuncios'
					);
		}
		else{
				$up_array = array(
					'username', 'title', 'bank_name', 'bank_user', 'bank_no',
					'location', 'other', 'homepage', 'contact', 'mobile', 'phone',
					'address', 'group_id', 'open', 'city_id', 'display',
					'image', 'image1', 'image2', 'longlat','chavesms',  'bairro', 'cep', 'estado', 'cidade','numero','descricao','tipo','cpf','max_anuncios'
					);
		} 
		if($table->tipo==""){
			 
			unset($up_array[ array_search('tipo', $up_array) ]); } 

		$flag = $table->update( $up_array );
		
		if ( $flag) { 
	 
			Session::Set('notice', 'Dados do anunciante alterados com sucesso');
			redirect( WEB_ROOT . "/vipmin/parceiro/index.php");
		}
		else{
			Session::Set('notice', 'Erro na alteração dos dados');
			redirect( WEB_ROOT . "/vipmin/parceiro/index.php");
		}
	} 
}