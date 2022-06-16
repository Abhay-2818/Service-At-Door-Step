<?php 

require '..\common\connection.php';

if(!isset($_POST['register'])){
	header("Location:..\admin_registration.php");
	exit();
}
$name = $_POST['username'];
$email = $_POST['email'];
$phone_no = $_POST['mobile_no'];
$city = $_POST['City'];
$password = $_POST['password'];
$address = $_POST['Address'];

$sql = "INSERT INTO `admin`(`username`, `email`, `address`, `city`, `mobile_no`, `password`) VALUES ('$name','$email','$address','$city','$phone_no','$password')";

$result = mysqli_query($conn,$sql) or die("query unsuccessful");
	if($result)
	{
		echo "<script type='text/javascript'> 
		alert('Your registration is successful.');
		window.location.replace('http://localhost/service_provider/admin_panel/admin_registration.php'); 
		</script>
		";
		exit();
	}
	else
	{
		echo "<script type='text/javascript'> 
		alert('Something Wrong!!.');
		window.location.replace('http://localhost/service_provider/admin_panel/admin_registration.php'); 
		</script>
		";
		exit();
	}

?>