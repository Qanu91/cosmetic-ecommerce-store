<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product-Detail</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
 <link rel="stylesheet" href="product-detail.css">
    <link rel="stylesheet" href="product-detail.css">
</head>

<body>

<?php
session_start();
include "connection.php";

$product_id = $_GET['id'];

/* INSERT REVIEW */
if(isset($_POST['submit'])){

    $name = $_POST['user_name'];
    $review = $_POST['review'];
    $rating = $_POST['rating'];

    
    $sql = "INSERT INTO reviews (product_id, user_name, review, rating)
            VALUES ('$product_id', '$name', '$review', '$rating')";

    mysqli_query($conn, $sql);

    header("Location: product-detail.php?id=$product_id");
    exit();
}
?>


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
<!--nav links -->
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


<?php
$sql = "SELECT * FROM products WHERE id = $product_id";
$result = mysqli_query($conn, $sql);

echo "<div class='container mt-5'>";

while($row = mysqli_fetch_assoc($result)){
?>

<div class="row">

    <!-- IMAGE -->
       <div class="col-md-6">

        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">

            <div class="carousel-inner h-100">

                <div class="carousel-item active">
                    <img src="<?php echo $row['img']; ?>" class="d-block w-100 h-100 object-fit-cover" alt="">
                </div>

                <div class="carousel-item">
                    <img src="<?php echo $row['img']; ?>" class="d-block w-100 h-100 object-fit-cover" alt="">
                </div>

                <div class="carousel-item">
                    <img src="<?php echo $row['img']; ?>" class="d-block w-100 h-100 object-fit-cover" alt="">
                </div>

            </div>

            <button class="carousel-control-prev" type="button"
                data-bs-target="#carouselExampleControls"
                data-bs-slide="prev">

                <span class="carousel-control-prev-icon"></span>

            </button>

            <button class="carousel-control-next" type="button"
                data-bs-target="#carouselExampleControls"
                data-bs-slide="next">

                <span class="carousel-control-next-icon"></span>

            </button>

        </div>

    </div>
    <!-- DETAILS -->
    <div class="col-md-6">

        <h2><?php echo $row['product_name']; ?></h2>

        <h5>$<?php echo $row['price']; ?></h5>

        <p><?php echo $row['description']; ?></p>

       
        <!-- Buttons -->
         <?php

$in_cart = false;

if(isset($_SESSION['cart'])){

    if(in_array($row['id'], $_SESSION['cart'])){

        $in_cart = true;
    }
}

?>

<?php

if($in_cart){

?>

<a href="cart.php" class="btn btn-success mt-3 w-50">
    <i class="bi bi-cart-check me-1"></i>
    Go To Cart
</a>

<?php

}else{

?>

<a href="add-to-cart.php?id=<?php echo $row['id'];?>" 
class="btn bg-dark text-white mt-3 w-50">

    <i class="bi bi-cart-check me-1"></i>
    Add to Cart

</a>

<?php } ?>


       

        
            <a href="buy-form.php?id=<?php echo $row['id']; ?>" class="btn btn-warning ms-3 mt-3">Buy now</a>
            
        

        <hr class="mt-5">

        <!-- Features -->
        <div class="d-flex justify-content-center gap-5 text-center">

            <div>
                <i class="bi bi-truck-front-fill fs-4"></i>
                <p>Fast Shipping</p>
            </div>

            <div>
                <i class="bi bi-shield-fill-check fs-4"></i>
                <p>Cruelty Free</p>
            </div>

            <div>
                <i class="bi bi-arrow-repeat fs-4"></i>
                <p>30-Day Returns</p>
            </div>

        </div>

        <!-- Benefits -->
        <div class="benefits mt-3 p-3"
            style="background-color:pink; line-height:30px;">

            <h4>Key Benefits</h4>

            <ul class="mt-3" style="padding-left:20px;">

                <li>Premium Quality Material</li>
                <li>Dermatologist tested</li>
                <li>Perfect for Daily Use</li>

            </ul>

        </div>

    </div>
</div>

<?php } ?>

</div>

<!-- REVIEW SECTION -->
<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center w-100">

        <h3 class="mx-auto">Customer Reviews</h3>

        <button class="btn border border-dark bg-transparent px-4 rounded-3 ms-auto"
            onclick="toggleReviewForm()">
            <i class="bi bi-pencil-square me-1"></i>
            Write a Review
        </button>

    </div>

    <hr>

    <!-- FORM -->
    <div id="reviewForm" class="d-none mt-3">

        <form method="POST">

            <input type="text" name="user_name" class="form-control mt-2" placeholder="Your Name">

            <textarea name="review" class="form-control mt-2" rows="3" placeholder="Write review"></textarea>

            <select name="rating" class="form-control mt-2">
                <option value="5">5 ⭐</option>
                <option value="4">4 ⭐</option>
                <option value="3">3 ⭐</option>
                <option value="2">2 ⭐</option>
                <option value="1">1 ⭐</option>
            </select>

            <button name="submit" class="btn btn-dark mt-3">Submit</button>

        </form>

    </div>
</div>

<!-- SHOW REVIEWS -->
<?php

$sql = "SELECT * FROM reviews WHERE product_id = $product_id ORDER BY id DESC";
$result = mysqli_query($conn, $sql);

echo "<div class='container2 mt-4'>";

while($row = mysqli_fetch_assoc($result)){

?>

<div class="border p-3 mt-3 rounded review-card mx-auto"> 

    <div class="d-flex justify-content-between align-items-center w-100">

        <b><?php echo $row['user_name']; ?></b>

        <div>
            <?php
            $rating = $row['rating'];

            for($i = 1; $i <= 5; $i++){
                if($i <= $rating){
                    echo "<i class='bi bi-star-fill text-warning'></i>";
                } else {
                    echo "<i class='bi bi-star text-warning'></i>";
                }
            }
            ?>
        </div>


    </div>

    <p class="mt-2 mb-0">
        <?php echo $row['review']; ?>
    </p>

</div>

<?php } ?>

</div>

<script>
function toggleReviewForm(){
    document.getElementById("reviewForm").classList.toggle("d-none");
}
</script>
<?php

$id = (int) $_GET['id'];

$sql = "SELECT * FROM products WHERE id = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if(!$row){
    echo "Product not found";
    exit;
}

$cat = mysqli_real_escape_string($conn, $row['product_category']);

$sql2 = "SELECT * FROM products 
         WHERE product_category = '$cat' 
         AND id != $id 
         LIMIT 8";

$result2 = mysqli_query($conn, $sql2);

?>
<?php

echo "<div class='container text-center mt-5 related-products-wrap'>
        <div class='row row-cols-2 row-cols-md-2 row-cols-lg-3 g-3 related-products'>";

    while($rel = mysqli_fetch_assoc($result2)){
        
       echo "<div class='col'>
<div class='card product-card'>
  <img src='" . $rel['img'] . "' 
       class='card-img-top' 
       alt='" . htmlspecialchars($rel['product_name']) . "'>

  <div class='card-body d-flex flex-column'>
    <p class='text-muted small mb-1'>" . $rel['product_category'] . "</p>
    <h5 class='card-title'>" . $rel['product_name'] . "</h5>
    <p class='card-text flex-grow-1'>" . substr($rel['description'], 0, 60) . "...</p>
    <h5 class='mb-3'>$" . $rel['price'] . "</h5>
    <a href='product-detail.php?id=" . $rel['id'] . "' class='btn btn-brand mt-auto'>View details</a>
  </div>
</div>
</div>";
    }

// echo "No products found.";
echo"</div>
    </div>";
    ?>
  
    



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>