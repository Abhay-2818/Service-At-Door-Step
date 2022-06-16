<?php 
session_start();

require '..\..\connection.php';

$provider_id = $_SESSION["provider_id"];

if(isset($_POST['submit']))
{
	
	// if($_FILES["fileToUpload"]["name"]=="")
	// {
	// 	$provider_image="no_image.jpg";
	// }
	// else
	// {
	// 	require 'file_upload.php';

	// 	$provider_image=$_FILES["fileToUpload"]["name"];
	// 	$provider_image=trim($provider_image);
	// }


		require 'file_upload.php';

		$provider_image=$_FILES["fileToUpload"]["name"];
		$provider_image=trim($provider_image);
		//echo $provider_image;

		if($uploadOk == 0)
		{
			echo "<script type='text/javascript'> 
								alert('Update Not Successfully');
								 window.location.replace('http://localhost/service_provider/provider/provider_settings.php'); 
								</script>
								</script>
								";
		}
		else
		{
			$sql = "UPDATE `provider` SET `provider_image`='$provider_image' WHERE 				provider_id='$provider_id'";
			$result = mysqli_query($conn,$sql) or die("query unsuccessful");

			if($result)
			{
					echo "<script type='text/javascript'> 
								alert('Successfully Update The Photo');
								 window.location.replace('http://localhost/service_provider/provider/provider_settings.php'); 
								</script>
								</script>
								";
					//echo "successfully";
			}
			else
			{
					echo "<script type='text/javascript'> 
								alert('Something wrong!!');
								 window.location.replace('http://localhost/service_provider/provider/provider_settings.php'); 
								</script>
								</script>
								";

			}
		}
		
	
	
}
else
{
	echo "<script type='text/javascript'> 
								alert('Something wrong!!!');
								 window.location.replace('http://localhost/service_provider/provider/provider_settings.php'); 
								</script>
								</script>
								";
}


?>