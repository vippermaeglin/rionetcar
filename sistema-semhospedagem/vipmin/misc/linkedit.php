<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

need_manager();
need_auth('admin');

$id = abs(intval($_REQUEST['id']));
$friendlink = Table::Fetch('friendlink', $id);
$table = new Table('friendlink', $_POST);
$table->letter = strtoupper($table->letter);
$table->display = strtoupper($table->display)=='Y' ? 'Y' : 'N';
$uarray = array( 'title','url','logo','sort_order', 'display');

if (!$_POST['title'] || !$_POST['url'] ) {
	Session::Set('error', 'Site name, endereço do site obrigatório');
	redirect(null);
}

if ( $friendlink ) {
	if ( $flag = $table->update( $uarray ) ) {
		Session::Set('notice', 'Link editado com sucesso');
	} else {
		Session::Set('error', 'Falha na edição do link');
	}
} else {
	if ( $flag = $table->insert( $uarray ) ) {
		Session::Set('notice', 'Novo link adicionado com sucesso');
	} else {
		Session::Set('error', 'Falha ao adicionar novo link');
	}
}

redirect(null);