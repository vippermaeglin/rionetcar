<?php
class ZCard
{
	const ERR_NOCARD = -1;
	const ERR_TEAM = -2;
	const ERR_CREDIT = -3;
	const ERR_EXPIRE = -4;
	const ERR_USED = -5;
	const ERR_ORDER = -6;

	static public function Explain($errno) {
		switch($errno) {
			case self::ERR_NOCARD : return 'cupom não existe';
			case self::ERR_TEAM : return 'essa oferta não aceita cupom';
			case self::ERR_CREDIT : return 'excedeu o valor aceito de cupom';
			case self::ERR_EXPIRE : return 'expirado';
			case self::ERR_USED : return 'cupom usado';
			case self::ERR_ORDER: return 'apenas um cupom por oferta';
		}
		return 'unknown error';
	}

	static public function UseCard($order, $card_id)
	{
		if ($order['card_id']) return self::ERR_ORDER;
		$card = Table::Fetch('card', $card_id);
		if (!$card) return self::ERR_NOCARD;
		if ($card['consume'] == 'Y') return self::ERR_USED;
		$today = strtotime(date('d-m-Y'));
		if ($card['begin_time'] > $today
			|| $card['end_time'] < $today ) return self::ERR_EXPIRE;

		$team = Table::Fetch('team', $order['team_id']);
		if ( $card['partner_id'] > 0
			&& $card['partner_id'] != $team['partner_id'] ) {
			return self::ERR_TEAM;
		}
		if ( $team['card'] < $card['credit'] ) return self::ERR_CREDIT;
		$finalcard = ($card['credit'] > $order['origin'])
			? $order['origin'] : $card['credit'];

		Table::UpdateCache('order', $order['id'], array(
			'card_id' => $card_id,
			'card' => $finalcard,
			'origin' => array( "origin - {$finalcard}" ),
		));
		Table::UpdateCache('card', $card_id, array(
			'consume' => 'Y',
			'team_id' => $team['id'],
			'order_id' => $order['id'],
			'ip' => Utility::GetRemoteIp(),
		));
		return true;
	}

	static public function CardCreate($query)
	{
		$need = $query['quantity'];
		while(true) {
			$id = Utility::GenSecret(16, Utility::CHAR_NUM);
			$card = array(
					'id' => $id,
					'code' => $query['code'],
					'partner_id' => $query['partner_id'],
					'credit' => $query['money'],
					'consume' => 'N',
					'begin_time' => $query['begin_time'],
					'end_time' => $query['end_time'],
					);
			$need -= (DB::Insert('card', $card)) ? 1 : 0;
			if ( $need <= 0 ) return true;
		}

		return true;
	}
}


