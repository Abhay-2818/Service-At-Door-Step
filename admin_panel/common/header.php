<div class="header">
			<div class="header-left"> 
				<!-- <a href="index.php" class="logo logo-small">
					<img src="assets/img/logo-icon.png" alt="Logo" width="30" height="30">
				</a> -->
			</div>
			<a href="javascript:void(0);" id="toggle_btn">
				<i class="fas fa-align-left"></i>
			</a>
			<a class="mobile_btn" id="mobile_btn" href="javascript:void(0);">
				<i class="fas fa-align-left"></i>
			</a>
			
			<ul class="nav user-menu">
				<!-- Notifications -->
			<!-- 	<li class="nav-item dropdown noti-dropdown">
					<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
						<i class="far fa-bell"></i>  <span class="badge badge-pill"></span>
					</a>
					<div class="dropdown-menu dropdown-menu-right notifications">
						<div class="topnav-dropdown-header">
							<span class="notification-title">Notifications</span>
							<a href="javascript:void(0)" class="clear-noti"> Clear All </a>
						</div>
						<div class="noti-content">
							<ul class="notification-list">
								<li class="notification-message">
									<a href="admin-notification.html">
										<div class="media">
											<span class="avatar avatar-sm">
												<img class="avatar-img rounded-circle" alt="" src="assets/img/provider/provider-01.jpg">
											</span>
											<div class="media-body">
												<p class="noti-details">
													<span class="noti-title">Thomas Herzberg have been subscribed</span>
												</p>
												<p class="noti-time">
													<span class="notification-time">15 Sep 2020 10:20 PM</span>
												</p>
											</div>
										</div>
									</a>
								</li>
								
								<li class="notification-message">
									<a href="admin-notification.html">
										<div class="media">
											<span class="avatar avatar-sm">
												<img class="avatar-img rounded-circle" alt="" src="assets/img/provider/provider-02.jpg">
											</span>
											<div class="media-body">
												<p class="noti-details">
													<span class="noti-title">Matthew Garcia have been subscribed</span>
												</p>
												<p class="noti-time">
													<span class="notification-time">13 Sep 2020 03:56 AM</span>
												</p>
											</div>
										</div>
									</a>
								</li>
								
							</ul>
						</div>
						<div class="topnav-dropdown-footer">
							<a href="admin-notification.html">View all Notifications</a>
						</div>
					</div>
				</li> -->
				<!-- /Notifications -->
				
				<!-- User Menu -->
				<li class="nav-item dropdown">
					<a href="javascript:void(0)" class="dropdown-toggle user-link  nav-link" data-toggle="dropdown">
						<span class="user-img">
							<img class="rounded-circle" src="assets/img/admin_profile/<?php echo $data["profile_image"]?>" width="40" alt="Admin">
						</span>
					</a>
					<div class="dropdown-menu dropdown-menu-right">
					<a class="dropdown-item" href="admin_profile.php">Profile</a>
					<a class="dropdown-item" href="process/logout.php">Logout</a>
					</div>
				</li>
				<!-- /User Menu -->	
			</ul>
</div>