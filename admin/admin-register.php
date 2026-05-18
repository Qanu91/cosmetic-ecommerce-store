<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Register</title>
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>

<?php 
include "../connection.php";
if(isset($_POST['submit'])){
    $name = $_POST['user-name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $insert = "insert into register (user_name, email, password) values ('$name', '$email', '$password')";
    if(mysqli_query($conn, $insert)){
        echo "data inserted";
    }else{
        echo "data not inserted";
    }
}
?>

<div class="admin-wrapper">
  <div class="main-content">
    <div class="page-content">

      <div class="card-modern form-wrapper">

        <div class="card-header-modern">
          <span class="card-title-modern">
            <i class="fa-solid fa-user-plus"></i>
            Register Admin
          </span>
        </div>

        <div class="card-body-modern">
          <form method="post" enctype="multipart/form-data">

            <div class="form-group-modern">
              <label for="user-name">Username</label>
              <input type="text" id="user-name" name="user-name" placeholder="Enter username">
            </div>

            <div class="form-group-modern">
              <label for="email">Email</label>
              <input type="email" id="email" name="email" placeholder="Enter email">
            </div>

            <div class="form-group-modern">
              <label for="password">Password</label>
              <input type="password" id="password" name="password" placeholder="Enter password">
            </div>

            <button type="submit" name="submit" class="btn-submit">
              <i class="fa-solid fa-user-plus"></i> Register
            </button>

          </form>
        </div>

      </div>
    </div>
  </div>
</div>

</body>
</html>