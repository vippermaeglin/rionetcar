<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');

if (isset($_SESSION['admin_id'])) {
	unset($_SESSION['admin_id']);
	unset($_SESSION['user_id']);
	unset($_SESSION['partner_id']);
}

redirect( WEB_ROOT . '/adminanunciante/index.php');
