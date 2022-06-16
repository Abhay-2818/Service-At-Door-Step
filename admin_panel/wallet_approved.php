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
							<h3 class="page-title">Wallet Request Approved List</h3>
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
												<th>Member Type</th>
												<th>Name</th>
												<th>Email</th>
												<th>Mobile_no</th>
												<th>Amount</th>
												<th>Date</th>

											</tr>
										</thead>
										<tbody>
											
								<?php
							

							$sql = "SELECT * FROM `wallet_request` WHERE request_status = 'approved'";

							$result = mysqli_query($conn,$sql) or die("query unsuccessful");

									 if(mysqli_num_rows($result) > 0){
									 	$i = 1;
									 while($row = $result->fetch_assoc()){

									 	$type = $row['member_type'];

									 	if($type=='Customer')
									 	{
									 	$id = $row['id'];
										$member_query = "SELECT * FROM `member` WHERE member_id='$id'";
										$member_result = mysqli_query($conn,$member_query) or die("member query unsuccessful");
										$member = mysqli_fetch_assoc($member_result);
										$email = $member['email'];
										$name = $member['name'];
										$mobile_no = $member['mobile_no'];

									 	}
									 	else
									 	{
									 	$id1 = $row['id'];
										$provider_query = "SELECT * FROM `provider` WHERE provider_id='$id1'";
										$provider_result = mysqli_query($conn,$provider_query) or die("member query unsuccessful");
										$provider = mysqli_fetch_assoc($provider_result);
										$email = $provider['Email'];
										$name = $provider['name'];
										$mobile_no = $provider['mobile_no'];
									 	}

									 	
									?>
												<tr>
													<td><?php echo $i?></td>
													<?php 
													if($row['member_type'] == 'Customer'){
													?>
													<td>
														<label class="badge badge-success"><?php echo $row['member_type']?>     </label>
													</td>
													
												<?php }else{?>

													<td>
														<label class="badge badge-warning"><?php echo $row['member_type']?>     </label>
													</td>

												<?php } ?>
													
													<td><?php echo $name?></td>
													<td><?php echo $email?></td>
													<td><?php echo $mobile_no?></td>
													<td><?php echo $row['amount']?></td>
													<td><?php echo $row['date']?></td>
													
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