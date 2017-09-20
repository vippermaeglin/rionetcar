<?php
class ZSubscribe
{
	static public function Create($email, $city_id, $pai) 
	{
		$DateOfRequest = date("Y-m-d H:i:s");
		if (!Utility::ValidEmail($email, true)) return;
		$secret = md5($email . $city_id);
		$table = new Table('subscribe', array(
					'email' => $email,
					'city_id' => $city_id,
					'secret' => $secret,
					'pai' => $pai,
					'data' => $DateOfRequest,
					));
		Table::Delete('subscribe', $email, 'email');
		$table->insert(array('email', 'city_id', 'secret','pai','data'));
	}

	static public function Unsubscribe($subscribe) {
		Table::Delete('subscribe', $subscribe['email'], 'email');
	}
} 
 

