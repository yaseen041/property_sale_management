<!DOCTYPE html>
<html lang="en"> 
<?php $this->load->view('common/head'); ?>
<body class="header-1 page-header-1">
	<!-- ====== BEGIN HEADER ====== -->
	<?php $this->load->view('common/header'); ?>
	<!-- ====== END HEADER ====== -->

	<section class="page-header">
		<div class="container">
			<h1 class="page-header-title">Contact</h1>
			<ul class="breadcrumb">
				<li><a href="<?php echo base_url(); ?>">Home</a></li>
				<li class="active">Contact</li>
			</ul>
		</div>
	</section>

	<!-- ====== CONTACT PAGE CONTENT ====== -->
	<section class="page-section" style="margin-top: 40px;">
		<div class="container">
			<div id="content">
				<!-- Messages Form Section -->
				<section class="section-row padd-top">
					<div class="panel-box">
						<div class="panel-header">
							<h3 class="panel-title">Leave Message</h3>
						</div>
						<div class="panel-body">
							<form action="" method="post" id="contactForm">
								<p>For any queries regarding anything on this website which you are unsure about or require help with, please fill in the below form or send an email to <a href="mailto:info@emc2property.co.uk">info@emc2property.co.uk</a> and we will endeavour to respond at our earliest opportunity.</p>
								<div class="row">
									<div class="form-group col-md-6">
										<input type="text" class="form-control" placeholder="Name" name="name">
									</div>
									<div class="form-group col-md-6">
										<input type="email" class="form-control" placeholder="Email" name="email">
									</div>
								</div>
								<div class="row">
									<div class="form-group col-md-12">
										<input type="text" class="form-control" placeholder="Subject" name="subject">
									</div>
								</div>
								<div class="form-group">
									<textarea name="message" id="messages" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
								</div>
								<div class="form-group">
									<input type="button" class="btn-submit btn-primary btn submit" value="Submit">
								</div>
							</form>
						</div>
					</div>
				</section>
			</div>
		</div>
	</section>

	<?php $this->load->view('common/footer'); ?>
	<?php $this->load->view('common/scripts'); ?>
</body>
<script type="text/javascript">
	$(document).on('click','.submit', function(){
		var btn = $(this);
		$(btn).button('loading');
		var form = $('#contactForm').serialize();
		$.ajax({
			url:"<?php echo base_url(); ?>contact_us/sendMail",
			data:form,
			type:"post",
			dataType:"json",
			success: function(status){
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
					$('#contactForm')[0].reset();
				}else if(status.msg == 'error'){
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
		})
	});
</script>
</html>
