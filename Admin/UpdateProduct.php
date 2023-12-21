<?php
require_once("../Style/head.php");
require_once("../Database/Connect.php");
$id = $_GET['id'];
$view_products = "SELECT * FROM products where product_id= $id";
$stmt = $pdo->query($view_products);
$result = $stmt->fetch(PDO::FETCH_ASSOC);
// print_r($result);
?>

<style>
    body {
        margin-top: 20px;
    }

    .avatar {
        width: 200px;
        height: 200px;
    }
</style>

<div>
    <!-- <h1>Update Page <?= $id ?></h1> -->
    <div class="container bootstrap snippets bootdey">
        <h1 class="text-primary">Edit Profile</h1>
        <hr>
        <div class="row">
            <!-- left column -->
            <div class="col-md-3">
                <div class="text-center">
                    <img src="https://imgs.search.brave.com/eM1kUgbdFkPU5SNpKtF8rvrL1ngAnaH0QDrPrbODlPQ/rs:fit:500:0:0/g:ce/aHR0cHM6Ly9mcmFt/ZXJ1c2VyY29udGVu/dC5jb20vaW1hZ2Vz/L1gyMjVMSFJ2Znpl/Y29wZUVBSVZ0b0dt/akh3US5qcGc" class="avatar img-circle img-thumbnail" alt="avatar">
                    <h6>Upload a different photo...</h6>

                    <input type="file" class="form-control">
                </div>
            </div>

            <!-- edit form column -->
            <div class="col-md-9 personal-info">
                <div class="alert alert-info alert-dismissable">
                    <h3>Product Detail Information..</h3>
                </div>

                <form class="form-horizontal ms-4" role="form">
                    <div class="form-group d-flex my-2 ">
                        <label class="col-lg-3 control-label"> ID:</label>
                        <div class="col-lg-8">
                            <input class="form-control" type="text" readonly value="<?= $result['product_id'] ?>">
                        </div>
                    </div>
                    <div class="form-group d-flex my-2">
                        <label class="col-lg-3 control-label"> Name:</label>
                        <div class="col-lg-8">
                            <input class="form-control" type="text" value="<?= $result['product_name'] ?>">
                        </div>
                    </div>
                    <div class="form-group d-flex my-2">
                        <label class="col-lg-3 control-label">Price:</label>
                        <div class="col-lg-8">
                            <input class="form-control" type="text" value="<?= $result['product_price'] ?>">
                        </div>
                    </div>
                    <div class="form-group d-flex my-2 ">
                        <label class="col-lg-3 control-label">Stock:</label>
                        <div class="col-lg-8">
                            <input class="form-control" type="text" value="<?= $result['product_stock'] ?>">
                        </div>
                    </div>
                    <div class="form-group d-flex my-2 ">
                        <label class="col-lg-3 control-label">Description:</label>
                        <div class="col-lg-8">
                            <textarea class="form-control" ><?=  $result['product_description']?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary">Update</button>
                        <button class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <hr>
</div>