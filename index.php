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
		
		<!-- Hero Section -->
		<section class="hero-section">
			<div class="layer">
				<div class="home-banner" style="height: 120%;"></div>
				<div class="container" >
					<div class="row justify-content-center">
						<div class="col-lg-12">
							<div class="section-search">
							<h3>World's Largest <span>Door Step Service Place</span></h3>
								<p>Your problem, our aim. Register now for instant customer service</p>
								
								<div class="search-cat">
									<!-- <i class="fas fa-circle"></i> -->
									<span></span>
									<a href="categories.php">All Category</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- /Hero Section -->
		
		<!-- Category Section -->
		<section class="category-section" style="margin-top:5%">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="row">
							<div class="col-md-6">
								<div class="heading">
									<h2>Featured Categories</h2>
									<span>What do you need to find?</span>
								</div>
							</div>
							<div class="col-md-6">
								<div class="viewall">
									<h4><a href="categories.php">View All <i class="fas fa-angle-right"></i></a></h4>
									<span>Featured Categories</span>
								</div>
							</div>
						</div>
						<div class="catsec">
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
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- /Category Section -->
		

		<!-- How It Works -->
		<section class="how-work">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="heading howitworks">
							<h2>How It Works</h2>
						
						</div>

						<div class="howworksec">
							<div class="row">
								<div class="col-lg-4">
									<div class="howwork">
										<div class="iconround">
											<div class="steps">01</div>
											<img src="assets/img/icon-1.jpeg" alt="">
										</div>
										<h3>Login/Sign-in</h3>
										<p>Customer as well as Service provider needs to login in the account to get benefits of our door step service. As for Service Provider he need to login as well for providing their speciality.</p>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="howwork">
										<div class="iconround">
											<div class="steps">02</div>
											<img src="assets/img/icon-2.jpeg" alt="">
										</div>
										<h3>Wallet Check</h3>
										<p>Customer as well Service Provider needs to check the wallet. Only with the sufficient wallent customer can get the service while provider can provide the service. And if they don't have enough balance in their account they can send request to the admin for the same.</p>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="howwork">
										<div class="iconround">
											<div class="steps">03</div>
											<img src="assets/img/icon-3.jpeg" alt="">
										</div>
										<h3>Find what you want</h3>
										<p>After admin has approved the request customer can find out the services they need from the list provided and can get their work done.</p>
									</div>
								</div>
							</div>
						</div>
						<div class="howworksec">
							<div class="row">
								<div class="col-lg-4">
									<div class="howwork">
										<div class="iconround">
											<div class="steps">04</div>
											<img src="assets/img/icon-4.jpeg" alt="">
										</div>
										<h3>Services</h3>
										<p>As for Service Provider after his request for wallet s approved he can fill the form about their speciality in their particular field and can provide service and earn money.</p>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="howwork">
										<div class="iconround">
											<div class="steps">05</div>
											<img src="assets/img/icon-5.jpeg" alt="">
										</div>
										<h3>Contact</h3>
										<p>Once the customer finds out what he/she needs to be get done and from which provider they can contact each other.</p>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="howwork">
										<div class="iconround">
											<div class="steps">06</div>
											<img src="assets/img/icon-6.jpeg" alt="">
										</div>
										<h3>Payment</h3>
										<p>Once the request  is made by customer, bill payment is transfered to provider's account and if the customer cancel the request then the money are transfered back to the customer' s account</p>
									</div>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</section>
		<!-- /How It Works -->
		
		<!-- Footer -->
		<?php
			require 'footer.php';
		 ?>
		<!-- /Footer -->
		
	</div>
	
	
	
	<script src="assets/js/jquery-3.5.0.min.js"></script>

	
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

	<script src="assets/plugins/owlcarousel/owl.carousel.min.js"></script>

	
	<script src="assets/js/script.js"></script>
	
</body>


</html>