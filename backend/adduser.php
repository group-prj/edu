<?php
$name=$_POST['name'];
$usercode=$_POST['usercode'];
$email=$_POST['email'];
$pw=$_POST['password'];
$phno=$_POST['phno'];

include('database.php');
$sql="insert into users(id,name,user_code,email,password,phno) values('','$name','$usercode','$email','$pw',$phno)";

$conn->query($sql);
header("location:user.php?status=1"); 
?>