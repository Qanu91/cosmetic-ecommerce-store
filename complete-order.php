<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>complete</title>
</head>
<body>
    <?php
include "connection.php";
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "update orders set status= 'completed' where id = $id";
 $result = mysqli_query($conn,$sql);
if($result){
        header("Location: admin/display-order.php");
        exit();
    } else {
        echo "Failed to update order";
    }
}

?>
</body>
</html>