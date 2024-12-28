<?php
session_start();

include 'Database.php';

if (!isset($_SESSION['basket'])) {
    $_SESSION['basket'] = [];
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["productId"])) {
    $productId = $_POST["productId"];
    if (!array_key_exists($productId, $_SESSION['basket'])) {
        $_SESSION['basket'][$productId] = 1; 
    } else {
        $_SESSION['basket'][$productId]++; 
    }

    header("Location: basket.php");
    exit(); 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sneakers</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="styles/style.css" rel="stylesheet">
</head>
<body>
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
        <li class="nav-item">
          <a class="nav-link" href="basket.php">Basket</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<main class="flex-grow-1">
  <section class="album py-5 bg-body-tertiary">
    <div class="container">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

            <!-- Jordan 1 -->
<div class="col">
  <div class="card shadow-sm">
    <img src="Images/Jordans.png" alt="Jordan 1 Mid Trainers in Black and Fire Red">
    <div class="card-body">
      <p class="card-text">Jordan 1</p>
      <form method="post">
        <input type="hidden" name="productId" value="123456">
        <div class="d-flex justify-content-between align-items-center">
          <div class="btn-group">
            <button type="submit" class="btn btn-sm btn-outline-secondary" name="add">Buy</button>
            <a type="button" class="btn btn-sm btn-outline-secondary" href="1.Jordan1.php">More Info</a>
          </div>
          <small class="text-body-secondary">£130</small>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Nike Air VaporMax Plus -->
<div class="col">
  <div class="card shadow-sm">
    <img src="Images/TNS.png" alt="Nike Air VaporMax Plus">
    <div class="card-body">
      <p class="card-text">Nike Air VaporMax Plus</p>
      <form method="post">
        <input type="hidden" name="productId" value="2">
        <div class="d-flex justify-content-between align-items-center">
          <div class="btn-group">
            <button type="submit" class="btn btn-sm btn-outline-secondary" name="add">Buy</button>
            <a type="button" class="btn btn-sm btn-outline-secondary" href="2.NikeAir.php">More Info</a>
          </div>
          <small class="text-body-secondary">£205</small>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Nike Air Force 1 '07 -->
<div class="col">
  <div class="card shadow-sm">
    <img src="Images/Airforce.png" alt="Nike Air Force 1 '07">
    <div class="card-body">
      <p class="card-text">Nike Air Force 1 '07</p>
      <form method="post">
        <input type="hidden" name="productId" value="3">
        <div class="d-flex justify-content-between align-items-center">
          <div class="btn-group">
            <button type="submit" class="btn btn-sm btn-outline-secondary" name="add">Buy</button>
            <a type="button" class="btn btn-sm btn-outline-secondary" href="3.AirForce.php">More Info</a>
          </div>
          <small class="text-body-secondary">£110</small>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Nike Air Max 95 Essential -->
<div class="col">
  <div class="card shadow-sm">
    <img src="Images/95.png" alt="Nike Air Max 95 Essential">
    <div class="card-body">
      <p class="card-text">Nike Air Max 95 Essential</p>
      <form method="post">
        <input type="hidden" name="productId" value="4">
        <div class="d-flex justify-content-between align-items-center">
          <div class="btn-group">
            <button type="submit" class="btn btn-sm btn-outline-secondary" name="add">Buy</button>
          </div>
          <small class="text-body-secondary">£175</small>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Nike Air Huarache -->
<div class="col">
  <div class="card shadow-sm">
    <img src="Images/Huaraches.png" alt="Nike Air Huarache">
    <div class="card-body">
      <p class="card-text">Nike Air Huarache</p>
      <form method="post">
        <input type="hidden" name="productId" value="5">
        <div class="d-flex justify-content-between align-items-center">
          <div class="btn-group">
            <button type="submit" class="btn btn-sm btn-outline-secondary" name="add">Buy</button>
          </div>
          <small class="text-body-secondary">£120</small>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Nike Air Max 97 -->
<div class="col">
  <div class="card shadow-sm">
    <img src="Images/97.png" alt="Nike Air Max 97">
    <div class="card-body">
      <p class="card-text">Nike Air Max 97</p>
      <form method="post">
        <input type="hidden" name="productId" value="6">
        <div class="d-flex justify-content-between align-items-center">
          <div class="btn-group">
            <button type="submit" class="btn btn-sm btn-outline-secondary" name="add">Buy</button>
          </div>
          <small class="text-body-secondary">£175</small>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Nike Air Max 270 -->
<div class="col">
  <div class="card shadow-sm">
    <img src="Images/270.png" alt="Nike Air Max 270">
    <div class="card-body">
      <p class="card-text">Nike Air Max 270</p>
      <form method="post">
        <input type="hidden" name="productId" value="7">
        <div class="d-flex justify-content-between align-items-center">
          <div class="btn-group">
            <button type="submit" class="btn btn-sm btn-outline-secondary" name="add">Buy</button>
          </div>
          <small class="text-body-secondary">£145</small>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Nike Air Max 90 -->
<div class="col">
  <div class="card shadow-sm">
    <img src="Images/90.png" alt="Nike Air Max 90">
    <div class="card-body">
      <p class="card-text">Nike Air Max 90</p>
      <form method="post">
        <input type="hidden" name="productId" value="8">
        <div class="d-flex justify-content-between align-items-center">
          <div class="btn-group">
            <button type="submit" class="btn btn-sm btn-outline-secondary" name="add">Buy</button>
          </div>
          <small class="text-body-secondary">£145</small>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Nike Go FlyEase -->
<div class="col">
  <div class="card shadow-sm">
    <img src="Images/FlyEase.png" alt="Nike Go FlyEase">
    <div class="card-body">
      <p class="card-text">Nike Go FlyEase</p>
      <form method="post">
        <input type="hidden" name="productId" value="9">
        <div class="d-flex justify-content-between align-items-center">
          <div class="btn-group">
            <button type="submit" class="btn btn-sm btn-outline-secondary" name="add">Buy</button>
          </div>
          <small class="text-body-secondary">£120</small>
        </div>
      </form>
    </div>
  </div>
</div>
      <?php
      include 'Database.php'; 

      $sql = "SELECT ProductId, name, description, price, stock FROM product WHERE price <= 100";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          echo '<div class="col-12"><h2 class="py-4">New Upcoming Products</h2></div>';
          while($row = $result->fetch_assoc()) {
              echo '<div class="col">';
              echo '  <div class="card shadow-sm">';
              echo '    <div class="card-body">';
              echo '      <p class="card-text"><strong>' . htmlspecialchars($row["name"]) . '</strong></p>';
              echo '      <p class="card-text">' . htmlspecialchars($row["description"]) . '</p>';
              echo '      <p class="card-text">Stock: ' . htmlspecialchars($row["stock"]) . '</p>';
              echo '      <div class="d-flex justify-content-between align-items-center">';
              echo '        <div class="btn-group">';
              echo '          <button type="submit" class="btn btn-sm btn-outline-secondary" name="add">Buy</button>';
              echo '        </div>';
              echo '        <small class="text-body-secondary">£' . htmlspecialchars($row["price"]) . '</small>';
              echo '      </div>';
              echo '    </div>';
              echo '  </div>';
              echo '</div>';
          }
      } else {
          echo "<div class='col-12'><p>No products found.</p></div>";
      }
      ?>
      </div>
    </div>
  </section>
</main>

<footer class="mt-auto py-3 bg-dark text-white">
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
