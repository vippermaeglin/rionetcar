<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

need_manager();
need_auth('admin');

$system = Table::Fetch('system', 1);

if ($_POST) {
	unset($_POST['commit']);
	$INI = Config::MergeINI($INI, $_POST);
	if ( !save_config('php') ) {
		Session::Set('notice', 'Save Failed!!，'.SYS_PHPFILE.' Can Not be Written!');
	} else {
		$INI = ZSystem::GetUnsetINI($INI);
		$value = Utility::ExtraEncode($INI);
		$table = new Table('system', array('value'=>$value));
		if ( $system ) $table->SetPK('id', 1);
		$flag = $table->update(array( 'value'));
		Session::Set('notice', 'Sistema atualizado com sucesso!');
	}
	redirect( WEB_ROOT . '/vipmin/system/cache.php');
}

include template('manage_system_cache');
