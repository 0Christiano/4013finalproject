<?php
$pageTitle = "Home";
include "view-header.php";
include('functions.php');

// Get items from the database
$items = getItems();

if ($items !== false && $items->num_rows > 0) {
    echo "<h1>Items</h1>";

    while ($row = $items->fetch_assoc()) {
        // Check if the keys exist in the fetched row before accessing them
        if (isset($row['name']) && isset($row['description']) && isset($row['item_id'])) {
            echo "<p>{$row['name']} - {$row['description']} 
            <a href='add_to_cart.php?item_id={$row['item_i
