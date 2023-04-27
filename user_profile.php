<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/020020905b.js" crossorigin="anonymous"></script>
    <title>User Profile</title>
    <style>
        body{
            margin: 0;
            padding: 0;
        }
        .grid-container-top{
            /* display:grid;
            grid-template-columns: 0.5fr 5fr 1fr; */
            background: #83746e;
            padding: 0px 20px;
            height: 300px;
            border-radius: 5px 5px;
            border-color: #f1f1f1;
        }
        .grid-item-button{
            text-align: right;
        }
        .grid-item-button #btn{
            border: none;
            background-color: transparent;
            color: white;
            /* padding: 10px 13px; */
            font-size: 15px;
            cursor: pointer;
        }
        .grid-item-button #btn:hover {
            cursor: point;
            background-color: #dfd6d1;
            border-radius: 15px 15px;
        }
        .grid-item, .grid-item-pp{
            padding: 10px;
             
        }
        .grid-item-pp img{
            height: 120px;
            border-radius: 50%;
            display: block;
            margin: 0 auto;
        }
        .username{
            text-align: center;
            margin-top: 10px;
            margin-bottom: 10px;
            color: #f1f1f1;
            font-weight: 500;
        }
        a{
            text-decoration: none;
        }
        .grid-item-nav{        
            place-content: center;
        }
        .grid-container-bottom{
            display: grid;
            grid-template-columns: repeat(4,1fr);
            grid-gap: 40px;
            background-color: #dfd6d1;
            padding: 20px;
        }
        .polaroid{
            background-color: white;
            -webkit-box-shadow: 0 4px 6px rgba(0, 0, 0, .3);
            -moz-box-shadow: 0 4px 6px rgba(0, 0, 0, .3);
            box-shadow: 0 4px 6px rgba(0, 0, 0, .3);
            margin: 30px;
        }
        .pol-img{
            text-align: center;
        }
        .pol-img img{
            height: 250px;
            width: 250px;
            /* display: block;
            margin: 15px auto; */
            margin-top: 15px;

        }
        .pol-img :hover{
            cursor: pointer;
            box-shadow: 0 0 2px 1px rgba(152, 0, 186, 0.13);
        }
        .caption{
            text-align: center;
            font-size: 25px;
            color: #333333;
        }

        .modal {
        display: none;
        position: fixed; 
        z-index: 1;
        padding-top: 100px; 
        left: 0;
        top: 0;
        width: 100%;
        height: 100%; 
        overflow: auto; 
        background-color: rgb(0,0,0); 
        background-color: rgba(0,0,0,0.9); 
        }

        .modal-content {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 700px;
        }

        #caption {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 700px;
        text-align: center;
        color: #ccc;
        padding: 10px 0;
        height: 150px;
        }

        .modal-content, #caption {  
        -webkit-animation-name: zoom;
        -webkit-animation-duration: 0.6s;
        animation-name: zoom;
        animation-duration: 0.6s;
        }

        @-webkit-keyframes zoom {
        from {-webkit-transform:scale(0)} 
        to {-webkit-transform:scale(1)}
        }

        @keyframes zoom {
        from {transform:scale(0)} 
        to {transform:scale(1)}
        }

        .close {
        position: absolute;
        top: 15px;
        right: 35px;
        color: #f1f1f1;
        font-size: 40px;
        font-weight: bold;
        transition: 0.3s;
        }

        .close:hover,
        .close:focus {
        color: #bbb;
        text-decoration: none;
        cursor: pointer;
        }

        @media only screen and (max-width: 700px){
        .modal-content {
            width: 100%;
        }
        }

        @media (max-width: 1455px){
            .pol-img img{
                height: 230px;
                width: 230px;
            }            
        }
        @media (max-width:1300px){
            .grid-container-bottom{
                grid-template-columns: 1fr 1fr 1fr;
            }
            .pol-img img{
                height: 280px;
                width: 280px;
           }
        }
        @media (max-width: 1134px){
            .pol-img img{
                height: 230px;
                width: 230px;
            }            
        }
        @media (max-width: 981px){
            .pol-img img{
                height: 200px;
                width: 200px;
            }            
        }
        @media (max-width:844px){
            .grid-container-bottom{
                grid-template-columns: 1fr 1fr;
            }
            .pol-img img{
                height: 280px;
                width: 280px;
           }
        }
        @media (max-width: 757px){
            .pol-img img{
                height: 230px;
                width: 230px;
           }           
        }
        @media (max-width: 652px){
            .pol-img img{
                height: 200px;
                width: 200px;
           }           
        }
        @media (max-width: 584px){
            .pol-img img{
                height: 160px;
                width: 160px;
           }           
        }
        @media (max-width: 510px){
            .grid-container-bottom{
                grid-template-columns: 1fr;
            }
            .pol-img img{
                height: 300px;
                width: 300px;
            }
        }
        @media (max-width:420px){
            .pol-img img{
                height: 250px;
                width: 250px;                
            }
        }
    </style>
</head>
<body>
    <!-- For the top part of the user profile -->
    <div class="grid-container-top">
        <div class="grid-item-button">
            <button id="btn">
                <i class="fa-solid fa-house"></i>
                <a style="text-decoration: none; color: #fff; font-size: 15px; font-weight: 500;" rel="Home" href="index.php" onclick="history.go(-1)">Home</a>
            </button>
            <button id="btn">
                <i class="fa-solid fa-right-from-bracket"></i>
                <!-- <a style="text-decoration: none; color: #fff; font-size: 15px; font-weight: 500;" rel="Logout" href="" onclick="history.go(-1)">Logout</a> -->
             Logout</button>
        </div>
        <div class="grid-item-pp">
            <img id="profile-picture" src="https://sp-images.summitpost.org/1029634.jpg?auto=format&fit=max&h=1000&ixlib=php-2.1.1&q=35&s=ecb21af14d170fe140aca29c69dc1452" alt="profile-picture">
        </div>
        <div class="grid-item">
            <div class="username">
                <div>
                    <p>Username goes here</p>
                </div>
                <div>
                    <p>Photos uploaded : 0</p>
                </div>
            </div>
        </div>
    </div>
    <!-- For the polaroids content -->
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
                
                echo '
                <div class="polaroid">
                    <div class="pol-img">
                        <img id="myImg1" src="' . $image . '" alt="Mountain">
                        <div id="myModal" class="modal">
                            <span class="close">&times;</span>
                            <img class="modal-content" id="img01">
                            <div id="caption">' . $caption . '</div>
                        </div>
                    </div>
                    <div class="caption">
                        <p>' . $caption . '</p>
                    </div>
                </div>';
            }
            ?>

    </div>

    <script>
        var modal = document.getElementById("myModal");
    
        var img = document.getElementById("myImg");
        var modalImg = document.getElementById("img01");
        var captionText = document.getElementById("caption");
        img.onclick = function(){
          modal.style.display = "block";
          modalImg.src = this.src;
          captionText.innerHTML = this.alt;
        }
        
        var img = document.getElementById("myImg1");
        var modalImg = document.getElementById("img01");
        var captionText = document.getElementById("caption");
        img.onclick = function(){
          modal.style.display = "block";
          modalImg.src = this.src;
          captionText.innerHTML = this.alt;
        }

        var img = document.getElementById("myImg3");
        var modalImg = document.getElementById("img01");
        var captionText = document.getElementById("caption");
        img.onclick = function(){
          modal.style.display = "block";
          modalImg.src = this.src;
          captionText.innerHTML = this.alt;
        }

        var img = document.getElementById("myImg4");
        var modalImg = document.getElementById("img01");
        var captionText = document.getElementById("caption");
        img.onclick = function(){
          modal.style.display = "block";
          modalImg.src = this.src;
          captionText.innerHTML = this.alt;
        }

        var img = document.getElementById("myImg5");
        var modalImg = document.getElementById("img01");
        var captionText = document.getElementById("caption");
        img.onclick = function(){
          modal.style.display = "block";
          modalImg.src = this.src;
          captionText.innerHTML = this.alt;
        }
        var img = document.getElementById("myImg6");
        var modalImg = document.getElementById("img01");
        var captionText = document.getElementById("caption");
        img.onclick = function(){
          modal.style.display = "block";
          modalImg.src = this.src;
          captionText.innerHTML = this.alt;
        }
        var img = document.getElementById("myImg7");
        var modalImg = document.getElementById("img01");
        var captionText = document.getElementById("caption");
        img.onclick = function(){
          modal.style.display = "block";
          modalImg.src = this.src;
          captionText.innerHTML = this.alt;
        }

        var img = document.getElementById("myImg8");
        var modalImg = document.getElementById("img01");
        var captionText = document.getElementById("caption");
        img.onclick = function(){
          modal.style.display = "block";
          modalImg.src = this.src;
          captionText.innerHTML = this.alt;
        }

        var img = document.getElementById("myImg9");
        var modalImg = document.getElementById("img01");
        var captionText = document.getElementById("caption");
        img.onclick = function(){
          modal.style.display = "block";
          modalImg.src = this.src;
          captionText.innerHTML = this.alt;
        }

        var span = document.getElementsByClassName("close")[0];
        
        span.onclick = function() { 
          modal.style.display = "none";
        }
    </script>
</body>
</html>
