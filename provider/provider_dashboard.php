<?php 

session_start();


require '..\connection.php';
if(!isset($_SESSION['provider_id']))
{
	header("Location:..\login.php");
	exit();
}
$provider_id = $_SESSION["provider_id"];
$provider_query = "SELECT * from `provider` WHERE provider_id='$provider_id'";
$result = mysqli_query($conn,$provider_query) or die("query unsuccessful");
$data = mysqli_fetch_assoc($result);

$name = $data['name'];


$sql1 = "SELECT * from `wallet` WHERE member_id='$provider_id' AND member_type='Provider'";
$result1 = mysqli_query($conn,$sql1) or die("query unsuccessful");
$data1 = mysqli_fetch_assoc($result1);
$balance = $data1['wallet_balance'];

$check = "SELECT * FROM `add_package` WHERE provider_id = $provider_id AND status='active'";
$check_query = mysqli_query($conn,$check) or die("unsuccessful query");
$result2 = mysqli_fetch_assoc($check_query);
$package_name = $result2['package_name'];
$package_status = $result2['status'];
$package_start_date = $result2['start_date'];
$package_end_date = $result2['end_date'];
$package_price = $result2['package_price'];


$pending_req = "SELECT * FROM `service_booking` WHERE pid='$provider_id' AND status='pending'";
$qry = mysqli_query($conn,$pending_req);
$total_req = mysqli_num_rows($qry);

$complete_req = "SELECT * FROM `service_booking` WHERE pid='$provider_id' AND status='completed'";
$qry1 = mysqli_query($conn,$complete_req);
$total_req1 = mysqli_num_rows($qry1);


$no_of_days = "SELECT * FROM `provider_member` WHERE pid='$provider_id'";
$no_of_days_query = mysqli_query($conn,$no_of_days);
$no_of_days_data = mysqli_fetch_assoc($no_of_days_query);

?>

<!DOCTYPE html>
<html lang="en">

<?php require '..\head.php'; ?>
<body>

	<div class="main-wrapper">
	
		<!-- Header -->
		<?php require 'common/provider_header.php'; ?>
		<!-- /Header -->
		
		<div class="content">
			<div class="container">
				<div class="row">
					<div class="col-xl-3 col-md-4 theiaStickySidebar">
						<?php require'common/provider_sidebar.php' ?>
					</div>
					<div class="col-xl-9 col-md-8">
						<h4 class="widget-title">Dashboard</h4>
						<div class="row">
							<div class="col-lg-4">
								<a href="provider_request_service_list.php" class="dash-widget dash-bg-1">
									<span class="dash-widget-icon"><?php echo $total_req?></span>
									<div class="dash-widget-info">
										<span>Booking Request</span>
									</div>
								</a>
							</div>
							<div class="col-lg-4">
								<a href="provider_completed_service_list.php" class="dash-widget dash-bg-2">
									<span class="dash-widget-icon"><?php echo $total_req1?></span>
									<div class="dash-widget-info">
										<span>Service completed</span>
									</div>
								</a>
							</div>
							<div class="col-lg-4">
								<a href="" class="dash-widget dash-bg-3">
									<span class="dash-widget-icon"><?php echo $no_of_days_data['no_of_days']?></span>
									<div class="dash-widget-info">
										<span>Days Left</span>
									</div>
								</a>
							</div>
						</div>
						<div class="card mb-0">
							<div class="row no-gutters">
								<div class="col-lg-8">
									<div class="card-body">
										<h6 class="title">Plan Details</h6>
										<div class="sp-plan-name">
											<h6 class="title">
												<span class="badge badge-primary badge-pill"><?php echo $package_name ?></span> <span class="badge badge-success badge-pill"><?php echo $package_status?></span>
											</h6>
											<!-- <p>Subscription ID: <span class="text-base">100394949</span></p> -->
										</div>
										<ul class="row">
											<li class="col-6 col-lg-6">
												<p>Started On <?php echo $package_start_date ?></p>
											</li>
											<li class="col-6 col-lg-6">
												<p>Ended On <?php echo $package_end_date ?></p>
											</li>
											<li class="col-6 col-lg-6">
												<p>Price $<?php echo $package_price ?></p>
											</li>
										</ul>
										
									</div>
								</div>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>﻿
		
		<!-- Footer -->
		
		<?php 
			require '..\footer.php';
		?>
		<!-- /Footer -->
		
	</div>

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