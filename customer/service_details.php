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


$sql1 = "SELECT * from `wallet` WHERE member_id='$id' AND member_type='Customer'";
$result1 = mysqli_query($conn,$sql1) or die("query unsuccessful");
$data1 = mysqli_fetch_assoc($result1);
$balance = $data1['wallet_balance'];


$pid = $_GET['pid'];

$print = "SELECT * FROM `provider_availability` where pid = '$pid'";
$array = mysqli_query($conn,$print) or die("query unsuccessful");
$row = mysqli_fetch_assoc($array);


$provider_query = "SELECT * FROM `provider_member` WHERE pid = '$pid'";
$query = mysqli_query($conn,$provider_query) or die("query unsuccessful");
$assoc = mysqli_fetch_assoc($query);


$provider_query1 = "SELECT * from `provider` WHERE provider_id='$pid'";
$x = mysqli_query($conn,$provider_query1) or die("query unsuccessful");
$y = mysqli_fetch_assoc($x);

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
					<div class="col-lg-8">
						<div class="service-view">
							<div class="service-header">
								<h1><?php echo $assoc['service_title']?></h1>
								<address class="service-location"><i class="fas fa-location-arrow"></i> <?php echo $assoc['city']?>, <?php echo $y['state']?></address>
							
								<div class="service-cate">
									<a href="search.html"><?php echo $assoc['category']?></a>
								</div>
							</div>
							
							<div class="service-details">
								<ul class="nav nav-pills service-tabs" id="pills-tab" role="tablist">
									<li class="nav-item">
										<a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Overview</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Service Availability</a>
									</li>
									
								</ul>
								<div class="tab-content">
									<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
										<div class="card service-description">
											<div class="card-body">
												<h5 class="card-title">Service Details</h5>
												<p class="mb-0"><?php echo $assoc['description']?></p>
											</div>
										</div>
									</div>
									<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
										<div class="card available-widget">
										<div class="card-body">
											<ul>
												<li><span>Monday</span><?php echo $row['from_time_mon']?>-<?php echo $row['to_time_mon']?></li>
												<li><span>Tuesday</span><?php echo $row['from_time_tue']?>-<?php echo $row['to_time_tue']?></li>
												<li><span>Wednesday</span><?php echo $row['from_time_wed']?>-<?php echo $row['to_time_wed']?></li>
												<li><span>Thursday</span><?php echo $row['from_time_thu']?>-<?php echo $row['to_time_thu']?></li>
												<li><span>Friday</span><?php echo $row['from_time_fri']?>-<?php echo $row['to_time_fri']?></li>
												<li><span>Saturday</span><?php echo $row['from_time_sat']?>-<?php echo $row['to_time_sat']?></li>
												<li><span>Sunday</span>Holiday</li>
											</ul>
										</div>
									</div>
									</div>
									
								</div>
							</div>
						</div>
					
					</div>
					<div class="col-lg-4 theiaStickySidebar">
						<div class="sidebar-widget widget">
							<div class="service-amount">
								<span>$<?php echo $assoc['service_amount'];?></span>
							</div>
							<div class="service-book">
								<a href="book_service.php?pid=<?php echo $pid?>" class="btn btn-primary"> Book Service </a>
							</div>
						</div>
						<div class="card provider-widget clearfix">
							<div class="card-body">
								<h5 class="card-title">Service Provider</h5>
								<div class="about-author">
									<div class="about-provider-img">
										<div class="provider-img-wrap">
											<a href="javascript:void(0);">
												<img class="img-fluid rounded-circle" alt="" src="../provider/assets/img/provider/<?php echo $y['provider_image']?>">
											</a>
										</div>
									</div>
									<div class="provider-details">
										<a href="javascript:void(0);" class="ser-provider-name"><?php echo $assoc['name'];?></a>
										<p class="last-seen"><i class="fas fa-circle online"></i><?php echo $assoc['status']?></p>
										<!-- <p class="text-muted mb-1">Member Since Apr 2020</p> -->
									</div>
								</div>
								<hr>
								<div class="provider-info">
									<p class="mb-1"><i class="far fa-envelope"></i> <a href="#"> <?php echo $assoc['email']?></a></p>
									<p class="mb-0"><i class="fas fa-phone-alt"></i> <?php echo $assoc['contact']?></p>
								</div>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>﻿
		
		<!-- Footer -->
		<?php require'..\footer.php'; ?>
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

	<!-- Datepicker Core JS -->
	<script src="assets/js/moment.min.js"></script>
	<script src="assets/js/bootstrap-datetimepicker.min.js"></script>

	<!-- Owl JS -->
	<script src="assets/plugins/owlcarousel/owl.carousel.min.js"></script>

	<!-- Custom JS -->
	<script src="assets/js/script.js"></script>
	
</body>

</html>