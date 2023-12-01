<?php
// starts a new or resumes an existing session.

session_start();

// statement checks if a session variable user_id is set, which would indicate that a user is logged in

if (isset($_SESSION["user_id"])) {
    
   // uses the require function to include the database connection file, which contains the connection details to the MySQL database.

    $mysqli = require __DIR__ . "/database.php";
    
    // variable is assigned an SQL query that selects all columns from the user table where the id column matches the value stored in the user_id session variable.

    $sql = "SELECT * FROM user
            WHERE id = {$_SESSION["user_id"]}";
    
    // executes the SQL query using the query() method of the $mysqli object.

    $result = $mysqli->query($sql);
    
    // If no user is logged in, the $user variable will be null
    // This creates an array of user data that can be used to display user-specific content or perform other user-specific operations.
       
    $user = $result->fetch_assoc();
}

?>





<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <title>Donation Website</title>
  <?php if (isset($user)): ?>
        
        <p style="text-align: center; font-size:2rem;">Hello <?= htmlspecialchars($user["name"])?></p>
        
        <p class="logout" style="text-align: center; font-size:2rem;"><a href="logout.php">Log out</a></p>
        
    <?php else: ?>
        
        <p class="Prompt" style="text-align: center; font-size:2rem;"><a href="login.php">Log in</a> or <a href="signup.php">sign up</a></p>
        
    <?php endif; ?>

</head>
<body>
  <div class="container">
    <header class="header">
      <h1>Donate for a Cause</h1>
    </header>
    <div class="hero">
      <h1>Make a Difference with Your Donation</h1>
      <p>Help us change lives and support our cause.</p>
      <a href="charities.php" class="cta-button">Donate Now</a>
      <a href="charities.php" class="cta-button">Explore Our Charities</a>
      <a href="about.php" class="cta-button">Learn more About Us</a>
      <a href="feedback.php" class="cta-button">Give us your feedback</a>
    </div>
  </div>
  <footer class="footer">
  <div class="footer-links">
    <a href="index.php">Home</a>
    <a href="charities.php">Charities</a>
    <a href="about.php">About Us</a>
    <a href="donate.php">Donate</a>
    <a href="feedback.php">Give Us Your Feedback</a>
  </div>
  <p>&copy; 2023 Donation Website. All rights reserved.</p>
</footer>

</body>
</html>

