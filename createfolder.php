<?php 
// if form is submitted to create folder
if(isset($_POST["createfolder"]) && isset($_POST["foldername"])){
  // check if folder already exists
  if(file_exists("/var/www/html/files/uploads/" . $_POST["foldername"])) {
    $message = "Folder already exists!";
  } else {
    // create folder
    mkdir("/var/www/html/files/uploads/" . $_POST["foldername"], 0777, true); // Creates a folder in this directory named whatever value returned by foldername input
    $message = "Folder created successfully!";
  }
  // Redirect back to index.php with message as URL parameter
  header("Location: index.php?message=" . urlencode($message));
  exit();
}
?>
