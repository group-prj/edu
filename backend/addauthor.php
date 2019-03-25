<?php
$author_name=trim($_POST['author_name']);

include('database.php');
$sql="insert into authors(id,name) values('','$author_name')";
$conn->query($sql);
header("location:author.php?status=1"); 
?>