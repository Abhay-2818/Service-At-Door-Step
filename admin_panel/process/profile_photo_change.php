<?php 
session_start();

require '..\..\connection.php';


if(isset($_POST['save']))
{
	
		$id = $_SESSION['admin_id'];
	
		require 'file_upload_profile_photo.php';

		$profile_image=$_FILES["fileToUpload"]["name"];
		$profile_image=trim($profile_image);
		
		if($uploadOk == 0)
		{
			echo "<script type='text/javascript'> 
								alert('Update Not Successfully');
								 window.location.replace('http://localhost/service_provider/admin_panel/admin_profile.php'); 
								</script>
								</script>
								";
		}
		else
		{
			$sql = "UPDATE `admin` SET `profile_image`='$profile_image' WHERE id='$id'";
			$result = mysqli_query($conn,$sql) or die("query unsuccessful");

			if($result)
			{
					echo "<script type='text/javascript'> 
								alert('Successfully Update The Photo');
								 window.location.replace('http://localhost/service_provider/admin_panel/admin_profile.php'); 
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