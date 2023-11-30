<?php
include('util-db.php'); // Include the file containing get_db_connection() function

// Function to get items from the database
function getItems() {
    $conn = get_db_connection(); // Get the database connection
    
    if ($conn === false) {
        return false; // Return false if the connection fails
    }

    // Your SQL query to retrieve items (adjust column names as needed)
    $sql = "SELECT item_ID, name, description FROM Item";

    $result = $conn->query($sql); // Execute the query

    if (!$result) {
        return false; // Return false if the query fails
    }

    return $result; // Return the query result (should be a MySQLi result object)
}
function getCartItems() {
    if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
        return []; // Return an empty array if cart is empty or not set
    } else {
        return $_SESSION['cart']; // Return cart items from session
    }
}
?>
