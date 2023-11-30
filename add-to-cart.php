<?php
session_start();
include('functions.php');

// Check if item_id is received from the request
if (isset($_GET['item_id'])) {
    $itemId = $_GET['item_id'];
    addToCart($itemId); // Use $itemId instead of $item_id
     
    header('Location: cart.php');
    exit();
}

// Redirect back to the index page or cart page
// Example: header('Location: index.php');
?>
