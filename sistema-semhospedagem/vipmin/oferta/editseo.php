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
			'seo_title', 'seo_description', 'seo_keyword',
			);
	$table = new Table('team', $team);
	if ( $team['id'] && $team['id'] == $id ) {
		$table->SetPk('id', $id);
		$table->update($insert);
		Session::Set('notice', 'Edit the project successful SEO information');
		redirect( WEB_ROOT . "/vipmin/oferta/editseo.php?id={$id}");
	} 
	else {
		Session::Set('error', 'Edit the project information failed SEO');
		redirect(null);
	}
}

$selector = 'edit';
include template('manage_team_editseo');
