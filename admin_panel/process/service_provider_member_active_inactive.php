<?php 

require '..\common\connection.php';

if(isset($_GET['p_m_id']))
{
	$p_m_id = $_GET['p_m_id'];


	$sql = "SELECT * FROM `provider_member` WHERE p_m_id='$p_m_id'";
	$result = mysqli_query($conn,$sql);
	$array = mysqli_fetch_assoc($result);
	$status = $array['status'];

	if($status=="active")
	{

		$sql = "UPDATE `provider_member` SET `status`='inactive' WHERE p_m_id='$p_m_id'";
		$query = mysqli_query($conn,$sql);
	}
	else
	{

		$sql = "UPDATE `provider_member` SET `status`='active' WHERE p_m_id='$p_m_id'";
		$query = mysqli_query($conn,$sql);
	}

	
	if($query)
	{
		header("Location:..\service_provider_member.php");
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