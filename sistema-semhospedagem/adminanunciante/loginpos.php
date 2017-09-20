<?php
require_once(dirname(dirname(__FILE__)) . '/app.php'); 
  
$sql = "ALTER TABLE `partner` DROP INDEX `UNQ_ct`";
$rs = @mysql_query($sql);

if ( $_POST ) {
	 $login_admin = ZUser::GetLoginAnunciante($_POST['username'], $_POST['password']); // revendas criadas pelo administrador. 
	if ( !$login_admin ) {
		
		$login_admin = ZUser::GetLogin($_POST['username'], $_POST['password']);
		
		if ( !$login_admin ) {
			Session::Set('error', 'Nome de usuário e senha não conferem!');
			redirect( WEB_ROOT . '/adminanunciante/login.php');
		}
	}
	else if($login_admin){
		$revendaadmin=true;	
	}
	
	if($login_admin){
	
		Session::Set('user_id', $login_admin['id']);
		// criando o parceiro
		
		if(!$revendaadmin){
			$user = Table::Fetch('user', $login_admin['id']);
			$partner = Table::Fetch('partner', $user['email'],'contact');
			
			if(!$partner){
				$table = new Table('partner', $_POST);
				$table->SetStrip('location', 'other');
				$table->create_time = time();
				$table->username 	=  $user['email'];
				$table->contact 	=  $user['email']; 
				$table->password 	=  $_POST['password'];
				$table->tipo 		=  "Particular";  
				
				$table->numero 		=  $user['numero'];     
				$table->cidade 		=  $user['cidadeusuario'];      
				$table->bairro 		=  $user['bairro'];       
				$table->cep 		=  $user['zipcode'];      
				$table->estado 		=  $user['estado'];      
				$table->title 		=  $user['realname'];    
				$table->city_id 	=	$user['city_id'];      
				$table->mobile 		=  $user['mobile'];      
				$table->phone 		=  $user['mobile'];      
				$table->address  	=  $user['address'];      
				$table->cpf 	 	=  $user['cpf'];      
				$table->user_id 	=  $user['id'];      
				$table->max_anuncios 	=  "-1";      
				
				$flag = $table->insert(array(
					'username', 'user_id', 'city_id', 'title', 'group_id',
					'bank_name', 'bank_user', 'bank_no', 'create_time',
					'location', 'other', 'homepage', 'contact', 'mobile', 'phone',
					'password', 'address', 'open', 'display',
					'image', 'image1', 'image2', 'longlat','chavesms',  'bairro', 'cep', 'estado', 'cidade','numero','descricao','tipo','cpf','max_anuncios'
				));
				//Session::Set('partner_id', mysql_insert_id());
				
			}
			else{
				//Session::Set('partner_id', $partner['id']);
			}
		}
		else{   // revendas criadas pelo administrador. 
				$partner = Table::Fetch('partner', $_POST['username'],'contact');
				//Session::Set('partner_id', $partner['id']);
			}
		
		redirect( WEB_ROOT . '/adminanunciante/index.php');
	}
}

include template('manage_login');