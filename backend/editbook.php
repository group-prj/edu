<?php
$id=$_REQUEST['id'];

include('database.php');
$sql="select * from books where id=$id";
$result=$conn->query($sql);
while($row=$result->fetch_assoc())
{
echo json_encode($row);
 }?>
