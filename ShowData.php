<!-- Beginning of Code -->
  <!-- Lightly Adapted from: https://www.youtube.com/watch?v=wHspfWWn1II How to Fetch Data From Database in PHP And Display HTML Tables &&  -->
   <!-- All code written personally, with sources used for guidance only  -->
<head>
    <!-- Defining Character Set -->
    <meta charset="UTF-8">
    <!--owing Mobile Viewing -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Linking Stylesheet & Bootstrap -->
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> 
    <!-- Page Title -->   
    <title>St Alphonsus Primary School - Show Data</title>
</head>

<?php 
// Importing code from Config File -- Connecting Database to PHP file
require_once('config.php');

// Query for pupils data -- Joins Class Name instead of showing just Class_ID
// Shows pupils from pupil table and links their class name using LEFT JOIN
$querypupil = "SELECT pupils.*, classes.Name as Class_Name FROM pupils LEFT JOIN classes ON pupils.Class_ID = classes.ID";
$resultpupil = mysqli_query($conn, $querypupil);

// Check if the query was successful
if (!$resultpupil) {
    die("Query failed for pupils: " . mysqli_error($conn));
}

// Query for teachers data -- Joins Class Name instead of showing just Class_ID
$queryteacher = "SELECT teachers.*, classes.Name as Class_Name FROM teachers LEFT JOIN classes ON teachers.Class_ID = classes.ID";
$resultteacher = mysqli_query($conn, $queryteacher);

// Check if the query was successful
if (!$resultteacher) {
    die("Query failed for teachers: " . mysqli_error($conn));
}

// Query for teaching assistants data -- Joins Class Name instead of showing just Class_ID
$queryteachingassists = "SELECT teachingassistants.*, classes.Name as Class_Name FROM teachingassistants LEFT JOIN classes ON teachingassistants.Class_ID = classes.ID";
$resultteachingassists = mysqli_query($conn, $queryteachingassists);

// Check if the query was successful
if (!$resultteachingassists) {
    die("Query failed for teaching assistants: " . mysqli_error($conn));
}

// Query for parents data -- Shows columns from parents table
$queryparent = "SELECT * FROM parents";
$resultparent = mysqli_query($conn, $queryparent);

// Check if the query was successful
if (!$resultparent) {
    die("Query failed for parents: " . mysqli_error($conn));
}

// Query for families. Selects columns in the Families Table, Finds the Pupil First and Last Name within Pupil Table, 
// Finds the Parents First and Last Name within Parent Table, Joins the Pupils Table on Pupil_ID from Families Table, 
// Joins Parents Table on Parent_ID from Families Table.

// Technical Terms: JOINS pupil and parent names from their tables, Shows Family links (who belongs to who) using LEFT JOIN on pupils and parents tables
$queryfamily = "SELECT families.*, pupils.First_Name AS Pupil_First_Name, pupils.Last_Name AS Pupil_Last_Name, 
    parents.First_Name AS Parent_First_Name, parents.Last_Name AS Parent_Last_Name 
    FROM families LEFT JOIN pupils ON families.Pupil_ID = pupils.ID LEFT JOIN parents ON families.Parent_ID = parents.ID";
$resultfamily = mysqli_query($conn, $queryfamily);

// Check if the query was successful
if (!$resultfamily) {
    die("Query failed for families: " . mysqli_error($conn));
}



// Query for classes -- Shows columns from classes table
$queryclass = "SELECT * FROM classes";
$resultclass = mysqli_query($conn, $queryclass);

// Check if the query was successful
if (!$resultclass) {
    die("Query failed for classes: " . mysqli_error($conn));
}
?>
<!-- Creating alert for the delete buttons that aren't working yet -- Alert is given in it's place -->
<script>
    function showAlert() {
        alert("This option isn't available yet. Please use the function in the database")
    }
</script>

<body>
    <header>
        <!-- Logo + Heading -->
        <div class="logo">
            <img src="Images/Logo.png" alt="Logo">
            <h1>Welcome to St Alphonsus Primary School</h1>
            <img src="Images/Logo.png" alt="Logo">
        </div>        
    </header>
    <div class="Showdata">
            <!-- Link to log out of the website -->
            <a href="index.php">Logout Here.</a><br><br>
            <!-- Link to go back to Home.php and add new information to the database -->
            <a href="Home.php">Submit Form Data Here.</a>
        </div>
    <!-- Radio Buttons controlling which Form is shown -->
    <div class="classes">
        <!-- Pupil Radio Button - Shows Table & hides others -->
        <input type="radio" id="pupilsdata" name="class">
        <label for="pupilsdata">Pupils Data</label>
        <!-- Teacher Radio Button - Shows Table & hides others -->
        <input type="radio" id="teachersdata" name="class">
        <label for="teachersdata">Teachers Data</label>
        <!-- Teaching Assistant Radio Button - Shows Table & hides others -->
        <input type="radio" id="teachingassistsdata" name="class">
        <label for="teachingassistsdata">Teaching Assistants Data</label>
        <!-- Parents Radio Button - Shows Table & hides others -->
        <input type="radio" id="parentsdata" name="class">
        <label for="parentsdata">Parents Data</label>
        <!-- Families Radio Button - Shows Table & hides others -->
        <input type="radio" id="familiesdata" name="class">
        <label for="familiesdata">Families Data</label>
        <!-- Classes Radio Button - Shows Table & hides others -->
        <input type="radio" id="classesdata" name="class">
        <label for="classesdata">Classes Data</label>
    </div>
    <!-- Bootstrap Container - Flex & Justify Content to the Center-->
    <div class="container d-flex justify-content-center">
        <!-- Bootstrap Table for Pupils - Dark with automatic width for clean look -->
        <table class="table table-bordered table-dark w-auto" id="pupilstable" name="pupilstable">
            <!-- Headers for the table - Column titles are taken directly from the Database -->
            <!-- Each row will show pupil details and actions -->
            <thead>
                <tr>
                    <!-- ID Heading -->
                    <th scope="col">ID</th>
                    <!-- First Name Heading -->
                    <th scope="col">First Name</th>
                    <!-- Last Name Heading -->
                    <th scope="col">Last Name</th>
                    <!-- Address Heading -->
                    <th scope="col">Address</th>
                    <!-- Medical Information Heading -->
                    <th scope="col">Medical Information</th>
                    <!-- Class Name Heading -->
                    <th scope="col">Class Name</th>
                    <!-- Dinner Money Heading -->
                    <th scope="col">Dinner Money</th>
                    <!-- Library Books Heading -->
                    <th scope="col">Library Books</th>
                    <!-- Action button Heading -->
                    <th scope="col">Action</th>
                </tr>
            </thead>
                <!-- Fetch pupil data from database as an array ready to be displayed -->
                <?php
                    // Looping through each row in the database until information from the pupils table has been displayed
                    while($row = mysqli_fetch_assoc($resultpupil))
                    {
                ?>
                <!-- Data that has been fetched is displayed row by row -->
                <tr>
                    <!-- Display IDs in the pupil table on the database per pupil -->
                    <td><?php echo $row['ID']; $pupilid = $row['ID'];?></td>
                    <!-- Display First Names in the pupil table on the database per pupil -->
                    <td><?php echo $row['First_Name']; ?></td>
                    <!-- Display Last Names in the pupil table on the database per pupil-->
                    <td><?php echo $row['Last_Name']; ?></td>
                    <!-- Display Address' in the pupil table on the database per pupil -->
                    <td><?php echo $row['Address']; ?></td>
                    <!-- Display Medical Information in the pupil table on the database per pupil -->
                    <td><?php echo $row['Medical_Information']; ?></td>
                    <!-- Display Class Year in the pupil table on the database per pupil -->
                    <td><?php echo $row['Class_Name']; ?></td>
                    <!-- Display Dinner Money in the pupil table on the database per pupil -->
                    <td>£<?php echo $row['Dinner_Money']; ?></td>
                    <!-- Display Library Books in the pupil table on the database per pupil -->
                    <td><?php echo $row['Library_Books']; ?> Books</td>
                    <td>
                        <!-- Delete button which deletes a pupil from the pupils table in the database -->
                        <a class="btn btn-danger" href='delete.php?id=<?php echo($pupilid)?>'>Delete</a>
                        <!-- Edit button that lets the user change the details of the pupil (located using their ID) -->
                        <a class="btn btn-info" href='edit.php?id=<?php echo($pupilid)?>'>Edit</a>
                    </td>
                </tr>
                <?php
                    }
                ?>
        </table>
        
        <!-- Bootstrap Table for Teachers - Dark with automatic width for clean look -->
        <table class="table table-bordered table-dark w-auto" id="teacherstable" name="teacherstable">
            <!-- Headers for the table - Column titles are taken directly from the Database -->
            <!-- Each row will show teachers details and actions -->
            <thead>
                <tr>
                    <!-- ID Heading -->
                    <th scope="col">ID</th>
                    <!-- First Name Heading -->
                    <th scope="col">First Name</th>
                    <!-- Last Name Heading -->
                    <th scope="col">Last Name</th>
                    <!-- Address Heading -->
                    <th scope="col">Address</th>
                    <!-- Phone Number Heading -->
                    <th scope="col">Phone Number</th>
                    <!-- Salary Heading -->
                    <th scope="col">Salary</th>
                    <!-- Background Check Heading -->
                    <th scope="col">Background Check</th>
                    <!-- Class Name Heading -->
                    <th scope="col">Class Name</th>
                    <!-- Action button Heading -->
                    <th scope="col">Action</th>
                </tr>
            </thead>
                <!-- Fetch teacher data from database as an array ready to be displayed -->
                <?php
                    // Looping through each row from the teachers table to display all the data
                    while($row = mysqli_fetch_assoc($resultteacher))
                    {
                ?>
                <!-- Data that has been fetched is displayed row by row -->
                <tr>
                    <!-- Display IDs in the teacher table on the database per teacher -->
                    <td><?php echo $row['ID']; ?></td>
                    <!-- Display First Names in the teacher table on the database per teacher -->
                    <td><?php echo $row['First_Name']; ?></td>
                    <!-- Display Last Names in the teacher table on the database per teacher -->
                    <td><?php echo $row['Last_Name']; ?></td>
                    <!-- Display Address' in the teacher table on the database per teacher -->
                    <td><?php echo $row['Address']; ?></td>
                    <!-- Display Phone Numbers in the teacher table on the database per teacher -->
                    <td><?php echo $row['Phone_Number']; ?></td>
                    <!-- Display Salaries in the teacher table on the database per teacher -->
                    <td>£<?php echo $row['Salary']; ?> Per Month</td>
                    <!-- Checks Background_Check VALUE. 1=Yes, 0=No -->
                    <td><?php echo ($row['Background_Check'] == 1) ? 'Yes' : 'No'; ?></td>
                    <!-- Display Class Year in the teacher table on the database per teacher -->
                    <td><?php echo $row['Class_Name']; ?></td>
                    <td>
                        <!-- Delete button which currently being created - Alert is displayed when pressed ed by the "showAlert()" function -->
                        <form onsubmit="return showAlert();" style="display:inline;">
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php
                    }
                ?>
        </table>

        <!-- Bootstrap Table for Teaching Assistants - Dark with automatic width for clean look -->
        <table class="table table-bordered table-dark w-auto" id="teachingassiststable" name="teachingassiststable">
            <!-- Headers for the table - Column titles are taken directly from the Database -->
            <!-- Each row will show teaching assistants details and actions -->
            <thead>
                <tr>
                    <!-- ID Heading -->
                    <th scope="col">ID</th>
                    <!-- First Name Heading -->
                    <th scope="col">First Name</th>
                    <!-- Last Name Heading -->
                    <th scope="col">Last Name</th>
                    <!-- Address Heading -->
                    <th scope="col">Address</th>
                    <!-- Phone Number Heading -->
                    <th scope="col">Phone Number</th>
                    <!-- Salary Heading -->
                    <th scope="col">Salary</th>
                    <!-- Background Check Heading -->
                    <th scope="col">Background Check</th>
                    <!-- Class Name Heading -->
                    <th scope="col">Class_Name</th>
                    <!-- Action heading -->
                    <th scope="col">Action</th>
                </tr>
            </thead>
                <!-- Fetch Teaching Assistant data from database -->
                <?php
                    while($row = mysqli_fetch_assoc($resultteachingassists))
                    {
                ?>
                <!-- Data that has been fetched is displayed row by row -->
                <tr>
                    <!-- Display IDs in the teachingassistants table on the database per Teaching Assistant -->
                    <td><?php echo $row['ID']; ?></td>
                    <!-- Display First Names in the teachingassistants table on the database per Teaching Assistant -->
                    <td><?php echo $row['First_Name']; ?></td>
                    <!-- Display Last Names in the teachingassistants table on the database per Teaching Assistant -->
                    <td><?php echo $row['Last_Name']; ?></td>
                    <!-- Display Address' in the teachingassistants table on the database per Teaching Assistant -->
                    <td><?php echo $row['Address']; ?></td>
                    <!-- Display Phone Numbers in the teachingassistants table on the database per Teaching Assistant -->
                    <td><?php echo $row['Phone_Number']; ?></td>
                    <!-- Display Saleries in the teachingassistants table on the database per Teaching Assistant -->
                    <td>£<?php echo $row['Salary']; ?> Per Month</td>
                    <!-- Checks Background_Check VALUE. 1=Yes, 0=No -->
                    <td><?php echo ($row['Background_Check'] == 1) ? 'Yes' : 'No'; ?></td>
                    <!-- Display Class Name in the teachingassistants table on the classes database per Teaching Assistant -->
                    <td><?php echo $row['Class_Name']; ?></td>
                    <td>
                        <!-- Delete button which currently being created - Alert is displayed when pressed using the "showAlert()" function -->
                        <form onsubmit="return showAlert();" style="display:inline;">
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php
                    }
                ?>
        </table>

        <!-- Bootstrap Table for Parents - Dark with automatic width for clean look -->
        <table class="table table-bordered table-dark w-auto" id="parentstable" name="parentstable">
            <!-- Headers for the table - Column titles are taken directly from the Database -->
            <!-- Each row will show parents details and actions -->
            <thead>
                <tr>
                    <!-- ID Heading -->
                    <th scope="col">ID</th>
                    <!-- First Name Heading -->
                    <th scope="col">First Name</th>
                    <!-- Last Name Heading -->
                    <th scope="col">Last Name</th>
                    <!-- Address Heading -->
                    <th scope="col">Address</th>
                    <!-- Email Heading -->
                    <th scope="col">Email</th>
                    <!-- Phone Number Heading -->
                    <th scope="col">Phone Number</th>
                    <!-- Action Heading -->
                    <th scope="col">Action</th>
                </tr>
            </thead>
                <!-- Fetch teaching assistant data from database as an array ready to be displayed -->
                <?php
                    // Looping through each row in the teaching assistants table to show all information
                    while($row = mysqli_fetch_assoc($resultparent))
                    {
                ?>
                <!-- Data that has been fetched is displayed row by row -->
                <tr>
                    <!-- Display IDs in the parent table on the database per parent -->
                    <td><?php echo $row['ID']; ?></td>
                    <!-- Display First Names in the parent table on the database per parent -->
                    <td><?php echo $row['First_Name']; ?></td>
                    <!-- Display Last Names in the parent table on the database per parent -->
                    <td><?php echo $row['Last_Name']; ?></td>
                    <!-- Display Address' in the parent table on the database per parent -->
                    <td><?php echo $row['Address']; ?></td>
                    <!-- Display Emails in the parent table on the database per parent -->
                    <td><?php echo $row['Email']; ?></td>
                    <!-- Display Phone Numbers in the parent table on the database per parent -->
                    <td><?php echo $row['Phone_Number']; ?></td>
                    <td>
                        <!-- Delete button which currently being created - Alert is displayed when pressed using the "showAlert()" function -->
                        <form onsubmit="return showAlert();" style="display:inline;">
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php
                    }
                ?>
        </table>

        <!-- Bootstrap Table for Families - Dark with automatic width for clean look -->
        <table class="table table-bordered table-dark w-auto" id="familiestable" name="familiestable">
            <!-- Headers for the table - Column titles are taken directly from the Database -->
            <!-- Each row will show pupil-parent connection details and actions -->
            <thead>
                <tr>
                    <!-- Pupil First Name Heading -->
                    <th scope="col">Pupil First Name</th>
                    <!-- Pupil Last Name Heading -->
                    <th scope="col">Pupil Last Name</th>
                    <!-- Pupil ID Heading -->
                    <th scope="col">Pupil ID</th>
                    <!-- Parent First Name Heading -->
                    <th scope="col">Parent First Name</th>
                    <!-- Parent First Name Heading -->
                    <th scope="col">Parent Last name</th>
                    <!-- Parent ID Heading -->
                    <th scope="col">Parent ID</th>
                    <!-- Action Heading -->
                    <th scope="col">Action</th>
                </tr>
            </thead>
                <!-- Fetching family information from the database and showing them in rows -->
                <?php
                    // Looping through each row in the families table to show all information
                    while($row = mysqli_fetch_assoc($resultfamily))
                    {
                ?>
                <!-- Display each field from the joined families, pupils, and parents tables -->
                <tr>
                    <!-- Display Pupil_First_Names from joined pupil families table on the database -->
                    <td><?php echo $row['Pupil_First_Name']; ?></td>
                    <!-- Display Pupil_Last_Names from joined pupil families table on the database -->
                    <td><?php echo $row['Pupil_Last_Name']; ?></td>
                    <!-- Display Pupil_IDs in the families table on the database per family -->
                    <td><?php echo $row['Pupil_ID']; ?></td>
                    <!-- Display Parent_First_Names from joined parents families table on the database-->
                    <td><?php echo $row['Parent_First_Name']; ?></td>
                    <!-- Display Parent_Last_Names from joined parents families table on the database -->
                    <td><?php echo $row['Parent_Last_Name']; ?></td>
                    <!-- Display Parent_IDs in the families table on the database per family -->
                    <td><?php echo $row['Parent_ID']; ?></td>
                    <td>
                        <!-- Delete button which currently being created - Alert is displayed when pressed using the "showAlert()" function -->
                        <form onsubmit="return showAlert();" style="display:inline;">
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php
                    }
                ?>
        </table>

        <!-- Bootstrap Table for Classes - Dark with automatic width for clean look -->
        <table class="table table-bordered table-dark w-auto" id="classestable" name="classestable">
            <!-- Headers for the table - Column titles are taken directly from the Database -->
            <!-- Each row will show classes details and actions -->
            <thead>
                <tr>
                    <!-- ID Heading -->
                    <th scope="col">ID</th>
                    <!-- Class Name Heading -->
                    <th scope="col">Class Name</th>
                    <!-- Class Capacity Heading -->
                    <th scope="col">Class Capacity</th>
                    <!-- Action Heading -->
                    <th scope="col">Action</th>
                </tr>
            </thead>
                <!-- Fetch Classes data from database -->
                <?php
                    // Looping through each row in the classes table to show all information
                    while($row = mysqli_fetch_assoc($resultclass))
                    {
                ?>
                <tr>
                    <!-- Display IDs in the classes table on the database per Class -->
                    <td><?php echo $row['ID']; ?></td>
                    <!-- Display Names in the classes table on the database per Class -->
                    <td><?php echo $row['Name']; ?></td>
                    <!-- Display Capacities in the classes table on the database per Class -->
                    <td><?php echo $row['Capacity']; ?></td>
                    <td>
                        <!-- Delete button which currently being created - Alert is displayed when pressed using the "showAlert()" function -->
                        <form onsubmit="return showAlert();" style="display:inline;">
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php
                    }
                ?>
        </table>
    </div>
    <!-- Inserting Javascript -->
    <script type="text/javascript" src="Data.js"></script>
<?php mysqli_close($conn); ?>
</body>
