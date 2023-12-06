<?php
include_once('util-db.php'); 

//  save user information into the Quote table
function saveQuote($id, $name, $address, $creditCard) {
    $conn = get_db_connection(); // get the db
    
    if ($conn === false) {
        return false; 
    }

    // escape the variables to avoid sql injection
    $safeId = mysqli_real_escape_string($conn, $id);
    $safeName = mysqli_real_escape_string($conn, $name);
    $safeAddress = mysqli_real_escape_string($conn, $address);
    $safeCreditCard = mysqli_real_escape_string($conn, $creditCard);

    // insert customer information into the Quote table
    $sql = "INSERT INTO Quote (ID, name, address, credit_card) 
            VALUES ('$safeId', '$safeName', '$safeAddress', '$safeCreditCard')";

    if ($conn->query($sql) === TRUE) {
        return $conn->insert_id; // return generated Quote ID
    } else {
        return false; // return false if the insertion fails
    }
}
function saveQuoteItem($quoteId, $itemId) {
    $conn = get_db_connection(); 

    if ($conn === false) {
        return false; // return false if the connection fails
    }

    // escape the variables to avoid sql injection
    $safeQuoteId = mysqli_real_escape_string($conn, $quoteId);
    $safeItemId = mysqli_real_escape_string($conn, $itemId);

    // insert cart items into the Quote_Item table
    $sql = "INSERT INTO Quote_Item (quote_id, item_id) 
            VALUES ('$safeQuoteId', '$safeItemId')";

    return $conn->query($sql); // return the result
}

function clearCart() {
    if (isset($_SESSION['cart'])) {
        unset($_SESSION['cart']); 
    }
}

function getCartItems() {
    if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
        return []; // return empty array if cart is empty or not set
    } else {
        return $_SESSION['cart']; // return cart items 
    }
}
?>
