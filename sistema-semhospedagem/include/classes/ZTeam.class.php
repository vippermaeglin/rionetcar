<?php
class ZTeam
{
	static public function DeleteTeam($id) {
		$orders = Table::Fetch('order', array($id), 'team_id');
		foreach( $orders AS $one ) {
			if ($one['state']=='pay') return false;
			if ($order['card_id']) {
				Table::UpdateCache('card', $order['card_id'], array(
					'team_id' => 0,
					'order_id' => 0,
					'consume' => 'N',
				));
			}
			Table::Delete('order', $one['id']);
		}
		return Table::Delete('team', $id);
	}	
	static public function DeleteTeamWebsite($id) {
	 
		return Table::Delete('produtos_afiliados', $id);
	}

	static public function BuyOne($order) {
		$order = Table::FetchForce('order', $order['id']);
		$team = Table::FetchForce('team', $order['team_id']);
		//$plus = $team['conduser']=='Y' ? 1 : $order['quantity']; // SE USUARIO PODE COMPRA 1 OU MASI Q UM
		//$team['now_number'] += $plus;
		$team['now_number'] = $order['quantity'];
		$plus =	$order['quantity'];
		/* close time */
		if ( $team['max_number']>0 && $team['now_number'] >= $team['max_number'] ) {
			$team['close_time'] = time();
		}

		/* reach time */
		if ( $team['now_number']>=$team['min_number']&& $team['reach_time'] == 0 ) { // inicia a oferta
			$team['reach_time'] = time();
		}

		Table::UpdateCache('team', $team['id'], array(
			'close_time' => $team['close_time'],
			'reach_time' => $team['reach_time'],
			'now_number' => array( "`now_number` + {$plus}", ),
		));

		/* cash flow */
		ZFlow::CreateFromOrder($order);
		/* order : send coupon ? */
		ZCoupon::CheckOrder($order);
		/* order : invite buy */
		ZInvite::CheckInvite($order);
		/* credit */
		ZCredit::Buy($order['user_id'], $order);
	}

	static public function BuyOne2($order) {

		global $INI;
 
		Util::log($order['id']. " - Alteracao de status do pedido para pago a partir da administração ou compras com credito  (nao eh pagseguro)");
	
		$order = Table::FetchForce('order', $order['id']);
		$team = Table::FetchForce('team', $order['team_id']);

		$team['now_number'] = $order['quantity'];
		$plus =	$order['quantity'];
		/* close time */
		if ( $team['max_number']>0 && $team['now_number'] >= $team['max_number'] ) {
			$team['close_time'] = time();
		}
		if ( $team['now_number']>=$team['min_number']&& $team['reach_time'] == 0 ) { // inicia a oferta
			$team['reach_time'] = time();
		}

		Table::UpdateCache('team', $team['id'], array(
			'close_time' => $team['close_time'],
			'reach_time' => $team['reach_time'],
			'now_number' => array( "`now_number` + {$plus}", ),
		));

		/* cash flow */
		ZFlow::CreateFromOrder($order);
		/* order : send coupon ? */
		ZCoupon::CheckOrder($order,true);
		/* order : invite buy */
		ZInvite::CheckInvite($order);
		/* credit */
		ZCredit::Buy($order['user_id'], $order);


		// buscando dados da oferta - verificando se ela está ativa para enviar cupons para todos os clientes que compraram
		$team = Table::Fetch('team', $order['team_id']);
		 
		 if($team['now_number'] >= $team['min_number']){  //<!--  A oferta esta ativa  --> 
		  
			Util::log($order['id']. " - Oferta ativa -  buscando os cupons dos usuarios para envio...");
		 
			$sql = "select a.id,a.secret,a.order_id,a.nome,b.username,b.email,c.title,c.homepage,c.location,c.address,c.chavesms from coupon a,user b, partner c where a.partner_id = c.id and a.user_id = b.id and a.order_id = ".$order['id']." and a.team_id = ".$order['team_id'];
		    $rs = mysql_query($sql);
			
			Util::log($order['id']. " - Encontrado (".mysql_num_rows($rs).") oferta(s) para envio.");
			 
			//Util::log($_REQUEST['ProdID_1']. " $sql  ");
			
			$achou = false;
			while($row = mysql_fetch_object($rs)){
				$achou = true;
				$numcupom 	= $row->id;
				$senha 		= $row->secret; 
				$pedido  	= $row->order_id; 
				$email 		= $row->email; 
				$username  	= $row->username; 
				$nome 		= $row->nome; 
				$parceiro  	= $row->title ; 
				$homepage   = $row->homepage  ; 
				$location   = $row->address  ; 
				$complemento = $row->chavesms; 

				$location =  $location. " ".$complemento;
				
				Util::log($order['id']. " - Numero do cupom: $numcupom - senha: $senha - Utilizador: $nome");
				$url = $INI['system']['wwwprefix']; 
				$url.= $url."/pedidos";
				 
				
		       $parametros = array( 'oferta' => $team['title'],'username' => $username, 'numcupom' => $numcupom, 'senha' => $senha,  'utilizador' => $nome ,'parceiro' => $parceiro, 'location' => $location, 'homepage' => $homepage  );
	 
				$request_params = array(
					'http' => array(
						'method'  => 'POST',
						'header'  => implode("\r\n", array(
							'Content-Type: application/x-www-form-urlencoded',
							'Content-Length: ' . strlen(http_build_query($parametros)),
						)),
						'content' => http_build_query($parametros),
					)
				);
 
				$request  = stream_context_create($request_params);
				$body = file_get_contents($INI["system"]["wwwprefix"]."/templates/envio_cupom.php", false, $request);

		
				if(Util::postemailCliente($body, $INI['system']['sitename'] . " - ".ASSUNTO_ENVIO_CUPOM. ": ".displaySubStringWithStrip(utf8_decode($team['title']),80),$email)){
					Util::log($pedido. " - Email para o cliente com dados do cupom enviado com sucesso(".$email.")...");
					
					$sql2 = "update coupon set envioucupom =1 where id = '".$numcupom."'";
					$rs2 = mysql_query($sql2);
					if($rs2){
						Util::log($pedido. " - campo envioucupom atualizado.");
					 }
					 else{
						Util::log($pedido. " - campo envioucupom nao atualizado. $sql2");
					 }
				}
				else{
					Util::log($pedido. " - Erro no envio do email... (".$email.") .");
				} 
			}
		 }
		 else{
			Util::log($order['id']. " - A oferta desta compra nao esta ativa, numero minimo nao alcancado ainda (".$team['min_number'].") total comprados (".$team['now_number'].").");
		 
		 }
		 if( !$achou){
			Util::log($order['id']. " - Ainda nenhum cupom disponivel para envio:  Minimo: (".$team['min_number'].") - Total comprados (".$team['now_number'].").");
		 
		 }
	}
	
	static public function BuyOnePontos($order) {

		global $INI;
 
		Util::log($order['id']. " - Envio do cupom por uso de pontos");
	
		$order = Table::FetchForce('order', $order['id']);
		$team = Table::FetchForce('team', $order['team_id']);

		$team['now_number'] = $order['quantity'];
		$plus =	$order['quantity'];
		/* close time */
		if ( $team['max_number']>0 && $team['now_number'] >= $team['max_number'] ) {
			$team['close_time'] = time();
		}
		if ( $team['now_number']>=$team['min_number']&& $team['reach_time'] == 0 ) { // inicia a oferta
			$team['reach_time'] = time();
		}

		Table::UpdateCache('team', $team['id'], array(
			'close_time' => $team['close_time'],
			'reach_time' => $team['reach_time'],
			'now_number' => array( "`now_number` + {$plus}", ),
		));

		/* cash flow */
		ZFlow::CreateFromOrder($order);
		/* order : send coupon ? */
		ZCoupon::CheckOrder($order);
		/* order : invite buy */
		ZInvite::CheckInvite($order);
		/* credit */
		ZCredit::Buy($order['user_id'], $order);
 
		$team = Table::Fetch('team', $order['team_id']);
		     
		Util::log($order['id']. " - Oferta ativa -  buscando os cupons dos usuarios para envio...");
	 
		$sql = "select a.id,a.secret,a.order_id,a.nome,b.username,b.email,c.title,c.homepage,c.location,c.address,c.chavesms from coupon a,user b, partner c where a.partner_id = c.id and a.user_id = b.id and a.order_id = ".$order['id']." and a.team_id = ".$order['team_id'];
		$rs = mysql_query($sql);
		
		Util::log($order['id']. " - Encontrado (".mysql_num_rows($rs).") oferta(s)");
		   
		$achou = false;
		while($row = mysql_fetch_object($rs)){
			$achou = true;
			$numcupom 	= $row->id;
			$senha 		= $row->secret; 
			$pedido  	= $row->order_id; 
			$email 		= $row->email; 
			$username  	= $row->username; 
			$nome 		= $row->nome; 
			$parceiro  	= $row->title ; 
			$homepage   = $row->homepage  ; 
			$location   = $row->address  ; 
			$complemento = $row->chavesms; 

			$location =  $location. " ".$complemento;
			
			Util::log($order['id']. " - Numero do cupom: $numcupom - senha: $senha - Utilizador: $nome");
			$url = $INI['system']['wwwprefix']; 
			$url.= $url."/pedidos";
			 
			
		   $parametros = array( 'oferta' => $team['title'],'username' => $username, 'numcupom' => $numcupom, 'senha' => $senha,  'utilizador' => $nome ,'parceiro' => $parceiro, 'location' => $location, 'homepage' => $homepage  );
 
			$request_params = array(
				'http' => array(
					'method'  => 'POST',
					'header'  => implode("\r\n", array(
						'Content-Type: application/x-www-form-urlencoded',
						'Content-Length: ' . strlen(http_build_query($parametros)),
					)),
					'content' => http_build_query($parametros),
				)
			);

			$request  = stream_context_create($request_params);
			$body = file_get_contents($INI["system"]["wwwprefix"]."/templates/envio_cupom.php", false, $request);

	
			if(Util::postemailCliente($body, $INI['system']['sitename'] . " - ".ASSUNTO_ENVIO_CUPOM. ": ".displaySubStringWithStrip(utf8_decode($team['title']),80),$email)){
				Util::log($pedido. " - Email para o cliente com dados do cupom enviado com sucesso(".$email.")...");
				
				$sql2 = "update coupon set envioucupom =1 where id = '".$numcupom."'";
				$rs2 = mysql_query($sql2);
				if($rs2){
					Util::log($pedido. " - campo envioucupom atualizado.");
				 }
				 else{
					Util::log($pedido. " - campo envioucupom nao atualizado. $sql2");
				 }
			}
			else{
				Util::log($pedido. " - Erro no envio do email... (".$email.") .");
			} 
		}
	 
		 if( !$achou){
			Util::log($order['id']. " - Ainda nenhum cupom disponivel para envio:  Minimo: (".$team['min_number'].") - Total comprados (".$team['now_number'].").");
		 
		 }
	}
}
 

?>
