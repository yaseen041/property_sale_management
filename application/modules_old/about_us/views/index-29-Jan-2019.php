<!DOCTYPE html>
<html lang="en"> 
<?php $this->load->view('common/head'); ?>
<body class="header-1 page-header-1">
	<!-- ====== BEGIN HEADER ====== -->
	<?php $this->load->view('common/header'); ?>
	<!-- ====== END HEADER ====== -->

	<section class="page-header">
		<div class="container">
			<h1 class="page-header-title">About Us</h1>
			<ul class="breadcrumb">
				<li><a href="<?php echo base_url(); ?>">Home</a></li>
				<li class="active">About Us</li>
			</ul>
		</div>
	</section>
	<!-- ====== ADVANTAGES ====== -->
	<section class="page-section ">
		<div class="container">

			<!-- Section Title -->
			<div class="section-header">
				<h2 class="section-title">About US</h2>
			</div>

			<!-- Section Content -->
			<div class="row">
				<div class="col-md-12">
					<p>EMC2 Property is a newly formed website, designed for everyone; those who are interested in a browse of local property, students searching for their next shared accommodation or investors and developers. </p>
					<p>Our aim is to provide you with a wide range of properties for sale, to rent or student lettings within the UK, with a simple and easy to use presentation.</p>
				</div>		
				
			</div>
		</div>
	</section>

	<?php $this->load->view('common/footer'); ?>
	<?php $this->load->view('common/scripts'); ?>
</body>
</html>
