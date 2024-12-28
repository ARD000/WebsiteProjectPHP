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
    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
      <ul class="navbar-nav mb-2 mb-lg-0">
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
<section>
  <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-body-tertiary">
    <div class="container">
      <div class="col-md-6 p-lg-5 mx-auto my-5">
        <h1 class="display-3 fw-bold">Sneakers</h1>
        <h2 class="fw-normal text-muted mb-3">Successfully Logged in</h2>
        <h3 class="fw-normal text-muted mb-3">Get the right sneakers for you</h3>
        <div class="d-flex gap-3 justify-content-center lead fw-normal">
          <a class="icon-link" href="Browse.php">
            Buy
            <svg class="bi"><use xlink:href="#chevron-right"></use></svg>
          </a>
        </div>
      </div>
    </div>
    <div class="product-device shadow-sm d-none d-md-block"></div>
    <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
  </div>
</section>
<footer class="footer mt-auto py-3 bg-dark text-white">
  <div class="container text-center">
    <span>© 2023 Sneakers, Inc</span>
  </div>
</footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>
