<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy-now</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="buy-form.css">
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

      
     

      <!-- NAV LINKS -->
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
include "connection.php";
$product_id = $_GET['id'];

$sql = "select * from products where id = $product_id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);


if(isset($_POST['submit'])){
    $name = $_POST['full-name'];
    $phone = $_POST['phone-number'];
    $address = $_POST['address'];
    $quantity = $_POST['product-quantity'];
$payment = $_POST['pay-category'];
        
           
    $quantity = $_POST['product-quantity'];

    $insert = "insert into orders(product_id,name,phone,address,quantity,pay_category,status)
    values('$product_id', '$name','$phone', '$address','$quantity','$payment','pending' )";

mysqli_query($conn,$insert);

}

?>

    <div class="container">
        <h1>Checkout form</h1>

<img src="<?php echo $row['img']; ?>" width="200">
        <h2><?php echo $row['product_name']; ?></h2>
<h3>$ <?php echo $row['price']; ?></h3>
    <form method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="full-name">Enter Name</label>
        <input type="text" id="full-name" name="full-name">
    </div>

<div class="form-group">
        <label for="phone-number">Phone Number</label>
        <input type="text" id="phone-number" name="phone-number">
    </div>

<div class="form-group">
        <label for="pay-category">Payment Category:</label>
        <select id="pay-category" name="pay-category">

    <option value="Cash on delivery">Cash on delivery</option>
    <option value="Jazz cash">Jazz cash</option>
    <option value="Easy paisa">Easy paisa</option>
    <option value="Bank transfer">Bank transfer</option>
    

</select>
    </div>


    <div class="form-group">
        <label for="phone-number">Enter Address</label>
        <input type="text" id="address" name="address">
    </div>

    
    
    <div class="form-group">
        <label for="product-quantity">Quantity</label>
        <input type="number" id="product-quantity" name="product-quantity" step="1">
    </div>

    <input type="submit" value="Buy" class="btn" name="submit">

</form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


