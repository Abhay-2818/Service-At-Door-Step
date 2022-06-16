<?php
session_start();

require '..\common\connection.php';


if(isset($_POST['save']))
{
	$id = $_SESSION['admin_id'];
	$password = $_POST['password'];
	$confirm_password = $_POST['cpassword'];


	if($password===$confirm_password)
		{
			
			$sql = "UPDATE `admin` SET password='$password' WHERE id='$id'";
			$result = mysqli_query($conn,$sql) or die("error");
			echo "<script type='text/javascript'> 
					alert('Successfully changed Password');
					window.location.replace('http://localhost/service_provider/admin_panel/index.php'); 
					</script>
					"; 
			 
		}
		else
		{
			echo "<script type='text/javascript'> 
					alert('please enter correct password');
					window.location.replace('http://localhost/service_provider/admin_panel/admin_profile.php');
					</script>
					"; 
		}
		
}
?>