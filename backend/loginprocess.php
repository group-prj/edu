<?php
	$email=$_POST['email'];
	$p=$_POST['password'];
	// echo $email.$p;
	// die();
	include('database.php');
	$sql="SELECT * FROM admins where email='$email' and password='$p'";
	$result=$conn->query($sql);
	if($result->num_rows>0){
		while ($row=$result->fetch_assoc()){
			//Session
			session_start();
			$_SESSION['userid']=$row['id'];
			$_SESSION['username']=$row['username'];
			
			header('Location: home.php');

		}

	}else{
		header('Location: login.php?status=0');
	}
?>