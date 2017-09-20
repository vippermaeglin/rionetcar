<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

need_manager();
need_auth('design');

$system = Table::Fetch('system', 1);

if ($_POST) {
	need_manager(true);
	unset($_POST['commit']);
 
	$INI = Config::MergeINI($INI, $_POST);
	$INI = ZSystem::GetUnsetINI($INI);
	save_config();

	$value = Utility::ExtraEncode($INI);
	$table = new Table('system', array('value'=>$value));
	if ( $system ) $table->SetPK('id', 1);
	$flag = $table->update(array( 'value'));

	Session::Set('notice', 'Informações atualizadas com sucesso!');
	redirect( WEB_ROOT . '/vipmin/system/background.php');
}

include template('manage_system_background');


