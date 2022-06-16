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



$package_query = "SELECT * from `add_package` WHERE provider_id='$provider_id' AND status='active'";
$result3 = mysqli_query($conn,$package_query) or die("query unsuccessful");
$data3 = mysqli_fetch_assoc($result3);

$package_name = $data3['package_name'];
$package_price = $data3['package_price'];
$package_start_date = $data3['start_date'];
$package_end_date = $data3['end_date'];


$sql1 = "SELECT * from `wallet` WHERE member_id='$provider_id' AND member_type='Provider'";
$result1 = mysqli_query($conn,$sql1) or die("query unsuccessful");
$data1 = mysqli_fetch_assoc($result1);
$balance = $data1['wallet_balance'];


$sql2 = "SELECT * from `provider_member` WHERE pid='$provider_id'";
$result4 = mysqli_query($conn,$sql2) or die("query unsuccessful");



if(mysqli_num_rows($result3) == 1){

	if(mysqli_num_rows($result4) == 0){
	
?>


<!DOCTYPE html>
<html lang="en">

<?php 
	require '..\head.php'; 
?>
<body>

	<div class="main-wrapper">
	
		<!-- Header -->
		<?php 
			require 'common/provider_header.php'; ?>
		<!-- /Header -->

		<div class="content">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-10">
						<div class="section-header text-center">
							<h2>Add Service</h2>
						</div>
						<form action="process/provider_add_service.php?id=<?php echo $provider_id?>" method="POST">
							<div class="service-fields mb-3">
								<h3 class="heading-2">Personal Information</h3>
								<div class="row">
									<!-- <div class="col-lg-4">
										<div class="form-group">
											<label>ID <span class="text-danger">*</span></label>
											<input class="form-control" type="text" name="id" value="<?php echo $provider_id?>">
										</div>
									</div> -->
									<div class="col-lg-8">
										<div class="form-group">
											<label>Name <span class="text-danger">*</span></label> 
											<input class="form-control" type="text" name="name" value="<?php echo $name?>">
										</div>
									</div>
									<div class="col-lg-8">
										<div class="form-group">
											<label>E-mail <span class="text-danger">*</span></label>
											<input class="form-control" type="text" name="email" value="<?php echo $mail?>">
										</div>
									</div>
									<div class="col-lg-4">
										<div class="form-group">
											<label>Contact <span class="text-danger">*</span></label>
											<input class="form-control" type="text" name="contact" value="<?php echo $num?>">
										</div>
									</div>
								</div>
							</div>
							<div class="service-fields mb-3">
								<h3 class="heading-2">Service Information</h3>
								<div class="row">
									
									<div class="col-lg-6">
										<div class="form-group">

											<label>Category</label>
											<!-- <input class="form-control" type="text" name="category_name" value="<?php echo $category_name ?>"> -->

											<select class="form-control" name="category_name" required>
										<option value="">Select</option>	
								 <?php
									 $sql = "SELECT * FROM `category`";

									 $result = mysqli_query($conn,$sql) or die("query unsuccessful");

									 if(mysqli_num_rows($result) > 0){
									 	
									 	while($row = $result->fetch_assoc()){
									 		
									?>
									<option value="<?php echo $row['category_name']?>"><?php echo $row['category_name']?></option>


								<?php 
										} 

									}
								?>
							</select>



										</div>
									</div>

									<div class="col-lg-6">
										<div class="form-group">
											<label>Service Title</label>
											<!-- <input class="form-control" type="text" name="service_title" value="<?php echo $service_name?>">
 -->
										<select class="form-control" name="service_title" required>
										<option value="">Select</option>	
								 <?php
									 $servicequery = "SELECT * FROM `services` WHERE status='Available'";

									 $result = mysqli_query($conn,$servicequery) or die("query unsuccessful");

									 if(mysqli_num_rows($result) > 0){
									 	
									 	while($row = $result->fetch_assoc()){

									 	$category_id = $row['category_id'];

									 $categoryquery = "SELECT * FROM `category` WHERE category_id='$category_id'";
									 	$z = mysqli_query($conn,$categoryquery) or die("query unsuccessful");

									 	$assoc = mysqli_fetch_assoc($z);

									 		
									?>
									
						<option value="<?php echo $row['service_name']?>"> <?php echo $row['service_name']?> - <?php echo $assoc['category_name'] ?></option>


								<?php 
										} 

									}
								?> 
										</select>
											
										</div>
									</div>

									<div class="col-lg-6">
										<div class="form-group">
											<label>Service Amount <span class="text-danger">*</span></label>
											<input class="form-control" type="text" name="service_amount" required>
										</div>
									</div>
								</div>
							</div>

							<div class="service-fields mb-3">
								<h3 class="heading-2">Package Information</h3>
								<div class="row">
									
									<div class="col-lg-6">
										<div class="form-group">

											<label>Package Name</label>
											<input class="form-control" type="text" name="package_name" value="<?php echo $package_name?>" readonly>

										</div>
									</div>

									<div class="col-lg-6">
										<div class="form-group">
											<label>Package Price</label>
											<input class="form-control" type="text" name="package_price" value="<?php echo $package_price?>"
											readonly>
											
										</div>
									</div>
								</div>

								<div class="row">
									
									<div class="col-lg-6">
										<div class="form-group">

											<label>Package Start Date</label>
											<input class="form-control" type="text" name="start_date" value="<?php echo $package_start_date?>" readonly>

										</div>
									</div>

									<div class="col-lg-6">
										<div class="form-group">
											<label>Package End Date</label>
											<input class="form-control" type="text" name="end_date" value="<?php echo $package_end_date?>" readonly>
											
										</div>
									</div>
								</div>
							</div>

							<div class="service-fields mb-3">
								<h3 class="heading-2">Details Information</h3>
								<div class="row">
									<div class="col-lg-12">
										<div class="form-group">
											<label>Descriptions <span class="text-danger">*</span></label>
											<textarea class="form-control service-desc" name="description"></textarea>
										</div>
									</div>
								</div>
							</div>
							<div class="submit-section">
								<button class="btn btn-primary submit-btn" type="submit" name="submit">Submit</button>
							</div>
						</form>
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

<?php  } else{


			echo "<script type='text/javascript'> 
			alert('You can not send more than one request of the services.');
		     window.location.replace('http://localhost/service_provider/provider/provider_dashboard.php'); 
			</script>";
				exit();

} }else{

			echo "<script type='text/javascript'> 
			alert('Please First Buy the Package');
		     window.location.replace('http://localhost/service_provider/provider/add_package.php'); 
			</script>";
				exit();
}
?>
