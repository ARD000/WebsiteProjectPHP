<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="styles/style.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="#">Customer</a>
      </ul>
    </div>
  </div>
</nav>
    </nav>
    <section>
        <div class="container-fluid">
            <div class="container">
            <table border="1">
        <tr>
            <th>Customer ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
        </tr>

        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "sneakers";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM `customer`";
        $result = $conn->query($sql);

        if ($result === false) {
            die("Error executing the query: " . $conn->error);
        }

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
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
            echo "<tr><td colspan='6'>0 results</td></tr>";
        }

        $conn->close();
        ?>
    </table>
            </div>
        </div>
    </section>
    <footer class="footer">
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
    <div class="col-md-4 d-flex align-items-center">
      <a href="/" class="mb-3 me-2 mb-md-0 text-body-secondary text-decoration-none lh-1">
        <svg class="bi" width="30" height="24"><use xlink:href="#bootstrap"></use></svg>
      </a>
      <span class="mb-3 mb-md-0 text-body-secondary">© 2023 Sneakers, Inc</span>
    </div>
  </footer>
    </footer>
    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>