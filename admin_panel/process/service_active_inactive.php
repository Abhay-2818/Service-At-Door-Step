<?php 

require '..\common\connection.php';
date_default_timezone_set('Asia/Kolkata');
if(isset($_GET['service_id']))
{
	$service_id = $_GET['service_id'];


	$sql = "SELECT * FROM `services` WHERE service_id='$service_id'";
	$result = mysqli_query($conn,$sql);
	$array = mysqli_fetch_assoc($result);
	$status = $array['status'];

	if($status=="Available")
	{

		$dou = date("D,d M Y", strtotime(date("Y-m-d")));
		$sql = "UPDATE `services` SET `status`='UnAvailable',`dou`='$dou' WHERE service_id='$service_id'";
		$query = mysqli_query($conn,$sql);
	}
	else
	{

		$dou = date("D,d M Y", strtotime(date("Y-m-d")));
		$sql = "UPDATE `services` SET `status`='Available',`dou`='$dou' WHERE service_id='$service_id'";
		$query = mysqli_query($conn,$sql);
	}

	
	if($query)
	{
		header("Location:..\service_list.php");
	}
	else
	{
		echo "<script type='text/javascript'> 
		alert('Something Wrong!!!!.');
		window.location.replace('http://localhost/service_provider/admin_panel/service_list.php'); 
		</script>
		";
	}
}
?>
