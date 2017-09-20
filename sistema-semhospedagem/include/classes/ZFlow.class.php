<?php
class ZFlow {
	static public function CreateFromOrder($order) {
		if ( $order['credit'] == 0 ) return 0;

		//update user money;
		$user = Table::Fetch('user', $order['user_id']);
		Table::UpdateCache('user', $order['user_id'], array(
					'money' => array( "money - {$order['credit']}" ),
					));

		$u = array(
				'user_id' => $order['user_id'],
				'money' => $order['credit'],
				'direction' => 'expense',
				'action' => 'buy',
				'detail_id' => $order['team_id'],
				'create_time' => time(),
				);
		$q = DB::Insert('flow', $u);
	}

	static public function CreateFromCoupon($coupon) {
		if ( $coupon['credit'] <= 0 ) return 0;

		//update user money;
		$user = Table::Fetch('user', $coupon['user_id']);
		Table::UpdateCache('user', $coupon['user_id'], array(
					'money' => array( "money + {$coupon['credit']}" ),
					));

		$u = array(
				'user_id' => $coupon['user_id'],
				'money' => $coupon['credit'],
				'direction' => 'income',
				'action' => 'coupon',
				'detail_id' => $coupon['id'],
				'create_time' => time(),
				);
		return DB::Insert('flow', $u);
	}

	static public function CreateFromRefund($order) {
		global $login_user_id;
		if ( $order['state']!='pay' || $order['origin']<=0 ) return 0;

		//update user money;
		$user = Table::Fetch('user', $order['user_id']);
		Table::UpdateCache('user', $order['user_id'], array(
					'money' => array( "money + {$order['origin']}" ),
					));

		//update order
		Table::UpdateCache('order', $order['id'], array('state'=>'unpay'));

		$u = array(
				'user_id' => $order['user_id'],
				'admin_id' => $login_user_id,
				'money' => $order['origin'],
				'direction' => 'income',
				'action' => 'refund',
				'detail_id' => $order['team_id'],
				'create_time' => time(),
				);
		return DB::Insert('flow', $u);
	}

	static public function CreateFromInvite($invite) {
		global $login_user_id,$INI;
		if ( $invite['pay']!='Y' && $INI['system']['invitecredit']<=0 ) return 0;

		$valor = $INI['system']['invitecredit'];
		$valor = str_replace(",",".",$valor );
		//$valor = str_replace(".","",$valor );
		

		//update user money;
		$user = Table::Fetch('user', $invite['user_id']);
		Table::UpdateCache('user', $invite['user_id'], array(
					'money' => array( "money + {$valor}" ),
					));
	
		
		$u = array(
				'user_id' => $invite['user_id'],
				'admin_id' => $login_user_id,
				'money' =>  $valor,
				'direction' => 'income',
				'action' => 'invite',
				'detail_id' => $invite['other_user_id'],
				'create_time' => $invite['buy_time'],
				);
 
		return DB::Insert('flow', $u);

	}

	static public function CreateFromStore($user_id=0, $money=0) {
		global $login_user_id;
		$money = floatval($money);
		if ( $money == 0 || $user_id <= 0)  return;

		//update user money;
		$user = Table::Fetch('user', $user_id);
		Table::UpdateCache('user', $user_id, array(
					'money' => array( "money + {$money}" ),
					));

		/* switch store|withdraw */
		$direction = ($money>0) ? 'income' : 'expense';
		$action = ($money>0) ? 'store' : 'withdraw';
		$money = abs($money);
		/* end swtich */

		$u = array(
				'user_id' => $user_id,
				'admin_id' => $login_user_id,
				'money' => $money,
				'direction' => $direction,
				'action' => $action,
				'detail_id' => 0,
				'create_time' => time(),
				);
		return DB::Insert('flow', $u);
	}

	static public function CreateFromCharge($money,$user_id,$time,$service='alipay'){
		global $option_service;
		if (!$money || !$user_id || !$time) return 0;
		$pay_id = "charge-{$user_id}-{$time}";
		$pay = Table::Fetch('pay', $pay_id);
		if ( $pay ) return 0;
		$order_id = ZOrder::CreateFromCharge($money,$user_id,$time,$service);
		if (!$order_id) return 0;

		//insert pay record
		$pay = array(
			'id' => $pay_id,
			'order_id' => $order_id,
			'bank' => $option_service[$service],
			'currency' => 'CNY',
			'money' => $money,
			'service' => $service,
			'create_time' => $time,
		);
		DB::Insert('pay', $pay);
		//end//

		//update user money;
		$user = Table::Fetch('user', $user_id);
		Table::UpdateCache('user', $user_id, array(
					'money' => array( "money + {$money}" ),
					));

		$u = array(
				'user_id' => $user_id,
				'admin_id' => 0,
				'money' => $money,
				'direction' => 'income',
				'action' => 'charge',
				'detail_id' => $pay_id,
				'create_time' => $time,
				);
		return DB::Insert('flow', $u);
	}

	static public function Explain($record=array()) {
		if (!$record) return null;
		$action = $record['action'];
		if ('buy' == $action) {
			$team = Table::Fetch('team', $record['detail_id']);
			if ($team) {
				return  "compra de oferta - <a href=\"/team.php?id={$team['id']}\">{$team['title']}</a>";
			} else {
				return "compra de oferta - esseitem foi apagado";
			}
		}
		else if ( 'invite' == $action) {
			$user = Table::Fetch('user', $record['user_id']);
			return "comissão de convite - friend{$user['username']}registered and bought";
		}
		else if ( 'store' == $action) {
			return 'troca com crédito';
		}
		else if ( 'withdraw' == $action) {
			return 'retirada de dinheiro';
		}
		else if ( 'coupon' == $action) {
			return "consumo de indicação - cupom de credito de indicação";
		}
		else if ( 'refund' == $action) {
			$team = Table::Fetch('team', $record['detail_id']);
			if ($team) {
				return  "política de reembolso - <a href=\"/team.php?id={$team['id']}\">{$team['title']}</a>";
			} else {
				return "item de restituição - o item foi excluído";
			}
		}
		else if ( 'charge' == $action) {
			return "recarga on-line";
		}
		else if ( 'register' == $action) {
			return "registre-se para obter dinheiro";
		}
	}
}




?>
