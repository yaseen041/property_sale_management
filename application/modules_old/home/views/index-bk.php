<!DOCTYPE html>
<html lang="en"> 
<?php $this->load->view('common/head'); ?>
<body class="header-1 page-header-1">
    <!-- ====== BEGIN HEADER ====== -->
    <?php $this->load->view('common/header'); ?>

    <!-- ====== END HEADER ====== -->
    <section id="page-builder" class="page-section">
        <!-- HERO IMAGE WITH SEARCH FORM -->
        <div class="row tpb-row header-bg">
            <div class="tpb tpb-property_simple_search col-md-12">
                <div class="container">
                    <div class="content-wrapper">
                        <h1 class="title">Welcome to <span class="emc2-bg">Emc2</span> Property</h1>
                        <p class="description">Click the For Sale, To Rent or Student tab to start your property search</p>
                    </div>
                    <!-- Tabmenu Container / Default Bootstrap Structure -->
                    <div class="search-tabmenu">
                        <!-- Tabmenu Navigation -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="active"><a href="#for-sale" role="tab" data-toggle="tab" aria-expanded="false"><i class="fi flaticon-sale hidden-xs"></i> For Sale</a></li>
                            <li class=""><a href="#for-rent" role="tab" data-toggle="tab" aria-expanded="true"><i class="fi flaticon-rent hidden-xs"></i>To Rent</a></li>
                            <li class=""><a href="#for-student" role="tab" data-toggle="tab" aria-expanded="true"><i class="fi flaticon-rent hidden-xs"></i>Student</a></li>
                        </ul>
                        <!-- Tabmenu Body / Content -->
                        <div class="tab-content">
                            <!-- Tabmenu Content 1 / Property For SALE -->
                            <div role="tabpanel" class="tab-pane active" id="for-sale">
                                <form id="search_form_sale" action="javascript:void(0)">
                                    <input type="hidden" name="purpose" value="sale" />
                                    <div class="form-body">
                                        <!-- Property for Sale Content Row 1 -->
                                        <div class="row">
                                            <div class="col-md-3 form-group">
                                                <label for="sale-location">Property Location</label>
                                                <input type="text" name="property_location" class="form-control" id="property_loc" placeholder="Any Location" />
                                                <input type="hidden" name="lat_long" id="property_lat_long" value="" />
                                            </div>
                                            <div class="col-md-3 form-group">
                                                <label for="within-x-miles">Within x Miles</label>
                                                <select class="form-control" name="within_miles">
                                                    <option value="">-- Select --</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="5">5</option>
                                                    <option value="10">10</option>
                                                    <option value="15">15</option>
                                                    <option value="20">20</option>
                                                    <option value="25+">25+</option>
                                                </select>
                                            </div>
                                            <div class="col-md-3 form-group">
                                                <label for="sale-type">Property Type</label>
                                                <select class="form-control" name="property_type">
                                                    <option value="">Select Property</option>
                                                    <?php if(!empty($property_types)){
                                                        foreach ($property_types as $property) {
                                                            ?>
                                                            <option vlaue="<?php echo str_replace(" ", "-", strtolower($property['name'])); ?>"><?php echo $property['name'] ?></option>
                                                            <?php
                                                        }
                                                    } ?>
                                                </select>
                                            </div>
                                            <div class="col-md-3 form-group">
                                                <label for="sale-bedroom">Bedrooms</label>
                                                <select class="form-control" name="no_of_bedrooms">
                                                    <option value="">Select any</option>
                                                    <option value="0">0</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="5+">5+</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- Property for Sale Content Row 2 -->
                                        <div class="row">
                                            <div class="col-md-3 form-group">
                                                <label for="sale-garage">Bathrooms</label>
                                                <select class="form-control" name="no_of_bathrooms">
                                                    <option value="">Select any</option>
                                                    <option value="0">0</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="5+">5+</option>
                                                </select>
                                            </div>
                                                <!-- <div class="col-md-3 form-group">
                                                    <label for="sale-bathroom">LIVING ROOMS</label>
                                                    <select class="form-control" name="no_of_living_rooms">
                                                        <option value="">Select any</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                    </select>
                                                </div> -->
                                                <div class="col-md-3 form-group">
                                                    <label for="sale-keyword">Keyword</label>
                                                    <input type="text" name="keywords" class="form-control" placeholder="Enter keyword">
                                                </div>
                                                <div class="col-md-3 form-group">
                                                    <label for="sale-range-feet">Price Range</label>
                                                    <div class="range-box col-md-11">
                                                        <input name="price_range" id="sale-range-feet" data-min="100" data-step="100" data-max="1000000" data-prettify-separator="," data-prefix="&pound;" data-max-postfix="+" readonly="">
                                                    </div>
                                                </div>
                                                <div class="col-md-3 form-group pull-right">
                                                    <button class="btn btn-primary pull-right btn-submit" data-type="sale" type="submit"><i class="fa fa-search"></i> Search</button>
                                                </div>
                                            </div>
                                            <!-- <div class="row">
                                            </div> -->
                                        </div>
                                        <!-- Property for Sale Submit Button -->
                                    </form>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="for-rent">
                                    <form id="search_form_rent" action="javascript:void(0)">
                                        <input type="hidden" name="purpose" value="rent" />
                                        <div class="form-body">
                                            <!-- Property for Sale Content Row 1 -->
                                            <div class="row">
                                                <div class="col-md-3 form-group">
                                                    <label for="sale-location">Property Location</label>
                                                    <input type="text" name="property_location" class="form-control" id="property_loc2" placeholder="Any Location" />
                                                    <input type="hidden" name="lat_long" id="property_lat_long2" value="" />
                                                </div>
                                                <div class="col-md-3 form-group">
                                                    <label for="within-x-miles">Within x Miles</label>
                                                    <select class="form-control" name="within_miles">
                                                        <option value="">-- Select --</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="5">5</option>
                                                        <option value="10">10</option>
                                                        <option value="15">15</option>
                                                        <option value="20">20</option>
                                                        <option value="25+">25+</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-3 form-group">
                                                    <label for="sale-type">Property Type</label>
                                                    <select class="form-control" name="property_type">
                                                        <option value="">Select Property</option>
                                                        <?php if(!empty($property_types)){
                                                            foreach ($property_types as $property) {
                                                                ?>
                                                                <option vlaue="<?php echo str_replace(" ", "-", strtolower($property['name'])); ?>"><?php echo $property['name'] ?></option>
                                                                <?php
                                                            }
                                                        } ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-3 form-group">
                                                    <label for="sale-bedroom">Bedrooms</label>
                                                    <select class="form-control" name="no_of_bedrooms">
                                                        <option value="">Select any</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="5+">5+</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- Property for Sale Content Row 2 -->
                                            <div class="row">
                                                <div class="col-md-3 form-group">
                                                    <label for="sale-garage">Bathrooms</label>
                                                    <select class="form-control" name="no_of_bathrooms">
                                                        <option value="">Select any</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="5+">5+</option>
                                                    </select>
                                                </div>
                                                <!-- <div class="col-md-3 form-group">
                                                    <label for="sale-bathroom">LIVING ROOMS</label>
                                                    <select class="form-control" name="no_of_living_rooms">
                                                        <option value="">Select any</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                    </select>
                                                </div> -->
                                                <div class="col-md-3 form-group">
                                                    <label for="sale-keyword">Keyword</label>
                                                    <input type="text" name="keywords" class="form-control" placeholder="Enter keyword">
                                                </div>
                                                <div class="col-md-3 form-group">
                                                    <label for="sale-range-feet">Price Range</label>
                                                    <div class="range-box col-md-11">
                                                        <input name="price_range" id="sale-range-feet" data-min="10" data-step="10" data-max="100000" data-prettify-separator="," data-prefix="&pound;" data-max-postfix="+" readonly="">
                                                    </div>
                                                </div>
                                                <div class="col-md-3 form-group pull-right">
                                                    <button class="btn btn-primary pull-right btn-submit" data-type="rent" type="submit"><i class="fa fa-search"></i> Search</button>
                                                </div>
                                            </div>
                                            <!-- <div class="row">                                                
                                            </div> -->
                                        </div>
                                        <!-- Property for Sale Submit Button -->
                                    </form>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="for-student">
                                    <form id="search_form_student" action="javascript:void(0)">
                                        <input type="hidden" name="purpose" value="student" />
                                        <div class="form-body">
                                            <!-- Property for Sale Content Row 1 -->
                                            <div class="row">
                                                <div class="col-md-3 form-group">
                                                    <label for="sale-location">Property Location</label>
                                                    <input type="text" name="property_location" class="form-control" id="property_loc3" placeholder="Any Location" />
                                                    <input type="hidden" name="lat_long" id="property_lat_long3" value="" />
                                                </div>
                                                <div class="col-md-3 form-group">
                                                    <label for="within-x-miles">Within x Miles</label>
                                                    <select class="form-control" name="within_miles">
                                                        <option value="">-- Select --</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="5">5</option>
                                                        <option value="10">10</option>
                                                        <option value="15">15</option>
                                                        <option value="20">20</option>
                                                        <option value="25+">25+</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-3 form-group">
                                                    <label for="sale-type">Property Type</label>
                                                    <select class="form-control" name="property_type">
                                                        <option value="">Select Property</option>
                                                        <option value="">Select Property</option>
                                                        <?php if(!empty($property_types)){
                                                            foreach ($property_types as $property) {
                                                                ?>
                                                                <option vlaue="<?php echo str_replace(" ", "-", strtolower($property['name'])); ?>"><?php echo $property['name'] ?></option>
                                                                <?php
                                                            }
                                                        } ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-3 form-group">
                                                    <label for="sale-bedroom">Bedrooms</label>
                                                    <select class="form-control" name="no_of_bedrooms">
                                                        <option value="">Select any</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="5+">5+</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- Property for Sale Content Row 2 -->
                                            <div class="row">
                                                <div class="col-md-3 form-group">
                                                    <label for="sale-garage">Bathrooms</label>
                                                    <select class="form-control" name="no_of_bathrooms">
                                                        <option value="">Select any</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="5+">5+</option>
                                                    </select>
                                                </div>
                                                <!-- <div class="col-md-3 form-group">
                                                    <label for="sale-bathroom">LIVING ROOMS</label>
                                                    <select class="form-control" name="no_of_living_rooms">
                                                        <option value="">Select any</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                    </select>
                                                </div> -->
                                                <div class="col-md-3 form-group">
                                                    <label for="sale-keyword">Keyword</label>
                                                    <input type="text" name="keywords" class="form-control" placeholder="Enter keyword">
                                                </div>
                                                <div class="col-md-3 form-group">
                                                    <label for="sale-range-feet">Price Range</label>
                                                    <div class="range-box col-md-11">
                                                        <input name="price_range" id="sale-range-feet" data-min="10" data-step="10" data-max="100000"  data-prettify-separator="," data-prefix="&pound;" data-max-postfix="+" readonly="">
                                                    </div>
                                                </div>
                                                <div class="col-md-3 form-group pull-right">
                                                    <button class="btn btn-primary pull-right btn-submit" data-type="student" type="submit"><i class="fa fa-search"></i> Search</button>
                                                </div>
                                            </div>
                                            <!-- <div class="row">                                                
                                            </div> -->
                                        </div>
                                        <!-- Property for Sale Submit Button -->
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ====== PAGE BUILDER TEMPLATE ====== -->

        <?php if (!empty($featured_listings)) { ?>
            <section id="best-deals" class="page-section">
                <div class="container">
                    <!-- Section Title -->
                    <div class="section-header header-column">
                        <h2 class="section-title">FEATURED PROPERTIES</h2>
                    </div>
                    <div class="featured-property-slider">
                        <?php foreach ($featured_listings as $feature) { ?>
                            <div class="property-item property-archive">
                                <div class="row row-eq-height">
                                    <div class="col-md-6">
                                        <a href="<?php echo base_url(); ?>listing/detail/<?php echo $feature['unique_id']; ?>" class="property-image">
                                            <?php $images = listingImages($feature['id']); ?>
                                            <img src="<?php echo base_url(); ?>assets/listing_images/<?php echo $images[0]['image_name']; ?>" alt="Propery Image">
                                        </a>
                                        <a href="javascript:void(0)" class="btn-favourite" title="Add to favourite"><i class="fa fa-heart"></i></a>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="property-content">
                                            <div class="row">
                                                <div class="col-md-9 col-sm-9 col-xs-9">
                                                    <h3 class="property-title">
                                                        <a href="<?php echo base_url(); ?>listing/detail/<?php echo $feature['unique_id']; ?>">
                                                            <?php echo $feature['title']; ?>        
                                                        </a>
                                                    </h3>
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-3 text-right d-block">
                                                    <img class="img-responsive agent-logo" style="width: 70px" src="<?php echo base_url(); ?>uploads/images/<?php echo $feature['agency_image']; ?>">
                                                </div>
                                            </div>
                                            <p>
                                                <span class="property-price"><?php echo currency().number_format($feature['price'],0); ?></span>
                                                <span class="property-label">
                                                    <a href="javascript:void(0)" class="property-label__type"><?php echo ucfirst($feature['property_type']); ?></a>
                                                </span>
                                                <span class="property-label">
                                                    <a href="javascript:void(0)" class="property-label__type">
                                                        <?php if($feature['purpose'] == "sale"){
                                                            echo "For Sales";
                                                        }else if($feature['purpose'] == "rent"){
                                                            echo "For Rent";
                                                        }else{
                                                            echo "For Students";
                                                        } ?>
                                                    </a>
                                                </span>
                                            </p>
                                            <div class="property-address">
                                                <?php echo $feature['location']; ?>
                                            </div>
                                            <div class="row feature-list-icon">
                                                <div class="col-md-5">
                                                    <div class="contact-icon">
                                                        <p>
                                                            <a href="tel:<?php echo $feature['contact_phone']; ?>">
                                                                <i class="fa fa-phone"></i> <?php echo $feature['contact_phone']; ?>
                                                            </a>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-md-7">
                                                    <div class="contact-icon">
                                                        <p>
                                                            <a href="mailto:<?php echo $feature['contact_email']; ?>">
                                                                <i class="fa fa-envelope"></i>&nbsp;<?php echo $feature['contact_email']; ?>
                                                            </a>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="property-descriptio"><?php echo custom_substr($feature['description'],150); ?></p>
                                            <div class="property-footer">
                                                <div class="item-wide"><span class="fi flaticon-wide"></span> <?php echo $feature['land_area']." ".getUnit($feature['unit']); ?></div>
                                                <div class="item-room"><span class="fi flaticon-room"></span> <?php echo $feature['no_of_bedrooms']; ?></div>
                                                <div class="item-bathroom"><span class="fi flaticon-bathroom"></span> <?php echo $feature['no_of_bathrooms']; ?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </section>
        <?php } ?>


        <section id="best-deals" class="page-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12"><script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Home page ads -->
<ins class="adsbygoogle"
style="display:block"
data-ad-client="ca-pub-5699644453556247"
data-ad-slot="5093890020"
data-ad-format="auto"
data-full-width-responsive="true"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12"><script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- 2nd home screen ad -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-5699644453556247"
     data-ad-slot="8541470006"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
                    </div>
                </div>
            </div>
        </section>

        <!-- ====== Latest Listings ====== -->
        <?php 
        $recent = getRecentListings();
        if (!empty($recent)) { ?>
            <section id="featured-room" class="page-section no-padding" style="padding-bottom:50px !important;">
                <div class="container">
                    <!-- Section Header / Title with Column Slider Control / Add 'header-column' to use this style -->
                    <div class="section-header header-column">
                        <h2 class="section-title">Latest Properties</h2>
                    </div>
                    <div class="property-list archive-flex">
                        <div class="row">
                            <?php foreach ($recent as $listing) {
                                if (isListingFavourite($listing['id'])) {
                                    $class = "active";
                                }else{
                                    $class = "";
                                }
                                $image_name = array_column($listing['images'],'image_name');
                                $first_image = current($image_name);
                                $image1= '';
                                if(!empty($first_image) && file_exists(FCPATH.'assets/listing_images/'.$first_image)){
                                    $image1 = base_url()."assets/listing_images/". $first_image;
                                }else{
                                    $image1 = "https://via.placeholder.com/600x400?text=No+Image";
                                }
                                ?>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <!-- Property Item -->
                                    <div class="property-item">
                                        <div class="property-heading">
                                            <span class="item-price"><?php echo currency().number_format($listing['price'],0); ?><?php echo ($listing['purpose'] == 'rent' || $listing['purpose'] == 'student') ? " PW" : ""; ?></span>
                                            <a href="<?php echo base_url(); ?>listing/detail/<?php echo $listing['unique_id']; ?>" class="item-detail btn">Detail <i class="fi flaticon-detail"></i></a>
                                        </div>
                                        <div class="img-box">
                                            <div class="property-label">
                                                <a href="javascript:void(0)" class="property-label__type" style="background: #ed193f">
                                                    <?php 
                                                    switch($listing['purpose']){
                                                        case 'sale':
                                                        echo "For Sale";
                                                        break;
                                                        case 'rent':
                                                        echo "To Rent";
                                                        break;
                                                        case 'student':
                                                        echo "Student";
                                                    }
                                                    ?>
                                                </a>
                                                <a href="javascript:void(0)" class="property-label__type"><?php echo $listing['property_type']; ?></a>
                                            </div>
                                            <a href="javascript:void(0)" data-listing-id="<?php echo $listing['unique_id']; ?>" class="btn-favourite <?php echo $class; ?>" title="Add to favourite"><i class="fa fa-heart"></i></a>
                                            <a href="<?php echo base_url(); ?>listing/detail/<?php echo $listing['unique_id']; ?>" class="img-box__image">
                                                <img src="<?php echo $image1; ?>" alt="Propery Image">
                                            </a>
                                        </div>
                                        <div class="property-content">
                                            <a href="<?php echo base_url(); ?>listing/detail/<?php echo $listing['unique_id']; ?>" class="property-title"><?php echo $listing['title']; ?></a>
                                            <div class="property-address">
                                                <?php echo $listing['location']; ?>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-8 col-sm-8 col-xs-8">
                                                    <div class="contact-icon">
                                                        <p>
                                                            <a href="tel:<?php echo $listing['contact_phone']; ?>">
                                                                <i class="fa fa-phone"></i> <?php echo $listing['contact_phone']; ?>
                                                            </a>
                                                        </p>
                                                        <p>
                                                            <a href="mailto:<?php echo $listing['contact_email']; ?>">
                                                                <i class="fa fa-envelope"></i>&nbsp;<?php echo $listing['contact_email']; ?>
                                                            </a>
                                                        </p>        
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-4 col-xs-4 d-block">
                                                    <a href="<?php echo base_url(); ?>agent/<?php echo $listing['agent_unique_id']; ?>">
                                                        <img style="width: 70px" class="img-responsive agent-logo" src="<?php echo base_url(); ?>uploads/images/<?php echo $listing['agency_image']; ?>">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="property-footer">
                                                <div class="item-wide"><span class="fi flaticon-wide"></span> <?php echo $listing['land_area']." ".getUnit($listing['unit']); ?></div>
                                                <div class="item-room"><span class="fi flaticon-room"></span> <?php echo $listing['no_of_bedrooms']; ?></div>
                                                <div class="item-bathroom"><span class="fi flaticon-bathroom"></span> <?php echo $listing['no_of_bathrooms']; ?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php } ?>
        <?php $this->load->view('common/scripts'); ?>
        <?php $this->load->view('common/footer'); ?>
        <script>
            $(document).ready(function(){

                $('.btn-submit').click(function (){
                    var form_type = $(this).attr('data-type');
                    $.ajax({
                        method: "post",
                        url: "<?php echo base_url() ?>listing/searchCriteria",
                        dataType: "json",
                        data: $("#search_form_"+form_type).serialize(),
                        success: function(status){
                            if(status.msg == 'success'){
                                window.location.href = status.new_url;

                            }else if(status.msg == 'error'){
                                $.gritter.add({
                                    title: 'Error!',
                                    sticky: false,
                                    time: '15000',
                                    before_open: function(){
                                        if($('.gritter-item-wrapper').length >= 3)
                                        {
                                            return false;
                                        }
                                    },
                                    text: status.response,
                                    class_name: 'gritter-danger'
                                });
                            }
                        }
                    });
                });
            });
        </script>
        <script type="text/javascript">
            $(document).on('click', '.btn-favourite', function(e){
                var button = $(this);
                var listing_id = $(this).attr('data-listing-id');
                if (!$(this).hasClass('active')) {
                    $.ajax({
                        url:"<?php echo base_url(); ?>home/addFavourite",
                        data:"listing_id="+listing_id,
                        type:"post",
                        dataType:"json",
                        success: function(status){
                            if(status.msg == 'success'){
                             $.gritter.add({
                                title: 'Success!',
                                sticky: false,
                                time: '15000',
                                before_open: function(){
                                    if($('.gritter-item-wrapper').length >= 3)
                                    {
                                        return false;
                                    }
                                },
                                text: status.response,
                                class_name: 'gritter-info'
                            });
                             $(button).addClass('active');
                         }else if(status.msg == 'error'){
                            $.gritter.add({
                                title: 'Error!',
                                sticky: false,
                                time: '15000',
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
                }else{
                    $.confirm({
                        title: 'Remove From Favourite',
                        type:"red",
                        content: 'Are you sure?',
                        buttons: {
                            cancel: function () {
                            },
                            Remove: {
                                btnClass: 'btn-red',
                                action: function(){
                                    $.ajax({
                                        url:"<?php echo base_url(); ?>home/removeFavourite",
                                        data:"listing_id="+listing_id,
                                        type:"post",
                                        dataType:"json",
                                        success: function(status){
                                            if(status.msg == 'success'){
                                                $.gritter.add({
                                                    title: 'Success!',
                                                    sticky: false,
                                                    time: '15000',
                                                    before_open: function(){
                                                        if($('.gritter-item-wrapper').length >= 3)
                                                        {
                                                            return false;
                                                        }
                                                    },
                                                    text: status.response,
                                                    class_name: 'gritter-info'
                                                });
                                                $(button).removeClass('active');
                                            }else if(status.msg == 'error'){
                                                $.gritter.add({
                                                    title: 'Error!',
                                                    sticky: false,
                                                    time: '15000',
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
                }
            });
        </script>
        <script type="text/javascript">
            $(window).keydown(function (event) {
                if (event.keyCode == 13) {
                    event.preventDefault();
                    return false;
                }
            });
        </script>
    </body>
    </html>
