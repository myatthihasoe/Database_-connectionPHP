<?php
require_once("../Style/head.php");
require_once("../Database/Connect.php");

function getImage(){
    
    //get image path to store in database
    $imgPath =  "../images/" . $_FILES['image']['name'];
    //move chosen image full path into project images/folder
    $isUploaded = move_uploaded_file($_FILES['image']['tmp_name'], $imgPath);
    return $isUploaded ? $imgPath : "";//insert empty in database
}

if (isset($_POST['create'])) {
    $name = $_POST['productName'];
    $cat = $_POST['productCat'];
    $price = $_POST['productPrice'];
    $stock = $_POST['productStock'];
    $desp = $_POST['productDes'];
    //print_r($_FILES);

    $img = getImage();
    // echo $img;

    // echo $name, $cat, $price, $stock, $desp;

    $create_product = "INSERT INTO products VALUES ('','$name','$cat','$price','$stock','$desp','$img')";
    try {
        $pdo->exec($create_product);
        header("Location: CreateProduct.php ? isCreated = ok");
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
    // header("Location: CreateProduct.php?isCreated=ok");

// $create_product = "INSERT INTO products(product_name, product_cat, product_price, price_stock, product_description) VALUES ('',':name',':cat',':price',':stock',':desp')";
// $stmt = $pdo->prepare($create_product);
// // $stmt -> bindParam(':id', '');
// $stmt->bindParam(':name', $name);
// $stmt->bindParam(':cat', $cat);
// $stmt->bindParam(':price', $price);
// $stmt->bindParam(':stock', $stock);
// $stmt->bindParam(':desp', $desp);
// $stmt->execute();

?>
<div class="container bootstrap snippets bootdey" style="margin-top: 10px";>
<a href="ViewProducts.php" class="btn btn-outline-success">Home</a>
</div>
<div class="container mt-3 py-3 bg-danger text-light">
    <span class="text-danger"><?php echo (isset($_GET['isCreated'])) ? "product is created." : null ?></span>
    <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <img id="imageView" style="width: 200px; height: 200px; object-fit: contain;" class="bg-dark mb-2">
            <br>
            <input type="file" id="image" name="image">
        </div>
        <div class="mb-3">    
            <label for="productName" class="form-label">Product Name</label>
            <input type="text" class="form-control" id="productName" name="productName" placeholder="Enter Product Name" required>

        </div>
        <div class="mb-3">
            <label for="productCat" class="form-label">Product Category</label>
            <input type="text" class="form-control" id="productCat" name="productCat" placeholder="Enter Product Category" required>
        </div>
        <div class="mb-3">
            <label for="productPrice" class="form-label">Product Price</label>
            <input type="number" step="0.01" min="1" class="form-control" id="productPrice" name="productPrice" placeholder="Enter Pice" required>
        </div>
        <div class="mb-3">
            <label for="productStock" class="form-label">Product Stock</label>
            <input type="number" class="form-control" id="productStock" name="productStock" placeholder="Enter Product Stock" required>
        </div>
        <div class="mb-3">
            <label for="productDes" class="form-label">Product Description</label>
            <textarea class="form-control" id="productDes" rows="3" name="productDes" placeholder="Enter Product Description"></textarea>
        </div>
        <button class="btn btn-outline-dark text-light" name="create">Create</button>
        <a href="CreateProduct.php" class="btn btn-outline-dark text-light">Refresh</a>
        <button class="btn btn-outline-light" type="reset">Clear</button>
    </form>

    <script>
        document.addEventListener("DOMContentLoaded", ()=>{
            const image = document.getElementById("image");
            const imageView = document.getElementById("imageView");
            // console.log(image, imageView);

            image.addEventListener("change", ()=>{
                // console.log(image.files[0]);
                if(image.files[0]){
                    const imageReader = new FileReader();

                    imageReader.onload = (ev)=>{
                        imageView.src = ev.target.result;
                    }
                    imageReader.readAsDataURL(image.files[0]);
                }
            })
        });
    </script>
</div>