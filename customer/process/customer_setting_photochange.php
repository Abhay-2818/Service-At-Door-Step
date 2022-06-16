<?php 
session_start();

require '..\..\connection.php';

$member_id = $_SESSION["user_id"];

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


		require 'file_upload_profile_photo_change.php';

		$profile_image=$_FILES["fileToUpload"]["name"];
		$profile_image=trim($profile_image);
		//echo $provider_image;

		if($uploadOk == 0)
		{
			echo "<script type='text/javascript'> 
								alert('Update Not Successfully');
								 window.location.replace('http://localhost/service_provider/customer/user-settings.php'); 
								</script>
								</script>
								";
								//echo "xyyzz";
		}
		else
		{
		    $sql = "UPDATE `member` SET `profile_image`='$profile_image' WHERE member_id='$member_id'";
			$result = mysqli_query($conn,$sql) or die("query unsuccessful");

			if($result)
			{
					echo "<script type='text/javascript'> 
								alert('Successfully Update The Photo');
								 window.location.replace('http://localhost/service_provider/customer/user-settings.php'); 
								</script>
								</script>
								";
					//echo "successfully";
			}
			else
			{
					echo "<script type='text/javascript'> 
								alert('Something wrong!!');
								 window.location.replace('http://localhost/service_provider/customer/user-settings.php'); 
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
								 window.location.replace('http://localhost/service_provider/customer/user-settings.php'); 
								</script>
								</script>
								";
}


?>