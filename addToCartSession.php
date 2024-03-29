<?php
require_once("Database/Connect.php");
session_start();
// unset($_SESSION['cart']);

// echo "this is add to cart session page";
$id = $_GET['id'];
echo $id;

$get_product = "SELECT * FROM products WHERE product_id='$id'";
$stmt = $pdo->prepare($get_product);
$stmt->execute();
$product = $stmt->fetch(PDO::FETCH_ASSOC);
// echo "<pre>";
// print_r($product);

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
        'name' =>$product['product_name'],
        'category' => $product['product_category'],
        'price' =>$product['product_price'],
        'stock' =>$product['product_stock'],
        'description' =>$product['product_description'],
        'image' =>$product['product_img'],
        'qty' => 1,
    ];
}

header("Location: index.php");

// print_r($_SESSION);
