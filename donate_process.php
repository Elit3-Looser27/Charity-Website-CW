<?php
session_start();
// Replace with your database credentials
$host = 'ASP-CharityHubgroup-8326';
$dbname = 'charity-hub-database';
$username = 'petedxfwil';
$password = '5GVJTLD5665X4555$';

// Create a PDO database connection
try {
  $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
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
  // For other payment methods, use the provided card number
  $cardNumber = $_POST["card-number"];
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

