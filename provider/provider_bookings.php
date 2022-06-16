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
						<div class="row align-items-center mb-4">
							<div class="col">
								<h4 class="widget-title mb-0">Booking List</h4>
							</div>
							
						</div>
						<div id="dataList">

							<?php 

							$booking_query = "SELECT * FROM `service_booking` WHERE pid=$provider_id ORDER BY bid DESC";
							$result = mysqli_query($conn,$booking_query) or die("query unsuccessful");

							if(mysqli_num_rows($result) > 0){
									 	
									 	while($row = $result->fetch_assoc()){

									 	$cid = $row['cid'];
									 	$sql1 = "SELECT * FROM `member` WHERE member_id='$cid'";
									 	$x = mysqli_query($conn,$sql1);
									 	$assoc = mysqli_fetch_assoc($x);
									 	$profile_image = $assoc['profile_image'];

									 
									 	$time = $row['booking_time'];
									 	$dt = new DateTime($time);

										$date = $dt->format('d  M  Y');
									 	


							?>

							<div class="bookings">
							<div class="booking-list">
								<div class="booking-widget">
									<div class="booking-det-info">
										<h3>
											<a href=""><?php echo $row['service_name']?></a>
										</h3>
										<ul class="booking-details">
											<li>
												<span>Booking Date</span> <?php echo $date ?> <span class="badge badge-pill badge-prof bg-primary"><?php echo $row['status']?></span>
											</li>
											<li><span>Booking time</span> <?php echo $row['booking_timeslot']?></li>
											<li><span>Amount</span>$<?php echo $row['service_amount']?></li>
											<li><span>Location</span><?php echo $row['address']?>,<?php echo $row['city']?>,<?php echo $row['state'] ?></li>
											<li><span>User Phone</span> <?php echo $row['customer_phoneno']?></li>
											<li>
												<span>User</span>
												<div class="avatar avatar-xs mr-1">
													<img class="avatar-img rounded-circle" alt="User Image" src="../customer/assets/img/customer/<?php echo $profile_image?>">
												</div>
												<?php echo $row['customer_name']?>
											</li>
										</ul>
									</div>
								</div>
								<div class="booking-action">
									<?php 
									if($row['status'] == 'pending'){
									?>
									<a href="process/booking_status/reject.php?bid=<?php echo $row['bid'] ?>" class="btn btn-sm bg-danger-light"><i class="fas fa-times"></i> Reject the Service</a>
									<a href="process/booking_status/inprogress.php?bid=<?php echo $row['bid'] ?>" class="btn btn-sm bg-success-light"><i class="fas fa-check"></i> Accept user Request</a>

								<?php }else if($row['status'] == 'inprogress'){ ?>
									
									<a href="process/booking_status/completed.php?bid=<?php echo $row['bid'] ?>" class="btn btn-sm bg-success-light"><i class="fas fa-check"></i> Complete Request to user</a>

								<?php }else if($row['status'] == 'completed' || $row['status'] == 'reject' || $row['status'] == 'cancel'){ ?>

								<?php }else{ ?>

								<?php } ?>

								</div>
							</div>
						</div>
							

						<?php } } ?>

					
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