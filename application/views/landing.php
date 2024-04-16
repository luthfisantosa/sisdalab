<body class="bg-login">
	<!-- wrapper -->
	<div class="wrapper">
		<?php if($this->session->flashdata('notif')!=null): ?>
			<script type="text/javascript">
				Swal.fire({
				  title: 'Maaf!',
				  text: '<?= $this->session->flashdata("notif"); ?>',
				  icon: 'error',
				  confirmButtonText: 'oke'
				})
			</script>
		<?php endif; ?>
		<div class="section-authentication-login d-flex align-items-center justify-content-center">
			<div class="row">
				<div class="col-12 col-lg-10 mx-auto">
					<div class="card radius-15">
						<div class="row no-gutters">
							<div class="col-lg-6">
								<form action="<?= base_url('Landing/Login') ?>" method="POST">
								<div class="card-body p-md-5">
									<div class="text-center">
										<img src="<?= base_url(); ?>assets/images/pupr-logo.png" width="80" alt="">
										<h3 class="mt-2 font-weight-bold">Welcome To SISDALAB</h3>
									</div>
									<div class="form-group mt-1">
										<label>Username</label>
										<input type="text" name="username" class="form-control" placeholder="Enter your " />
									</div>
									<div class="form-group">
										<label>Password</label>
										<input type="password" name="password" class="form-control" placeholder="Enter your password" />
									</div>
									<div class="btn-group mt-1 w-100">
										<input type="submit" class="btn btn-primary btn-block" value="Log In">
									</div>
								</div>
								</form>
							</div>
							<div class="col-lg-6">
								<img src="<?= base_url(); ?>assets/images/login-images/forgot-password-frent-img.jpg" class="card-img login-img h-100 w-100" alt="...">
							</div>
						</div>
						<!--end row-->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end wrapper -->