<?php 

session_start();


require '..\connection.php';
if(!isset($_SESSION['provider_id']))
{
	header("Location:..\login.php");
	exit();
}
$provider_id = $_SESSION["provider_id"];
$provider_query = "SELECT * from `provider` WHERE provider_id='$provider_id'";
$result = mysqli_query($conn,$provider_query) or die("query unsuccessful");
$data = mysqli_fetch_assoc($result);

$name = $data['name'];


$sql1 = "SELECT * from `wallet` WHERE member_id='$provider_id' AND member_type='Provider'";
$result1 = mysqli_query($conn,$sql1) or die("query unsuccessful");
$data1 = mysqli_fetch_assoc($result1);
$balance = $data1['wallet_balance'];

$print = "SELECT * FROM `provider_availability` where pid = '$provider_id'";
$array = mysqli_query($conn,$print) or die("query unsuccessful");
$row = mysqli_fetch_assoc($array);
?>
<!DOCTYPE html>
<html lang="en">

<?php require '..\head.php'; ?>

<body>

	<div class="main-wrapper">
	
		<!-- Header -->
		<?php require 'common/provider_header.php'; ?>
		<!-- /Header -->
		
		<div class="content">
			<div class="container">
				<div class="row">
					<div class="col-xl-3 col-md-4 theiaStickySidebar">
						<?php require'common/provider_sidebar.php' ?>
					</div>
					<div class="col-xl-9 col-md-8">
						<div class="card mb-0">
							<div class="card-body">
								<form method="POST" action="process/provider_availability_data.php?id=<?php echo $provider_id?>">
									<div class="form-group">
										<p>Availability <span class="text-danger">*</span>
										</p>
										<div class="row">
											<div class="col-md-12">
												<div class="table-responsive">
													<table class="table availability-table">
														<tbody>
															<!-- monday -->
															<tr>
																<td>
									Select Day
									<select class="form-control" name="day" required>
										<option value="">Select</option>
										<option value="mon">Monday</option>
										<option value="tue">Tuesday</option>
										<option value="wed">Wednesday</option>
										<option value="thu">Thrusday</option>
										<option value="fri">Friday</option>
										<option value="sat">Saturday</option>	
								</select>				
																	
																</td>
															</tr>
															<tr>
																<td class="w-180">
																	From time 
																	<span class="time-select mb-1">
																		<select class="form-control" name="from_time" required>
																			<option value="">Select Time</option>
																			<option value="00:00 AM">00:00 AM</option>
																			<option value="01:00 AM">01:00 AM</option>
																			<option value="02:00 AM">02:00 AM</option>
																			<option value="03:00 AM">03:00 AM</option>
																			<option value="04:00 AM">04:00 AM</option>
																			<option value="05:00 AM">05:00 AM</option>
																			<option value="06:00 AM">06:00 AM</option>
																			<option value="07:00 AM">07:00 AM</option>
																			<option value="08:00 AM">08:00 AM</option>
																			<option value="09:00 AM">09:00 AM</option>
																			<option value="10:00 AM">10:00 AM</option>
																			<option value="11:00 AM">11:00 AM</option>
																			<option value="12:00 PM">12:00 PM</option>
																			<option value="01:00 PM">01:00 PM</option>
																			<option value="02:00 PM">02:00 PM</option>
																			<option value="03:00 PM">03:00 PM</option>
																			<option value="04:00 PM">04:00 PM</option>
																			<option value="05:00 PM">05:00 PM</option>
																			<option value="06:00 PM">06:00 PM</option>
																			<option value="07:00 PM">07:00 PM</option>
																			<option value="08:00 PM">08:00 PM</option>
																			<option value="09:00 PM">09:00 PM</option>
																			<option value="10:00 PM">10:00 PM</option>
																			<option value="11:00 PM<">11:00 PM</option>
																		</select>
																	</span>
																</td>
																<td class="w-155">
																	To time
																	<span class="time-select">
																		<select class="form-control" name="to_time" required>
																			<option value="">Select Time</option>
																			<option value="00:00 AM">00:00 AM</option>
																			<option value="01:00 AM">01:00 AM</option>
																			<option value="02:00 AM">02:00 AM</option>
																			<option value="03:00 AM">03:00 AM</option>
																			<option value="04:00 AM">04:00 AM</option>
																			<option value="05:00 AM">05:00 AM</option>
																			<option value="06:00 AM">06:00 AM</option>
																			<option value="07:00 AM">07:00 AM</option>
																			<option value="08:00 AM">08:00 AM</option>
																			<option value="09:00 AM">09:00 AM</option>
																			<option value="10:00 AM">10:00 AM</option>
																			<option value="11:00 AM">11:00 AM</option>
																			<option value="12:00 PM">12:00 PM</option>
																			<option value="01:00 PM">01:00 PM</option>
																			<option value="02:00 PM">02:00 PM</option>
																			<option value="03:00 PM">03:00 PM</option>
																			<option value="04:00 PM">04:00 PM</option>
																			<option value="05:00 PM">05:00 PM</option>
																			<option value="06:00 PM">06:00 PM</option>
																			<option value="07:00 PM">07:00 PM</option>
																			<option value="08:00 PM">08:00 PM</option>
																			<option value="09:00 PM">09:00 PM</option>
																			<option value="10:00 PM">10:00 PM</option>
																			<option value="11:00 PM<">11:00 PM</option>
																		</select>
																	</span>
																</td>
															</tr>
															
															
															
															
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>
									<div class="submit-section text-center">
										<button class="btn btn-primary submit-btn" name="submit" type="submit">Submit</button>
									</div>
								</form>
							</div>
						</div>
						<br>


						<h4 class="mb-4">Availability</h4>
						<div class="card transaction-table mb-0">
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-center mb-0">
										<thead>
											<tr>
												<th>Day</th>
												<th>Time</th>
											</tr>
										</thead>
										<tbody>

											<tr>
													<td>Monday</td>
													<td><?php echo $row['from_time_mon']?>-<?php echo $row['to_time_mon']?></td>
																
										    </tr>

										    <tr>
													<td>Tuesday</td>
													<td><?php echo $row['from_time_tue']?>-<?php echo $row['to_time_tue']?></td>
																
										    </tr>

										    <tr>
													<td>Wednesday</td>
													<td><?php echo $row['from_time_wed']?>-<?php echo $row['to_time_wed']?></td>
																
										    </tr>

										    <tr>
													<td>Thursday</td>
													<td><?php echo $row['from_time_thu']?>-<?php echo $row['to_time_thu']?></td>
																
										    </tr>

										    <tr>
													<td>Friday</td>
													<td><?php echo $row['from_time_fri']?>-<?php echo $row['to_time_fri']?></td>
																
										    </tr>

										    <tr>
													<td>Saturday</td>
													<td><?php echo $row['from_time_sat']?>-<?php echo $row['to_time_sat']?></td>
																
										    </tr>
											
											
										</tbody>
									</table>
								</div>
							</div>
						</div>



					</div>
				</div>

				
			</div>﻿
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

	<!-- Sticky Sidebar JS -->
	<script src="assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
	<script src="assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>

	<!-- Custom JS -->
	<script src="assets/js/script.js"></script>
	
</body>

</html>