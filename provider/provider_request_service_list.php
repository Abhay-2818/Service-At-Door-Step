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
						<h4 class="widget-title">Service Request</h4>
						<div class="card transaction-table mb-0">
							<div class="card-body">
								<div class="table-responsive">
									<table class="table mb-0">
										<thead>
											<tr>
												<th>Service</th>
												<th>Customer</th>
												<th>Amount</th>
												<th>Date</th>
												<th>Booking Time</th>
												<th>Status</th>
											</tr>
										</thead>
										<tbody>

											<?php
									 $sql = "SELECT * FROM `service_booking` WHERE pid='$provider_id'";

									 $result = mysqli_query($conn,$sql) or die("query unsuccessful");

									 if(mysqli_num_rows($result) > 0){
									 	
									 	while($row = $result->fetch_assoc()){

									 		$cid = $row['cid'];
										 	$sql1 = "SELECT * FROM `member` WHERE member_id='$cid'";
										 	$x = mysqli_query($conn,$sql1);
										 	$assoc = mysqli_fetch_assoc($x);
										 	$customer_image = $assoc['profile_image'];



									 		$timewithdate = $row['provider_response_time'];
										 	$dt = new DateTime($timewithdate);

											$date = $dt->format('d  M  Y');

											$time = date("H:i:s A",strtotime($timewithdate));

											$timewithdate1 = $row['customer_cancel_time'];
											$dt1 = new DateTime($timewithdate1);

											$date1 = $dt1->format('d  M  Y');

											$time1 = date("H:i:s A",strtotime($timewithdate1));

									 	
									?>



											<tr>
												
												<?php 

												if($row['status'] == 'pending'){													
												?>
												<td>
													<a href="">
														 <?php echo $row['service_name'] ?>
													</a>
												</td>
												<td>
													<img class="avatar-xs rounded-circle" src="../customer/assets/img/customer/<?php echo $customer_image ?>" alt=""> <?php echo $row['customer_name'] ?>
												</td>
												<td><strong>$<?php echo $row['service_amount']?></strong></td>
												
												<td><?php echo $date1?> <?php echo $time1 ?></td>

												<td><?php echo $row['booking_timeslot']?></td>

												<td>
													<span class="badge bg-danger-light">Pending</span>
												</td>

												<td>
													<a href="process/booking_status/reject.php?bid=<?php echo $row['bid'] ?>" class="btn btn-sm bg-primary"><i class="fas fa-times"></i> Reject the Service</a>
									
												</td>
												<td>
													<a href="process/booking_status/inprogress.php?bid=<?php echo $row['bid'] ?>" class="btn btn-sm bg-success-light"><i class="fas fa-check"></i> Accept user Request</a>
												</td>

											<?php }
											}
										} ?>
											
											
										</tbody>
									</table>
								</div>
							</div>
						</div>
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

</html>