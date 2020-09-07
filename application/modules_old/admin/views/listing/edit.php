<?php $this->load->view('admin_common/header'); ?>
<!-- BEGIN HEADER & CONTENT DIVIDER -->
<div class="clearfix"> </div>
<!-- END HEADER & CONTENT DIVIDER -->
<!-- BEGIN CONTAINER -->
<div class="page-container">
    <?php $this->load->view('admin_common/sidebar'); ?>
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content" id="booking-sheet">
            <div class="row">
                <?php if($this->session->flashdata('success_msg') != ''){ ?>
                <div class="alert alert-success"><?php echo $this->session->flashdata('success_msg'); ?></div>
                <?php } ?>
                <?php if($this->session->flashdata('error_msg') != ''){ ?>
                <div class="alert alert-danger"><?php echo $this->session->flashdata('error_msg'); ?></div>
                <?php } ?>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="portlet box blue-hoki">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-gift"></i>Edit Property </div>
                            </div>
                            <div class="portlet-body form">
                                <form action="<?php echo base_url(); ?>admin/listing/update" id="add_form" method="POST" class="form-horizontal" enctype='multipart/form-data'>
                                    <div class="form-body">
                                        <div class="form-group">
                                            <div class="col-md-3">
                                                <h3>Seller Basic</h3>
                                            </div>
                                        </div>
                                        <input type="hidden" name="sell_id" value="<?php echo $listing['sell_id'] ?>">
                                        <input type="hidden" name="user_id" value="<?php echo $listing['user_id'] ?>">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Contact Name:</label>
                                            <div class="col-md-8">
                                                <input type="text" name="contact_name" class="form-control" value="<?php echo $listing['contact_name'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Contact Email:</label>
                                            <div class="col-md-8">
                                                <input type="text" name="contact_email" class="form-control" value="<?php echo $listing['contact_email'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Home Address:</label>
                                            <div class="col-md-8">
                                                <input type="text" name="home_address" class="form-control" value="<?php echo $listing['home_address'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Schedule your home inspection:</label>
                                            <div class="col-md-8">
                                                <div class="col-md-4">
                                                    <label>Date</label>
                                                    <input type="text" name="contact_date" class="date-picker form-control" value="<?php echo date('m/d/Y', strtotime($listing['contact_date'])) ?>">
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Start Time</label>
                                                    <input type="text" name="start_time" class="form-control" value="<?php echo $listing['start_time'] ?>">
                                                </div>
                                                <div class="col-md-4">
                                                    <label>End Time</label>
                                                    <input type="text" name="end_time" class="form-control" value="<?php echo $listing['end_time'] ?>">
                                                </div>
                                                <div class="col-md-4"></div>
                                                <div class="col-md-4"></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Do you have any special instruction for Inspecting Agent?:</label>
                                            <div class="col-md-8">
                                                <textarea rows="5" class="form-control" name="instruction_to_buyer"><?php echo $listing['instruction_to_buyer'] ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Property Type:</label>
                                            <div class="col-md-8">
                                                <select class="form-control" name="property_id">
                                                    <?php $property = getAll('ref_property_type');
                                                    foreach ($property as $type) {
                                                        if ($type['id'] == $listing['property_id']) {
                                                            $check = "selected";
                                                        }
                                                        else{
                                                            $check = "";
                                                        }
                                                        ?>
                                                        <option <?php echo $check; ?> value="<?php echo $type['id'] ?>"><?php echo $type['property_type'] ?>
                                                        </option>
                                                        <?php 
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Bedrooms:</label>
                                            <div class="col-md-8">
                                                <select class="form-control" name="bedrooms">
                                                    <option <?php echo ($listing['bedrooms'] == 1)? "selected":""; ?> value="1">1</option>
                                                    <option <?php echo ($listing['bedrooms'] == 2)? "selected":""; ?>  value="2">2</option>
                                                    <option <?php echo ($listing['bedrooms'] == 3)? "selected":""; ?>  value="3">3</option>
                                                    <option <?php echo ($listing['bedrooms'] == 4)? "selected":""; ?>  value="4">4</option>
                                                    <option <?php echo ($listing['bedrooms'] == 5)? "selected":""; ?>  value="5">5</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Bathrooms:</label>
                                            <div class="col-md-8">
                                                <select class="form-control" name="bathrooms">
                                                    <option <?php echo ($listing['bathrooms'] == 1)? "selected":""; ?> value="1">1</option>
                                                    <option <?php echo ($listing['bathrooms'] == 2)? "selected":""; ?>  value="2">2</option>
                                                    <option <?php echo ($listing['bathrooms'] == 3)? "selected":""; ?>  value="3">3</option>
                                                    <option <?php echo ($listing['bathrooms'] == 4)? "selected":""; ?>  value="4">4</option>
                                                    <option <?php echo ($listing['bathrooms'] == 5)? "selected":""; ?>  value="5">5</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Partial Baths:</label>
                                            <div class="col-md-8">
                                                <select class="form-control" name="partial_baths">
                                                    <option <?php echo ($listing['partial_baths'] == 1)? "selected":""; ?> value="1">1</option>
                                                    <option <?php echo ($listing['partial_baths'] == 2)? "selected":""; ?>  value="2">2</option>
                                                    <option <?php echo ($listing['partial_baths'] == 3)? "selected":""; ?>  value="3">3</option>
                                                    <option <?php echo ($listing['partial_baths'] == 4)? "selected":""; ?>  value="4">4</option>
                                                    <option <?php echo ($listing['partial_baths'] == 5)? "selected":""; ?>  value="5">5</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Square Feet:</label>
                                            <div class="col-md-8">
                                            <input type="text" name="square_feet" class="form-control numberonly" value="<?php echo $listing['square_feet'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Lot Size(sqft):</label>
                                            <div class="col-md-8">
                                                <input type="text" name="lotsize_sqft" class="form-control numberonly" value="<?php echo $listing['lotsize_sqft'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Year Build:</label>
                                            <div class="col-md-8">
                                                <input type="text" name="yearbuilt" class="form-control numberonly" value="<?php echo $listing['yearbuilt'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Occupancy:</label>
                                            <div class="col-md-8">
                                                <select class="form-control" name="occupancy_id">
                                                    <?php $occupancy = getAll('ref_occupancy');
                                                    foreach ($occupancy as $type) {
                                                        if ($type['id'] == $listing['occupancy_id']) {
                                                            $check = "selected";
                                                        }else{
                                                            $check = "";
                                                        }
                                                        ?>
                                                        <option <?php echo $check; ?> value="<?php echo $type['id'] ?>"><?php echo $type['occupancy'] ?></option>
                                                        <?php 
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Lease Option:</label>
                                            <div class="col-md-8">
                                                <select class="form-control" name="lease_option">
                                                    <option <?php echo ($listing['lease_option'] == 'Y')?"selected":"" ?> value="Y">Yes</option>
                                                    <option <?php echo ($listing['lease_option'] == 'N')?"selected":"" ?> value="N">No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">What’s great about your home?:</label>
                                            <div class="col-md-8">
                                                <input class="form-control" type="text" name="about_home" value="<?php echo $listing['about_home'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Home Description:</label>
                                            <div class="col-md-8">
                                                <textarea rows="5" class="form-control" name="home_desc"><?php echo $listing['home_desc'] ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">What Do you think your home is worth:</label>
                                            <div class="col-md-8">
                                                <input class="form-control" type="text" name="home_worth" id="home_worth" value="<?php echo number_format($listing['home_worth']) ?>">
                                            </div>
                                        </div>
                                        <!-- <div class="form-group">
                                            <label class="col-md-3 control-label">How much money do you want the Tenant Buyer to put down towards the purchase price:</label>
                                            <div class="col-md-8">
                                                <select class="form-control" name="concession_percentage">
                                                    <option <?php echo ($listing['concession_percentage'] == 1)?"selected":""; ?> value="1">%</option>
                                                    <option <?php echo ($listing['concession_percentage'] == 2)?"selected":""; ?> value="2">1%</option>
                                                    <option <?php echo ($listing['concession_percentage'] == 3)?"selected":""; ?> value="3">2%</option>
                                                </select>
                                            </div>
                                        </div> -->
                                        <hr>
                                        <div class="form-group">
                                            <div class="col-md-3">
                                                <h3>Community</h3>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Do you have an HOA:</label>
                                            <div class="col-md-8">
                                                <label class="mt-checkbox">
                                                    <input <?php echo ($listing['hoa_check'] == "Y")?"checked":""; ?> type="radio" name="hoa_check" value="Y"> Yes
                                                    <span></span>
                                                </label>
                                                <label class="mt-checkbox">
                                                    <input <?php echo ($listing['hoa_check'] == "N")?"checked":""; ?> type="radio" name="hoa_check" value="N"> No
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Elementary School District:</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" name="esd" value="<?php echo $listing['esd'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">High School District:</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" name="hsd" value="<?php echo $listing['hsd'] ?>">
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <div class="col-md-3">
                                                <h3>Interior</h3>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Fireplace:</label>
                                            <div class="col-md-8">
                                                <select class="form-control" name="fireplace_id">
                                                    <?php $fireplace = getAll('ref_fireplace');
                                                    foreach ($fireplace as $type) {
                                                        if ($type['id'] == $listing['fireplace_id']) {
                                                            $check = "selected";
                                                        }else{
                                                            $check = "";
                                                        }
                                                        ?>
                                                        <option <?php echo $check; ?> value="<?php echo $type['id'] ?>"><?php echo $type['fireplace_type'] ?>
                                                        </option>
                                                        <?php 
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Heating:</label>
                                            <div class="col-md-8">
                                                <select class="form-control" name="heating_id">
                                                    <?php $heating = getAll('ref_heating');
                                                    foreach ($heating as $type) {
                                                        if ($type['id'] == $listing['heating_id']) {
                                                            $check = "selected";
                                                        }else{
                                                            $check = "";
                                                        }
                                                        ?>
                                                        <option <?php echo $check; ?> value="<?php echo $type['id'] ?>"><?php echo $type['heating_type'] ?>
                                                        </option>
                                                        <?php 
                                                    }?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Cooling:</label>
                                            <div class="col-md-8">
                                                <select class="form-control" name="cooling_id">
                                                    <?php $cooling = getAll('ref_cooling');
                                                    foreach ($cooling as $type) {
                                                        if ($type['id'] == $listing['cooling_id']) {
                                                            $check = "selected";
                                                        }else{
                                                            $check = "";
                                                        }
                                                        ?>
                                                        <option <?php echo $check; ?> value="<?php echo $type['id'] ?>"><?php echo $type['cooling_type'] ?>
                                                        </option>
                                                        <?php 
                                                    }?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Dining Room Features:</label>
                                            <div class="col-md-8">
                                                <?php
                                                $features = getAll('ref_dining_room');
                                                $array = array_column($listing['int_feature']['dining'],'feature_id');
                                                foreach ($features as $feature) {
                                                    if(in_array($feature['id'],$array)){
                                                        $check = "checked";
                                                    }else{
                                                        $check = "";
                                                    }
                                                    ?>
                                                    <div class="col-md-6">
                                                        <label class="mt-checkbox">
                                                            <input <?php echo $check ?> type="checkbox" name="dining[]" value="<?php echo $feature['id'] ?>"> <?php echo $feature['dining_type'] ?>
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                    <?php
                                                }
                                                ?> 
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Family Room Features:</label>
                                            <div class="col-md-8">
                                                <?php
                                                $features = getAll('ref_family_room');
                                                $array = array_column($listing['int_feature']['family'],'feature_id');
                                                foreach ($features as $feature) {
                                                    if(in_array($feature['id'],$array)){
                                                        $check = "checked";
                                                    }else{
                                                        $check = "";
                                                    }
                                                    ?>
                                                    <div class="col-md-6">
                                                        <label class="mt-checkbox">
                                                            <input <?php echo $check ?> type="checkbox" name="family[]" value="<?php echo $feature['id'] ?>"> <?php echo $feature['family_room_type'] ?>
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                    <?php
                                                }
                                                ?> 
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <div class="col-md-3">
                                                <h3>Exterior</h3>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Horse Property:</label>
                                            <div class="col-md-8">
                                                <select class="form-control" name="horse_property">
                                                    <option <?php echo ($listing['horse_property'] == "Y")? "selected":""; ?> value="Y">Yes</option>
                                                    <option <?php echo ($listing['horse_property'] == "N")? "selected":""; ?>  value="N">No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Carport:</label>
                                            <div class="col-md-8">
                                                <select class="form-control" name="carport">
                                                    <option <?php echo ($listing['carport'] == 1)? "selected":""; ?> value="1">1</option>
                                                    <option <?php echo ($listing['carport'] == 2)? "selected":""; ?> value="2">2</option>
                                                    <option <?php echo ($listing['carport'] == 3)? "selected":""; ?> value="3">3</option>
                                                    <option <?php echo ($listing['carport'] == 4)? "selected":""; ?> value="4">4</option>
                                                    <option <?php echo ($listing['carport'] == 5)? "selected":""; ?> value="5">5</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Pool:</label>
                                            <div class="col-md-8">
                                                <select class="form-control" name="pool">
                                                    <option <?php echo ($listing['pool'] == "Y")? "selected":""; ?> value="Y">Yes</option>
                                                    <option <?php echo ($listing['pool'] == "N")? "selected":""; ?>  value="N">No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Garage Spaces:</label>
                                            <div class="col-md-8">
                                                <select class="form-control" name="garage_space">
                                                    <option <?php echo ($listing['garage_space'] == 1)? "selected":""; ?> value="1">1</option>
                                                    <option <?php echo ($listing['garage_space'] == 2)? "selected":""; ?> value="2">2</option>
                                                    <option <?php echo ($listing['garage_space'] == 3)? "selected":""; ?> value="3">3</option>
                                                    <option <?php echo ($listing['garage_space'] == 4)? "selected":""; ?> value="4">4</option>
                                                    <option <?php echo ($listing['garage_space'] == 5)? "selected":""; ?> value="5">5</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Parking Features:</label>
                                            <div class="col-md-8">
                                                <?php
                                                $features = getAll('ref_parking_feature');
                                                $array = array_column($listing['ext_feature']['parking'],'feature_id');
                                                foreach ($features as $feature) {
                                                    if(in_array($feature['id'],$array)){
                                                        $check = "checked";
                                                    }else{
                                                        $check = "";
                                                    }
                                                    ?>
                                                    <div class="col-md-6">
                                                        <label class="mt-checkbox">
                                                            <input <?php echo $check ?> type="checkbox" name="parking[]" value="<?php echo $feature['id'] ?>"> <?php echo $feature['parking_type'] ?>
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                    <?php
                                                }
                                                ?> 
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Foundation:</label>
                                            <div class="col-md-8">
                                                <?php
                                                $features = getAll('ref_foundation');
                                                $array = array_column($listing['ext_feature']['foundation'],'feature_id');
                                                foreach ($features as $feature) {
                                                    if(in_array($feature['id'],$array)){
                                                        $check = "checked";
                                                    }else{
                                                        $check = "";
                                                    }
                                                    ?>
                                                    <div class="col-md-6">
                                                        <label class="mt-checkbox">
                                                            <input <?php echo $check ?> type="checkbox" name="foundation[]" value="<?php echo $feature['id'] ?>"> <?php echo $feature['foundation_type'] ?>
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                    <?php
                                                }
                                                ?> 
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Roof Style:</label>
                                            <div class="col-md-8">
                                                <?php
                                                $features = getAll('ref_roof');
                                                $array = array_column($listing['ext_feature']['roof'],'feature_id');
                                                foreach ($features as $feature) {
                                                    if(in_array($feature['id'],$array)){
                                                        $check = "checked";
                                                    }else{
                                                        $check = "";
                                                    }
                                                    ?>
                                                    <div class="col-md-6">
                                                        <label class="mt-checkbox">
                                                            <input <?php echo $check ?> type="checkbox" name="roof[]" value="<?php echo $feature['id'] ?>"> <?php echo $feature['roof_type'] ?>
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                    <?php
                                                }
                                                ?> 
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Utilities:</label>
                                            <div class="col-md-8">
                                                <?php
                                                $features = getAll('ref_utilities');
                                                $array = array_column($listing['ext_feature']['utilities'],'feature_id');
                                                foreach ($features as $feature) {
                                                    if(in_array($feature['id'],$array)){
                                                        $check = "checked";
                                                    }else{
                                                        $check = "";
                                                    }
                                                    ?>
                                                    <div class="col-md-6">
                                                        <label class="mt-checkbox">
                                                            <input <?php echo $check ?> type="checkbox" name="utilities[]" value="<?php echo $feature['id'] ?>"> <?php echo $feature['utilities'] ?>
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                    <?php
                                                }
                                                ?> 
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Water System:</label>
                                            <div class="col-md-8">
                                                <?php
                                                $features = getAll('ref_water');
                                                $array = array_column($listing['ext_feature']['water'],'feature_id');
                                                foreach ($features as $feature) {
                                                    if(in_array($feature['id'],$array)){
                                                        $check = "checked";
                                                    }else{
                                                        $check = "";
                                                    }
                                                    ?>
                                                    <div class="col-md-6">
                                                        <label class="mt-checkbox">
                                                            <input <?php echo $check ?> type="checkbox" name="water[]" value="<?php echo $feature['id'] ?>"> <?php echo $feature['water_system'] ?>
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                    <?php
                                                }
                                                ?> 
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Sewerage System:</label>
                                            <div class="col-md-8">
                                                <?php
                                                $features = getAll('ref_sewer');
                                                $array = array_column($listing['ext_feature']['sewer'],'feature_id');
                                                foreach ($features as $feature) {
                                                    if(in_array($feature['id'],$array)){
                                                        $check = "checked";
                                                    }else{
                                                        $check = "";
                                                    }
                                                    ?>
                                                    <div class="col-md-6">
                                                        <label class="mt-checkbox">
                                                            <input <?php echo $check ?> type="checkbox" name="sewer[]" value="<?php echo $feature['id'] ?>"> <?php echo $feature['sewer_type'] ?>
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                    <?php
                                                }
                                                ?> 
                                            </div>
                                        </div>
                                        <hr>
                                        <h3>Photos</h3>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label"></label>
                                            <div class="col-md-8">
                                                <div class="masonry_gallery">
                                                    <?php
                                                    $photo = getAll('sell_photo','sell_id',$listing['sell_id']);
                                                    if (!empty($photo)) {
                                                        foreach ($photo as $gallery) {
                                                            ?>
                                                            <div class="item_gallery">
                                                                <a href="<?php echo base_url() . 'uploads/images/' . $gallery['photo_name'] ?>" class="img_popup">
                                                                    <img class="img-thumbnail" src="<?php echo base_url() . 'uploads/images/' . $gallery['photo_name'] ?>">
                                                                </a>
                                                            </div>
                                                            <?php
                                                        }
                                                    }else{?>
                                                    <p>No media Found!!</p>
                                                    <?php }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9">
                                                    <button type="submit" class="btn green">Save</button>
                                                    <a href="<?php echo base_url() ?>admin/listing" class="btn grey-salsa btn-outline">Cancel</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php $this->load->view('admin_common/footer'); ?>
    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.js"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery.colorbox.js"></script>
    <script type="text/javascript">
        $(".img_popup").colorbox({
            rel: 'gal',
            width: 600,
            height: 600
        });

        $(function() {
            $('#home_worth').maskMoney({prefix:'$ ', allowNegative: false, thousands:',', decimal:'.', precision: 0, affixesStay : false });
        });

        $(".numberonly").keypress(function (e){
          var charCode = (e.which) ? e.which : e.keyCode;
          if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        }
    });
</script>