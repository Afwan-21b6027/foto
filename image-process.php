<?php
// ! Form = submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["file-upload"])) {
    $target_dir = "uploads/"; // Directory where files will be uploaded
    $target_file = $target_dir.basename($_FILES["file-upload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // ! File = Image
    $check = getimagesize($_FILES["file-upload"]["tmp_name"]);
    if ($check === false) {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // ! File = Exists
    if (file_exists($target_file)) {
        // echo "File already exists.";
        $uploadOk = 0;
    }

    // ! File Size
    if ($_FILES["file-upload"]["size"] > 5000000) { // 5MB
        echo "File size exceeds maximum allowed.";
        $uploadOk = 0;
    }

    // ! File Format
    if (!in_array($imageFileType, ["jpg", "jpeg", "png", "gif"])) {
        echo "Only JPG, JPEG, PNG, and GIF files are allowed.";
        $uploadOk = 0;
    }

    // ! if(pass){upload}
    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["file-upload"]["tmp_name"], $target_file)) {
            echo "<script> 
            alert('File uploaded successfully!'); 
            </script>";
        } else {
            echo "Error uploading file.";
        }
    }
}
?>
