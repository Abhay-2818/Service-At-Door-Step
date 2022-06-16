<?php 
session_start();

require '..\..\connection.php';

$id = $_SESSION["user_id"];
$name = $_POST['name'];
$email = $_POST['email'];
$mobile_no = $_POST['mobileno'];
$dob = $_POST['dob'];
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$pincode = $_POST['pincode'];

$sql = "UPDATE `member` SET `name`='$name',`email`='$email',`dob`='$dob',`address`='$address',`city`=
'$city',`pin-code`='$pincode',`state`='$state',`mobile_no`='$mobile_no' WHERE member_id='$id'";
$result = mysqli_query($conn,$sql);

if($result)
{
	echo "<script type='text/javascript'> 
				alert('successfullly changed');
				window.location.replace('http://localhost/service_provider/customer/user-settings.php'); 
				</script>
				";
	
	
}
else
{
	echo "<script type='text/javascript'> 
				alert('Something wrong!!');
				window.location.replace('http://localhost/service_provider/customer/user-settings.php'); 
				</script>
				";

	
}


?>