<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?=$pageTitle?></title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <!-- Your Custom CSS -->
  <style>
    /* Customize your navbar here */
    .navbar {
      background-color: #ffffff; /* Change background color */
      box-shadow: 0 2px 4px rgba(0,0,0,0.1); /* Add a shadow */
    }
    .navbar-brand {
      font-weight: bold; /* Make the brand text bold */
      color: #333333; /* Change brand text color */
    }
    .nav-link {
      color: #555555; /* Change link text color */
      transition: color 0.3s ease-in-out; /* Smooth transition */
    }
    .nav-link:hover {
      color: #000000; /* Change link text color on hover */
    }
    .nav-link.active {
      font-weight: bold; /* Make active link text bold */
      color: #000000; /* Change active link text color */
    }
  </style>
</head>
<body>
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Your Brand</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="cart.php">Cart</a>
            </li>
              <li class="nav-item">
              <a class="nav-link" href="about.php">About</a>
            </li>
            <!-- Add more nav-items as needed -->
          </ul>
        </div>
      </div>
    </nav>

    <!-- Your content goes here -->

    <!-- Bootstrap JS (optional, for dropdowns and toggling functionality) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="..." crossorigin="anonymous"></script>
</body>
</html>
