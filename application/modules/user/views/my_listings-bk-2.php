<?php $this->load->view('common/header'); ?>

<section class="panel-bg">
	<div class="container">
		<div class="row">

			<?php $this->load->view('common/dashboard_sidebar'); ?>


			<div class="col-md-9">
				<div class="panel with-nav-tabs panel-default">
					<div class="panel-heading">
						<ul class="nav nav-tabs">
							<li class="active"><a href="#tab1default" data-toggle="tab">Storage Listings</a></li>

							<li><a href="#tab2default" data-toggle="tab">Mover Listings</a></li>
							<a href="<?php echo base_url(); ?>become_provider" class="btn btn-primary btn-listing  pull-right">Add New Listing</a>
						</ul>

					</div>

					<div class="panel-body">
						<div class="tab-content">
							<div class="tab-pane fade in active" id="tab1default">

								<?php if(empty($storage_listings)): ?>
									<p> Your have no listings. </p>
								<?php endif; ?>


								<?php foreach ($storage_listings as $list): ?>

									<div class="property-item booking-item property-archive col-lg-12 col-md-6 col-sm-6 no-padding">
										<div class="row">
											<div class="col-lg-5">
												<a href="<?php echo base_url(); ?>details/storage/<?php echo $list['unique_id'].'/'.dorage_url_title($list['title']); ?>" class="property-image listing-property-img">
													<img src="<?php echo base_url(); ?>assets/storage_images/<?php echo get_list_image($list['id']); ?>">
												</a>
											</div>
											<div class="col-lg-7">
												<div class="property-content listing-content">
													<div class="list-btn-outer">
														<?php if($list['is_published'] == 0 && $list['status'] == 1): ?>

															<button class="btn set_price_publish sign-btn delete-btn pull-right btn-primary" data-id="<?php echo $list['unique_id']; ?>">Set price and publish</button>

														<?php elseif($list['is_published'] == '0' && $list['status'] == '0' && $list['step_completed'] == '3'): ?>

															<button class="btn sign-btn delete-btn pull-right btn-primary" data-id="<?php echo $list['unique_id']; ?>">Publish</button>

														<?php endif; ?>

														<?php if($list['step_completed'] == 3): ?>

															<a href="<?php echo base_url(); ?>listing/storage/step3_complete/<?php echo $list['unique_id']; ?>" class="btn pull-right signin-btn edit-btn btn-primary">Edit</a>


														<?php elseif($list['step_completed'] == 2): ?>

															<a href="<?php echo base_url(); ?>listing/storage/step2_complete/<?php echo $list['unique_id']; ?>" class="btn pull-right signin-btn edit-btn btn-primary">Edit</a>

														<?php elseif($list['step_completed'] == 1): ?>

															<a href="<?php echo base_url(); ?>listing/storage/step1_complete/<?php echo $list['unique_id']; ?>" class="btn pull-right signin-btn edit-btn btn-primary">Edit</a>

														<?php else: ?>

															<a href="<?php echo base_url(); ?>listing/storage/step1/<?php echo $list['unique_id']; ?>" class="btn pull-right signin-btn edit-btn btn-primary">Edit</a>

														<?php endif; ?>
													</div>
													<?php if($list['status'] == 0): ?>
														<h5 class="label-warning text-center" style="color: white; padding: 5px 0px;"> Your storage space is under review. </h5>
													<?php endif; ?>
													<h3 class="property-title">
														<a href="<?php echo base_url(); ?>details/storage/<?php echo $list['unique_id'].'/'.dorage_url_title($list['title']); ?>" class="pull-left"><?php echo $list['title']; ?></a>
													</h3>
													<p>
														<span class="property-price">$<?php echo @$list['price'] == '' ? '0' : @$list['price']; ?></span>
														<span class="property-label">
															<a href="#" class="property-label__type"><?php echo get_size_type(get_meta_value('storage_size_type' , @$list['id'])); ?></a>
														</span>
													</p>
													<div class="property-address">
														<?php echo @$list['place']; ?>
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
													<p class="property-description">
														<?php echo $list['description']; ?>
													</p>
												</div>
											</div>
										</div>
									</div>

								<?php endforeach; ?>


							</div>

							<div class="tab-pane fade" id="tab2default">	

								<?php if(empty($mover_listings)): ?>
									<p> Your have no listings. </p>
								<?php endif; ?>

								<?php foreach ($mover_listings as $mover_list): ?>

									<a href="<?php echo base_url(); ?>listing/mover/step1/<?php echo $mover_list['unique_id']; ?>" class="btn btn-primary btn-xs pull-right" style="color:white;">Edit</a>

									<div class="property-item booking-item property-archive col-lg-12 col-md-6 col-sm-6 no-padding">
										<div class="row">
											<div class="col-lg-5">
												<a href="<?php echo base_url(); ?>details/mover/<?php echo $mover_list['unique_id'].'/'.dorage_url_title($mover_list['title']); ?>" class="property-image listing-property-img">
													<img src="<?php echo base_url(); ?>assets/storage_images/<?php echo get_list_image($mover_list['id']); ?>" alt="Post list 1">
												</a>
												<!-- <a href="#" class="btn-compare" title="Add to favourite"><i class="fa fa-heart"></i></a> -->
											</div>
											<div class="col-lg-7">

												<div class="property-content listing-content">
													<?php if($mover_list['status'] == 0): ?>
														<h5 class="label-warning text-center" style="color: white; padding: 5px 0px;"> Your storage space is under review. </h5>
													<?php endif; ?>
													<h3 class="property-title">

														<a href="<?php echo base_url(); ?>details/mover/<?php echo $mover_list['unique_id'].'/'.dorage_url_title($mover_list['title']); ?>" class="pull-left"><?php echo $mover_list['title']; ?></a>

													</h3>
													
													<div class="row">

														<?php if(get_meta_value('mover_help' , @$mover_list['id']) == 0){?>

														<div class="col-md-6 text-center">
															<img src="<?php echo base_url(); ?>assets/images/worker-loading-boxes.png"> &nbsp;Loading
														</div>


														<?php } elseif(get_meta_value('mover_help' , @$mover_list['id'])  == 1){?>

														<div class="col-md-6">
															<img src="<?php echo base_url(); ?>assets/images/moving-truck.png"> &nbsp;Moving
														</div>

														<?php } else { ?>

														<div class="col-md-6 text-center">
															<img src="<?php echo base_url(); ?>assets/images/worker-loading-boxes.png"> &nbsp;Loading
														</div>

														<div class="col-md-6">
															<img src="<?php echo base_url(); ?>assets/images/moving-truck.png"> &nbsp;Moving
														</div>

														<?php } ?>

													</div> <br>
													
													<div class="property-address">
														<?php echo get_meta_value('place' , @$mover_list['id']);  ?>
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
													<p class="property-description">
														<?php echo $list['description']; ?>
													</p>

												</div>
											</div>
										</div>
									</div>


								<?php endforeach; ?>


							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>		
</section>


<div class="modal fade login-popup centered-modal" id="priceModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close close-login" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Set Price and Publish</h4>
			</div>

			<div class="modal-body">
				<form id="set_price_form" action="" method="post" novalidate>
					<p>Price</p>
					<div class="input-group" style="width:100%;">
						<span><i class="fa fa-dollar mail-icon"></i></span>
						<input type="hidden" name="unique_id" id="price_unique_id">
						<input type="text" class="form-control" id="price" name="price" placeholder="">
					</div>
				</form>
			</div>
			<div class="modal-footer text-center">
				<button type="button" id="set_now_price" class="btn next-btn pull-right">Publish</button>
			</div>

		</div>
	</div>
</div>

<?php $this->load->view('common/footer'); ?>

<script type="text/javascript">

	$('body').on('click' , '.set_price_publish' , function() {

		var unique_id = $(this).attr('data-id');

		$('#price_unique_id').val(unique_id);

		$('#priceModal').modal('show');

	});


	$('body').on('click' , '#set_now_price' , function() {

		var values = $('#set_price_form').serialize();

		if($('#price').val() == ''){
			$.gritter.add({
				title: 'Error!',
				sticky: false,
				time: '5000',
				before_open: function () {
					if ($('.gritter-item-wrapper').length >= 3)
					{
						return false;
					}
				},
				text: "Price is required.",
				class_name: 'gritter-error'
			});
			return false;
		}

		$.ajax({
			url: '<?php echo base_url(); ?>user/set_price_publish',
			type: 'post',
			data: values,
			dataType: 'json',
			success: function (status) {

				if (status.msg == 'success') {

					$.gritter.add({
						title: 'Success!',
						sticky: false,
						time: '5000',
						before_open: function () {
							if ($('.gritter-item-wrapper').length >= 3)
							{
								return false;
							}
						},
						text: status.response,
						class_name: 'gritter-info'
					});

					$('#priceModal').modal('hide');

				} else if (status.msg == 'error') {
					$.gritter.add({
						title: 'Error!',
						sticky: false,
						time: '5000',
						before_open: function () {
							if ($('.gritter-item-wrapper').length >= 3)
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

	});

</script>