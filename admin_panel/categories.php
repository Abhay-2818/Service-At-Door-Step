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
							<h3 class="page-title">Categories</h3>
						</div>
						<div class="col-auto text-right">
							
							<a href="add-category.php" class="btn btn-success add-button ml-3">
								<i class="fas fa-plus"></i>
							</a>
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
												<th>Category</th>
												<th>Date</th>
												<th class="text-right">Action</th>
											</tr>
										</thead>
										<tbody>
									<?php
									 $sql = "SELECT * FROM `category`";

									 $result = mysqli_query($conn,$sql) or die("query unsuccessful");

									 if(mysqli_num_rows($result) > 0){
									 	$i = 1;
									 	while($row = $result->fetch_assoc()){
									 		
									?>
											<tr>
												<td><?php echo $i?></td>
												<td>
											    <img class="rounded service-img mr-1" src="../assets/img/category/<?php echo $row["category_image"]?>" alt="Category Image"><?php echo $row["category_name"]?></td>
												<td><?php echo $row['doi']?></td>
												<td class="text-right">
													<a href="edit_category.php?index=<?php echo $row['category_id']?>" class="btn btn-sm bg-success-light mr-2">	<i class="far fa-edit mr-1"></i> Edit</a>

													<a href="process/delete_category_process.php?index=<?php echo $row['category_id']?>" class="btn btn-sm bg-success-light mr-2">	<i class="far fa-edit mr-1"></i>Delete</a>
												</td>
												
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
	<script src="assets/js/bootstrapValidator.min.html"></script>

	<!-- Datatables JS -->
	<script src="assets/plugins/datatables/datatables.min.js"></script>

	<!-- Select2 JS -->
	<script src="assets/js/select2.min.js"></script>

	<!-- Custom JS -->
	<script src="assets/js/admin.js"></script>

</body>


</html>