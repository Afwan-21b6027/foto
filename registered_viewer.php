<?php
require('db-conn.php');

$table_name = "uploaded_images";
$result = mysqli_query($conn, "SHOW TABLES LIKE '$table_name'");
$tableExists = mysqli_num_rows($result) > 0;

if (!$tableExists) {
    $sql = "CREATE TABLE $table_name (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        file_name VARCHAR(255) NOT NULL,
        caption VARCHAR(255) NOT NULL
    )";

    if (mysqli_query($conn, $sql)) {
        echo "<script> 
            alert('A table was made successfully!'); 
            </script>";
    } else {
        echo "Error creating table: " . mysqli_error($conn);
    }

}
mysqli_close($conn);
?>

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
                <h2>Caption</h2>
                <input type="text" name="caption" id="upload-caption">
            </div>
            
            <div class="submission-input-div">
                <input type="submit" value="Submit" id="submit-btn" class="popup-focused-btn">
                <input type="button" value="Cancel" id="cancel-btn" class="popup-focused-btn">
            </div>
        </form>
    </div>

    <div id="popup-delete">
        
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
                    href="archive_page.html" onclick="history.go(-1)">Archive</a>
                </button>

                <button class="btn" id="home-btn">
                    <i class="fa-solid fa-house"></i>
                    <a style="
                    text-decoration: none; 
                    color: #fff; 
                    font-size: 15px; 
                    font-weight: 500;" 
                    rel="Home"
                    href="index.php" onclick="history.go(-1)">Home</a>
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
        // Establish a database connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // SQL SELECT statement to retrieve caption column data
        $sql = "SELECT file_name,caption FROM uploaded_images";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                $caption23 = $row["caption"];
                echo '
                <div class="polaroid">
                    <div class="pol-img">
                        <img id="myImg1" src="'.$row["file_name"].'" alt="' . $caption23 . '">
                        <div id="myModal" class="modal">
                            <span class="close">&times;</span>
                            <img class="modal-content" id="img01">
                            <div id="caption">'. $caption23 .'</div>
                        </div>
                    </div>
                    <div class="caption">
                        <p>' . $caption23 . '</p>
                    </div>
                </div>';
            }
        } else {
            echo "0 results";
        }

        $conn->close();
            function getUsernameForImage($image) {
                // replace this function with our own implementation that returns the username associated with the given image file
                }
            ?>
        </div>
    </div>
    
    <script src="upload-popup.js"></script>

</body>
</html>

<?php
// ! Form = submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["file-upload"]) ) {
    $target_dir = "uploads/"; // Directory where files will be uploaded
    $target_file = $target_dir.time().".".strtolower(pathinfo($_FILES["file-upload"]["name"], PATHINFO_EXTENSION));
    $upload_ok = true;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // ! File = Image
    $check = getimagesize($_FILES["file-upload"]["tmp_name"]);
    if ($check === false) {
        echo "File is not an image.";
        $upload_ok = false;
    }

    // ! File = Exists
    if (file_exists($target_file)) {
        // echo "File already exists.";
        $upload_ok = false;
    }

    // ! File Size
    if ($_FILES["file-upload"]["size"] > 5000000) { // 5MB
        echo "File size exceeds maximum allowed.";
        $upload_ok = false;
    }

    // ! File Format
    if (!in_array($imageFileType, ["jpg", "jpeg", "png", "gif"])) {
        echo "Only JPG, JPEG, PNG, and GIF files are allowed.";
        $upload_ok = false;
    }

    // ! if(pass){upload}
     if ($upload_ok == true) {
        if (move_uploaded_file($_FILES["file-upload"]["tmp_name"], $target_file)) {
            echo "<script> 
            alert('File uploaded successfully!'); 
            </script>";

            include ('db-conn.php');

            if (isset($_POST['caption'])) {
                $photo_caption = $_POST['caption'];
            } else {
                $photo_caption = "A Photo";
            }

            // Prepare and bind SQL statement
            $stmt = mysqli_prepare($conn, "INSERT INTO uploaded_images (file_name, caption) VALUES (?, ?)");
            mysqli_stmt_bind_param($stmt, "ss",$target_file, $photo_caption);

            // Execute SQL statement
            mysqli_stmt_execute($stmt);

            // Close connection
            mysqli_stmt_close($stmt);
            mysqli_close($conn);

        } else {
            echo "Error uploading file.";
        }
    }
}
?>
