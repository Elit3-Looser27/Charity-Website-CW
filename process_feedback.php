<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
     // Sanitize input data
     $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
     $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
     $message = filter_input(INPUT_POST, "message", FILTER_SANITIZE_STRING);
    
    // Database connection details
    $host = "charity-hub-server.database.windows.net";
    $username = "Begad-Anass";
    $password = "Hatem@120503";
    $database = "Charity-Hub";
    
    // Create a database connection
    try {
        $pdo = new PDO("sqlsrv:Server=$host;Database=$database", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Database connection failed: " . $e->getMessage());
    }
    
    // Insert feedback into the "feedback" table
    $sql = "INSERT INTO feedback (name, email, message) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(1, $name);
    $stmt->bindParam(2, $email);
    $stmt->bindParam(3, $message);
    
    if ($stmt->execute()) {
        $successMessage = "Thank you for your feedback!";
        $redirectTo = "index.php";
    } else {
        $errorMessage = "Oops! Something went wrong. Please try again. You will be redirected to the home page shortly";
        $redirectTo = "index.php";
    }
      
    // Provide feedback message with a link to index.php
    echo $successMessage . "<br>";
    echo "You will be redirected to the <a href='$redirectTo'>Home page</a> shortly.";
    
    // Redirect to index.php
    header("Refresh: 5; URL=$redirectTo"); // Redirect after 5 seconds
    exit;
} else {
    echo "Invalid request. Please submit the feedback form.";
}
?>
