<?php
// Include the database configuration file
include("config/dbconfig.php");
?>
<!-- Main container for the contact page -->
<div class="container1">
<!DOCTYPE html>
<html>
<?php
// Include the header file
include 'header.php';
?>
<body>
  <div class="container">
    <!-- Contact form heading and description -->
    <h1>Contact Us</h1>
    <p>Fill out the form below to send us a message.</p>
    <!-- Contact form section -->
    <div class="forming">
      <form action="contact.php" method="POST">
        <!-- Input field for name -->
        <label for="name">Name:</label>
        <input type="text" id="name" name="name"><br><br>
        <!-- Input field for email -->
        <label for="email">Email:</label>
        <input type="email" id="email" name="email"><br><br>
        <!-- Text area for message -->
        <label for="message">Message:</label>
        <textarea id="message" name="message"></textarea><br><br>
        <!-- Submit button to send the message -->
        <input type="submit" name="submit" value="Send Message">
      </form>
    </div>
    <!-- Display error message if set -->
    <?php if (isset($error)) { echo "<p style='color: red;'>$error</p>"; } ?>
    <!-- Display success message if set -->
    <?php if (isset($success)) { echo "<p style='color: green;'>$success</p>"; } ?>
  </div>
  <!-- Include the footer file -->
  <?php include 'footer.php'; ?>
</body>
</html>
</div>
