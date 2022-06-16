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
$mail = $data['Email'];
$num = $data['mobile_no'];


$sql1 = "SELECT * from `wallet` WHERE member_id='$provider_id' AND member_type='Provider'";
$result1 = mysqli_query($conn,$sql1) or die("query unsuccessful");
$data1 = mysqli_fetch_assoc($result1);
$balance = $data1['wallet_balance'];

?>

<!DOCTYPE html>
<html lang="en">

<?php 
	require '..\head.php'; 
?>
	<head>
		<style>
			.showmeonhover { 
				    display: none; 
				}

				.heurehover:hover .showmeonhover {
				    display: inline;
				}

				.heurehover:hover .open {
				    display: none;
				}

				.heurehover:hover {
				    text-align: center;
				}
		</style>
	</head>
<body>

	<div class="main-wrapper">
	
		<!-- Header -->
		<?php 
			require 'common/provider_header.php'; 
			?>
		<!-- /Header -->

		<div class="content">
			<div class="container">
				<div class="catsec clearfix">
					<div class="row">
						<div class="col-lg-4 col-md-6">
							<a href="search.html">
								<div class="cate-widget">
									<img src="assets/img/silver.jpg" alt="">
									<div class="cate-title">
										<h3><span><i class="fab fa-battle-net"></i> SILVER </span></h3>
									</div>
								</div>
							</a>
						</div>
						<div class="col-lg-4 col-md-6">
							<a href="search.html">
								<div class="cate-widget">
									<img src="assets/img/gold.jpg" alt="">
									<div class="cate-title">
										<h3><span><i class="fab fa-battle-net"></i> GOLD </span></h3>
									</div>
								</div>
							</a>
						</div>
						<div class="col-lg-4 col-md-6">
							<a href="search.html">
								<div class="cate-widget">
									<img src="assets/img/platinum.png" alt="">
									<div class="cate-title">
										<h3><span><i class="fab fa-battle-net"></i> PLATINUM </span></h3>
									</div>
								</div>
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="catsec clearfix">
					<div class="row">
						<div class="col-lg-4 col-md-6">
							<h3><span><i class="fas fa-angle-double-right"></i> SILVER </span></h3>
								<div class="heurehover">
									<span class="open">
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DETAILS
									</span>
									<span class="showmeonhover">
											Number of days : 30 days<br>
											Amount : Rs 1000
									</span>
								</div>
						</div>
						<div class="col-lg-4 col-md-6">
							<h3><span><i class="fas fa-angle-double-right"></i> GOLD </span></h3>
							<div class="heurehover">
									<span class="open">
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DETAILS
									</span>
									<span class="showmeonhover">
											Number of days : 60 days<br>
											Amount : Rs 2500
									</span>
								</div>
						</div>
						<div class="col-lg-4 col-md-6">
							<h3><span><i class="fas fa-angle-double-right"></i> PLATINUM </span></h3>
							<div class="heurehover">
									<span class="open">
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DETAILS
									</span>
									<span class="showmeonhover">
											Number of days : 90 days<br>
											Amount : Rs 4000
									</span>
								</div>
						</div>
					</div>
				</div>
			</div><br><br>
			<hr><br><br>
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-10">
						<div class="section-header text-center">
							<h2>PACKAGE PURCHASING</h2>
						</div>

						<form action="process/provider_add_package.php?id=<?php echo $provider_id?>" method="POST">

							<div class="service-fields mb-3">
								<div class="row">
								
									<div class="col-lg-12">
										<div class="form-group">
											<label> Name</label> 
											<input class="form-control" type="text" name="name" value="<?php echo $name?>" readonly>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label> E-mail </label>
											<input class="form-control" type="text" name="email" value="<?php echo $mail?>" readonly>
										</div> 
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label> Contact</label>
											<input class="form-control" type="text" name="mobile" value="<?php echo $num?>" readonly>
										</div>
									</div>
								</div>
							</div>
							<div class="service-fields mb-3">
								<div class="row">
									<div class="col-lg-6">
										<div class="form-group">
											<label>Which package you want to buy? <span class="text-danger">*</span></label>

											<select class="form-control" name="package" required>
											
												<option value="">Select</option>
												<option value="silver">Silver</option>
												<option value="gold">Gold</option>
												<option value="platinum">Platinum</option>				
											
											</select>
										</div>
									</div>
								</div>
							</div>
								
							<div class="submit-section">
								<button class="btn btn-primary submit-btn" type="submit" name="submit">Submit</button>
							</div>

							<br>
								
						</form>
						<div class="text-left">
							Already have a package? &nbsp;&nbsp;&nbsp;
							<a class="forgot-link" href="add_service.php" style="font-size:17px"><button class="btn btn-primary submit-btn" name="signup" type="submit">Add service</button></a>
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