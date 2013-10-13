<?php
    
	function getAllImageNames(){
		$allImages = glob("tmp/images/*");
		$imageNameArray = array();
		foreach($allImages as $image ){
			$blowItUp = explode('/', $image);
			$imageName = explode('.', $blowItUp[2]);
			array_push( $imageNameArray, $imageName[0] );
		}
		return $imageNameArray;
	}

    function emptyImageFolder(){
    	$files = glob('tmp/images/*');
		foreach($files as $file){ 
		  if(is_file($file))
		    unlink($file); 
		}
    }

    function deleteImage($deadImage){
    	$file = "tmp/images/$deadImage".".png";
    	unlink($file);
    }

    $tag = "Jody Highroller";
    
	function randomFlickrImage($tag){
		include "inc/phpFlickr.php";
		$f = new phpFlickr("c329e648c58a21803f2dda3af61bd17e", "222b02b98b03cf25");
		
		$tagArray = $f->photos_search(array("tags"=>$tag, "tag_mode"=>"any","per_page"=>"100"));
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