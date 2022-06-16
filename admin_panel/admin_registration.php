<!DOCTYPE html>
<html lang="en">

<?php
	require 'common/head.php';
?>

<body>
	<div class="main-wrapper">
	
		<div class="login-page">
			<div class="login-body container">
				<div class="loginbox">
					<div class="login-right-wrap">
						<div class="account-header">
							<div class="account-logo text-center mb-4">
								<a href="index.php">
									<img src="assets/img/logo-icon.png" alt="" class="img-fluid">
								</a>
							</div>
						</div>
						<div class="login-header">
							<h3>Administration</h3>
							<p class="text-muted">Registration</p>
						</div>
						<form action="process/registration_data.php" method="POST">
							<div class="form-group mb-2">
								<label class="control-label">Username</label>
								<input class="form-control" name="username" type="text" placeholder="Enter your username">
							</div>
                            <div class="form-group mb-2">
                                <label class="control-label">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Enter Email Id">
                            </div>
                            <div class="form-group mb-2">
                                <label class="control-label">Address</label>
                                <input type="text" name="Address" class="form-control" placeholder="Enter Your Address">
                            </div>
                            <div class="form-group mb-2">
                                <label class="control-label">City</label>
                                <input type="text" name="City" class="form-control" placeholder="Enter City">
                            </div>
                            <div class="form-group mb-2">
                                <label class="control-label">Mobile Number</label>
                                <input type="tel" name="mobile_no" class="form-control" placeholder="Enter Phone No" maxlength="10">
						    </div>
							<div class="form-group mb-2">
								<label class="control-label">Password</label>
								<!-- <input class="form-control" type="password" placeholder="Enter your password"> -->
                                <input type="password" class="form-control" name="password" placeholder="Enter your password" id="myInput">
							</div>
                            <input type="checkbox" onclick="myFunction()" class="mb-4"> Show Password
                            <script>
                                function myFunction() {
                                var x = document.getElementById("myInput");
                                if (x.type === "password") {
                                    x.type = "text";
                                } else {
                                    x.type = "password";
                                }
                                }
                            </script>
							<div class="text-center">
								<button name ="register" class="btn btn-primary btn-block account-btn" type="submit">Register</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	
	<script src="assets/js/jquery-3.5.0.min.js"></script>

	
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

	
	<script src="assets/js/admin.js"></script>

</body>

</html>