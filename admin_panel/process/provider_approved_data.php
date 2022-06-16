<?php 

require '..\common\connection.php';

if(!isset($_GET['id']))
{
	header("Location:..\provider_pending.php");
}
$id = $_GET['id'];
$sql = "UPDATE `provider` SET req_status = 'approved' where provider_id = $id";
$result = mysqli_query($conn,$sql);

if($result)
{
	header("Location:..\provider_approved.php");
	exit();
}
else
{
	//header("Location:..\member_pending.php?error");
	echo "error!";
	exit();
}
?>
