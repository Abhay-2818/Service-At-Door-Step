<?php 

session_start();
require '..\..\connection.php';

if(!isset($_POST['submit']))
{
	header("Location:..\provider_availability.php");
	exit();
}

$id = $_GET['id'];

$day = $_POST['day'];
$from_time = $_POST['from_time'];
$to_time = $_POST['to_time'];


$sql = "SELECT * FROM `provider_availability` where pid = '$id'";
$result = mysqli_query($conn,$sql) or die("query unsuccessful");

if(mysqli_num_rows($result) > 0)
{
	if($day == 'mon')
	{
		$sql1 = "UPDATE `provider_availability` SET `from_time_mon`='$from_time',
		`to_time_mon`='$to_time' WHERE pid='$id'";
	}
	else if($day == 'tue')
	{
		$sql1 = "UPDATE `provider_availability` SET `from_time_tue`='$from_time',
		`to_time_tue`='$to_time' WHERE pid='$id'";
	}
	else if($day == 'wed')
	{
		$sql1 = "UPDATE `provider_availability` SET `from_time_wed`='$from_time',
		`to_time_wed`='$to_time' WHERE pid='$id'";
	}
	else if($day == 'thu')
	{
		$sql1 = "UPDATE `provider_availability` SET `from_time_thu`='$from_time',
		`to_time_thu`='$to_time' WHERE pid='$id'";
	}
	else if($day == 'fri')
	{
		$sql1 = "UPDATE `provider_availability` SET `from_time_fri`='$from_time',
		`to_time_fri`='$to_time' WHERE pid='$id'";
	}
	else
	{
		$sql1 = "UPDATE `provider_availability` SET `from_time_sat`='$from_time',
		`to_time_sat`='$to_time' WHERE pid='$id'";
	}
}
else
{
	if($day == 'mon')
	{
		$sql1 = "INSERT INTO `provider_availability` (`pid`,`from_time_mon`, `to_time_mon`) VALUES ('$id','$from_time','$to_time')";
	}
	else if($day == 'tue')
	{
		$sql1 = "INSERT INTO `provider_availability` (`pid`,`from_time_tue`, `to_time_tue`) VALUES ('$id','$from_time','$to_time')";
	}
	else if($day == 'wed')
	{
		$sql1 = "INSERT INTO `provider_availability` (`pid`,`from_time_wed`, `to_time_wed`) VALUES ('$id','$from_time','$to_time')";
	}
	else if($day == 'thu')
	{
		$sql1 = "INSERT INTO `provider_availability` (`pid`,`from_time_thu`, `to_time_thu`) VALUES ('$id','$from_time','$to_time')";
	}
	else if($day == 'fri')
	{
		$sql1 = "INSERT INTO `provider_availability` (`pid`,`from_time_fri`, `to_time_fri`) VALUES ('$id','$from_time','$to_time')";
	}
	else
	{
		$sql1 = "INSERT INTO `provider_availability` (`pid`,`from_time_sat`, `to_time_sat`) VALUES ('$id','$from_time','$to_time')";
	}
	
}



//echo $sql1;
$result1 = mysqli_query($conn,$sql1) or die("query unsuccessful");

if($result1)
{
		echo "<script type='text/javascript'> 
		alert('Successfully');
		window.location.replace('http://localhost/service_provider/provider/provider_availability.php'); 
		</script>
		";

		//echo "successful";
		exit();
}
else
{
		echo "<script type='text/javascript'> 
		alert('Something wrong!!');
		window.location.replace('http://localhost/service_provider/provider/provider_availability.php'); 
		</script>
		";
	//echo "not";
	
		exit();
}


?>