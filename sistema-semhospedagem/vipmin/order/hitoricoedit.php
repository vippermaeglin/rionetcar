<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

need_manager();
need_auth('market');
  
$id =  $_REQUEST['id'] ;
  
$user_planos = Table::Fetch('partner_planos', $id);
  
if(!is_post()){
	include template('manage_order_historicoedit');
}
else{
	if($user_planos['enviouemail'] != "S"){
		if($_POST['status']=="aprovado"){
			envia_email_plano_aprovado($id);
		}
	}

	$userplanos = array();
	$userplanos = $_POST;
	$userplanos['valor'] =  str_replace("R$ ","",str_replace(",",".",str_replace(".","",$userplanos['valor'])));
	$table = new Table('partner_planos', $userplanos);  
	
	$up_array = array(
		'qtdeanuncio', 'status','valor' 
	);
	 $table->SetPk('id', $id);
	$flag = $table->update( $up_array );
	
	

	if ( $flag) {
		Session::Set('notice', 'Dados alterados com sucesso');
		redirect( WEB_ROOT . "/vipmin/order/historico.php");
	}
	else{
		Session::Set('notice', 'Erro na alteração dos dados');
		redirect( WEB_ROOT . "/vipmin/order/historico.php");
	}
} 
 

