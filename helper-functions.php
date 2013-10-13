<?php
    function emptyImageFolder(){
    	$files = glob('tmp/images/*');
		foreach($files as $file){ 
		  if(is_file($file))
		    unlink($file); 
		}
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