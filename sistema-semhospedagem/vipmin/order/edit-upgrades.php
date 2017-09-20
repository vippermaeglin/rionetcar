<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

need_manager();
need_auth('market'); 
$id =  $_REQUEST['id'] ;
  
$planos_upgrade = Table::Fetch('planos_upgrade', $id);
 
if(!empty($planos_upgrade)){
	$edicao = true; 
}

if ( !$edicao ) { // cadastro
	
	if( !is_post()){
		include template('manage_order_edit-upgrades');
	}
	else{
  
		$table = new Table('planos_upgrade', $_POST);
		$table->SetStrip('location', 'other');  
		 
		$flag = $table->insert(array(
			'nome', 'descricao', 'preco', 'status'
		));
		
		if($flag){
			Session::Set('notice', 'Plano cadastrado com sucesso.');
			redirect( WEB_ROOT . "/vipmin/order/index-upgrades.php");
		}
		else{
			Session::Set('notice', 'Erro na alteração dos dados.');
			redirect( WEB_ROOT . "/vipmin/order/index-upgrades.php");
		}
	
	} 
}

else  { // edicao
	
	$_POST["preco"] = str_replace("R$", "", $_POST["preco"]);
	$_POST["preco"] = str_replace(",", ".", $_POST["preco"]);	
	$_POST["preco"] = number_format($_POST["preco"], 2, ".", "");
	
	if(!is_post()){
		include template('manage_order_edit-upgrades');
	}
	else{
		$table = new Table('planos_upgrade', $_POST);   
	  
		$up_array = array(
			'nome', 'descricao', 'preco', 'status'
		);
		   
		$flag = $table->update( $up_array );
		
		if ( $flag) {
			Session::Set('notice', 'Dados do plano alterados com sucesso');
			redirect( WEB_ROOT . "/vipmin/order/index-upgrades.php");
		}
		else{
			Session::Set('notice', 'Erro na alteração dos dados');
			redirect( WEB_ROOT . "/vipmin/order/index-upgrades.php");
		}
	} 
}

