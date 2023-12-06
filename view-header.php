<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $pageTitle ?></title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!-- Your Custom CSS -->
    <style>
        /* Background Pattern */
        body {
            background: linear-gradient(45deg, #f3f3f3 25%, transparent 25%, transparent 75%, #f3f3f3 75%, #f3f3f3),
                linear-gradient(-45deg, #f3f3f3 25%, transparent 25%, transparent 75%, #f3f3f3 75%, #f3f3f3);
            background-size: 20px 20px;
            background-color: #f8f9fa; /* Fallback color */
        }

        /* Customize your navbar here */
        .navbar {
            background-color: #ffffff; /* Change background color */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Add a shadow */
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

        /* Style for the item cards */
        .item-card {
            border: 1px solid #ccc;
            margin: 15px;
            padding: 15px;
            border-radius: 5px;
        }

        .item-image {
            max-width: 100%;
            height: auto;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">CJ's MarketPlace</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
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

        <!-- Sample item cards with images -->
        <div class="item-card">
            <img src="data:image/jpeg;base64,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" alt="Item 1" class="item-image">
            <h5 class="card-title">Item 1</h5>
            <p class="card-text">Description of Item 1.</p>
            <a href="#" class="btn btn-primary">Add to Cart</a>
        </div>

        <div class="item-card">
            <img src="https://www.google.com/imgres?imgurl=https%3A%2F%2Fm.media-amazon.com%2Fimages%2FI%2F71Vgww%2BoVrL._AC_UF894%2C1000_QL80_.jpg&tbnid=sHxmLwL1JqzzCM&vet=12ahUKEwiotMWm4vuCAxU2yMkDHTHACM8QMygAegUIARDqAQ..i&imgrefurl=https%3A%2F%2Fwww.amazon.com%2FMotherboard-Computer-Desktop-Support-Realtek811%2Fdp%2FB0BQGJYQM7&docid=GXCKGv2zbXoCoM&w=894&h=653&q=motherboard%20of%20computer&ved=2ahUKEwiotMWm4vuCAxU2yMkDHTHACM8QMygAegUIARDqAQ" alt="Item 2" class="item-image">
            <h5 class="card-title">Item 2</h5>
            <p class="card-text">Description of Item 2.</p>
            <a href="#" class="btn btn-primary">Add to Cart</a>
        </div>

        <div class="item-card">
            <img src="https://ptgmedia.pearsoncmg.com/images/chap3_9780789756459/elementLinks/03fig02.jpg" alt="Item 2" class="item-image">
            <h5 class="card-title">Item 3</h5>
            <p class="card-text">Description of Item 3.</p>
            <a href="#" class="btn btn-primary">Add to Cart</a>
        </div>

        <!-- Add more item cards as needed -->

        <!-- Bootstrap JS (optional, for dropdowns and toggling functionality) -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
            integrity="..." crossorigin="anonymous"></script>
    </div>
</body>

</html>
