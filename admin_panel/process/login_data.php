<?php
session_start();
require '..\common\connection.php';

if(!isset($_POST['login']))
{
	header("Location:..\admin_login.php");
	exit();
}

$email = $_POST['email'];
$password = $_POST['pwd'];

$sql = "SELECT * FROM `admin` WHERE email ='$email' AND password = '$password'";

$result = mysqli_query($conn,$sql) or die("query unsuccessful");

$userdata = mysqli_fetch_assoc($result);


if(mysqli_num_rows($result)>0)
{
 	$_SESSION["admin_id"] = $userdata['id']; 
 	
 	header("Location:..\index.php");
 	exit();
}
else
{
	// header("Location:..\login.php");
	// exit();

	echo "<script type='text/javascript'> 
		alert('Something Wrong!!!.');
		window.location.replace('http://localhost/service_provider/admin_panel/admin_login.php'); 
		</script>
		";
}

?>