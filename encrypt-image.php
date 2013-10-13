<?php
// accept a message

// generate a key
// do the encryption

//save the image to the directory
	// name is the timestamp - with seconds

// send the recipient the key
	// different file?
	//phpinfo();
	require_once('inc/helper-functions.php');
    require_once('Stegger.class.inc.php');

	function getRandomString($length = 10 ) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$string = '';
		for ($i = 0; $i < $length; $i++){
			$string .= $characters[mt_rand(0, strlen($characters) - 1)];
		}
		return $string;
	}	

	$randomKey = getRandomString();
	   	
   	// This will be an image coming from somewhere.
	$image = "http://hackru.org/images/hackru_logo.png";
	    
   	// Create a new Stegger Instance
    $Stegger = new Stegger();

	$secretMessage = $messageInfo['messageBody'];
	//$secretMessage = "Secret Message";
 	$filename = time();
	$outputFile = 'tmp/images/'.$filename;

	// Place an image into the stegger along with the new random key
	$Stegger->Put($secretMessage, $image, $randomKey, $outputFile);

?>