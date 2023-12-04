<?php
session_start();
include('quote-functions.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle form submission
    $customerInfo = $_POST['customer_info']; // Assuming a field named 'customer_info' contains all customer details

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
}
?>
