<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

need_anunciante(); 
  
$id = abs(intval($_GET['id']));
$team = $eteam = Table::Fetch('team', $id);
 
if(detectResolution()){
	$idpedido = $team['id'];
	redirect($ROOTPATH."/mobile/?page=planos&idpedido=".$idpedido);
}else{
	include template('manage_team_pagamentopagseguro');
}

