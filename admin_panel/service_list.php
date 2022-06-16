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
							<h3 class="page-title">Services</h3>
						</div>
						
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
												<th>Service</th>
												
												<th>Category</th>
												
												<th>Date Of Insert</th>
												<th>Date Of Update</th>
												
												<th>Current Status</th>
												<th>Select Status</th>
												
												
											</tr>
										</thead>
										<tbody>
											
											<?php
									 $sql = "SELECT * FROM `services`";

									 $result = mysqli_query($conn,$sql) or die("query unsuccessful");

									 if(mysqli_num_rows($result) > 0){
									 	$i = 1;
									 	while($row = $result->fetch_assoc()){

									 		$category_id = $row['category_id'];
									 		$service_id = $row['service_id'];
									 		$servicename = $row['service_name'];
									 		$status = $row['status'];
									 		$doi = $row['doi'];
									 		$dou = $row['dou'];
									 		
									 		
									 		$sql1 = "SELECT * FROM `category` WHERE category_id='$category_id'";
									 		$result1 = mysqli_query($conn,$sql1) or die("query unsuccessful");
									 		$array = mysqli_fetch_assoc($result1);

									 		$category_name = $array['category_name'];


									 		
									?>
												<tr>
													<td><?php echo $i?></td>
													<td><?php echo $servicename?></td>
													<td><?php echo $category_name?></td>
				
													<td><?php echo $doi?></td>
													<td><?php echo $dou?></td>
													<!-- <td><span class="badge badge-success inv-badge
													p-2" style="font-size:15px;"><?php echo $status?></span></td> -->
													<td><?php echo $status?></td>
													<?php 
													if($row['status']=="Available"){
													?>
													<td>
													 <a href="process/service_active_inactive.php?service_id=<?php echo $service_id?>">
													<span class="badge badge-warning inv-badge
													p-2" style="font-size:15px;">Unavailable</span></a>
													
													<!-- <a href="process/service_inactive.php?service_id=<?php echo $service_id?>">
													<span class="badge bg-primary inv-badge
													p-2" style="font-size:15px;">Unavailable</span> -->

													</td>
												<?php }
													else{
												?>
												<td>
													<a href="process/service_active_inactive.php?service_id=<?php echo $service_id?>">
													<span class="badge badge-warning inv-badge
													p-2" style="font-size:15px;">Available</span></a>

												</td>
											<?php 
												}
											?>
													
													
													
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
	<script src="assets/plugins/datatables/datatables.min.js"></script>

	<!-- Custom JS -->
	<script src="assets/js/admin.js"></script>

</body>

</html>