<?php
session_start();

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
        }
    } else {
        echo "<p>Your cart is empty.</p>";
    }
}
?>
