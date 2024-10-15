<?php
// Database connection parameters
$host = 'localhost';    // Hostname of the database server
$dbname = 'test';       // Name of the database
$username = 'root';     // Username to connect to the database
$password = '';         // Password for the database user

try {
    // Create a new PDO instance for connecting to the database
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    // Set the PDO error mode to exception for better error handling
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Set the default fetch mode to associative array
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    // Handle connection failure and display error message
    echo "Connection failed: " . $e->getMessage();
}
?>
