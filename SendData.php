<!-- Beginning of Code -- Source: !OWN CODE! -->
<?php
// Importing code from Config File -- Connecting Database to PHP file
require_once('config.php');
// If Login Submit button is clicked with a complete form -- Execute code
if (isset($_POST['loginsub'])) {
    $teachusername = $_POST['teachusername'];
    $teachpassword = $_POST['teachpassword'];

    // Query to retrieve the stored hashed password for the given username
    $teachQuery = "SELECT * FROM login WHERE Username = '$teachusername'";
    $teachResult = mysqli_query($conn, $teachQuery);

    if (mysqli_num_rows($teachResult) > 0) {
        // Fetch teachQuery Results
        $userData = mysqli_fetch_assoc($teachResult);
        $storedHashedPassword = $userData['Password'];

        // Comparing Hashed Password from the database for the specific user against the password submitted
        if (password_verify($teachpassword, $storedHashedPassword)) {
            // if Password is correct -- Send Alert and redirect to Home.php after 2 seconds
            echo "<script>alert('Login Successful');</script>";
            echo '<script>setTimeout(function() { window.location.href = "Home.php"; }, 2000);</script>';
        } else {
            // if Password is incorrect -- Send Alert and Refresh the login page after 2 seconds
            echo "<script>alert('Invalid Username or Password');</script>";
            echo '<script>setTimeout(function() { window.location.href = "index.php"; }, 2000);</script>';
        }
    } else {
        // if Username doesn't exist -- Send Alert and Refresh the login page after 2 seconds
        echo "<script>alert('Invalid Username or Password');</script>";
        echo '<script>setTimeout(function() { window.location.href = "index.php"; }, 2000);</script>';
    }
}
// If Pupil Submission button is clicked with a complete form -- Execute code
if (isset($_POST['pupilsub'])) {
    // Processing all Data that has been sent from pupil form
    $pupilfname = $_POST['pupilfname'];
    $pupillname = $_POST['pupillname'];
    $pupiladdress = $_POST['pupiladdress'];
    $pupilmedical = $_POST['pupilmedical'];
    $pupilclassid = $_POST['pupilclassid'];
    $pupildinner = $_POST['pupildinnermoney'];
    $pupillibrary = $_POST['pupillibrarybooks'];

    // Creating a query for checking if Class_ID exists in the classes table
    $classCheckQuery = "SELECT * FROM classes WHERE ID = '$pupilclassid'";
    $classResult = mysqli_query($conn, $classCheckQuery);
    // Creating a query to count how many pupils are currently in the selected class
    $classCheckCapacity = "SELECT COUNT(ID) AS pupilCount FROM pupils WHERE Class_ID = '$pupilclassid'";
    $capacityResult = mysqli_query($conn, $classCheckCapacity);
    // Fetching result of query and storing it as a variable
    $capacityData = mysqli_fetch_assoc($capacityResult);
    $classCheckCapacity = $capacityData['pupilCount'];
    // Checking if the Class_ID exists in the classes table
    if (mysqli_num_rows($classResult) > 0) {
        // Executing query to check if the class has more than 30 pupils, if it does send an alert, if it doesn't then execute the Insert query
        if ($classCheckCapacity >= 30) {
            // Send Alert if class has reached maximum capacity then return to Home.php
            echo "<script>alert('This class has reached its capacity of 30 pupils. Please select a different class.');</script>";
            echo '<script>setTimeout(function() { window.location.href = "Home.php"; }, 2000);</script>';
        } else {
            // Proceed with inserting pupil data into the database's pupil table
            $pupilpost = "INSERT INTO pupils (First_Name, Last_Name, Address, Medical_Information, Class_ID, Dinner_Money, Library_Books) 
                          VALUES ('$pupilfname', '$pupillname', '$pupiladdress', '$pupilmedical', '$pupilclassid', '$pupildinner', '$pupillibrary')";
            // Check if Pupil Data was sent successfully -- Alerts for Success or Failure
            if (mysqli_query($conn, $pupilpost)) {
                echo "<script>alert('Pupil Data Inserted Successfully')</script>";
                echo '<script>setTimeout(function() { window.location.href = "Home.php"; }, 2000);</script>';
            } else {
                echo "<script>alert('Pupil Data Insert Failed... Redirecting')</script>";
                echo '<script>setTimeout(function() { window.location.href = "Home.php"; }, 4500);</script>';
            }
        }
    }
}

// If Family Submission button is clicked with a complete form -- Execute code
if (isset($_POST['familysub'])) {
    // Processing all Data that has been sent from Family form
    $pupil_id = $_POST['familypupilid'];
    $parent_id = $_POST['familyparentid'];

    // Creating a query to count how many parents are linked to a pupil
    $checkParentQuery = "SELECT COUNT(*) AS parent_count FROM families WHERE Pupil_ID = '$pupil_id'";
    $parentResult = mysqli_query($conn, $checkParentQuery);
    // Fetching query result from Database
    $parentData = mysqli_fetch_assoc($parentResult);

    // Checking if the pupil has fewer than 2 parents linked — if yes, then insert into the families table in the database
    if ($parentData['parent_count'] < 2) {
        // Insert Parent first, last name and ID & Pupil first, last name and ID into the families junction table
        $FamilyPost = "INSERT INTO families (Pupil_ID, Parent_ID) VALUES ('$pupil_id', '$parent_id')";
    } else {
        // If there are already two parents linked, show an alert and return to Home.php
        echo "<script>alert('This pupil already has two parents linked. No more parents can be added.')</script>";
        echo '<script>setTimeout(function() { window.location.href = "Home.php"; }, 2000);</script>';
    }
    // Check if Family Data was sent successfully -- Alerts for Success or Failure
    if (mysqli_query($conn, $FamilyPost)) {
        echo "<script>alert('Pupil and Parent Linked Successfully')</script>";
        echo '<script>setTimeout(function() { window.location.href = "Home.php"; }, 2000);</script>';
    } else {
        echo "<script>alert('Failed to Link Pupil and Parent... Redirecting')</script>";
        echo '<script>setTimeout(function() { window.location.href = "Home.php"; }, 4500);</script>';
    }
}

// If Teacher Submission button is clicked with a complete form -- Execute code
if (isset($_POST['teachersub'])) {
    // Processing all Data that has been sent from Teacher form
    $teacherfname = $_POST['teacherfname'];
    $teacherlname = $_POST['teacherlname'];
    $teacheraddress = $_POST['teacheraddress'];
    $teacherphonenum = $_POST['teacherphonenum'];
    $teachersalary = $_POST['teachersalary'];
    // Checking whether Background Check checkbox was ticked or not -- Value of True: 1 or False: 0 and post the result.
    $teacherbackcheck = isset($_POST['teacherbackchecktrue']) ? 1 : 0;
    $teacherclassid = $_POST['teacherclassid'];

    // Creating a query to ensure that the Class_ID exists in the classes table
    $classCheckQuery = "SELECT * FROM classes WHERE ID = '$teacherclassid'";
    $classResult = mysqli_query($conn, $classCheckQuery);
    // Creating a query to ensure that the Class_ID given isn't being used by another teacher
    $teacherCheckQuery ="SELECT * FROM teachers WHERE Class_ID = '$teacherclassid'";
    $teacherCheckResult = mysqli_query($conn, $teacherCheckQuery);
    // Executing the query to see if a teacher already holds the Class ID given, if they do then an alert is sent and returns Home.php 
    if (mysqli_num_rows($teacherCheckResult) > 0) {
        echo "<script>alert('This Class ID is already assigned to another teacher. Please select a different class.');</script>";
        echo '<script>setTimeout(function() { window.location.href = "Home.php"; }, 2000);</script>';
    } else {
        // Executing the query to check if the Class_ID does exist, if it does then execute the Insert query
        if (mysqli_num_rows($classResult) > 0) {
            // Insert First and Last Name, Address, Phone Number, Salary, Background Check result, Class ID into teachers table in the database
            $teacherpost = "INSERT INTO teachers (First_Name, Last_Name, Address, Phone_Number, Salary, Background_Check, Class_ID) 
                            VALUES ('$teacherfname', '$teacherlname', '$teacheraddress', '$teacherphonenum', '$teachersalary', '$teacherbackcheck', '$teacherclassid')";
            // Check if Teacher Data was sent successfully -- Alerts for Success or Failure
            if (mysqli_query($conn, $teacherpost)) {
                echo "<script>alert('Teacher Data Inserted Successfully')</script>";
                echo '<script>setTimeout(function() { window.location.href = "Home.php"; }, 2000);</script>';
            } else {
                echo "<script>alert('Teacher Data Insert Failed')</script>";
                echo '<script>setTimeout(function() { window.location.href = "Home.php"; }, 4500);</script>';
            }
        }
    }
}

// If Teaching Assistants Submission button is clicked with a complete form -- Execute code
if (isset($_POST['teachingassistsub'])) {
    // Processing all Data that has been sent from Teaching Assistants form
    $teachingassistfname = $_POST['teachingassistfname'];
    $teachingassistlname = $_POST['teachingassistlname'];
    $teachingassistaddress = $_POST['teachingassistaddress'];
    $teachingassistphonenum = $_POST['teachingassistphonenum'];
    $teachingassistsalary = $_POST['teachingassistsalary'];
    // Checking whether Background Check checkbox was ticked or not -- Value of True: 1 or False: 0 and post the result.
    $teachingassistbackchecktrue = isset($_POST['teachingassistbackchecktrue']) ? 1 : 0;
    $teachingassistclassid = $_POST['teachingassistclassid'];

    // Creating a query to ensure that the Class_ID exists in the classes table
    $classCheckQuery = "SELECT * FROM classes WHERE ID = '$teachingassistclassid'";
    $classResult = mysqli_query($conn, $classCheckQuery);
    // Creating a query to check if another teaching assistant is already assigned to this Class ID
    $teachingassistCheckQuery ="SELECT * FROM teachingassistants WHERE Class_ID = '$teachingassistclassid'";
    $teachingassistCheckResult = mysqli_query($conn, $teachingassistCheckQuery);
    
    // Executing the query to check if a teaching assistant already holds the Class ID, if they do, an alert is sent and returns Home.php
    if (mysqli_num_rows($teachingassistCheckResult) > 0) {
        echo "<script>alert('This Class ID is already assigned to another teaching assistant. Please select a different class.');</script>";
        echo '<script>setTimeout(function() { window.location.href = "Home.php"; }, 2000);</script>';
    } else {
        // Executing the query to check if the Class_ID does exist, if it does then execute the Insert query
        if (mysqli_num_rows($classResult) > 0) {
            // Insert First and Last Name, Address, Phone Number, Salary, Background Check result, Class ID into teaching assistants table in the database
            $teachingassistpost = "INSERT INTO teachingassistants (First_Name, Last_Name, Address, Phone_Number, Salary, Background_Check, Class_ID) 
                            VALUES ('$teachingassistfname', '$teachingassistlname', '$teachingassistaddress', '$teachingassistphonenum', '$teachingassistsalary', '$teachingassistbackchecktrue', '$teachingassistclassid')";
            // Check if Teacher Data was sent successfully -- Alerts for Success or Failure
            if (mysqli_query($conn, $teachingassistpost)) {
                echo "<script>alert('Teaching Assistants Data Inserted Successfully')</script>";
                echo '<script>setTimeout(function() { window.location.href = "Home.php"; }, 2000);</script>';
            } else {
                echo "<script>alert('Teaching Assistants Data Insert Failed')</script>";
                echo '<script>setTimeout(function() { window.location.href = "Home.php"; }, 4500);</script>';
            }
        }
    }
}

// If Parents Submission button is clicked with a complete form -- Execute code
if (isset($_POST['parentsub'])) {
    // Processing all data that has been sent from Parents form
    $parentfname = $_POST['parentfname'];
    $parentlname = $_POST['parentlname'];
    $parentaddress = $_POST['parentaddress'];
    $parentemail = $_POST['parentemail'];
    $parentphonenum = $_POST['parentphonenum'];

    // Insert First and Last Name, Address, Email, Phone Number into Parents table
    $parentpost = "INSERT INTO parents (First_Name, Last_Name, Address, Email, Phone_Number) 
                    VALUES ('$parentfname', '$parentlname', '$parentaddress', '$parentemail', '$parentphonenum')";

    // Check if Parent Data was sent successfully -- Alerts for Success or Failure
    if (mysqli_query($conn, $parentpost)) {
        echo "<script>alert('Parent Data Inserted Successfully')</script>";
        echo '<script>setTimeout(function() { window.location.href = "Home.php"; }, 2000);</script>';
    } else {
        echo "<script>alert('Parent Data Insert Failed... Redirecting')</script>";
        echo '<script>setTimeout(function() { window.location.href = "Home.php"; }, 4500);</script>';
    }
}

// If Classes Submission button is clicked with a complete form -- Execute code
if (isset($_POST['classessub'])) {
    // Processing all data that has been sent from Classes form
    $classname = $_POST['classname'];
    $classcap  = $_POST['classcap'];

    // Insert Class Name and Class Capacity into Classes table
    $classpost = "INSERT INTO classes (Name, Capacity) VALUES ('$classname', '$classcap')";

    // Check if Class Data was sent successfully -- Alerts for Success or Failure
    if (mysqli_query($conn, $classpost)) {
        echo "<script>alert('Class Data Inserted Successfully')</script>";
        echo '<script>setTimeout(function() { window.location.href = "Home.php"; }, 2000);</script>';
    } else {
        echo "<script>alert('Class Data Insert Failed... Redirecting')</script>";
        echo '<script>setTimeout(function() { window.location.href = "Home.php"; }, 4500);</script>';
    }
}

mysqli_close($conn);
?>
