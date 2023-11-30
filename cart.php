<?php
session_start();
include('functions.php');

//get cart items
$cartItems = getCartItems();
?>

<!-- display cart items -->
<h1>Cart</h1>
<?php
if (!empty($cartItems)) {
    foreach ($cartItems as $item_id) {
        
        $itemDetails = getItemDetails($$item_id);

        echo "<p>Item ID: " . $itemDetails['id'] . "</p>";
        echo "<p>Item Name: " . $itemDetails['name'] . "</p>";
        echo "<p>Item Price: " . $itemDetails['price'] . "</p>";

       echo "<hr>";
    }
} else {
    echo "<p>Your cart is empty.</p>";
}
?>
