<!-- Beginning of Code -- !OWN CODE! -->
<?php
// Database Login
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "alphonsus";

// Create connection to database
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection to Database
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
