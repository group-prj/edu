<?php 
$author_id=$_POST['author_id'];
include('database.php');
$sql="delete from authors where id=$author_id";
$conn->query($sql);
header("location:author.php?status=2");

?>