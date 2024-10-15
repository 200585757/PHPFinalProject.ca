<?php
// Include the database configuration file
include("config/dbconfig.php");
?>
<?php
// Check if the login form has been submitted
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare and execute a statement to validate login credentials
    $stmt = $pdo->prepare("SELECT * FROM trip WHERE email = :email AND password = :password");
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->execute();

    try {
        // If credentials are valid, redirect to the dashboard page
        $stmt->execute();
        header('Location: dashboard.php'); // Redirect to dashboard page
        exit;
    } catch (PDOException $e) {
        // Display an error message if registration fails
        echo "<p>Error registering user: " . $e->getMessage() . "</p>";
    }
}
?>
<!-- Start of the login page content -->
<div class="back">
<!DOCTYPE html>
<html lang="en">
<?php
// Include the header file
include 'header.php';
?>
    <head>
        <!-- Link to the external CSS stylesheet for styling the webpage -->
        <link rel="stylesheet" type="text/css" href="css/styles.css">
    </head>
    <body>
        <!-- Login form section -->
        <div class="login-form">
            <h2>Login</h2>
            <!-- Form for user login -->
            <form action="login.php" method="post">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email"><br><br>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password"><br><br>
                <input type="submit" name="login" value="Login">
            </form>
            <!-- Display error message if login fails -->
            <?php if (isset($error)) { echo "<p>$error</p>"; } ?>
        </div>
        <!-- Include the footer file -->
        <?php include 'footer.php'; ?>
    </body>
</html>
</div>
