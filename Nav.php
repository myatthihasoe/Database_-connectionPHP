<?php
require_once("Style/head.php");
session_start();
// unset($_SESSION['cart']);

$total_cart = 0;
if (isset($_SESSION['cart'])) {
  foreach ($_SESSION['cart'] as $val) {
    //print_r($val['qty'])
    $total_cart += $val['qty'];
  }
}

if(isset($_POST['cart'])){
  header("Location:cart.php");
}
?>
<style>
  #navbar {
    color: aliceblue;
    
  }

  /* .navbar navbar-expand-lg bg-body-tertiary py-3 sticky-top{

  } */
</style>

<nav class="navbar navbar-expand-lg bg-body-tertiary  py-0 sticky-top "><!--Navbar position fixed -->
  <div class="container-fluid bg-danger" id="navbar">
    <a class="navbar-brand" style="color: aliceblue;" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" style="color: aliceblue;" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" style="color: aliceblue;" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" style="color: aliceblue;" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" style="color: aliceblue;" aria-disabled="true">Disabled</a>
        </li>
      </ul>

      <form class="d-flex mt-2 me-3" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <!-- <button class="btn btn-outline-success" type="submit">Search</button> -->
      </form>

      <!-- this form uses action   -->
      <form method="POST">
      <div class="me-2 mt-3">
        <button class="btn p-3" name="cart">
          <i class="fa-solid fa-cart-plus fa-2xl"><span class="fs-6"><?= $total_cart ?></span></i>
        </button>
        </form>
      </div>

    </div>
  </div>
</nav>