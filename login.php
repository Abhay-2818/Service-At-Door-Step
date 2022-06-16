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
	
		<!-- Header -->
		<?php 
			require 'header.php';
		?>
		<!-- /Header -->

		<div class="modal-dialog modal-dialog-centered" style="margin-top:200px;">
            <div class="modal-content">
                <div class="modal-body">
					<div class="login-header">
						<h3>Login</h3>
					</div>
					<form action="login_data.php" method="POST">

						
						 <label class="radio-inline">
					      <input type="radio" name="radio" value="Customer">&nbsp;&nbsp;Customer &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					  </label>
					    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					    <label class="radio-inline">
					      <input type="radio" name="radio" value="Service provider">&nbsp;&nbsp;Service provider 
					    </label>
					   
					


						<div class="form-group form-focus">
							<label class="focus-label">Email</label>
							<input type="email" name="email" class="form-control" placeholder="Enter Your Email-Id">
						</div>
						<div class="form-group form-focus">
							<label class="focus-label">Password</label>
							<input type="password" name="password" class="form-control" placeholder="Enter Password">
						</div>
						
						<div class="form-group form-focus">
							<label class="focus-label">Confirm Password</label>
							<input type="password" name="cpassword" class="form-control" placeholder="Enter Confirm Password">
						</div>
						
						<div class="text-right">	
						</div><br>
						<button class="btn btn-primary btn-block btn-lg login-btn" name="login" type="submit">Login</button>
						
						
					</form>
				</div>
            </div>
            </div>


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