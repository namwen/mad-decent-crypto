<!doctype html>
<html>
	<head>
		<title> Mad Decent Crypto</title>
		<link rel="stylesheet" href="assets/styles/main.css" type="text/css" media="all">
		 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		 <script src="assets/js/masonry.pkgd.min.js"></script>
		<script src="assets/js/main.js"></script>
	</head>
	<body>
		<div id="main">
			<h1>MAD DECENT CRYPTO</h1>
			<ul id="images">
		<?php
	    	require_once('inc/helper-functions.php');
	    	$imageNames = getAllImageNames();
	    	
			foreach( $imageNames as $image){
				echo '<li id="'.$image.'" class="image">';
					echo '<img src="tmp/images/'.$image.'.png">';
					echo '<h3 class="image-title">'.$image.'</h3>';
				echo '</li>';
			}
		?>
			</ul>
			<div id="decryption-field">
				<input type="text" name="decrypt-key" id="decrypt-key">
			</div>
		</div>
	</body>
</html>
