<?php
require_once("./Style/head.php");
session_start();

if (isset($_SESSION['cart'])) {
}

// print_r($_SERVER['REQUEST_METHOD']);
// if(isset($_POST['increase'])){
//     $id = $_POST['id'];
// }
// if(isset($_POST['decrease'])){
//     $id = $_POST['id'];
// }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $id = $_POST['id'];
    if (isset($_POST['increase'])) {
        $_SESSION['cart'][$id]['qty']++;
    }
    if (isset($_POST['decrease'])) {
        $count =  $_SESSION['cart'][$id]['qty'];
        if ($count > 0) {
            $_SESSION['cart'][$id]['qty']--;
        }
    }
    if (isset($_POST['delete'])) {
        echo '<script>Confirm("Are you sure to delete")</script>';
        unset($_SESSION['cart'][$id]);
    }
} else {
    echo "there is no id";
}

//Total Price Calculation
$total = 0;
foreach($_SESSION['cart'] as $product){
    $total += $product['qty'] * $product['price'];
}

?>
<link rel="stylesheet" href="Style/cart.css">

<div class="container px-3 my-5 clearfix">
    <!-- Shopping cart table -->
    <div class="card">
        <div class="card-header">
            <h2>Shopping Cart</h2>
            <?php echo empty($_SESSION['cart']) ? "<h2>There is no item in your cart </h2>" : "" ?>
            <br>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered m-0">
                    <thead>
                        <tr>
                            <!-- Set columns width -->
                            <th class="text-center py-3 px-4" style="min-width: 400px;">Name</th>
                            <th class="text-right py-3 px-4" style="width: 100px;">Category</th>
                            <th class="text-center py-3 px-4" style="width: 120px;">Quantity</th>
                            <th class="text-right py-3 px-4" style="width: 100px;">Price</th>
                            <th class="text-center py-3 px-4">Description</th>
                            <th class="text-center align-middle py-3 px-0" style="width: 40px;"><i class="ino ion-md-trash"></i></a></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (isset($_SESSION['cart'])) : ?>
                            <?php foreach ($_SESSION['cart'] as $key => $product) : ?>
                                <?php $img = substr($product['image'], 3) ?>
                                <tr>
                                    <td class="p-4">
                                        <div class="media align-items-center">
                                            <img src=<?= $img ?> class="d-block ui-w-40 ui-bordered mr-4" alt="">
                                            <div class="media-body">
                                                <a href="#" class="d-block text-dark"><?= $product['name'] ?></a>
                                                <small>
                                                    <span class="text-muted">Color:</span>
                                                    <span class="ui-product-color ui-product-color-sm align-text-bottom" style="background:#e81e2c;"></span> &nbsp;
                                                    <span class="text-muted">Size: </span> EU 37 &nbsp;
                                                    <span class="text-muted">Ships from: </span> China
                                                </small>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-right font-weight-semibold align-middle p-4">
                                        <?= $product['category'] ?>
                                    </td>
                                    <form method="POST">

                                        <td class="align-middle p-4 " style="width: 200px;">
                                            <!-- To send id when increase decrease button clicked for post -->
                                            <input type="hidden" value=<?= $product['id'] ?> name="id">
                                            <div class="d-flex">
                                                <button class="btn btn-light  m-1 btn-outline-success" name="increase"><strong>+</strong></button>
                                                <input type="text" class="form-control text-center" readonly value=<?= $product['qty'] ?>>
                                                <button class="btn btn-light  m-1 btn-outline-success" name="decrease"><strong>-</strong></button>
                                            </div>
                                        </td>
                                        <td class="text-right font-weight-semibold align-middle p-4">
                                            <?= $product['price'] ?>
                                        </td>
                                        <td class="align-middle p-4">
                                            <?= $product['description'] ?>
                                        </td>
                                        <td class="text-center align-middle px-0">
                                            <button class="btn btn-dark" name="delete" title="delete">×</button>
                                        </td>
                                    </form>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <!-- / Shopping cart table -->

            <div class="d-flex flex-wrap justify-content-between align-items-center pb-4">
                <div class="mt-4">
                    <label class="text-muted font-weight-normal">Promocode</label>
                    <input type="text" placeholder="ABC" class="form-control">
                </div>
                <div class="d-flex">
                    <!-- <div class="text-right mt-4 mr-5">
                        <label class="text-muted font-weight-normal m-0">Discount</label>
                        <div class="text-large"><strong>$20</strong></div>
                    </div> -->
                    <div class="text-right mt-4">
                        <label class="text-muted font-weight-normal m-0">Total price</label>
                        <div class="text-large"><strong><?= $total ?></strong></div>
                    </div>
                </div>
            </div>

            <div class="float-right">
                <!-- <button type="button" class="btn btn-lg btn-default md-btn-flat mt-2 mr-3">Back to shopping</button> -->
                <a href="index.php" class="btn btn-lg btn-outline-success mt-2">Back to shopping</a>
                <button type="button" class="btn btn-lg btn-primary mt-2">Checkout</button>
            </div>

        </div>
    </div>
</div>