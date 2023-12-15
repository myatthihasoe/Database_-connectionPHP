<?php
require_once("../Style/head.php");
require_once("../Database/Connect.php");

$view_products = "SELECT * FROM products";

$stmt = $pdo ->query($view_products);

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach($result as $product){
  print_r($product);
  echo "<br>";
}
?>
<div class="container mt-2" style="background-color: grey;">
  <a href="CreateProduct.php" class="btn btn-outline-light my-2">Create</a>
  <!-- primary,  -->
  <table class="table table-info">
    <thead>
      <tr class="table-warning">
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Category</th>
        <th scope="col">Price</th>
        <th scope="col">Stock</th>
        <th scope="col">Description</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($result as $product): ?>
      <tr>
        <th scope="row"><?= $product['product_id']?></th>
        <td><?= $product['product_name']?></td>
        <td><?= $product['product_category']?></td>
        <td><?= $product['product_price']?></td>
        <td><?= $product['product_stock']?></td>
        <td><?= $product['product_description']?></td>
      </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</div>