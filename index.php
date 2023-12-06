<?php
$pageTitle = "Home";
include "view-header.php"; 
include 'functions.php'; 

// get items from the database
$items = getItems();

if ($items !== false && $items->num_rows > 0) {
    echo "<h1>Items</h1>";

    while ($row = $items->fetch_assoc()) {
        // check if the keys exist
        if (isset($row['name'], $row['description'], $row['item_ID'])) {
            echo "<p>{$row['name']} - {$row['description']} 
            <a href='add-to-cart.php?item_id={$row['item_ID']}'>Add to Cart</a></p>";
        } else {
            echo "<p>Invalid data fetched from the database.</p>";
            var_dump($row); 
        }
    }
} else {
    echo "No items found.";
}

include "view-footer.php"; 
?>

