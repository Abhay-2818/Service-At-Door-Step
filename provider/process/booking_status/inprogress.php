<?php 
session_start();
require '..\..\..\connection.php';
date_default_timezone_set('Asia/Kolkata');
if(isset($_GET['bid']))
{
	$bid = $_GET['bid'];

	$timestamp = date("Y-m-d H:i:s");

	$sql1 = "UPDATE `service_booking` SET `status`='inprogress',`provider_response_time`='$timestamp' WHERE bid='$bid'";
	$query = mysqli_query($conn,$sql1);
	
	
	if($query)
	{
		echo "<script type='text/javascript'> 
		alert('Successfully accept the service request');
		window.location.replace('http://localhost/service_provider/provider/provider_bookings.php'); 
		</script>
		";
	}
	else
	{
		echo "<script type='text/javascript'> 
		alert('Something Wrong!!!!.');
		window.location.replace('http://localhost/service_provider/provider/provider_bookings.php'); 
		</script>
		";
	}
}
?>
