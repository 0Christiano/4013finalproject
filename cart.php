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
        // Retrieve item details from the database based on $itemId
        // Display the item details here
    }
} else {
    echo "<p>Your cart is empty.</p>";
}
?>
