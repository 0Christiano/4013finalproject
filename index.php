<?php
$pageTitle = "Home";
include "view-header.php";
?>
    <h1>4013 Final Project</h1>
  <?php
      include "view-footer.php";
?>


<?php
session_start();
include('functions.php');

// Get items from the database
$items = getItems();
?>

<!-- Display items -->
<h1>Items</h1>
<?php
while ($row = $items->fetch_assoc()) {
    echo "<p>{$row['name']} - {$row['description']} 
    <a href='add_to_cart.php?item_id={$row['item_id']}'>Add to Cart</a></p>";
}
?>
