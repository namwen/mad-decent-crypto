<?php
    function emptyImageFolder(){
    	$files = glob('tmp/images/*');
		foreach($files as $file){ 
		  if(is_file($file))
		    unlink($file); 
		}
    }
?>