<?php 
session_start();
require '..\connection.php';

$id = $_SESSION["provider_id"];

$sql = "SELECT * from `provider` WHERE provider_id='$id'";
$result = mysqli_query($conn,$sql) or die("query unsuccessful");
$data = mysqli_fetch_assoc($result);
$name = $data['name'];

$sql1 = "SELECT * from `wallet` WHERE member_id='$id' AND member_type='Provider'";
$result1 = mysqli_query($conn,$sql1) or die("query unsuccessful");
$data1 = mysqli_fetch_assoc($result1);
$balance = $data1['wallet_balance'];



?>
<!DOCTYPE html>
<html lang="en">

<?php 
   require '..\head.php';
?>

<body>

	<div class="main-wrapper">
	
		<!-- Header -->
		<?php require'common/provider_header.php';   ?>
		<!-- /Header -->
		
		<div class="content">
			<div class="container">
				<div class="row">
					<div class="col-xl-3 col-md-4">
						<?php require'common/provider_sidebar.php' ?>
					</div>
					<div class="col-xl-9 col-md-8">
						<h4 class="widget-title">My Services</h4>
						<ul class="nav nav-tabs menu-tabs">
							<li class="nav-item">
								<a class="nav-link" href="my_services.php">Active Services</a>
							</li>
							<li class="nav-item active">
								<a class="nav-link" href="my_services_inactive.php">Inactive Services</a>
							</li>
						</ul>
						<div class="row">

							<?php 

							$provider_member_query = "SELECT * FROM `provider_member` WHERE pid=$id AND status='inactive'";
							$result = mysqli_query($conn,$provider_member_query) or die("query unsuccessful");

							if(mysqli_num_rows($result) > 0){
									 	
									 	while($row = $result->fetch_assoc()){

							?>
							<div class="col-lg-4 col-md-6 inactive-service">
								<div class="service-widget">
									<div class="service-img">
										<a href="service-details.html">
											<img class="img-fluid serv-img" alt="Service Image" src="assets/img/services/no_image.jpg">
										</a>
										<div class="item-info">
											<div class="service-user">
												<a href="javascript:void(0);">
													<img src="assets/img/provider/provider-01.jpg" alt="">
												</a>
												<span class="service-price">$<?php echo $row['service_amount'] ?></span>
											</div>
											<div class="cate-list">
												<a class="bg-yellow" href="service-details.html"><?php
												echo $row['category']?></a>
											</div>
										</div>
									</div>
									<div class="service-content">
										<h3 class="title">
											<a href="service-details.html"><?php echo $row['service_title']?></a>
										</h3>
										
										<div class="user-info">
											<div class="service-action">
												<div class="row">
													
													<div class="col text-right">
														<a href="process/active_inactive_service.php?p_m_id=<?php echo $row['p_m_id']?>" class="si-delete-active-service text-success" data-id="149"><i class="fas fa-info-circle"> </i>active</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

						<?php } } ?>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	
		<!-- Footer -->
		<?php require'..\footer.php'; ?>
		<!-- /Footer -->
		
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