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
						<h4 class="widget-title">Service Available</h4>
						<div class="card transaction-table mb-0">
							<div class="card-body">
								<div class="table-responsive">
									<table class="table mb-0">
										<thead>
											<tr>
												<th>Provider</th>
												<th>Service</th>
												<th>Date</th>
												<th>Amount</th>
												<th>Status</th>
												<th>Details</th>
											</tr>
										</thead>
										<tbody>
											<?php
									 $sql = "SELECT * FROM `provider_member`";

									 $result = mysqli_query($conn,$sql) or die("query unsuccessful");

									 if(mysqli_num_rows($result) > 0){
									 	$i = 1;
									 	while($row = $result->fetch_assoc()){


									 		$pid = $row['pid'];
									 		$sql1 = "SELECT * FROM `provider` WHERE provider_id='$pid'";
									 		$result1 = mysqli_query($conn,$sql1) or die("query unsuccessful");
									 		$array = mysqli_fetch_assoc($result1);

									 		$category = $row['category'];

									 		$sql3 = "SELECT * FROM `category` WHERE category_name='$category'";
									 		$result2 =mysqli_query($conn,$sql3);
									 		$array2 = mysqli_fetch_assoc($result2);
									 		$category_image = $array2['category_image'];


										    $newDate = date("d M Y");



										    $service_title = $row['service_title'];

										    $servicequery = "SELECT * FROM `services` WHERE service_name='$service_title'";
										    $query = mysqli_query($conn,$servicequery);
										    $assoc = mysqli_fetch_assoc($query);
										    $service_status = $assoc['status'];

										    if($service_status == 'Available'){
									 		
									?>
											<tr>
												<td>
													<img class="avatar-xs rounded-circle" src="../provider/assets/img/provider/<?php echo $array['provider_image']?>" alt="">  <?php echo $row['name']?>
												</td>
												<td>
													
													<img src="../assets/img/category/<?php echo $category_image ?>" class="pro-avatar" alt=""><?php echo $row['service_title'] ?>
													
												</td>
												<td><?php echo $newDate ?></td>
												<td><strong>$<?php echo $row['service_amount']?></strong></td>
												<td><span class="badge bg-danger-light"><?php echo $row['status']?></span>
												</td>

												<?php  if($row['status'] == 'active'){ ?>
												<td>
													<a href="service_details.php?pid=<?php echo $pid?>">
													<span class="badge badge-warning inv-badge
													">More Details</span></a>

												</td>
											<?php } else{ ?>

												<td>
													
													<span>----</span>

												</td>


											<?php } ?>

												</tr>

													<?php
													} 
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