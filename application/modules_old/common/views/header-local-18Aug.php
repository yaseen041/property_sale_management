<header id="header">
    <!-- Main Menu Header -->
    <nav class="navbar navbar-default">
        <div class="container">
            <!-- Navbar Brand -->
            <div class="navbar-header">
                <a href="<?php echo base_url() ?>" id="navbar-brand main" class="navbar-brand"><img src="<?php echo base_url() ?>assets/images/header-logo-default.png" alt="emc2 Property"></a>
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
                    <button  class="btn sign-btn pull-right btn-primary" data-toggle="modal" data-target="#signModal"><i class="fa fa-user"></i>&nbsp;Sign Up</button>
                    <button class="btn pull-right signin-btn btn-primary" data-toggle="modal" data-target="#loginModal"><i class="fa fa-sign-in"></i>&nbsp;Sign In</button>
                </div>
                <ul class="nav navbar-nav pull-right">
                    <!-- Dropdown Menu -->
                    <li class="dropdown active">
                        <a href="property-search.php">For Sale</a>
                    </li>
                    <!-- Dropdown Menu -->
                    <li class="dropdown">
                        <a href="property-search.php">Rent</a>
                    </li>
                    <!-- Dropdown Menu -->
                    <li class="dropdown">
                        <a href="property-search.php">Student</a>
                    </li>
                    <li class="dropdown">
                        <a href="<?php echo base_url(); ?>about_us">About Us</a>
                    </li>
                    <li class="dropdown">
                        <a href="<?php echo base_url(); ?>contact_us">Contact Us</a>
                    </li>
                    <li class="dropdown user-dropdown" style="margin-top: -5px;">
                        <a href="#" style="background: none;"><img class="usr" src="<?php echo base_url() ?>assets/images/user.png" alt="user"></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo base_url() ?>dashboard"><i class="fa fa-tachometer"></i> Dashboard</a></li>
                            <li><a href="<?php echo base_url() ?>listing/storage/step1"><i class="fa fa-list"></i> List your property</a></li>
                            <li><a href="#"><i class="fa fa-power-off"></i> Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </nav>
</header>