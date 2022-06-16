<?php 

require '..\common\connection.php';

if(isset($_POST['submit']))
{
	$category_id = $_POST['categories_id'];
	$servername = $_POST['service_name'];
	$doi = date("D,d M Y", strtotime(date("Y-m-d")));
	$sql = "INSERT INTO `services`(`category_id`, `service_name`,`doi`) VALUES ('$category_id','$servername','$doi')";
	$query = mysqli_query($conn,$sql);

	if($query)
	{
		echo "<script type='text/javascript'> 
		alert('Service successfully Added.');
		window.location.replace('http://localhost/service_provider/admin_panel/add_service.php'); 
		</script>
		";
	}
	else
	{
		echo "<script type='text/javascript'> 
		alert('Error!!.');
		window.location.replace('http://localhost/service_provider/admin_panel/add_service.php'); 
		</script>
		";
	}
}
else
{
	echo "<script type='text/javascript'> 
		alert('Something Wrong!!!!.');
		window.location.replace('http://localhost/service_provider/admin_panel/add_service.php'); 
		</script>
		";
}






?>
