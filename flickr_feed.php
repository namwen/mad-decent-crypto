<?php
function randomFlickrImage($tag = "jody highroller"){
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
?>

<img src="<?php echo randomFlickrImage("jody highroller");?>">