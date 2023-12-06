<?php
include_once('util-db.php'); // Include the file containing get_db_connection() function

// get items from the database
if (!function_exists('getItems')) {
    function getItems() {
        $conn = get_db_connection(); // Get the database connection

        if ($conn === false) {
            return false; 
        }

        //  sql query to retrieve items 
        $sql = "SELECT item_ID, name, description FROM Item";

        $result = $conn->query($sql); 

        if (!$result) {
            return false; 
        }

        return $result; // return result
    }
}

// get cart items
if (!function_exists('getCartItems')) {
    function getCartItems() {
        if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
            return []; // Return an empty array if cart is empty or not set
        } else {
            return $_SESSION['cart']; // Return cart items from session
        }
    }
}

// add an item to the cart
if (!function_exists('addToCart')) {
    function addToCart($itemId) {
        $_SESSION['cart'][] = $itemId;
    }
}

if (!function_exists('removeFromCart')) {
    function removeFromCart($itemId) {
        if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
            return; // nothing to remove if the cart is empty
        }

        // locate the index of the item in the cart
        $index = array_search($itemId, $_SESSION['cart']);

        if ($index !== false) {
            //remove the item from the cart 
            unset($_SESSION['cart'][$index]);

            // reset array keys 
            $_SESSION['cart'] = array_values($_SESSION['cart']);
        }
    }
}

//get item details based on item ID
if (!function_exists('getItemDetails')) {
    function getItemDetails($itemID) {
        $conn = get_db_connection(); // get the database connection

        if ($conn === false) {
            return false; 
        }

        // sql query to retrieve item details based on $itemID
        $sql = "SELECT item_ID, name, description FROM Item WHERE item_ID = $itemID";

        $result = $conn->query($sql); 

        if (!$result || $result->num_rows == 0) {
            return false; 
        }

        $itemDetails = $result->fetch_assoc(); // get item details

        return $itemDetails; // return the item details as an associative array
    }
}

// save quote information to the database
if (!function_exists('saveQuote')) {
    function saveQuote($id, $name, $address, $creditCard) {
        $conn = get_db_connection(); // Get the database connection

        if ($conn === false) {
            return false; // Return false if the connection fails
        }

        // clean inputs
        $id = mysqli_real_escape_string($conn, $id);
        $name = mysqli_real_escape_string($conn, $name);
        $address = mysqli_real_escape_string($conn, $address);
        $creditCard = mysqli_real_escape_string($conn, $creditCard);

        // insert into the "Quote" table
        $query = "INSERT INTO Quote (id, name, address, credit_card) VALUES ('$id', '$name', '$address', '$creditCard')";

        if (mysqli_query($conn, $query)) {
            // return the ID of the inserted record
            return mysqli_insert_id($conn);
        } else {
          
            return false;
        }
    }
}

// save cart items associated with a quote
if (!function_exists('saveCartQuote')) {
    function saveCartQuote($quoteId, $cartItems) {
        $conn = get_db_connection(); // get the database connection

        if ($conn === false) {
            return false; 
        }

        // go through cart items and insert them into the "Cart_Quote" table
        foreach ($cartItems as $itemID) {
            $itemID = mysqli_real_escape_string($conn, $itemID);
            $query = "INSERT INTO Cart_Quote (quote_ID, item_ID) VALUES ('$quoteId', '$itemID')";
            mysqli_query($conn, $query);
        }

        return true; 
    }
}


?>
