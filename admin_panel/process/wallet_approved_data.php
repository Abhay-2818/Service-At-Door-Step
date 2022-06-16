<?php 

require '..\common\connection.php';

if(!isset($_GET['id']))
{
	header("Location:..\wallet_pending.php");
}
$index = $_GET['index'];
$sql = "UPDATE `wallet_request` SET request_status = 'approved' where wallet_request_id ='$index'";
$result = mysqli_query($conn,$sql);

$sql1 = "SELECT * FROM `wallet_request` WHERE wallet_request_id='$index'";
$result1 = mysqli_query($conn,$sql1);
$x = mysqli_fetch_assoc($result1);
$get_amount = $x['amount'];
$id = $x['id'];
$type = $x['member_type'];

if($type=='Customer')
{
		$wallet_query = "SELECT * FROM `wallet` WHERE member_id='$id' AND member_type='Customer'";
		$result2 = mysqli_query($conn,$wallet_query);


		if(mysqli_num_rows($result2)>0)
		{
			$wallet_balance_update = "SELECT * FROM `wallet` WHERE member_id='$id' AND member_type='Customer'";
			$result3 = mysqli_query($conn,$wallet_balance_update);
			$z = mysqli_fetch_assoc($result3);
			$balance = $z['wallet_balance'];

			$new_amount = $balance + $get_amount;

			$wallet = "UPDATE `wallet` SET wallet_balance = '$new_amount' where member_id ='$id' AND member_type='Customer'";
			$result3 = mysqli_query($conn,$wallet);
		}
		else
		{
			$wallet = "INSERT INTO `wallet`(`member_id`,`member_type`,`wallet_balance`) VALUES ('$id','Customer','$get_amount')";
			$result3 = mysqli_query($conn,$wallet);
		}



		$sql4 = "SELECT * FROM `wallet` WHERE member_id='$id' AND member_type='Customer'";
		$result4 = mysqli_query($conn,$sql4);
		$array = mysqli_fetch_assoc($result4);
		$balance1 = $array['wallet_balance'];





		$transaction = "INSERT INTO `transaction`(`member_type`, `id`,`transaction_type`,`wallet_balance`,`amount`) VALUES ('Customer','$id','credit','$balance1','$get_amount')";
		$y = mysqli_query($conn,$transaction) or die("query unsuccessful");


}
else
{
	$provider_wallet_query = "SELECT * FROM `wallet` WHERE member_id='$id' AND member_type='Provider'";
		$result2 = mysqli_query($conn,$provider_wallet_query);


		if(mysqli_num_rows($result2)>0)
		{
			$wallet_balance_update = "SELECT * FROM `wallet` WHERE member_id='$id' AND member_type='Provider'";
			$result3 = mysqli_query($conn,$wallet_balance_update);
			$z = mysqli_fetch_assoc($result3);
			$balance = $z['wallet_balance'];

			$new_amount = $balance + $get_amount;

			$wallet = "UPDATE `wallet` SET wallet_balance = '$new_amount' where member_id ='$id' AND member_type='Provider'";
			$result3 = mysqli_query($conn,$wallet);
		}
		else
		{
			$wallet = "INSERT INTO `wallet`(`member_id`,`member_type`,`wallet_balance`) VALUES ('$id','Provider','$get_amount')";
			$result3 = mysqli_query($conn,$wallet);
		}



		$sql4 = "SELECT * FROM `wallet` WHERE member_id='$id' AND member_type='Provider'";
		$result4 = mysqli_query($conn,$sql4);
		$array = mysqli_fetch_assoc($result4);
		$balance1 = $array['wallet_balance'];



		$transaction = "INSERT INTO `transaction`(`member_type`, `id`,`transaction_type`,`wallet_balance`,`amount`) VALUES ('Provider','$id','credit','$balance1','$get_amount')";
		$y = mysqli_query($conn,$transaction) or die("query unsuccessful");
}





if($result)
{
	
	header("Location:..\wallet_approved.php");
	exit();
}
else
{
	//header("Location:..\member_pending.php?error");
	echo "error!";
	exit();
}
?>
