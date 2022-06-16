<header class="header">
			<nav class="navbar navbar-expand-lg header-nav">
				<div class="navbar-header">
					<a id="mobile_btn" href="javascript:void(0);">
						<span class="bar-icon">
							<span></span>
							<span></span>
							<span></span>
						</span>
					</a>
					<a href="index.php" class="navbar-brand logo">
						<img src="assets/img/Artboard 1.png" class="img-fluid" alt="Logo">
					</a>
					
				</div>
				<div class="main-menu-wrapper">
					<div class="menu-header">
						<a href="..\index.php" class="menu-logo">
							<img src="assets/img/Artboard 1.png" class="img-fluid" alt="Logo">
						</a>
						<a id="menu_close" class="menu-close" href="javascript:void(0);"> <i class="fas fa-times"></i></a>
					</div>
					<ul class="main-nav">
						<li>
							<a href="..\index.php">Home</a>
						</li>
						<li>
							<a href="..\categories.php">Categories</a>
						</li>
				
						<li class="has-submenu active">
							<a href="#">Customers</a>
							<ul class="submenu">
								<li class="active"><a href="user_dashboard.php">Dashboard</a></li>
								<li><a href="#">Bookings</a></li>
								<li><a href="user_settings.php">Profile Settings</a></li>
								<li><a href="user_wallet.php">Wallet</a></li>
								<li><a href="user_transaction_list.php">Transaction List</a></li>
								<li><a href="#">Reviews</a></li>
								<li><a href="#">Payment</a></li>
							</ul>
						</li>
						<!-- <li class="has-submenu">
							<a href="#">Pages <i class="fas fa-chevron-down"></i></a>
							<ul class="submenu">
								<li><a href="#">Search</a></li>
								<li><a href="#">Service Details</a></li>
								<li><a href="#">Add Service</a></li>
								<li><a href="#">Edit Service</a></li>
								<li><a href="#">Chat</a></li>
								<li><a href="#">Notifications</a></li>
								<li><a href="#">About Us</a></li>
								<li><a href="#">Contact Us</a></li>
								<li><a href="#">Faq</a></li>
								<li><a href="#">Terms & Conditions</a></li>
								<li><a href="#">Privacy Policy</a></li>
							</ul>
						</li> -->
						
					</ul>
				</div>
				
				<ul class="nav header-navbar-rht">
					<li class="nav-item desc-list wallet-menu"><a class="nav-link header-login">
							<img src="assets/img/wallet.png" alt="" class="mr-2 wallet-img"><span>Wallet:</span> $<?php echo $balance ?>
						</a>
					</li>

					<!-- Notifications -->
					<!-- <li class="nav-item dropdown logged-item">
						<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false">
							<i class="fas fa-bell"></i> <span class="badge badge-pill bg-yellow">2</span>
						</a>
						<div class="dropdown-menu dropdown-menu-right notifications">
							<div class="topnav-dropdown-header">
								<span class="notification-title">Notifications</span>
								<a href="javascript:void(0)" class="clear-noti"> Clear All </a>
							</div>
							<div class="noti-content">
								<ul class="notification-list">
									<li class="notification-message">
										<a href="notifications.html">
											<div class="media">
												<span class="avatar avatar-sm">
													<img class="avatar-img rounded-circle" alt="User Image" src="assets/img/provider/provider-01.jpg">
												</span>
												<div class="media-body">
													<p class="noti-details"> <span class="noti-title">Thomas Herzberg  has rejected the service</span></p>
													<p class="noti-time"><span class="notification-time">Today 01:00 AM</span></p>
												</div>
											</div>
										</a>
									</li>

							
									<li class="notification-message">
										<a href="notifications.html">
											<div class="media">
												<span class="avatar avatar-sm">
													<img class="avatar-img rounded-circle" alt="User Image" src="assets/img/provider/provider-05.jpg">
												</span>
												<div class="media-body">
													<p class="noti-details"> <span class="noti-title">Maritza Wasson have inprogress the service</span></p>
													<p class="noti-time"><span class="notification-time">15 Sep 2020 5:32 PM</span></p>
												</div>
											</div>
										</a>
									</li>
								</ul>
							</div>
							<div class="topnav-dropdown-footer">
								<a href="notifications.html">View all Notifications</a>
							</div>
						</div>
					</li> -->
					<!-- /Notifications -->

					<!-- chat -->
					<!-- <li class="nav-item logged-item">
						<a href="chat.html" class="nav-link">
							<i class="fa fa-comments" aria-hidden="true"></i>
						</a>
					</li> -->
					<!-- /chat -->
					
					<li class="nav-item dropdown has-arrow logged-item">
						<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false">
							<span class="user-img">
								<img class="rounded-circle" src="assets/img/customer/<?php echo $data["profile_image"]?>" alt="">
							</span>
						</a>
						<div class="dropdown-menu dropdown-menu-right">
							<div class="user-header">
								<div class="avatar avatar-sm">
									<img class="avatar-img rounded-circle" src="assets/img/customer/<?php echo $data["profile_image"]?>" alt="">
								</div>
								<div class="user-text">
									<h6><?php echo $name;?></h6>
									<p class="text-muted mb-0">User</p>
								</div>
							</div>
							<a class="dropdown-item" href="user_dashboard.php">Dashboard</a>
							<a class="dropdown-item" href="user_bookings.php">My Bookings</a>
							<a class="dropdown-item" href="user-settings.php">Profile Settings</a>
							<a class="dropdown-item" href="services.php">Book Services</a>
							<!-- <a class="dropdown-item" href="#">Chat</a> -->
							<a class="dropdown-item" href="user_logout.php">Logout</a>
						</div>
					</li>
				</ul>
			</nav>
		</header>