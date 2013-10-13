$(window).ready(function(){
	var $responsive = $('body');
	if($responsive.width() > 320){
		console.log("big");
		var $container = $("#images");
		$container.masonry({

			itemSelector: '.image'
		});
	}

	var imageID, theMessage;
	$(".image").on('click', function(){
		$(".image").removeClass('selected');
		$(this).toggleClass('selected');

		// get the timestamp
		imageID = $(this).attr('id');
		console.log( imageID );
	});
		var secretMessage;
		$("#decrypt-key").on("input",function(){

			var decryptKey = $(this).val();
			$.ajax({
				type: "POST",
				url: "decrypt-image.php",
				data:{ cryptoKey: decryptKey, imageID: imageID },
				success: handleResponse(secretMessage)
			});

			function handleResponse( data ){
					
					theMessage = data;

						$("#"+imageID+" img").remove();
						// Make the message not suck\

						$("#"+imageID).html("<h1>"+theMessage+"</h1>");
						if( theMessage >= 400){
							$.ajax({
								type:"POST",
								url: "deadImage.php",
								data:{ deadImage: imageID}
							});

						}
					}
				
		});
});
