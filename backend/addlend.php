<?php
$lent_date=trim($_POST['lent_date']);
$return_date=trim($_POST['return_date']);
$user_id=trim($_POST['user_id']);
$book_id=trim($_POST['book_id']);
include('database.php');
$sql="insert into lents(id,lent_date,return_date,user_id,book_id) values('','$lent_date','$return_date',$user_id,$book_id)";
//echo $sql;
//die();
$conn->query($sql);
header("location:lends.php?status=1"); 
?>