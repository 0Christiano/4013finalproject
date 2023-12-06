<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=$pageTitle?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
      body {
        font-family: 'Arial', sans-serif;
        background-color: #f8f9fa; /* Light gray background color */
      }

      .container {
        margin-top: 20px;
      }

      .navbar {
        background-color: #007bff; /* Bootstrap primary color */
      }

      .navbar-brand {
        color: #fff; /* White text color for the brand */
      }

      .navbar-toggler-icon {
        background-color: #fff; /* White color for the toggler icon */
      }

      .navbar-nav {
        margin-left: auto;
      }

      .nav-link {
        color: #fff; /* White text color for the links */
        margin-right: 15px;
      }

      .nav-link.active {
        font-weight: bold; /* Bold font for the active link */
      }
    </style>
  </head>
  <body>
    <div class="container">
      <nav class="navbar navbar-expand-lg">
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
            </ul>
          </div>
        </div>
      </nav>
      <!-- Your homepage content goes here -->
    </div>
  </body>
</html>
