<?php 
session_start();
require '..\..\..\connection.php';
date_default_timezone_set('Asia/Kolkata');
if(isset($_GET['bid']))
{
	$bid = $_GET['bid'];

	$getid = "SELECT * FROM `service_booking` WHERE bid='$bid'";
	$qry = mysqli_query($conn,$getid);
	$ass = mysqli_fetch_assoc($qry);
	$cid = $ass['cid'];
	$pid = $ass['pid'];
	$service_amount = $ass['service_amount'];

	$getwallet = "SELECT * FROM `wallet` WHERE member_type='Customer' AND member_id='$cid'";
	$query = mysqli_query($conn,$getwallet);
	$assoc = mysqli_fetch_assoc($query);
	$wallet = $assoc['wallet_balance'];

	$getwallet1 = "SELECT * FROM `wallet` WHERE member_type='Provider' AND member_id='$pid'";
	$query1 = mysqli_query($conn,$getwallet1);
	$assoc1 = mysqli_fetch_assoc($query1);
	$wallet1 = $assoc1['wallet_balance'];

	//customer transaction
	$wallet = $wallet + $service_amount;

	$updatewallet = "UPDATE `wallet` SET wallet_balance='$wallet' WHERE member_type='Customer' AND member_id='$cid'";
	$successful = mysqli_query($conn,$updatewallet) or die("query unsuccessful");


	$transaction = "INSERT INTO `transaction`(`member_type`, `id`,`transaction_type`,`wallet_balance`,`amount`) VALUES ('Customer','$cid','credit','$wallet','$service_amount')";
	$y = mysqli_query($conn,$transaction) or die("query unsuccessful");


		//provider transaction
	$wallet1 = $wallet1 - $service_amount;

	$updatewallet1 = "UPDATE `wallet` SET wallet_balance='$wallet1' WHERE member_type='Provider' AND member_id='$pid'";
	$successful1 = mysqli_query($conn,$updatewallet1) or die("query unsuccessful");


	$transaction1 = "INSERT INTO `transaction`(`member_type`, `id`,`transaction_type`,`wallet_balance`,`amount`) VALUES ('Provider','$pid','debit','$wallet1','$service_amount')";
	$z = mysqli_query($conn,$transaction1) or die("query unsuccessful");




	$timestamp = date("Y-m-d H:i:s");

	$sql1 = "UPDATE `service_booking` SET `status`='reject',`provider_response_time`='$timestamp' WHERE bid='$bid'";
	$query = mysqli_query($conn,$sql1);
	
	
	if($query)
	{
		echo "<script type='text/javascript'> 
		alert('Successfully reject the service request');
		window.location.replace('http://localhost/service_provider/provider/provider_bookings.php'); 
		</script>
		";
	}
	else
	{
		echo "<script type='text/javascript'> 
		alert('Something Wrong!!!!.');
		window.location.replace('http://localhost/service_provider/provider/provider_bookings.php'); 
		</script>
		";
	}
}
?>
