<?php 
// Importing code from Config File -- Connecting Database to PHP file
require_once('config.php');

// Creating a Function to delete a pupil
function pupildel($PUPILID, $conn){
    // Directly constructing the DELETE query without safety measures
    $pupildelQuery = "DELETE FROM pupils WHERE ID = '$PUPILID'";

    // Execute the query
    if (mysqli_query($conn, $pupildelQuery)) {
        echo "<script>alert('Pupil Deleted Successfully')</script>";
        echo '<script>setTimeout(function() { window.location.href = "ShowData.php"; }, 1000);</script>';
    } else {
        echo "<script>alert('Pupil Deletion Failed')</script>";
        echo '<script>setTimeout(function() { window.location.href = "ShowData.php"; }, 2000);</script>';
    }
}

// Grabbing the pupilid from URL and passing it to the deletion function
if (isset($_GET['id'])) {
    $pupilid = $_GET['id'];
    pupildel($pupilid, $conn);
}

// Closing connection to database
mysqli_close($conn);
?>