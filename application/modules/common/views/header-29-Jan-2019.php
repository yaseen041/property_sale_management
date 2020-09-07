
<div id="mySidenav" class="sidenav">
	<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
	<!-- <a href="<?php echo base_url(); ?>about_us">About Us</a> -->
	<a href="<?php echo base_url() ?>listing/search_listing?purpose=sale">For Sale</a>
	<a href="<?php echo base_url() ?>listing/search_listing?purpose=rent">To Rent</a>
	<a href="<?php echo base_url()?>listing/search_listing?purpose=student">Student</a>
	<a href="<?php echo base_url(); ?>news">News</a>
	<a href="<?php echo base_url(); ?>contact_us">Contact Us</a>
        
        <?php if (!get_session('user_logged_in')) { ?>
            <a class="mb-signin-btn" href="<?php echo base_url(); ?>login"><i class="fa fa-sign-in"></i> Sign In</a>
            <a class="mb-signup-btn" href="<?php echo base_url(); ?>register"><i class="fa fa-user"></i> Sign Up</a>
        <?php }else{ ?>
                <a href="<?php echo base_url(); ?>listing/step1" class="mb-signup-btn"><i class="fa fa-plus"></i>&nbsp;Add New Listing</a>
                <a href="<?php echo base_url(); ?>logout" class="mb-signin-btn"><i class="fa fa-sign-out"></i>&nbsp;Logout</a>
        <?php } ?>

</div>

<header id="header">
	<!-- Main Menu Header -->
	<nav class="navbar navbar-default">
		<div class="container">
			<!-- Navbar Brand -->
			<div class="navbar-header">
				<a href="<?php echo base_url(); ?>" id="navbar-brand main" class="navbar-brand"><img src="<?php echo base_url(); ?>assets/images/header-logo-default.png" alt="emc2 Property"></a>

				<button type="button" onclick="openNav()" class="open-nav navbar-toggle collapsed" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>

			</div>
			<!-- Navbar Menu -->
			<nav id="navbar" class="navbar navbar-right navbar-collapse collapse">
				<div class="col-md-12 no-padding">
					<?php if (!get_session('user_logged_in')) { ?>
						<button  class="btn sign-btn pull-right btn-primary" data-toggle="modal" data-target="#signModal"><i class="fa fa-user"></i>&nbsp;Sign Up</button>
						<button class="btn pull-right signin-btn btn-primary" data-toggle="modal" data-target="#loginModal"><i class="fa fa-sign-in"></i>&nbsp;Sign In</button>
					<?php }else{ ?>
						<a href="<?php echo base_url(); ?>logout" class="btn sign-btn pull-right btn-primary"><i class="fa fa-sign-out"></i>&nbsp;Logout</a>
						<a href="<?php echo base_url(); ?>listing/step1" class="btn pull-right signin-btn btn-primary"><i class="fa fa-plus"></i>&nbsp;Add New Listing</a>
					<?php } ?>
				</div>

				<ul class="nav navbar-nav pull-right">

					<!-- Dropdown Menu -->
					<li class="dropdown <?php echo (@$_GET['purpose'] == 'sale')? "active" : ""; ?>">
						<a href="<?php echo base_url() ?>listing/search_listing?purpose=sale">For Sale</a>
					</li>

					<!-- Dropdown Menu -->
					<li class="dropdown <?php echo (@$_GET['purpose'] == 'rent')? "active" : ""; ?>">
						<a href="<?php echo base_url() ?>listing/search_listing?purpose=rent">To Rent</a>
					</li>

					<!-- Dropdown Menu -->
					<li class="dropdown <?php echo (@$_GET['purpose'] == 'student')? "active" : ""; ?>">
						<a href="<?php echo base_url()?>listing/search_listing?purpose=student">Student</a>
					</li>

					<!-- <li class="dropdown">
						<a href="<?php echo base_url(); ?>about_us">About Us</a>
					</li> -->
					<li class="dropdown">
						<a href="<?php echo base_url(); ?>news">News</a>
					</li>
					<li class="dropdown">
						<a href="<?php echo base_url(); ?>contact_us">Contact Us</a>
					</li>
					<?php if (get_session('user_logged_in')) { ?>
						<li class="dropdown user-dropdown" style="margin-top: -5px;">
							<?php $image = singleRow('users', '*','id = '.get_session('user_id'));
							if ($image['profile_dp'] != "user.png") {
								$src = base_url()."uploads/images/".$image['profile_dp'];
							}else{
								$src = base_url()."assets/images/user.png";
							} ?>
							<a href="javascript:void(0)" style="background: none;">
								<img class="usr" src="<?php echo $src; ?>" alt="user">
							</a>
							<ul class="dropdown-menu">
								<li><a href="<?php echo base_url(); ?>user/dashboard"><i class="fa fa-tachometer"></i> Dashboard</a></li>
								<li><a href="<?php echo base_url() ?>user/edit_profile"><i class="fa fa-user"></i> My Profile</a></li>
								<li><a href="<?php echo base_url() ?>listing/step1"><i class="fa fa-plus"></i> Add New Listing</a></li>
								<li><a href="<?php echo base_url() ?>user/listings"><i class="fa fa-list"></i> Listings</a></li>
								<li><a href="<?php echo base_url(); ?>logout"><i class="fa fa-power-off"></i> Logout</a></li>
							</ul>
						</li>
					<?php } ?>
				</ul>
			</nav>
		</div>
	</nav>
</header>