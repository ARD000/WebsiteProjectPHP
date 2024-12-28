<?php
$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $servername = "localhost";
    $username = "root"; 
    $password = ""; 
    $dbname = "sneakers"; 

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $first_name = htmlspecialchars($_POST['first_name']);
    $last_name = htmlspecialchars($_POST['last_name']);
    $email = htmlspecialchars($_POST['email']);
    $password = $_POST['password']; 
    $address = htmlspecialchars($_POST['address']);
    $country = htmlspecialchars($_POST['country']);
    $city = htmlspecialchars($_POST['city']);
    $postcode = htmlspecialchars($_POST['postcode']);

    if (!empty($password)) {
        $sql = "INSERT INTO users (username, email, password, address, country, city, postcode) VALUES (?, ?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssss", $username, $email, $password, $address, $country, $city, $postcode);
        $username = $first_name . " " . $last_name; 

        if ($stmt->execute()) {
            $message = "New record created successfully. You can now <a href='Login.php'>login</a>.";
        } else {
            $message = "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        $message = "Error: Password field cannot be empty.";
    }

    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
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
<section class="text-center">
    <div class="container col-md-6">
        <form class="form-signin" method="post">
            <h1 class="h3 mb-3 font-weight-normal">Sign Up</h1>
            <div class="mb-3">
                <input type="text" id="inputFirstName" name="first_name" class="form-control" placeholder="First Name" required>
            </div>
            <div class="mb-3">
                <input type="text" id="inputLastName" name="last_name" class="form-control" placeholder="Last Name" required>
            </div>
            <div class="mb-3">
                <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocus>
            </div>
            <div class="mb-3">
                <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
            </div>
            <div class="mb-3">
                <input type="text" id="inputAddress" name="address" class="form-control" placeholder="Address" required>
            </div>
            <div class="mb-3">
                <input type="text" id="inputCountry" name="country" class="form-control" placeholder="Country" required>
            </div>
            <div class="mb-3">
                <input type="text" id="inputCity" name="city" class="form-control" placeholder="City" required>
            </div>
            <div class="mb-3">
                <input type="text" id="inputPostcode" name="postcode" class="form-control" placeholder="Postcode/Zip" required>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign Up</button>
            <?php if (!empty($message)): ?>
                <p class="mt-3"><?php echo $message; ?></p>
            <?php endif; ?>
        </form>
    </div>
</section>
<footer class="footer mt-auto py-3 bg-dark text-white">
  <div class="container text-center">
    <span>© 2023 Sneakers, Inc</span>
  </div>
</footer>
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
