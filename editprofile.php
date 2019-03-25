<?php
$id=$_REQUEST['id'];

include('backend/database.php');
$sql="select * from users where id=$id";
$result=$conn->query($sql);
while($row=$result->fetch_assoc())
{
echo json_encode($row);
 }?>
