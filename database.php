<?php
// PHP Data Objects(PDO) Sample Code:
try {
    $conn = new PDO("sqlsrv:server = tcp:charity-hub-server.database.windows.net,1433; Database = Charity-Hub", "Begad-Anass", "5GVJTLD5665X4555$");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}

// SQL Server Extension Sample Code:
$connectionInfo = array("UID" => "Begad-Anass", "pwd" => "5GVJTLD5665X4555$", "Database" => "Charity-Hub", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:charity-hub-server.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);
?>