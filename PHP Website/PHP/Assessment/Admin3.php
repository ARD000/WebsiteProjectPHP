<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
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
        <form class="form-signin">
            <h1 class="h3 mb-3 font-weight-normal">Product Added Successfully</h1>
            <div class="mb-3">
                <label for="inputProduct" class="sr-only">Product Name</label>
                <input type="text" id="inputProduct" class="form-control" placeholder="Product Name" autofocus="">
            </div>
            <div class="mb-3">
                <label for="inputProductID" class="sr-only">Product ID</label>
                <input type="text" id="inputProductID" class="form-control" placeholder="Product ID">
            </div>
            <div class="mb-3">
                <label for="inputProductPrice" class="sr-only">Product Price</label>
                <input type="text" id="inputProductPrice" class="form-control" placeholder="Product Price">
            </div>
            <div class="checkbox mb-3">
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit" href="">ADD</button>
        </form>
    </div>
</section>
<footer class="footer mt-auto py-3 bg-dark text-white">
  <div class="container text-center">
    <span>© 2023 Sneakers, Inc</span>
  </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
