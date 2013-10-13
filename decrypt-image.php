<?php

	//include stegger, maybe helper functions?
	require_once('inc/helper-functions.php');
    require_once('Stegger.class.inc.php');
    //instantiate stegger
    echo $_POST['cryptoKey'];
    if( !empty($_POST['cryptoKey']) && !empty($_POST['imageID']) ){

        $imgID = $_POST['imageID'];
        $decryptKey = $_POST['cryptoKey'];

        $Image = "tmp/images/".$imgID.'.png';
        $Stegger = new Stegger();
        
       $Stegger->Get($Image, $decryptKey );
    
    }
?>