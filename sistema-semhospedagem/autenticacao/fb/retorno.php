<?php 

require("facebook.php");

# Creating the facebook object
$facebook = new Facebook(array(
	'appId'  => '212678745497292',
	'secret' => '0a2e7ce419ad8dce5f9e8cda372ef8b7',
	'cookie' => true
));

$uid = $facebook->getUser();

$session = $facebook->getSession();

print_r($uid);
//print_r($session);

?>