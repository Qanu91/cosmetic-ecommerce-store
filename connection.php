<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'shop';

$conn = mysqli_connect($host, $username, $password, $database);

// if (!$conn) {
//     die("not connected: " . mysqli_connect_error());
// } else {
//     echo "connected";
// }

// $sql = "CREATE TABLE IF NOT EXISTS products (
// id INT PRIMARY KEY AUTO_INCREMENT,
// img VARCHAR(255) NOT NULL,
// product_name VARCHAR(255) NOT NULL,
// description VARCHAR(255) NOT NULL,
// price DECIMAL(10,2) NOT NULL
// )";

// if (mysqli_query($conn, $sql)) {
//     echo "Table created successfully";
// } else {
//     echo "Error creating table: " . mysqli_error($conn);
// }

// $sql = "create table if not exists register(id int(87) AUTO_INCREMENT, user_name varchar(100) not null, email varchar(80) not null, password varchar(20), primary key(id))";
//  if (mysqli_query($conn,$sql)){
//     echo "table created";
//  }else{
//     echo "table not created";
//  }
?>
