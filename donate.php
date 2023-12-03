<!DOCTYPE html>
<html>
<head>
 <link rel="stylesheet" type="text/css" href="css/style.css">
  <title>Donate - Donation Website</title>

</head>
<body>
  <div class="container">
    <header class="header">
      <h1>Donate to a Charity</h1>
    </header>
    <form action="donate_process.php" method="POST" onsubmit="return validateForm()">
      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
      </div>
      <div class="form-group">
        <label for="gender">Gender:</label>
        <select id="gender" name="gender" required>
          <option value="">Select</option>
          <option value="male">Male</option>
          <option value="female">Female</option>
          <option value="other">Other</option>
        </select>
      </div>
      <div class="form-group">
        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required>
      </div>
      <div class="form-group">
        <label for="phone">Phone Number:</label>
        <input type="tel" id="phone" name="phone" required>
      </div>
      <div class="form-group">
        <label for="charity">Charity:</label>
        <select id="charity" name="charity" required>
          <option value="">Select</option>
          <option value="Children Cancer Hospital 57357">Charity 1: Children Cancer Hospital 57357</option>
          <option value="Ahl Masr Hospital">Charity 2: Ahl Masr Hospital</option>
          <option value="Resala Organization">Charity 3: Resala</option>
          <option value="Egyptian Food Bank">Charity 4: Egyptian Food Bank</option>
          <option value="Dar Al Orman Hospital">Charity 5: Dar Al Orman Hospital</option>
          <!-- Add more charity options as needed -->
        </select>
      </div>
      <div class="form-group">
        <label for="donation-type">Donation Type:</label>
        <select id="donation-type" name="donation-type" onchange="toggleOtherItem()">
          <option value="funds">Funds</option>
          <option value="other-item">Other Item</option>
        </select>
      </div>
      <div class="form-group" id="other-item-details" style="display: none;">
        <label for="other-item">Specify the Item:</label>
        <input type="text" id="other-item" name="specify-type">
      </div>
      <div class="form-group">
        <label for="amount">Amount in EGP:</label>
        <input type="number" id="amount" name="amount" min="0" required>
      </div>
      <div class="form-group">
        <label for="payment-method">Payment Method:</label>
        <input type="radio" id="payment-cash" name="payment-method" value="cash" onchange="toggleCardDetails(false)" required>
        <label for="payment-cash">Cash</label>
        <input type="radio" id="payment-online" name="payment-method" value="online" onchange="toggleCardDetails(true)" required>
        <label for="payment-online">Online (Card)</label>
      </div>
      <div class="form-group card-details" id="card-details" style="display: none;">
        <label for="card-number">Card Number:</label>
        <input type="text" id="card-number" name="card-number">
      </div>
      <div class="form-group card-details" id="card-details" style="display: none;">
        <label for="card-expiry">Card Expiry:</label>
        <input type="text" id="card-expiry" name="card-expiry">
      </div>
      <div class="form-group card-details" id="card-details" style="display: none;">
        <label for="card-cvv">CVV:</label>
        <input type="text" id="card-cvv" name="cvv">
      </div>
      <div class="form-group">
        <button action= "donate_proccess.php "type="submit" class="donate-button">Donate Now</button>
      </div>
    </form>
  </div>
  <footer class="footer">
  <div class="footer-links">
    <a href="index.php">Home</a>
    <a href="charities.php">Charities</a>
    <a href="about.php">About Us</a>
    <a href="donate.php">Donate</a>
    <a href="feedback.php">Give Us Your Feedback</a>
  </div>
  <p>&copy; 2023 Donation Website. All rights reserved.</p>
</footer>


  <script src="script.js"> </script>
</body>
</html>
