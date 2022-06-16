<?php 
session_start();

require '..\..\connection.php';

if(isset($_POST['update']))
{
	$member_id = $_SESSION["user_id"];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$mobile_no = $_POST['mobileno'];
	$dob = $_POST['dob'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$pincode = $_POST['pincode'];


	$sql = "UPDATE `member` SET `name`='$name',`Email`='$email',`dob`='$dob',`Address`='$address',`city`='$city',`pin-code`='$pincode',`state`='$state',`mobile_no`='$mobile_no'WHERE member_id='$member_id'";
	
		$result = mysqli_query($conn,$sql) or die("query unsuccessful");

	
	if($result)
	{
			echo "<script type='text/javascript'> 
						alert('Successfully update');
						 window.location.replace('http://localhost/service_provider/customer/user-settings.php'); 
						</script>
						</script>
						";
			//echo "successfully";
	}
	else
	{
			echo "<script type='text/javascript'> 
						alert('Something wrong!!');
						 window.location.replace('http://localhost/service_provider/customer/user-settings.php'); 
						</script>
						</script>
						";

	}
	
}
else
{
	echo "<script type='text/javascript'> 
		alert('Something Wrong!!!!.');
		window.location.replace('http://localhost/service_provider/customer/user-settings.php'); 
		</script>
		";
}



?>