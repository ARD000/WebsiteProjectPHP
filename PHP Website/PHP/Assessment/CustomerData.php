<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="styles/style.css" rel="stylesheet">
    <link href="styles/custom.css" rel="stylesheet"> 
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
  <section class="py-5">
    <div class="container">
      <h2 class="mb-4">Customer Data</h2>
      <table class="table">
        <thead>
          <tr>
            <th>Customer ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $servername = "localhost";
          $username = "root";
          $password = "";
          $dbname = "sneakers";

          $conn = new mysqli($servername, $username, $password, $dbname);
          if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
          }

          $sql = "SELECT * FROM `customer`";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                  echo "<tr>";
                  echo "<td>" . $row["CustomerID"] . "</td>";
                  echo "<td>" . $row["FirstName"] . "</td>";
                  echo "<td>" . $row["LastName"] . "</td>";
                  echo "<td>" . $row["Email"] . "</td>";
                  echo "<td>" . $row["Phone"] . "</td>";
                  echo "<td>" . $row["Address"] . "</td>";
                  echo "</tr>";
              }
          } else {
              echo "<tr><td colspan='6'>No results found</td></tr>";
          }
          $conn->close();
          ?>
        </tbody>
      </table>
    </div>
  </section>
</main>

<footer class="footer mt-auto py-3 bg-dark text-white">
    <div class="container">
        <span>© 2023 Sneakers, Inc</span>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
