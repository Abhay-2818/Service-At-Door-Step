<?php 
session_start();

require '..\..\connection.php';

if(isset($_POST['add_wallet']))
{

$id = $_SESSION['provider_id'];

$amt = $_POST['wallet_amt'];

$add_amount = "INSERT INTO `wallet_request`(`id`,`member_type`, `amount`) VALUES 
('$id','Provider','$amt')";

$query = mysqli_query($conn,$add_amount) or die("query unsuccessful");

if($query)
{
	$_SESSION['provider_wallet_id'] = $id;
	echo "<script type='text/javascript'> 
				alert('Your Wallet Request send to admin');
				 window.location.replace('http://localhost/service_provider/provider/provider_wallet.php'); 
				</script>
				";
}

}

?>