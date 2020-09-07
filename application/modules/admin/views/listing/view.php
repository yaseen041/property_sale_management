<?php $this->load->view('admin_common/header');?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/pages/css/profile.min.css">
<div class="page-container">
    <?php $this->load->view('admin_common/sidebar');?>
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content" style="background-color: #eef1f5">
            <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->
            <h1 class="page-title"> Property Detail
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
                                    <?php if ($list['profile_dp'] == "user.png" || $list['profile_dp'] == "") { ?>
                                        <img src="<?php echo base_url(); ?>assets/images/user.png" class="img-responsive" alt="">
                                    <?php }else{ ?>
                                        <img src="<?php echo base_url(); ?>uploads/images/<?php echo $list['profile_dp']; ?>" class="img-responsive" alt="">
                                    <?php } ?>
                                </div>
                                <!-- END SIDEBAR USERPIC -->
                                <!-- SIDEBAR USER TITLE -->
                                <div class="profile-usertitle">
                                    <div class="profile-usertitle-name"> <?php echo $list['first_name'].' '.$list['last_name']; ?> </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="profile-desc-text"> 
                                                <i class="fa fa-envelope"></i>
                                                <?php echo $list['email']; ?>
                                            </div>
                                            <div class="profile-desc-text"> 
                                                <i class="fa fa-mobile"></i>
                                                <?php echo $list['phone']; ?>
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
                                <span class="profile-desc-text"> <?php echo $list['about']; ?> </span>
                                <hr>
                                <h4 class="profile-desc-title">Agency Detail</h4>
                                <div class="profile-userpic">
                                    <?php if ($list['agency_image'] != "") { ?>
                                        <img src="<?php echo base_url(); ?>uploads/images/<?php echo $list['agency_image']; ?>" class="img-responsive" alt="">
                                    <?php } ?>
                                </div>
                                <div class="margin-top-20 profile-desc-link">
                                    <i class="fa fa-exclamation"></i>
                                    <a href="javascript:void(0)">
                                        <?php echo $list['agency_name']; ?>
                                    </a>
                                </div>
                                <div class="margin-top-20 profile-desc-link">
                                    <i class="fa fa-globe"></i>
                                    <a href="<?php echo $list['agency_website']; ?>"><?php echo $list['agency_website']; ?></a>
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
                                            <span class="caption-subject bold"><?php echo $list['title']; ?></span>
                                        </div>
                                    </div>
                                    <div class="portlet-body" id="content">
                                        <!-- Property Gallery Slider -->
                                        <?php $images = listingImages($list['id']); 
                                        if (!empty($images)) { ?>
                                            <div class="property-image">
                                                <div id="property-slider" class="property-slider">
                                                    <?php foreach ($images as $image) { ?>
                                                        <img src="<?php echo base_url(); ?>assets/listing_images/<?php echo $image['image_name']; ?>" alt="Property Photo">
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <!-- Property facility Detail -->
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-3 col-sm-3"><h3 class="heading-title">Location</h3></div>
                                            <div class="col-md-9 col-sm-9">
                                                <ul class="feature-list-address">
                                                    <li><i class="fa fa-globe"></i> <?php echo $list['location']; ?></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-3 col-sm-3"><h3 class="heading-title">Feature</h3></div>
                                            <div class="col-md-9 col-sm-9">
                                                <ul class="feature-list">
                                                    <li><i class="fa fa-bed"></i>Bedrooms: <strong><?php echo $list['no_of_bedrooms']; ?></strong></li>
                                                    <li><i class="fi flaticon-bathroom"></i> Bathrooms: <strong><?php echo $list['no_of_bathrooms']; ?></strong></li>
                                                    <li><i class="fi flaticon-wide"></i> Land Area: <strong><?php echo $list['land_area'].' '.getUnit($list['unit']); ?></strong></li>

                                                </ul>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-3 col-sm-3"><h3 class="heading-title">Purpose</h3></div>
                                            <div class="col-md-9 col-sm-9">
                                                <ul class="feature-list">
                                                    <li>
                                                        <?php if ($list['purpose'] == "sale") {
                                                            echo "For Sale";
                                                        }elseif($list['purpose'] == "rent"){
                                                            echo "For Rent";
                                                        }else{
                                                            echo "For Students";
                                                        } ?>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-3 col-sm-3"><h3 class="heading-title">Property type</h3></div>
                                            <div class="col-md-9 col-sm-9">
                                                <ul class="feature-list">
                                                    <li><?php echo ucfirst($list['property_type']); ?></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-3 col-sm-3"><h3 class="heading-title">Price</h3></div>
                                            <div class="col-md-9 col-sm-9">
                                                <ul class="feature-list-address">
                                                    <li><?php echo currency().number_format($list['price']); ?><?php echo ($list['purpose'] == 'rent' || $list['purpose'] == 'student') ? " PCM" : ""; ?></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <hr>
                                        <!-- <div class="row">
                                            <div class="col-md-3 col-sm-3"><h3 class="heading-title">Build Year</h3></div>
                                            <div class="col-md-9 col-sm-9">
                                                <ul class="feature-list">
                                                    <li><i class="fa fa-check"></i> <?php //echo $list['build_year']; ?></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <hr> -->
                                        <div class="row">
                                            <div class="col-md-3 col-sm-3"><h3 class="heading-title">Description</h3></div>
                                            <div class="col-md-9 col-sm-9">
                                                <p><?php echo nl2br($list['description']); ?></p>
                                            </div>
                                        </div>
                                        <!-- Property Location / Map -->
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-3 col-sm-3">
                                                <h3 class="heading-title">Property Location</h3>
                                            </div>
                                            <div class="col-md-9 col-sm-9">
                                                
<iframe src="https://maps.google.com/maps?q=<?php echo @$list['latitude'].",".@$list['longitude']; ?>&z=15&output=embed" width="750" height="350" frameborder="0" style="border:0"></iframe>
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
<script type="text/javascript">
    $('#property-slider').slick();
</script>