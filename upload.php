<?php
$username = "admin";
$password = "jbdjbd";

if (isset($_POST["submit"])) {
	// Check if username and password are correct
	if ($_POST["username"] != $username || $_POST["password"] != $password) {
		echo "Invalid username or password.";
		exit();
	}
	$targetDir = "uploads/dirty/";
	$targetFile = $targetDir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$fileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));
	// Check if file already exists
	if (file_exists($targetFile)) {
	    echo "Sorry, file already exists.";
	    $uploadOk = 0;
	}
		// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
	    echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
	    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
	        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
	    } else {
	        echo "Sorry, there was an error uploading your file.";
	    }
	}
}
?>