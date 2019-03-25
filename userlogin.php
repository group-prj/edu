<?php
$email=$_POST['email'];

$pw=$_POST['password'];
// echo $email.$pw;
// die();
include('backend/database.php');
if ($email == "admin@gmail.com" && $pw == "admin@123") {
	// echo("hello");
	// die();
	$sql="SELECT * FROM admins where email='$email' and password='$pw'";

	$result=$conn->query($sql);
	// var_dump($result);
	// die();
	if($result->num_rows>0){
		while ($row=$result->fetch_assoc()){
			//Session
			session_start();
			$_SESSION['userid']=$row['id'];
			$_SESSION['username']=$row['username'];
			
			header('Location: backend/home.php');
		}

	}else{
		header('Location: login.php?status=0');
	}
}else{
	$sql="select * from users where email='$email' and password='$pw'" ;
	$result=$conn->query($sql);
	if($result->num_rows>0){
		while($row=$result->fetch_assoc()){
			session_start();
			$_SESSION['userid']=$row['id'];
			$_SESSION['username']=$row['username'];
			header('location:home.php');
	}
}else{
	header('location:index.php?status=0');
	}
}
?>