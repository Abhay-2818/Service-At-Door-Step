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


$index = $_GET['index'];
$query = "SELECT * FROM `category` WHERE category_id='$index'";
$result = mysqli_query($conn,$query) or die("query unsuccessful");

$array = mysqli_fetch_assoc($result);
$category_name = $array['category_name'];
$category_image = $array['category_image'];


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
									<h3 class="page-title">Edit Category</h3>
								</div>
							</div>
						</div>
						<!-- /Page Header -->
						
						<div class="card">
							<div class="card-body">
							
								<!-- Form -->
								<form action="process/edit_category_process.php" method="POST" enctype="multipart/form-data">
									<div class="form-group">
										<input type="hidden" name="categories_id" value="<?php echo $index?>">
										<label>Category Name</label>
										<input class="form-control" type="text" name="categories_name" value="<?php echo $category_name?>">
									</div>
									<div class="form-group">
										<label>Category Image</label>
										<input class="form-control" type="file" name="fileToUpload">
									</div>
									<div class="form-group">
										<div class="avatar">
											<img class="avatar-img rounded" alt="" src="../assets/img/category/<?php echo $category_image ?>">
										</div>
									</div>
									<div class="mt-4">
										<button class="btn btn-primary" type="submit" name="save_changes">Save Changes</button>
										<a href="categories.php" class="btn btn-link">Cancel</a>
									</div>
								</form>
								<!-- /Form -->
								
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


<!-- Mirrored from truelysell-html.dreamguystech.com/template/admin/edit-category.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 26 Jun 2021 08:11:24 GMT -->
</html>