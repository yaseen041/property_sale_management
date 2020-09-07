<!DOCTYPE html>
<html lang="en"> 
<?php $this->load->view('common/head'); ?>
<body class="header-1 page-header-1">
	<!-- ====== BEGIN HEADER ====== -->
	<?php $this->load->view('common/header'); ?>
	<!-- ====== END HEADER ====== -->

	<section class="page-header">
		<div class="container">
			<h1 class="page-header-title">Help</h1>
			<ul class="breadcrumb">
				<li><a href="<?php echo base_url(); ?>">Home</a></li>
				<li class="active">Help</li>
			</ul>
		</div>
	</section>


	<section class="page-section">
		<div class="container">

			<!-- Section Title -->
			<div class="section-header">
				<h2 class="section-title">How may we help you?</h2>
			</div>

			<!-- Section Content -->
			<div class="row">
				<div class="col-md-12">

					<h4>Listing properties</h4>
					<p> Our site aims to provide you with a slick and simple process of listing your properties.</p>
					<p> To  list a property you must first register an account with us. After logging in, you will then need to click on + ADD NEW LISTING on the top right of any page. There are only four steps to listing your property. </p>
					<p>Once you have finished your listing, you will need to wait for the admin at EMC2 Property to approve the listing. 
					Your listing will only become visible in search results once it has been approved.</p>

					<br>

					<h4>Amend account or listing details</h4>
					<p> To edit any of your account details you must be logged in. All account detail and settings are found by hovering over your account image to the right of Contact Us in the top right of any page, and then clicking on Dashboard or My Profile.
					</p>


				</div>
			</div>
		</div>
	</section>

	<?php $this->load->view('common/footer'); ?>
	<?php $this->load->view('common/scripts'); ?>
</body>
</html>
