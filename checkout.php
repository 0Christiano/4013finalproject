<?php
session_start();
include('quote-functions.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_checkout'])) {
    // Get customer information from the form
    $name = $_POST['name'];
    $address = $_POST['address'];
    $creditCard = $_POST['credit_card'];

    // Prepare customer information
    $customerInfo = "Name: $name, Address: $address, Credit Card: $creditCard";

    // Save user information to the Quote table
    $quoteId = saveQuote($customerInfo);

    // Get cart items
    $cartItems = getCartItems();

    // Save cart items to the Quote_Item table
    foreach ($cartItems as $itemId) {
        saveQuoteItem($quoteId, $itemId);
    }

    // Clear the user's cart after checkout
    clearCart();

    // Redirect or display a success message
    header('Location: success.php');
    exit();
} else {
    // Redirect to the checkout form if accessed without proper submission
    header('Location: checkout-form.php');
    exit();
}
?>
