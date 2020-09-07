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

				<div class="col-md-9 account-setting-tab">
					<div class="panel with-nav-tabs panel-default">
						<div class="panel-heading">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#tab1default" data-toggle="tab">Change Password</a></li>
								<li><a href="#tab2default" data-toggle="tab"> Email Preferences</a></li>
								<li><a href="#tab3default" data-toggle="tab">Delete Account </a></li>
							</ul>
						</div>

						<div class="panel-body">
							<div class="tab-content">
								<div class="tab-pane fade in active" id="tab1default">
									<div class="row">

										<div class="col-md-8 col-md-offset-2">

											<h3 class="dark-sky">Reset your password</h3>
											<hr>
											<span class="remb">Use the form below to change your password.</span>
											<form id="change_password_form" method="post" action="">

												<div class="row">

													<div class="col-md-12">
														<div class="form-group">
															<input class="form-control" name="old_password" placeholder="Old password" type="password">
														</div>
													</div>

													<div class="col-md-12">
														<div class="form-group">
															<input class="form-control" name="password" placeholder="New password" type="password">
														</div>
													</div>

													<div class="col-md-12">
														<div class="form-group">
															<input class="form-control" name="c_password" placeholder="Confirm password" type="password">
														</div>
													</div>

													<div class="col-md-12">
														<div class="form-group">
															<button type="button" id="submit" class="btn btn-block cont-btn submit">Reset password</button>
														</div>
													</div>

												</div>
											</form>
										</div>
									</div>
								</div>


								<div class="tab-pane fade" id="tab2default">	
									<div class="col-md-8 col-md-offset-2">
										<div class="panel panel-inner">
											<div class="panel-heading">Edit Email</div>
											<div class="panel-body">
												<p>Email Alerts</p>
												<div class="form-check">
													<label>
														<input <?php echo ($user_detail['email_alert'] == "Y")?"checked":""; ?> type="radio" name="alert" value="Y" class="alert"> <span class="label-text">On</span>
													</label>
												</div>

												<div class="form-check">
													<label>
														<input <?php echo ($user_detail['email_alert'] == "N")?"checked":""; ?> type="radio" name="alert" value="N" class="alert"> <span class="label-text">Off</span>
													</label>
												</div>
												<div class="form-check">
													<button type="button" class="btn back-btn cont-btn btn-block updateEmailAlert">Update</button>
												</div>
												<hr>

												<div class="row">
													<div class="col-md-3 col-sm-3 col-xs-3">
														<p style="margin-bottom: 4.5px;">Email</p>
													</div>
													<div class="col-md-9 col-sm-9 col-xs-9 text-right">
														<p style="margin-bottom: 4.5px;"><?php echo $user_detail['email']; ?></p>
													</div>
												</div>		

												<div class="row">
													<div class="col-md-6 col-sm-6 col-xs-6">
														<p>Phone number</p>
													</div>
													<div class="col-md-6 col-sm-6 col-xs-6 text-right">
														<p><?php echo $user_detail['phone']; ?></p>
														<label class="label label-success"><a href="<?php echo base_url(); ?>user/edit_profile" style="color:#fff; padding:4px 8px; font-size: 12px"> Edit </a></label>
													</div>
												</div>	
											</div>
										</div>
									</div>


								</div>

								<div class="tab-pane fade" id="tab3default">	<div class="col-md-8 col-md-offset-2">

									<h3 class="dark-sky">Delete your Account</h3>
									<hr>
									<span class="remb">
										<p><b>
											PLEASE NOTE, DELETING YOUR ACCOUNT IS PERMANENT AND CANNOT BE UNDONE
										</b>
										</p>
										<p>
											To delete your account and all of your listings, click Delete Now. As stated above, all of your profile details and listings will be permanently deleted from our database, and cannot be undone.											
										</p>
									</span>
									<form id="change_password_form" method="post" action="">
										<div class="row">
											<div class="col-md-12 padd-top">
												<div class="form-group">
													<button type="button" class="btn btn-block cont-btn deleteAccount">Delete Now</button>
												</div>
											</div>
										</div>
									</form>
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
<script src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js"	type="text/javascript"></script>
<script type="text/javascript">

	$(document).on('click','.updateEmailAlert', function(){
		var btn = $(this);
		$(btn).button('loading');
		var value = $("input[name=alert][type=radio]:checked").val();
		$.ajax({
			url:'<?php echo base_url(); ?>user/updateEmailAlert',
			type:'post',
			data:"value="+value,
			dataType:"json",
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
					// location.reload(true);
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
				}
				$(btn).button('reset');
			}
		});
	});
	$(document).on('click','.deleteAccount', function(){
		var btn = $(this);
		$.confirm({
			title: 'Delete Account!',
			content: 'Are you sure? You won\'t be able to undo this.',
			buttons: {
				cancel: function () {
				},
				Yes:{
					text: 'Delete',
					btnClass: 'btn-red',
					action: function(){
						$.ajax({
							url:'<?php echo base_url(); ?>user/deleteAccount',
							type:'post',
							dataType:"json",
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
									
									setTimeout(function(){ 
										location.reload(true);
									 }, 15000);
									
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
								}
							}
						});
					}
				}
			}
		});
	});

	$('#submit').click(function(e){

		var btn = $(this);
		$(btn).button('loading');
		var value = $("#change_password_form").serialize();
		$.ajax({
			url:'<?php echo base_url(); ?>user/update_password',
			type:'post',
			data:value,
			dataType:'json',
			success:function(status){
				console.log(status);
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
					$("#change_password_form")[0].reset();
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
				}
				$(btn).button('reset');
			}
		});
	});

</script>
</html>