<?php
	header("content-type: text/xml");
	echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
	$body = $_REQUEST['Body'];
?>
<Response>
	<Message>
		Your message was received.
	</Message>
</Response>