
<?php
include_once('util-db.php'); // Include the file containing get_db_connection() function

// Function to save user information into the Quote table
function saveQuote($customerInfo) {
    $conn = get_db_connection(); // Get the database connection
    
    if ($conn === false) {
        return false; // Return false if the connection fails
    }

    // Escape the customerInfo string to prevent SQL injection
    $escapedCustomerInfo = mysqli_real_escape_string($conn, $customerInfo);

    // SQL query to insert customer information into the Quote table
    $sql = "INSERT INTO Quote (statement) VALUES ('$escapedCustomerInfo')";

    if ($conn->query($sql) === TRUE) {
        return $conn->insert_id; // Return the generated Quote ID
    } else {
        return false; // Return false if the insertion fails
    }
}

// Other functions related to the Quote table...
?>
