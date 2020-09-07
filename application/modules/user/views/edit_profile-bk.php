<?php $this->load->view('common/header'); ?>
<!-- Edit Profile -->

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

					<div class="panel-body">
						<div class="tab-content">
							<div class="tab-pane fade in active" id="tab1default">

								<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12">
										<form id="profile_dp_form">
											<label class="btn-bs-file btn  btn-primary pull-right">
												<img src="<?php echo base_url(); ?>assets/images/photo-camera.png"> Change Profile Picture
												<input type="file" name="profile_dp" id="profile_dp" accept="image/*" />
											</label>
										</form>
									</div>
								</div>

								<form id="update_user" method="post" action="" novalidate>
									<h4 class="dark-sky">Personal Information</h4>
									<hr />
									<div class="row">
										<div class="col-md-6 col-sm-6 col-xs-12">
											<div class="form-group">
												<label>First Name</label>
												<input type="text" class="form-control" placeholder="Enter first name" name="first_name" value="<?php echo $user_detail['first_name']; ?>" required>
											</div>	
										</div>

										<div class="col-md-6 col-sm-6 col-xs-12">
											<div class="form-group">
												<label>Last Name</label>
												<input type="text" class="form-control" name="last_name" placeholder="Enter last name" value="<?php echo $user_detail['last_name']; ?>" required>
											</div>
										</div>
									</div>


									<div class="row">
										<div class="col-md-6 col-sm-6 col-xs-12">
											<div class="form-group">
												<label>Gender</label>
												<select name="gender" class="form-control" required>
													<option <?php if ($user_detail['gender'] == 'Male') { ?> selected  <?php } ?> value="Male"> Male </option>
													<option <?php if ($user_detail['gender'] == 'Female') { ?> selected  <?php } ?> value="Female"> Female </option>
													<option <?php if ($user_detail['gender'] == 'Other') { ?> selected  <?php } ?> value="Other"> Other </option>
												</select>
											</div>
										</div>

										<div class="col-md-6 col-sm-6 col-xs-12">
											<div class="form-group form-group--date">
												<label>Date of Birth</label>
												<input name="dob" class="date_picker form-control" placeholder="Enter birth date" value="<?php echo $user_detail['dob']; ?>" required>
											</div>
										</div>
									</div>	
									<br/>
									<h4 class="dark-sky">Contact Information</h4>
									<hr/>	
									<div class="row">
										<div class="col-md-6 col-sm-6 col-xs-12">
											<div class="form-group">
												<label>Email</label>
												<input type="email" class="form-control" name="email" value="<?php echo $user_detail['email']; ?>" placeholder="Enter email" readonly>
											</div>	
										</div>
										<div class="col-md-6 col-sm-6 col-xs-12">
											<div class="form-group">
												<label>Phone Number</label>
												<input type="text" class="form-control" placeholder="Enter phone number" name="phone" value="<?php echo $user_detail['phone']; ?>" required>
											</div>	
										</div>
									</div>  	

									<div class="row">
										<div class="col-md-6 col-sm-6 col-xs-12">		
											<div class="form-group">
												<label>Preferred Language</label>
												<select class="form-control" name="language" required>
													<option <?php if ($user_detail['prefer_language'] == 'id') { ?> selected  <?php } ?> value="id">Bahasa Indonesia</option>
													<option <?php if ($user_detail['prefer_language'] == 'ms') { ?> selected  <?php } ?> value="ms">Bahasa Melayu</option>
													<option <?php if ($user_detail['prefer_language'] == 'ca') { ?> selected  <?php } ?> value="ca">Català</option>
													<option <?php if ($user_detail['prefer_language'] == 'da') { ?> selected  <?php } ?> value="da">Dansk</option>
													<option <?php if ($user_detail['prefer_language'] == 'de') { ?> selected  <?php } ?> value="de">Deutsch</option>
													<option <?php if ($user_detail['prefer_language'] == 'en') { ?> selected  <?php } ?> value="en" selected="selected">English</option>
													<option <?php if ($user_detail['prefer_language'] == 'es') { ?> selected  <?php } ?> value="es">Español</option>
													<option <?php if ($user_detail['prefer_language'] == 'el') { ?> selected  <?php } ?> value="el">Eλληνικά</option>
													<option <?php if ($user_detail['prefer_language'] == 'fr') { ?> selected  <?php } ?> value="fr">Français</option>
													<option <?php if ($user_detail['prefer_language'] == 'hr') { ?> selected  <?php } ?> value="hr">Hrvatski</option>
													<option <?php if ($user_detail['prefer_language'] == 'it') { ?> selected  <?php } ?> value="it">Italiano</option>
													<option <?php if ($user_detail['prefer_language'] == 'hu') { ?> selected  <?php } ?> value="hu">Magyar</option>
													<option <?php if ($user_detail['prefer_language'] == 'nl') { ?> selected  <?php } ?> value="nl">Nederlands</option>
													<option <?php if ($user_detail['prefer_language'] == 'no') { ?> selected  <?php } ?> value="no">Norsk</option>
													<option <?php if ($user_detail['prefer_language'] == 'pl') { ?> selected  <?php } ?> value="pl">Polski</option>
													<option <?php if ($user_detail['prefer_language'] == 'pt') { ?> selected  <?php } ?> value="pt">Português</option>
													<option <?php if ($user_detail['prefer_language'] == 'fi') { ?> selected  <?php } ?> value="fi">Suomi</option>
													<option <?php if ($user_detail['prefer_language'] == 'sv') { ?> selected  <?php } ?> value="sv">Svenska</option>
													<option <?php if ($user_detail['prefer_language'] == 'tr') { ?> selected  <?php } ?> value="tr">Türkçe</option>
													<option <?php if ($user_detail['prefer_language'] == 'is') { ?> selected  <?php } ?> value="is">Íslenska</option>
													<option <?php if ($user_detail['prefer_language'] == 'cs') { ?> selected  <?php } ?> value="cs">Čeština</option>
													<option <?php if ($user_detail['prefer_language'] == 'ru') { ?> selected  <?php } ?> value="ru">Русский</option>
													<option <?php if ($user_detail['prefer_language'] == 'th') { ?> selected  <?php } ?> value="th">ภาษาไทย</option>
													<option <?php if ($user_detail['prefer_language'] == 'zh') { ?> selected  <?php } ?> value="zh">中文 (简体)</option>
													<option <?php if ($user_detail['prefer_language'] == 'zh-TW') { ?> selected  <?php } ?> value="zh-TW">中文 (繁體)</option>
													<option <?php if ($user_detail['prefer_language'] == 'ja') { ?> selected  <?php } ?> value="ja">日本語</option>
													<option <?php if ($user_detail['prefer_language'] == 'ko') { ?> selected  <?php } ?> value="ko">한국어</option>
												</select>
											</div>
										</div>

										<div class="col-md-6 col-sm-6 col-xs-12">		
											<div class="form-group">
												<label>Preferred Currency</label>
												<select class="form-control" name="currency" required>

													<option <?php if ($user_detail['prefer_currency'] == 'ARS') { ?> selected  <?php } ?> value="ARS">Argentine peso</option>
													<option <?php if ($user_detail['prefer_currency'] == 'AUD') { ?> selected  <?php } ?> value="AUD">Australian dollar</option>
													<option <?php if ($user_detail['prefer_currency'] == 'BRL') { ?> selected  <?php } ?> value="BRL">Brazilian real</option>
													<option <?php if ($user_detail['prefer_currency'] == 'BGN') { ?> selected  <?php } ?> value="BGN">Bulgarian lev</option>
													<option <?php if ($user_detail['prefer_currency'] == 'CAD') { ?> selected  <?php } ?> value="CAD">Canadian dollar</option>
													<option <?php if ($user_detail['prefer_currency'] == 'CLP') { ?> selected  <?php } ?> value="CLP">Chilean peso</option>
													<option <?php if ($user_detail['prefer_currency'] == 'CNY') { ?> selected  <?php } ?> value="CNY">Chinese yuan</option>
													<option <?php if ($user_detail['prefer_currency'] == 'COP') { ?> selected  <?php } ?> value="COP">Colombian peso</option>
													<option <?php if ($user_detail['prefer_currency'] == 'CRC') { ?> selected  <?php } ?> value="CRC">Costa Rican colon</option>
													<option <?php if ($user_detail['prefer_currency'] == 'HRK') { ?> selected  <?php } ?> value="HRK">Croatian kuna</option>
													<option <?php if ($user_detail['prefer_currency'] == 'CZK') { ?> selected  <?php } ?> value="CZK">Czech koruna</option>
													<option <?php if ($user_detail['prefer_currency'] == 'DKK') { ?> selected  <?php } ?> value="DKK">Danish krone</option>
													<option <?php if ($user_detail['prefer_currency'] == 'AED') { ?> selected  <?php } ?> value="AED">Emirati dirham</option>
													<option <?php if ($user_detail['prefer_currency'] == 'EUR') { ?> selected  <?php } ?> value="EUR">Euro</option>
													<option <?php if ($user_detail['prefer_currency'] == 'HKD') { ?> selected  <?php } ?> value="HKD">Hong Kong dollar</option>
													<option <?php if ($user_detail['prefer_currency'] == 'HUF') { ?> selected  <?php } ?> value="HUF">Hungarian forint</option>
													<option <?php if ($user_detail['prefer_currency'] == 'INR') { ?> selected  <?php } ?> value="INR">Indian rupee</option>
													<option <?php if ($user_detail['prefer_currency'] == 'ILS') { ?> selected  <?php } ?> value="ILS">Israeli new shekel</option>
													<option <?php if ($user_detail['prefer_currency'] == 'JPY') { ?> selected  <?php } ?> value="JPY">Japanese yen</option>
													<option <?php if ($user_detail['prefer_currency'] == 'MYR') { ?> selected  <?php } ?> value="MYR">Malaysian ringgit</option>
													<option <?php if ($user_detail['prefer_currency'] == 'MXN') { ?> selected  <?php } ?> value="MXN">Mexican peso</option>
													<option <?php if ($user_detail['prefer_currency'] == 'MAD') { ?> selected  <?php } ?> value="MAD">Moroccan dirham</option>
													<option <?php if ($user_detail['prefer_currency'] == 'TWD') { ?> selected  <?php } ?> value="TWD">New Taiwan dollar</option>
													<option <?php if ($user_detail['prefer_currency'] == 'NZD') { ?> selected  <?php } ?> value="NZD">New Zealand dollar</option>
													<option <?php if ($user_detail['prefer_currency'] == 'NOK') { ?> selected  <?php } ?> value="NOK">Norwegian krone</option>
													<option <?php if ($user_detail['prefer_currency'] == 'PEN') { ?> selected  <?php } ?> value="PEN">Peruvian sol</option>
													<option <?php if ($user_detail['prefer_currency'] == 'PHP') { ?> selected  <?php } ?> value="PHP">Philippine peso</option>
													<option <?php if ($user_detail['prefer_currency'] == 'PLN') { ?> selected  <?php } ?> value="PLN">Polish zloty</option>
													<option <?php if ($user_detail['prefer_currency'] == 'GBP') { ?> selected  <?php } ?> value="GBP">Pound sterling</option>
													<option <?php if ($user_detail['prefer_currency'] == 'RON') { ?> selected  <?php } ?> value="RON">Romanian leu</option>
													<option <?php if ($user_detail['prefer_currency'] == 'RUB') { ?> selected  <?php } ?> value="RUB">Russian ruble</option>
													<option <?php if ($user_detail['prefer_currency'] == 'SAR') { ?> selected  <?php } ?> value="SAR">Saudi Arabian riyal</option>
													<option <?php if ($user_detail['prefer_currency'] == 'SGD') { ?> selected  <?php } ?> value="SGD">Singapore dollar</option>
													<option <?php if ($user_detail['prefer_currency'] == 'ZAR') { ?> selected  <?php } ?> value="ZAR">South African rand</option>
													<option <?php if ($user_detail['prefer_currency'] == 'KRW') { ?> selected  <?php } ?> value="KRW">South Korean won</option>
													<option <?php if ($user_detail['prefer_currency'] == 'SEK') { ?> selected  <?php } ?> value="SEK">Swedish krona</option>
													<option <?php if ($user_detail['prefer_currency'] == 'CHF') { ?> selected  <?php } ?> value="CHF">Swiss franc</option>
													<option <?php if ($user_detail['prefer_currency'] == 'THB') { ?> selected  <?php } ?> value="THB">Thai baht</option>
													<option <?php if ($user_detail['prefer_currency'] == 'TRY') { ?> selected  <?php } ?> value="TRY">Turkish lira</option>
													<option <?php if ($user_detail['prefer_currency'] == 'USD') { ?> selected  <?php } ?> value="USD" selected="selected">United States dollar</option>
													<option <?php if ($user_detail['prefer_currency'] == 'UYU') { ?> selected  <?php } ?> value="UYU">Uruguayan peso</option>
												</select>
											</div>
										</div>
									</div>


									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label>Address</label>
												<input type="text" class="form-control" name="address" id="property_loc" placeholder="Lahore, Punjab, Pakistan" value="<?php echo $user_detail['address']; ?>" required>
											</div>
										</div>
									</div>  

									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label>Describe Yourself</label>
												<textarea class="form-control" rows="5" placeholder="Describe yourself" name="about"><?php echo $user_detail['about']; ?></textarea>
											</div>
										</div>

									</div>

									<div class="form-group text-left">
										<button type="button" class="btn back-btn cont-btn submit">Submit</button>
									</div> 
								</form>
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
<script src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js"
	type="text/javascript"></script>

	<script type="text/javascript">

		$('.submit').click(function(e){
			var btn = $(this);

			$(btn).button('loading');
			var value = $("#update_user").serialize();

			$.ajax({
				url:'<?php echo base_url(); ?>user/update_user',
				type:'post',
				data:value,
				dataType:'json',
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
							// location.reload();
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