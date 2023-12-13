<?php
session_start();
include('quote-functions.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_checkout'])) {
    // ... (your existing PHP code remains unchanged)
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

        .card {
            margin-bottom: 20px;
        }

        .card-header {
            background-color: #007bff;
            color: #fff;
        }

        .card-body {
            padding: 20px;
        }

        .btn-primary {
            background-color: #007bff;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2 class="text-center">Checkout Confirmation</h2>
            </div>
            <div class="card-body">
                <p class="lead">Thank you for your purchase! Your order has been successfully processed.</p>

                <!-- Display customer information if needed -->
                <p>Customer Information: <?php echo htmlspecialchars($customerInfo); ?></p>

                <a href="index.php" class="btn btn-primary btn-block">Back to Home</a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies (add them at the end of the body for better performance) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
