<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
    <style>
        *{
            padding: 0;
            margin: 0;
        }
        h2{
            font-family: 'Times New Roman', Times, serif;
            font-weight: 1000;
        }
        body{
            background-color: #66666e;
            overflow:hidden;
            height: 100vh;
        }
        .main-grid-container{
            display: grid;
            grid-template-columns: 1fr 5fr 2fr;
            grid-template-rows: 1fr;
            grid-gap: 2px;
            height: 100%;
            padding: 0;
        }
        .grid-container-sidenav{
            padding: 1px;
            /* border: 3px solid black; */
            border-radius: 15px;
            /* background-color: #bdb2a7 ; */
            background-color: #d5d3d5 ;
            height: 100%;
            overflow-y: auto;
        }
        .grid-maincont{
            /* border: 3px solid black; */
            border-radius: 15px;
            background-color: #d5d3d5 ;
            height: 100%;
            overflow-y: scroll;
            /* padding: 15px; */
        }
        .grid-container-webinfo{
            padding: 5px;
            /* border: 3px solid black; */
            border-radius: 15px;
            /* background-color: #bdb2a7 ; */
            background-color: #d5d3d5 ;
            height: 100%;
            overflow: auto;
        }
        ul{
            padding-inline-start: 0px;
        }
        ul li{
            display: flex;
            justify-content: flex-start;
            letter-spacing: 2px;
            font-family: Arial, Helvetica, sans-serif;
            text-decoration: none;
            list-style: none;
            font-size: 25px;
            border: 2px;
            border-radius: 30px;
            margin: 10px;
        }
        ul li a{
            padding: 10px;
        }
        ul li:hover{
            background-color: #a9a9a9 ;
            color: #f7f7f7;
        }
        .grid-container-banner{
            display: grid;
            grid-template-columns: 1fr 3fr;
            grid-gap: 10px;
            padding:10px;
            height: 150px;
            font-family: 'Times New Roman', Times, serif;
        }
        .grid-container-banner h1{
            margin: 0 !important;
            padding: 0 !important;
            line-height: 1em;
            font-weight: 1000;
        }
        .grid-container-banner p{
            line-height: 1em;
        }
        .image-banner img{
            height: 150px;
            border-radius: 10px;
        }
        #slideset {
            position: relative;
            overflow: hidden;
        }
        #slideset > * {
            overflow: hidden;
            position: absolute; 
            top: 100%; 
            left: 0;
            animation: 8s autoplay infinite ease-in-out
        }
        @keyframes autoplay {
            0%{top: 100%}
            4%{top: 0%}
            50%{top: 0%}
            54%{top: -100%}
            100%{top: -100%}
            /* 0% {top: 100%}
            4% {top: 0%}
            33.33% {top: 0%}
            37.33% {top: -100%}
            100% {top: -100%} */
        }
        
        #slideset > *:nth-child(1) {animation-delay: 0s}
        #slideset > *:nth-child(2) {animation-delay: 4s}
        /* #slideset > *:nth-child(3) {animation-delay: 8s} */
        #slideset h1{
            font-size: 60px;
            padding-top: 30px;
        }
        #slideset p{
            width:450px;
            padding-left: 10px;
        }
        a{
            text-decoration: none;
            color: #000;
        }

        /* .slide_img{
            position: absolute;
            width:100%;
            height: 90%;
            z-index: -1;
        }
        .slide_img img{
            width:100%;
            height: 90%;
        }
        #i1, #i2, #i3{
            display: none;
        }
        .nxt{
            right: 0;
            width: 12%;
            height: 90%;
            position: absolute;
            top: 0;
            z-index: 99;
            cursor: pointer;
        } */
        /* .pre{
            left: 0;
        }
        .nxt{
            right: 0;
        } */
        /* #i1:checked ~ #one,
        #i2:checked ~ #two,
        #i3:checked ~ #three{
            z-index: 9;
        } */
        .grid-container-rows{
            border-radius: 15px;
            display: flex;
            /* grid-template-rows: 1fr; */
            flex-direction: column;
        }
        .grid-item-webinfo{
            background-color: #e8dacd;
            /* border: 1px solid black; */
            border-radius: 15px;
            padding: 10px;
            margin: 3px;
        }
        .grid-item-webinfo p{
            font-family: sans-serif;
            font-size: 24px;
        }
        .grid-container-maincont{
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            grid-gap: 15px;
            max-height: 100%;
            margin: 10px;
        }
        .grid-item{
            /* background-color: #e8dacd; */
            background-color: #f7f7f7 ;
            width: 99%;
            height: 260px;
            position: relative;
            overflow: hidden;
            /* box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); */
            -webkit-box-shadow: 0 4px 6px rgba(0, 0, 0, .3);
            -moz-box-shadow: 0 4px 6px rgba(0, 0, 0, .3);
            box-shadow: 0 4px 6px rgba(0, 0, 0, .3);
        }
        .grid-item img{
            display: block;
            margin: 10px auto;
            max-width: 230px;
            height: 200px;
        }
        .grid-item:hover{
            background-color: #a9a9a9;
            cursor: pointer;
            z-index: 9;
            animation: height 0.5s forwards ease;
        }
        @keyframes height{
            0%{height: 250px;}
            50%{height: 280x; }
            100%{height: 300px;overflow: visible;}
        }
        .user_profile_info{
            width: 95%;
            margin-left: 2%;
        }
        .user_profile_info img{
            border-radius: 60%;
            width: 8%;
            height: 8%;
        }
        .space{
            margin:0; 
            padding-left:10px; 
            padding-bottom: 15px;
            font-family: 'Times New Roman', Times, serif;
        }
        .press-button{
            display: none;
        }
        #nav-button{
            display: none;
        }
        .small-nav-bar{
            display: none;
        }
        /* @keyframes sliding {
            0% {opacity: 0.0}
            4% {opacity: 1.0}
            33.33% {opacity: 1.0}
            37.33% {opacity: 0.0}
            100% {opacity: 0.0}
        }
        #slider > *:nth-child(1) {animation-delay: 0s}
        #slider > *:nth-child(2) {animation-delay: 4s}
        #slider > *:nth-child(3) {animation-delay: 8s} */
        @media (max-width:1432px){
            .grid-container-maincont{
                grid-template-columns: 1fr 1fr;
                
            }
        }
        @media (max-width:1025px){
            #slideset h1{
                padding : 15px;
            }
        }
        @media (max-width:900px){
            .main-grid-container{
                display: flex;
                overflow-x: auto;
                scroll-snap-type: x mandatory;
                scroll-behavior: auto;
            }
            .main-grid-container > div{
                scroll-snap-align: start;
                flex-shrink: 0;
                width: 100%;
            }
            .grid-container-maincont{
                grid-template-columns: 1fr 1fr;
                
            }
            .main-grid-container{
                grid-template-columns: 1fr;
                grid-template-rows: 1fr;
                grid-gap: 5px;
            }
            .grid-container-sidenav{
                display: none;
            }
            .grid-container-webinfo{
                display: inline-flex;
            }        
            .space{
                padding-bottom:1px;
            }
            #nav-button{
                display: none;
            }
            .press-button{
                display: inline-block;
                width: 98%;
                height: 3%;
                margin:0 auto 2px;
                cursor: pointer;
            }
            .press-button:hover{
                background-color: #a89e94;
            }
            #nav-button:checked ~ .small-nav-bar{
                display: block;
            }
        }
        @media (max-width: 600px){
            .image-banner img{
                height: 150px;
            }
            .grid-container-banner{
                height: 150px;
            }
            #slideset h1{
                font-size:30px;           
            }
            #slideset p{
                margin:5px auto;
                padding-left: 0;
                font-size: 13px;
                width: 500px;
                height: 100px;
            }
        }
        @media (max-width: 450px){
            .grid-container-maincont{
                grid-template-columns: 1fr;
                grid-template-rows: 1fr 1fr 1fr;
            }
            .main-grid-container{
                grid-template-columns: 1fr;
                grid-template-rows: 1fr;
                grid-gap: 5px;
            }
            .grid-container-sidenav{
                display: none;
            }
            .grid-container-webinfo{
                display: inline-flex;
            }
            .image-banner img{
                height: 100px;
            }
            .grid-container-banner{
                height: 100px;
            }
            #slideset h1{
                font-size: 30px;
                padding: 0;
            } 
            #slideset p{
                margin:5px auto;
                padding-left: 0;
                font-size: 13px;
                width: 295px;
                height: auto;
            }
            /* .bottom-nav{
                display: inline-block;
                position: absolute;
                bottom: 0;
                left: 0;
                right: 0;
                justify-content: space-between;
                align-items: center;
                z-index: 200;

                width: 100%;
                height: 100px;
                background-color: #bdb2a7;
                border-top: 2px solid #a49a90;
            }
            .bottom-nav a{
                margin: 10px 10px;
                padding: 10px 0 0;
                width: 100px; !important
                height: 100px;
                font-family: 'Times New Roman', Times, serif;
                font-weight: 1000;
            } */
        }

        [class*="col"]{
        padding: 1rem;
        background-color: #bdb2a7 ;
        border: 1px solid black;
        }
        .row{
            height: 840px;
        }
        .panel-heading{
            text-align: center;
        }
        .a{
            text-align: center;
        }
        #notifs{
            background-color: #f7f7f7;
            height: 100px;
            /* margin-top: 30px; */
            text-align: center;
            border-radius: 5px;
        }
        #notifs a{
            text-decoration: none;
        }
        /* #notifs a:active{

        } */
        #carouselTrend{
            border: 1px solid black;
            border-radius: 12px;
        }
        #photos{
            border-radius: 12px;
        }
        .user_profile_info{
            width: 95%;
            /* border: 1px solid black;
            background-color: #bdb2a7; */
            margin: 2% 2%;
            /* padding-top: 2%; */
            /* padding-left: 2%; */
        }
        .user_profile_info img{
            border-radius: 50%;
            width: 10%;
            height: 10%;
        }
        /* .img-fluid{
            transition: transform 0.1s ease-in-out;
        }
        .img-fluid:hover{
            border-radius: 12px;    
            transform: scale(1.1);
        } */
        /* .img-fluid:active{
            z-index: 1;
            color: aliceblue;
        } */
        .form-inline:focus-within  .search-info{
            display: block;
        }
        .search-info{
            display: none;
            position: absolute;
            background-color: #f7f7f7;
            width: fit-content;
            z-index: 2;
        }
        #photos{
            border-radius: 0;
            transition: 0.2s;
        }
        #photos:hover{
            transform: scale(1.02);
            z-index: 0;
        }
        #gap{
            margin-top: 30px;
        }
        .carousel-item#gap{
            box-shadow: 0 4px 6px rgba(0, 0, 0, .3);
        }
        .image p{
            margin: 5px;
            text-align: center;
            /* background-color: #e8dacd; */
        }
        .carousel-inner#enlarge{
            transition: 0.2s;
            height: auto;
            z-index: 1;
            /* border: 0; */
        }
        #carouselTrend{
            border: 0;
            box-shadow: 0 4px 6px rgba(0, 0, 0, .3);
            background-color: #f7f7f7;
        }
        .container-fluid{
            font-family: 'Times New Roman', Times, serif;
        }
        /* @media (max-width = 450px){
            .bottom-nav{
                display: none;
            }
        } */
    </style>
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
                    <li><a>User Profile</a></li>
                    <li><a>About US</a></li>
                    <li><a>Logout</a></li>
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
                            <img src="%s">
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
</body>
</html>