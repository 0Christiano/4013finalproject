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

    // Fetch the data into an associative array
    $items = [];
    while ($row = $result->fetch_assoc()) {
        $items[] = $row; // Add each row (item) to the $items array
    }

    return $items; // Return the array of items fetched from the database
}
?>
