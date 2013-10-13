<!doctype html>
<html>
	<head>
		<title> Mad Decent Crypto</title>
		<link rel="stylesheet" href="assets/styles/main.css" type="text/css" media="all">

	</head>
	<body>
		<div id="main">
			<h2>MAD DECENT CRYPTO</h2>
			<ul id="images">
		<?php
	    	require_once('inc/helper-functions.php');
	    	$imageNames = getAllImageNames();
	    	
			foreach( $imageNames as $image){
				echo '<li id="'.$image.'">';
					echo '<img src="tmp/images/'.$image.'.png">';
					echo '<h4 class="image-title">'.$image.'</h4>';
				echo '</li>';
			}
		?>
			</ul>
		</div>
	</body>
</html>
