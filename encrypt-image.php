<?php
// accept a message

// generate a key
// do the encryption

//save the image to the directory
	// name is the timestamp - with seconds

// send the recipient the key
	// different file?
	require_once('inc/helper-functions.php');
    require_once('Stegger.class.inc.php');
    require_once('twilio-php/Services/Twilio.php');

	$randomKey = getRandomString();
	   	
   	// This will be an image coming from somewhere.
   	$tag = "Diplo based god Jody Highroller"
	$image = randomFlickrImage($tag);
	    
   	// Create a new Stegger Instance
    $Stegger = new Stegger();

	 $secretMessage = $messageInfo['messageBody'];
	
 	$filename = time();
	$outputFile = 'tmp/images/'.$filename;

	// Place an image into the stegger along with the new random key
	$Stegger->Put($secretMessage, $image, $randomKey, $outputFile);

	// Send the message to the recipient with the encryption key and timestamp
	$sid = "AC2f9c27f3c7092d24ad88b5377f546bec";
	$token = "9c15613bef48f0085ae7a106fe547b43";
	$client = new Services_Twilio($sid, $token);
	$message = "Timestamp: %$s Encryption Key: %' 2s ";
	$recipientNumber = $messageInfo['phoneNumber'];

	$client->account->messages->sendMessage("+15512266955", $recipientNumber, sprintf($message, $fileName, $randomKey);

?>