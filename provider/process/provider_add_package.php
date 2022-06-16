<?php
session_start();
require '..\..\connection.php';

if(isset($_POST['submit']))
{
	$id = $_GET['id'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$contact = $_POST['mobile'];
	$package = $_POST['package'];

	$check = "SELECT * FROM `add_package` WHERE provider_id = $id AND status='active'";
	$check_query = mysqli_query($conn,$check) or die("unsuccessful query");


	if(mysqli_num_rows($check_query) == 0){

	if($package == "silver")
	{

			$walletcheck = "SELECT * FROM `wallet` Where member_type='Provider' AND member_id=$id";
			$fire = mysqli_query($conn,$walletcheck) or die("query unsuccessful");

			$wallet_assoc = mysqli_fetch_assoc($fire);

			$amount = $wallet_assoc['wallet_balance'];
			$wallet_id = $wallet_assoc['wallet_id'];

			if($amount > 1000)
			{
				$x = $amount - 1000;
				$update_wallet_table = "UPDATE `wallet` SET `wallet_balance`=$x WHERE wallet_id=$wallet_id";
				$fire1 = mysqli_query($conn,$update_wallet_table) or die("query unsuccessful");

				date_default_timezone_set('Asia/Kolkata');
				$start_date = date('Y-m-d');
				$end_date = date('Y/m/d',strtotime('+30 days',strtotime($start_date))) . PHP_EOL;

			$sql = "INSERT INTO `add_package`(`provider_id`, `name`, `email`, `contact`, `package_name`, `package_price`,`no_of_days`,`start_date`,`end_date`) VALUES ('$id','$name','$email','$contact','$package','1000','30','$start_date','$end_date')";

				$result = mysqli_query($conn,$sql) or die("query unsuccessful");


				$transaction = "INSERT INTO `transaction`(`member_type`, `id`,`transaction_type`,`wallet_balance`,`amount`) VALUES ('Provider','$id','debit','$x','1000')";
		        $y = mysqli_query($conn,$transaction) or die("query unsuccessful");


				if($result)
				{
					// header("Location:signup.php");
					echo "<script type='text/javascript'>
					alert('Successfully Buy the Package.'); 
					window.location.replace('http://localhost/service_provider/provider/add_service.php'); 
					</script>";
					exit();
				}
				else
				{
					echo "<script type='text/javascript'> 
					alert('Error!!.');
					window.location.replace('http://localhost/service_provider/provider/add_package.php'); 
					</script>";
					exit();
				}



			}
			else
			{

			echo "<script type='text/javascript'> 
			alert('You do not have enough money to buy silver package.');
			window.location.replace('http://localhost/service_provider/provider/provider_wallet.php'); 
				</script>";
				exit();

			}

	
	}
	else if($package == "gold")
	{

		$walletcheck = "SELECT * FROM `wallet` Where member_type='Provider' AND member_id=$id";
			$fire = mysqli_query($conn,$walletcheck) or die("query unsuccessful");

			$wallet_assoc = mysqli_fetch_assoc($fire);

			$amount = $wallet_assoc['wallet_balance'];
			$wallet_id = $wallet_assoc['wallet_id'];

			

			if($amount > 2500)
			{
				$x = $amount - 2500;
				$update_wallet_table = "UPDATE `wallet` SET `wallet_balance`=$x WHERE wallet_id=$wallet_id";
				$fire1 = mysqli_query($conn,$update_wallet_table) or die("query unsuccessful");

				date_default_timezone_set('Asia/Kolkata');
				$start_date = date('Y-m-d');
				$end_date = date('Y/m/d',strtotime('+60 days',strtotime($start_date))) . PHP_EOL;


			$sql = "INSERT INTO `add_package`(`provider_id`, `name`, `email`, `contact`, `package_name`, `package_price`,`no_of_days`,`start_date`,`end_date`) VALUES ('$id','$name','$email','$contact','$package','2500','60','$start_date','$end_date')";

			$result = mysqli_query($conn,$sql) or die("query unsuccessful");



				$transaction = "INSERT INTO `transaction`(`member_type`, `id`,`transaction_type`,`wallet_balance`,`amount`) VALUES ('Provider','$id','debit','$x','2500')";
		        $y = mysqli_query($conn,$transaction) or die("query unsuccessful");


			if($result)
			{
				// header("Location:signup.php");
				echo "<script type='text/javascript'>
				alert('Successfully Buy the Package.'); 
				window.location.replace('http://localhost/service_provider/provider/add_service.php'); 
				</script>";
				exit();
			}
			else
			{
				echo "<script type='text/javascript'> 
				alert('Error!!.');
				window.location.replace('http://localhost/service_provider/provider/add_package.php'); 
				</script>";
				exit();
			}


			}
			else
			{

			echo "<script type='text/javascript'> 
			alert('You do not have enough money to buy gold package.');
		     window.location.replace('http://localhost/service_provider/provider/provider_wallet.php'); 
			</script>";
				exit();

			}

	
	}
	else
	{
		$walletcheck = "SELECT * FROM `wallet` Where member_type='Provider' AND member_id=$id";
			$fire = mysqli_query($conn,$walletcheck) or die("query unsuccessful");

			$wallet_assoc = mysqli_fetch_assoc($fire);

			$amount = $wallet_assoc['wallet_balance'];
			$wallet_id = $wallet_assoc['wallet_id'];


			if($amount > 4000)
			{
				$x = $amount - 4000;
				$update_wallet_table = "UPDATE `wallet` SET `wallet_balance`=$x WHERE wallet_id=$wallet_id";
				$fire1 = mysqli_query($conn,$update_wallet_table) or die("query unsuccessful");


		    date_default_timezone_set('Asia/Kolkata');
				$start_date = date('Y-m-d');
				$end_date = date('Y/m/d',strtotime('+90 days',strtotime($start_date))) . PHP_EOL;



			$sql = "INSERT INTO `add_package`(`provider_id`, `name`, `email`, `contact`, `package_name`, `package_price`,`no_of_days`,`start_date`,`end_date`) VALUES ('$id','$name','$email','$contact','$package','4000','90','$start_date','$end_date')";

		    $result = mysqli_query($conn,$sql) or die("query unsuccessful");


				$transaction = "INSERT INTO `transaction`(`member_type`, `id`,`transaction_type`,`wallet_balance`,`amount`) VALUES ('Provider','$id','debit','$x','4000')";
		        $y = mysqli_query($conn,$transaction) or die("query unsuccessful");


			    if($result)
				{
					// header("Location:signup.php");
					echo "<script type='text/javascript'>
					alert('Successfully Buy the Package.'); 
					window.location.replace('http://localhost/service_provider/provider/add_service.php'); 
					</script>";
					exit();
				}
				else
				{
					echo "<script type='text/javascript'> 
					alert('Error!!.');
					window.location.replace('http://localhost/service_provider/provider/add_package.php'); 
					</script>";
					exit();
				}

			}else{


				echo "<script type='text/javascript'>
				     alert('You do not have enough money to buy the platinum package.'); 
					window.location.replace('http://localhost/service_provider/provider/provider_wallet.php'); 
					</script>
					";

			}


	}

	}
	else
	{
		echo "<script type='text/javascript'> 
		alert('You can not Buy more then one package.');
		window.location.replace('http://localhost/service_provider/provider/provider_dashboard.php'); 
		</script>";
		exit();
	}



	
	

}
else
{
		echo "<script type='text/javascript'> 
		alert('Error!!.need to fill form');
		window.location.replace('http://localhost/service_provider/provider/add_package.php'); 
		</script>";
		exit();
	
}


?>