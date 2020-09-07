<!DOCTYPE html>
<html lang="en"> 
<?php $this->load->view('common/head'); ?>
<body class="header-1 page-header-1">
	<!-- ====== BEGIN HEADER ====== -->
	<?php $this->load->view('common/header'); ?>

	<section class="panel-bg">
		<div class="container">
			<div class="row">
				<?php $this->load->view('common/dashboard_sidebar'); ?>
				<div class="col-md-9">
					<div id="content">
						<div class="single-agent profile-box usr-profile">
							<div class="profile-content dashboard-profile">
								<div class="col-xs-12 col-sm-4 col-md-4">
								<?php if ($user_detail['profile_dp'] == "user.png" || $user_detail['profile_dp'] == "") { ?>
									<img src="<?php echo base_url(); ?>assets/images/user.png" alt="" class="profile-img pull-left img-responsive center-block">
								<?php }else{ ?>
									<img src="<?php echo base_url(); ?>uploads/images/<?php echo $user_detail['profile_dp']; ?>" alt="Profile Image" class="profile-img pull-left img-responsive  center-block">
								<?php } ?>
								</div>
								<div class="col-xs-12 col-sm-8 col-md-8">
									<h3 class="profile-name">
										<a href="javascript:void(0)" class="">
											<?php if (!empty($user_detail['first_name']) && !empty($user_detail['last_name'])) {
												echo ucfirst($user_detail['first_name'])." ".ucfirst($user_detail['last_name']);
											}else{ 
												echo "Your Name";
											} ?>
										</a>
										<small>Member Since <?php echo date('d M Y', strtotime($user_detail['created_at'])); ?></small>
									</h3>
									<ul class="profile-contact">
										<li>
											<i class="fa fa-envelope"></i>
											<a href="<?php echo (empty($user_detail['email']))?"javascript:void(0)":"mailto:".$user_detail['email']; ?>">
												<?php if (!empty($user_detail['email'])) {
													echo $user_detail['email'];
												}else{ 
													echo "Your Email";
												} ?>
											</a>
										</li>
										<li>
											<i class="fa fa-phone"></i>
											<a href="javascript:void(0)">
												<?php if (!empty($user_detail['phone'])) {
													echo $user_detail['phone'];
												}else{ 
													echo "+xx-xxxxx";
												} ?>
											</a>
										</li>
										<!-- <li>
											<i class="fa fa-fax"></i>
											<a href="javascript:void(0)">(+62) 274 21678</a>
										</li>
										<li>
											<i class="fa fa-mobile"></i>
											<a href="javascript:void(0)">(+62) 813 3239 2324</a>
										</li> -->
									</ul>
									<h3 class="profile-name">
										<?php if (!empty($user_detail['agency_name'])) {
											echo ucfirst($user_detail['agency_name']);
										}else{ 
											echo "Agency Name";
										} ?>
									</h3>
									<ul class="profile-contact">
										<?php if (!empty($user_detail['agency_website'])) {?>
											<li>
												<a href="<?php echo addHttp($user_detail['agency_website']); ?>" target="_blank">
													<?php echo addHttp($user_detail['agency_website']); ?>
												</a>
											</li>
										<?php } ?>
										<?php if (!empty($user_detail['agency_image'])) {?>
											<li>
												<img class="img-thumnail" style="width: 100px" src="<?php echo base_url(); ?>uploads/images/<?php echo $user_detail['agency_image']; ?>" alt="agency-logo">
											</li>
										<?php } ?>
									</ul>
								</div>
							</div>
							<div class="profile-description">
								<p><?php echo nl2br($user_detail['about']); ?></p>
								

							</div>
						</div>
					</div>
				</div>	


			</div>
		</div>		
	</section>


	<?php $this->load->view('common/footer'); ?>
	<?php $this->load->view('common/scripts'); ?>
</body>
</html>