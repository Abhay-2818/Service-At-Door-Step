<?php 
$lifetime = 365400;
session_set_cookie_params($lifetime);

session_start();


require '..\connection.php';
if(!isset($_SESSION['provider_id']))
{
	header("Location:..\login.php");
	exit();
}
$provider_id = $_SESSION["provider_id"];

$sql1 = "SELECT * from `wallet` WHERE member_id='$provider_id' AND member_type='Provider'";
$result1 = mysqli_query($conn,$sql1) or die("query unsuccessful");
$data1 = mysqli_fetch_assoc($result1);
$balance = $data1['wallet_balance'];

$sql = "SELECT * FROM `provider_member` where pid='$provider_id' And status='active'";
$x = mysqli_query($conn,$sql) or die("query unsuccessful");
$result = mysqli_fetch_assoc($x);


$name = $result['name'];
$email = $result['email'];

$state = $result['state'];
$city = $result['city'];
$address = $result['Address'];
$pincode = $result['pincode'];
$dob = $result['dob'];


$contact = $result['contact'];

$category_name = $result['category'];
$service_title = $result['service_title'];
$service_amount = $result['service_amount'];

$package_name = $result['package_name'];
$package_price = $result['package_price'];
$package_start_date = $result['package_start_date'];
$package_end_date = $result['package_end_date']; 

$no_of_days = $result['no_of_days'];
$description = $result['description'];
$status = $result['status'];


if($status == "active"){
?>
<!DOCTYPE html>
<html lang="en">

<?php 
	require '..\head.php'; 
?>

<body>

	<div class="main-wrapper">
	
		<!-- Header -->
		<?php 
			require 'common/provider_header.php'; ?>
		<!-- /Header -->

		<div class="content" id="printableArea">
			<div class="container">
				<div class="row justify-content-center" style="border-radius: 10px;box-shadow: 10px 10px 1px rgba(21, 100, 30, 0.288);
    border: 2px solid black;">
					<div class="col-lg-10">
						<div class="section-header text-center">
							<h2>Service Approval Form Receipt</h2>
						</div>
						<form >
							        <div class="form-group">
										<label style="color: black; font-weight: bold;">Name : </label>
										<?php echo $name ?>
									</div>
									<div class="form-group">
										<label style="color: black; font-weight: bold;">Dob : </label>
										<?php echo $dob ?>
									</div>

									<div class="form-group">
										<label style="color: black; font-weight: bold;">E-mail : </label>
										<?php echo $email ?>
									</div>

									<div class="form-group">
										<label style="color: black; font-weight: bold;">Address : </label>
										<?php echo $address ?>
									</div>

									<div class="form-group">
										<label style="color: black; font-weight: bold;">City : </label>
										<?php echo $city ?>
									</div>

									<div class="form-group">
										<label style="color: black; font-weight: bold;">Pin-code : </label>
										<?php echo $pincode ?>
									</div>

									<div class="form-group">
										<label style="color: black; font-weight: bold;">State : </label>
										<?php echo $state ?>
									</div>

								
									<div class="form-group">
										<label style="color: black; font-weight: bold;">Contact : </label>
										<?php echo $contact ?>
									</div>

									<div class="form-group">
										<label style="color: black; font-weight: bold;">Category : </label>
										<?php echo $category_name ?>
									</div>
									<div class="form-group">
										<label style="color: black; font-weight: bold;">Service title : </label>
										<?php echo $service_title ?>
									</div>
									<div class="form-group">
										<label style="color: black; font-weight: bold;">Service amount : </label>
										<?php echo $service_amount ?>
									</div>
									<div class="form-group">
										<label style="color: black; font-weight: bold;">Package-name : </label>
										<?php echo $package_name ?>
									</div>
									<div class="form-group">
										<label style="color: black; font-weight: bold;">Package-price : </label>
										<?php echo $package_price ?>
									</div>
									<div class="form-group">
										<label style="color: black; font-weight: bold;">Package start date : </label>
										<?php echo $package_start_date ?>
									</div>
									<div class="form-group">
										<label style="color: black; font-weight: bold;">Package end date : </label>
										<?php echo $package_end_date ?>
									</div>
									<div class="form-group">
										<label style="color: black; font-weight: bold;">No of days : </label>
										<?php echo $no_of_days ?>
									</div>
									<div class="form-group">
										<label style="color: black; font-weight: bold;">Description : </label>
										<?php echo $description ?>
									</div>
									<div class="form-group">
										<label style="color: black; font-weight: bold;">Status : </label>
										<?php echo $status ?>
									</div>

									<div class="form-group" style="text-align: center;">
										<hr style="border-radius: 5px;border-color: black;">
										<p><b>Service At Door Step || 9979-230-104</b></p>
									</div>

									
									<div class="mt-4">
										
									<p align="center "><input type="button" class="btn btn-success" onclick="printDiv('printableArea')" value="Print"
										style="letter-spacing: 2px;font-size: 18px;"></p>
									</div>
									
							

						</form>
					</div>
				</div>
			</div>
		</div>

		
	</div>

	<script>
       function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
    </script>

	<!-- jQuery -->
	<script src="assets/js/jquery-3.5.0.min.js"></script>

	<!-- Bootstrap Core JS -->
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

	<!-- Sticky Sidebar JS -->
	<script src="assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
	<script src="assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>

	<!-- Custom JS -->
	<script src="assets/js/script.js"></script>
	
</body>


</html>
<?php }else{

	echo "<script type='text/javascript'> 
		alert('Your service request has not been active yet.');
		window.location.replace('http://localhost/service_provider/provider/provider_dashboard.php'); 
		</script>
		";
		exit();
}
?>