<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

need_manager();
need_auth('design');

$system = Table::Fetch('system', 1);
 

if ($_POST) {
	
	unset($_POST['commit']);
	$INI = Config::MergeINI($INI, $_POST);
	$INI = ZSystem::GetUnsetINI($INI);

	$value = Utility::ExtraEncode($INI);
	$table = new Table('system', array('value'=>$value));
	if ( $system ) $table->SetPK('id', 1);
	$flag = $table->update(array( 'value'));

	Session::Set('notice', 'As informações foram atualizadas.');
	Utility::Redirect(WEB_ROOT.'/vipmin/system/logo.php');		
}
$pg = $_REQUEST['pg'];
include template('manage_system_logo'.$pg);
