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
    <title>St Alphonsus Primary School - Login</title>
</head>

<body>
    <header>
        <!-- Logo + Heading -->
        <div class="logo">
            <img src="Images/Logo.png" alt="Logo">
            <h1>Welcome to St Alphonsus Primary School</h1>
            <img src="Images/Logo.png" alt="Logo">
        </div>
    </header>
    <br>
    <!-- Login Heading -->
    <div class="login-heading" style="text-align: center;">
        <h2>Please Login Below:</h2>
    </div>
    <!-- Bootstrap Container -->
    <div class="container">
        <!-- Once form is complete, post the information from the fields to the SendData webpage -->
        <form method="post" action="SendData.php" id="loginform">
            <!-- Teachers User Name input field (Username for teachers: First Initial and Last name e.g. AGray)-->
            <label for="teachusername">User Name:</label>
            <!-- Validation via required field & 'form-control' gives a bootstrap style input field -->
            <input type="text" id="teachusername" name="teachusername" class="form-control" placeholder="User Name" required><br>
            <!-- Teachers Password input field (Password for all teachers: Alphonsus101) -->
            <label for="teachpassword">Password:</label>
            <!-- Validation via required field & 'form-control' gives a bootstrap style input field -->
            <input type="password" id="teachpassword" name="teachpassword" class="form-control" placeholder="Password" required><br>
            <!-- Login Submission button -->
            <input class="btn btn-dark" type="submit" value="Login" name="loginsub">
        </form>
    </div>
</body>
