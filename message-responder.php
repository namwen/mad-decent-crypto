<?php
    header("content-type: text/xml");
    echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
    $messageBody = $_REQUEST['Body'];
    
    $messageInfo = isValidFormat($messageBody);

    if($messageInfo){
    	// send the message to the encrypting script
    	include('encrypt-image.php');

	}else{
	?>
		<Response>
		    <Message>Invalid formatting......bitch</Message>
		</Response>
	<?php
	}
    
    // Check if it is valid. iF it is return an array with info.
    function isValidFormat($messageBody){
    	$pattern = '/^\d{3}-?\d{3}-?\d{4}/';
    	if(	preg_match($pattern, $messageBody, $matches) ){
    		$recipientPhoneNumber = $matches[0];
    		$strippedMessage = preg_replace('/'.$matches[0].'/', '', $messageBody);
    		if(!empty($strippedMessage) && !ctype_space($strippedMessage) )
    		{

    			return array('phoneNumber' => $recipientPhoneNumber, 'messageBody'=>$strippedMessage);
    		}
		}
		return false;
    }
?>