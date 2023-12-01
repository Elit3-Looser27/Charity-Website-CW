<?php
//// Validate the form data

if (empty($_POST["name"])) {
    die("Name is required");
}

if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    die("Valid email is required");
}

if (strlen($_POST["password"]) < 8) {
    die("Password must be at least 8 characters");
}

if (!preg_match("/[a-z]/i", $_POST["password"])) {
    die("Password must contain at least one letter");
}

if (!preg_match("/[0-9]/", $_POST["password"])) {
    die("Password must contain at least one number");
}

if ($_POST["password"] !== $_POST["password_confirmation"]) {
    die("Passwords must match");
}

//// Hash the password

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

// Connect to the database

$mysqli = require __DIR__ . "/database.php";

// Prepare the SQL statement

$sql = "INSERT INTO user (name, email, password_hash)
        VALUES (?, ?, ?)";

$stmt = $mysqli->stmt_init();

if (!$stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

// Bind the form data to the statement parameters

$stmt->bind_param("sss",
    $_POST["name"],
    $_POST["email"],
    $password_hash);

// Execute the statement and handle any errors

if ($stmt->execute()) {
    header("Location: signup-success.php");
    exit;
} else {
    if ($stmt->errno === 1062) {
        die("The email address is already taken.");
    } else {
        die("An error occurred while executing the statement: " . $stmt->error);
    }
}
