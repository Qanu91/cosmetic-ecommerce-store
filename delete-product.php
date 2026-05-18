
    <?php 
include "connection.php";
$id = $_GET['id'];
$delete = "delete from products where id = $id";
mysqli_query($conn,$delete);
if(mysqli_query($conn, $delete)){
    header("Location: admin/display.php");
    exit();
}else{
    echo "Error: " . mysqli_error($conn);
}

    ?>
