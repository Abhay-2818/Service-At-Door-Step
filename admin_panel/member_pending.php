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
							<h3 class="page-title">Member Pending</h3>
						</div>
						<div class="col-auto text-right">
							<a class="btn btn-white filter-btn" href="javascript:void(0);" id="filter_search">
								<i class="fas fa-filter"></i>
							</a>
						</div>
					</div>
				</div>
				<!-- /Page Header -->
				
				<!-- Search Filter -->
				<div class="card filter-card" id="filter_inputs">
					<div class="card-body pb-0">
						<form>
							<div class="row filter-row">
								<div class="col-sm-6 col-md-3">
									<div class="form-group">
										<label>Name</label>
										<input class="form-control" type="text">
									</div>
								</div>
								<div class="col-sm-6 col-md-3">
									<div class="form-group">
										<label>From Date</label>
										<div class="cal-icon">
											<input class="form-control datetimepicker" type="text">
										</div>
									</div>
								</div>
								<div class="col-sm-6 col-md-3">
									<div class="form-group">
										<label>To Date</label>
										<div class="cal-icon">
											<input class="form-control datetimepicker" type="text">
										</div>
									</div>
								</div>
								<div class="col-sm-6 col-md-3">
									<div class="form-group">
										<button class="btn btn-primary btn-block" type="submit">Submit</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
				<!-- /Search Filter -->
				
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-hover table-center mb-0 datatable">
										<thead>
											<tr>
												<th>#</th>
												<th>Name</th>
												<th>Email</th>
												<th>Dob</th>
												<th>Address</th>
												<th>City</th>
												<th>Pin-Code</th>
												<th>State</th>
												<th>Contact No</th>
												<th>password</th>
												<th>Approved</th>
												<th>Reject</th>
											</tr>
										</thead>
										<tbody>
											
									<?php
									 $sql = "SELECT * FROM `member` WHERE request_status = 'pending'";

									 $result = mysqli_query($conn,$sql) or die("query unsuccessful");

									 if(mysqli_num_rows($result) > 0){
									 	$i = 1;
									 while($row = $result->fetch_assoc()){
									 	
									?>
												<tr>
													<td><?php echo $i?></td>
													<td><?php echo $row['name']?></td>
													<td><?php echo $row['email']?></td>
													<td><?php echo $row['dob']?></td>
													<td><?php echo $row['address']?></td>
													<td><?php echo $row['city']?></td>
													<td><?php echo $row['pin-code']?></td>
													<td><?php echo $row['state']?></td>
													<td><?php echo $row['mobile_no']?></td>
													<td><?php echo $row['password']?></td>
												
												<td>
													<a href="process/member_approved_data.php?id=<?php echo $row['member_id']?>">
													<span class="badge badge-success inv-badge
													p-2" style="font-size:15px;">Approve</span></a>
												</td>
												<td>
													<a href="process/member_reject_data.php?id=<?php echo $row['member_id']?>">
													<span class="badge bg-primary inv-badge
													p-2" style="font-size:15px;">Reject</span>
												</td>
											</tr>
												
											<?php
											 $i++;
												} 

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
	
	
	<script src="assets/js/jquery-3.5.0.min.js"></script>

	
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

	
	<script src="assets/js/moment.min.js"></script>
	<script src="assets/js/bootstrap-datetimepicker.min.js"></script>

	
	<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

	
	<script src="assets/plugins/datatables/datatables.min.js"></script>

	
	<script src="assets/js/admin.js"></script>

</body>


</html>