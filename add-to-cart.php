<?php
session_start();
include('functions.php');

if (isset($_GET['item_id'])) {
    $itemId = $_GET['item_id'];
    addToCart($itemId); 
     
    header('Location: cart.php');
    exit();
}
?>
