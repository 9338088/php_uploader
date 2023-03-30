<!DOCTYPE html>
<head>
    <title>File Uploader</title>
</head>
<link type="text/css" rel="stylesheet" media="screen" href="/css/.xd.css" />
<body>
    <div class="noise"></div>
    <div class="overlay"></div>
    <div id="wrapper">
        <h1>File <span class="errorcode">Uploader</span></h1>
	Maximum file size 20MB
        <!-- uploader code start her -->
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <input type="file" name="fileToUpload" id="fileToUpload">
            <select name="folder">
                <?php foreach (glob("uploads/*", GLOB_ONLYDIR) as $dir) {
                    $folderName = basename($dir);
                    echo "<option value=\"$folderName\">$folderName</option>";
                } ?>
            </select>
            <input type="submit" value="Upload" name="submit">
        </form>
        <!-- uploader code end her -->
<!-- message venant des script php -->
        <div id="message">
            <?php if (isset($_GET["message"])) {
                echo $_GET["message"];
            } ?>
        </div>
<!--fin de message venant des script php -->

        <!-- send user to files --> 
        <p class="output">Go to<a href="uploads/">Uploads</a>.</p>

        <!-- form to create folder -->
        <h1>Create Folder.</h1>
        <form action="createfolder.php" method="post">
            <label for="foldername">Folder Name:</label>
            <input type="text" name="foldername" id="foldername">
            <input type="submit" name="createfolder" value="Create Folder">
        </form>
        <!-- end form to create folder --> 

    </div>
    <body>
</html>
