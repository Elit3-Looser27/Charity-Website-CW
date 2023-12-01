<?php
$host = 'ASP-CharityHubgroup-8326';
$username = 'petedxfwil';
$password = '5GVJTLD5665X4555$';
$database = 'charity-hub-database';

// Create a connection
$mysqli = new mysqli($host, $username, $password, $database);

// Check if the connection was successful
if ($mysqli->connect_error) {
    die('Database connection failed: ' . $mysqli->connect_error);
}

return $mysqli;
?>
