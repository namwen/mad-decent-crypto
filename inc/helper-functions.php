<?php
    
	function getNames(){
		$imgNameArray = array(glob("tmp/images/*"));
		return ($imgNameArray);
		}
	

    function emptyImageFolder(){
    	$files = glob('tmp/images/*');
		foreach($files as $file){ 
		  if(is_file($file))
		    unlink($file); 
		}
    }

	function randomFlickrImage($tag = "jody highroller"){
		include "inc/phpFlickr.php";
		$f = new phpFlickr("c329e648c58a21803f2dda3af61bd17e", "222b02b98b03cf25");
		
		$tagArray = $f->photos_search(array("tags"=>$tag, "tag_mode"=>"any","per_page"=>"20"));
		$imageUrls = array();
		
		foreach($tagArray['photo'] as $photo){
			array_push( $imageUrls, $f->buildPhotoURL($photo, 'medium') );
		}
		$rand = mt_rand(0, count($imageUrls) -1 );

		return $imageUrls[$rand];
	}
	
	function getRandomString($length = 10 ) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$string = '';
		for ($i = 0; $i < $length; $i++){
			$string .= $characters[mt_rand(0, strlen($characters) - 1)];
		}
		return $string;
	}	


?>