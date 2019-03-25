<?php
//Accept data
$book_code=$_POST['book_code'];
$book_name=$_POST['name'];
$author_id=$_POST['author_id'];
$category_id=$_POST['category_id'];

$price=$_POST['price'];
$quantity=$_POST['quantity'];


$description=$_POST['description'];
// ?\ echo "$book_code"."<br>".$book_name."<br>".$author_id."<br>".$category_id."<br>".$price."<br>".$quantity."<br>".$description;
 
$photo=$_FILES['photo']['name'];
$photo_tmpname=$_FILES['photo']['tmp_name'];
$photoobj=$_FILES['photo'];
$photo_savename='photo/'.$photo;
// var_dump($photo);
// die();
move_uploaded_file($photo_tmpname, $photo_savename);
include('database.php');
$sql="insert into books(id,book_code,name,category_id,author_id,photo,description,price,quantity) values('',$book_code,'$book_name','$category_id','$author_id','$photo_savename','$description',$price,$quantity)";
// echo "$sql";
// die();
$conn->query($sql);
header("location:book.php?status=1"); 
?>



