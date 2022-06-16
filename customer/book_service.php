<?php 
session_start();
require '..\connection.php';
if(!isset($_SESSION['user_id']))
{
	header("Location:..\login.php");
	exit();
}
$id = $_SESSION["user_id"];
$sql = "SELECT * from `member` WHERE member_id='$id'";
$result = mysqli_query($conn,$sql) or die("query unsuccessful");
$data = mysqli_fetch_assoc($result);
$name = $data['name'];


$sql1 = "SELECT * from `wallet` WHERE member_id='$id' AND member_type='Customer'";
$result1 = mysqli_query($conn,$sql1) or die("query unsuccessful");
$data1 = mysqli_fetch_assoc($result1);
$balance = $data1['wallet_balance'];


$pid = $_GET["pid"];

$provider_query = "SELECT * FROM `provider_member` WHERE pid = '$pid'";
$query = mysqli_query($conn,$provider_query) or die("query unsuccessful");
$assoc = mysqli_fetch_assoc($query);


?>
<!DOCTYPE html>
<html lang="en">

<?php 
require '..\head.php';
?>

<body>

	<div class="main-wrapper">
	
		<!-- Header -->
		<?php require'common/user_header.php';   ?>
		<!-- /Header -->
		
		<div class="content">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-10">
						<div class="section-header text-center">
							<h2>Book Service</h2>
						</div>
						<form action="process/book_service_data.php?pid=<?php echo $pid?>" method="POST">
							<div class="service-fields mb-3">
							<h3 class="heading-2">Service Provider Information</h3>
							<div class="row">
								<div class="col-lg-6">
								   <div class="form-group">
										<label>Service Provider Name</label>
										<input class="form-control hasDatepicker" type="text" 
										value="<?php echo $assoc['name']?>" name="pname" readonly>
									</div>
								</div>
								<div class="col-lg-6">
								   <div class="form-group">
										<label>E-mail</label>
										<input class="form-control hasDatepicker" type="text" 
										value="<?php echo $assoc['email']?>" name="pemail" readonly>
									</div>
								</div>
								<div class="col-lg-6">
								   <div class="form-group">
										<label>City</label>
										<input class="form-control hasDatepicker" type="text" 
										value="<?php echo $assoc['city']?>" name="pcity" readonly>
									</div>
								</div>
								<div class="col-lg-6">
								   <div class="form-group">
										<label>State</label>
										<input class="form-control hasDatepicker" type="text" 
										value="<?php echo $assoc['state']?>" name="pstate" readonly>
									</div>
								</div>
								<div class="col-lg-6">
								   <div class="form-group">
										<label>Provider Contact</label>
										<input class="form-control hasDatepicker" type="text" 
										value="<?php echo $assoc['contact']?>" name="pcontact" readonly>
									</div>
								</div>
								<div class="col-lg-6">
								   <div class="form-group">
										<label>Service Name</label>
										<input class="form-control hasDatepicker" type="text" 
										value="<?php echo $assoc['service_title']?>" name="servicename" readonly>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label>Service amount</label>
										<input class="form-control" type="text" value="<?php echo $assoc['service_amount']?>" name="service_amount" readonly>
									</div>
								</div>
							</div>
							</div>


							<div class="service-fields mb-3">
							<h3 class="heading-2">Customer Information</h3>
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label>Customer Name<span class="text-danger">*</span></label>
										<input class="form-control" type="text" name="cname" autocomplete="off" required>
									</div>                            
								</div>
								<div class="col-lg-6">
								   <div class="form-group">
									 <label>E-mail<span class="text-danger">*</span></label>
										<input class="form-control" name="cemail" type="text" required>
									</div>
								</div>
								<div class="col-lg-6">
								   <div class="form-group">
									 <label>City<span class="text-danger">*</span></label>
										<input class="form-control" type="text" name="ccity"required>
									</div>
								</div>
								<div class="col-lg-6">
								   <div class="form-group">
									 <label>State<span class="text-danger">*</span></label>
										<input class="form-control"  type="text" name="cstate" required>
									</div>
								</div>
								<div class="col-lg-6">
								   <div class="form-group">
										<label>Contact<span class="text-danger">*</span></label>
										<input class="form-control" name="ccontact" type="text" maxlength="10">
									</div>
								</div>
								<div class="col-lg-6">
								   <div class="form-group">
										<label>Address<span class="text-danger">*</span></label>
										<input class="form-control" name="caddress" type="text">
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label>Time slot <span class="text-danger">*</span></label>
										<select class="form-control" name="timeslot" required>
											<option value="">Select Time</option>
											<option value="10:00 AM - 11:00AM">10:00 AM - 11:00AM</option>
											<option value="11:00 AM - 12:00 PM">11:00 AM - 12:00 PM</option>
											<option value="12:00 PM - 01:00 PM">12:00 PM - 01:00 PM</option>
											<option value="03:00 PM - 04:00 PM">03:00 PM - 04:00 PM</option>
											<option value="04:00 PM - 05:00 PM">04:00 PM - 05:00 PM</option>
											<option value="05:00 PM - 06:00 PM">05:00 PM - 06:00 PM</option>
											<option value="06:00 PM - 07:00 PM">06:00 PM - 07:00 PM</option>
											<option value="07:00 PM - 08:00 PM">07:00 PM - 08:00 PM</option>
											<option value="08:00 PM - 09:00 PM">08:00 PM - 09:00 PM</option>
										</select>
									</div>
								</div>

								<div class="col-lg-12">
									<div class="form-group">
										<div class="text-center">
											<div id="load_div"></div>
										</div>
										<label>Description</label>
										<textarea class="form-control" rows="5" name="description"></textarea>
									</div>
								</div>
							</div>
							</div>

							<div class="submit-section">
								<button class="btn btn-primary submit-btn" type="submit" name="book">Book</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>﻿
		
		<!-- Footer -->
		<?php require'..\footer.php'; ?>
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