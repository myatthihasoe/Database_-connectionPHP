<?php

require_once("Style/head.php");
require_once("Nav.php");
require_once("Database/Connect.php");
try {
    $products = "SELECT * FROM products";
    $stmt = $pdo->query($products);

    $product_array = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // echo "<pre>";
    // print_r($product_array);
} catch (PDOException $e) {
    echo $e->getMessage();
}

?>

<style>
    img{
        width: 200px;
        height: 200px;
        object-fit: cover;
    }
</style>

<div class="container row d-flex ">
    <?php foreach ($product_array as $key=>$val) : ?>
        <div class="card col-lg-3 col-md-6 col-sm-12 me-5 mb-5" >
            <img src="https://imageio.forbes.com/specials-images/imageserve/5d35eacaf1176b0008974b54/2020-Chevrolet-Corvette-Stingray/0x0.jpg?format=jpg&crop=4560,2565,x790,y784,safe&width=960" class="card-img-top py-2" alt="redCar" >
            <div class="card-body">

                <h5 class="card-title"><?= $val['product_name']?></h5>
                <p class="card-text"><?= $val['product_description']?></p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Category: <?= $val['product_category']?></li>
                <li class="list-group-item">Price: <?= $val['product_price']?>.Ks</li>
                <li class="list-group-item">Stock: <?= $val['product_stock']?></li>
            </ul>
            <div class="card-body">
                <button class="btn btn-outline-primary">Add to Cart</button>
                <button class="btn btn-outline-danger">View Detail</button>

            </div>
        </div>
    <?php endforeach ?>
</div>