<?php
require_once("Style/head.php");
?>
<style>
    #navbar{
        color: aliceblue;  
    }
</style>
<nav class="navbar navbar-expand-lg bg-body-tertiary py-3 sticky-top ">
  <div class="container-fluid bg-danger" id="navbar">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true">Disabled</a>
        </li>
      </ul>
      
      <form class="d-flex mt-2 me-3" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <!-- <button class="btn btn-outline-success" type="submit">Search</button> -->
      </form>
      <div>
      <i class="fa-solid fa-cart-plus fa-2xl"></i>
      </div>
    </div>
  </div>
</nav>