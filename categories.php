<?php

require 'connection.php';

?>

<!DOCTYPE html>
<html lang="en">

<?php 
require 'head.php';
?>

<body>

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
		
		<!-- Breadcrumb -->
		<div class="breadcrumb-bar">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="breadcrumb-title">
							<h2>Categories</h2>
						</div>
					</div>
					<div class="col-auto float-right ml-auto breadcrumb-menu">
						<nav aria-label="breadcrumb" class="page-breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item">
									<a href="index.php">Home</a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Categories</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>
		<!-- /Breadcrumb -->
		
		<div class="content">
			<div class="container">
				<div class="catsec clearfix">
					<div class="row">
						<?php
						  $sql = "SELECT * FROM `category`";

						$result = mysqli_query($conn,$sql) or die("query unsuccessful");

						if(mysqli_num_rows($result) > 0){
									
							while($row = $result->fetch_assoc()){
									 		
							?> 
						<div class="col-lg-4 col-md-6">
							<a href="services.php?id=<?php echo $row['category_id'] ?>">
								<div class="cate-widget">
									<img src="assets/img/category/<?php echo $row['category_image']?>" alt="">
									<div class="cate-title">
										<h3><span><i class="fas fa-circle"></i><?php echo $row['category_name']?></span></h3>
									</div>
									
								</div>
							</a>
						</div>


						<?php 
								} 

						}
						?>

					</div>
					<div class="pagination">
						<ul>
							<li class="active"><a href="javascript:void(0);">1</a></li>
							<li><a href="javascript:void(0);">2</a></li>
							<li><a href="javascript:void(0);">3</a></li>
							<li><a href="javascript:void(0);">4</a></li>
							<li class="arrow"><a href="javascript:void(0);"><i class="fas fa-angle-right"></i></a></li>
						</ul>
					</div>
				</div>
			</div>﻿ 
		</div>﻿ 
		
		<!-- Footer -->
		<?php 
		 require 'footer.php';
		?>
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