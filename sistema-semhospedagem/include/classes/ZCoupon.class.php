<?php
class ZCoupon
{
	static public function Consume($coupon) {
		if ( !$coupon['consume']=='N' ) return false;
		$u = array(
			'ip' => Utility::GetRemoteIp(),
			'consume_time' => time(),
			'consume' => 'Y',
		);
		Table::UpdateCache('coupon', $coupon['id'], $u);
		ZFlow::CreateFromCoupon($coupon);
		return true;
	}

	static public function CheckOrder($order,$pontos=false) {
		$coupon_array = array('coupon', 'pickup');
		$team = Table::FetchForce('team', $order['team_id']);
		//if (!in_array($team['delivery'], $coupon_array)) return;
		if ( $team['now_number'] >= $team['min_number'] or $pontos=true) {
			Util::log($order["id"]." - CheckOrder now >= min");
			
			//init coupon create;
			$last = ($team['conduser']=='Y') ? 1 : $order['quantity'];
			$offset = max(5, $last);
			if ( $team['now_number'] - $team['min_number'] < $last) {
				$orders = DB::LimitQuery('order', array(
					'condition' => array(
						'team_id' => $order['team_id'],
						'state' => 'pay',
					),
				));
				foreach($orders AS $order) {
					self::Create($order);
				}
			}
			else{
				Util::log($order["id"]." - CheckOrder now < min");
				self::Create($order);
			}
		}
	}

	static public function Create($order) {

		Util::log($order["id"]." - Iniciando criacao do cupom");
		global $INI;

		$sql = "ALTER TABLE  `coupon` ADD  `nome` varchar(250) NULL AFTER `id` ";
		$rs = @mysql_query($sql);

		$team = Table::Fetch('team', $order['team_id']);
		$partner = Table::Fetch('partner', $order['partner_id']);
		$ccon = array('order_id' => $order['id']);
		$count = Table::Count('coupon', $ccon);

		$contador	 = 1;
		$qtde		 = 0;
		
		//Util::log("Total Geral de cupons disponíveis: ".$count);
		Util::log($order["id"]." - Total de cupons na compra: ".$order['quantity']);
		while($count<$order['quantity']) {
              
            if((int)$contador > (int)$qtde){
    
				$sql  = "SELECT * FROM order_amigos where order_id = ".$order['id']." and atualizado is null order by id";
				$rs = mysql_query($sql);
				$row = mysql_fetch_object($rs);
				$qtde = $row->qtde;
				$nome = $row->nome;
				$idamigo = $row->id; 
				$sql  = "UPDATE order_amigos set atualizado=1 where id = $idamigo";
				$rs = mysql_query($sql);
				$contador = 1;
				
				Util::log("Nome amigo: $nome");
				//Util::log(" sql2: $sql");
			
			}
 
			$id = Utility::GenSecret(8, Utility::CHAR_NUM);
			$id = Utility::VerifyCode($id);
			$cv = Table::Fetch('coupon', $id);
			 
			if ($cv) continue;
			 
			$coupon = array(
					'id' => $id,
					'user_id' => $order['user_id'],
					'partner_id' => $team['partner_id'],
					'order_id' => $order['id'],
					'credit' => $team['credit'],
					'team_id' => $order['team_id'],
					'secret' => Utility::GenSecret(6, Utility::CHAR_WORD),
					'expire_time' => $team['expire_time'],
					'create_time' => time(),
					'nome' => $nome,
					);
			DB::Insert('coupon', $coupon);
			if($INI['sms']['user'] != ""){
				sms_coupon($coupon);
			}
			$count = Table::Count('coupon', $ccon);
			$contador++;
		}
	}
}
 


