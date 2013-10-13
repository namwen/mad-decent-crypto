<?php

    // This is an example of how to use Stegger to hide data in images, this example is meant
    // to be run through a browser. - Warren Smith

    // This program will let you hide a file and/or file inside an image, for more in depth information
    // about how this works or how to use it differently, please read the documentation provided.

    // If the form was submitted
    if ($_POST['submit']){

        // This is the image we will be hiding data inside
        $Image = '';

        // If we have a URL to an image (any URI supported by fopen wrappers)
        if (strlen($_POST['imageURL'])){

            // Then we should be using that as our image
            $Image = $_POST['imageURL'];
        }

        // If we have an image uploaded
        if (is_uploaded_file($_FILES['imageFile']['tmp_name'])){

            // Then we should use that as our image
            $Image = $_FILES['imageFile'];
        }

        // If we do NOT have an image to encode at this point
        if (!$Image){

            // Then we can't go any further
            exit('<strong>You did not provide an image to encode</strong>');
        }

        // This is all the data we are hiding in the image we have by now
        $SecretData = array();

        // If a secret file was uploaded
        if (is_uploaded_file($_FILES['secretFile']['tmp_name'])){

            // Add the secret file to the secret data array
            array_push($SecretData, $_FILES['secretFile']);
        }

        // If we have a secret message to hide inside the image
        if ($_POST['secretMessage']){

            // Add the secret message to the secret data array
            array_push($SecretData, $_POST['secretMessage']);
        }

        // Require the Stegger class
        require_once('../Stegger.class.inc.php');

        // Instantiate the Stegger object
        $Stegger = new Stegger();

        // If we do not have any data to encode (but have an image)
        if (count($SecretData) < 1){

            // Then we are decoding
            $Stegger->Get($Image, $_POST['key']);

        } else {

            // We must be encoding so we put secret data into the image and encrypt with the optional key
            $Stegger->Put($SecretData, $Image, $_POST['key']);
        }

    } else {

        // Show the main page with the form
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Stegger example application</title>
<style type="text/css">
<!--
body {
    font-family: Arial, Helvetica, sans-serif;
    font-size: 12px;
    font-style: normal;
    color: #000000;
}
-->
</style>
</head>

<body>
<h1>Stegger example application</h1>
<blockquote>
<form name="steggerForm" method="post" action="<?php echo($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
  <p>This application will hide data inside an image or extract hidden data from an image,
     you can either supply the image we are encoding/decoding as a URL or upload an image file.</p>

  <blockquote>
    <strong>Upload an image file:</strong><br />
    <input type="file" name="imageFile" size="40" />
    <h2>OR</h2>
    <strong>Supply a URL to the image:</strong><br />
    <input type="text" name="imageURL" size="40" />
  </blockquote>

  <p>Stegger will encrypt the data before it puts it into the image, this is to insure nobody
     but the indended parties can extract hidden data from an image, before we can encrypt the
     data securely we need a key, this is optional.</p>

  <blockquote>
    <strong>Please provide a key to encrypt/decrypt data:</strong><br />
    <input type="text" name="key" size="40" />
  </blockquote>

  <p>Now we need some data to hide in the image you should have provided above, if you are
     extracting data from an image you can just leave this blank.</p>

  <blockquote>
    <strong>Upload a secret file:</strong><br />
    <input type="file" name="secretFile" size="40" />
    <h2>OR</h2>
    <strong>Type a secret message to hide in the file:</strong><br />
    <textarea name="secretMessage" rows="8" cols="90"></textarea>
  </blockquote>

  <input type="submit" name="submit" value="Submit" /><input type="reset" name="reset" value="Reset" />
</form>
</blockquote>
</body>
</html>
<?php
    }   // End of the page
?>