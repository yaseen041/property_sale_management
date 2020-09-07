<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8" />
    <title> EMC2 Property - Administrator <?php echo isset($title) ? '| '. $title : ''; ?> </title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link rel="shortcut icon" type='image/x-icon' href="<?php echo base_url(); ?>assets/images/favicon.png">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="<?php echo base_url();?>assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
    <link href="<?php echo base_url();?>assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
    <!-- datepicker -->
    <link href="<?php echo base_url();?>assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/global/plugins/bootstrap-datepicker/css/bootstrap-datetimepicker.css" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="<?php echo base_url();?>assets/layouts/layout/css/layout.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/layouts/layout/css/themes/default.min.css" rel="stylesheet" type="text/css" id="style_color" />
    <link href="<?php echo base_url();?>assets/layouts/layout/css/custom.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/css/page-style.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/pages/css/style.css" rel="stylesheet" type="text/css" />
    <!-- <link href="<?php echo base_url();?>assets/css/custom.css" rel="stylesheet" type="text/css" /> -->
    <link href="<?php echo base_url();?>assets/css/admin_style.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/css/sweetalert.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/css/colorbox.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/gritter.css">
    <!-- END THEME LAYOUT STYLES -->
    <link rel="shortcut icon" href="favicon.ico" /> 
    <!-- ck editor -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
    <!-- <script src="//cdn.ckeditor.com/4.7.1/full/ckeditor.js"></script> -->
    <link href="<?php echo base_url();?>assets/apps/css/todo-2.min.css" rel="stylesheet" type="text/css" />
    <!-- datatable -->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/global/plugins/datatables/datatables.min.css" /><!-- 
		<link rel="stylesheet" href="global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" /> -->
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.1.1/dropzone.css">
		<!-- END HEAD -->

	</head>
	
	
	
    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
        <!-- BEGIN HEADER -->
        <div class="page-header navbar navbar-fixed-top">
            <!-- BEGIN HEADER INNER -->
            <div class="page-header-inner ">
                <!-- BEGIN LOGO -->
                <div class="page-logo">
                    <a href="<?php echo base_url() ?>admin">
                        <img src="<?php echo base_url() ?>assets/images/logo-red-and-white.png" width="120px" style="margin-top: 5px">
                    </a>
                    <div class="menu-toggler sidebar-toggler">
                        <span></span>
                    </div>
                </div>
                <!-- END LOGO -->
                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                    <span></span>
                </a>
                <!-- END RESPONSIVE MENU TOGGLER -->
                <!-- BEGIN TOP NAVIGATION MENU -->
                <div class="top-menu">
                    <ul class="nav navbar-nav pull-right">
                        <li class="dropdown dropdown-user">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <?php
                                $admins = $this->session->userdata('admins');
                                // $avatar = singleRow('admin_users', '*', 'email = '.$admins['email']);
                                // show($admins);
                                // rlq();
                                ?>
                                <img alt="" class="img-circle" src="<?php echo base_url(); ?>assets/images/user.png" />
                                <span class="username username-hide-on-mobile"> <?php echo $admins['username'] ?> </span>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-default">
                                <li>
                                    <a href="<?php echo base_url() . 'admin/profile'; ?>">
                                        <i class="icon-user"></i> Profile </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url() . 'admin/logout'; ?>">
                                            <i class="icon-key"></i> Log Out </a>
                                        </li>
                                    </ul>
                                </li>
                                <!-- END USER LOGIN DROPDOWN -->
                                <!-- BEGIN QUICK SIDEBAR TOGGLER -->

                            </ul>
                        </div>
                        <!-- END TOP NAVIGATION MENU -->
                    </div>
                    <!-- END HEADER INNER -->
                </div>
                <!-- END HEADER -->	