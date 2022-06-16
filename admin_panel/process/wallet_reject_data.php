<?php 

require '..\common\connection.php';

if(!isset($_GET['id']))
{
	header("Location:..\wallet_pending.php");
}
$index = $_GET['index'];
$sql = "UPDATE `wallet_request` SET request_status = 'reject' where wallet_request_id ='$index'";
$result = mysqli_query($conn,$sql);

if($result)
{
	header("Location:..\wallet_reject.php");
	exit();
}
else
{
	//header("Location:..\member_pending.php?error");
	echo "error!";
	exit();
}
?>
