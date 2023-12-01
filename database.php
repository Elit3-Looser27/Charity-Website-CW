<?php
$host = 'charity-hub-server.database.windows.net';  // Azure SQL Database server
$username = 'Begad-Anass';
$password = 'Hatem@120503';
$database = 'Charity-Hub';

try {
    $conn = new PDO("sqlsrv:Server=$host;Database=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Database connection failed: ' . $e->getMessage());
}

return $conn;
?>
