<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

need_manager();
need_auth('admin');

$version = strval(SYS_VERSION);
$subversion = strval(SYS_SUBVERSION);
$action = strval($_GET['action']);

if ( 'db' == $action ) {
	$r = zuitu_upgrade($action, $version);
	Session::Set('notice', 'Estrutura da base de dados atualizada com sucesso, a base de dados esta na versão mais atual');
	redirect( WEB_ROOT . '/vipmin/system/upgrade.php' );
}
$version_meta = zuitu_version($version);
$newversion = $version_meta['version'];
$newsubversion = $version_meta['subversion'];
$software = $version_meta['software'];

$install = $version_meta['install'];
$patch = $version_meta['patch'];
$patchdesc = $version_meta['patchdesc'];
$upgrade = $version_meta['upgrade'];
$upgradedesc = $version_meta['upgradedesc'];

$isnew = ( $newversion==$version && $subversion == $newsubversion ) ;

include template('manage_system_upgrade');
