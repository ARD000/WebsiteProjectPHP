<?php
session_start();

include 'Database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['removeItemId'])) {
    $removeItemId = $_POST['removeItemId'];
    if (isset($_SESSION['basket'][$removeItemId])) {
        unset($_SESSION['basket'][$removeItemId]);
    }
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

if (!isset($_SESSION['basket'])) {
    $_SESSION['basket'] = [];
}

$total = 0;

$basketItemsHTML = "";
if (!empty($_SESSION['basket'])) {
    foreach ($_SESSION['basket'] as $id => $quantity) {
        $sql = "SELECT name, price FROM product WHERE ProductId = $id";
        $result = $conn->query($sql);
        if ($result) {
            if ($row = $result->fetch_assoc()) {
                $subtotal = $row["price"] * $quantity;
                $total += $subtotal;
                $basketItemsHTML .= '<div class="col">
                                        <div class="card shadow-sm">
                                            <div class="card-body">
                                                <p class="card-text"><strong>' . htmlspecialchars($row["name"]) . '</strong></p>
                                                <p class="card-text">Price: £' . $row["price"] . '</p>
                                                <p class="card-text">Quantity: ' . $quantity . '</p>
                                                <p class="card-text">Subtotal: £' . $subtotal . '</p>
                                                <form action="" method="post">
                                                    <input type="hidden" name="removeItemId" value="' . $id . '">
                                                    <button type="submit" class="btn btn-danger">Remove</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>';
            } else {
                $basketItemsHTML .= "<p>Error: Product not found for ID: $id</p>";
            }
        } else {
            $basketItemsHTML .= "<p>Error: " . $conn->error . "</p>";
        }
    }
} else {
    $basketItemsHTML = "<p>Your basket is empty.</p>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basket</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
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
          <a class="nav-link active" href="Browse.php">Browse</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Admin.php">Admin</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<main class="flex-grow-1">
  <section class="album py-5 bg-body-tertiary">
    <div class="container">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <?php echo $basketItemsHTML; ?>
      </div>
      <div class="row">
        <div class="col">
          <p>Total Amount: £<?php echo $total; ?></p>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <form method="post">
            <div class="mb-3">
              <label for="discountCode" class="form-label">Discount Code</label>
              <input type="text" class="form-control" id="discountCode" name="discountCode">
            </div>
            <button type="submit" class="btn btn-primary">Apply</button>
          </form>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <a href="checkout.php" class="btn btn-primary">Proceed to Checkout</a>
        </div>
      </div>
    </div>
  </section>
</main>

<footer class="mt-auto py-3 bg-dark text-white">
  <div class="container text-center">
    <span>© 2023 Sneakers, Inc</span>
  </div>
</footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
    $(document).ready(function(){
        $('.navbar-toggler').click(function(){
            $('.collapse').toggleClass('show');
        });
    });
</script>
</body>
</html>
