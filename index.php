<?php
$pageTitle = "Home";
include "view-header.php"; // Include your header section
include 'functions.php'; // Include functions file

// Get items from the database
$items = getItems();

if ($items !== false && $items->num_rows > 0) {
    echo "<h1>Items</h1>";

    while ($row = $items->fetch_assoc()) {
        // Check if the keys exist in the fetched row before accessing them
        if (isset($row['name'], $row['description'], $row['item_ID'])) {
            echo "<p>{$row['name']} - {$row['description']} 
            <a href='add-to-cart.php?item_id={$row['item_ID']}'>Add to Cart</a></p>";
        } else {
            echo "<p>Invalid data fetched from the database.</p>";
            var_dump($row); // Output the fetched row for debugging purposes
        }
    }
} else {
    echo "No items found.";
}

include "view-footer.php"; // Include your footer section
?>
