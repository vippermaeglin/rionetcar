<?php
require_once(dirname(__FILE__) . '/app.php');

fflush();
$code = strval($_GET['code']);
$subscribe = Table::Fetch('subscribe', $code, 'secret');
if ($subscribe) {
	ZSubscribe::Unsubscribe($subscribe);
}
 
redirect( WEB_ROOT."/index.php?unsub=true");
