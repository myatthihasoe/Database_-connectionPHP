<?php
session_start();
// unset($_SESSION['cart']);

// echo "this is add to cart session page";
$id = $_GET['id'];
echo $id;

//if session cart does not exist, create one.
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

//if session cart exists, add qunatity
if (isset($_SESSION['cart'][$id])) {
    $_SESSION['cart'][$id]['qty']++;
} else {
    $_SESSION['cart'][$id] = [
        'id' => $id,
        'qty' => 1,
    ];
}

header("Location: index.php");

// print_r($_SESSION);
