<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');
need_auth('market');  
$id = strval($_GET['id']);

$n = Table::Fetch('faq', $id); 
 
 $uarray = array( 'pergunta',  'resposta', 'ordem');  
if ( empty($id) ) { // cadastro
	
	if( !is_post()){
		include template('manage_system_faqadd');
	}
	else{ 
		 
		$table = new Table('faq', $_POST);    
		$flag = $table->insert($uarray);
		
		if($flag){
			Session::Set('notice', 'Dados cadastrados com sucesso.'); 
		}
		else{
			Session::Set('notice', 'Erro no cadastrado dos dados'); 
		} 
		redirect( WEB_ROOT . "/vipmin/system/faq.php"); 
	} 
}

else  { // edicao
 
	if(!is_post()){
		include template('manage_system_faqadd');
	}
	else{ 
		$table = new Table('faq', $_POST);  
		$flag = $table->update($uarray); 
		
		if ( $flag) {
			Session::Set('notice', 'Dados alterados com sucesso'); 
		}
		else{
			Session::Set('notice', 'Erro na alteração dos dados'); 
		}
		redirect( WEB_ROOT . "/vipmin/system/faq.php"); 
	} 
}
 