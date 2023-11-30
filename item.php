<?php
session_start();
include('functions.php');

if (isset($_GET['item_id'])) {
    $itemId = $_GET['item_id'];

    // Retrieve item details from the database based on $itemId
    global $conn;
    $sql = "SELECT * FROM Item WHERE item_id = $itemId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $item = $result->fetch_assoc();
    } else {
        echo "Item not found.";
        exit();
    }
} else {
    echo "Item ID not provided.";
    exit();
}
?>

<!-- Display item details -->
<h1><?php echo $item['item_name']; ?></h1>
<p>Price: <?php echo $item['other_details']; ?></p>
<!-- Display other details as needed -->

<!-- Add to Cart button -->
<form action="add_to_cart.php" method="GET">
    <input type="hidden" name="item_id" value="<?php echo $item['item_id']; ?>">
    <input type="submit" value="Add to Cart">
</form>
