<?php $this->load->view('common/header'); ?>
<!-- Edit Profile -->

<section class="panel-bg">
	<div class="container">
		<div class="row">

			<?php $this->load->view('common/dashboard_sidebar'); ?>


			<div class="col-md-9">
				<div class="panel with-nav-tabs panel-default">
					<div class="panel-heading">
						<ul class="nav nav-tabs">
							<li class="active"><a href="#tab1default" data-toggle="tab">My Booking</a></li>

							<li><a href="#tab2default" data-toggle="tab">Cancelled Booking</a></li>
						</ul>

					</div>

					<div class="panel-body">
						<div class="tab-content">
							<div class="tab-pane fade in active" id="tab1default">
								<div class="property-item booking-item property-archive col-lg-12 col-md-6 col-sm-6 no-padding">
									<div class="row">
										<div class="col-lg-5">
											<a href="<?php echo base_url(); ?>details/rooms/<?php echo 'dsfds23fsadf213135fd21f'.'/'.dorage_url_title('Villa For Sale'); ?>" class="property-image listing-property-img">
												<img src="<?php echo base_url(); ?>assets/images/balcony.jpg" alt="Post list 1">
											</a>
											<a href="#" class="btn-compare" title="Add to favourite"><i class="fa fa-heart"></i></a>
										</div>
										<div class="col-lg-7">
											<div class="property-content listing-content">
												<h3 class="property-title"><a href="<?php echo base_url(); ?>details/rooms/<?php echo 'dsfds23fsadf213135fd21f'.'/'.dorage_url_title('Villa For Sale'); ?>">Stunning new 4 bedroom must see villa</a></h3>
												<p>
													<span class="property-price">$ 200.000.000</span>
													<span class="property-label">
														<a href="#" class="property-label__type">Large</a>
														
													</span>
												</p>
												<div class="property-address">
													2096 Monroe Street, Houston, 77030 USA
												</div>
												<div class="rating">
													<div class="stars">
														<span class="fa fa-star checked"></span>
														<span class="fa fa-star checked"></span>
														<span class="fa fa-star checked"></span>
														<span class="fa fa-star"></span>
														<span class="fa fa-star"></span>
														<span>115</span>
													</div>
												</div>
												<p class="property-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti sit quos mollitia omnis fuga, nihil suscipit, pariatur iusto dolore architecto labore consequatur minima molestias provident adipisci reiciendis officia, aspernatur dignissimos? 
												</p>
												
											</div>
										</div>
									</div>
								</div>

								<div class="property-item booking-item property-archive col-lg-12 col-md-6 col-sm-6 no-padding">
									<div class="row">
										<div class="col-lg-5">
											<a href="<?php echo base_url(); ?>details/rooms/<?php echo 'dsfds23fsadf213135fd21f'.'/'.dorage_url_title('Villa For Sale'); ?>" class="property-image listing-property-img">
												<img src="<?php echo base_url(); ?>assets/images/garage_2.jpg" alt="Post list 1">
											</a>
											<a href="#" class="btn-compare" title="Add to favourite"><i class="fa fa-heart"></i></a>
										</div>
										<div class="col-lg-7">
											<div class="property-content listing-content">
												<h3 class="property-title"><a href="<?php echo base_url(); ?>details/rooms/<?php echo 'dsfds23fsadf213135fd21f'.'/'.dorage_url_title('Villa For Sale'); ?>">Stunning new 4 bedroom must see villa</a></h3>
												<p>
													<span class="property-price">$ 200.000.000</span>
													<span class="property-label">
														<a href="#" class="property-label__type">Medium</a>
														
													</span>
												</p>
												<div class="property-address">
													2096 Monroe Street, Houston, 77030 USA
												</div>
												<div class="rating">
													<div class="stars">
														<span class="fa fa-star checked"></span>
														<span class="fa fa-star checked"></span>
														<span class="fa fa-star checked"></span>
														<span class="fa fa-star"></span>
														<span class="fa fa-star"></span>
														<span>85</span>
													</div>
												</div>
												<p class="property-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti sit quos mollitia omnis fuga, nihil suscipit, pariatur iusto dolore architecto labore consequatur minima molestias provident adipisci reiciendis officia, aspernatur dignissimos?</p>
												
											</div>
										</div>
									</div>
								</div>

								<div class="property-item booking-item property-archive col-lg-12 col-md-6 col-sm-6 no-padding">
									<div class="row">
										<div class="col-lg-5">
											<a href="<?php echo base_url(); ?>details/rooms/<?php echo 'dsfds23fsadf213135fd21f'.'/'.dorage_url_title('Villa For Sale'); ?>" class="property-image listing-property-img">
												<img src="<?php echo base_url(); ?>assets/images/storage_5.jpg" alt="Post list 1">
											</a>
											<a href="#" class="btn-compare" title="Add to favourite"><i class="fa fa-heart"></i></a>
										</div>
										<div class="col-lg-7">
											<div class="property-content listing-content">
												<h3 class="property-title"><a href="<?php echo base_url(); ?>details/rooms/<?php echo 'dsfds23fsadf213135fd21f'.'/'.dorage_url_title('Villa For Sale'); ?>">Stunning new 4 bedroom must see villa</a></h3>
												<p>
													<span class="property-price">$ 200.000.000</span>
													<span class="property-label">
														<a href="#" class="property-label__type">Small</a>
														
													</span>
												</p>
												<div class="property-address">
													2096 Monroe Street, Houston, 77030 USA
												</div>
												<div class="rating">
													<div class="stars">
														<span class="fa fa-star checked"></span>
														<span class="fa fa-star checked"></span>
														<span class="fa fa-star checked"></span>
														<span class="fa fa-star"></span>
														<span class="fa fa-star"></span>
														<span>45</span>
													</div>
												</div>
												<p class="property-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti sit quos mollitia omnis fuga, nihil suscipit, pariatur iusto dolore architecto labore consequatur minima molestias provident adipisci reiciendis officia, aspernatur dignissimos?</p>
												
											</div>
										</div>
									</div>
								</div>


							</div>


							<div class="tab-pane fade" id="tab2default">	

								<div class="property-item booking-item property-archive col-lg-12 col-md-6 col-sm-6 no-padding">
									<div class="row">
										<div class="col-lg-5">
											<a href="<?php echo base_url(); ?>details/rooms/<?php echo 'dsfds23fsadf213135fd21f'.'/'.dorage_url_title('Villa For Sale'); ?>" class="property-image listing-property-img">
												<img src="<?php echo base_url(); ?>assets/images/balcony_2.jpg" alt="Post list 1">
											</a>
											<a href="#" class="btn-compare" title="Add to favourite"><i class="fa fa-heart"></i></a>
										</div>
										<div class="col-lg-7">
											<div class="property-content listing-content">
												<h3 class="property-title"><a href="<?php echo base_url(); ?>details/rooms/<?php echo 'dsfds23fsadf213135fd21f'.'/'.dorage_url_title('Villa For Sale'); ?>">Stunning new 4 bedroom must see villa</a></h3>
												<p>
													<span class="property-price">$ 200.000.000</span>
													<span class="property-label">
														<a href="#" class="property-label__type">Small</a>
														
													</span>
												</p>
												<div class="property-address">
													2096 Monroe Street, Houston, 77030 USA
												</div>
												<div class="rating">
													<div class="stars">
														<span class="fa fa-star checked"></span>
														<span class="fa fa-star checked"></span>
														<span class="fa fa-star checked"></span>
														<span class="fa fa-star"></span>
														<span class="fa fa-star"></span>
														<span>75</span>
													</div>
												</div>
												<p class="property-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti sit quos mollitia omnis fuga, nihil suscipit, pariatur iusto dolore architecto labore consequatur minima molestias provident adipisci reiciendis officia, aspernatur dignissimos? </p>
												
											</div>
										</div>
									</div>
								</div>


								<div class="property-item booking-item property-archive col-lg-12 col-md-6 col-sm-6 no-padding">
									<div class="row">
										<div class="col-lg-5">
											<a href="<?php echo base_url(); ?>details/rooms/<?php echo 'dsfds23fsadf213135fd21f'.'/'.dorage_url_title('Villa For Sale'); ?>" class="property-image listing-property-img">
												<img src="<?php echo base_url(); ?>assets/images/basement.jpg" alt="Post list 1">
											</a>
											<a href="#" class="btn-compare" title="Add to favourite"><i class="fa fa-heart"></i></a>
										</div>
										<div class="col-lg-7">
											<div class="property-content listing-content">
												<h3 class="property-title"><a href="<?php echo base_url(); ?>details/rooms/<?php echo 'dsfds23fsadf213135fd21f'.'/'.dorage_url_title('Villa For Sale'); ?>">Stunning new 4 bedroom must see villa</a></h3>
												<p>
													<span class="property-price">$ 200.000.000</span>
													<span class="property-label">
														<a href="#" class="property-label__type">Medium</a>
														
													</span>
												</p>
												<div class="property-address">
													2096 Monroe Street, Houston, 77030 USA
												</div>
												<div class="rating">
													<div class="stars">
														<span class="fa fa-star checked"></span>
														<span class="fa fa-star checked"></span>
														<span class="fa fa-star checked"></span>
														<span class="fa fa-star"></span>
														<span class="fa fa-star"></span>
														<span>140</span>
													</div>
												</div>
												<p class="property-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti sit quos mollitia omnis fuga, nihil suscipit, pariatur iusto dolore architecto labore consequatur minima molestias provident adipisci reiciendis officia, aspernatur dignissimos?</p>
												
											</div>
										</div>
									</div>
								</div>


								<div class="property-item booking-item property-archive col-lg-12 col-md-6 col-sm-6 no-padding">
									<div class="row">
										<div class="col-lg-5">
											<a href="<?php echo base_url(); ?>details/rooms/<?php echo 'dsfds23fsadf213135fd21f'.'/'.dorage_url_title('Villa For Sale'); ?>" class="property-image listing-property-img">
												<img src="<?php echo base_url(); ?>assets/images/cold-storage.jpg" alt="Post list 1">
											</a>
											<a href="#" class="btn-compare" title="Add to favourite"><i class="fa fa-heart"></i></a>
										</div>
										<div class="col-lg-7">
											<div class="property-content listing-content">
												<h3 class="property-title"><a href="<?php echo base_url(); ?>details/rooms/<?php echo 'dsfds23fsadf213135fd21f'.'/'.dorage_url_title('Villa For Sale'); ?>">Stunning new 4 bedroom must see villa</a></h3>
												<p>
													<span class="property-price">$ 200.000.000</span>
													<span class="property-label">
														<a href="#" class="property-label__type">Large</a>
														
													</span>
												</p>
												<div class="property-address">
													2096 Monroe Street, Houston, 77030 USA
												</div>
												<div class="rating">
													<div class="stars">
														<span class="fa fa-star checked"></span>
														<span class="fa fa-star checked"></span>
														<span class="fa fa-star checked"></span>
														<span class="fa fa-star"></span>
														<span class="fa fa-star"></span>
														<span>185</span>
													</div>
												</div>
												<p class="property-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti sit quos mollitia omnis fuga, nihil suscipit, pariatur iusto dolore architecto labore consequatur minima molestias provident adipisci reiciendis officia, aspernatur dignissimos?</p>
												
											</div>
										</div>
									</div>
								</div>


							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>		
</section>



<!-- Edit Profile End-->
<?php $this->load->view('common/footer'); ?>	