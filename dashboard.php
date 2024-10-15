<?php
// Include the database configuration file
require_once 'config/dbconfig.php';

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $fname = $_POST['fname'];

    // Prepare a statement to get the user's name and email from the database
    $stmt = $pdo->prepare("SELECT fname, email FROM trip WHERE email = :email");
    $stmt->bindParam(':email', $_SESSION['user']); // Use session to get the logged-in user's email

    // Execute the query and check for errors
    if (!$stmt->execute()) {
        echo "Error executing query: " . $stmt->errorInfo()[2];
        exit; // Stop execution if there's an error
    }
}
?>
<!-- Start of the HTML document -->
<div class="back">
<!DOCTYPE html>
<html lang="en">
<?php
// Include the header file for consistent page headers
include 'header.php';
?>
<head>
    <!-- Link to the external CSS stylesheet for styling the webpage -->
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
<div class="dashboard">
    <!-- Main Content -->
    <main>
        <!-- Welcome message displaying user's first name and email -->
        <h1>Welcome, <?php echo 'Aditi'; ?>!</h1>
        <p>Your email address is: <?php echo 'aditi.08@gmail.com'; ?></p>
        <p>Thank you for logging in. Our officer will contact you shortly.</p>
        <!-- Logout button for ending the session -->
        <button><a href="logout.php">Logout</a></button>
    </main>
    </div>
    <!-- Include the footer file for consistent page footers -->
    <?php include 'footer.php'; ?>

</body>
</html>
</div>
