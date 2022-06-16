<?php 
session_start();
require 'common\connection.php';

if(!isset($_SESSION['admin_id']))
{
	header("Location:admin_login.php");
	exit();
}

$id = $_SESSION["admin_id"];
$sql = "SELECT * from `admin` WHERE id='$id'";
$result = mysqli_query($conn,$sql) or die("query unsuccessful");
$data = mysqli_fetch_assoc($result);
$username = $data['username'];

$user_count_query = "SELECT * FROM `member` WHERE request_status='approved'";
$result1 = mysqli_query($conn,$user_count_query) or die("count query unsuccessful");;
$total_user = mysqli_num_rows($result1);


$provider_count_query = "SELECT * FROM `provider` WHERE req_status='approved'";
$result2 = mysqli_query($conn,$provider_count_query) or die("count query unsuccessful");;
$total_provider = mysqli_num_rows($result2);


$service_count_query = "SELECT * FROM `services` WHERE status='Available'";
$result3 = mysqli_query($conn,$service_count_query) or die("count query unsuccessful");;
$total_services = mysqli_num_rows($result3);

$provider_active_member = "SELECT * FROM `provider_member` WHERE status='active'";
$result4 = mysqli_query($conn,$provider_active_member) or die("count query unsuccessful");
$active_member = mysqli_num_rows($result4);



?>
<!DOCTYPE html>
<html lang="en">



<?php
require 'common/head.php';
?>

<body>
	<div class="main-wrapper">
	
		<!-- Header -->
		<?php 
			require 'common/header.php';
		?>
		<!-- /Header -->
		
		<!-- Sidebar -->
		<?php 
			require 'common/sidebar.php';
		?>
		<!-- /Sidebar -->
		
		<div class="page-wrapper">
			<div class="content container-fluid">
			
				<!-- Page Header -->
				<div class="page-header">
					<div class="row">
						<div class="col-12">
							<h3 class="page-title">Welcome <?php echo $username?>!</h3>
						</div>
					</div>
				</div>
				<!-- /Page Header -->
				
				<div class="row">
					<div class="col-xl-3 col-sm-6 col-12" >
						<div class="card">
							<div class="card-body" >
								<div class="dash-widget-header">
									<span class="dash-widget-icon bg-success" >
										<i class="far fa-user" ></i>
									</span>
									<div class="dash-widget-info">
										<h3><?php echo $total_user ?></h3>
										<h6 class="text-muted">Users</h6>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-sm-6 col-12">
						<div class="card">
							<div class="card-body">
								<div class="dash-widget-header">
									<span class="dash-widget-icon bg-success">
										<i class="fas fa-user-shield"></i>
									</span>
									<div class="dash-widget-info">
										<h3><?php echo $total_provider ?></h3>
										<h6 class="text-muted">Providers</h6>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-sm-6 col-12">
						<div class="card">
							<div class="card-body">
								<div class="dash-widget-header">
									<span class="dash-widget-icon bg-success">
										<i class="fas fa-qrcode"></i>
									</span>
									<div class="dash-widget-info">
										<h3><?php echo $total_services ?></h3>
										<h6 class="text-muted">Active Services</h6>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-sm-6 col-12">
						<div class="card">
							<div class="card-body">
								<div class="dash-widget-header">
									<span class="dash-widget-icon bg-success">
										<i class="fas fa-user-shield"></i>
									</span>
									<div class="dash-widget-info">
										<h3><?php echo $active_member ?></h3>
										<h6 class="text-muted">Active Provider</h6>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			
			</div>
		</div> 
	</div>

	
	<script src="assets/js/jquery-3.5.0.min.js"></script>

	
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

	
	<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

	
	<script src="assets/js/admin.js"></script>

</body>



</html>