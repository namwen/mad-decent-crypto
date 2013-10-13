<?php

	$pattern = '/^\d{3}-?\d{3}-?\d{4}/';


	 $num = "732-580-7495 This is a message";


    function isValidFormat($messageBody){
    	$pattern = '/^\d{3}-?\d{3}-?\d{4}/';
    	if(	preg_match($pattern, $messageBody, $matches) ){
    		$recipientPhoneNumber = $matches[0];
    		$strippedMessage = preg_replace('/'.$matches[0].'/', '', $messageBody);
    		if(!empty($strippedMessage) && !ctype_space($strippedMessage))
    		{
    			return array('phoneNumber' => $recipientPhoneNumber, 'messageBody'=>$strippedMessage);
    		}
		}
		return false;
    }
    $message = isValidFormat($num);
    if($message){
    	echo $message['phoneNumber']. "</br>";
		echo $message['messageBody']. "</br>";
    }else{
    	echo "not valid";
    }

?>