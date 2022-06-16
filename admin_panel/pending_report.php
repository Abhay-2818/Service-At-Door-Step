<?php 
require 'common\connection.php';  
session_start();

if(!isset($_SESSION['admin_id']))
{
	header("Location:admin_login.php");
	exit();
}

$id = $_SESSION["admin_id"];
$sql = "SELECT * from `admin` WHERE id='$id'";
$result = mysqli_query($conn,$sql) or die("query unsuccessful");
$data = mysqli_fetch_assoc($result);

$sql1 = "SELECT * FROM `service_booking` WHERE status = 'pending'";
$result1 = mysqli_query($conn,$sql1) or die("query unsuccessful");
$pending_row = mysqli_num_rows($result1);

$sql2 = "SELECT * FROM `service_booking` WHERE status = 'inprogress'";
$result2 = mysqli_query($conn,$sql2) or die("query unsuccessful");
$inprogress_row = mysqli_num_rows($result2);

$sql3 = "SELECT * FROM `service_booking` WHERE status = 'completed'";
$result3 = mysqli_query($conn,$sql3) or die("query unsuccessful");
$completed_row = mysqli_num_rows($result3);

$sql4 = "SELECT * FROM `service_booking` WHERE status = 'reject'";
$result4 = mysqli_query($conn,$sql4) or die("query unsuccessful");
$rejected_row = mysqli_num_rows($result4);

$sql5 = "SELECT * FROM `service_booking` WHERE status = 'cancel'";
$result5 = mysqli_query($conn,$sql5) or die("query unsuccessful");
$canceled_row = mysqli_num_rows($result5);



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
						<div class="col">
							<h3 class="page-title">Booking List</h3>
						</div>
						
					</div>
				</div>
				<!-- /Page Header -->
				
				
				
				<ul class="nav nav-tabs menu-tabs">
					
					<li class="nav-item active">
						<a class="nav-link" href="pending_report.php">Pending <span class="badge badge-success"><?php echo $pending_row ?></span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="inprogress_report.php">InProgress <span class="badge badge-success"><?php echo $inprogress_row ?></span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="complete_report.php">Completed <span class="badge badge-success"><?php echo $completed_row ?></span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="reject_report.php">Rejected <span class="badge badge-success"><?php echo $rejected_row ?></span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="cancel_report.php">Canceled <span class="badge badge-success"><?php echo $canceled_row ?></span></a>
					</li>
				</ul>
				
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-hover table-center mb-0 datatable">
										<thead>
											<tr>
												<th>#</th>
												<th>Date</th>
												<th>User</th>
												<th>Provider</th>
												<th>Service</th>
												<th>Amount</th>
												<th>Status</th>
												<th>Time</th>
											</tr>
										</thead>
										<tbody>

											<?php
									 $sql = "SELECT * FROM `service_booking` WHERE status = 'pending'";

									 $result = mysqli_query($conn,$sql) or die("query unsuccessful");

									 if(mysqli_num_rows($result) > 0){
									 	$i = 1;
									 	while($row = $result->fetch_assoc()){

									 		$cid = $row['cid'];
										 	$sql1 = "SELECT * FROM `member` WHERE member_id='$cid'";
										 	$x = mysqli_query($conn,$sql1);
										 	$assoc = mysqli_fetch_assoc($x);
										 	$customer_image = $assoc['profile_image'];


										 	$pid = $row['pid'];
										 	$sql2 = "SELECT * FROM `provider` WHERE provider_id='$pid'";
										 	$y = mysqli_query($conn,$sql2);
										 	$assoc2 = mysqli_fetch_assoc($y);
										 	$provider_image = $assoc2['provider_image'];



									 		$timewithdate = $row['booking_time'];
										 	$dt = new DateTime($timewithdate);

											$date = $dt->format('d  M  Y');

											$time = date("H:i:s A",strtotime($timewithdate));

									 	
									?>
											<tr>
												<td><?php echo $i ?></td>
												<td><?php echo $date ?></td>
												<td>
													<span class="table-avatar">
														<a href="#" class="avatar avatar-sm mr-2">
														<img class="avatar-img rounded-circle" alt="" src="../customer/assets/img/customer/<?php echo $customer_image?>">
														</a>
														<?php echo $row['customer_name']?>
													</span>
												</td>
												<td>
													<span class="table-avatar">
														<a href="#" class="avatar avatar-sm mr-2">
														<img class="avatar-img rounded-circle" alt="" src="../provider/assets/img/provider/<?php echo $provider_image?>">
														</a>
														<?php echo $row['provider_name']?>
														
													</span>
												</td>
												<td><?php echo $row['service_name']?></td>
												<td>$<?php echo $row['service_amount']?></td>
												<td>
													<label class="badge badge-dark">Pending</label>
												</td>
												<td><?php echo $date?> <?php echo $time?></td>
											</tr>

											<?php 
													$i++;} 

								}
								?>


											
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!-- jQuery -->
	<script src="assets/js/jquery-3.5.0.min.js"></script>

	<!-- Bootstrap Core JS -->
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

	<!-- Datepicker Core JS -->
	<script src="assets/js/moment.min.js"></script>
	<script src="assets/js/bootstrap-datetimepicker.min.js"></script>

	<!-- Slimscroll JS -->
	<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

	<!-- Datatables JS -->
	<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="assets/plugins/datatables/datatables.min.js"></script>

	<!-- Select2 JS -->
	<script src="assets/js/select2.min.js"></script>

	<!-- Custom JS -->
	<script src="assets/js/admin.js"></script> 

</body>


</html>