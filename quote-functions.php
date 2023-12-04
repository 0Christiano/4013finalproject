<?php
include_once('util-db.php'); // Include the file containing get_db_connection() function

// Function to save user information into the Quote table
function saveQuote($id, $name, $address, $creditCard) {
    $conn = get_db_connection(); // Get the database connection
    
    if ($conn === false) {
        return false; // Return false if the connection fails
    }

    // Escape the variables to prevent SQL injection
    $safeId = mysqli_real_escape_string($conn, $id);
    $safeName = mysqli_real_escape_string($conn, $name);
    $safeAddress = mysqli_real_escape_string($conn, $address);
    $safeCreditCard = mysqli_real_escape_string($conn, $creditCard);

    // SQL query to insert customer information into the Quote table
    $sql = "INSERT INTO Quote (ID, name, address, credit_card) 
            VALUES ('$safeId', '$safeName', '$safeAddress', '$safeCreditCard')";

    if ($conn->query($sql) === TRUE) {
        return $conn->insert_id; // Return the generated Quote ID
    } else {
        return false; // Return false if the insertion fails
    }
}
function saveQuoteItem($quoteId, $itemId) {
    $conn = get_db_connection(); // Get the database connection

    if ($conn === false) {
        return false; // Return false if the connection fails
    }

    // Escape the variables to prevent SQL injection
    $safeQuoteId = mysqli_real_escape_string($conn, $quoteId);
    $safeItemId = mysqli_real_escape_string($conn, $itemId);

    // SQL query to insert cart items into the Quote_Item table
    $sql = "INSERT INTO Quote_Item (quote_id, item_id) 
            VALUES ('$safeQuoteId', '$safeItemId')";

    return $conn->query($sql); // Return the result of the query (true or false)
}

function clearCart() {
    if (isset($_SESSION['cart'])) {
        unset($_SESSION['cart']); // Unset or clear the cart session variable
    }
}

function getCartItems() {
    if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
        return []; // Return an empty array if cart is empty or not set
    } else {
        return $_SESSION['cart']; // Return cart items from session
    }
}
// Other functions related to the Quote table...
?>
