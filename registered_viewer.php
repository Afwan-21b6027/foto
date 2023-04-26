<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/020020905b.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="registered_viewer.css">
    <title>Registered Viewer Page</title>
</head>
<body>
    <!-- Popup - Upload Function -->
    <div id="popup-upload">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
            <div class="file-input-div">
                <h2>Upload your Pictures!</h2>
                <input type="file" name="file-upload" id="file-upload-input">
            </div>

            <div class="caption-input-div">
                <h2>Image Name</h2>
                <input type="text" name="caption" id="upload-caption">
            </div>
            
            <div class="submission-input-div">
                <input type="submit" value="Submit" id="submit-btn" class="popup-focused-btn">
                <input type="button" value="Cancel" id="cancel-btn" class="popup-focused-btn">
            </div>
        </form>
    </div>

    <!-- Header -->
    <div id="grid-all-contents">
        <div class="grid-container-top">
            <div class="grid-item-button">
                <button class="btn" id="archive-btn">
                    <i class="fa-solid fa-box-archive"></i>
                    <a style="
                    text-decoration: none; 
                    color: #fff; 
                    font-size: 15px; 
                    font-weight: 500;" 
                    rel="Archive"
                    href="3.Archive_Page.html" onclick="history.go(-1)">Archive</a>
                </button>

                <button class="btn" id="home-btn">
                    <i class="fa-solid fa-house"></i>
                    <a style="
                    text-decoration: none; 
                    color: #fff; 
                    font-size: 15px; 
                    font-weight: 500;" 
                    rel="Home"
                    href="Foto_Main_Page.php" onclick="history.go(-1)">Home</a>
                </button>

                <button class="btn" id="logout-btn">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <!-- <a style="text-decoration: none; color: #fff; font-size: 15px; font-weight: 500;" rel="Logout" href="" onclick="history.go(-1)">Logout</a> -->
                    Logout
                </button>
            </div>
        
            <div class="grid-item-pp">
                <img id="profile-picture"
                    src="https://sp-images.summitpost.org/1029634.jpg?auto=format&fit=max&h=1000&ixlib=php-2.1.1&q=35&s=ecb21af14d170fe140aca29c69dc1452"
                    alt="profile-picture">
            </div>
        
            <div class="grid-item">
                <div class="username">
                    <div>
                        <!-- TODO: Function - From PHP Session, it takes the user's details and place it under name -->
                        <p id="profile-username">USERNAME</p>
                    </div>
        
                    <div>
                        <span>Photos uploaded: </span>
                        <span id="photo-counter">0</span>
                    </div>
                </div>
            </div>
        
            <div class="grid-item-nav">
                <button id="upload-btn" class="navigation-btn">
                    <i class="fa-solid fa-upload"></i> 
                    Upload
                </button>

                <button id="delete-btn" class="navigation-btn">
                    <i class="fa-solid fa-trash"></i> 
                    Delete
                </button>

                <button id="save-btn" class="navigation-btn">
                    <i class="fa-solid fa-bookmark"></i> 
                    Saved
                </button>
            </div>
        
        </div>
        
        <!-- ! Main Contents - Images -->
        <div class="grid-container-bottom">

            <?php
            $images = glob("uploads/*.*"); // Get all files in uploads directory
            $imageData = array(); // Array to store image data
        
            // Loop through each image and get its upload time
            foreach ($images as $image) {
                $imageData[$image] = filemtime($image); // Store image data with file path as key and upload time as value
            }
            
            // Sort the image data array by upload time in descending order
            arsort($imageData);
            foreach ($imageData as $image => $caption) {
                
                // $caption = $_POST["caption"];
                echo '
                <div class="polaroid">
                    <div class="pol-img">
                        <img id="myImg1" src="' . $image . '" alt="Mountain">
                        <div id="myModal" class="modal">
                            <span class="close">&times;</span>
                            <img class="modal-content" id="img01">
                            <div id="caption">'. $caption.'</div>
                        </div>
                    </div>
                    <div class="caption">
                        <p>' . $caption . '</p>
                    </div>
                </div>';
            }
            ?>
        </div>
    </div>
    
    <script src="upload-popup.js"></script>

</body>
</html>

<?php
// ! Form = submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["file-upload"])) {
    $target_dir = "uploads/"; // Directory where files will be uploaded
    $target_file = $target_dir.time().".".strtolower(pathinfo($_FILES["file-upload"]["name"], PATHINFO_EXTENSION));
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
