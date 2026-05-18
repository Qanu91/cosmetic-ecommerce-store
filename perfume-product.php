<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-commerce</title>
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
<ul class="navbar-nav ms-auto align-items-center"> 
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">About</a>
        </li>
        <li class="nav-item dropdown">
  
  <a class="nav-link dropdown-toggle text-dark" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    Products
  </a>

  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="skin-care.php">Skin Care</a></li>
    <li><a class="dropdown-item" href="make-up.php">Make up</a></li>
    <li><a class="dropdown-item" href="hair-product.php">Hair product</a></li>
    <li><a class="dropdown-item" href="perfume-product.php">perfume</a></li>
  </ul>

</li>
         <li class="nav-item">
          <a class="nav-link" href="cart.php">Cart</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- hero section -->
 <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel"  data-bs-interval="2000">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="cosmetic-1.jpg" class="d-block w-100 hero-img" alt="...">
    </div>
    <div class="carousel-item">
      <img src="cosmetic-3.jpg" class="d-block w-100 hero-img" alt="...">
    </div>
    <div class="carousel-item">
      <img src="hero.jpg" class="d-block w-100 hero-img" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>


<!-- grid for products -->
 
  

     <?php 

    include "connection.php";


if(isset($_GET['search']) && $_GET['search'] != ""){

    $search = $_GET['search'];

    $sql = "SELECT * FROM products 
            WHERE product_category = 'perfume'
            AND (
                product_name LIKE '%$search%'
                OR description LIKE '%$search%'
                OR product_category LIKE '%$search%'
            )";

}else{

    $sql = "SELECT * FROM products WHERE product_category = 'perfume'";

}
$result = mysqli_query($conn, $sql);
echo "<div class='container text-center'>
        
        <div class='row mt-5 g-5'>";
if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
        
        echo "<div class='col-6 col-md-6 col-lg-4'>
        <div class='card'>
  <img src='" . $row['img'] . "' class='card-img-top' alt='...'>
  <div class='card-body'>
  <p>" . $row['product_category'] . "</p>
    <h5 class='card-title'>" . $row['product_name'] . "</h5>
    <p class='card-text flex-grow-1'>" . substr($row['description'], 0, 60) . "...</p>
    <h5>$" . $row['price'] . "</h5>
    <a href='product-detail.php?id=" . $row['id'] . "' class='btn btn-brand w-100'>View details</a>
  </div>
</div>
    </div>";
    
    }
}else{
echo "<div class='col-12 text-center py-5'>
            <h3>No products found</h3>
            <p class='text-muted'>Please check another category.</p>
          </div>";
          
          } echo"</div>
    </div>";
    ?>
  
    


</div>
</div>
<!-- footer -->


<footer class="bg-dark text-light pt-5 pb-3 mt-5">
  <div class="container">
    <div class="row">

      <!-- Brand -->
      <div class="col-lg-4 mb-4">
        <h3>SHOP</h3>
        <p>Your trusted destination for premium beauty and cosmetic products.</p>
      </div>

      <!-- Links -->
      <div class="col-lg-2 mb-4">
        <h5>Quick Links</h5>
        <ul class="list-unstyled">
          <li><a href="index.php" class="text-light text-decoration-none">Home</a></li>
          <li><a href="perfume-product.php" class="text-light text-decoration-none">Products</a></li>
          <li><a href="about.php" class="text-light text-decoration-none">About</a></li>
        </ul>
      </div>

      <!-- Support -->
      <div class="col-lg-3 mb-4">
        <h5>Support</h5>
        <ul class="list-unstyled">
          <li><a href="contact.php" class="text-light text-decoration-none">Contact</a></li>
          <li><a href="#" class="text-light text-decoration-none">FAQs</a></li>
          <li><a href="#" class="text-light text-decoration-none">Privacy Policy</a></li>
        </ul>
      </div>

      <!-- Social -->
      <div class="col-lg-3 mb-4">
        <h5>Follow Us</h5>
        <p>Instagram | Facebook | Twitter</p>
      </div>

    </div>

    <hr>

    <div class="text-center">
      <p class="mb-0">© 2026 SHOP. All Rights Reserved.</p>
    </div>
  </div>
</footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>
