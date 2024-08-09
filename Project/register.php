<?php
// Include the database configuration file
include("config/dbconfig.php");
?>
<!-- Start of the main content container -->
<div class="tool">
<html>
<?php
// Include the header file
include 'header.php';
?>
    <head>
        <!-- Link to the external CSS stylesheet for styling the webpage -->
        <link rel="stylesheet" type="text/css" href="css/styles.css">
    </head>
    <body>
        <!-- Image gallery section -->
        <div class="picture">
            <!-- Each image is wrapped in a div with a class 'contain' and includes a label -->
            <div class="contain"><img src="images/Alberta.png" alt="Picture"><br>Alberta</div>
            <div class="contain"><img src="images/British Columbia.png" alt="Picture"><br>British Columbia</div>
            <div class="contain"><img src="images/Canadian Rocky Mountain Park.png" alt="Picture"><br>Canadian Rocky Mountain Park</div>
            <div class="contain"><img src="images/Columbia Icefield.png" alt="Picture"><br>Columbia Icefield</div>
            <div class="contain"><img src="images/Manitoba.png" alt="Picture"><br>Manitoba</div>
            <div class="contain"><img src="images/New Brunswick.png" alt="Picture"><br>New Brunswick</div>
            <div class="contain"><img src="images/Newfoundland and Labrador.png" alt="Picture"><br>Newfoundland and Labrador</div>
            <div class="contain"><img src="images/Northwest Territories.png" alt="Picture"><br>Northwest Territories</div>
            <div class="contain"><img src="images/Nova Scotia.png" alt="Picture"><br>Nova Scotia</div>
            <div class="contain"><img src="images/Nunavut.png" alt="Picture"><br>Nunavut</div>
            <div class="contain"><img src="images/Ontario.png" alt="Picture"><br>Ontario</div>
            <div class="contain"><img src="images/Ottawa Valley.png" alt="Picture"><br>Ottawa Valley</div>
            <div class="contain"><img src="images/Prince Edward Island.png" alt="Picture"><br>Prince Edward Island</div>
            <div class="contain"><img src="images/Quebec.png" alt="Picture"><br>Quebec</div>
            <div class="contain"><img src="images/Saskatchewan.png" alt="Picture"><br>Saskatchewan</div>
            <div class="contain"><img src="images/Yukon.png" alt="Picture"><br>Yukon</div>
        </div>
        
        <!-- Registration form section -->
        <div class="register">
            <h1> Registration Form</h1>
            <div class="red">
                <p> All fields are compulsory to fill** </p>
            </div>
            <form action="register.php" method="POST">
                <!-- Input fields for user registration -->
                <label for="name">First Name:</label>
                <input type="text" id="fname" name="fname"><br><br>
                <label for="name">Last Name:</label>
                <input type="text" id="lname" name="lname"><br><br>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email"><br><br>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password"><br><br>
                <label for="name">Enter the place from above:</label>
                <input type="text" id="pname" name="pname"><br><br>
                <input type="submit" name="submit" value="Register">
                <!-- Logout button -->
                <button><a href="logout.php">Logout</a></button>
            </form>
        </div>
        
        <?php
        // Include the footer file
        include 'footer.php';
        ?>
        
        <?php
        // Check if the form has been submitted
        if (isset($_POST['submit'])) {
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $pname = $_POST['pname'];

            // Validate email input
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "<p>Invalid email address!</p>";
            } else {
                // Prepare and bind parameters for SQL statement
                $stmt = $pdo->prepare("INSERT INTO trip (fname, lname, email, password, pname) VALUES (:fname, :lname, :email, :password, :pname)");
                $stmt->bindParam(':fname', $fname);
                $stmt->bindParam(':lname', $lname);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':password', $password);
                $stmt->bindParam(':pname', $pname);
                try {
                    // Execute the SQL statement
                    $stmt->execute();
                    echo "<p>Registration successful!</p>";
                    // Redirect to the login page after successful registration
                    header('Location: login.php');
                    exit;
                } catch (PDOException $e) {
                    echo "<p>Error registering user: " . $e->getMessage() . "</p>";
                }
            }
        }
        ?>
    </body>
</html>
</div>
