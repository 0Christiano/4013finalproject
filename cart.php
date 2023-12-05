<?php
session_start();
include('functions.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['remove_item'])) {
        $itemId = $_POST['item_id'];
        removeFromCart($itemId); 
    } elseif (isset($_POST['proceed_to_checkout'])) {
        
        $id = $_POST['id']; 
        $name = $_POST['name'];
        $address = $_POST['address'];
        $creditCard = $_POST['credit_card'];

        // inserts the user input into the quote table of db
        $quoteId = saveQuote($id, $name, $address, $creditCard); // functions.php

        if ($quoteId) {
            // get cart items
            $cartItems = getCartItems(); // functions.php

            // cart items into quote
            saveCartQuote($quoteId, $cartItems); // in review??

            // clear the cart after checkout
            clearCart();

            // success message WIP
            echo "<p>Checkout successful! Thank you for your purchase.</p>";
        } else {
            echo "<p>Failed to save user information into the statement table.</p>";
        }
    }
}

if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    echo "<p>Your cart is empty.</p>";
} else {

    include('functions.php');

    // get cart items
    $cartItems = getCartItems(); // functions.php

    if (!empty($cartItems)) {
        foreach ($cartItems as $itemID) {
            
            $itemDetails = getItemDetails($itemID); // functions.php

            // item details
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
        echo "<form method='post' action='checkout.php'>";
        echo "<input type='submit' name='proceed_to_checkout' value='Proceed to Checkout'>";
        echo "</form>";

    } else {
        echo "<p>Your cart is empty.</p>";
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['remove_item'])) {
    $itemId = $_POST['item_id'];
    removeFromCart($itemId); // functions.php
  
}
      echo "<p><a href='index.php'>Back to Home</a></p>";
?>

