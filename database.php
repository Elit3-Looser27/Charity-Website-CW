<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'resit_user';

// Create a connection
$mysqli = new mysqli($host, $username, $password, $database);

// Check if the connection was successful
if ($mysqli->connect_error) {
    die('Database connection failed: ' . $mysqli->connect_error);
}

return $mysqli;
?>
