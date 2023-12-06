<?php
$pageTitle = "Home";
include "view-header.php";
include 'functions.php';

// get items from the database with a LIMIT clause
$limit = 10; // Adjust the limit based on your needs
$items = getLimitedItems($limit);

if ($items !== false && $items->num_rows > 0) {
    echo "<div class='container'>";
    echo "<h1 class='mt-5 mb-4'>Items</h1>";

    while ($row = $items->fetch_assoc()) {
        // check if the keys exist
        if (isset($row['name'], $row['description'], $row['item_ID'])) {
            // Bootstrap card structure
            echo "<div class='card mb-3'>";
            echo "<div class='card-body'>";
            echo "<h5 class='card-title'>{$row['name']}</h5>";
            echo "<p class='card-text'>{$row['description']}</p>";
            echo "<a href='add-to-cart.php?item_id={$row['item_ID']}' class='btn btn-primary'>Add to Cart</a>";
            echo "</div>";
            echo "</div>";
        } else {
            echo "<div class='alert alert-danger' role='alert'>";
            echo "Invalid data fetched from the database.";
            echo "</div>";
            var_dump($row);
        }

        // Release the memory associated with the result set for the current row
        $items->free_result();
    }

    echo "</div>"; // Close the container
} else {
    echo "<div class='container'>";
    echo "<p>No items found.</p>";
    echo "</div>"; // Close the container
}

include "view-footer.php";
?>
