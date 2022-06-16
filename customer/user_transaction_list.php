<?php 
session_start();
require '..\connection.php';
if(!isset($_SESSION['user_id']))
{
	header("Location:..\login.php");
	exit();
}
$user_id = $_SESSION["user_id"];
$sql = "SELECT * from `member` WHERE member_id='$user_id'";
$result = mysqli_query($conn,$sql) or die("query unsuccessful");
$data = mysqli_fetch_assoc($result);
$name = $data['name'];

$sql2 = "SELECT * FROM `wallet` WHERE member_id='$user_id' AND member_type='Customer'";
$result2 = mysqli_query($conn,$sql2);
$array = mysqli_fetch_assoc($result2);
$balance = $array['wallet_balance'];

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
						
						<h4 class="mb-4">Wallet Transaction List</h4>
						<div class="card transaction-table mb-0">
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-center mb-0">
										<thead>
											<tr>
												<th>S.No</th>
												<th>Date & Time</th>
												<th>Wallet</th>
												<th>Credit</th>
												<th>Debit</th>
												<th>Reason</th>
												<th>Status</th>
											</tr>
										</thead>
										<tbody>

							        <?php
							        $query = "SELECT * FROM `transaction` WHERE id='$user_id' AND member_type='Customer'";
									$result = mysqli_query($conn,$query);
									

									if(mysqli_num_rows($result) > 0){
									 	$i = 1;
									 	
										
									 while($row = $result->fetch_assoc()){

									 $transaction_type =  $row['transaction_type'];
									?>
									
									<?php if($transaction_type == 'credit')  { ?>
									
												<tr>
													<td><?php echo $i?></td>
													<td><?php echo $row['date']?></td>
													<th><?php echo $row['wallet_balance'] ?></th>
													<th><?php echo $row['amount']?></th>
													<th>0</th>
													<th>-</th>
													<th><span class="badge bg-primary inv-badge
													p-2" style="font-size:15px;"><?php echo $row['transaction_type'] ?></span></th>
													
													
												 
											   </tr>
									<?php }else {?>

												<tr>
													<td><?php echo $i?></td>
													<td><?php echo $row['date']?></td>
													<th><?php echo $row['wallet_balance'] ?></th>
													<th>0</th>
													<th><?php echo $row['amount']?></th>
													<th>-</th>
													<th><span class="badge bg-success inv-badge
													p-2" style="font-size:15px;"><?php echo $row['transaction_type'] ?></span></th>
													
													
												 
											   </tr>



									<?php } ?>
												
									<?php
										$i++;
												} 

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

</html>