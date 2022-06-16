<?php 

require '..\common\connection.php';

if(isset($_POST['submit']))
{
	$category_name = $_POST['categories_name'];
	//$category_image = $_FILES["fileToUpload"]["name"];

	if($_FILES["fileToUpload"]["name"]=="")
	{
		$category_image="no_image.jpg";

	}
	else
	{
		require 'file_upload.php';

		$category_image=$_FILES["fileToUpload"]["name"];
		$category_image=trim($category_image);
	}

	$doi = date("D,d M Y", strtotime(date("Y-m-d")));
	$sql = "INSERT INTO `category`(`category_name`, `category_image`, `doi`) VALUES ('$category_name','$category_image','$doi')";

	$query = mysqli_query($conn,$sql);

	if($query)
	{
		echo "<script type='text/javascript'> 
		alert('Category successfully Add.');
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


}
else
{
	echo "<script type='text/javascript'> 
		alert('Something Wrong!!!!.');
		window.location.replace('http://localhost/service_provider/admin_panel/add-category.php'); 
		</script>
		";
}



?>