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


?>
<!DOCTYPE html>
<html lang="en">

<?php 
require '..\head.php';
?>

<body>

	<div class="main-wrapper">
	
		<!-- Header -->
		<?php require'common/user_header.php'; ?>
		<!-- /Header -->
		
		<div class="content">
			<div class="container">
				<div class="row">
					<div class="col-xl-3 col-md-4">
						<?php require'common/user_sidebar.php' ?>
					</div>

					<div class="col-xl-9 col-md-8">
						<div class="row align-items-center mb-4">
							<div class="col">
								<h4 class="widget-title mb-0">My Bookings</h4>
							</div>
							
						</div>

						<?php 

							$booking_query = "SELECT * FROM `service_booking` WHERE cid=$id ORDER BY bid DESC";
							$result = mysqli_query($conn,$booking_query) or die("query unsuccessful");

							if(mysqli_num_rows($result) > 0){
									 	
									 	while($row = $result->fetch_assoc()){

									 	$pid = $row['pid'];
									 	$sql1 = "SELECT * FROM `provider` WHERE provider_id='$pid'";
									 	$x = mysqli_query($conn,$sql1);
									 	$assoc = mysqli_fetch_assoc($x);
									 	$provider_image = $assoc['provider_image'];

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
											<li><span>Provider Phone</span> <?php echo $row['provider_contact']?></li>
											<li>
												<span>Provider</span>
												<div class="avatar avatar-xs mr-1">
													<img class="avatar-img rounded-circle" alt="User Image" src="../provider/assets/img/provider/<?php echo $provider_image?>">
												</div>
												<?php echo $row['provider_name']?>
											</li>
										</ul>
									</div>
								</div>
								<div class="booking-action">
									<?php 
									if($row['status'] == 'pending' || $row['status'] == 'inprogress'){
									?>

									<a href="process/booking_cancel.php?bid=<?php echo $row['bid']?>" class="btn btn-sm bg-danger-light"><i class="fas fa-times"></i> Cancel the Service</a>

									<?php }else if($row['status'] == 'reject' || $row['status'] == 'cancel' || $row['status'] == 'completed'){ ?>

									<?php }else{?>

									<?php }?>
								</div>
							</div>
						</div>
							

						<?php } } ?>
						
						
					

					</div>
				</div>
			</div>
		</div> 
			
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

<!-- Mirrored from truelysell-html.dreamguystech.com/template/user-bookings.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 26 Jun 2021 08:10:37 GMT -->
</html>