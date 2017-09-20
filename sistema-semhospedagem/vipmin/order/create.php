<?php
/*
CREATE TABLE IF NOT EXISTS `order` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tipo` varchar(100) DEFAULT NULL,
  `retorno_automatico` varchar(10) DEFAULT NULL,
  `datapedido` datetime NOT NULL,
  `pay_id` varchar(32) DEFAULT NULL,
  `service` varchar(16) NOT NULL DEFAULT 'alipay',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `admin_id` int(10) unsigned NOT NULL DEFAULT '0',
  `team_id` int(10) unsigned NOT NULL DEFAULT '0',
  `city_id` int(10) unsigned NOT NULL DEFAULT '0',
  `card_id` varchar(16) DEFAULT NULL,
  `state` enum('unpay','pay') NOT NULL DEFAULT 'unpay',
  `quantity` int(10) unsigned NOT NULL DEFAULT '1',
  `realname` varchar(32) DEFAULT NULL,
  `mobile` varchar(128) DEFAULT NULL,
  `zipcode` char(8) DEFAULT NULL,
  `address` varchar(128) DEFAULT NULL,
  `express` enum('Y','N') NOT NULL DEFAULT 'Y',
  `express_xx` varchar(128) DEFAULT NULL,
  `express_id` int(10) unsigned NOT NULL DEFAULT '0',
  `express_no` varchar(32) DEFAULT NULL,
  `price` double(10,2) NOT NULL DEFAULT '0.00',
  `money` double(10,2) NOT NULL DEFAULT '0.00',
  `origin` double(10,2) NOT NULL DEFAULT '0.00',
  `credit` double(10,2) NOT NULL DEFAULT '0.00',
  `card` double(10,2) NOT NULL DEFAULT '0.00',
  `fare` double(10,2) NOT NULL DEFAULT '0.00',
  `condbuy` varchar(128) DEFAULT NULL,
  `remark` text,
  `create_time` int(10) unsigned NOT NULL DEFAULT '0',
  `pay_time` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNQ_p` (`pay_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4519 ;
 */

require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

need_manager();
need_auth('order');

 if($_POST){

 	$data = date("Y-m-d H:i:s");
 	
	$price = (float)str_replace(",",".",$_REQUEST['price']);

  $sql = "SELECT * FROM `team` WHERE id =" . $_REQUEST['team_id'];
  $res = mysql_query($sql);
  $oferta = mysql_fetch_array($res);

  if($price > 0.0){
    $price = $price * $_REQUEST['quantity'];
  }else{
     $price = $oferta['team_price'] * $_REQUEST['quantity'];
  }

	#["id"]=> string(0) "" 
	#["guarantee"]=> string(1) "Y" 
	#["system"]=> string(1) "Y" 
	#["www"]=> string(48) "http://www.sistemacomprascoletivas.com.br/vipmin" 
	#["deliverytype"]=> string(6) "remote" 
	#["user_id"]=> string(1) "2" 
	#["formapagamento"]=> string(15) "moip_pagamentos" 
	#["team_id"]=> string(2) "14" 
	#["quantity"]=> string(5) "10,90" 
	#["status"]=> string(7) "naopago" 
	#["enviaremail"]=> string(3) "sim"

 	$sql = "INSERT INTO `order`(datapedido,user_id,service,team_id,price,quantity,state) 
 	values (
 		'".$data."',".$_REQUEST['user_id'].",'".$_REQUEST['formapagamento']."',".$_REQUEST['team_id'].",".$price.",
 		".$_REQUEST['quantity'].",'".$_REQUEST['status']."'
 	)";

  $rs = mysql_query($sql);

	if(!$rs){
		Session::Set('error', 'Não foi possível cadastrar novo pedido.');
		redirect(null);
	}else{

      $idnovopedido = mysql_insert_id();
      $usuario  = Table::Fetch('user', $_REQUEST['user_id']);
      $tbcidade  = Table::Fetch('category', $usuario['city_id']);
      $nome     = $usuario['realname'] ;
      $cidade = $tbcidade['name'];
      $qtde     = $_REQUEST['quantity']; 
      $sql    =  "INSERT INTO order_amigos (nome,order_id,qtde) VALUES ('$nome',$idnovopedido,$qtde)";
      $rs = null;
      $rs = mysql_query($sql);

      if($rs){
        Session::Set('notice', 'Novo pedido adicionado com sucesso.' );

        if($_REQUEST['enviaremail'] == 'sim'){
          $parametros = array(
            'realname' => $usuario['realname'], 'title' => $oferta['title'], 'quantity' => $_REQUEST['quantity'], 
            'team_id' => $_REQUEST['team_id'], 'price' => number_format($price,2,',','.'),'remark' => $_REQUEST['remark'],
            'order_id' => $idnovopedido, 'email' => $usuario['email'], 'mobile' => $usuario['mobile'], 'gateway' => $_REQUEST['formapagamento'],
            'cpf' => $usuario['cpf'], 'zipcode' => $usuario['zipcode'], 'estado' => $usuario['estado'], 'address' => $usuario['address'],
            'bairro' => $usuario['bairro'], 'cidade' => $cidade
          );

          $request_params = array(
            'http' => array(
            'method' => 'POST',
            'header' => implode("\r\n", array(
              'Content-Type: application/x-www-form-urlencoded',
              'Content-Length: ' . strlen(http_build_query($parametros)),
            )),
            'content' => http_build_query($parametros),
          )
          );
          $request = stream_context_create($request_params);

          //emvia email para administrador
          $assunto = "Novo Pedido Realizado [TESTE]";
          $mensagemadmin = file_get_contents($INI["system"]["wwwprefix"]."/templates/email_pagamento.php", false, $request);
          #enviar($usuario['email'],$assunto,$mensagemadmin);
          #enviar('suportevipcom@gmail.com',$assunto,$mensagemadmin);
          enviar('jeffersonvv@gmail.com',$assunto,$mensagemadmin);
        }

        redirect( WEB_ROOT . "/vipmin/order/create.php");
      }else{
        Session::Set('error', 'Não foi possível cadastrar novo pedido.');
        redirect(null);
      }
	}
 }

include template('manage_order_create');