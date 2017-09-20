<?php

require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

$order = Table::Fetch('order', $_REQUEST['order_id']);
$team = Table::Fetch('team', $order['team_id']);
 
$team_id = $order['team_id'];
$idproduto  = $team_id ;
$titulopage =  $team["title"] ;
$title 		= substr($team['title'],0,80) ."...";
$now_number = $team["now_number"];
$max_number = $team["max_number"];
$quantity 	= $order["quantity"];
$valor 		= $order["origin"];

$state 		= $order["state"];

?>