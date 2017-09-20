<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

need_manager();
need_auth('market');
 
$id =  $_REQUEST['id'] ;
$category = Table::Fetch('category', $id);
$zone = $_REQUEST['zone'];
 
 
if($zone=="city"){
	$tipo="Cidade";
}
else{
	$tipo="Categoria";
}

if(!empty($category)){
	$edicao = true; 
}

if ( !$edicao ) { // cadastro
	
	if( !is_post()){
		include template('manage_category_edit');
	}
	else{ 
		 
		$table = new Table('category', $_POST); 
		$uarray = array( 'zone',  'name', 'display', 'sort_order','bannercategoria','idpai','tipo','linkexterno','target');
		$table->display = strtoupper($table->display)=='Y' ? 'Y' : 'N';
		 
		$flag = $table->insert($uarray);
		
		if($flag){
			Session::Set('notice', 'Dados cadastrados com sucesso.');
			redirect( WEB_ROOT . "/vipmin/category/index.php?zone=$zone");
		}
		else{
			Session::Set('notice', 'Erro na alteração dos dados');
			redirect( WEB_ROOT . "/vipmin/category/index.php?zone=$zone");
		}
	
	} 
}

else  { // edicao
 
	if(!is_post()){
		include template('manage_category_edit');
	}
	else{
	
		$table = new Table('category', $_POST); 
		$uarray = array( 'zone',  'name', 'display', 'sort_order','bannercategoria','idpai','tipo','linkexterno','target');
		$table->display = strtoupper($table->display)=='Y' ? 'Y' : 'N';
		 
		$flag = $table->update($uarray); 
		
		if ( $flag) {
			Session::Set('notice', 'Dados alterados com sucesso');
			redirect( WEB_ROOT . "/vipmin/category/index.php?zone=$zone");
		}
		else{
			Session::Set('notice', 'Erro na alteração dos dados');
			redirect( WEB_ROOT . "/vipmin/category/index.php?zone=$zone");
		}
	} 
}