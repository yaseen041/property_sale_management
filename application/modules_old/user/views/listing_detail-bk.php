<!DOCTYPE html>
<html lang="en"> 
<?php $this->load->view('common/head'); ?>
<body class="header-1 page-header-1">
	<!-- ====== BEGIN HEADER ====== -->
	<?php $this->load->view('common/header'); ?>

	<!-- Become Space Provider -->
	<section class="page-header">
		<div class="container">
			<h1 class="page-header-title">Property Detail</h1>
			<!-- <ul class="breadcrumb">
				<li><a href="#">Home</a></li>
				<li class="active">Property Detail</li>
			</ul> -->
		</div>
	</section>

	<!-- ====== SINGLE PROPERTY CONTENT ====== -->
	<section class="page-section">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<!-- Content -->
					<div id="content">
						<article class="post property-item">
							<div class="post-property-header">
								<div class="row">
									<div class="col-md-8 col-sm-8">
										<h3 class="post-title"><?php echo ucwords($listing['title']); ?></h3>
									</div>
									<div class="col-md-4 col-sm-4 text-right">
										<span class="property-price"><?php echo currency().number_format($listing['price'],0); ?><?php echo ($listing['purpose'] == 'rent' || $listing['purpose'] == 'student') ? " PW" : ""; ?><?php echo ($listing['purpose'] == 'rent')? ' PW' : ''; ?></span>

									</div>
								</div>

								<div class="row">
									<div class="col-md-8 col-sm-8">
										<div class="property-address">
											<?php echo $listing['location']; ?>
										</div>
									</div>

								</div>
								<hr>
								<!-- Property Gallery Slider -->
								<?php $images = listingImages($listing['id']); 
								if (!empty($images)) { ?>
									<div class="property-image">
										<div id="property-slider" class="property-slider">
											<?php foreach ($images as $image) { ?>
												<a class="image-link" href="<?php echo base_url() ."assets/listing_images/". $image['image_name']; ?>">
													<img style="width: 100%" src="<?php echo base_url(); ?>assets/listing_images/<?php echo $image['image_name']; ?>" alt="Property Photo">
												</a>
											<?php } ?>
										</div>
										<!-- Property Gallery Slider Navigation -->
										<div id="property-slider-nav" class="property-slider-nav">
											<?php foreach ($images as $image) { ?>
												<img src="<?php echo base_url(); ?>assets/listing_images/<?php echo $image['image_name']; ?>" alt="Property Photo">
											<?php } ?>
										</div>
									</div>
								<?php } ?>
								<!-- Property facility Detail -->

								<!-- The Space Section -->
								<hr>
								<div class="row">
									<div class="col-md-3 col-sm-3"><h3 class="heading-title">Feature</h3></div>
									<div class="col-md-9 col-sm-9">
										<ul class="feature-list">
											<li><i class="fa fa-bed"></i>Bedrooms: <strong><?php echo $listing['no_of_bedrooms']; ?></strong></li>
											<li><i class="fa fa-bath"></i>Bathrooms: <strong><?php echo $listing['no_of_bathrooms']; ?></strong></li>
											<li><i class="fi flaticon-wide"></i> Area: <strong><?php echo $listing['land_area'] . ' ' .getUnit($listing['unit']); ?></strong></li>

										</ul>
									</div>
								</div>

								<hr>
								<div class="row">
									<div class="col-md-3 col-sm-3"><h3 class="heading-title">Purpose</h3></div>
									<div class="col-md-9 col-sm-9">
										<ul class="feature-list">
											<li>
												<?php if ($listing['purpose'] == "sale") {
													echo "For Sale";
												}elseif($listing['purpose'] == "rent"){
													echo "For Rent";
												}else{
													echo "For Students";
												} ?>
											</li>
										</ul>
									</div>
								</div>

								<hr>
								<div class="row">
									<div class="col-md-3 col-sm-3"><h3 class="heading-title">Property type</h3></div>
									<div class="col-md-9 col-sm-9">
										<ul class="feature-list">
											<li><?php echo ucfirst($listing['property_type']); ?></li>
										</ul>
									</div>
								</div>

								<hr>
								<div class="row">
									<div class="col-md-3 col-sm-3"><h3 class="heading-title">Build Year</h3></div>
									<div class="col-md-9 col-sm-9">
										<ul class="feature-list">
											<li><i class="fa fa-check"></i> <?php echo $listing['build_year']; ?></li>
										</ul>
									</div>
								</div>

								<hr>
								<div class="row">
									<div class="col-md-3 col-sm-3"><h3 class="heading-title">Description</h3></div>
									<div class="col-md-9 col-sm-9">
										<p>
											<?php echo nl2br($listing['description']); ?>
										</p>
										<!-- <div class="social-icon pull-right">
											<ul class="social-network social-circle share-icon">
												<li><a href="#" class="icoInsta" title="Share Email"><i class="fa fa-envelope"></i></a></li>
												<li style="margin-left: 0px;"><a href="#" class="icoFacebook" title="Share Facebook"><i class="fa fa-facebook"></i></a></li>
												<li><a href="#" class="icoTwitter" title="Share Twitter"><i class="fa fa-twitter"></i></a></li>

											</ul>
										</div> -->
									</div>
								</div>

								<!-- Availability Section -->

							</article>
							<!-- Property Location / Map -->
							<div class="property-location widget panel-box">
								<div class="panel-header">
									<h3 class="panel-title">Property Location</h3>
								</div>
								<div class="panel-body">
									<iframe src="http://maps.google.com/maps?q=<?php echo @$listing['latitude']; ?>, <?php echo @$listing['longitude']; ?>&z=15&output=embed" width="750" height="350" frameborder="0" style="border:0"></iframe>
								</div>
							</div>


							<!-- Property Location / Map -->
						<!-- <div class="property-location widget panel-box">
							<div class="panel-header">
								<h3 class="panel-title">Property Location</h3>
							</div>
							<div class="panel-body">
								<div id="map"></div>
							</div>
						</div> -->
<!--

						 Comments 
						<div id="comments" class="comments-area compact">
							 Comment Form 

							 Comment List 
							<div class="entry-comments">
								<div class="comment-header">
									<h3 class="widget-title comment-title">Reviews</h3>
								</div>
								<ol class="comment-list">

									 Comment Parent  
									<li class="comment">
										<div class="comment-body">
											<div class="comment-avatar"><img src="<?php echo base_url(); ?>assets/images/img_author_1.jpg" alt=""></div>
											<div class="comment-content">
												<div class="comment-author">
													<a href="#">Tony Elias</a>
													<span class="comment-date">7 mins</span>
												</div>
												<p>Lorem Ipsum is simply dummy text of the printing and etting industry orem Ipsum has been the industry's standard my text ever since they 1500s. the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>

											</div>
										</div>

										<div class="comment-body">
											<div class="comment-avatar"><img src="<?php echo base_url(); ?>assets/images/img_author_2.jpg" alt=""></div>
											<div class="comment-content">
												<div class="comment-author">
													<a href="#">Tony Elias</a>
													<span class="comment-date">7 mins</span>
												</div>
												<p>Lorem Ipsum is simply dummy text of the printing and etting industry orem Ipsum has been the industry's standard my text ever since they 1500s. the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>

											</div>
										</div>

										<div class="comment-body">
											<div class="comment-avatar"><img src="<?php echo base_url(); ?>assets/images/img_author_3.jpg" alt=""></div>
											<div class="comment-content">
												<div class="comment-author">
													<a href="#">Tony Elias</a>
													<span class="comment-date">7 mins</span>
												</div>
												<p>Lorem Ipsum is simply dummy text of the printing and etting industry orem Ipsum has been the industry's standard my text ever since they 1500s. the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>

											</div>
										</div>

										<div class="comment-body">
											<div class="comment-avatar"><img src="<?php echo base_url(); ?>assets/images/img_author_4.jpg" alt=""></div>
											<div class="comment-content">
												<div class="comment-author">
													<a href="#">Tony Elias</a>
													<span class="comment-date">7 mins</span>
												</div>
												<p>Lorem Ipsum is simply dummy text of the printing and etting industry orem Ipsum has been the industry's standard my text ever since they 1500s. the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>

											</div>
										</div>

										 Comment Children 1  
									</li>


								</ol>
							</div>
						</div>-->

					</div>
				</div>
				<div class="col-md-4">

					<!-- Sidebar -->
					<div id="sidebar">
						<!-- widget section Recent Property-->
						<div class="widget">
							<div class="panel-box">
								<!-- Panel Header / Title -->
								<div class="panel-header">
									<h3 class="panel-title">Recent Property</h3>
								</div>
								<!-- Panel Body -->
								<?php $recentListings = getRecentListings(); ?>
								<!-- Panel Body -->
								<div class="panel-body">
									<!-- Recent Property -->
									<ul class="recent-property">
										<?php foreach ($recentListings as $recent) {
											$image_name = array_column($recent['images'],'image_name');
											$first_image = current($image_name);
											$image1= '';
											if(!empty($first_image) && file_exists(FCPATH.'assets/listing_images/'.$first_image)){
												$image1 = base_url()."assets/listing_images/". $first_image;
											}else{
												$image1 = "https://via.placeholder.com/350x150?text=No+Image";
											}
											?>
											<li>
												<div class="property-image">
													<img src="<?php echo $image1; ?>" alt="Property Image" />
												</div>
												<div class="property-content">
													<a href="<?php echo base_url(); ?>listing/detail/<?php echo $recent['unique_id']; ?>"><?php echo ucwords($recent['title']); ?></a>
													<span class="property-price" style="margin:0px !important;"><?php echo currency() . number_format($recent['price'], 0); ?><?php echo ($recent['purpose'] == 'rent' || $recent['purpose'] == 'student') ? " PW" : ""; ?></span>
													<ul class="property-footer">
														<li class="item-wide"><span class="fi flaticon-wide"></span> <?php echo $recent['land_area'] . " " . getUnit($recent['unit']); ?></li>
														<li class="item-garage"><span class="fi flaticon-room"></span> <?php echo $recent['no_of_bedrooms']; ?></li>
													</ul>
												</div>
											</li>
										<?php } ?>
										<!-- Property List Item -->
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Become Space Provider End-->
	<?php $this->load->view('common/footer'); ?>
	<?php $this->load->view('common/scripts'); ?>
</body>
</html>