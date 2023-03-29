<?php
// Constants
const ALLOWED_EXTENSIONS = [
    "jpg",
    "jpeg",
    "png",
    "gif",
    "bmp",
    "tif",
    "tiff",
    "ico",
    "svg",
    "webp",
    "doc",
    "docx",
    "ppt",
    "pptx",
    "xls",
    "xlsx",
    "odt",
    "ods",
    "odp",
    "pdf",
    "ppptm",
    "xlsm",
    "txt",
    "zip",
    "rar",
    "7z",
    "xml",
];

// Function to upload file
function uploadFile($targetDirectory, $targetFile)
{
    $fileExtension = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if file already exists
    if (file_exists($targetFile)) {
        http_response_code(409);
        return "File already exists.";
    }

    // Check file extension
    if (!in_array($fileExtension, ALLOWED_EXTENSIONS)) {
        http_response_code(400);
        return "File type not allowed.";
    }

    // Try to upload file
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
        return "The file " .
            basename($_FILES["fileToUpload"]["name"]) .
            " has been uploaded.";
    } else {
        http_response_code(500);
        return "Error uploading file.";
    }
}

// Check if file was uploaded
if (isset($_FILES["fileToUpload"])) {
    // Upload file
    $targetDirectory = "uploads/dirty/";
    $targetFile = $targetDirectory . basename($_FILES["fileToUpload"]["name"]);

    $message = uploadFile($targetDirectory, $targetFile);
    header("Location: index.php?message=" . urlencode($message));
    exit();
} else {
    http_response_code(400);
    $message = "No file uploaded.";
    header("Location: index.php?message=" . urlencode($message));
    exit();
}
?>
