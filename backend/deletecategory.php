<?php 
$category_id=$_POST['category_id'];
include('database.php');
$sql="delete from categories where id=$category_id";
$conn->query($sql);
header("location:category.php?status=2");

?>