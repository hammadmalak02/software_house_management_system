<?php
$target_dir = "upload_file.php/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$uploadOk = 1;
$fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Allow only specific file formats
if ($fileType != "jpg" && $fileType != "png" && $fileType != "pdf" && $fileType != "docx") {
    echo "Sorry, only JPG, PNG, PDF, and DOCX files are allowed.";
    $uploadOk = 0;
}

// Check if upload is ok
if ($uploadOk == 1) {
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        echo "The file ". basename($_FILES["file"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
