<!-- Beginning of Code -- Source: !OWN CODE! -->
<?php
include_once("config.php");

// Select all records with plain text passwords
$query = "SELECT `Username`, `Password`, `Teacher_ID` FROM `login` WHERE 1";
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {
    $username = $row['Username'];
    $plainPassword = $row['Password']; // Assuming passwords are plain text
    $teacherID = $row['Teacher_ID'];

    // Hash the plain password
    $hashedPassword = password_hash($plainPassword, PASSWORD_DEFAULT);

    // Update the password in the database with the hashed version
    $updateQuery = "UPDATE `login` SET `Password` = '$hashedPassword' WHERE `Teacher_ID` = '$teacherID'";
    mysqli_query($conn, $updateQuery);
}

echo "<script>alert('Passwords updated successfully.')</script>";
?>