<!DOCTYPE html>
<html lang="en"> 
<?php $this->load->view('common/head'); ?>
<body class="header-1 page-header-1">
	<!-- ====== BEGIN HEADER ====== -->
	<?php $this->load->view('common/header'); ?>

	<section class="panel-bg profile_pg">
		<div class="container">
			<div class="row">

				<?php $this->load->view('common/dashboard_sidebar'); ?>

				<div class="col-md-9">
					<div class="panel with-nav-tabs panel-default">
						<div class="panel-heading">
							<h4 style="margin: 14px 0px 17px 23px;
							font-weight: normal;"><i class="fa fa-heart"></i> My Favourite Properties</h4>
						</div>

						<div class="panel-body">
							<div class="property-list archive-flex archive-with-footer">

								<div class="row">
									<div class="property-list archive-flex archive-with-footer">

										<div class="row">
											<?php if (!empty($listing)) {
												foreach ($listing as $list) { ?>
													<div class="col-md-12 padd-top-30">
														<div class="property-item booking-item property-archive col-lg-12 col-md-12 col-md-6 col-sm-12">
															<div class="list-btn-outer">
																<a href="javascript:void(0)" data-listing-id="<?php echo $list['unique_id']; ?>" class="btn sign-btn remove-btn  pull-right btn-primary remove_fav">Remove</a>
															</div>
															<div class="row">
																<div class="col-lg-5 col-sm-5 no-padding">
																	<?php 
																	if(!empty($list['image_name']) && file_exists(FCPATH.'assets/listing_images/'.$list['image_name'])){
																		$image1 = base_url()."assets/listing_images/". $list['image_name'];
																	}else{
																		$image1 = "https://via.placeholder.com/600x400?text=No+Image";
																	} ?>
																	<a href="<?php echo base_url(); ?>listing/detail/<?php echo $list['unique_id']; ?>" class="property-image listing-property-img">
																		<img src="<?php echo $image1; ?>" alt="Property Image">
																	</a>
																	<!-- <a href="<?php echo base_url(); ?>listing/detail/<?php echo $list['unique_id']; ?>" class="btn-compare" title="Add to favourite"><i class="fa fa-heart"></i></a> -->
																</div>
																<div class="col-lg-7 col-sm-7 property-padding">
																	<div class="property-content listing-content">

																		<div class="row">
																			<div class="col-md-8 col-sm-8 col-xs-9">
																				<h3 class="property-title"><a href="<?php echo base_url(); ?>listing/detail/<?php echo $list['unique_id']; ?>"><?php echo $list['title']; ?></a></h3>
																			</div>
																			<div class="col-md-4 col-sm-4 col-xs-3 text-right">
																				<a href="<?php echo base_url(); ?>agent/<?php echo $list['agent_unique_id']; ?>">
																					<img style="width: 75px" class="img-responsive agent-logo" src="<?php echo base_url(); ?>uploads/images/<?php echo $list['agency_image']; ?>">
																				</a>
																			</div>
																		</div>
																		<p>
																			<span class="property-price"><?php echo currency().number_format($list['price']); ?></span>
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
                                                                            <a href="javascript:void(0)" class="property-label__type"><?php echo $list['property_type']; ?></a>

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
																							<i class="fa fa-envelope"></i>&nbsp;<?php echo $list['contact_email']; ?>
																						</a>
																					</p>
																				</div>
																			</div>
																		</div>

																		<p class="property-description">
																			<?php echo custom_substr($list['description'],150); ?>
																		</p>

																		<div class="property-footer">
																			<div class="item-wide"><span class="fi flaticon-wide"></span> <?php echo $list['land_area']." ".getUnit($list['unit']); ?></div>
																			<div class="item-room"><span class="fi flaticon-room"></span> <?php echo $list['no_of_bedrooms']; ?></div>
																			<div class="item-bathroom"><span class="fi flaticon-bathroom"></span> <?php echo $list['no_of_bathrooms']; ?></div>
																		</div>

																	</div>
																</div>
															</div>
														</div>

													</div>
												<?php }
											}else{
												echo "No favourite properties found!";
											} ?>
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

	<?php $this->load->view('common/footer'); ?>
	<?php $this->load->view('common/scripts'); ?>
</body>
<script type="text/javascript">
	$(document).on('click', '.remove_fav', function(e){
		var button = $(this);
		var listing_id = $(this).attr('data-listing-id');
		$.confirm({
			title: 'Remove From Favourite',
			type:"red",
			content: 'Are you sure?',
			buttons: {
				cancel: function () {
				},
				Remove: {
					btnClass: 'btn-red',
					action: function(){
						$.ajax({
							url:"<?php echo base_url(); ?>home/removeFavourite",
							data:"listing_id="+listing_id,
							type:"post",
							dataType:"json",
							success: function(status){
								if(status.msg == 'success'){
									$.gritter.add({
										title: 'Success!',
										sticky: false,
										time: '15000',
										before_open: function(){
											if($('.gritter-item-wrapper').length >= 3)
											{
												return false;
											}
										},
										text: status.response,
										class_name: 'gritter-info'
									});
									setTimeout(function(){
										location.reload(true);
									},1000);
								}else if(status.msg == 'error'){
									$.gritter.add({
										title: 'Error!',
										sticky: false,
										time: '15000',
										before_open: function(){
											if($('.gritter-item-wrapper').length >= 3)
											{
												return false;
											}
										},
										text: status.response,
										class_name: 'gritter-error'
									});
								}
							}
						});

					}
				}
			}
		});
	});
</script>
</html>