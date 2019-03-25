<?php
//Accept data
$book_id=$_POST['book_id'];
//var_dump($item_id);
$oldphotolink=$_POST['oldphotolink'];
$book_code=$_POST['book_code'];
$name=$_POST['book_name'];
$author_id=$_POST['author_id'];
$category_id=$_POST['category_id'];

$price=$_POST['price'];
$quantity=$_POST['quantity'];
$description=$_POST['description'];
$photo=$_FILES['photo']['name'];
$photoobj=$_FILES['photo'];
//var_dump($photoobj);
if($photo){ 
$photo_tmpname=$_FILES['photo']['tmp_name'];

$photo_savename='photo/'.$photo;

move_uploaded_file($photo_tmpname, $photo_savename);
$oldphotolink=$photo_savename;
}
include('database.php');
$sql="update books set book_code=$book_code,name=$name,category_id=$category_id,author_id=$author_id,photo='$oldphotolink',description='$description',perprice=$price,quantity=$quantity where id=$book_id";
//echo "$sql";
$conn->query($sql);
//header("location:item.php?status=1"); 
?>



