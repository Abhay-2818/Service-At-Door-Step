<?php

require 'connection.php';


?>
<!DOCTYPE html>
<html lang="en">

<?php 
require 'head.php';
?>

<body>
	<div class="main-wrapper">
	
		<!-- Loader -->
	<div class="page-loading">
		<div class="preloader-inner">
			<div class="preloader-square-swapping">
				<div class="cssload-square-part cssload-square-green"></div>
				<div class="cssload-square-part cssload-square-pink"></div>
				<div class="cssload-square-blend"></div>
			</div>
		</div>
	</div>
	<!-- /Loader -->

	<div class="main-wrapper">
	
		<!-- Header -->
		<?php 
			require 'header.php';
		?>
		<!-- /Header -->
		
		
		
		<div class="page-wrapper">
			<div class="content container-fluid">
			
				<!-- Page Header -->
				<div class="page-header">
					<div class="row">
						<div class="col">
							<h3 class="page-title text-center">Services</h3>
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
												
												<th>Date</th>
												<th>Status</th>
												
											</tr>
										</thead>
										<tbody>

									<?php
									$id = $_GET['id'];
									 $sql = "SELECT * FROM `services` WHERE category_id='$id'";

									 $result = mysqli_query($conn,$sql) or die("query unsuccessful");

									 if(mysqli_num_rows($result) > 0){
									 	$i = 1;
									 	while($row = $result->fetch_assoc()){

									 		$category_id = $row['category_id'];
									 		$servicename = $row['service_name'];
									 		$status = $row['status'];
									 		$date = $row['dou'];

									 		$sql1 = "SELECT * FROM `category` WHERE category_id='$category_id'";
									 		$result1 = mysqli_query($conn,$sql1) or die("query unsuccessful");
									 		$array = mysqli_fetch_assoc($result1);

									 		$category_name = $array['category_name'];


									 		
									?>
												<tr>
													<td><?php echo $i?></td>
													<td><?php echo $servicename?></td>
													<td><?php echo $category_name?></td>
													<td><?php echo $date?></td>
													<td><span class="badge badge-primary inv-badge
													p-2" style="font-size:15px;"><?php echo $status?></span></td>
													
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

	<!-- Custom JS -->
	<script src="assets/js/script.js"></script>

</body>

</html>