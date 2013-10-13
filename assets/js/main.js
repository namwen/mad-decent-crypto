$(window).ready(function(){
	var $container = $("#images");
	$container.masonry({

		itemSelector: '.image'
	});
	var imageID, theMessage;
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
	if( typeof theMessage === 'undefined' ){
		$("#decrypt-key").on("input",function(){
			var decryptKey = $(this).val();
			$.ajax({
				type: "POST",
				url: "decrypt-image.php",
				data:{ cryptoKey: decryptKey, imageID: imageID }
			})
				.done(function( secretMessage ){
					theMessage = secretMessage;
					$("#"+imageID+" img").remove();
					$("#"+imageID).html("<h1>"+theMessage+"</h1>");
				});

		});
	}

});
