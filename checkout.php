<?php
session_start();
include('quote-functions.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_checkout'])) {
    // customer information we are getting from the form 
    $id = $_POST['id'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $creditCard = $_POST['credit_card'];

    // Validate and sanitize user inputs (add your validation/sanitization logic here)

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

        //redirect to index(home)
        header('Location: index.php');
        exit();
    } else {
        echo "<p>Failed to save user information into the statement table.</p>";
    }
} else {
    // redirect to the checkout form 
    header('Location: checkout-form.php');
    exit();
}
?>
