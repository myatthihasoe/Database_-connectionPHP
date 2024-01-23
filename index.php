<?php

require_once("Style/head.php");
require_once("Nav.php");
require_once("Database/Connect.php");
// session_start(); //session use yin start yay ya
// unset($_SESSION);//clear session

if (isset($_POST['add_to_cart'])) {
    $id = $_POST['idKey'];
    header("Location: addToCartSession.php?id=$id");
}
$products = "SELECT * FROM products";

try {
    $stmt = $pdo->query($products);

    $product_array = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // echo "<pre>";
    // print_r($product_array);
} catch (PDOException $e) {
    echo $e->getMessage();
}

?>

<style>
    img {
        width: 200px;
        height: 200px;
        object-fit: cover;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-1">

        </div>
        
        <div class="col-10">
            <div class="container row row-cols-3 d-flex ">
                <?php foreach ($product_array as $key => $val) : ?>
                     <div class="p-2 col-lg-4 col-md-6 col-sm-12 col-12">  
                        <!-- dividing with this number to grid total 12  -->
                        <div class="card ">

                            <?php
                            $img = $val['product_img'];
                            $img = substr($img, 3); //../images ka ../ ko delete
                            ?>

                            <img src="<?= $img ?>" class="card-img-top py-2" alt="photo not available">
                            <div class="card-body">

                                <h5 class="card-title"><?= $val['product_name'] ?></h5>
                                <p class="card-text"><?= $val['product_description'] ?></p>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Category: <?= $val['product_category'] ?></li>
                                <li class="list-group-item">Price: <?= $val['product_price'] ?>.Ks</li>
                                <li class="list-group-item">Stock: <?= $val['product_stock'] ?></li>
                            </ul>
                            <div class="card-body">
                                <form method="POST">
                                    <input type="hidden" value="<?= $val['product_id'] ?>" name="idKey">
                                    <button class="btn btn-outline-primary" name="add_to_cart">Add to Cart</button>
                                    <button class="btn btn-outline-danger" name="">View Detail</button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>

        <div class="col-1">

        </div>
    </div>
</div>