<?php 

require 'connection.php';

if(!isset($_POST['signup']))
{
	header("Location:service_provider_registration.php");
	exit();
}

$name = $_POST['name'];
$email = $_POST['email'];
$address = $_POST['address'];
$city = $_POST['city'];
$pincode = $_POST['pincode'];
$state = $_POST['state'];
$mobile_no = $_POST['mobile_no'];
$password = $_POST['password'];

$sql = "INSERT INTO `provider`(`name`, `Email`, `Address`, `city`, `pincode`, `state`, `mobile_no`, `password`) VALUES ('$name','$email','$address','$city','$pincode','$state','$mobile_no','$password')";

$result = mysqli_query($conn,$sql) or die("query unsuccessful");

if($result)
{
		// header("Location:signup.php");
		echo "<script type='text/javascript'> 
		alert('Your request has been send to admin.');
		window.location.replace('http://localhost/service_provider/service_provider_registration.php'); 
		</script>
		";
		exit();
}
else
{
		echo "<script type='text/javascript'> 
		alert('Error!!.');
		window.location.replace('http://localhost/service_provider/service_provider_registration.php'); 
		</script>
		";
		exit();
}


?>