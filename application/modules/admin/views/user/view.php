<?php $this->load->view('admin_common/header');?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/pages/css/profile.min.css">
<div class="page-container">
    <?php $this->load->view('admin_common/sidebar');?>
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content" style="background-color: #eef1f5">
            <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->
            <h1 class="page-title"> User Detail
                <small></small>
            </h1>
            <!-- END PAGE TITLE-->
            <!-- END PAGE HEADER-->
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN PROFILE SIDEBAR -->
                    <div class="profile-sidebar">
                        <!-- PORTLET MAIN -->
                        <div class="portlet box red ">
                            <div class="portlet-title">
                                <div class="caption caption-md">
                                    <i class="icon-bar-chart theme-font hide"></i>
                                    <span class="caption-subject bold">Agent Info</span>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <!-- SIDEBAR USERPIC -->
                                <div class="profile-userpic">
                                    <?php if ($user['profile_dp'] == "user.png" || $user['profile_dp'] == "") { ?>
                                        <img src="<?php echo base_url(); ?>assets/images/user.png" class="img-responsive" alt="">
                                    <?php }else{ ?>
                                        <img src="<?php echo base_url(); ?>uploads/images/<?php echo $user['profile_dp']; ?>" class="img-responsive" alt="">
                                    <?php } ?>
                                </div>
                                <!-- END SIDEBAR USERPIC -->
                                <!-- SIDEBAR USER TITLE -->
                                <div class="profile-usertitle">
                                    <div class="profile-usertitle-name"> <?php echo $user['first_name'].' '.$user['last_name']; ?> </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="profile-desc-text"> 
                                                <i class="fa fa-envelope"></i>
                                                <?php echo $user['email']; ?>
                                            </div>
                                            <div class="profile-desc-text"> 
                                                <i class="fa fa-mobile"></i>
                                                <?php echo $user['phone']; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="profile-usermenu">
                                </div>
                                <!-- END MENU -->
                            </div>
                        </div>
                        <!-- END PORTLET MAIN -->
                        <!-- PORTLET MAIN -->
                        <div class="portlet box red ">
                            <div class="portlet-title">
                                <div class="caption caption-md">
                                    <i class="icon-bar-chart theme-font hide"></i>
                                    <span class="caption-subject bold">Agency Info</span>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <h4 class="profile-desc-title">About</h4>
                                <span class="profile-desc-text"> <?php echo $user['about']; ?> </span>
                                <hr>
                                <h4 class="profile-desc-title">Agency Detail</h4>
                                <div class="profile-userpic">
                                    <?php if ($user['agency_image'] != "") { ?>
                                        <img src="<?php echo base_url(); ?>uploads/images/<?php echo $user['agency_image']; ?>" class="img-responsive" alt="">
                                    <?php } ?>
                                </div>
                                <div class="margin-top-20 profile-desc-link">
                                    <i class="fa fa-exclamation"></i>
                                    <a href="javascript:void(0)">
                                        <?php echo $user['agency_name']; ?>
                                    </a>
                                </div>
                                <div class="margin-top-20 profile-desc-link">
                                    <i class="fa fa-globe"></i>
                                    <a href="<?php echo $user['agency_website']; ?>"><?php echo $user['agency_website']; ?></a>
                                </div>

                            </div>
                        </div>
                        <!-- END PORTLET MAIN -->
                    </div>
                    <!-- END BEGIN PROFILE SIDEBAR -->
                    <!-- BEGIN PROFILE CONTENT -->
                    <div class="profile-content">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- BEGIN PORTLET -->
                                <div class="portlet box red ">
                                    <div class="portlet-title">
                                        <div class="caption caption-md">
                                            <i class="icon-bar-chart theme-font hide"></i>
                                            <span class="caption-subject bold">Listings</span>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="todo-tasklist">
                                                    <?php if (!empty($listings)) {
                                                        foreach ($listings as $list) { ?>
                                                            <div class="property-item booking-item property-archive col-lg-12 col-md-12 col-md-6 col-sm-12">
                                                                <div class="row">
                                                                    <div class="col-lg-5 col-sm-5 no-padding">
                                                                        <a href="http://localhost/emc/assets/listing_images/fdffbeb29bff9ff21e0e9584e397b059" class="property-image listing-property-img">
                                                                            <?php $images = listingImages($list['id']); 
                                                                            if (!empty($images)) { ?>
                                                                                <img src="<?php echo base_url(); ?>assets/listing_images/<?php echo $images[0]['image_name']; ?>" alt="Property Photo">
                                                                            <?php }else{ ?>
                                                                                <img src="https://via.placeholder.com/350x150?text=No+Image+Here" alt="Property Photo">
                                                                            <?php } ?>
                                                                        </a>
                                                                    </div>
                                                                    <div class="col-lg-7 col-sm-7 property-padding">
                                                                        <div class="property-content listing-content">
                                                                            <div class="row">
                                                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                                                    <h3 class="property-title"><a href="<?php echo base_url(); ?>admin/listing/view/<?php echo $list['unique_id']; ?>"><?php echo $list['title']; ?></a></h3>
                                                                                </div>
                                                                            </div>
                                                                            <p>
                                                                                <span class="property-price"><?php echo currency().number_format($list['price']); ?></span>
                                                                                <span class="property-label">
                                                                                    <a href="javascript:void(0)" class="property-label__type">
                                                                                        <?php echo ucfirst($list['property_type']); ?>
                                                                                    </a>
                                                                                </span>
                                                                                <span class="property-label">
                                                                                    <a href="javascript:void(0)" class="property-label__type">
                                                                                        <?php if ($list['purpose'] == "sale") {
                                                                                            echo "For Sale";
                                                                                        }elseif($list['purpose'] == "rent"){
                                                                                            echo "For Rent";
                                                                                        }else{
                                                                                            echo "For Students";
                                                                                        } ?>
                                                                                    </a>
                                                                                </span>
                                                                            </p>
                                                                            <div class="property-address">
                                                                                <?php echo $list['location']; ?>
                                                                            </div>
                                                                            <div class="row feature-list-icon">
                                                                                <div class="col-md-5">
                                                                                    <div class="contact-icon">
                                                                                        <p><i class="fa fa-phone"></i> <?php echo $list['contact_phone']; ?></p>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-7">
                                                                                    <div class="contact-icon">
                                                                                        <p><i class="fa fa-envelope"></i> <?php echo $list['contact_email']; ?></p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="property-footer">
                                                                                <div class="item-wide"><span class="fi flaticon-wide"></span><?php echo $list['land_area'].' '.getUnit($list['unit']); ?></div>
                                                                                <div class="item-room"><span class="fi flaticon-room"></span> <?php echo $list['no_of_bedrooms']; ?></div>
                                                                                <div class="item-bathroom"><span class="fi flaticon-bathroom"></span> <?php echo $list['no_of_bathrooms']; ?> </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php }
                                                    }else{ ?>
                                                        <div class="alert alert-info">
                                                            No listing found!
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END PORTLET -->
                            </div>
                        </div>
                    </div>
                    <!-- END PROFILE CONTENT -->
                </div>
            </div>
        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->
    <!-- END QUICK SIDEBAR -->
</div>
<?php $this->load->view('admin_common/footer');?>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/pages/scripts/profile.min.js"></script>