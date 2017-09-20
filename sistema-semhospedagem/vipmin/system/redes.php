<?php

require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');



$pg = $_REQUEST['pg'];



need_manager();

need_auth('admin');



$system = Table::Fetch('system', 1);



if ($_POST) {

	unset($_POST['commit']); 

	$INI = Config::MergeINI($INI, $_POST);

	$INI = ZSystem::GetUnsetINI($INI);


	save_config();

	$value = Utility::ExtraEncode($INI);

	$table = new Table('system', array('value'=>$value));

	if ( $system ) $table->SetPK('id', 1);

	$flag = $table->update(array( 'value'));

	Session::Set('notice', 'Sistema atualizado com sucesso!');

	redirect( WEB_ROOT . '/vipmin/system/redes.php?pg='.$pg);

}



$pg = $_REQUEST['pg'];



include template('manage_system_'.$pg);



