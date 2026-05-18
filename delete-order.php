
    <?php
include "connection.php";
$id = $_GET['id'];
$delete = "delete from orders where id= $id";
mysqli_query($conn,$delete);
if(mysqli_query($conn, $delete)){
    header("Location: admin/display-order.php");
    exit();
}else{
    echo "Error: " . mysqli_error($conn);
}


    ?>
