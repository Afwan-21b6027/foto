<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
</head>
<body>
<!-- The main container that splits into three sections for large screen sizes -->
    <div class="main-grid-container">
    <!-- The navigation bar starts here for large screen sizes -->
        <div class="grid-container-sidenav button">  
            <ul >
                <!-- <li><a href="Mainpage.html">Home</a></li> -->
                <li><a style="text-decoration: none; color: #000;" rel="User Profile" href="user_profile.php">User Profile</a></li>
                <li><a style="text-decoration: none; color: #000;" rel="About Us" href="about_us.html">About Us</a></li>
                <li><a style="text-decoration: none; color: #000;" rel="Logout" href="registration_page.html">Logout</a></li>
            </ul>
            
        </div>
    <!-- The middle part of the webpage. This contains the banner and main content. It will display for all screen sizes -->
        <div class="grid-maincont">
            <div class="grid-container-banner" id="page1">
                <div class="image-banner">
                    <img src="images/Logo.png">
                </div>
                <div id="slideset">
                    <div>
                        <h1>Welcome to Foto Studio</h1>
                    </div>
                    <div>
                        <h1>Web description</h1>
                        <p>This app is a platform designed for users to share their pictures with their friends. Users can make friends on this app and see their daily upload. </p>
                    </div>
                </div>
            </div>
            <div>
                <p></p>
                <h2 style="margin:0; padding-left: 10px;">Featured</h2> 
            </div>
            <p class="space">See the best pictures of your friends!</p>

        <!-- This is for the navigation bar for small screen sizes -->
            <input type="checkbox" name="button" id="nav-button">
            <label for="nav-button" class="press-button"><p style="text-align: center; padding-top: 7px">Navigation</p></label>
            <div class="small-nav-bar">
                <ul >
                    <li><a rel="User Profile" href="user_profile.php">User Profile</a></li>
                    <li><a rel="About Us" href="about_us.html">About US</a></li>
                    <li><a rel="Logout" href="registration_page.html">Logout</a></li>
                </ul>
            </div>
            <hr style="background-color: #595552; height: 1px; border-color: 2px solid#595552; margin-left: 20px; margin-right: 20px;">
        <!-- This is where the polaroids will be uploaded -->
            <div class="grid-container-maincont">

                <?php
                // Set directory path
                $dir = "uploads";

                // Get all files in uploads directory
                $images = glob("$dir/*.*");

                // Array to store image data
                $imageData = array();
            
                // Loop through each image and get its upload time
                foreach ($images as $image) {
                    $imageData[$image] = filemtime($image);
                }
            
                // Sort the image data array by upload time in descending order
                arsort($imageData);

                //  Output HTML for each image
                foreach ($imageData as $image => $caption) {
                    printf('
                        <div class="grid-item">
                        <a href="#" class="enlarge-image">
                            <img src="%s" class="thumbnail">
                            <div style="text-align: center;">
                                <a href="user_profile.html">
                                    <div class="user_profile_info">
                                        <img src="https://www.w3schools.com/howto/img_avatar.png" alt="">User Profile
                                    </div>
                                </a>
                            </div>
                        </div>',
                        $image
                    );
                }
                ?>
                
                </div>
            </div>

        <!-- This is the third section for the our page web information -->
        <div class="grid-container-webinfo" id="page2">
            <div class="grid-container-rows">
                <!-- SEARCH BAR -->
                <form class="form-inline mt-2 mt-md-0">
                    <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                    <div class="search-info">
                        <p>- Use @ to search for users</p>
                        <p>- Use # to search for tags</p>
                    </div>
                </form>
                <!-- TRENDS TAB -->
                <h4 class="panel-heading" style="font-family: 'Times New Roman', Times, serif; font-weight: 1000;">What's trending?</h4>
                <h6 class="panel-heading" style="font-family: 'Times New Roman', Times, serif;"><a href="#">Refresh</a> . <a href="#">View All</a></h6>
                <div class="container-fluid">
                    <div id="carouselTrend" class="carousel slide d-flex align-items-center" data-bs-ride="carousel">
                        <div class="carousel-inner rounded" id="enlarge">
                            <div class="carousel-item active" data-bs-interval="2500">
                                <a href="#" class="image">
                                    <img src="images/Photo by Jacob Colvin.jpg" id="photos" class="img-fluid" alt="photo1">
                                    <p>#Nature</p>
                                </a>
                            </div>
                            <div class="carousel-item" data-bs-interval="2500">
                                <a href="#" class="image">
                                    <img src="images/Photo by Matteo Badini.jpg" id="photos" class="img-fluid" alt="photo2">
                                    <p>#Nature</p>
                                </a>
                            </div>
                            <div class="carousel-item" data-bs-interval="2500">
                                <a href="#" class="image">
                                    <img src="images/Photo by Zetong Li.jpg" id="photos" class="img-fluid" alt="photo3">
                                    <p>#Nature</p>
                                </a>
                            </div>
                        </div>
                    </div> 
                </div>
                
                <!-- NOTIFS -->
                <div class="container-fluid" >
                    <div id="carouselNotifs" class="carousel slide d-flex align-items-center" data-bs-ride="carousel">
                        <div class="carousel-inner rounded d-flex align-items-center">
                            <div class="carousel-item active" id="gap" data-bs-interval="2500">
                                <div id="notifs">Notification 1
                                    <a href="#">
                                        <div class="user_profile_info">                    
                                            <img src="https://www.w3schools.com/howto/img_avatar.png" alt="">
                                            @example has joined
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="carousel-item" data-bs-interval="2500">
                                <div id="notifs">Notification 2
                                    <a href="#">
                                        <div class="user_profile_info">                    
                                            <img src="https://www.w3schools.com/howto/img_avatar.png" alt="">
                                            @example has joined
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="carousel-item" data-bs-interval="2500">
                                <div id="notifs">Notification 3
                                    <a href="#">
                                        <div class="user_profile_info">                    
                                            <img src="https://www.w3schools.com/howto/img_avatar.png" alt="">
                                            @example has joined
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>   
        <!-- bottom nav when small screen size -->
        <!-- <div class="bottom-nav">
            <a href="#page1">Test</a>
            <a href="#page2">Tset</a>
        </div> -->
    </div>
    <script>
    // Get all the anchor tags with class "enlarge-image"
    const imageLinks = document.querySelectorAll('.enlarge-image');

    // Attach an event listener to each anchor tag
    imageLinks.forEach(link => {
        link.addEventListener('click', event => {
            event.preventDefault(); // Prevent the link from navigating to a new page

            // Create a new image element and set its source to the thumbnail's source
            const thumbnail = event.target.closest('.thumbnail');
            const enlargedImage = new Image();
            enlargedImage.src = thumbnail.src;

            // Add a class to the image element to style it
            enlargedImage.classList.add('enlarged-image');

            // Append the image element to the document body
            document.body.appendChild(enlargedImage);

            // Attach an event listener to the image element to remove it when clicked
            enlargedImage.addEventListener('click', event => {
                event.target.remove();
            });
        });
    });
</script>    
</body>
</html>
