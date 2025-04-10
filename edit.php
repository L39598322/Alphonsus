
<!-- Beginning of Code -- !OWN CODE! -->
<head>
    <!-- Defining Character Set -->
    <meta charset="UTF-8">
    <!-- Allowing Mobile Viewing -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Linking Stylesheet & Bootstrap -->
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">    
    <!-- Page Title -->
    <title>St Alphonsus Primary School - Edit Page</title>
</head>
<?php
// Importing code from Config File -- Connecting Database to PHP file
require_once('config.php');

// Check if pupilid is set in the URL to load the pupil data for editing
if (isset($_GET['id'])) {
    $pupilid = $_GET['id'];

    // Fetch pupil data for editing
    $pupilquery = "SELECT * FROM pupils WHERE ID = '$pupilid'";
    $pupilresult = mysqli_query($conn, $pupilquery);
    
    // Check if the pupil exists in the database, If the pupil exists then fetch all the pupil's data returns it as an array, each section is then broken up into rows and defined in PHP
    if ($row = mysqli_fetch_assoc($pupilresult)) {
        $First_Name = $row['First_Name'];
        $Last_Name = $row['Last_Name'];
        $Address = $row['Address'];
        $MedicalInfo = $row['Medical_Information'];
        $Class_ID = $row['Class_ID'];
        $Dinner_Money = $row['Dinner_Money'];
        $Library_Books = $row['Library_Books'];

        // Defining Class_Name per Class_ID (1-7, Reception - Year 6)
        if ($Class_ID == 1) {
            $Class_Name = "Reception";
        } elseif ($Class_ID == 2) {
            $Class_Name = "Year 1";
        } elseif ($Class_ID == 3) {
            $Class_Name = "Year 2";
        } elseif ($Class_ID == 4) {
            $Class_Name = "Year 3";
        } elseif ($Class_ID == 5) {
            $Class_Name = "Year 4";
        } elseif ($Class_ID == 6) {
            $Class_Name = "Year 5";
        } elseif ($Class_ID == 7) {
            $Class_Name = "Year 6";
        } 
    } else {
        // If Pupil ID can't be found within the database, returns this error and redirects to the ShowData webpage after 2 seconds.
        echo "<script>alert('Pupil not found!');</script>";
        echo '<script>setTimeout(function() { window.location.href = "ShowData.php"; }, 2000);</script>';
    }
}
?>

<body>
    <header>
        <!-- Logo + Heading -->
        <div class="logo">
            <img src="Images/Logo.png" alt="Logo">
            <h1>Welcome to St Alphonsus Primary School</h1>
            <img src="Images/Logo.png" alt="Logo">
        </div>
    </header>
    <!-- Form filled with pupils information specific to their ID -->
    <div class="container">
        <h2>Edit Pupil Information</h2>
        <!-- Editing form for pupils, identifies which pupil by their ID -->
        <form method="POST" action="edit.php?id=<?php echo $pupilid; ?>">
            <!-- Disabled field so the ID can't be edited but displays the ID of the Pupil -->
            <label for="ID">ID: </label>
            <!-- Fetches the Pupil ID row and displays it in the field as a value for editing -->
            <input type="text" name="ID" class="form-control" value="<?php echo $row['ID']; ?>" disabled>
            <!-- Fetches the First_Name row and displays it in the field as a value for editing -->
            <label for="First_Name">First Name: </label>
            <input type="text" id="First_Name" name="First_Name" class="form-control"  value="<?php echo $First_Name; ?>" required>
            <!-- Fetches the Last_Namerow and displays it in the field as a value for editing -->
            <label for="Last_Name" class="form-label">Last Name: </label>
            <input type="text" id="Last_Name" name="Last_Name" class="form-control"  value="<?php echo $Last_Name; ?>" required>
            <!-- Fetches the Address row and displays it in the field as a value for editing -->
            <label for="Address" class="form-label">Address: </label>
            <input type="text" id="Address" name="Address" class="form-control"  value="<?php echo $Address; ?>" required>
            <!-- Fetches the MedicalInfo row and displays it in the field as a value for editing -->
            <label for="Medical_Information">Medical Information: </label>
            <input type="text" id="Medical_Information" name="Medical_Information" class="form-control"  value="<?php echo $MedicalInfo; ?>" required>
            
                <!-- Pupil Class dropdown selection Reception - Year 6 -->
                <label for="Class_ID">Class:</label>
                <!-- Validation via required field & 'form-control' gives a bootstrap style dropdown menu -->
                <!-- Each Option has a value of what the IDs are inside the Classes Table in the Database e.g. (1 - Reception Year, 2 - Year 1) etc. -->
                <select id="Class_ID" name="Class_ID" class="form-control" required>
                    <option value="" disabled selected>Select a New Class. Current Class: <?php echo $Class_Name ?></option>
                    <option value="1">Reception Year</option>
                    <option value="2">Year 1</option>
                    <option value="3">Year 2</option>
                    <option value="4">Year 3</option>
                    <option value="5">Year 4</option>
                    <option value="6">Year 5</option>
                    <option value="7">Year 6</option>
                </select>
            <!-- Fetches the Dinner_Money row and displays it in the field as a value for editing -->
            <label for="Dinner_Money">Dinner Money: </label>
            <input type="number" id="Dinner_Money" name="Dinner_Money" class="form-control" value="<?php echo $Dinner_Money; ?>" required>
            <!-- Fetches the Library_Books row and displays it in the field as a value for editing -->
            <label for="Library_Books" class="form-label">Library Books: </label>
            <input type="number" id="Library_Books" name="Library_Books" class="form-control" value="<?php echo $Library_Books; ?>" required>
            <br>
            <!-- Update Submission button -->
            <button type="submit" class="btn btn-dark" name="updatesub">Update Information</button>
        </form>
    </div>
</body>

<?php
// If Update Pupils Submission button is clicked with a updated form -- Execute code
if (isset($_POST['updatesub'])) {
    // Get the updated values from the form
    $PupilID = $_GET['id']; 
    $First_Name = $_POST['First_Name'];
    $Last_Name = $_POST['Last_Name'];
    $Address = $_POST['Address'];
    $MedicalInfo = $_POST['Medical_Information'];
    $Class_ID = $_POST['Class_ID'];
    $Dinner_Money = $_POST['Dinner_Money'];
    $Library_Books = $_POST['Library_Books'];

    // Update query to update pupil data
    $updateQuery = "UPDATE pupils SET First_Name = '$First_Name', Last_Name = '$Last_Name', Address = '$Address', Medical_Information = '$MedicalInfo', Class_ID = '$Class_ID', Dinner_Money = '$Dinner_Money', Library_Books = '$Library_Books' WHERE ID = '$PupilID'";

    // Execute Query and send the data to the database 
    if (mysqli_query($conn, $updateQuery)) {
        echo "<script>alert('Pupil data updated successfully');</script>";
        echo '<script>setTimeout(function() { window.location.href = "ShowData.php"; }, 2000);</script>';
    } else {
        // If the query fails to update the database -- Show Alert
        echo "<script>alert('Error updating pupil data');</script>";
        echo '<script>setTimeout(function() { window.location.href = "ShowData.php"; }, 2000);</script>';
    }
}
?>