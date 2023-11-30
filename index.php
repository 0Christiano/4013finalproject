<?php
$pageTitle = "Home";
include "view-header.php";
session_start();
include('functions.php');

// Get items from the database
$items = getItems();
?>

<!-- Display items -->
<h1>Items</h1>
<?php
while ($row = $items->fetch_assoc()) {
    echo "<p>{$row['item_name']} - {$row['other_details']} 
    <a href='add_to_cart.php?item_id={$row['item_id']}'>Add to Cart</a></p>";
}
?>

<?php
include "view-footer.php";
?>
