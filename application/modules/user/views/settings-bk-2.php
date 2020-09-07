<?php $this->load->view('common/header'); ?>

<!-- Edit Profile -->

<section class="panel-bg profile_pg">
	<div class="container">
		<div class="row">

			<?php $this->load->view('common/dashboard_sidebar'); ?>


			<div class="col-md-9 account-setting-tab">
				<div class="panel with-nav-tabs panel-default">
					<div class="panel-heading">
						<ul class="nav nav-tabs">
							<li class="active"><a href="#tab1default" data-toggle="tab">Change Notification </a></li>
							<li><a href="#tab2default" data-toggle="tab"> Change Email Associated</a></li>
							<li><a href="#tab4default" data-toggle="tab"> Change Password</a></li>
						</ul>
					</div>

					<div class="panel-body">
						<div class="tab-content">
							<div class="tab-pane fade in active" id="tab1default">
								<div class="row padd-top">
									


									<div class="col-md-8 col-md-offset-2">
										<form method="">
											<div class="panel panel-inner">
												<div class="panel-heading">Notification</div>
												<div class="panel-body">
													<p>Receive messages from hosts and guests, including booking requests.</p>
													<hr>
													<div class="form-check">
														<label>
															<input type="checkbox" name="check"> <span class="label-text"> </span><span class="remb"> Email</span>
														</label>
													</div>

													<div class="form-check">
														<label>
															<input type="checkbox" name="check"> <span class="label-text"> </span><span class="remb"> Text messages</span>
														</label>
													</div>
												</div>

											</div>

										</form>
										<button type="submit" class="btn cont-btn submit btn-block">Save</button>
										<br>
									</div>
								</div>
							</div>


							<div class="tab-pane fade" id="tab2default">	
								<div class="col-md-8 col-md-offset-2">
									<div class="panel panel-inner">
										<div class="panel-heading">Edit Email</div>
										<div class="panel-body">
											<p>This information can be edited from your profile page. <a href="edit-profile.php">Edit Profile</a></p>
											<hr>

											<div class="row">
												<div class="col-md-3 col-sm-3 col-xs-3">
													<p style="margin-bottom: 4.5px;">Email</p>
												</div>
												<div class="col-md-9 col-sm-9 col-xs-9 text-right">
													<p style="margin-bottom: 4.5px;"">Exapmle@gmail.com</p>
												</div>
											</div>		

											<div class="row">
												<div class="col-md-6 col-sm-6 col-xs-6">
													<p>Phone number</p>
												</div>
												<div class="col-md-6 col-sm-6 col-xs-6 text-right">
													<p>123456</p>
													<label class="label label-success"><a href="edit-profile.php" style="color:#fff; padding:4px 8px; font-size: 12px"> Edit </a></label>
												</div>
											</div>	
										</div>
									</div>
								</div>
								

							</div>

							<div class="tab-pane fade" id="tab3default">	

							</div>

							<div class="tab-pane fade" id="tab4default">	
								<div class="col-md-8 col-md-offset-2">

									<h3 class="dark-sky">Change Password</h3>
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
													<button type="button" id="submit" class="btn btn-block cont-btn">Change</button>
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
<script src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js"
	type="text/javascript"></script>
	<script type="text/javascript">

		$('#submit').click(function(e){

			var btn = $(this);
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
				}
			});
		});

	</script>