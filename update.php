<?php
include('backend/database.php');
$user_id=$_POST['user_id'];
$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];
$phno=$_POST['phno'];


$sql="update users set name='$name',email='$email',password='$password',phno=$phno where id=$user_id";
// echo $sql;
// die();
$conn->query($sql);
header("location:updateprofile.php?status=3");
?>