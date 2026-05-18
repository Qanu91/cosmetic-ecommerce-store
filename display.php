<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

</head>
<body>
<div class="container mt-5">
    <h1 class="text-center mb-4">All products</h1>
    <table class="table table-bordered table-hover text-center align-middle">
<thead class="table-dark">
    <tr>
<th>id</th>
<th>img</th>
<th>product-name</th>
<th>description</th>
<th>price</th>
<th>product-category</th>
<th>Update</th>
<th>Delete</th>
    </tr>
</thead>
<tbody>

 <?php
include "connection.php";
$sql = "select * from products";
$result = mysqli_query($conn,$sql);

while($row =mysqli_fetch_assoc($result)){
?>
<tr>
<td><?php echo $row['id'];?></td>
<td><?php echo $row['img'];?></td>
<td><?php echo $row['product_name'];?></td>
<td><?php echo substr($row['description'], 0, 30); ?></td>
<td><?php echo $row['price'];?></td>
<td><?php echo $row['product_category'];?></td>
<td>
<a href="update-product.php?id=<?php echo $row['id']?>" class="btn btn-primary">update</a>
</td>
<td>
<a href="delete-product.php?id=<?php echo $row['id']?>" class="btn btn-danger"> delete</a>
</td>
</tr>
<?php
}?>




</tbody>



    </table>
</div>



   

</body>
</html>