<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

need_manager();
need_auth('market');
 
$tipo = $_REQUEST['tipo'];
$adminnew =  $_REQUEST['adminnew'];
$id = abs(intval($_GET['id']));
$email =  $_REQUEST['email'];
$username =  $_REQUEST['username'];

$pg="index.php";
 
if($tipo=="admin"){
 $pg="manager.php";
}

if($adminnew=="true"){
	$urlaux =  "?adminnew=true";
}

$user = Table::Fetch('user', $id);
 
if(!empty($user)){
	$edicao = true; 
}

if ( !$edicao ) { // cadastro
	
	if( !is_post()){
		include template('manage_user_edit');
	}
	else{ 
		 
		$table = new Table('user', $_POST);
		$up_array = array(
				'username', 'realname','email','create_time','manager',
				'mobile', 'zipcode', 'address','password','zipcode','ip','senha',
				'secret', 'qq','local','bairro','money','cpf','estado','cidadeusuario',
				);
  
		$eu = Table::Fetch('user', $email, 'email');
		if ($eu ) {
			Session::Set('notice', 'Email existente. Por favor, use outro email');
			redirect( WEB_ROOT . "/vipmin/user/edit.php".$urlaux);
		}
		  	 
		$eu = Table::Fetch('user', $username, 'username');
		if ($eu ) {
			Session::Set('notice', 'Login existente. Por favor, use outro login');
			redirect( WEB_ROOT . "/vipmin/user/edit.php".$urlaux);
		}
		  
		if ( $login_user_id == 1 && $id > 1 ) { $up_array[] = 'manager'; }
		if ( $id == 1 && $login_user_id > 1 ) {
			Session::Set('notice', 'Você não tem privilegio de super administrador para fazer as alterações');
			
			redirect( WEB_ROOT . "/vipmin/user/$pg");
		}
		$table->manager = (strtoupper($table->manager)=='Y') ? 'Y' : 'N';
		$table->senha = $table->password;
		$table->create_time = time();
		$table->password = ZUser::GenPassword($table->password);
	   
		$flag = $table->insert($up_array); 
		
		if ( $flag) {
			if($adminnew=="true"){
			
			 Session::Set('notice', 'Dados do administrador cadastrados com sucesso');
			 redirect( WEB_ROOT . "/vipmin/user/manager.php");
			}
			else{
			
			$table = new Table('partner', $_POST);
			$table->SetStrip('location', 'other');
			$table->create_time = time();
			$table->username 	=  $_POST['email'];
			$table->contact 	=  $_POST['email']; 
			$table->password 	=  $_POST['password'];
			$table->tipo 		= "Particular";   
			//$table->numero 		=  $_POST['numero'];     
			$table->cidade 		=  $_POST['cidadeusuario'];      
			$table->bairro 		=  $_POST['bairro'];       
			$table->cep 		=  $_POST['zipcode'];      
			$table->estado 		=  $_POST['estado'];      
			$table->title 		=  $_POST['realname'];    
			//$table->city_id 	=  $_POST['city_id'];      
			//$table->mobile 		=  $u['ddd']."-".$u['mobile'];      
			$table->mobile 		=   $_POST['mobile'];      
			//$table->phone 		=  $_POST['entrega_telefone'];       
			$table->address  	=  $_POST['address'];      
			$table->group_id 	=  0;      
			$table->city_id 	=  0;      
			$table->cpf 	 	=  $_POST['cpf'];      
			//$table->user_id 	=  $user['id'];      
			$table->max_anuncios 	=  "-1";  
			$table->image = upload_image('upload_image', null, 'parceiro', true);			
			
			$flag = $table->insert(array(
				'username', 'user_id', 'city_id', 'title', 'group_id', 'create_time',
				'location',   'contact', 'mobile',  
				'password', 'address',    'bairro', 'cep', 'estado', 'cidade','numero', 'tipo','cpf','max_anuncios',
				'tipoanunciante','ddd','telefonefixo','ddd2','celular','nextel','cnpj','sexo','site','pessoaresponsavel','imagem'
			));
			
			 Session::Set('notice', 'Dados do usuário cadastrados com sucesso');
			 redirect( WEB_ROOT . "/vipmin/user/index.php");
			 
			}
		}
		else{
			if($adminnew=="true"){
			
			 Session::Set('notice', 'Dados do administrador cadastrados com sucesso');
			 redirect( WEB_ROOT . "/vipmin/user/manager.php");
			}
			else{
			 Session::Set('notice', 'Dados cadastrados com sucesso');
			 redirect( WEB_ROOT . "/vipmin/user/index.php");
			 
			}
		}
		 
	} 
}

else  { // edicao
  
	if(!is_post()){
		include template('manage_user_edit');
	}
	else{ 
		$table = new Table('user', $_POST);
		 
			$up_array = array(
				'username', 'realname','email','manager',
				'mobile', 'zipcode', 'address','zipcode','qq','local','bairro','money','cpf','estado','cidadeusuario',
				'tipoanunciante','ddd','telefonefixo','ddd2','celular','nextel','cnpj','sexo','site','pessoaresponsavel','imagem'
				);
			$eu = Table::Fetch('user', $email, 'email');
			
		
		if ($eu && $eu['id'] != $id ) {
			Session::Set('notice', 'Email existente. Por favor, use outro email');
			redirect( WEB_ROOT . "/vipmin/user/edit.php?id=$id");
		}
		  	 
		$eu = Table::Fetch('user', $username, 'username');
		if ($eu && $eu['id'] != $id ) {
			Session::Set('notice', 'Login existente. Por favor, use outro login');
			redirect( WEB_ROOT . "/vipmin/user/edit.php?id=$id");
		}
		
		if ( $login_user_id == 1 && $id > 1 ) { $up_array[] = 'manager'; }
		if ( $id == 1 && $login_user_id > 1 ) {
			Session::Set('notice', 'Você não tem privilegio de super administrador para fazer as alterações');
			redirect( WEB_ROOT . "/vipmin/user/edit.php?id=$id");
		}
	 
		$table->manager = (strtoupper($table->manager)=='Y') ? 'Y' : 'N';
		if ($table->password ) {
			$senha = $table->password;
			$table->password = ZUser::GenPassword($table->password);
			$up_array[] = 'password';
			$sql = "update user set senha='".$senha."' where username='".$table->username."'";
			mysql_query($sql);
			 
		} 
		if(empty($_FILES['upload_image']['name'])){
			unset($up_array[ array_search('imagem', $up_array) ]); 
		}
		else{ 
			$table->imagem = upload_image('upload_image', null, 'parceiro', true);
		}
		 
		$flag = $table->update($up_array); 
		
		if ( $flag) {
			Session::Set('notice', 'Dados do usuario alterados com sucesso');
			 redirect( WEB_ROOT . "/vipmin/user/$pg");
		}
		else{
			Session::Set('notice', 'Erro na alteração dos dados');
			redirect( WEB_ROOT . "/vipmin/user/edit.php?id=$id");
		}
	} 
}