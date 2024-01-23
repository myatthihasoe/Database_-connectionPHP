<?php
session_start();
$id = $_GET['item_id'];
unset($_SESSION['cart'][$id]);
header("Location: Cart.php");

?>