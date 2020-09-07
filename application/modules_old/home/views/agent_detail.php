<!DOCTYPE html>
<html lang="en"> 
<?php $this->load->view('common/head'); ?>
<body class="header-1 page-header-1">
	<!-- ====== BEGIN HEADER ====== -->
	<?php $this->load->view('common/header'); ?>
	<!-- ====== END HEADER ====== -->

	<!-- ====== SEARCH RESULT PAGE HEADER ====== -->
	<section class="page-header">
		<div class="container">
			<h1 class="page-header-title">Agent Property Details</h1>
			<ul class="breadcrumb">
				<li><a href="<?php echo base_url(); ?>">Home</a></li>
				<li><a href="javascript:void(0)">Agent</a></li>
				<li class="active"><?php echo ucfirst($agent['first_name']).' '.ucfirst($agent['last_name']); ?></li>
			</ul>
		</div>
	</section>

	<!-- ====== SEARCH RESULT CONTENT ====== -->
	<section class="page-section">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<!-- Content -->
					<div id="content">

						<div class="single-agent profile-box">
							<div class="profile-content">
								<?php if ($agent['profile_dp'] == "user.png" || $agent['profile_dp'] == "") { ?>
									<img style="width: 150px; height: 150px" src="<?php echo base_url(); ?>assets/images/user.png" alt="profile-img">
								<?php }else{ ?>
									<img style="width: 150px; height: 150px" src="<?php echo base_url(); ?>uploads/images/<?php echo $agent['profile_dp']; ?>" alt="profile-img">
								<?php } ?>
								<!-- <img src="assets/images/team_1.jpg" alt="" class="profile-img"> -->
								<div class="content-wrapper">
									<div class="row">
										<div class="col-md-8 col-sm-8 col-xs-8">
											<h3 class="profile-name">
												<a href="javascript:void(0)" class=""><?php echo ucfirst($agent['first_name']).' '.ucfirst($agent['last_name']); ?></a>
												<!-- <small>CEO Tonjoo Property</small> -->
											</h3>
										</div>
										<?php if (!empty($agent['agency_image'])) { ?>
											<div class="col-md-4 col-sm-4 col-xs-4">
												<img style="width: 70px" src="<?php echo base_url(); ?>uploads/images/<?php echo $agent['agency_image']; ?>" alt="agent-logo">
											</div>
										<?php } ?>	
									</div>
									<ul class="profile-contact">
										<li>
											<i class="fa fa-envelope"></i>
											<a href="mailto:<?php echo $agent['email']; ?>"><?php echo $agent['email']; ?></a>
										</li>
										<li>
											<i class="fa fa-phone"></i>
											<a href="tel:<?php echo $agent['phone']; ?>"><?php echo $agent['phone']; ?></a>
										</li>
									</ul>
								</div>
							</div>
							<div class="profile-description">
								<p><?php echo nl2br($agent['about']); ?></p>
							</div>
						</div>

						<div class="panel title-panel">
							<div class="panel-body">
								<h3 class="panel-title"><?php echo ucfirst($agent['first_name']).' '.ucfirst($agent['last_name']); ?> Listing (<?php echo count($agent_listings); ?> Properties)</h3>
							</div>
						</div>
						<div class="property-list archive-flex archive-with-footer col-md-12">
							<div class="row">
								<div class="property-list archive-flex archive-with-footer">
									<div class="row">
										<?php if (!empty($agent_listings)) {
											foreach ($agent_listings as $list) { ?>
												<div class="col-md-12 padd-top-30">
													<div class="property-item booking-item property-archive col-lg-12 col-md-12 col-md-6 col-sm-12">
														<div class="row">
															<div class="col-lg-5 col-sm-5 no-padding bg-white">
																<a href="<?php echo base_url() . 'listing/detail/' . @$list['unique_id'] ?>" class="property-image listing-property-img">
																	<img src="<?php echo !empty($list['image_name'])? 
																	base_url() . 'assets/listing_images/' . @$list['image_name'] :
																	"https://via.placeholder.com/350x150?text=No+Image+Here" ?>" alt="Post list 1" />
																</a>
																<!--<a href="property-details.php" class="btn-compare" title="Add to favourite"><i class="fa fa-heart"></i></a>-->
															</div>
															<div class="col-lg-7 col-sm-7 property-padding">
																<div class="property-content listing-content">
																	<div class="row">
																		<div class="col-md-8 col-sm-8 col-xs-9">
																			<h3 class="property-title"><a href="<?php echo base_url() . 'listing/detail/' . $list['unique_id']; ?>"><?php echo $list['title']; ?></a></h3>
																		</div>
																		<div class="col-md-4 col-sm-4 col-xs-3 text-right">
																			<img class="img-responsive agent-logo" style="width: 70px" src="<?php echo base_url(); ?>uploads/images/<?php echo $agent['agency_image']; ?>">
																		</div>
																	</div>
																	<p>
																		<span class="property-price"><?php echo currency().number_format($list['price']); ?><?php echo ($list['purpose'] == 'rent' || $list['purpose'] == 'student') ? " PCM" : ""; ?></span>
																		<span class="property-label">


			                                                             <a href="javascript:void(0)" class="property-label__type" style="background: #ed193f">
                                                                                <?php 
                                                                                    switch($list['purpose']){
                                                                                        case 'sale':
                                                                                            echo "For Sale";
                                                                                            break;
                                                                                        case 'rent':
                                                                                            echo "To Rent";
                                                                                            break;
                                                                                        case 'student':
                                                                                            echo "Student";
                                                                                    }
                                                                                ?>
                                                                            </a>

																			
																			<a href="javascript:void(0)" class="property-label__type"><?php echo ucwords($list['property_type']); ?></a>
																		</span>
																	</p>
																	<div class="property-address">
																		<?php echo $list['location']; ?>
																	</div>
																	<div class="row feature-list-icon">
																		<div class="col-md-5">
																			<div class="contact-icon">
																				<p>
																					<a href="tel:<?php echo $list['contact_phone']; ?>">
																						<i class="fa fa-phone"></i> <?php echo $list['contact_phone']; ?>
																					</a>
																				</p>
																			</div>
																		</div>
																		<div class="col-md-7">
																			<div class="contact-icon">
																				<p>
																					<a href="mailto:<?php echo $list['contact_email']; ?>">
																						<i class="fa fa-envelope"></i><?php echo $list['contact_email']; ?>
																					</a>
																				</p>
																			</div>
																		</div>
																	</div>
																	<p class="property-description"><?php echo custom_substr(ucwords($list['description']),250); ?>
																</p>
																<div class="property-footer">
																	<div class="item-wide"><span class="fi flaticon-wide"></span><?php echo $list['land_area'] . ' ' .getUnit($list['unit']); ?></div>
																	<div class="item-room"><span class="fi flaticon-room"></span> <?php echo $list['no_of_bedrooms']; ?></div>
																	<div class="item-bathroom"><span class="fi flaticon-bathroom"></span> <?php echo $list['no_of_bathrooms']; ?> </div>
																</div>
															</div>
														</div>
													</div>
												</div>

											</div>
										<?php }
									} ?>
								</div>
							</div>

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
