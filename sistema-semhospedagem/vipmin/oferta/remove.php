<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

need_manager();
need_auth('team');

$id = abs(intval($_GET['id']));
$team = Table::Fetch('team', $id);
$order = Table::Fetch('order', $id, 'team_id');
if ( $order ) {
	Session::Set('notice', "Remove buy ({$id}) records failed, there is order history");
} else {
	Table::Delete('team', $id);
	Session::Set('notice', "Remove buy ({$id}) recorded successful");
}
redirect(udecode($_GET['r']));
