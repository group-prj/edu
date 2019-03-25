<?php
$author_id=$_POST['author_id'];
$author_name=$_POST['author_name'];
include('database.php');
$sql="update authors set name='$author_name' where id=$author_id";
$conn->query($sql);
header("location:index.php?status=3");
?>