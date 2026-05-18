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
            <a href="insert.php" class="nav-link">
                <i class="fa-solid fa-plus-circle"></i> Add Items
            </a>
            <a href="display.php" class="nav-link">
                <i class="fa-solid fa-box-open"></i> All products
            </a>
            <a href="display-order.php" class="nav-link active">
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
            <span class="page-title">All orders</span>
        </header>

        <div class="page-content">
            <div class="card-modern">
                <div class="card-header-modern">
                    <span class="card-title-modern">
                        <i class="fa-solid fa-bag-shopping"></i> All orders
                    </span>
                </div>
                <div class="table-wrap">
                    <table class="table-modern">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>product-id</th>
                                <th>name</th>
                                <th>phone</th>
                                <th>address</th>
                                <th>quantity</th>
                                <th>pay-category</th>
                                <th>status</th>
                                <th>Update</th>
                                <th>Delete</th>
                                <th>Complete</th>
                            </tr>
                        </thead>
                        <tbody>

<?php
include "../connection.php";
$sql = "select * from orders";
$result = mysqli_query($conn,$sql);

while($row =mysqli_fetch_assoc($result)){
?>
                            <tr>
                                <td><?php echo $row['id'];?></td>
                                <td><?php echo $row['product_id'];?></td>
                                <td><?php echo $row['name'];?></td>
                                <td><?php echo $row['phone']; ?></td>
                                <td><?php echo $row['address'];?></td>
                                <td><?php echo $row['quantity'];?></td>
                                <td><?php echo $row['pay_category'];?></td>
                                <td><?php echo $row['status'];?></td>
                                <td>
                                    <a href="../update-order.php?id=<?php echo $row['id']?>" class="tbl-btn tbl-btn-blue">
                                        <i class="fa-solid fa-pen"></i> update
                                    </a>
                                </td>
                                <td>
                                    <a href="../delete-order.php?id=<?php echo $row['id']?>" class="tbl-btn tbl-btn-red">
                                        <i class="fa-solid fa-trash"></i> delete
                                    </a>
                                </td>
                                <td>
                                  <?php if($row['status'] != 'completed') { ?>
                                    <a href="../complete-order.php?id=<?php echo $row['id']; ?>" class="tbl-btn tbl-btn-green">
                                        <i class="fa-solid fa-circle-check"></i> Complete
                                    </a>
                                  <?php } else { ?>
                                    <span class="badge-done">
                                        <i class="fa-solid fa-check"></i> Completed
                                    </span>
                                  <?php } ?>
                                </td>
                            </tr>
<?php
}?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </main>
</div>

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