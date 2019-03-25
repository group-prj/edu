<?php
$category=trim($_POST['category_name']);

include('database.php');
$sql="insert into categories(id,name) values('','$category')";
$conn->query($sql);
header("location:category.php?status=1"); 
?>