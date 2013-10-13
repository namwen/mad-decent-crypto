<?php

	//include stegger, maybe helper functions?
	require_once('inc/helper-functions.php');
    require_once('Stegger.class.inc.php');
    //instantiate stegger

    $imgID = '';

    $Image ="tmp/images/".$imgId.'.png';
   

    $Stegger = new Stegger();
    //decoding
    


            // Then we are decoding
            if($_POST['key']){
           		$Stegger->Get($Image, $_POST['key']);
            	$secretMessage = Get($imageFile, $key = '', $outputPath = '');
            }
            else{
            	echo "Ah ah ah, you didn't say the magic word";
            }

?>