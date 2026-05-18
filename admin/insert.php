<?php
session_start();

if(!isset($_SESSION['admin_id'])){
    header("Location: admin-login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Admin-panel</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>

<div class="sidebar-overlay" id="sidebarOverlay" onclick="closeSidebar()"></div>

<div class="admin-wrapper">

    <!-- SIDEBAR -->
    <aside class="sidebar" id="sidebar">
        <div class="sidebar-brand">
            <div class="brand-icon"><i class="fa-solid fa-user"></i></div>
            <div class="brand-text">Admin Panel</div>
        </div>

        <nav class="sidebar-nav">
            <a href="insert.php" class="nav-link active">
                <i class="fa-solid fa-plus-circle"></i> Add Items
            </a>
            <a href="display.php" class="nav-link">
                <i class="fa-solid fa-box-open"></i> All products
            </a>
            <a href="display-order.php" class="nav-link">
                <i class="fa-solid fa-bag-shopping"></i> Orders
            </a>
            <a href="logout.php" class="nav-link logout">
                <i class="fa-solid fa-right-from-bracket"></i> Logout
            </a>
        </nav>
    </aside>

    <!-- MAIN CONTENT -->
    <main class="main-content">

        <header class="topbar">
            <button class="hamburger" onclick="toggleSidebar()">
                <i class="fa-solid fa-bars"></i>
            </button>
            <span class="page-title">Add Items</span>
        </header>

        <div class="page-content">
            <div class="form-wrapper">
                <div class="card-modern">
                    <div class="card-header-modern">
                        <span class="card-title-modern">
                            <i class="fa-solid fa-plus-circle"></i> Add New Product
                        </span>
                    </div>
                    <div class="card-body-modern">

                        <form method="post" enctype="multipart/form-data">

                            <div class="form-group-modern">
                                <label for="product-image">Product Image URL:</label>
                                <input type="file" id="product-image" name="product-image">
                            </div>

                            <div class="form-group-modern">
                                <label for="product-category">Product Category:</label>
                                <select id="product-category" name="product-category">
                                    <option value="">Select Category</option>
                                    <option value="Skin Care">Skin Care</option>
                                    <option value="Make up">Make up</option>
                                    <option value="Hair Care">Hair Care</option>
                                    <option value="Perfume">Perfume</option>
                                </select>
                            </div>

                            <div class="form-group-modern">
                                <label for="product-name">Product Name:</label>
                                <input type="text" id="product-name" name="product-name">
                            </div>

                            <div class="form-group-modern">
                                <label for="product-description">Product Description:</label>
                                <textarea id="product-description" name="product-description" rows="4" cols="50"></textarea>
                            </div>

                            <div class="form-group-modern">
                                <label for="product-price">Product Price:</label>
                                <input type="number" id="product-price" name="product-price" step="0.01">
                            </div>

                            <input type="submit" value="Submit" class="btn-submit" name="submit">

                        </form>

                    </div>
                </div>
            </div>
        </div>

    </main>
</div>

<?php
include "../connection.php";
if(isset($_POST['submit'])){
     $img = $_FILES['product-image']['name'];
     $tem = $_FILES['product-image']['tmp_name'];
     move_uploaded_file($tem, "uploads/" . $img);
     
    $product_category = $_POST['product-category'];
    $product_name = $_POST['product-name'];
    $description = $_POST['product-description'];
    $price = $_POST['product-price'];
    

    

    $sql = "INSERT INTO products (img, product_category, product_name, description, price) VALUES ('$img', '$product_category', '$product_name', '$description', '$price')";
    
    
$result = mysqli_query($conn, $sql);

    // if ($result) {
    //     echo "Product added successfully!";
    // } else {
    //     echo "Error: " . mysqli_error($conn);
    // }
}
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
<script>
function toggleSidebar() {
    document.getElementById('sidebar').classList.toggle('open');
    document.getElementById('sidebarOverlay').classList.toggle('show');
}
function closeSidebar() {
    document.getElementById('sidebar').classList.remove('open');
    document.getElementById('sidebarOverlay').classList.remove('show');
}
</script>
</body>
</html>