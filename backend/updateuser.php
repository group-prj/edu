<?php
	$user_id=$_POST['user_id'];
	$user_name = $_POST['uuser_name'];
	
	// echo $password;
	// die();
	$email = $_POST['uemail'];
	$upassword = $_POST['upassword'];
	$phno = $_POST['uphno'];
	
	include('database.php');
	$sql="update users set name='$user_name',email='$email',password='$upassword',phno='$phno' where id=$user_id";
	$conn->query($sql);
	header("location:user.php?status=3");
?>