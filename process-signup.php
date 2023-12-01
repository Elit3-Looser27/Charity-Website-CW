<?php
// Validate the form data

if (empty($_POST["name"])) {
    die("Name is required");
}

if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    die("Valid email is required");
}

// Check for password length
if (strlen($_POST["password"]) < 8) {
    die("Password must be at least 8 characters");
}

// Check for at least one lowercase letter
if (!preg_match("/[a-z]/", $_POST["password"])) {
    die("Password must contain at least one lowercase letter");
}

// Check for at least one uppercase letter
if (!preg_match("/[A-Z]/", $_POST["password"])) {
    die("Password must contain at least one uppercase letter");
}

// Check for at least one number
if (!preg_match("/\d/", $_POST["password"])) {
    die("Password must contain at least one number");
}

// Check for at least one special character
if (!preg_match("/[\W_]/", $_POST["password"])) {
    die("Password must contain at least one special character");
}

// Confirm password match
if ($_POST["password"] !== $_POST["password_confirmation"]) {
    die("Passwords must match");
}

// Hash the password
$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

// Connect to the database
$conn = require __DIR__ . "/database.php";

// Prepare the SQL statement
$sql = "INSERT INTO [user] (name, email, password_hash) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
if (!$stmt) {
    die("SQL error: " . $conn->errorInfo()[2]);
}

// Bind the form data to the statement parameters
$stmt->bindParam(1, $_POST["name"]);
$stmt->bindParam(2, $_POST["email"]);
$stmt->bindParam(3, $password_hash);

// Execute the statement and handle any errors
if ($stmt->execute()) {
    header("Location: signup-success.php");
    exit;
} else {
    $errorInfo = $stmt->errorInfo();
    if ($errorInfo[0] == 23000 && $errorInfo[1] == 2627) {
        die("The email address is already taken.");
    } else {
        die("An error occurred while executing the statement: " . $errorInfo[2]);
    }
}
