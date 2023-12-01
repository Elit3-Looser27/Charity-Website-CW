<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];
    
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
    
    if ($mysqli->connect_error) {
        die("Database connection failed: " . $mysqli->connect_error);
    }
    
    // Insert feedback into the "feedback" table
    $sql = "INSERT INTO feedback (name, email, message) VALUES (?, ?, ?)";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("sss", $name, $email, $message);
    
    if ($stmt->execute()) {
        $successMessage = "Thank you for your feedback!";
        $redirectTo = "index.php";
    } else {
        $errorMessage = "Oops! Something went wrong. Please try again. You will be redirected to the home page shortly";
        $redirectTo = "index.php";
    }
    
    // Close the database connection
    $stmt->close();
    $mysqli->close();
    
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
