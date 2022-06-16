<?php 

require '..\common\connection.php';

$id = $_GET['index'];

	$sql = "DELETE FROM `category` WHERE  category_id='$id'";

	$query = mysqli_query($conn,$sql);

	if($query)
	{
		echo "<script type='text/javascript'> 
		alert('Delete category successfully.');
		window.location.replace('http://localhost/service_provider/admin_panel/categories.php'); 
		</script>
		";
	}
	else
	{
		echo "<script type='text/javascript'> 
		alert('Error!!.');
		window.location.replace('http://localhost/service_provider/admin_panel/categories.php'); 
		</script>
		";
	}





?>