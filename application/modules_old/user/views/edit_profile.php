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
							<ul class="nav nav-tabs">
								<li><a><i class="fa fa-user-circle"></i> Edit Profile</a></li>
							</ul>
						</div>
						<form method="post" id="update_user">
							<div class="panel-body">
								<div class="tab-content">
									<div class="tab-pane fade in active" id="tab1default">
										<div class="row">
											<div class="col-md-6 col-sm-6 col-xs-6">
												<label class="btn-bs-file btn  btn-primary pull-left">
													<img src="<?php echo base_url(); ?>assets/images/photo-camera.png"> Change Profile Picture
													<input type="file" name="profile_image" id="profile_image" accept=".png,.jpg,.jpeg"/>
												</label>
											</div>
											<div class="col-md-6 col-sm-6 col-xs-6 pull-right">
												<img src="<?php echo base_url(); ?>uploads/images/<?php echo $user_detail['profile_dp']; ?>" class="pull-left img-thumbnail" id="profile_image_preview" style="width: 100px !important;height: 100px !important">
											</div>
										</div>

										<div class="row">
											<div class="col-md-12 col-sm-6 col-xs-12">
												<h4 class="dark-sky">Personal Information</h4>
												<hr>	
											</div>

										</div>

										<div class="row">
											<div class="col-md-6 col-sm-6 col-xs-12">
												<div class="form-group">
													<label>First Name</label>
													<input type="text" class="form-control" name="first_name" placeholder="John" value="<?php echo $user_detail['first_name']; ?>">
												</div>	
											</div>

											<div class="col-md-6 col-sm-6 col-xs-12">
												<div class="form-group">
													<label>Last Name</label>
													<input type="text" class="form-control" name="last_name" placeholder="Cena" value="<?php echo $user_detail['last_name']; ?>">
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-md-6 col-sm-6 col-xs-12">
												<div class="form-group">
													<label>Email Address</label>
													<input type="email" disabled="" class="form-control" name="email" placeholder="exapmle@gmail.com" value="<?php echo $user_detail['email']; ?>">
												</div>	
											</div>

											<div class="col-md-6 col-sm-6 col-xs-12">
												<div class="form-group">
													<label>Phone Number</label>
													<input type="text" class="form-control" name="phone" placeholder="+44 7911 123456" value="<?php echo $user_detail['phone']; ?>">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12 col-sm-12 col-xs-12">
												<div class="form-group">
													<label>Describe Yourself</label>
													<textarea rows="5" class="form-control" name="about" placeholder="Enter some detail about you"><?php echo $user_detail['about']; ?></textarea>
												</div>	
											</div>
										</div>

										<br>

										<h4 class="dark-sky">Agency Information</h4>
										<hr>	
										<div class="row">
											<div class="col-md-12 col-sm-12 col-xs-12" style="margin-top: 10px">
												<img src="<?php echo base_url(); ?>uploads/images/<?php echo $user_detail['agency_image']; ?>" class="pull-right img-thumbnail" id="agency_image_preview" style="width: 200px !important;">
											</div>
											<div class="col-md-6 col-sm-6 col-xs-12">
												<div class="form-group">
													<label>Agency Name</label>
													<input type="email" class="form-control" name="agency_name" placeholder="Inspired" value="<?php echo $user_detail['agency_name']; ?>">
												</div>
											</div>

											<div class="col-md-6 col-sm-6 col-xs-12">
												<label>Estate Agent Logo</label>
												<div class="form-group">
													<label class="btn-bs-file btn btn-block btn-primary pull-right">
														<img src="<?php echo base_url(); ?>assets/images/photo-camera.png"> Upload logo
														<input type="file" name="agency_image" id="agency_image" accept=".png,.jpg,.jpeg"/>
													</label>
												</div>

											</div>
										</div>


										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<div class="form-group">
														<label>Estate Agent Website Url</label>
														<input type="url" class="form-control" name="agency_website" placeholder="www.inspired.com" value="<?php echo $user_detail['agency_website']; ?>">
													</div>
												</div>
											</div>
										</div>  	

										<div class="form-group text-left">
											<button type="button" class="btn back-btn cont-btn btn-block submit">Submit</button>
										</div> 
									</div>

								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>		
	</section>
	<!-- Edit Profile End-->
	<?php $this->load->view('common/scripts'); ?>
	<?php $this->load->view('common/footer'); ?>
</body>

<script src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js"	type="text/javascript"></script>
<script type="text/javascript">
	function readURL(input, id) {

		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {
				$('#'+id).attr('src', e.target.result);
			}
			reader.readAsDataURL(input.files[0]);
		}
	}

	$("#profile_image").change(function() {
		readURL(this, 'profile_image_preview');
	});

	$("#agency_image").change(function() {
		readURL(this, 'agency_image_preview');
	});

	$('.submit').click(function(e){
		var btn = $(this);

		$(btn).button('loading');
		var value = new FormData($("#update_user")[0]);
		// var value = $("#update_user").serialize();

		$.ajax({
			url:'<?php echo base_url(); ?>user/update_user',
			type:'post',
			data:value,
			dataType:'json',
			cache: false,
			contentType: false,
			processData: false,
			success:function(status){

				if(status.msg=='success'){
					$.gritter.add({
						title: 'Success!',
						sticky: false,
						time: '5000',
						before_open: function(){
							if($('.gritter-item-wrapper').length >= 3)
							{
								return false;
							}
						},
						text: status.response,
						class_name: 'gritter-info'
					});
					$(btn).button('reset');
					setTimeout(function(){
						location.reload(true);
					}, 1000);
				}

				else if(status.msg == 'error'){
					$.gritter.add({
						title: 'Error!',
						sticky: false,
						time: '5000',
						before_open: function(){
							if($('.gritter-item-wrapper').length >= 3)
							{
								return false;
							}
						},
						text: status.response,
						class_name: 'gritter-error'
					});
					$(btn).button('reset');
				}
			}
		});
	});

</script>


<script>

	$("#profile_dp").on("change", function (e) { 

		var file, img;
		var _URL = window.URL || window.webkitURL;
		var img_valid = true;
		if ((file = this.files[0])) {
			img = new Image();
			img.onload = function () {
                //alert(this.width + "*" + this.height);
                if (this.width > 600 || this.height > 600) {
                	$.gritter.add({
                		title: 'Error!',
                		sticky: false,
                		time: '5000',
                		before_open: function() {
                			if ($('.gritter-item-wrapper').length >= 3) {
                				return false;
                			}
                		},
                		text: "The image you are attempting to upload doesn't fit into the allowed dimensions. Image size must be less than or equal to 600X600. Current image size is "+this.width+"X"+this.height+".",
                		class_name: 'gritter-error'
                	});
                }else{
                	var formData = new FormData($("#profile_dp_form")[0]);
                	$.ajax({
                		url: '<?php echo base_url(); ?>user/update_dp',
                		type: 'POST',
                		data: formData,
                		async: false,
                		cache: false,
                		dataType:'json',
                		contentType: false,
                		enctype: 'multipart/form-data',
                		processData: false,
                		success: function (status) {
                			if (status.msg == 'success') {
                				$.gritter.add({
                					title: 'Success!',
                					sticky: false,
                					time: '5000',
                					before_open: function() {
                						if ($('.gritter-item-wrapper').length >= 3) {
                							return false;
                						}
                					},
                					text: status.response,
                					class_name: 'gritter-info'
                				});
                				setTimeout(function(){ location.reload(); },2000);
                			} else if (status.msg == 'error') {
                				$.gritter.add({
                					title: 'Error!',
                					sticky: false,
                					time: '5000',
                					before_open: function() {
                						if ($('.gritter-item-wrapper').length >= 3) {
                							return false;
                						}
                					},
                					text: status.response,
                					class_name: 'gritter-error'
                				});
                			}
                		}
                	});
                	return false;
                }
            };
            img.src = _URL.createObjectURL(file);
        }

    });
</script>
</html>