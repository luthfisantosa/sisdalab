<body>
	<!-- wrapper -->
	<div class="wrapper">
		<!--sidebar-wrapper-->
		<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div class="">
					<img src="<?= base_url(); ?>assets/images/pupr-logo.png" class="logo-icon-2" alt="" />
				</div>
				<div>
					<h4 class="logo-text">SISDALAB</h4>
				</div>
				<a href="javascript:;" class="toggle-btn ml-auto"> <i class="bx bx-menu"></i>
				</a>
			</div>
			<!--navigation-->
			<ul class="metismenu" id="menu">
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon icon-color-1"><i class="bx bx-home-alt"></i>
						</div>
						<div class="menu-title">Dashboard</div>
					</a>
					<ul>
						<li> <a href="index.html"><i class="bx bx-right-arrow-alt"></i>Analytics</a>
						</li>
						<li> <a href="index2.html"><i class="bx bx-right-arrow-alt"></i>Sales</a>
						</li>
					</ul>
				</li>
				
			</ul>
			<!--end navigation-->
		</div>
		<!--end sidebar-wrapper-->
		<!--header-->
		<header class="top-header">
			<nav class="navbar navbar-expand">
				<div class="right-topbar ml-auto">
					<ul class="navbar-nav">
						<li class="nav-item dropdown dropdown-user-profile">
							<a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-toggle="dropdown">
								<div class="media user-box align-items-center">
									<div class="media-body user-info">
										<p class="user-name mb-0"><?= $this->session->userdata('name'); ?></p>
										<p class="designattion mb-0">Available</p>
									</div>
									<img src="https://via.placeholder.com/110x110" class="user-img" alt="user avatar">
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-right">	
								<a class="dropdown-item" href="javascript:;"><i class="bx bx-user"></i><span>Profile</span></a>
								<div class="dropdown-divider mb-0"></div>	<a class="dropdown-item" href="<?= base_url('Landing/logout'); ?>"><i class="bx bx-power-off"></i><span>Logout</span></a>
							</div>
						</li>
						
					</ul>
				</div>
			</nav>
		</header>
		<!--end header-->



		<!--page-wrapper-->
	</div>