<?php
include "phpFlickr.php";
$tag1 = "wtf";
$tag2 = "jody highroller";
$tag3 = "sadboyz";
$imgsArray = array(flickr_feed($tag1));

flickr_feed($tag2);
flickr_feed($tag3);


function flickr_feed ( $tag ) {
    $f = new phpFlickr("c329e648c58a21803f2dda3af61bd17e", "222b02b98b03cf25");
    $tags = $f->photos_search(array("tags"=>$tag, "tag_mode"=>"any","per_page"=>"20"));
    return $tags;
    //foreach ($tags['photo'] as $photo) {
    	//$first = " first";
    	//echo '<div><img src="'. $f->buildPhotoURL($photo, 'medium') .'" alt="" /></div>';
     }
    			

?>