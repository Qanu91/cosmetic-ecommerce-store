<?php
session_start(); ?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>

<?php
include "../connection.php";

if(isset($_POST['login'])){

    $username = $_POST['user-name'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM register WHERE user_name = '$username'";
    $result = mysqli_query($conn, $sql);

    $admin = mysqli_fetch_assoc($result);

    if($admin){

         if($password == $admin['password']){

            $_SESSION['admin_id'] = $admin['id'];

            header("Location: index.php");
            exit();

        }else{

            echo "Wrong password";
        }

    }else{

        echo "Admin not found";
    }
}
?>

<div class="admin-wrapper">
  <div class="main-content">
    <div class="page-content">

      <div class="card-modern form-wrapper">

        <div class="card-header-modern">
          <span class="card-title-modern">
            <i class="fa-solid fa-right-to-bracket"></i>
            Admin Login
          </span>
        </div>

        <div class="card-body-modern">
          <form method="post" enctype="multipart/form-data">

            <div class="form-group-modern">
              <label for="admin-name">Username</label>
              <input type="text" id="admin-name" name="user-name" placeholder="Enter username">
            </div>

            <div class="form-group-modern">
              <label for="password">Password</label>
              <input type="password" id="password" name="password" placeholder="Enter password">
            </div>

            <button type="submit" name="login" class="btn-submit">
              <i class="fa-solid fa-right-to-bracket"></i> Login
            </button>

          </form>
        </div>

      </div>
    </div>
  </div>
</div>

</body>
</html>