<?php
// Testing Purposes
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "foto";

// Create Connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check for Connection
if(!$conn){
    die("Connection Failed: ".mysqli_connect_error());
}
?>