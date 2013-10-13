<?php
	include('inc/helper-functions.php');

	if( $_POST['deadImage'] ){
		$var = $_POST['deadImage'];
		echo(deleteImage($var));
	}
?>