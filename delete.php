<?php
// Establish a database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "foto";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if a delete request has been sent
if (isset($_POST['delete_id'])) {
    // Prepare and bind the SQL statement with a placeholder for the ID
    $stmt = $conn->prepare("DELETE FROM uploaded_images WHERE id = ?");
    $stmt->bind_param("i", $id);

    // Set the ID to the value of the delete_id parameter from the request
    $id = $_POST['delete_id'];

    // Execute the prepared statement
    $stmt->execute();

    // Close the prepared statement
    $stmt->close();

    // Redirect the user to the previous page
    header("Location: ".$_SERVER['HTTP_REFERER']);
    exit();
}
?>
