<?php
$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $pdo = require __DIR__ . "/database.php";
    
    $sql = "SELECT * FROM [user] WHERE email = :email";
    
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email', $_POST["email"]);
    
    $stmt->execute();
    
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($user) {
        
        if (password_verify($_POST["password"], $user["password_hash"])) {
            
            session_start();
            
            session_regenerate_id();
            
            $_SESSION["user_id"] = $user["id"];
            
            // Check if the user's email matches one of the admin emails
            $adminEmails = ["Admin-1@gmail.com", "Admin-2@gmail.com", "Admin-3@gmail.com"];
            if (in_array($user["email"], $adminEmails)) {
                header("Location: admin_index.php"); // Redirect to the admin's dashboard.
                exit;
            } else {
                header("Location: index.php"); // Redirect to the default page.
                exit;
            }
        }
    }
    // If the email or password is invalid, the variable $is_invalid is set to true.

    $is_invalid = true;
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>

<h1>Login</h1>

<?php if ($is_invalid): ?>
    <p class="error-message">Invalid login</p>
    <p>It appears that you do not have an account. Would you like to <a href="signup.php">sign up</a>?</p>
<?php endif; ?>

<form method="post">
    <label for="email">Email</label>
    <input type="email" name="email" id="email" value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">

    <label for="password">Password</label>
    <input type="password" name="password" id="password">

    <button>Log in</button>
</form>

</body>
</html>








