<?php
session_start();
include('functions.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <!-- Add Bootstrap CSS link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            padding-top: 60px; /* Adjust based on your navbar height */
        }

        .cart-item {
            border: 1px solid #ccc;
            margin-bottom: 15px;
            padding: 15px;
            border-radius: 5px;
        }

        .checkout-form {
            margin-top: 15px;
        }
    </style>
</head>

<body>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="index.php">Your Company Name</a>
    </nav>

    <div class="container">

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['remove_item'])) {
                $itemId = $_POST['item_id'];
                removeFromCart($itemId);
            } elseif (isset($_POST['proceed_to_checkout'])) {
                // ... (your existing code for checkout)
            }
        }

        // Check if the cart is empty
        if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
            echo "<p>Your cart is empty.</p>";
        } else {
            // Get cart items
            $cartItems = getCartItems();

            if (!empty($cartItems)) {
                echo "<div class='row'>";
                foreach ($cartItems as $itemID) {
                    $itemDetails = getItemDetails($itemID);

                    // Display item details in cards
                    echo "<div class='col-md-4'>";
                    echo "<div class='card cart-item'>";
                    echo "<div class='card-body'>";
                     echo "<h5 class='card-title'>{$itemDetails['item_ID']}</h5>";
                    echo "<h5 class='card-title'>{$itemDetails['name']}</h5>";
                    echo "<p class='card-text'>{$itemDetails['description']}</p>";
                    echo "<form method='post' action='cart.php'>";
                    echo "<input type='hidden' name='item_id' value='$itemID'>";
                    echo "<input type='submit' name='remove_item' value='Remove' class='btn btn-danger'>";
                    echo "</form>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                }
                echo "</div>";

                // Proceed to checkout button
                echo "<form class='checkout-form' method='post' action='checkout.php'>";
                echo "<input type='submit' name='proceed_to_checkout' value='Proceed to Checkout' class='btn btn-primary'>";
                echo "</form>";
            } else {
                echo "<p>Your cart is empty.</p>";
            }
        }
        ?>

        <p><a href='index.php'>Back to Home</a></p>

    </div>

    <!-- Add Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
