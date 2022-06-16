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
						<a class="nav-link" href="total_report.php">All Booking <span class="badge badge-primary">550</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="pending_report.php">Pending <span class="badge badge-primary">125</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="inprogress_report.php">InProgress <span class="badge badge-primary">86</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="complete_report.php">Completed <span class="badge badge-primary">89</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="reject_report.php">Rejected <span class="badge badge-primary">101</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="cancel_report.php">Canceled <span class="badge badge-primary">121</span></a>
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
												<th>Updated</th>
											</tr>
										</thead>
										<tbody>
											<?php
									 $sql = "SELECT * FROM `service_booking`";

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



									 		$timewithdate = $row['provider_response_time'];
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

												<?php if($row['status'] == 'pending' || $row['status'] == 'cancel') {?>
												<td>
													<label class="badge badge-warning"><?php echo $row['status']?></label>
												</td>
												<td><?php echo $time?></td>

											<?php } ?>
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