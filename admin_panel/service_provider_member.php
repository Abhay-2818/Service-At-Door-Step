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
							<h3 class="page-title">Service Provider Member</h3>
						</div>
						<!-- <div class="col-auto text-right">
							<a class="btn btn-white filter-btn" href="javascript:void(0);" id="filter_search">
								<i class="fas fa-filter"></i>
							</a>
						</div> -->
					</div>
				</div>
				<!-- /Page Header -->
				
				
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
												<th>View Form</th>
												<th>Current Status</th>
												<th>Available Status</th>

											</tr>
										</thead>
										<tbody>
											
									<?php
									 $sql = "SELECT * FROM `provider_member`";

									 $result = mysqli_query($conn,$sql) or die("query unsuccessful");

									 if(mysqli_num_rows($result) > 0){
									 	$i = 1;
									 while($row = $result->fetch_assoc()){
									 	
									?>
												<tr>
													<td><?php echo $i?></td>
													<td><?php echo $row['name']?></td>
													<td><?php echo $row['email']?></td>
													
												<td>
												<a href="view_form.php?id=<?php echo $row['p_m_id']?>">
													<span class="badge badge-success inv-badge
													p-2" style="font-size:15px;">View Form</span></a>
												</td>
												<td><?php echo $row['status']?></td>
													

												<?php 
													if($row['status']=="active"){
													?>
													<td>
													 <a href="process/service_provider_member_active_inactive.php?p_m_id=<?php echo $row['p_m_id']?>">
													<span class="badge badge-warning inv-badge
													p-2" style="font-size:15px;">Inactive</span></a>
													
												
													</td>
												<?php }
													else{
												?>
												<td>
													<a href="process/service_provider_member_active_inactive.php?p_m_id=<?php echo $row['p_m_id']?>">
													<span class="badge badge-warning inv-badge
													p-2" style="font-size:15px;">active</span></a>

												</td>
											<?php 
												}
											?>


												
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