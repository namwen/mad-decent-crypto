<?php
	require_once('C:/twilio-php-master/Services/Twilio.php');

	$sid = "AC2f9c27f3c7092d24ad88b5377f546bec";
	$token = "9c15613bef48f0085ae7a106fe547b43";
	$client = new Services_Twilio($sid, $token);
	$message = (string)$_POST['message'];
	$receiver = (string)$_POST['number'];
	//$sender = (string)$_POST['your_number'];

	$client->account->messages->sendMessage("+15512266955", $receiver, $message);
	echo "Success!";

?>