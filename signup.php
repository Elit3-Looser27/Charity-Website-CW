
<!DOCTYPE html>
<html>
<head>
    <title>Signup</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/signup2.css">
    <script src="/js/validation.js" defer></script>
</head>
<body>

<h1>Signup</h1>

<p class="Prompt">Already have an account? <a href="login.php">Log in</a></p>

<form action="process-signup.php" method="post" id="signup" novalidate>
    <div>
        <label for="name">Name</label>
        <input type="text" id="name" name="name">
    </div>

    <div>
        <label for="email">Email</label>
        <input type="email" id="email" name="email">
    </div>

    <div>
        <label for="password">Password</label>
        <input type="password" id="password" name="password">
    </div>

    <div>
        <label for="password_confirmation">Repeat Password</label>
        <input type="password" id="password_confirmation" name="password_confirmation">
    </div>

    <button>Sign up</button>
</form>

</body>
</html>
