<?php
    // Start the session
    session_start();

    // Unset the user's session variables
    unset($_SESSION['email']);
    unset($_SESSION['password']);

    // Destroy the session
    session_destroy();

    // Redirect the user to the home page
    header('Location: index.php');
    exit;
?>