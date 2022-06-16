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
				<div class="row"> 
					<div class="col-xl-3 col-md-4">
						<?php require'common/user_sidebar.php' ?>
					</div>
					<div class="col-xl-9 col-md-8">
						<div class="row">
							<div class="col-xl-6 col-lg-6 col-md-6">
								<div class="card">
									<div class="card-body">
										<h4 class="card-title">Wallet</h4>
										<div class="wallet-details">
											<span>Wallet Balance</span>
											<h3>$<?php echo $balance?></h3>
											
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-6 col-lg-6 col-md-6">
								<div class="card">
									<div class="card-body">
										<h4 class="card-title">Add Wallet</h4>
										<form action="process/wallet_amount.php" method="POST">
											<div class="form-group">
												<div class="input-group mb-3">
													<div class="input-group-prepend">
														<label class="input-group-text display-5">$</label>
													</div>
													<input type="text" maxlength="10" class="form-control" name="wallet_amt" id="wallet_amt" placeholder="00.00" value="">
												</div>
											</div>
										
										<div class="text-center mb-3">
											<h5 class="mb-3">OR</h5>
											<ul class="list-inline mb-0">
											<button class="btn" name="doller1" onclick="getElementById('wallet_amt').value = '50'"><li class="line-inline-item mb-0 d-inline-block">
													<a href="javascript:;"  class="updatebtn">$50</a></button>
												</li>
											<button class="btn" name="doller2" onclick="getElementById('wallet_amt').value = '100'"><li class="line-inline-item mb-0 d-inline-block">
													<a href="javascript:;"  data-amount="100" class="updatebtn">$100</a></button>
												</li>
											<button class="btn" name="doller3" onclick="getElementById('wallet_amt').value = '150'"><li class="line-inline-item mb-0 d-inline-block">
													<a href="javascript:;"  data-amount="150" class="updatebtn">$150</a></button>
												</li>
											</ul>
										</div>
										<!-- <a href="javascript:void(0);" class="btn btn-primary btn-block withdraw-btn" name="add_wallet">Add to Wallet</a> -->
										<button class="btn btn-primary btn-block btn-lg login-btn"
										name="add_wallet" type="submit">Add to Wallet</button>
						
										</form>
									</div>
								</div>
							</div>
						</div>
						<h4 class="mb-4">Wallet Request List</h4>
						<div class="card transaction-table mb-0">
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-center mb-0">
										<thead>
											<tr>
												<th>S.No</th>
												<th>Date</th>
												<th>Amount</th>
												<th>Status</th>
											</tr>
										</thead>
										<tbody>

									<?php

										$sql = "SELECT * FROM `wallet_request` WHERE id='$id' AND member_type='Customer'";

										$result = mysqli_query($conn,$sql) or die("query unsuccessful");

										 if(mysqli_num_rows($result) > 0){
										 	$i = 1;
										 	while($row = $result->fetch_assoc()){
										 		
										?>
													<tr>
													<td><?php echo $i?></td>
													<td><?php echo $row['date']?></td>
													<td><?php echo $row['amount']?></td>
													<td><span class="badge badge-success inv-badge p-2"><?php echo $row['request_status']?></span></td>
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

<!-- Mirrored from truelysell-html.dreamguystech.com/template/user-wallet.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 26 Jun 2021 08:10:38 GMT -->
</html>