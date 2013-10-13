$(window).ready(function(){
	var $container = $("#images");
	$container.masonry({
		columnWidth: 100,
		itemSelector: '.image'
	});
	var imageID;
	$(".image").on('click', function(){
		$(".image").removeClass('selected');
		$(this).toggleClass('selected');

		// get the timestamp
		imageID = $(this).attr('id');
		console.log( imageID );
		// make an ajax request to a script that decrypts the text
		// return the text 
		// if that succeeds, delete the image
	});
	
	$("#decrypt-key").on("input",function(){
		var decryptKey = $(this).val();
		$.ajax({
			type: "POST",
			url: "test.php",
			data:{ cryptoKey: decryptKey }
		})
			.done(function( msg ){
				console.log( msg );
			});

	});

});
