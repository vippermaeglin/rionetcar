<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

need_manager();
need_auth('admin');

$system = Table::Fetch('system', 1);

if ($_POST) {
	unset($_POST['commit']);
	if ($_POST['skin']['template']=='default') {
		$_POST['skin']['template']==null;
	}
	if ($_POST['skin']['theme']=='default') {
		$_POST['skin']['theme']==null;
	}
	$INI = Config::MergeINI($INI, $_POST);
	$INI = ZSystem::GetUnsetINI($INI);
	save_config();

	$value = Utility::ExtraEncode($INI);
	$table = new Table('system', array('value'=>$value));
	if ( $system ) $table->SetPK('id', 1);
	$flag = $table->update(array( 'value'));

	Session::Set('notice', 'Information Successfully updated!');
	redirect( WEB_ROOT . '/vipmin/system/skin.php');	
}

include template('manage_system_skin');
