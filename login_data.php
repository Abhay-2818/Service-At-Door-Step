<?php
session_start();
require 'connection.php';

if(!isset($_POST['login']))
{
	header("Location:login.php");
	exit();
}
$email = $_POST['email'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];

$radio = $_POST['radio'];
if($radio == "Customer")
{
	if($password === $cpassword)
	{
		$sql1  ="SELECT * FROM `member` WHERE email ='$email'";
		$result1  = mysqli_query($conn,$sql1) or die("query unsuccessful");
		$userdata1 = mysqli_fetch_assoc($result1);
		$pwd = $userdata1['password'];
		if($password!=$pwd)
		{

			echo "<script type='text/javascript'> 
					alert('password not matched with database.');
					window.location.replace('http://localhost/service_provider/login.php'); 
					</script>
					";

		}
	

	$sql = "SELECT * FROM `member` WHERE email ='$email' AND password = '$password' AND 
	request_status = 'approved'";

	$result = mysqli_query($conn,$sql) or die("query unsuccessful");

	$userdata = mysqli_fetch_assoc($result);
	
		if($userdata)
		{
		 	$_SESSION["user_id"] = $userdata['member_id'];
		 $x = mysqli_query($conn,"UPDATE `member` SET `last_activity` = now() WHERE email ='$email'");
		 	//echo $_SESSION['user_id']; 
		 	header("Location:customer/user_dashboard.php");
		 	exit();
		}
		else
		{
			
			
			$sql1 = "SELECT * FROM `member` WHERE  email ='$email' AND password = '$password' AND 
			request_status = 'pending'";

			$result1 = mysqli_query($conn,$sql1) or die("query unsuccessful");

			if(mysqli_num_rows($result1)>0)
			{
				echo "<script type='text/javascript'> 
				alert('Request is pending.');
				window.location.replace('http://localhost/service_provider/index.php'); 
				</script>
				";
			}
			else
			{
				
				echo "<script type='text/javascript'> 
				alert('Request is rejected.');
				window.location.replace('http://localhost/service_provider/index.php'); 
				</script>
				";
				
			}
		}
	}
	
	else
	{
		echo "<script type='text/javascript'> 
				alert('Passowrd not matched');
				window.location.replace('http://localhost/service_provider/login.php'); 
				</script>
				";
	}
}
else
{
	if($password === $cpassword)
	{
		$provider_query  ="SELECT * FROM `provider` WHERE Email ='$email'";
		$provider_result  = mysqli_query($conn,$provider_query) or die("query unsuccessful");
		$provider_data = mysqli_fetch_assoc($provider_result);
		$provider_pwd = $provider_data['password'];
		if($password!=$provider_pwd)
		{

			echo "<script type='text/javascript'> 
					alert('password not matched with database.');
					window.location.replace('http://localhost/service_provider/login.php'); 
					</script>
					";

		}
	

	$provider_query1 = "SELECT * FROM `provider` WHERE Email ='$email' AND password = '$password' AND 
	req_status = 'approved'";

	$provider_result1 = mysqli_query($conn,$provider_query1) or die("query unsuccessful");

	$provider_data1 = mysqli_fetch_assoc($provider_result1);
	
		if($provider_data1)
		{
		 	$_SESSION["provider_id"] = $provider_data1['provider_id'];
		 	
		 $y = mysqli_query($conn,"UPDATE `provider` SET `last_activity` = now() WHERE email ='$email'");
		 	header("Location:provider/provider_dashboard.php");
		 	exit();
		}
		else
		{
			
			
			$provider_query2 = "SELECT * FROM `provider` WHERE  Email ='$email' AND password = '$password' AND req_status = 'pending'";

			$provider_result2 = mysqli_query($conn,$provider_query2) or die("query unsuccessful");

			if(mysqli_num_rows($provider_result2)>0)
			{
				echo "<script type='text/javascript'> 
				alert('Your Request is pending.');
				window.location.replace('http://localhost/service_provider/index.php'); 
				</script>
				";
			}
			else
			{
				
				echo "<script type='text/javascript'> 
				alert('Your Request is rejected.');
				window.location.replace('http://localhost/service_provider/index.php'); 
				</script>
				";
				
			}
		}
	}
	
	else
	{
		echo "<script type='text/javascript'> 
				alert('Passowrd not matched');
				window.location.replace('http://localhost/service_provider/login.php'); 
				</script>
				";
	}
}




?>