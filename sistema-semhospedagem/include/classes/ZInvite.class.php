<?php
class ZInvite
{
	static public function CreateNewId($other_user_id) {
		$_rid = abs(intval(cookieget('_rid')));
		$other_user_id = abs(intval($other_user_id));
		if ($_rid==0 || $other_user_id==0) return;
		self::CreateFromId($_rid, $other_user_id);
	}
	
	static public function Create($ruser, $newuser) {
		if ($ruser['id'] == $newuser['id']) return;
		cookieset('_rid', null, -1);
		if ($newuser['newbie'] == 'N') return;
		$have = Table::Fetch('invite', $newuser['id'], 'other_user_id');
		cookieset('_rid', null, -1);
		if ( $have ) return false;
		$invite = array(
			'user_id' => $ruser['id'],
			'user_ip' => $ruser['ip'],
			'other_user_id' => $newuser['id'],
			'other_user_ip' => $newuser['ip'],
			'create_time' => time(),
			'data_time' => date("Y-m-d"),
		);
		return DB::Insert('invite', $invite);
	}

	static public function CreateFromId($user_id, $other_user_id) {
		if (!$user_id || !$other_user_id) return;
		if ($user_id == $other_user_id) return;
		$ruser = Table::Fetch('user', $user_id);
		$newuser = Table::Fetch('user', $other_user_id);
		if ( $newuser['newbie'] == 'Y' ) {
			cookieset('_rid', null, -1);
			self::Create($ruser, $newuser);
		}
	}

	static public function CreateFromBuy($other_user_id) {
		$rid = abs(intval(cookieget('_rid')));
		return self::CreateFromId($rid, $other_user_id);
	}

	static public function CheckInvite($order) {
		if ( $order['state'] == 'unpay' ) return;
		$user = Table::Fetch('user', $order['user_id']);
		$team = Table::Fetch('team', $order['team_id']);
		if ( !$user || $user['newbie'] != 'Y' ) return;
		Table::UpdateCache('user', $order['user_id'], array(
			'newbie' => 'N',
		));

		global $INI;
		$invite = Table::Fetch('invite',$order['user_id'],'other_user_id');
		//$invitecredit = abs(intval($team['bonus']));
		$invitecredit = $INI['system']['invitecredit'];
		$invitecredit = str_replace(",",".",$invitecredit );

		/* invitation not recorded or rebate given or cancelled */
		if (!$invite || $invite['credit']>0 || $invite['pay']!='N') {
			return;
		}
		if (time() - $invite['create_time'] > 7*86400) {
			return;
		}
		Table::UpdateCache('invite', $invite['id'], array(
			'credit' => $invitecredit,
			'team_id' => $order['team_id'],
			'buy_time' => time(),
		));

        
		/************************* 
		envia email para o usuário
		****************************/

		$userconvidou 	= $invite["user_id"];
		$userconvidado 	= $invite["other_user_id"];
		$credito 		= $invite["credit"];

		$dadosuser1 	= Table::Fetch('user', $userconvidou);
		$dadosuser2 	= Table::Fetch('user', $userconvidado); 

		$nomeuser1  	= $dadosuser1["realname"];
		$emailuser1  	= $dadosuser1["email"];

		$nomeuser2  	= $dadosuser2["realname"];
		$emailuser2  	= $dadosuser2["email"];

		$message = '

		<img src="'.$INI['system']['wwwprefix'].'/include/logo/logo.jpg" alt="'.utf8_decode($INI['system']['sitename']).'">
		<p></p>
		<p>Você deve entrar na administração para aprovar ou não a comissão do usuário '.$nomeuser1.' ('.$emailuser1.'). Isso porque o seu amigo '.$nomeuser2 .' ('.$emailuser2.') no qual ele convidou para participar do site <b>'.utf8_decode($INI['system']['sitename']).'</b> comprou uma oferta. </p>
		<p><a href="'.$INI['system']['wwwprefix'].'/vipmin/misc/invite.php">Clique aqui</a> para ir para o gerenciador de comissão e indicações de usuários</p>
		<p></p>
		<p><b>Equipe '.utf8_decode($INI['system']['sitename']).'</p>
		<p><a href='.$INI['system']['wwwprefix'].'>'.$INI['system']['wwwprefix'].'</a></p>
		<p>'.$INI['mail']['user'].'</b></p>
		';

		enviar($INI['mail']['user'] ,"[Existe uma comissão de usuário para ser aprovada]", $message);

		return true;
	}
}

 
