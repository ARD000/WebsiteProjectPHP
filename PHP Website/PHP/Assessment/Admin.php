<?php
session_start();
$error = ''; 

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username']) && isset($_POST['password'])) {
    $servername = "localhost";
    $dbUsername = "root";
    $dbPassword = ""; 
    $dbname = "sneakers"; 

    $conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT id, password, is_admin FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($password === $row['password'] && $row['is_admin']) {
            $_SESSION['admin_id'] = $row['id'];
            header("Location: Admin2.php"); 
            exit();
        } else {
            $error = "Invalid username or password.";
        }
    } else {
        $error = "Admin not found.";
    }
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
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
          <a class="nav-link active" href="Admin.php">Admin</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<main class="flex-grow-1">
  <section class="text-center">
    <div class="container col-6">
      <form class="form-signin" method="post" action="">
        <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
        <label for="inputUsername" class="sr-only">Username</label>
        <input type="text" id="inputUsername" name="username" class="form-control" placeholder="Username" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        <?php if (!empty($error)): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>
      </form>
    </div>
  </section>
</main>

<footer class="footer mt-auto py-3 bg-dark text-white">
  <div class="container">
    <span>© 2023 Sneakers, Inc</span>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMneT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  $(document).ready(function(){
    $(".navbar-toggler").click(function(){
      $("#navbarSupportedContent").toggleClass("show");
    });
  });
</script>
</body>
</html>
