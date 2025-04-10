<!-- Beginning of Code -- 
 Adapted from: https://getbootstrap.com/docs/4.3/components/forms/ Bootstrap Forms,  
 https://www.youtube.com/watch?v=JsEzGAFdmqM - Insert HTML Form to MySQL Database With PHP In Easy Way | PHP for Beginners,
All code written personally, with sources used for guidance only  -->
<head>
    <!-- Defining Character Set -->
    <meta charset="UTF-8">
    <!-- Allowing Mobile Viewing -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Linking Stylesheet & Bootstrap -->
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">    
    <!-- Page Title -->
    <title>St Alphonsus Primary School - Input Forms</title>
</head>
<?php 
// Importing code from Config File -- Connecting Database to PHP file
require_once('config.php');
// Families Table PHP for selectors
    // Creating a Query to grab ID, First_Name and Last_Name from the pupils table (Used in the families form pupils selection menu)
    $pupilQuery = "SELECT ID, First_Name, Last_Name FROM pupils";
    // Executing the Query
    $pupilResult = mysqli_query($conn, $pupilQuery);
    // Fetching Query Results
    $everypupil = $pupilResult -> fetch_all(MYSQLI_ASSOC);
    // Creating a Query to grab ID, First_Name and Last_Name from the parents table (Used in the families form parents selection menu)
    $parentQuery = "SELECT ID, First_Name, Last_Name FROM parents";
    // Executing the Query
    $parentResult = mysqli_query($conn, $parentQuery);
    // Fetching Query Results
    $everyparent = $parentResult -> fetch_all(MYSQLI_ASSOC);
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

    <!-- Linking logout page and Form Result page to view database tables -->
        <div class="Showdata">
            <!-- Link to log out of the website -->
            <a href="index.php">Logout Here.</a><br><br>
            <!-- Link to go to ShowData.php and see all information from the database -->
            <a href="ShowData.php">See Form Results Here.</a>
        </div>
        <!-- Radio Buttons controlling which Form is shown -->
        <div class="classes">
            <!-- Pupil Radio Button - Shows Form & hides others -->
            <input type="radio" id="pupils" name="class">
            <label for="pupils">Pupils</label>
            <!-- Teacher Radio Button - Shows Form & hides others -->
            <input type="radio" id="teachers" name="class">
            <label for="teachers">Teachers</label>
            <!-- Teaching Assistant Radio Button - Shows Form & hides others -->
            <input type="radio" id="teachingassists" name="class">
            <label for="teachingassists">Teaching Assistants</label>
            <!-- Parent Radio Button - Shows Form & hides others-->
            <input type="radio" id="parents" name="class">
            <label for="parents">Parents</label>
            <!-- Family Radio Button - Shows Form & hides others -->
            <input type="radio" id="families" name="class">
            <label for="families">Families</label>
            <!-- Classes Radio button - Shows Form & hides others -->
            <input type="radio" id="classes" name="class">
            <label for="classes">Classes</label>
        </div>
        <br>
        <!-- Bootstrap Container -->
        <div class="container">
            <!-- Pupil Form - Sends data to SendData.php when submitted -->
            <form method="post" action="SendData.php" id="pupilform">
                <!-- Pupil First Name input field -->
                <label for="pupilfname">First Name:</label>
                <!-- Validation via required field & 'form-control' gives a bootstrap style input field -->
                <input type="text" id="pupilfname" name="pupilfname" class="form-control" placeholder="First Name" required><br>

                <!-- Pupil last Name input field -->
                <label for="pupillname">Last Name:</label>
                <!-- Validation via required field & 'form-control' gives a bootstrap style input field -->
                <input type="text" id="pupillname" name="pupillname" class="form-control" placeholder="Last Name" required><br>

                <!-- Pupil Address input field -->
                <label for="pupiladdress">Address:</label>
                <!-- Validation via required field & 'form-control' gives a bootstrap style input field -->
                <input type="text" id="pupiladdress" name="pupiladdress" class="form-control" placeholder="Please enter the Address" required><br>

                <!-- Pupil Medical Information input field -->
                <label for="pupilmedical">Medical Information:</label>
                <!-- Validation via required field & 'form-control' gives a bootstrap style input field -->
                <input type="text" id="pupilmedical" name="pupilmedical" class="form-control" placeholder="Any Medical Information? Type 'None' if non-applicable"><br>

                <!-- Pupil Dinner Money input field -->
                <label for="pupildinnermoney">Dinner Money:</label>
                <!-- Validation via required field & 'form-control' gives a bootstrap style input field -->
                <input type="number" id="pupildinnermoney" name="pupildinnermoney" class="form-control" placeholder="Enter Amount of Dinner Money for the pupil"><br>

                <!-- Pupil Library Books input field -->
                <label for="pupillibrarybooks">Library Books:</label>
                <!-- Validation via required field & 'form-control' gives a bootstrap style input field -->
                <input type="number" id="pupillibrarybooks" name="pupillibrarybooks" class="form-control" placeholder="Enter Amount of Library books the pupil has borrowed"><br>

                <!-- Pupil Class dropdown selection Reception - Year 6 -->
                <label for="pupilclassid">Class:</label>
                <!-- Validation via required field & 'form-control' gives a bootstrap style dropdown menu -->
                <select id="pupilclassid" name="pupilclassid" class="form-control" required>
                    <!-- All values reflect the Class_ID in the database -->
                    <option value="" disabled selected>Select Class</option>
                    <option value="1">Reception Year</option>
                    <option value="2">Year 1</option>
                    <option value="3">Year 2</option>
                    <option value="4">Year 3</option>
                    <option value="5">Year 4</option>
                    <option value="6">Year 5</option>
                    <option value="7">Year 6</option>
                </select><br>

                <!-- Submission button for pupil form -->
                <input class="btn btn-dark" type="submit" value="Submit Form" name="pupilsub">
            </form>
            
            <!-- Teacher Form - Sends data to SendData.php when submitted -->
            <form method="post" action="SendData.php" id="teacherform">
                <!-- Teacher First Name input field -->
                <label for="teacherfname">First Name:</label>
                <!-- Validation via required field & 'form-control' gives a bootstrap style input field -->
                <input type="text" id="teacherfname" name="teacherfname" class="form-control" placeholder="First Name" required><br>
                
                <!-- Teacher Last Name input field -->
                <label for="teacherlname">Last Name:</label>
                <!-- Validation via required field & 'form-control' gives a bootstrap style input field -->
                <input type="text" id="teacherlname" name="teacherlname" class="form-control" placeholder="Last Name" required><br>

                <!-- Teacher Address input field -->
                <label for="teacheraddress">Address:</label>
                <!-- Validation via required field & 'form-control' gives a bootstrap style input field -->
                <input type="text" id="teacheraddress" name="teacheraddress" class="form-control" placeholder="Please enter the Address" required><br>

                <!-- Teacher Phone Number input field -->
                <label for="teacherphonenum">Phone Number:</label>
                <!-- Validation via required field & Adds Maximum 11 numbers for phone number & 'form-control' gives a bootstrap style input field,
                  field rejects non-numerical values: Adapted from https://stackoverflow.com/questions/8282266/how-to-prevent-invalid-characters-from-being-typed-into-input-fields
                  Maximum 11 numbers for phone number: Adapted from https://stackoverflow.com/questions/19611599/html5-phone-number-validation-with-pattern -->
                <input type="tel" id="teacherphonenum" name="teacherphonenum" minlength="11" maxlength="11" pattern="^\d{11}$"  class="form-control" placeholder="Please enter the Phone Number" onkeyup="this.value = this.value.replace(/[^0-9-]/g, '');" required ><br>

                <!-- Teacher Salary input field -->
                <label for="teachersalary">Salary:</label>
                <!-- Validation via required field & 'form-control' gives a bootstrap style input field -->
                <input type="number" id="teachersalary" name="teachersalary" class="form-control" placeholder="Please enter the Salary" required><br>

                <!-- Teacher Background Check checkbox -->
                <label for="teacherbackchecktrue">Background Check:</label>
                <!-- Validation via required field -->
                <input type="checkbox" name="teacherbackchecktrue" required><br><br>

                <!-- Teacher Classes dropdown selection Reception - Year 6 -->
                <label for="teacherclassid">Class:</label>
                <!-- Validation via required field & 'form-control' gives a bootstrap style dropdown menu -->
                <select id="teacherclassid" name="teacherclassid" class="form-control" required>
                    <option value="" disabled selected>Select Class</option>
                    <option value="1">Reception Year</option>
                    <option value="2">Year 1</option>
                    <option value="3">Year 2</option>
                    <option value="4">Year 3</option>
                    <option value="5">Year 4</option>
                    <option value="6">Year 5</option>
                    <option value="7">Year 6</option>
                </select><br>
                <!-- Submission button for the teacher form-->
                <input class="btn btn-dark" type="submit" value="Submit Form" name="teachersub">
            </form>

            <!-- Teaching Assistants Form - Sends data to SendData.php when submitted -->
            <form method="post" action="SendData.php" id="teachingassistform">
                <!-- Teaching Assistants First Name input field -->
                <label for="teachingassistfname">First Name:</label>
                <!-- Validation via required field & 'form-control' gives a bootstrap style input field -->
                <input type="text" id="teachingassistfname" name="teachingassistfname" class="form-control" placeholder="First Name" required><br>

                <!-- Teaching Assistants Last Name input field -->
                <label for="teachingassistlname">Last Name:</label>
                <!-- Validation via required field & 'form-control' gives a bootstrap style input field -->
                <input type="text" id="teachingassistlname" name="teachingassistlname" class="form-control" placeholder="Last Name" required><br>

                <!-- Teaching Assistants Address input field -->
                <label for="teachingassistaddress">Address:</label>
                <!-- Validation via required field & Adds Maximum 11 numbers for phone number & 'form-control' gives a bootstrap style input field -->
                <input type="text" id="teachingassistaddress" name="teachingassistaddress" class="form-control" placeholder="Please enter the Address" required><br>

                <!-- Teaching Assistants Phone Number input field -->
                <label for="teachingassistphonenum">Phone Number:</label>
                <!-- Validation via required field & 'form-control' gives a bootstrap style input field,
                  field rejects non-numerical values: Adapted from https://stackoverflow.com/questions/8282266/how-to-prevent-invalid-characters-from-being-typed-into-input-fields
                  Maximum 11 numbers for phone number: Adapted from https://stackoverflow.com/questions/19611599/html5-phone-number-validation-with-pattern-->
                  <input type="tel" id="teachingassistphonenum" name="teachingassistphonenum" minlength="11" maxlength="11" pattern="^\d{11}$" class="form-control" placeholder="Please enter the Phone Number" onkeyup="this.value = this.value.replace(/[^0-9-]/g, '');" required ><br>
                
                  <!-- Teaching Assistants Salary input field -->
                <label for="teachingassistsalary">Salary:</label>
                <!-- Validation via required field & 'form-control' gives a bootstrap style input field -->
                <input type="number" id="teachingassistsalary" name="teachingassistsalary" class="form-control" placeholder="Please enter the Salary" required><br>

                <!-- Teaching Assistants Background Check checkbox -->
                <label for="teachingassistbackchecktrue">Background Check:</label>
                <!-- Validation via required field -->
                <input type="checkbox" name="teachingassistbackchecktrue" required><br><br>

                <!-- Teaching Assistants Classes dropdown selection Reception - Year 6 -->
                <label for="teachingassistclassid">Class:</label>
                <!-- Validation via required field & 'form-control' gives a bootstrap style dropdown menu -->
                <select id="teachingassistclassid" name="teachingassistclassid" class="form-control" required>
                    <option value="" disabled selected>Select Class</option>
                    <option value="1">Reception Year</option>
                    <option value="2">Year 1</option>
                    <option value="3">Year 2</option>
                    <option value="4">Year 3</option>
                    <option value="5">Year 4</option>
                    <option value="6">Year 5</option>
                    <option value="7">Year 6</option>
                </select><br>
                <!-- Submission Button for teaching assistants form -->
                <input class="btn btn-dark" type="submit" value="Submit Form" name="teachingassistsub">
            </form>

            <!-- Parents Form - Sends data to SendData.php when submitted -->
            <form method="post" action="SendData.php" id="parentform">
                <!-- Parents First Name input field -->
                <label for="parentfname">First Name:</label>
                <!-- Validation via required field & 'form-control' gives a bootstrap style input field -->
                <input type="text" id="parentfname" name="parentfname" class="form-control" placeholder="First Name" required><br>

                <!-- Parents Last Name input field -->
                <label for="parentlname">Last Name:</label>
                <!-- Validation via required field & 'form-control' gives a bootstrap style input field -->
                <input type="text" id="parentlname" name="parentlname" class="form-control" placeholder="Last Name" required><br>

                <!-- Parents Address input field -->
                <label for="parentaddress">Address:</label>
                <!-- Validation via required field & 'form-control' gives a bootstrap style input field -->
                <input type="text" id="parentaddress" name="parentaddress" class="form-control" placeholder="Please enter the Address" required><br>

                <!-- Parents Email input field -->
                <label for="parentemail">Email:</label>
                <!-- Validation via required field & 'form-control' gives a bootstrap style input field -->
                <input type="email" id="parentemail" name="parentemail" class="form-control" placeholder="Please enter the Email" required><br>

                <!-- Parents Phone Number input field -->
                <label for="parentphonenum">Phone Number:</label>
                <!-- Validation via required field & Adds Maximum 11 numbers for phone number & 'form-control' gives a bootstrap style input field,
                field rejects non-numerical values: Adapted from https://stackoverflow.com/questions/8282266/how-to-prevent-invalid-characters-from-being-typed-into-input-fields 
                Maximum 11 numbers for phone number: Adapted from https://stackoverflow.com/questions/19611599/html5-phone-number-validation-with-pattern -->
                <input type="tel" id="parentphonenum" name="parentphonenum" minlength="11" maxlength="11" pattern="^\d{11}$" class="form-control" placeholder="Please enter the Phone Number" onkeyup="this.value = this.value.replace(/[^0-9-]/g, '');" required><br>

                <!-- Submission Button for parents -->
                <input class="btn btn-dark" type="submit" value="Submit Form" name="parentsub">
            </form>

            <!-- Families Form - Sends data to SendData.php when submitted -->
            <form method="post" action="SendData.php" id="familiesform">
                <label for = "familypupilid">Pupil Selector</label>
                <!-- Selection / Dropdown Menu for pupils -->
                <select id="familypupilid" name="familypupilid" class="form-control" required>
                    <option value="" disabled selected>Select Pupil</option>
                    <!-- For each of the pupils stored in the database, it will list them in a dropdown menu -->
                    <?php
                        // Looping through each pupil in the database
                        foreach($everypupil as $row)
                        {
                            ?>
                            <!-- Grabbing the ID, First_Name, and Last_Name attributes from the pupils table in the database -->
                            <option><?php echo($row["ID"]." ".$row["First_Name"]." ".$row["Last_Name"]);?></option>
                        <?php
                        }
                    ?>
                </select><br>
                <label for = "familyparentid">Parent Selector</label>
                <!-- Selection / Dropdown Menu for parents -->
                <select id="familyparentid" name="familyparentid" class="form-control" required>
                    <option value="" disabled selected>Select Parent</option>
                    <!-- For each of the parents stored in the database, it will list them in a dropdown menu -->
                    <?php
                        // Looping through each parent in the database
                        foreach($everyparent as $row)
                        {
                            ?>
                            <!-- Grabbing the ID, First_Name, and Last_Name attributes from the parents table in the database -->
                            <option><?php echo($row["ID"]." ".$row["First_Name"]." ".$row["Last_Name"]);?></option>
                        <?php
                        }
                    ?>
                </select><br>
                <!-- Submission Button to link pupil-parent as a family -->
                <input class="btn btn-dark" type="submit" value="Link Pupil and Parent" name="familysub">
            </form>

            <!-- Classes Form - Sends data to SendData.php when submitted -->
            <form method="post" action="SendData.php" id="classesform">
                <!-- Class Name input field -->
                <label for="classname">Class Name:</label>
                <!-- Validation via required field & 'form-control' gives a bootstrap style input field -->
                <input type="text" id="classname" name="classname" class="form-control" placeholder="Please enter Class Name" required><br>

                <!-- Class Capacity input field -->
                <label for="classcap">Class Capacity:</label>
                <!-- Validation via required field & 'form-control' gives a bootstrap style input field -->
                <input type="number" id="classcap" name="classcap" class="form-control" placeholder="Please enter Class Capacity" required><br>

                <!-- Submission Button for classes -->
                <input class="btn btn-dark" type="submit" value="Submit Form" name="classessub">
            </form>
        </div>
        
        <!-- Linking Javascript -->
        <script type="text/javascript" src="Form.js"></script>
<!-- Closing the Connection between the Database and PHP -->
<?php mysqli_close($conn); ?>

</body>
