<?php
$book_code=$_REQUEST['book_code'];

include('database.php');
$sql="select * from books where book_code='$book_code'";

$result=$conn->query($sql);
while($row=$result->fetch_assoc())
{
echo json_encode($row);
 }?>
