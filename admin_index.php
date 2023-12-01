<?php
// Start or resume a session
session_start();

// Regenerate session ID on each page load for enhanced security
session_regenerate_id();

// Check if a user is logged in
if (isset($_SESSION["user_id"])) {
    
    // Include the database connection file
    $pdo = require __DIR__ . "/database.php";
    
    // Prepare the SQL statement
    $sql = "SELECT * FROM [user] WHERE id = :user_id";
    
    // Prepare and execute the SQL query
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':user_id', $_SESSION["user_id"]);
    $stmt->execute();
    
    // Fetch the user data
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Set a secure cookie with the session ID
    $cookieParams = session_get_cookie_params();
    setcookie(session_name(), session_id(), [
        'expires' => time() + 60*60*24, // 1 day for example
        'path' => $cookieParams["path"],
        'domain' => $cookieParams["domain"],
        'secure' => true, // Set to true if using HTTPS
        'httponly' => true, // HTTPOnly for security
        'samesite' => 'Strict' // Strict or Lax depending on your needs
    ]);
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
        <h2><a href="https://portal.azure.com/#@LALALand244.onmicrosoft.com/resource/subscriptions/beb653dd-0fe5-4fdb-97d0-ed809681d8d1/resourceGroups/Charity-Hub-Group/providers/Microsoft.Sql/servers/charity-hub-server/databases/Charity-Hub/queryEditor">Database</a></h2>
      <h1>Donate for a Cause</h1>
    </header>
    <div class="hero">
      <h1>Make a Difference with Your Donation</h1>
      <p>Help us change lives and support our cause.</p>
      <a href="charities.php" class="cta-button">Donate Now</a>
      <a href="charities.php" class="cta-button">Explore Our Charities</a>
      <a href="about.php" class="cta-button">Learn more About Us</a>
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

