<?php
// Include the necessary files or define global functions and variables
include('util-db.php'); // Include the file containing get_db_connection() function

// Function to get items from the database
function getItems() {
    $conn = get_db_connection(); // Get the database connection
    
    // Your existing getItems() function logic...
}

// Function to get cart items
function getCartItems() {
    // Your existing getCartItems() function logic...
}

// Function to add an item to the cart
function addToCart($itemId) {
    // Your existing addToCart() function logic...
}

// Function to get item details based on item ID
function getItemDetails($itemID) {
    $conn = get_db_connection(); // Get the database connection
    
    if ($conn === false) {
        return false; // Return false if the connection fails
    }

    // Your SQL query to retrieve item details based on $itemID
    $sql = "SELECT item_ID, name, description FROM Item WHERE item_ID = $itemID";

    $result = $conn->query($sql); // Execute the query

    if (!$result || $result->num_rows == 0) {
        return false; // Return false if the query fails or no item found
    }

    $itemDetails = $result->fetch_assoc(); // Fetch item details

    return $itemDetails; // Return the item details as an associative array
}
?>
