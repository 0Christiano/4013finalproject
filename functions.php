<?php
// Function to get items from the database
function getItems() {
    $conn = get_db_connection(); // Get the database connection
    
    if ($conn === false) {
        return false; // Return false if the connection fails
    }

    $sql = "SELECT * FROM Item"; // Your SQL query to retrieve items
    $result = $conn->query($sql); // Execute the query

    if (!$result) {
        return false; // Return false if the query fails
    }

    return $result; // Return the query result (should be a MySQLi result object)
}
?>
