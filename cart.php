<?php

session_start();
include('functions.php');

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
        echo "<form method='post' action='checkout.php'>"; // Replace 'checkout.php' with the actual checkout page
        echo "<input type='submit' name='proceed_to_checkout' value='Proceed to Checkout'>";
        echo "</form>";
    } else {
        echo "<p>Your cart is empty.</p>";
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

