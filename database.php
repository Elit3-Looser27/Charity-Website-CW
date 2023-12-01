<?php
$host = 'charity-hub-server.database.windows.net';
$username = 'petedxfwil';
$password = '5GVJTLD5665X4555$';
$database = 'Charity-Hub';

// Create a connection
$mysqli = new mysqli($host, $username, $password, $database);

// Check if the connection was successful
if ($mysqli->connect_error) {
    die('Database connection failed: ' . $mysqli->connect_error);
}

return $mysqli;
?>
