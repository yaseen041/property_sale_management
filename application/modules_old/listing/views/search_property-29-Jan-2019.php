<!DOCTYPE html>
<html lang="en"> 
<?php $this->load->view('common/head'); ?>
<body class="header-1 page-header-1">
    <!-- ====== BEGIN HEADER ====== -->
    <?php $this->load->view('common/header'); ?>
    <section id="property-search-result" class="sidebar-map">
        <div class="sidebar-map-content hidden-xs">
            <div class="map-wrapper">
                <div id="map"></div>
                <div class="loader">
                    <div class="spinner">
                        <div class="bounce1"></div>
                        <div class="bounce2"></div>
                        <div class="bounce3"></div>
                    </div>
                </div> 
            </div>
        </div>
        <div class="search-result-content">
            <!-- Tabmenu Container / Default Bootstrap Structure -->
            <div class="container">
                <div class="slide-property">
                    <!--<div class="col-md-10 col-md-offset-1">-->
                        <div class="search-tabmenu" style="margin-top: 70px;">
                            <!-- Tabmenu Navigation -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="<?php echo ($_GET['purpose'] == "sale") ? "active" : ""; ?>"><a href="#for-sale" role="tab" data-toggle="tab" aria-expanded="false"><i class="fi flaticon-sale hidden-xs"></i> For Sale</a></li>
                                <li class="<?php echo ($_GET['purpose'] == "rent") ? "active" : ""; ?>"><a href="#for-rent" role="tab" data-toggle="tab" aria-expanded="true"><i class="fi flaticon-rent hidden-xs"></i>To Rent</a></li>
                                <li class="<?php echo ($_GET['purpose'] == "student") ? "active" : ""; ?>"><a href="#for-student" role="tab" data-toggle="tab" aria-expanded="true"><i class="fi flaticon-rent hidden-xs"></i>Student</a></li>
                            </ul>
                            <!-- Tabmenu Body / Content -->
                            <div class="tab-content">
                                <!-- Tabmenu Content 1 / Property For SALE -->
                                <div role="tabpanel" class="tab-pane <?php echo ($_GET['purpose'] == "sale") ? "active" : ""; ?>" id="for-sale">
                                    <form id="search_form_sale" action="javascript:void(0)">
                                        <input type="hidden" name="purpose" value="sale" />
                                        <div class="form-body">
                                            <!-- Property for Sale Content Row 1 -->
                                            <div class="row">
                                                <div class="col-md-3 form-group">
                                                    <label for="sale-location">Property Location</label>
                                                    <input type="text" name="property_location" class="form-control" id="property_loc" placeholder="Any Location" value="<?php echo get_session('property_location'); ?>" />
                                                    <input type="hidden" name="lat_long" id="property_lat_long" value="<?php echo @$_GET['lat'] . ', ' . @$_GET['long'] ?>" />
                                                </div>
                                                <div class="col-md-3 form-group">
                                                    <label for="within-x-miles">Within x Miles</label>
                                                    <select class="form-control" name="within_miles">
                                                        <option value="">--Select--</option>
                                                        <option value="1" <?php echo (@$_GET['within_miles'] == 1) ? "selected" : "" ?> >1</option>
                                                        <option value="2" <?php echo (@$_GET['within_miles'] == 2) ? "selected" : "" ?> >2</option>
                                                        <option value="5" <?php echo (@$_GET['within_miles'] == 3) ? "selected" : "" ?> >3</option>
                                                        <option value="5" <?php echo (@$_GET['within_miles'] == 5) ? "selected" : "" ?> >5</option>
                                                        <option value="10" <?php echo (@$_GET['within_miles'] == 10) ? "selected" : "" ?> >10</option>
                                                        <option value="15" <?php echo (@$_GET['within_miles'] == 15) ? "selected" : "" ?> >15</option>
                                                        <option value="20" <?php echo (@$_GET['within_miles'] == 20) ? "selected" : "" ?> >20</option>
                                                        <option value="25+" <?php echo (@urlencode($_GET['within_miles']) == '25+') ? "selected" : "" ?> >25+</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-3 form-group">
                                                    <label for="sale-type">Property Type</label>
                                                    <select class="form-control" name="property_type">
                                                        <option value="">Select Property</option>
                                                        <?php
                                                        if (!empty($property_types)) {
                                                            foreach ($property_types as $property) {
                                                                $selected = (@$_GET['property_type'] == str_replace(" ", "-", strtolower($property['name']))) ? "selected" : "";
                                                                ?>
                                                                <option vlaue="<?php echo str_replace(" ", "-", strtolower($property['name'])); ?>" <?php echo $selected; ?> ><?php echo $property['name'] ?></option>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-3 form-group">
                                                    <label for="sale-bedroom">Bedrooms</label>
                                                    <select class="form-control" name="no_of_bedrooms">
                                                        <option value="">Select any</option>
                                                        <option value="1" <?php echo (@$_GET['bedrooms'] == '0') ? "selected" : "" ?> >0</option>
                                                        <option value="1" <?php echo (@$_GET['bedrooms'] == '1') ? "selected" : "" ?> >1</option>
                                                        <option value="2" <?php echo (@$_GET['bedrooms'] == '2') ? "selected" : "" ?> >2</option>
                                                        <option value="3" <?php echo (@$_GET['bedrooms'] == '3') ? "selected" : "" ?> >3</option>
                                                        <option value="4" <?php echo (@$_GET['bedrooms'] == '4') ? "selected" : "" ?> >4</option>
                                                        <option value="5" <?php echo (@$_GET['bedrooms'] == '5') ? "selected" : "" ?> >5</option>
                                                        <option value="5+" <?php echo (@urlencode($_GET['bedrooms']) == '5+') ? "selected" : "" ?> >5+</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- Property for Sale Content Row 2 -->
                                            <div class="row">
                                                <div class="col-md-3 form-group">
                                                    <label for="sale-garage">Bathrooms</label>
                                                    <select class="form-control" name="no_of_bathrooms">
                                                        <option value="">Select any</option>
                                                        <option value="1" <?php echo (@$_GET['bathrooms'] == '0') ? "selected" : "" ?> >0</option>
                                                        <option value="1" <?php echo (@$_GET['bathrooms'] == '1') ? "selected" : "" ?> >1</option>
                                                        <option value="2" <?php echo (@$_GET['bathrooms'] == '2') ? "selected" : "" ?> >2</option>
                                                        <option value="3" <?php echo (@$_GET['bathrooms'] == '3') ? "selected" : "" ?> >3</option>
                                                        <option value="4" <?php echo (@$_GET['bathrooms'] == '4') ? "selected" : "" ?> >4</option>
                                                        <option value="5" <?php echo (@$_GET['bathrooms'] == '5') ? "selected" : "" ?> >5</option>
                                                        <option value="5+" <?php echo (@urlencode($_GET['bathrooms']) == '5+') ? "selected" : "" ?> >5+</option>
                                                    </select>
                                                </div>
                                                <!-- <div class="col-md-3 form-group">
                                                    <label for="sale-bathroom">LIVING ROOMS</label>
                                                    <select class="form-control" name="no_of_living_rooms">
                                                        <option value="">Select any</option>
                                                        <option value="1" <?php //echo (@$_GET['living_rooms'] == '1') ? "selected" : ""                 ?> >1</option>
                                                        <option value="2" <?php //echo (@$_GET['living_rooms'] == '2') ? "selected" : ""                 ?> >2</option>
                                                        <option value="3" <?php //echo (@$_GET['living_rooms'] == '3') ? "selected" : ""                 ?> >3</option>
                                                        <option value="4" <?php //echo (@$_GET['living_rooms'] == '4') ? "selected" : ""                 ?> >4</option>
                                                    </select>
                                                </div> -->
                                                <div class="col-md-3 form-group">
                                                    <label for="sale-keyword">Keyword</label>
                                                    <input type="text" name="keywords" class="form-control" placeholder="Enter keyword" value="<?php echo @$_GET['keywords'] ?>">
                                                </div>
                                                <div class="col-md-3 form-group">
                                                    <label for="sale-range-feet">Price Range</label>
                                                    <div class="range-box col-md-11">
                                                        <input name="price_range" id="sale-range-feet" data-min="100" data-step="100" data-max="1000000" data-prettify-separator="," data-prefix="&pound;" data-max-postfix="+" readonly="" value="<?php echo (@$_GET['purpose'] == 'sale')? @$_GET['price_range'] : '' ?>" />
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
                                <div role="tabpanel" class="tab-pane <?php echo ($_GET['purpose'] == "rent") ? "active" : ""; ?>" id="for-rent">
                                    <form id="search_form_rent" action="javascript:void(0)">
                                        <input type="hidden" name="purpose" value="rent" />
                                        <div class="form-body">
                                            <!-- Property for Sale Content Row 1 -->
                                            <div class="row">
                                                <div class="col-md-3 form-group">
                                                    <label for="sale-location">Property Location</label>
                                                    <input type="text" name="property_location" class="form-control" id="property_loc2" placeholder="Any Location" value="<?php echo get_session('property_location'); ?>" />
                                                    <input type="hidden" name="lat_long" id="property_lat_long2" value="<?php echo @$_GET['lat'] . ', ' . @$_GET['long'] ?>" />
                                                </div>
                                                <div class="col-md-3 form-group">
                                                    <label for="within-x-miles">Within x Miles</label>
                                                    <select class="form-control" name="within_miles">
                                                        <option value="">--Select--</option>
                                                        <option value="1" <?php echo (@$_GET['within_miles'] == 1) ? "selected" : "" ?> >1</option>
                                                        <option value="2" <?php echo (@$_GET['within_miles'] == 2) ? "selected" : "" ?> >2</option>
                                                        <option value="5" <?php echo (@$_GET['within_miles'] == 3) ? "selected" : "" ?> >3</option>
                                                        <option value="5" <?php echo (@$_GET['within_miles'] == 5) ? "selected" : "" ?> >5</option>
                                                        <option value="10" <?php echo (@$_GET['within_miles'] == 10) ? "selected" : "" ?> >10</option>
                                                        <option value="15" <?php echo (@$_GET['within_miles'] == 15) ? "selected" : "" ?> >15</option>
                                                        <option value="20" <?php echo (@$_GET['within_miles'] == 20) ? "selected" : "" ?> >20</option>
                                                        <option value="25+" <?php echo (@urlencode($_GET['within_miles']) == '25+') ? "selected" : "" ?> >25+</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-3 form-group">
                                                    <label for="sale-type">Property Type</label>
                                                    <select class="form-control" name="property_type">
                                                        <option value="">Select Property</option>
                                                        <?php
                                                        if (!empty($property_types)) {
                                                            foreach ($property_types as $property) {
                                                                $selected = (@$_GET['property_type'] == str_replace(" ", "-", strtolower($property['name']))) ? "selected" : "";
                                                                ?>
                                                                <option vlaue="<?php echo str_replace(" ", "-", strtolower($property['name'])); ?>" <?php echo $selected; ?> ><?php echo $property['name'] ?></option>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-3 form-group">
                                                    <label for="sale-bedroom">Bedrooms</label>
                                                    <select class="form-control" name="no_of_bedrooms">
                                                        <option value="">Select any</option>
                                                        <option value="1" <?php echo (@$_GET['bedrooms'] == '1') ? "selected" : "" ?> >1</option>
                                                        <option value="2" <?php echo (@$_GET['bedrooms'] == '2') ? "selected" : "" ?> >2</option>
                                                        <option value="3" <?php echo (@$_GET['bedrooms'] == '3') ? "selected" : "" ?> >3</option>
                                                        <option value="4" <?php echo (@$_GET['bedrooms'] == '4') ? "selected" : "" ?> >4</option>
                                                        <option value="5" <?php echo (@$_GET['bedrooms'] == '5') ? "selected" : "" ?> >5</option>
                                                        <option value="5+" <?php echo (@urlencode($_GET['bedrooms']) == '5+') ? "selected" : "" ?> >5+</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- Property for Sale Content Row 2 -->
                                            <div class="row">
                                                <div class="col-md-3 form-group">
                                                    <label for="sale-garage">Bathrooms</label>
                                                    <select class="form-control" name="no_of_bathrooms">
                                                        <option value="">Select any</option>
                                                        <option value="1" <?php echo (@$_GET['bathrooms'] == '1') ? "selected" : "" ?> >1</option>
                                                        <option value="2" <?php echo (@$_GET['bathrooms'] == '2') ? "selected" : "" ?> >2</option>
                                                        <option value="3" <?php echo (@$_GET['bathrooms'] == '3') ? "selected" : "" ?> >3</option>
                                                        <option value="4" <?php echo (@$_GET['bathrooms'] == '4') ? "selected" : "" ?> >4</option>
                                                        <option value="5" <?php echo (@$_GET['bathrooms'] == '5') ? "selected" : "" ?> >5</option>
                                                        <option value="5+" <?php echo (@urlencode($_GET['bathrooms']) == '5+') ? "selected" : "" ?> >5+</option>
                                                    </select>
                                                </div>
                                                <!-- <div class="col-md-3 form-group">
                                                    <label for="sale-bathroom">LIVING ROOMS</label>
                                                    <select class="form-control" name="no_of_living_rooms">
                                                        <option value="">Select any</option>
                                                        <option value="1" <?php //echo (@$_GET['living_rooms'] == '1') ? "selected" : ""                 ?> >1</option>
                                                        <option value="2" <?php //echo (@$_GET['living_rooms'] == '2') ? "selected" : ""                 ?> >2</option>
                                                        <option value="3" <?php //echo (@$_GET['living_rooms'] == '3') ? "selected" : ""                 ?> >3</option>
                                                        <option value="4" <?php //echo (@$_GET['living_rooms'] == '4') ? "selected" : ""                 ?> >4</option>
                                                    </select>
                                                </div> -->
                                                <div class="col-md-3 form-group">
                                                    <label for="sale-keyword">Keyword</label>
                                                    <input type="text" name="keywords" class="form-control" placeholder="Enter keyword" value="<?php echo @$_GET['keywords'] ?>">
                                                </div>
                                                <div class="col-md-3 form-group">
                                                    <label for="sale-range-feet">Price Range</label>
                                                    <div class="range-box col-md-11">
                                                        <input name="price_range" id="sale-range-feet" data-min="10" data-step="10" data-max="100000" data-prettify-separator="," data-prefix="&pound;" data-max-postfix="+" readonly="" value="<?php echo (@$_GET['purpose'] == 'rent')? @$_GET['price_range'] : '' ?>" />
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
                                <div role="tabpanel" class="tab-pane <?php echo ($_GET['purpose'] == "student") ? "active" : ""; ?>" id="for-student">
                                    <form id="search_form_student" action="javascript:void(0)">
                                        <input type="hidden" name="purpose" value="student" />
                                        <div class="form-body">
                                            <!-- Property for Sale Content Row 1 -->
                                            <div class="row">
                                                <div class="col-md-3 form-group">
                                                    <label for="sale-location">Property Location</label>
                                                    <input type="text" name="property_location" class="form-control" id="property_loc3" placeholder="Any Location" value="<?php echo get_session('property_location'); ?>" />
                                                    <input type="hidden" name="lat_long" id="property_lat_long3" value="<?php echo @$_GET['lat'] . ', ' . @$_GET['long'] ?>" />
                                                </div>
                                                <div class="col-md-3 form-group">
                                                    <label for="within-x-miles">Within x Miles</label>
                                                    <select class="form-control" name="within_miles">
                                                        <option value="">--Select--</option>
                                                        <option value="1" <?php echo (@$_GET['within_miles'] == 1) ? "selected" : "" ?> >1</option>
                                                        <option value="2" <?php echo (@$_GET['within_miles'] == 2) ? "selected" : "" ?> >2</option>
                                                        <option value="5" <?php echo (@$_GET['within_miles'] == 3) ? "selected" : "" ?> >3</option>
                                                        <option value="5" <?php echo (@$_GET['within_miles'] == 5) ? "selected" : "" ?> >5</option>
                                                        <option value="10" <?php echo (@$_GET['within_miles'] == 10) ? "selected" : "" ?> >10</option>
                                                        <option value="15" <?php echo (@$_GET['within_miles'] == 15) ? "selected" : "" ?> >15</option>
                                                        <option value="20" <?php echo (@$_GET['within_miles'] == 20) ? "selected" : "" ?> >20</option>
                                                        <option value="25+" <?php echo (@urlencode($_GET['within_miles']) == '25+') ? "selected" : "" ?> >25+</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-3 form-group">
                                                    <label for="sale-type">Property Type</label>
                                                    <select class="form-control" name="property_type">
                                                        <option value="">Select Property</option>
                                                        <?php
                                                        if (!empty($property_types)) {
                                                            foreach ($property_types as $property) {
                                                                $selected = (@$_GET['property_type'] == str_replace(" ", "-", strtolower($property['name']))) ? "selected" : "";
                                                                ?>
                                                                <option vlaue="<?php echo str_replace(" ", "-", strtolower($property['name'])); ?>" <?php echo $selected; ?> ><?php echo $property['name'] ?></option>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-3 form-group">
                                                    <label for="sale-bedroom">Bedrooms</label>
                                                    <select class="form-control" name="no_of_bedrooms">
                                                        <option value="">Select any</option>
                                                        <option value="1" <?php echo (@$_GET['bedrooms'] == '1') ? "selected" : "" ?> >1</option>
                                                        <option value="2" <?php echo (@$_GET['bedrooms'] == '2') ? "selected" : "" ?> >2</option>
                                                        <option value="3" <?php echo (@$_GET['bedrooms'] == '3') ? "selected" : "" ?> >3</option>
                                                        <option value="4" <?php echo (@$_GET['bedrooms'] == '4') ? "selected" : "" ?> >4</option>
                                                        <option value="5" <?php echo (@$_GET['bedrooms'] == '5') ? "selected" : "" ?> >5</option>
                                                        <option value="5+" <?php echo (@urlencode($_GET['bedrooms']) == '5+') ? "selected" : "" ?> >5+</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- Property for Sale Content Row 2 -->
                                            <div class="row">
                                                <div class="col-md-3 form-group">
                                                    <label for="sale-garage">Bathrooms</label>
                                                    <select class="form-control" name="no_of_bathrooms">
                                                        <option value="">Select any</option>
                                                        <option value="1" <?php echo (@$_GET['bathrooms'] == '1') ? "selected" : "" ?> >1</option>
                                                        <option value="2" <?php echo (@$_GET['bathrooms'] == '2') ? "selected" : "" ?> >2</option>
                                                        <option value="3" <?php echo (@$_GET['bathrooms'] == '3') ? "selected" : "" ?> >3</option>
                                                        <option value="4" <?php echo (@$_GET['bathrooms'] == '4') ? "selected" : "" ?> >4</option>
                                                        <option value="5" <?php echo (@$_GET['bathrooms'] == '5') ? "selected" : "" ?> >5</option>
                                                        <option value="5+" <?php echo (@urlencode($_GET['bathrooms']) == '5+') ? "selected" : "" ?> >5+</option>
                                                    </select>
                                                </div>
                                                <!-- <div class="col-md-3 form-group">
                                                    <label for="sale-bathroom">LIVING ROOMS</label>
                                                    <select class="form-control" name="no_of_living_rooms">
                                                        <option value="">Select any</option>
                                                        <option value="1" <?php //echo (@$_GET['living_rooms'] == '1') ? "selected" : ""                 ?> >1</option>
                                                        <option value="2" <?php //echo (@$_GET['living_rooms'] == '2') ? "selected" : ""                 ?> >2</option>
                                                        <option value="3" <?php //echo (@$_GET['living_rooms'] == '3') ? "selected" : ""                 ?> >3</option>
                                                        <option value="4" <?php //echo (@$_GET['living_rooms'] == '4') ? "selected" : ""                 ?> >4</option>
                                                    </select>
                                                </div> -->
                                                <div class="col-md-3 form-group">
                                                    <label for="sale-keyword">Keyword</label>
                                                    <input type="text" name="keywords" class="form-control" placeholder="Enter keyword" value="<?php echo @$_GET['keywords'] ?>">
                                                </div>
                                                <div class="col-md-3 form-group">
                                                    <label for="sale-range-feet">Price Range</label>
                                                    <div class="range-box col-md-11">
                                                        <input name="price_range" id="sale-range-feet" data-min="10" data-step="10" data-max="100000" data-prettify-separator="," data-prefix="&pound;" data-max-postfix="+" readonly="" value="<?php echo (@$_GET['purpose'] == 'student')? @$_GET['price_range'] : '' ?>" />
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
                        <!--</div>-->
                    </div>
                </div>

                <div class="container" style="padding-top: 24px;">
                    <div class="row">
                        <div class="col-md-10 col-sm-12 col-md-offset-1">
                            <img class="img-responsive" src="https://via.placeholder.com/1200x150?text=Advertisement">
                        </div>
                    </div>      
                </div>
                <!-- ====== PAGE CONTENT ====== -->
                <input type="hidden" id="page_number" name="page_number" value="<?php echo ($this->uri->segment('3') > 0)? $this->uri->segment('3') : 0; ?>">
                <div class="page-section">
                    <div class="container">
                        <!--                        <div class="row">
                            <div class="col-md-10 col-sm-12 col-md-offset-1">-->
                                <div class="panel filter-panel">
                                    <div class="panel-body">
                                        <h4 class="filter-title pull-left"><?php echo ($total_rows > 0) ? $total_rows . " Matches Found" : "No Result Found!"; ?> </h4>
                                        <form action="property-details.php" class="form-inline pull-right">
                                            <div class="form-group">
                                                <label>Sort By:</label>
                                                <select name="sort_by" class="form-control sort_by" data-url="<?php echo $_SERVER['QUERY_STRING']; ?>" >
                                                    <option value="4" data-order="DESC" data-on="time">Newest</option>
                                                    <option value="1" data-order="ASC" data-on="price">Lowest Price</option>
                                                    <option value="2" data-order="DESC" data-on="price">Highest Price</option>
                                                    <!-- <option value="3" data-order="ASC" data-on="budget">Popular</option> -->
                                                </select>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <?php
                                if (is_array($listings) && !empty($listings)) { ?>

                                <div id="listings_wrap">

                                <?php 
                                    foreach ($listings as $list) {
                                        ?>
                                        <div class="property-list archive-flex archive-with-footer">
                                            <div class="row" id="markers_info">
                                                <div class="col-md-12 marker">
                                                    <div class="property-item booking-item property-archive col-lg-12 col-md-12 col-md-6 col-sm-12">
                                                        <div class="row">
                                                            <div class="col-lg-5 col-sm-5 no-padding bg-white">
                                                                <a href="<?php echo base_url() . 'listing/detail/' . @$list['unique_id'] ?>" class="property-image listing-property-img">
                                                                    <img src="<?php
                                                                    echo!empty($list['image_name']) ?
                                                                    base_url() . 'assets/listing_images/' . @$list['image_name'] :
                                                                    "https://via.placeholder.com/350x150?text=No+Image+Here"
                                                                    ?>" alt="Post list 1" />
                                                                </a>
                                                                <!--<a href="property-details.php" class="btn-compare" title="Add to favourite"><i class="fa fa-heart"></i></a>-->
                                                            </div>
                                                            <div class="col-lg-7 col-sm-7 property-padding">
                                                                <div class="property-content listing-content">
                                                                    <div class="row">
                                                                        <div class="col-md-8 col-sm-8 col-xs-9">
                                                                            <h3 class="property-title"><a href="<?php echo base_url() . 'listing/detail/' . $list['unique_id']; ?>"><?php echo $list['title']; ?></a></h3>
                                                                        </div>
                                                                        <div class="col-md-4 col-sm-4 col-xs-3 text-right">
                                                                            <a href="<?php echo base_url(); ?>agent/<?php echo $list['agent_unique_id']; ?>">
                                                                                <img class="img-responsive agent-logo" style="width: 70px" src="<?php echo base_url(); ?>uploads/images/<?php echo $list['agency_image']; ?>">
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                    <p>
                                                                        <span class="property-price"><?php echo currency() . number_format($list['price']); ?><?php echo ($_GET['purpose'] == 'rent' || $_GET['purpose'] == 'student') ? " PCM" : ""; ?></span>
                                                                        <span class="property-label">
                                                                            <a href="javascript:void(0)" class="property-label__type" style="background: #ed193f">
                                                                                <?php 
                                                                                switch($list['purpose']){
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
                                                                            <a href="javascript:void(0)" class="property-label__type"><?php echo ucwords($list['property_type']); ?></a>
                                                                        </span>
                                                                    </p>
                                                                    <div class="property-address">
                                                                        <?php echo $list['location']; ?>
                                                                    </div>
                                                                    <div class="row feature-list-icon">
                                                                        <div class="col-md-5">
                                                                            <div class="contact-icon">
                                                                                <p>
                                                                                    <a href="tel:<?php echo $list['contact_phone']; ?>">
                                                                                        <i class="fa fa-phone"></i> <?php echo $list['contact_phone']; ?>
                                                                                    </a>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-7">
                                                                            <div class="contact-icon">
                                                                                <p>
                                                                                    <a href="mailto:<?php echo $list['contact_email']; ?>">
                                                                                        <i class="fa fa-envelope"></i><?php echo $list['contact_email']; ?>
                                                                                    </a>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <p class="property-description"><?php echo custom_substr(ucwords($list['description']),200); ?>
                                                                </p>
                                                                <div class="property-footer">
                                                                    <div class="item-wide"><span class="fi flaticon-wide"></span><?php echo $list['land_area'] . ' ' . getUnit($list['unit']); ?></div>
                                                                    <div class="item-room"><span class="fi flaticon-room"></span> <?php echo $list['no_of_bedrooms']; ?></div>
                                                                    <div class="item-bathroom"><span class="fi flaticon-bathroom"></span> <?php echo $list['no_of_bathrooms']; ?> </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
<!--                                    <a href="#" class="prev"></a>
                                    <span class="current">1</span>
                                    <a href="javascript:void(0)" class="page">2</a>
                                    <a href="javascript:void(0)" class="page">3</a>
                                    <a href="javascript:void(0)" class="page">4</a>
                                    <a href="javascript:void(0)" class="page">5</a>
                                    <a href="javascript:void(0)" class="next"></a>-->
                                    <?php
                                } ?>
                                </div>
                                <?php
                                if($links !=''){ ?>
                                    <div class="pagination">
                                        <?php echo $links; ?>
                                    </div>
                                <?php }
                                
                            }
                            ?>
                        <!--                            </div>
                        </div>-->
                    </div>
                </div>
            </div>
        </section>
        <?php $this->load->view('common/scripts'); ?>
        <?php $this->load->view('common/footer'); ?>
        <script>

            function FormatLongNumber(value) {
                if(value == 0) {
                  return 0;
              }
              else
              {
                    // for testing
                  //value = Math.floor(Math.random()*1001);

                  // hundreds
                  if(value <= 999){
                    return value;
                }
                  // thousands
                  else if(value >= 1000 && value <= 999999){
                    return (value / 1000) + 'K';
                }
                  // millions
                  else if(value >= 1000000 && value <= 999999999){
                    return (value / 1000000) + 'M';
                }
                  // billions
                  else if(value >= 1000000000 && value <= 999999999999){
                    return (value / 1000000000) + 'B';
                }
                else
                    return value;
            }
        }
        
        $(document).ready(function () {

            $('body').on('change', '.sort_by', function () {
                var search_url = $(this).attr("data-url");
                var order = $(this).find(':selected').attr("data-order");
                var sort_on = $(this).find(':selected').attr("data-on");
                var page_number = $("#page_number").val();
                if (search_url == undefined) {
                    return false;
                }
                // alert(search_url);
                // $('.loader_wrap').show();
                $.ajax({
                    url: '<?php echo base_url(); ?>listing/sort_listing',
                    type: 'post',
                    data: {search_url: search_url, order: order, sort_on: sort_on,page_number: page_number},
                    dataType: 'json',
                    success: function (status) {
                        // console.log(status.response);
                        if (status.msg == 'success') {
                            $("#listings_wrap").html(status.response);
                        }
                        // $('.loader_wrap').hide();
                    }
                });
            });

            $('.btn-submit').click(function () {
                var form_type = $(this).attr('data-type');
                    //                $('.nav-tabs li').each(function(){
                    //                   if($(this).hasClass('active'))
                    //                       var anchor = ($(this).find('a:first').attr('href'));
                    //                       //anchor = anchor.substring(1,anchor.length);
                    //                       $(anchor+"-field").(anchor);
                    //                });
                    $.ajax({
                        method: "post",
                        url: "<?php echo base_url() ?>listing/searchCriteria",
                        dataType: "json",
                        data: $("#search_form_" + form_type).serialize(),
                        success: function (status) {
                            if (status.msg == 'success') {
                                window.location.href = status.new_url;
                            } else if (status.msg == 'error') {
                                $.gritter.add({
                                    title: 'Error!',
                                    sticky: false,
                                    time: '15000',
                                    before_open: function () {
                                        if ($('.gritter-item-wrapper').length >= 3)
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
            
                //... map 
                var markers = [];
                var js_data = '<?php echo @json_encode($map_listings); ?>';
                var locations = JSON.parse(js_data);
//                var locations = [
//                    ['Title 1', 41.33847249573162, 19.78838835516433, '1'],
//                    ['Title 2', 41.32992324524446, 19.816238906745866, '2'],
//                ];
function initMap() {
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 6,
        center: {lat: 53.3781, lng: -2.4360},
        streetViewControl: false,
        mapTypeControl: false,
        fullscreenControl: true,
        scrollwheel: true,
        zoomControl: true,
        panControl: false
    });
    setMarkers(map);
}

function setMarkers(map) {
    for (var i = 0; i < locations.length; i++) {
        var loc = locations[i];
        var pw = ((loc['purpose'] == 'rent' || loc['purpose'] == 'student')?'PCM':'');
        // console.log(pw);
        var locationInfowindow = new google.maps.InfoWindow({
            content: '<div class="property-item" style="width: 300px;"><div class="img-box"><div class="property-label"><a href="javascript:void(0)" class="property-label__type">'+loc['property_type']+'</a></div><a href="<?php echo base_url().'listing/detail/'; ?>'+loc['unique_id']+'" class="img-box__image"><img src="<?php echo base_url().'assets/listing_images/'; ?>'+loc["image_name"]+'" alt="Property" class="img-responsive"></a></div><div class="property-content"><a href="<?php echo base_url().'listing/detail/'; ?>'+loc['unique_id']+'" class="property-title">'+loc["title"]+'</a><span class="item-price"><?php echo currency(); ?>'+loc["price"]+' '+pw+'</span><div class="property-address">'+loc["location"]+'</div></div></div>',
        });
                        //console.log(loc['longitude']);
                        var marker = new google.maps.Marker({
                            position: {lat: parseFloat(loc['latitude']), lng: parseFloat(loc['longitude'])},
                            map: map,
                            title: loc['title'],
                            icon: normalIcon(),
                            label: {
                                text: '<?php echo currency() ?>'+FormatLongNumber(parseInt(loc['price'])),
                                color: "white",
                                fontSize: "14px",
                                fontWeight: "bold"
                            },
                            zIndex: google.maps.Marker.MAX_ZINDEX + 1,
                            infowindow: locationInfowindow
                        });
                        markers.push(marker);
                        google.maps.event.addListener(marker, 'click', function () {
                            hideAllInfoWindows(map);
                            this.infowindow.open(map, this);
                        });
                        google.maps.event.addListener(marker, 'mouseover', function() {
                            console.log(marker);
                            this.setZIndex(100);
                            this.setIcon(highlightedIcon());
                            //alert(lengt);
                        });
                        google.maps.event.addListener(marker, 'mouseout', function() {
                            console.log(marker);
                            this.zIndex = '1';
                            this.setIcon(normalIcon());
                        });                        
                    }
                }
                function hideAllInfoWindows(map) {
                    markers.forEach(function (marker) {
                        marker.infowindow.close(map, marker);
                    });
                }
                // make a .hover event
                $('#markers_info .marker').hover(
                    // mouse in
                    function () {
                        // first we need to know which <div class="marker"></div> we hovered
                        var index = $('#markers_info .marker').index(this);
                        markers[index].label.color = 'black';
                        markers[index].setZIndex(100);
                        markers[index].setIcon(highlightedIcon());
                    },
                    // mouse out
                    function () {
                        // first we need to know which <div class="marker"></div> we hovered
                        var index = $('#markers_info .marker').index(this);
                        markers[index].label.color = 'white';
                        markers[index].setIcon(normalIcon());
                        markers[index].zIndex = '1';
                    }
                    );
                function normalIcon() {
                    return {
                        url: '<?php echo base_url(); ?>assets/images/marker.png',
                        scaledSize: new google.maps.Size(70, 80),
                        labelOrigin: new google.maps.Point(35, 28),
                    };
                }
                function highlightedIcon() {
                    return {
                        url: '<?php echo base_url(); ?>assets/images/marker_color.png',
                        scaledSize: new google.maps.Size(70, 80),
                        labelOrigin: new google.maps.Point(35, 28),
                    };
                }
                initMap();
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
