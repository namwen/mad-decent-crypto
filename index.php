<?php
	/* Things we need to do
		
		Receive a message from Twilio
			- Secret Message
			- Recipient Phone number

		Get an image from Tumblr

			- Encrypt the message in the image
			- Post the image to a public tumblr blog

		Send a text to the recipient
			- timestamp for tumblr post
			- key for the encryption


	*/
    require_once('inc/helper-functions.php');
    require_once('Stegger.class.inc.php');

	if($_POST['submit']){

		function getRandomString($length = 10 ) {
		    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		    $string = '';

		    for ($i = 0; $i < $length; $i++){
		        $string .= $characters[mt_rand(0, strlen($characters) - 1)];
		    }

		    return $string;
		}

		$randomKey = getRandomString();
	   	
	   	// This will be an image coming from tumblr.
		$image = $_POST['image_url'];
	    
	    // Create a new Stegger Instance
	    $Stegger = new Stegger();


	    $secretMessage = "This is a secret message that I want to send to someone in secret.";
	    $outputFile = 'tmp/images/file_name';

	    // Place an image into the stegger along with the new random key
	    $Stegger->Put($secretMessage, $image, $randomKey, $outputFile);

	    echo("encrypted image saved\n");	   

	}else{

?>
<form id="imageForm" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
	<label for="image_url">Image Url:</label>
	<input type="text" name="image_url" id="image_url"><br/>
	<input type="submit" name="submit" value="submit">
</form>

<?php }

	require 'twilio-php/Services/Twilio.php';

 
	// set your AccountSid and AuthToken from www.twilio.com/user/account
	$AccountSid = "ACdba7d849fd493447bcf59bfd27351f6f";
	$AuthToken = "3441fc917258730a4664dbf8dc868e26";
	 
	$client = new Services_Twilio($AccountSid, $AuthToken);
	 
	// $sms = $client->account->sms_messages->create(
	//     "848207-2672", // From this number
	//     "732-580-7495", // To this number
	//     "Test message!"
	// );
 
// Display a confirmation message on the screen
echo "Sent message {$sms->sid}";
?>