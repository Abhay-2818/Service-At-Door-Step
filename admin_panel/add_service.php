<?php 
require 'common\connection.php';  
session_start();

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
				<div class="row">
					<div class="col-xl-8 offset-xl-2">
					
						<!-- Page Header -->
						<div class="page-header">
							<div class="row">
								<div class="col">
									<h3 class="page-title">Add Service</h3>
								</div>
							</div>
						</div>
						<!-- /Page Header -->
						
						<div class="card">
							<div class="card-body">
							
								<!-- Form -->
								<form action="process/add_service_process.php" method="post" enctype="multipart/form-data">
									<div class="form-group">
										<label>Category Name</label>
										
										<select class="form-control" name="categories_id">
										<option value="">Select</option>	
								<?php
									 $sql = "SELECT * FROM `category`";

									 $result = mysqli_query($conn,$sql) or die("query unsuccessful");

									 if(mysqli_num_rows($result) > 0){
									 	
									 	while($row = $result->fetch_assoc()){
									 		
									?>
									<option value="<?php echo $row['category_id']?>"><?php echo $row['category_name']?></option>


								<?php 
										} 

									}
								?>
										</select>
									</div>
									<div class="form-group">
										<label>Service Name</label>
										<input class="form-control" type="text" name="service_name">
									</div>
									<div class="mt-4">
										<button class="btn btn-success" type="submit" name="submit">Add Service</button>
										<a href="add_service.php" class="btn btn-link">Cancel</a>
									</div>
								</form>
								<!-- Form -->
								
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

	<!-- Slimscroll JS -->
	<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

	<!-- Custom JS -->
	<script src="assets/js/admin.js"></script>

</body>

</html>