<?php
// Include the necessary files or define global functions and variables
include_once('util-db.php'); // Include the file containing get_db_connection() function

// Function to get items from the database
if (!function_exists('getItems')) {
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
}

// Function to get cart items
if (!function_exists('getCartItems')) {
    function getCartItems() {
        if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
            return []; // Return an empty array if cart is empty or not set
        } else {
            return $_SESSION['cart']; // Return cart items from session
        }
    }
}

// Function to add an item to the cart
if (!function_exists('addToCart')) {
    function addToCart($itemId) {
        // Your logic to add the item to the cart (using session or database)
        // Example: adding $itemId to the $_SESSION['cart'] array
        $_SESSION['cart'][] = $itemId;
    }
}

if (!function_exists('removeFromCart')) {
    function removeFromCart($itemId) {
        if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
            return; // Nothing to remove if the cart is empty
        }

        // Find the index of the item in the cart
        $index = array_search($itemId, $_SESSION['cart']);

        if ($index !== false) {
            // Remove the item from the cart array
            unset($_SESSION['cart'][$index]);

            // Reset array keys to avoid gaps
            $_SESSION['cart'] = array_values($_SESSION['cart']);
        }
    }
}

// Function to get item details based on item ID
if (!function_exists('getItemDetails')) {
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
}

// Function to save quote information to the database
if (!function_exists('saveQuote')) {
    function saveQuote($id, $name, $address, $creditCard) {
        $conn = get_db_connection(); // Get the database connection

        if ($conn === false) {
            return false; // Return false if the connection fails
        }

        // Sanitize inputs (you should perform proper validation and sanitation)
        $id = mysqli_real_escape_string($conn, $id);
        $name = mysqli_real_escape_string($conn, $name);
        $address = mysqli_real_escape_string($conn, $address);
        $creditCard = mysqli_real_escape_string($conn, $creditCard);

        // Insert into the "Quote" table
        $query = "INSERT INTO Quote (id, name, address, credit_card) VALUES ('$id', '$name', '$address', '$creditCard')";

        if (mysqli_query($conn, $query)) {
            // Return the ID of the inserted record
            return mysqli_insert_id($conn);
        } else {
            // Return false if the insertion fails
            return false;
        }
    }
}

// Function to save cart items associated with a quote
if (!function_exists('saveCartQuote')) {
    function saveCartQuote($quoteId, $cartItems) {
        $conn = get_db_connection(); // Get the database connection

        if ($conn === false) {
            return false; // Return false if the connection fails
        }

        // Iterate through cart items and insert them into the "Cart_Quote" table
        foreach ($cartItems as $itemID) {
            $itemID = mysqli_real_escape_string($conn, $itemID);
            $query = "INSERT INTO Cart_Quote (quote_ID, item_ID) VALUES ('$quoteId', '$itemID')";
            mysqli_query($conn, $query);
        }

        return true; // Return true on success
    }
}

// Other functions...
?>
