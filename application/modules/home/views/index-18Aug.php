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
                            <p class="description">Click For Sale, Rent or Student tab to start your property search</p>
                        </div>
                        <!-- Tabmenu Container / Default Bootstrap Structure -->
                        <div class="search-tabmenu">
                            <!-- Tabmenu Navigation -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="active"><a href="#for-sale" role="tab" data-toggle="tab" aria-expanded="false"><i class="fi flaticon-sale hidden-xs"></i> For Sale</a></li>
                                <li class=""><a href="#for-rent" role="tab" data-toggle="tab" aria-expanded="true"><i class="fi flaticon-rent hidden-xs"></i>Rent</a></li>
                                <li class=""><a href="#for-student" role="tab" data-toggle="tab" aria-expanded="true"><i class="fi flaticon-rent hidden-xs"></i>Student</a></li>
                            </ul>
                            <!-- Tabmenu Body / Content -->
                            <div class="tab-content">
                                <!-- Tabmenu Content 1 / Property For SALE -->
                                <div role="tabpanel" class="tab-pane active" id="for-sale">
                                    <form id="search_form" action="javascript:void(0)">
                                        <div class="form-body">
                                            <!-- Property for Sale Content Row 1 -->
                                            <div class="row">
                                                <div class="col-md-3 form-group">
                                                    <label for="sale-location">Property Location</label>
                                                    <input type="text" name="property_location" class="form-control" id="property_loc" placeholder="Any Location" />
                                                    <input type="hidden" name="lat_long" id="property_lat_long" value="" />
                                                </div>
                                                <div class="col-md-3 form-group">
                                                    <label for="sale-type">Property Type</label>
                                                    <select class="form-control" name="property_type">
                                                        <option value="">Select Property</option>
                                                        <option vlaue="terrace">Terrace</option>
                                                        <option vlaue="semi-detached">Semi detached</option>
                                                        <option vlaue="detached">Detached</option>
                                                        <option vlaue="flat">Flat</option>
                                                        <option vlaue="cottage">Cottage</option>
                                                        <option vlaue="villa">Villa</option>
                                                        <option vlaue="bungalow">Bungalow</option>
                                                        <option vlaue="land">Land</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-3 form-group">
                                                    <label for="sale-bedroom">Bed rooms</label>
                                                    <select class="form-control" name="no_of_bedrooms">
                                                        <option value="">Select any</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-3 form-group">
                                                    <label for="sale-garage">Bath rooms</label>
                                                    <select class="form-control" name="no_of_bathrooms">
                                                        <option value="">Select any</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- Property for Sale Content Row 2 -->
                                            <div class="row">
                                                <div class="col-md-3 form-group">
                                                    <label for="sale-bathroom">LIVING ROOMS</label>
                                                    <select class="form-control" name="no_of_living_rooms">
                                                        <option value="">Select any</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-3 form-group">
                                                    <label for="sale-keyword">Keyword</label>
                                                    <input type="text" name="keywords" class="form-control" placeholder="Enter keyword">
                                                </div>
                                                <div class="col-md-3 form-group">
                                                    <label for="sale-range-feet">Price Range</label>
                                                    <div class="range-box">
                                                        <input name="price_range" id="sale-range-feet" readonly="">
                                                    </div>
                                                </div>
                                                <div class="col-md-3 form-group">
                                                    <button class="btn btn-primary pull-right btn-submit" type="submit"><i class="fa fa-search"></i> Search</button>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Property for Sale Submit Button -->
                                    </form>
                                </div>
<!--                                <div role="tabpanel" class="tab-pane" id="for-rent">
                                    <form action="javascript:void(0)">
                                        <div class="form-body">
                                             Property for Sale Content Row 1 
                                            <div class="row">
                                                <div class="col-md-3 form-group">
                                                    <label for="sale-location">Property Location</label>
                                                    <input type="text" name="property_location" class="form-control" id="property_loc" placeholder="Any Location" />
                                                    <input type="hidden" name="lat_long" id="property_lat_long" value="" />
                                                </div>
                                                <div class="col-md-3 form-group">
                                                    <label for="sale-type">Property Type</label>
                                                    <select class="form-control" name="property_type">
                                                        <option>Select Property</option>
                                                        <option vlaue="terrace">Terrace</option>
                                                        <option vlaue="semi-detached">Semi detached</option>
                                                        <option vlaue="detached">Detached</option>
                                                        <option vlaue="flat">Flat</option>
                                                        <option vlaue="cottage">Cottage</option>
                                                        <option vlaue="villa">Villa</option>
                                                        <option vlaue="bungalow">Bungalow</option>
                                                        <option vlaue="land">Land</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-3 form-group">
                                                    <label for="sale-bedroom">Bed rooms</label>
                                                    <select class="form-control" name="no_of_bedrooms">
                                                        <option>Select any</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-3 form-group">
                                                    <label for="sale-garage">Bath rooms</label>
                                                    <select class="form-control" name="no_of_bathrooms">
                                                        <option>Select any</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>
                                            </div>
                                             Property for Sale Content Row 2 
                                            <div class="row">
                                                <div class="col-md-3 form-group">
                                                    <label for="sale-bathroom">LIVING ROOMS</label>
                                                    <select class="form-control" name="no_of_living_rooms">
                                                        <option>Select any</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-3 form-group">
                                                    <label for="sale-keyword">Keyword</label>
                                                    <input type="text" name="keywords" class="form-control" placeholder="Enter keyword">
                                                </div>
                                                <div class="col-md-3 form-group">
                                                    <label for="sale-range-feet">Price Range</label>
                                                    <div class="range-box">
                                                        <input name="price_range" id="sale-range-feet" readonly="">
                                                    </div>
                                                </div>
                                                <div class="col-md-3 form-group">
                                                    <button class="btn btn-primary pull-right btn-submit" type="submit"><i class="fa fa-search"></i> Search</button>
                                                </div>
                                            </div>
                                        </div>
                                         Property for Sale Submit Button 
                                    </form>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="for-student">
                                    <form action="javascript:void(0)">
                                        <div class="form-body">
                                             Property for Sale Content Row 1 
                                            <div class="row">
                                                <div class="col-md-3 form-group">
                                                    <label for="sale-location">Property Location</label>
                                                    <input type="text" name="property_location" class="form-control" id="property_loc" placeholder="Any Location" />
                                                    <input type="hidden" name="lat_long" id="property_lat_long" value="" />
                                                </div>
                                                <div class="col-md-3 form-group">
                                                    <label for="sale-type">Property Type</label>
                                                    <select class="form-control" name="property_type">
                                                        <option>Select Property</option>
                                                        <option vlaue="terrace">Terrace</option>
                                                        <option vlaue="semi-detached">Semi detached</option>
                                                        <option vlaue="detached">Detached</option>
                                                        <option vlaue="flat">Flat</option>
                                                        <option vlaue="cottage">Cottage</option>
                                                        <option vlaue="villa">Villa</option>
                                                        <option vlaue="bungalow">Bungalow</option>
                                                        <option vlaue="land">Land</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-3 form-group">
                                                    <label for="sale-bedroom">Bed rooms</label>
                                                    <select class="form-control" name="no_of_bedrooms">
                                                        <option>Select any</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-3 form-group">
                                                    <label for="sale-garage">Bath rooms</label>
                                                    <select class="form-control" name="no_of_bathrooms">
                                                        <option>Select any</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>
                                            </div>
                                             Property for Sale Content Row 2 
                                            <div class="row">
                                                <div class="col-md-3 form-group">
                                                    <label for="sale-bathroom">LIVING ROOMS</label>
                                                    <select class="form-control" name="no_of_living_rooms">
                                                        <option>Select any</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-3 form-group">
                                                    <label for="sale-keyword">Keyword</label>
                                                    <input type="text" name="keywords" class="form-control" placeholder="Enter keyword">
                                                </div>
                                                <div class="col-md-3 form-group">
                                                    <label for="sale-range-feet">Price Range</label>
                                                    <div class="range-box">
                                                        <input name="price_range" id="sale-range-feet" readonly="">
                                                    </div>
                                                </div>
                                                <div class="col-md-3 form-group">
                                                    <button class="btn btn-primary pull-right btn-submit" type="submit"><i class="fa fa-search"></i> Search</button>
                                                </div>
                                            </div>
                                        </div>
                                         Property for Sale Submit Button 
                                    </form>
                                </div>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ====== PAGE BUILDER TEMPLATE ====== -->
        <section id="best-deals" class="page-section">
            <div class="container">
                <!-- Section Title -->
                <div class="section-header header-column">
                    <h2 class="section-title">FEATURED PROPERTIES</h2>
                </div>
                <div class="featured-property-slider">
                    <div class="property-item property-archive">
                        <div class="row row-eq-height">
                            <div class="col-md-6">
                                <a href="property-details.php" class="property-image">
                                    <img src="assets/images/index_4_slider_3.jpg" alt="Post list 1">
                                </a>
                                <a href="property-details.php" class="btn-compare" title="Add to favourite"><i class="fa fa-heart"></i></a>
                            </div>
                            <div class="col-md-6">
                                <div class="property-content">
                                    <div class="row">
                                        <div class="col-md-9 col-sm-9 col-xs-9">
                                            <h3 class="property-title"><a href="property-details.php">Private west hollywood with groove area</a></h3>
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-3 text-right">
                                            <img class="img-responsive agent-logo" src="assets/images/sale-logo.png">
                                        </div>
                                    </div>
                                    <p>
                                        <span class="property-price">&pound;10,000</span>
                                        <span class="property-label">
                                            <a href="property-details.php" class="property-label__type">Flat</a>
                                        </span>
                                    </p>
                                    <div class="property-address">
                                        South Adelaide, <a href="property-details.php">Adelaide</a>
                                    </div>
                                    <div class="row feature-list-icon">
                                        <div class="col-md-6">
                                            <div class="contact-icon">
                                                <p><i class="fa fa-phone"></i> +44 1772 913303</p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="contact-icon">
                                                <p><i class="fa fa-envelope"></i>&nbsp;example@gmail.com</p>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="property-descriptio">The big balcony is a great spot for a morning coffee while. It’s large enough Lorem Ipsum is simply dummy text .It’s large enough Lorem Ipsum is simply dummy text .</p>
                                    <div class="property-footer">
                                        <div class="item-wide"><span class="fi flaticon-wide"></span> 720 m<sup>2</sup></div>
                                        <div class="item-room"><span class="fi flaticon-room"></span> 4</div>
                                        <div class="item-bathroom"><span class="fi flaticon-bathroom"></span> 3</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="property-item property-archive">
                        <div class="row row-eq-height">
                            <div class="col-md-6">
                                <a href="property-details.php" class="property-image">
                                    <img src="assets/images/index_6_property_8.jpg" alt="Post list 2">
                                </a>
                                <a href="property-details.php" class="btn-compare" title="Add to favourite"><i class="fa fa-heart"></i></a>
                            </div>
                            <div class="col-md-6">
                                <div class="property-content">
                                    <div class="row">
                                        <div class="col-md-9 col-sm-9 col-xs-9">
                                            <h3 class="property-title"><a href="property-details.php">Cozy springs villa with mid century charm</a></h3>
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-3 text-right">
                                            <img class="img-responsive agent-logo" src="assets/images/sale_2.png">
                                        </div>
                                    </div>
                                    <p>
                                        <span class="property-price">&pound;20,000</span>
                                        <span class="property-label">
                                            <a href="property-details.php" class="property-label__type">Appartment</a>
                                        </span>
                                    </p>
                                    <div class="property-address">
                                        Santa Cruz Blvd, <a href="property-details.php">Brisbane</a>
                                    </div>
                                    <div class="row feature-list-icon">
                                        <div class="col-md-6">
                                            <div class="contact-icon">
                                                <p><i class="fa fa-phone"></i> +44 1772 913303</p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="contact-icon">
                                                <p><i class="fa fa-envelope"></i>&nbsp;example@gmail.com</p>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="property-descriptio">The big balcony is a great spot for a morning coffee while lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                    <div class="property-footer">
                                        <div class="item-wide"><span class="fi flaticon-wide"></span> 720 m<sup>2</sup></div>
                                        <div class="item-room"><span class="fi flaticon-room"></span> 4</div>
                                        <div class="item-bathroom"><span class="fi flaticon-bathroom"></span> 3</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="property-item property-archive">
                        <div class="row row-eq-height">
                            <div class="col-md-6">
                                <a href="property-details.php" class="property-image">
                                    <img src="assets/images/index_4_slider_2.jpg" alt="Post list 3">
                                </a>
                                <a href="property-details.php" class="btn-compare" title="Add to favourite"><i class="fa fa-heart"></i></a>
                            </div>
                            <div class="col-md-6">
                                <div class="property-content">
                                    <div class="row">
                                        <div class="col-md-9 col-sm-9 col-xs-9">
                                            <h3 class="property-title"><a href="property-details.php">Perfect room in perfect malibu beach</a></h3>
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-3 text-right">
                                            <img class="img-responsive agent-logo" src="assets/images/sale-logo.png">
                                        </div>
                                    </div>
                                    <p>
                                        <span class="property-price">&pound;40,000</span>
                                        <span class="property-label">
                                            <a href="property-details.php" class="property-label__type">Land</a>
                                        </span>
                                    </p>
                                    <div class="property-address">
                                        W 76th St, <a href="property-details.php">Sidney</a>
                                    </div>
                                    <div class="row feature-list-icon">
                                        <div class="col-md-6">
                                            <div class="contact-icon">
                                                <p><i class="fa fa-phone"></i> +44 1772 913303</p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="contact-icon">
                                                <p><i class="fa fa-envelope"></i>&nbsp;example@gmail.com</p>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="property-descriptio">The big balcony is a great spot for a morning coffee while pondering the surf. It’s large enough. It’s large enough Lorem Ipsum is simply dummy text .
                                        It’s large enough Lorem Ipsum is simply dummy text .</p>
                                    <div class="property-footer">
                                        <div class="item-wide"><span class="fi flaticon-wide"></span> 720 m<sup>2</sup></div>
                                        <div class="item-room"><span class="fi flaticon-room"></span> 4</div>
                                        <div class="item-bathroom"><span class="fi flaticon-bathroom"></span> 3</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ====== Latest Listings ====== -->
        <section id="featured-room" class="page-section no-padding">
            <div class="container">
                <!-- Section Header / Title with Column Slider Control / Add 'header-column' to use this style -->
                <div class="section-header header-column">
                    <h2 class="section-title">Latest Properties</h2>
                </div>
                <div class="property-list archive-flex">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <!-- Property Item -->
                            <div class="property-item">
                                <div class="property-heading">
                                    <span class="item-price">&pound;22,500</span>
                                    <a href="property-details.php" class="item-detail btn">Detail <i class="fi flaticon-detail"></i></a>
                                </div>
                                <div class="img-box">
                                    <div class="property-label">
                                        <a href="property-details.php" class="property-label__type">Apartment</a>
                                    </div>
                                    <a href="property-details.php" class="btn-compare" title="Add to favourite"><i class="fa fa-heart"></i></a>
                                    <a href="property-details.php" class="img-box__image"><img src="assets/images/index_6_property_1.jpg" alt="" class="img-responsive"></a>
                                </div>
                                <div class="property-content">
                                    <a href="property-details.php" class="property-title">Cozy springs villa with mid century charm</a>
                                    <div class="property-address">
                                        South Adelaide, <a href="property-details.php" class="property-label__location">Adelaide</a>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8 col-sm-8 col-xs-8">
                                            <div class="contact-icon">
                                                <p><i class="fa fa-phone"></i> +44 1772 913303</p>
                                                <p><i class="fa fa-envelope"></i>&nbsp;example@gmail.com</p>		
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-4 col-xs-4">
                                            <img class="img-responsive agent-logo" src="assets/images/sale-logo.png">
                                        </div>
                                    </div>
                                    <div class="property-footer">
                                        <div class="item-wide"><span class="fi flaticon-wide"></span> 720 m<sup>2</sup></div>
                                        <div class="item-room"><span class="fi flaticon-room"></span> 4</div>
                                        <div class="item-bathroom"><span class="fi flaticon-bathroom"></span> 3</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <!-- Property Item -->
                            <div class="property-item">
                                <div class="property-heading">
                                    <span class="item-price">&pound;10,000</span>
                                    <a href="property-details.php" class="item-detail btn">Detail <i class="fi flaticon-detail"></i></a>
                                </div>
                                <div class="img-box">
                                    <div class="property-label">
                                        <a href="property-details.php" class="property-label__type">Terrace</a>
                                    </div>
                                    <a href="property-details.php" class="btn-compare" title="Add to favourite"><i class="fa fa-heart"></i></a>
                                    <a href="property-details.php" class="img-box__image"><img src="assets/images/index_6_property_4.jpg" alt="" class="img-responsive"></a>
                                </div>
                                <div class="property-content">
                                    <a href="property-details.php" class="property-title">Perfect room in perfect malibu beach</a>
                                    <div class="property-address">
                                        W 76th St, <a href="property-details.php" class="property-label__location">Sydney</a>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8 col-sm-8 col-xs-8">
                                            <div class="contact-icon">
                                                <p><i class="fa fa-phone"></i> +44 1772 913303</p>
                                                <p><i class="fa fa-envelope"></i>&nbsp;example@gmail.com</p>		
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-4 col-xs-4">
                                            <img class="img-responsive agent-logo" src="assets/images/sale_2.png">
                                        </div>
                                    </div>
                                    <div class="property-footer">
                                        <div class="item-wide"><span class="fi flaticon-wide"></span> 720 m<sup>2</sup></div>
                                        <div class="item-room"><span class="fi flaticon-room"></span> 4</div>
                                        <div class="item-bathroom"><span class="fi flaticon-bathroom"></span> 3</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <!-- Property Item -->
                            <div class="property-item">
                                <div class="property-heading">
                                    <span class="item-price">&pound;20,000</span>
                                    <a href="property-details.php" class="item-detail btn">Detail <i class="fi flaticon-detail"></i></a>
                                </div>
                                <div class="img-box">
                                    <div class="property-label">
                                        <a href="property-details.php" class="property-label__type">Semi detached</a>
                                    </div>
                                    <a href="property-details.php" class="btn-compare" title="Add to favourite"><i class="fa fa-heart"></i></a>
                                    <a href="property-details.php" class="img-box__image"><img src="assets/images/index_6_property_3.jpg" alt="" class="img-responsive"></a>
                                </div>
                                <div class="property-content">
                                    <a href="property-details.php" class="property-title">Private west hollywood with groove area</a>
                                    <div class="property-address">
                                        Santa Cruz Blvd, <a href="property-details.php">Brisbane</a>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8 col-sm-8 col-xs-8">
                                            <div class="contact-icon">
                                                <p><i class="fa fa-phone"></i> +44 1772 913303</p>
                                                <p><i class="fa fa-envelope"></i>&nbsp;example@gmail.com</p>		
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-4 col-xs-4">
                                            <img class="img-responsive agent-logo" src="assets/images/sale-logo.png">
                                        </div>
                                    </div>
                                    <div class="property-footer">
                                        <div class="item-wide"><span class="fi flaticon-wide"></span> 720 m<sup>2</sup></div>
                                        <div class="item-room"><span class="fi flaticon-room"></span> 4</div>
                                        <div class="item-bathroom"><span class="fi flaticon-bathroom"></span> 3</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <!-- Property Item -->
                            <div class="property-item">
                                <div class="property-heading">
                                    <span class="item-price">&pound;35,000</span>
                                    <a href="property-details.php" class="item-detail btn">Detail <i class="fi flaticon-detail"></i></a>
                                </div>
                                <div class="img-box">
                                    <div class="property-label">
                                        <a href="property-details.php" class="property-label__type">Land</a>
                                    </div>
                                    <a href="property-details.php" class="btn-compare" title="Add to favourite"><i class="fa fa-heart"></i></a>
                                    <a href="property-details.php" class="img-box__image"><img src="assets/images/index_6_property_5.jpg" alt="" class="img-responsive"></a>
                                </div>
                                <div class="property-content">
                                    <a href="property-details.php" class="property-title">A hidden Paradise with beautiful furnished bed</a>
                                    <div class="property-address">
                                        Northern Perth, <a href="property-details.php">Perth</a>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8 col-sm-8 col-xs-8">
                                            <div class="contact-icon">
                                                <p><i class="fa fa-phone"></i> +44 1772 913303</p>
                                                <p><i class="fa fa-envelope"></i>&nbsp;example@gmail.com</p>		
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-4 col-xs-4">
                                            <img class="img-responsive agent-logo" src="assets/images/sale_2.png">
                                        </div>
                                    </div>
                                    <div class="property-footer">
                                        <div class="item-wide"><span class="fi flaticon-wide"></span> 720 m<sup>2</sup></div>
                                        <div class="item-room"><span class="fi flaticon-room"></span> 4</div>
                                        <div class="item-bathroom"><span class="fi flaticon-bathroom"></span> 3</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <!-- Property Item -->
                            <div class="property-item">
                                <div class="property-heading">
                                    <span class="item-price">&pound;15,000</span>
                                    <a href="property-details.php" class="item-detail btn">Detail <i class="fi flaticon-detail"></i></a>
                                </div>
                                <div class="img-box">
                                    <div class="property-label">
                                        <a href="property-details.php" class="property-label__type"> Detached</a>
                                    </div>
                                    <a href="property-details.php" class="btn-compare" title="Add to favourite"><i class="fa fa-heart"></i></a>
                                    <a href="property-details.php" class="img-box__image"><img src="assets/images/index_4_slider_2.jpg" alt="" class="img-responsive"></a>
                                </div>
                                <div class="property-content">
                                    <a href="property-details.php" class="property-title">30,000 steps to beach, perfect location for Honeymon</a>
                                    <div class="property-address">
                                        W 76th St, <a href="property-details.php">Perth</a>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8 col-sm-8 col-xs-8">
                                            <div class="contact-icon">
                                                <p><i class="fa fa-phone"></i> +44 1772 913303</p>
                                                <p><i class="fa fa-envelope"></i>&nbsp;example@gmail.com</p>		
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-4 col-xs-4">
                                            <img class="img-responsive agent-logo" src="assets/images/sale-logo.png">
                                        </div>
                                    </div>
                                    <div class="property-footer">
                                        <div class="item-wide"><span class="fi flaticon-wide"></span> 720 m<sup>2</sup></div>
                                        <div class="item-room"><span class="fi flaticon-room"></span> 4</div>
                                        <div class="item-bathroom"><span class="fi flaticon-bathroom"></span> 3</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <!-- Property Item -->
                            <div class="property-item">
                                <div class="property-heading">
                                    <span class="item-price">&pound;40,000</span>
                                    <a href="property-details.php" class="item-detail btn">Detail <i class="fi flaticon-detail"></i></a>
                                </div>
                                <div class="img-box">
                                    <div class="property-label">
                                        <a href="property-details.php" class="property-label__type"> Commercial</a>
                                    </div>
                                    <a href="property-details.php" class="btn-compare" title="Add to favourite"><i class="fa fa-heart"></i></a>
                                    <a href="property-details.php" class="img-box__image"><img src="assets/images/small-balcony.jpg" alt="" class="img-responsive"></a>
                                </div>
                                <div class="property-content">
                                    <a href="property-details.php" class="property-title">Douro Villa with Swimming Pool FURNISHED BED</a>
                                    <div class="property-address">
                                        Santa Cruz Blvd, <a href="property-details.php">Melbourne</a>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8 col-sm-8 col-xs-8">
                                            <div class="contact-icon">
                                                <p><i class="fa fa-phone"></i> +44 1772 913303</p>
                                                <p><i class="fa fa-envelope"></i>&nbsp;example@gmail.com</p>		
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-4 col-xs-4">
                                            <img class="img-responsive agent-logo" src="assets/images/sale_2.png">
                                        </div>
                                    </div>
                                    <div class="property-footer">
                                        <div class="item-wide"><span class="fi flaticon-wide"></span> 720 m<sup>2</sup></div>
                                        <div class="item-room"><span class="fi flaticon-room"></span> 4</div>
                                        <div class="item-bathroom"><span class="fi flaticon-bathroom"></span> 3</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <!-- Property Item -->
                            <div class="property-item">
                                <div class="property-heading">
                                    <span class="item-price">&pound;50,000</span>
                                    <a href="property-details.php" class="item-detail btn">Detail <i class="fi flaticon-detail"></i></a>
                                </div>
                                <div class="img-box">
                                    <div class="property-label">
                                        <a href="property-details.php" class="property-label__type">Apartment</a>
                                    </div>
                                    <a href="property-details.php" class="btn-compare" title="Add to favourite"><i class="fa fa-heart"></i></a>
                                    <a href="property-details.php" class="img-box__image"><img src="assets/images/storage_5.jpg" alt="" class="img-responsive"></a>
                                </div>
                                <div class="property-content">
                                    <a href="property-details.php" class="property-title">Stunning mid century west beach villa</a>
                                    <div class="property-address">
                                        W 76th St, <a href="property-details.php">Darwin</a>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8 col-sm-8 col-xs-8">
                                            <div class="contact-icon">
                                                <p><i class="fa fa-phone"></i> +44 1772 913303</p>
                                                <p><i class="fa fa-envelope"></i>&nbsp;example@gmail.com</p>		
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-4 col-xs-4">
                                            <img class="img-responsive agent-logo" src="assets/images/sale-logo.png">
                                        </div>
                                    </div>
                                    <div class="property-footer">
                                        <div class="item-wide"><span class="fi flaticon-wide"></span> 720 m<sup>2</sup></div>
                                        <div class="item-room"><span class="fi flaticon-room"></span> 4</div>
                                        <div class="item-bathroom"><span class="fi flaticon-bathroom"></span> 3</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <!-- Property Item -->
                            <div class="property-item">
                                <div class="property-heading">
                                    <span class="item-price">&pound;60,000</span>
                                    <a href="property-details.php" class="item-detail btn">Detail <i class="fi flaticon-detail"></i></a>
                                </div>
                                <div class="img-box">
                                    <div class="property-label">
                                        <a href="property-details.php" class="property-label__type">Flat</a>
                                    </div>
                                    <a href="property-details.php" class="btn-compare" title="Add to favourite"><i class="fa fa-heart"></i></a>
                                    <a href="property-details.php" class="img-box__image"><img src="assets/images/balcony_2.jpg" alt="" class="img-responsive"></a>
                                </div>
                                <div class="property-content">
                                    <a href="property-details.php" class="property-title">Lakefront Condo with Million Dollar Views</a>
                                    <div class="property-address">
                                        Santa Cruz Blvd, <a href="property-details.php">Brisbane</a>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8 col-sm-8 col-xs-8">
                                            <div class="contact-icon">
                                                <p><i class="fa fa-phone"></i> +44 1772 913303</p>
                                                <p><i class="fa fa-envelope"></i>&nbsp;example@gmail.com</p>		
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-4 col-xs-4">
                                            <img class="img-responsive agent-logo" src="assets/images/sale_2.png">
                                        </div>
                                    </div>
                                    <div class="property-footer">
                                        <div class="item-wide"><span class="fi flaticon-wide"></span> 720 m<sup>2</sup></div>
                                        <div class="item-room"><span class="fi flaticon-room"></span> 4</div>
                                        <div class="item-bathroom"><span class="fi flaticon-bathroom"></span> 3</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <!-- Property Item -->
                            <div class="property-item">
                                <div class="property-heading">
                                    <span class="item-price">&pound;20,000</span>
                                    <a href="property-details.php" class="item-detail btn">Detail <i class="fi flaticon-detail"></i></a>
                                </div>
                                <div class="img-box">
                                    <div class="property-label">
                                        <a href="property-details.php" class="property-label__type">Terrace</a>
                                    </div>
                                    <a href="property-details.php" class="btn-compare" title="Add to favourite"><i class="fa fa-heart"></i></a>
                                    <a href="property-details.php" class="img-box__image"><img src="assets/images/index_6_property_7.jpg" alt="" class="img-responsive"></a>
                                </div>
                                <div class="property-content">
                                    <a href="property-details.php" class="property-title">Stunning mid century west beach villa</a>
                                    <div class="property-address">
                                        W 76th St, <a href="property-details.php">Darwin</a>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8 col-sm-8 col-xs-8">
                                            <div class="contact-icon">
                                                <p><i class="fa fa-phone"></i> +44 1772 913303</p>
                                                <p><i class="fa fa-envelope"></i>&nbsp;example@gmail.com</p>		
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-4 col-xs-4">
                                            <img class="img-responsive agent-logo" src="assets/images/sale-logo.png">
                                        </div>
                                    </div>
                                    <div class="property-footer">
                                        <div class="item-wide"><span class="fi flaticon-wide"></span> 720 m<sup>2</sup></div>
                                        <div class="item-room"><span class="fi flaticon-room"></span> 4</div>
                                        <div class="item-bathroom"><span class="fi flaticon-bathroom"></span> 3</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ====== TESTIMONY SECTION ====== -->
        <section id="testimony" class="page-section bg-image" style="background-image: url(assets/images/main_default.jpg);">
            <div class="container">
                <!-- Section Header / Title with Column Slider Control / Add 'header-column' to use this style -->
                <div class="section-header header-column">
                    <h2 class="section-title">What they say about us</h2>
                    <!-- Slider Control -->
                    <div class="slide-control">
                        <button id="content-left" class="slide-left content-left"><i class="fa fa-angle-left"></i></button>
                        <button id="content-right" class="slide-right content-right"><i class="fa fa-angle-right"></i></button>
                    </div>
                </div>
                <!-- Testimony Slider Content -->
                <div id="content-slider" class="content-slider testimony-wrapper">
                    <!-- Testimony Slider Item -->
                    <div class="slider-item">
                        <!-- Testimony Left -->
                        <div class="testimony-item item-left">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="testimony-profile">
                                        <img src="assets/images/img_author_1.jpg" alt="John Doe">
                                        <h5>Rooney Doe</h5>
                                        <span>Melbourne Creative Departement</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="testimony-text">
                                        <p>Simple and clean-easy to customize, the demo is so close to what I need. This theme can read my mind. AMAZING!</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Testimony Right -->
                        <div class="testimony-item item-right">
                            <div class="row">
                                <div class="col-md-3 col-md-push-6 col-md-offset-3">
                                    <div class="testimony-profile">
                                        <img src="assets/images/img_author_2.jpg" alt="John Doe">
                                        <h5>Gerrard Doe</h5>
                                        <span>Adelaide Creative Departement</span>
                                    </div>
                                </div>
                                <div class="col-md-6 col-md-pull-3">
                                    <div class="testimony-text">
                                        <p>I recommend this theme to anyone looking for a property theme with booking feature. VERY RECOMMENDED.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Testimony Slider Item -->
                    <div class="slider-item">
                        <!-- Testimony Left -->
                        <div class="testimony-item item-left">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="testimony-profile">
                                        <img src="assets/images/img_author_3.jpg" alt="John Doe">
                                        <h5>John Doe</h5>
                                        <span>Darwin Creative Departement</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="testimony-text">
                                        <p>Simple and clean-easy to customize, the demo is so close to what I need. This theme can read my mind. AMAZING!</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Testimony Right -->
                        <div class="testimony-item item-right">
                            <div class="row">
                                <div class="col-md-3 col-md-push-6 col-md-offset-3">
                                    <div class="testimony-profile">
                                        <img src="assets/images/img_author_4.jpg" alt="John Doe">
                                        <h5>Lampard Doe</h5>
                                        <span>Perth Creative Departement</span>
                                    </div>
                                </div>
                                <div class="col-md-6 col-md-pull-3">
                                    <div class="testimony-text">
                                        <p>I recommend this theme to anyone looking for a property theme with booking feature. VERY RECOMMENDED.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php $this->load->view('common/scripts'); ?>
        <?php $this->load->view('common/footer'); ?>
        <script>
        $(document).ready(function(){
            $('.nav-tabs li a').click(function (){
                var tab = $(this).attr('href');
                $.ajax({
                    method: "get",
                    url: "<?php echo base_url() ?>home/getSearchForm",
                    type: "json",
                    success: function(status){
                        $('.tab-pane').html('');
                        $(tab).html(status);
                    }
                });
            });
            
            
            
            $('.btn-submit').click(function (){
                $.ajax({
                    method: "post",
                    url: "<?php echo base_url() ?>listing/search_listing",
                    type: "json",
                    data: $("#search_form").serialize(),
                    success: function(status){
                        
                    }
                });
            });
        });
        
        
        </script>
    </body>
</html>
