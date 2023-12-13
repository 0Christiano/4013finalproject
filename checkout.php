<?php
session_start();
include('quote-functions.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_checkout'])) {
    // customer information we are getting from the form 
    $id = $_POST['id'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $creditCard = $_POST['credit_card'];

    // concatenate user information into a single string
    $customerInfo = "ID: $id, Name: $name, Address: $address, Credit Card: $creditCard";

    // save to the quote table
    $quoteId = saveQuote($id, $name, $address, $creditCard);

    if ($quoteId) {
        // Get cart items
        $cartItems = getCartItems();

        // save cart items to the Quote_Item table
        foreach ($cartItems as $itemId) {
            saveQuoteItem($quoteId, $itemId);
        }

        // clear cart after checkout 
        clearCart();

        // Redirect to index (home)
        header('Location: index.php');
        exit();
    } else {
        echo "<p class='text-danger'>Failed to save user information into the statement table.</p>";
    }
} else {
    // Redirect to the checkout form 
    header('Location: checkout-form.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Confirmation</title>
    <!-- Add your custom stylesheets or link to a CSS file here -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: auto;
        }

        h2 {
            color: #007bff;
        }

        p {
            font-size: 18px;
            margin-bottom: 20px;
        }

        .btn {
            background-color: #007bff;
            color: #fff;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>Checkout Confirmation</h2>

        <p>Thank you for your purchase! Your order has been successfully processed.</p>

        <!-- Display customer information if needed -->
        <p>Customer Information: <?php echo htmlspecialchars($customerInfo); ?></p>

        <a href="index.php" class="btn btn-primary">Back to Home</a>
    </div>

    <!-- Bootstrap JS and dependencies (add them at the end of the body for better performance) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
