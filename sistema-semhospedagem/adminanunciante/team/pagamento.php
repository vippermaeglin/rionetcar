<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

need_anunciante(); 
  
$id = abs(intval($_GET['id']));
$team = $eteam = Table::Fetch('team', $id);
 
include template('manage_team_pagamento');

