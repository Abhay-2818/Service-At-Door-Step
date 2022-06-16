<?php 
session_start();

require '..\..\connection.php';

if(isset($_POST['book']))
{
	$pid = $_GET['pid'];
	$cid = $_SESSION["user_id"];

	$pname = $_POST['pname'];
	$pcontact = $_POST['pcontact'];
	$service_name = $_POST['servicename'];
	$service_amount = $_POST['service_amount'];

	$cname = $_POST['cname'];
	$ccontact = $_POST['ccontact'];
	$cemail = $_POST['cemail'];
	$ccity = $_POST['ccity'];
	$cstate = $_POST['cstate'];
	$caddress = $_POST['caddress'];
	$timeslot = $_POST['timeslot'];
	$description = $_POST['description'];



	$getwallet = "SELECT * FROM `wallet` WHERE member_type='Customer' AND member_id='$cid'";
	$query = mysqli_query($conn,$getwallet);
	$assoc = mysqli_fetch_assoc($query);
	$wallet = $assoc['wallet_balance'];

	$getwallet1 = "SELECT * FROM `wallet` WHERE member_type='Provider' AND member_id='$pid'";
	$query1 = mysqli_query($conn,$getwallet1);
	$assoc1 = mysqli_fetch_assoc($query1);
	$wallet1 = $assoc1['wallet_balance'];

	if($wallet > $service_amount)
	{
		//customer transaction
		$wallet = $wallet - $service_amount;

		$updatewallet = "UPDATE `wallet` SET wallet_balance='$wallet' WHERE member_type='Customer' AND member_id='$cid'";
		$successful = mysqli_query($conn,$updatewallet) or die("query unsuccessful");


		$transaction = "INSERT INTO `transaction`(`member_type`, `id`,`transaction_type`,`wallet_balance`,`amount`) VALUES ('Customer','$cid','debit','$wallet','$service_amount')";
		$y = mysqli_query($conn,$transaction) or die("query unsuccessful");


		//provider transaction
		$wallet1 = $wallet1 + $service_amount;

		$updatewallet1 = "UPDATE `wallet` SET wallet_balance='$wallet1' WHERE member_type='Provider' AND member_id='$pid'";
		$successful1 = mysqli_query($conn,$updatewallet1) or die("query unsuccessful");


		$transaction1 = "INSERT INTO `transaction`(`member_type`, `id`,`transaction_type`,`wallet_balance`,`amount`) VALUES ('Provider','$pid','credit','$wallet1','$service_amount')";
		$z = mysqli_query($conn,$transaction1) or die("query unsuccessful");




		$sql = "INSERT INTO `service_booking`(`pid`, `cid`, `customer_name`, `customer_email`, `customer_phoneno`, `address`,`city`,`state`, `booking_timeslot`, `description`, `provider_name`, `provider_contact`, `service_name`,`service_amount`) VALUES ('$pid','$cid','$cname','$cemail','$ccontact','$caddress','$ccity','$cstate','$timeslot','$description','$pname','$pcontact',
			'$service_name','$service_amount')";
		$finalquery = mysqli_query($conn,$sql) or die("query unsuccessful");

		//echo "SUCCESSFULLYY FUCKED";
		echo "<script type='text/javascript'> 
		alert('successfully send the request to the service provider.');
		window.location.replace('http://localhost/service_provider/customer/user_bookings.php'); 
		</script>
		";

	}
	else
	{
		
		echo "<script type='text/javascript'> 
		alert('you have not enough money to get the service.');
		window.location.replace('http://localhost/service_provider/customer/user_dashboard.php'); 
		</script>
		";
	}

}
else
{
	echo "<script type='text/javascript'> 
		alert('Something Wrong!!!!.');
		window.location.replace('http://localhost/service_provider/customer/user_dashboard.php'); 
		</script>
		";
}



?>