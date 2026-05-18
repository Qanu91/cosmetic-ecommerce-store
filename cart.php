<?php 
session_start();
include "connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">

</head>
<body>

<!-- navbar -->
<nav class="navbar navbar-expand-lg">
  <div class="container-fluid">

    <h1 class="navbar-brand">SHOP</h1>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
      data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">

      <!-- SEARCH BAR -->
      <form class="d-flex search-bar mx-auto" method="GET">

  <input 
  class="form-control" 
  type="search" 
  name="search"
  placeholder="Search">

  <button class="btn btn-outline-success ms-1" type="submit">
    Search
  </button>

</form>
<!-- nav links-->
<ul class="navbar-nav ms-auto align-items-center"> 
        <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" href="index.php">Home</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="about.php">About</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-dark" href="#"
            role="button" data-bs-toggle="dropdown">
            Products
          </a>

          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="skin-care.php">Skin Care</a></li>
            <li><a class="dropdown-item" href="make-up.php">Makeup</a></li>
            <li><a class="dropdown-item" href="hair-product.php">Hair product</a></li>
            <li><a class="dropdown-item" href="perfume-product.php">Perfume</a></li>
          </ul>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="cart.php">Cart</a>
        </li>
      </ul>

    </div>
  </div>
</nav>


    <div class="container mt-5">
<h1 class="mb-4">My Cart</h1>
<div class="row">
<?php

echo "<div class='container text-center'>
       <div class='row mt-5 g-5 align-items-stretch'>";
if(isset($_SESSION['cart']) && count($_SESSION['cart']) >0){
    foreach($_SESSION['cart'] as $id){
        $query = mysqli_query($conn, "select * from products where id= $id");
        $result = mysqli_fetch_assoc($query);
        ?>

        <?php
 echo "<div class='col-6 col-md-6 col-lg-4'>
<div class='card h-100'>
  <img src='" . $result['img'] . "' class='card-img-top' alt='...'>
  <div class='card-body d-flex flex-column'>
    <p>" . $result['product_category'] . "</p>
    <h5 class='card-title'>" . $result['product_name'] . "</h5>
    <p class='card-text flex-grow-1'>" . substr($result['description'], 0, 60) . "...</p>
    <h5>$" . $result['price'] . "</h5>
<a href='product-detail.php?id=" . $result['id'] . "' class='btn btn-brand'>View details</a>   
  <a href='remove-from-cart.php?id=".$result['id']."' class='btn btn-brand-outline w-100 mt-2'>Remove</a>

  </div>
</div>
</div>";

    }
}else{
   echo "
<div class='text-center py-5'>
  <h3>Your cart is empty</h3>
  <p class='text-muted'>Looks like you have not added anything yet.</p>
  <a href='index.php' class='btn btn-primary mt-3'>Continue Shopping</a>
</div>";

}

echo"</div>
    </div>";
?>

</div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>