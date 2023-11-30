<?php
include('util-db.php'); // Include the file containing your database connection function

// Function to get database connection
function get_db_connection(){
    $conn = get_db_connection(); // Replace this with your actual function to establish a database connection
    return $conn;
}

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
