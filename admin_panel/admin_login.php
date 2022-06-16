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
								<a href="index.html">
									<img src="assets/img/logo-icon.png" alt="" class="img-fluid">
								</a>
							</div>
						</div>
						<div class="login-header">
							<h3>Administration</h3>
							<p class="text-muted">Access to our dashboard</p>
						</div>
						<form action="process/login_data.php" method="POST">
							<div class="form-group">
								<label class="control-label">Email</label>
								<input class="form-control" name="email" type="email" placeholder="Enter your Email-id">
							</div>
							<div class="form-group mb-4">
								<label class="control-label">Password</label>
								<input class="form-control" name="pwd" type="password" placeholder="Enter your password">
							</div>
							<div class="text-center">
								<button name="login" class="btn btn-primary btn-block account-btn" type="submit">Login</button>
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