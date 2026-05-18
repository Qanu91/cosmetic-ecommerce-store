<?php
session_start();

$id = $_GET['id'];

// Find and remove the item from cart array
if(isset($_SESSION['cart'])){
    $key = array_search($id, $_SESSION['cart']);
    
    if($key !== false){
        unset($_SESSION['cart'][$key]);
        
        // Re-index the array after removal
        $_SESSION['cart'] = array_values($_SESSION['cart']);
    }
}

header("Location: cart.php");
?>