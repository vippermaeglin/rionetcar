<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');
require_once(dirname(__FILE__) . '/current.php');

need_manager();
need_auth('team');

$id = abs(intval($_GET['id']));
$team = $eteam = Table::Fetch('team', $id);

if ( is_get() && empty($team) ) {
	redirect( WEB_ROOT . '/vipmin/oferta/edit.php' );
}
else if ( is_post() ) {
	$team = $_POST;
	$insert = array(
			'sort_order',
			'bonus',
			'card',
			'credit',
			'farefree'
			);
	$table = new Table('team', $team);
	if ( $team['id'] && $team['id'] == $id ) {
		$table->SetPk('id', $id);
		$table->update($insert);
		Session::Set('notice', 'Edit the project information successfully Miscellaneous');
		redirect( WEB_ROOT . "/vipmin/oferta/editzz.php?id={$id}");
	} 
	else {
		Session::Set('error', 'Edit the project information failed Miscellaneous');
		redirect(null);
	}
}

$selector = 'edit';
include template('manage_team_editzz');
