<?php 
include "connection.php";

session_start();
$id = $_GET['id'];
if(!in_array($id, $_SESSION['cart'] ?? [])){
    $_SESSION['cart'][] = $id;
}

header("Location: cart.php");

?>