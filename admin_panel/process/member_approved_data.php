<?php 

require '..\common\connection.php';

if(!isset($_GET['id']))
{
	header("Location:..\member_pending.php");
}
$id = $_GET['id'];
$sql = "UPDATE `member` SET request_status = 'approved' where member_id = $id";
$result = mysqli_query($conn,$sql);

if($result)
{
	header("Location:..\member_approved.php");
	exit();
}
else
{
	//header("Location:..\member_pending.php?error");
	echo "error!";
	exit();
}
?>
