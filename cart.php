<?php
session_start();
include('functions.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['remove_item'])) {
        $itemId = $_POST['item_id'];
        removeFromCart($itemId); // You need to create this function in functions.php
    } elseif (isset($_POST['proceed_to_checkout'])) {
        // Retrieve user information from the form
        $id = $_POST['id']; // Assuming you have an 'id' field in your form
        $name = $_POST['name'];
        $address = $_POST['address'];
        $creditCard = $_POST['credit_card'];

        // Validate and sanitize user inputs
        // You should implement proper validation and sanitization here

        // Insert user information into the "Quote" table
        $quoteId = saveQuote($id, $name, $address, $creditCard); // You'll need to create this function in functions.php

        if ($quoteId) {
            // Get cart items
            $cartItems = getCartItems(); // You'll need to create this function in functions.php

            // Insert cart items into the "Quote" table, associating them with the quote
            saveCartQuote($quoteId, $cartItems); // You'll need to create this function in functions.php

            // Clear the cart after successful checkout
            clearCart();

            // Display a success message or redirect to a thank you page
            echo "<p>Checkout successful! Thank you for your purchase.</p>";
        } else {
            echo "<p>Failed to save user information into the statement table.</p>";
        }
    }
}

if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    echo "<p>Your cart is empty.</p>";
} else {
    // Include necessary files/functions
    include('functions.php');

    // Get cart items
    $cartItems = getCartItems(); // You'll need to create this function in functions.php

    if (!empty($cartItems)) {
        foreach ($cartItems as $itemID) {
            // Get item details based on $itemID (function to fetch item details)
            $itemDetails = getItemDetails($itemID); // You'll need to create this function in functions.php

            // Display item details
            echo "<p>Item ID: " . $itemDetails['item_ID'] . "</p>";
            echo "<p>Item Name: " . $itemDetails['name'] . "</p>";
            echo "<p>Item Description: " . $itemDetails['description'] . "</p>";
            echo "<hr>";

             echo "<form method='post' action='cart.php'>";
            echo "<input type='hidden' name='item_id' value='$itemID'>";
            echo "<input type='submit' name='remove_item' value='Remove'>";
            echo "</form>";

            echo "<hr>";
        }
    } else {
        echo "<p>Your cart is empty.</p>";
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['remove_item'])) {
    $itemId = $_POST['item_id'];
    removeFromCart($itemId); // You need to create this function in functions.php
  
}
      echo "<p><a href='index.php'>Back to Home</a></p>";
?>

