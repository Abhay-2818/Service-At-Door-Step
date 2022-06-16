<?php 
session_start();
require '..\connection.php';
if(!isset($_SESSION['user_id']))
{
	header("Location:..\login.php");
	exit();
}
$id = $_SESSION["user_id"];
$sql = "SELECT * from `member` WHERE member_id='$id'";
$result = mysqli_query($conn,$sql) or die("query unsuccessful");
$data = mysqli_fetch_assoc($result);
$name = $data['name'];

$sql2 = "SELECT * FROM `wallet` WHERE member_id='$id' AND member_type='Customer'";
$result2 = mysqli_query($conn,$sql2);
$array = mysqli_fetch_assoc($result2);
$balance = $array['wallet_balance'];


$pending_req = "SELECT * FROM `service_booking` WHERE cid='$id' AND status='pending'";
$qry = mysqli_query($conn,$pending_req);
$total_req = mysqli_num_rows($qry);

$completed_req = "SELECT * FROM `service_booking` WHERE cid='$id' AND status='completed'";
$qry1 = mysqli_query($conn,$completed_req);
$total_req1 = mysqli_num_rows($qry1);

$reject_req = "SELECT * FROM `service_booking` WHERE cid='$id' AND status='reject'";
$qry2 = mysqli_query($conn,$reject_req);
$total_req2 = mysqli_num_rows($qry2);

?>


<!DOCTYPE html>
<html lang="en">

<?php 
require '..\head.php';
?>


<body>

	<div class="main-wrapper">
	
		<!-- Header -->
		
		<?php require'common/user_header.php';   ?>
		
		<!-- /Header -->
	
		<div class="content">
			<div class="container">
				<div class="row">
					<div class="col-xl-3 col-md-4">
						<?php require'common/user_sidebar.php' ?>
					</div>
					<div class="col-xl-9 col-md-8">
						<div class="row">
							<div class="col-lg-4">
								<a href="" class="dash-widget dash-bg-1">
									<span class="dash-widget-icon"><?php echo $total_req?></span>
									<div class="dash-widget-info">
										<span>Pending Booking Request</span>
									</div>
								</a>
							</div>
							<div class="col-lg-4">
								<a href="" class="dash-widget dash-bg-2">
									<span class="dash-widget-icon"><?php echo $total_req1?></span>
									<div class="dash-widget-info">
										<span>Completed Booking Request</span>
									</div>
								</a>
							</div>
							<div class="col-lg-4">
								<a href="" class="dash-widget dash-bg-3">
									<span class="dash-widget-icon"><?php echo $total_req2?></span>
									<div class="dash-widget-info">
										<span>Reject Booking Request</span>
									</div>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div></div>
	
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