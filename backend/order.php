<?php 

//Accept data
include ('database.php');
//input data
$book_code=$_POST['book_code'];
$user_id=$_POST['user_id'];
$lent_date=$_POST['lent_date'];
$return_date=$_POST['return_date'];


 $sqlSelect = "select * from books where book_code = '$id'";

    $result=$conn->query($sqlSelect);
	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
	}
	$id = $row['id'];

    $sql = "insert into lents(lent_date,return_date,user_id,book_id) values('$lent_date','$return_date',$user_id,$id)";

    $conn->query($sql);
//localhost

$book=$_POST['book'];

foreach ($book as $key => $value) {
	$book_code=$value['book_code'];
	$qty=$value['qty'];
	$qty-=1;
}
$sqlUpdate = "update books set qty= $qty where book_code = '$book_code'";
    $conn->query($sqlUpdate);
header("location:order.php");
    echo 'Done';
?>


