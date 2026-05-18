<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>orders</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
    <h1 class="text-center mb-4">All orders</h1>
    <table class="table table-bordered table-hover text-center align-middle">
<thead class="table-dark">
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
    </tr>
</thead>
<tbody>

 <?php
include "connection.php";
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
<a href="update-order.php?id=<?php echo $row['id']?>" class="btn btn-primary">update</a>
</td>
<td>
<a href="delete-order.php?id=<?php echo $row['id']?>" class="btn btn-danger"> delete</a>
</td>
</tr>
<?php
}?>




</tbody>



    </table>
</div>



   

</body>
</html>