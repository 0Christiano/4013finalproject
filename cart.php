<?php
session_start();
include('functions.php');

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
        echo "<div class='cart-items'>";
        foreach ($cartItems as $itemID) {
            $itemDetails = getItemDetails($itemID);

            // Display item details
            echo "<div class='cart-item'>";
            echo "<p><strong>Item ID:</strong> " . $itemDetails['item_ID'] . "</p>";
            echo "<p><strong>Item Name:</strong> " . $itemDetails['name'] . "</p>";
            echo "<p><strong>Description:</strong> " . $itemDetails['description'] . "</p>";
            echo "<form method='post' action='cart.php'>";
            echo "<input type='hidden' name='item_id' value='$itemID'>";
            echo "<input type='submit' name='remove_item' value='Remove'>";
            echo "</form>";
            echo "</div>";
        }
        echo "</div>";

        // Proceed to checkout button
        echo "<form class='checkout-form' method='post' action='checkout.php'>";
        echo "<input type='submit' name='proceed_to_checkout' value='Proceed to Checkout'>";
        echo "</form>";
    } else {
        echo "<p>Your cart is empty.</p>";
    }
}

echo "<p><a href='index.php'>Back to Home</a></p>";
?>
