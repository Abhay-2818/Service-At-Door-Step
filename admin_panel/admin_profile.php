<?php 
session_start();
require 'common\connection.php';
if(!isset($_SESSION['admin_id'])){
	header("Location:admin_login.php");
	exit();
}

$id = $_SESSION["admin_id"];
$sql = "SELECT * from `admin` WHERE id='$id'";
$result = mysqli_query($conn,$sql) or die("query unsuccessful");
$data = mysqli_fetch_assoc($result);
$username = $data['username'];


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
				<div class="row">
					<div class="col-xl-8 offset-xl-2">
					
						<!-- Page Header -->
						<div class="page-header">
							<div class="row">
								<div class="col-sm-12">
									<h3 class="page-title">Profile</h3>
								</div>
							</div>
						</div>
						<!-- /Page Header -->
						
						<div class="card">
							<div class="card-body profile-menu">
								<ul class="nav nav-tabs nav-tabs-solid" role="tablist">
									<li class="nav-item home_tab" >
									<a class="nav-link active" data-toggle="tab" href="#profile_settings" role="tab" aria-selected="false" >
											Profile Settings
										</a> 
									</li>
									<li class="nav-item home_add">
										<a class="nav-link" data-toggle="tab" href="#change_password" role="tab" aria-selected="false">
											Change password
										</a> 
									</li>
								</ul>
								<div class="tab-content">
								
									<!-- Profile Tab -->
									<div class="tab-pane fade show active" id="profile_settings" role="tabpanel">

								<form method="POST" action="process/profile_photo_change.php" enctype="multipart/form-data">
											<div class="form-group">
												<label>Username</label>
												<input type="text" class="form-control" value="<?php echo $username?>" disabled>
											</div>
											<div class="form-group">
												<label>Profile Image</label>
												<div class="media align-items-center">
													<div class="media-left">
									<img class="rounded-circle profile-img avatar-view-img" src="assets/img/admin_profile/<?php echo $data["profile_image"]?>" alt="" width="100" height="100">
													</div>
													<div class="media-body">
														<div class="uploader">
															<!-- <button class="btn btn-secondary btn-sm ml-3">Change profile picture</button> -->


												<input type="file" id="actual-btn" 
												name="fileToUpload" style="margin: 10px;
    											color: black;">

														</div>
													</div>
												</div>
											</div>
											<div class="mt-4 save-form">
												<button class="btn btn-primary save-btn" type="submit" name="save">Save</button>
											</div>
										</form>
									</div>
									<!-- /Profile Tab -->
									
									<!-- Password Tab -->
									<div class="tab-pane fade" id="change_password" role="tabpanel">
								<form action="process/change_password.php" method="POST">
											
											<div class="form-group">
												<label>New Password</label>
												<input type="password" name="password"class="form-control">
											</div>
											<div class="form-group">
												<label>Confirm Password</label>
												<input type="password" name="cpassword" class="form-control">
											</div>
											<div class="mt-4 save-form">
												<button class="btn save-btn btn-primary" type="submit" name="save">Save</button>
											</div>
										</form>
									</div>
									<!-- /Password Tab -->
									
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

	
	<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

	<script src="assets/js/admin.js"></script>

</body>



</html>