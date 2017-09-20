<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

need_anunciante();
need_auth('help');

$id = abs(intval($_GET['id']));
$ask = Table::Fetch('ask', $id);
if (!$ask) {
	redirect( WEB_ROOT . '/adminanunciante/misc/ask.php');
}
if ($ask['type'] == 'transfer' 
		&& empty($ask['comment']) ) {
	$ask['comment'] = 'Comment';
}

if ($_POST && $id == $_POST['id'] ) {
	$table = new Table('ask', $_POST);
	$table->update( array('comment', 'content') );
	redirect(udecode($_GET['r']));
}

$team = Table::Fetch('team', $ask['team_id']);
$user = Table::Fetch('user', $ask['user_id']);
include template('manage_misc_askedit');
