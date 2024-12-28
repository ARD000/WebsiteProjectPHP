<?php
session_start();

$userData = [
    'first_name' => '',
    'last_name' => '',
    'email' => '',
    'address' => '',
    'country' => '',
    'city' => '',
    'postcode' => '',
];

if (isset($_SESSION['user_id'])) {
    $servername = "localhost";
    $username = "root"; 
    $password = ""; 
    $dbname = "sneakers"; 
    $userId = $_SESSION['user_id'];

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT first_name, last_name, email, address, country, city, postcode FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $userData = $result->fetch_assoc();
    }

    $stmt->close();
    $conn->close();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $orderId = 1; 
    $orderDate = date("Y-m-d H:i:s"); 
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "INSERT INTO orders (OrderId, OrderDate) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("is", $orderId, $orderDate);
    $stmt->execute();
    $stmt->close();
    $conn->close();

    $_SESSION['success_message'] = 'Order successful! Your Order ID is ' . $orderId;
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="styles/style.css" rel="stylesheet">
</head>
<body class="d-flex flex-column min-vh-100">
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Sneakers</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Login.php">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Browse.php">Browse</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Admin.php">Admin</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<main class="flex-grow-1">
    <div class="container">
      <div class="py-5 text-center">
        <h2>Checkout Form</h2>
      </div>

      <div class="row justify-content-center">
        <div class="col-md-8">
          <form class="needs-validation" method="post" novalidate>
            <div class="row g-3">
              <div class="col-sm-6">
                <label for="firstName" class="form-label">First name</label>
                <input type="text" class="form-control" id="firstName" name="first_name" value="<?php echo $userData['first_name']; ?>" required>
                <div class="invalid-feedback">Valid first name is required.</div>
              </div>

              <div class="col-sm-6">
                <label for="lastName" class="form-label">Last name</label>
                <input type="text" class="form-control" id="lastName" name="last_name" value="<?php echo $userData['last_name']; ?>" required>
                <div class="invalid-feedback">Valid last name is required.</div>
              </div>

              <div class="col-12">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $userData['email']; ?>" placeholder="you@example.com">
                <div class="invalid-feedback">Please enter a valid email address for shipping updates.</div>
              </div>

              <div class="col-12">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address" value="<?php echo $userData['address']; ?>" placeholder="1234 Main St" required>
                <div class="invalid-feedback">Please enter your shipping address.</div>
              </div>
              
              <div class="col-md-5">
                <label for="country" class="form-label">Country</label>
                <input type="text" class="form-control" id="country" name="country" value="<?php echo $userData['country']; ?>" required>
                <div class="invalid-feedback">Please select a valid country.</div>
              </div>

              <div class="col-md-4">
                <label for="city" class="form-label">City</label>
                <input type="text" class="form-control" id="city" name="city" value="<?php echo $userData['city']; ?>" required>
                <div class="invalid-feedback">Please provide a valid city.</div>
              </div>

              <div class="col-md-3">
                <label for="zip" class="form-label">Postcode/Zip</label>
                <input type="text" class="form-control" id="zip" name="postcode" value="<?php echo $userData['postcode']; ?>" required>
                <div class="invalid-feedback">Postcode required.</div>
              </div>
            </div>

            <hr class="my-4">
            
            <h4 class="mb-3">Payment Method</h4>
            <div class="my-3">
              <div class="form-check">
                <input id="credit" name="paymentMethod" type="radio" class="form-check-input" checked required>
                <label class="form-check-label" for="credit">Credit card</label>
              </div>
              <div class="form-check">
                <input id="debit" name="paymentMethod" type="radio" class="form-check-input" required>
                <label class="form-check-label" for="debit">Debit card</label>
              </div>
            </div>

            <div class="row gy-3">
              <div class="col-md-6">
                <label for="cc-number" class="form-label">Credit card number</label>
                <input type="text" class="form-control" id="cc-number" name="cc_number" placeholder="0000 0000 0000 0000" required>
                <div class="invalid-feedback">Credit card number is required</div>
              </div>
              <div class="col-md-3">
                <label for="cc-expiration" class="form-label">Expiration</label>
                <input type="text" class="form-control" id="cc-expiration" name="cc_expiration" placeholder="MM/YY" required>
                <div class="invalid-feedback">Expiration date required</div>
              </div>
              <div class="col-md-3">
                <label for="cc-cvv" class="form-label">CVV</label>
                <input type="text" class="form-control" id="cc-cvv" name="cc_cvv" placeholder="123" required>
                <div class="invalid-feedback">Security code required</div>
              </div>
            </div>
            
            <hr class="my-4">
            
            <button class="w-100 btn btn-primary btn-lg" type="submit" id="buyNowButton">Buy Now</button>
          </form>
        </div>
      </div>
    </div>
</main>

<footer class="footer mt-auto py-3 bg-dark text-white">
  <div class="container text-center">
    © 2023 Sneakers, Inc
  </div>
</footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $('#buyNowButton').click(function(e) {
        e.preventDefault();

        setTimeout(function() {
            var orderId = 1; 
            alert('Order successful! Your Order ID is ' + orderId);
            window.location.href = 'index.php'; 
        }, 2000); 
    });
});
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMneT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script>
  $(document).ready(function(){
    $('.navbar-toggler').click(function(){
      $('#navbarSupportedContent').toggleClass('show');
    });
  });
</script>
</body>
</html>