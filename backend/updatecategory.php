<?php
$category_id=$_POST['category_id'];
$category_name=$_POST['category_name'];
include('database.php');
$sql="update categories set name='$category_name' where id=$category_id";
$conn->query($sql);
header("location:category.php?status=3");
?>