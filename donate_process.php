<?php
<?php
// Start or resume a session
session_start();

// Regenerate session ID on each page load for enhanced security
session_regenerate_id();

// Check if a user is logged in
if (isset($_SESSION["user_id"])) {
    
    // Include the database connection file
    $pdo = require __DIR__ . "/database.php";
    
    // Prepare the SQL statement
    $sql = "SELECT * FROM [user] WHERE id = :user_id";
    
    // Prepare and execute the SQL query
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':user_id', $_SESSION["user_id"]);
    $stmt->execute();
    
    // Fetch the user data
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Set a secure cookie with the session ID
    $cookieParams = session_get_cookie_params();
    setcookie(session_name(), session_id(), [
        'expires' => time() + 60*60*24, // 1 day for example
        'path' => $cookieParams["path"],
        'domain' => $cookieParams["domain"],
        'secure' => true, // Set to true if using HTTPS
        'httponly' => true, // HTTPOnly for security
        'samesite' => 'Strict' // Strict or Lax depending on your needs
    ]);
}
?>

// Replace with your database credentials
$host = 'charity-hub-server.database.windows.net';
$dbname = 'Charity-Hub';
$username = 'Begad-Anass';
$password = 'Hatem@120503';

// Create a PDO database connection
try {
  $pdo = new PDO("sqlsrv:Server=$host;Database=$dbname", $username, $password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  die("Database connection failed: " . $e->getMessage());
}

// Retrieve the form data
$name = $_POST['name'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$address = $_POST['address'];
$phoneNumber = $_POST['phone'];
$charity = $_POST['charity'];
$donationType = $_POST['donation-type'];
$specifyType = $_POST['specify-type'];
$amount = $_POST['amount'];
$paymentMethod = $_POST['payment-method'];
$cardNumber = $_POST['card-number'];
$cardExpiry = $_POST['card-expiry'];
$cvv = $_POST['cvv'];

// Prepare the SQL statement
$sql = "INSERT INTO donation_info (name, email, gender, address, phone_number, charity, donation_type, specify_type, amount, payment_method, card_number, card_expiry, cvv)
        VALUES (:name, :email, :gender, :address, :phone_number, :charity, :donation_type, :specify_type, :amount, :payment_method, :card_number, :card_expiry, :cvv)";
$stmt = $pdo->prepare($sql);


// // Check if the payment method is "cash"
// if ($_POST["payment-method"] === "cash") {
//   // Generate a unique random number for the card number
//   $cardNumber = mt_rand(1000000000000000, 9999999999999999);
// } else {
//   // For other payment methods, use the provided card number
//   $cardNumber = $_POST["card-number"];
// }


// Check if the payment method is "cash"
if ($_POST["payment-method"] === "cash") {
  // Set the card number indicator for cash payment
  $cardNumber = "CASH-" . strval(uniqid());
} else {
  // For online payment methods, encrypt the provided card number
  $encryptedCardNumber = openssl_encrypt($_POST["card_number"], 'AES-128-ECB', $encryption_key);
  $cardNumber = $encryptedCardNumber;
}




// Bind the form values to the prepared statement
$stmt->bindParam(':name', $name);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':gender', $gender);
$stmt->bindParam(':address', $address);
$stmt->bindParam(':phone_number', $phoneNumber);
$stmt->bindParam(':charity', $charity);
$stmt->bindParam(':donation_type', $donationType);
$stmt->bindParam(':specify_type', $specifyType);
$stmt->bindParam(':amount', $amount);
$stmt->bindParam(':payment_method', $paymentMethod);
$stmt->bindParam(':card_number', $cardNumber);
$stmt->bindParam(':card_expiry', $cardExpiry);
$stmt->bindParam(':cvv', $cvv);

// Execute the statement
if ($stmt->execute()) {
  echo '<p style="font-size: 1.5rem; color: #45a049;">Thank you for your donation!</p>';
  echo '<a href="index.php" class="button">Back to Homepage</a>';
} else {
  echo "Error inserting data.";
}

