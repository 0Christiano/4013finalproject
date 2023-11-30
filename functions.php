<?php
// db connection
include('db_connection.php');

// gets items from db
function getItems() {
    global $conn;
    $sql = "SELECT * FROM Item";
    $result = $conn->query($sql);
    return $result;
}

// add items to cart
function addToCart($item_id) {
    // Example: $_SESSION['cart'][] = $itemId;
}

// get the cart items
function getCartItems() { 
    // Example: return $_SESSION['cart'];
}
?>
