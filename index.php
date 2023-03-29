<!DOCTYPE html>
<head>
    <title>File Uploader</title>
</head>
<link type="text/css" rel="stylesheet" media="screen" href="css/.xd.css" />
<body>
    <div class="noise"></div>
    <div class="overlay"></div>
    <div id="wrapper">
        <h1>File <span class="errorcode">Uploader</span></h1>
	Maximum file size 20MB
        <!-- uploader code start her -->
		<form action="upload.php" method="post" enctype="multipart/form-data">
		<input type="file" name="fileToUpload">
		<input type="submit" name="submit" value="Upload">
	</form>
        <!-- uploader code end her -->
<!-- message venant de upload.php -->
        <div id="message">
            <?php if (isset($_GET["message"])) {
                echo $_GET["message"];
            } ?>
        </div>
<!--fin de message venant de upload.php -->
        <!-- send user to files --> 
        <p class="output">Go to<a href="uploads/">Uploads</a>.</p>
    </div>
    <body>
</html>
