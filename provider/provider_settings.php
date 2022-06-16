<?php
session_start();
require '..\connection.php';
if(!isset($_SESSION['provider_id']))
{
	header("Location:..\login.php");
	exit();
}
$provider_id = $_SESSION["provider_id"];
$sql = "SELECT * from `provider` WHERE provider_id='$provider_id'";
$result = mysqli_query($conn,$sql) or die("query unsuccessful");
$data = mysqli_fetch_assoc($result);

$name = $data['name'];
$email = $data['Email'];
$dob = $data['dob'];
$address = $data['Address'];
$City = $data['city'];
$pincode = $data['pincode'];
$state = $data['state'];
$mobile_no = $data['mobile_no'];

$sql1 = "SELECT * from `wallet` WHERE member_id='$provider_id' AND member_type='Provider'";
$result1 = mysqli_query($conn,$sql1) or die("query unsuccessful");
$data1 = mysqli_fetch_assoc($result1);
$balance = $data1['wallet_balance'];


?>
<!DOCTYPE html>
<html lang="en">

<?php require '..\head.php'; ?>

<body>

	<div class="main-wrapper">
	
		<!-- Header -->
		<?php require 'common/provider_header.php'; ?>
		<!-- /Header -->
		
		<div class="content">
			<div class="container">
				<div class="row">
					<div class="col-xl-3 col-md-4 theiaStickySidebar">
						<?php require'common/provider_sidebar.php' ?>
					</div>
					<div class="col-xl-9 col-md-8">
						<form action="process/provider_settings_photochange.php" method="POST" enctype="multipart/form-data">
							<div class="widget">
								<h4 class="widget-title">Profile Settings</h4> 
								<div class="row">
									<div class="col-xl-12">
										<h5 class="form-title">Basic Information</h5>
									</div>
									<div class="form-group col-xl-12">
										<div class="media align-items-center mb-3">
											<img class="user-image" src="assets/img/provider/<?php echo $data["provider_image"]?>" alt="">
											<div class="media-body">
												<h5 class="mb-0"><?php echo $name;?></h5>
												<p>Max file size is 20mb</p>
												<div class="jstinput">
													<!-- <input type="file" name="" class="browsephoto"> -->
													<!-- <button class="browsephoto btn btn-primary" type="file" onclick="openDialog()" name="submit" id="btnid">Browse</button> -->
												<!-- <a href="javascript:void(0);" ></a> -->
												<!--our custom file upload button-->
												<label for="actual-btn" name="xyz" 
												style="border: 2px solid #ff0080;
												padding: 3px;
												background-color: #ff0080;
												color: white;
												border-radius: 5px;">
												Change photo</label>

												<span style="color: black;">
												( * After Uploading the File Please Press the Update Button * )</span>

												<input type="file" id="actual-btn" 
												name="fileToUpload">
												 
												</div> 
											</div>
										</div>
										<button class="btn btn-primary pl-5 pr-5" name="submit" type="submit">Update</button>
 
									</div>
								</div>
							</div>
						</form>
						<form action="process/provider_settings_data.php" method="POST">
							<div class="row">
								<div class="col-xl-12">
									<h5 class="form-title">Personal Information</h5>
								</div>
								<div class="form-group col-xl-6">
									<label class="mr-sm-2">Name</label>
									<input class="form-control" name="name" type="text" value="<?php echo $name;?>">
								</div>
								<div class="form-group col-xl-6">
									<label class="mr-sm-2">Email</label>
									<input class="form-control" name="email" type="email" value="<?php echo $email;?>">
								</div>
				
								<div class="form-group col-xl-6">
									<label class="mr-sm-2">Mobile Number</label>
									<input class="form-control no_only" type="text" value="<?php echo $mobile_no;?>" name="mobileno">
								</div>
								<div class="form-group col-xl-6">
									<label class="mr-sm-2">Date of birth</label>
									<input type="text" class="form-control provider_datepicker" autocomplete="off" value="<?php echo $dob;?>" name="dob"
									Placeholder="YYYY-MM-DD">
								</div>
								
								<div class="col-xl-12">
									<h5 class="form-title">Address</h5>
								</div>
								<div class="form-group col-xl-12">
									<label class="mr-sm-2">Address</label>
									<input type="text" class="form-control" name="address" value="<?php echo $address;?>">
								</div>
								
								<div class="form-group col-xl-6">
									<label class="mr-sm-2">State</label>
									<input type="text" class="form-control" name="state" id="state_id" value="<?php echo $state;?>">
								</div>
								<div class="form-group col-xl-6">
									<label class="mr-sm-2">City</label>
									<input type="text" class="form-control" name="city" value="<?php echo $City;?>">
								</div>
								<div class="form-group col-xl-6">
									<label class="mr-sm-2">Pincode</label>
									<input type="text" class="form-control" name="pincode" value="<?php echo $pincode;?>">
								</div>
								<div class="form-group col-xl-12">
									<button class="btn btn-primary pl-5 pr-5" name="update" type="submit">Update</button>
								</div> 
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

	
	</script>

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