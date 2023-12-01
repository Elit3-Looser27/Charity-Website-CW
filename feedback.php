<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Form</title>
    <link rel="stylesheet" type="text/css" href="css/comment.css">
</head>
<body>
<div class="container">
    <header class="header">
        <h1>Feedback Form</h1>
    </header>
    <div class="form-container">
        <h2>We'd Love to Hear Your Feedback</h2>
        <form class="feedback-form" action="process_feedback.php" method="post">
            <div class="form-group">
                <label for="name">Your Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Your Email:</label>
                <input type="text" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="message">Your Feedback:</label>
                <textarea id="message" name="message" required></textarea>
            </div>
            <input type="submit" value="Submit Feedback" class="submit-button">
        </form>
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
