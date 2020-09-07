<!DOCTYPE html>
<html lang="en"> 
    <?php $this->load->view('common/head'); ?>
    <body class="header-1 page-header-1">
        <?php $this->load->view('common/header'); ?>
        
        <!-- Become Space Provider -->
        <section class="become-space section-bg">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-10 col-xs-12 col-md-offset-3 col-sm-offset-1">
                        <h2>Please provide a few details about your property.</h2>
                        <p class="dark-sky">STEP 2</p>
                        <h3></h3>
                        <h4 class="gray">Property details</h4>
                        <form id="step2_form" action="javascript:void(0)" method="">
                            <input type="hidden" name="form_id" value="step2">
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <div class="form-group">
                                        <label>Ad title</label>
                                        <input type="text" class="form-control" name="property_title" placeholder="" value="<?php echo @$list['title']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Price <?php echo @($list['purpose'] == 'rent')? ' <small>[PCM = Per Calendar Month]</small>' : ''; ?></label>
                                        <div class="pound-block <?php echo @($list['purpose'] == 'rent' || $list['purpose'] == 'student')? 'pw-block' : ''; ?>">
                                            <input class="form-control poundfield" rows="2" type="text" name="property_price" min="0" placeholder="100000" value="<?php echo @$list['price']; ?>" />
                                        </div>
                                        <!--<input type="text" class="form-control" name="property_price" placeholder="&dollar;10,0000">-->
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Number of bedrooms</label>
                                        <select class="form-control" name="no_of_bedrooms">
                                            <option value="">Select any</option>
                                            <option <?php echo @($list['no_of_bedrooms'] == '0')?"selected":""; ?> value="0">0</option>
                                            <option <?php echo @($list['no_of_bedrooms'] == '1')?"selected":""; ?> value="1">1</option>
                                            <option <?php echo @($list['no_of_bedrooms'] == '2')?"selected":""; ?> value="2">2</option>
                                            <option <?php echo @($list['no_of_bedrooms'] == '3')?"selected":""; ?> value="3">3</option>
                                            <option <?php echo @($list['no_of_bedrooms'] == '4')?"selected":""; ?> value="4">4</option>
                                            <option <?php echo @($list['no_of_bedrooms'] == '5')?"selected":""; ?> value="5">5</option>
                                            <option <?php echo @($list['no_of_bedrooms'] == '5+')?"selected":""; ?> value="5+">5+</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Number of living rooms</label>
                                        <select class="form-control" name="no_of_living_rooms">
                                            <option value="">Select any</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="5+">5+</option>
                                        </select>
                                    </div>
                                </div> -->
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Number of bathrooms</label>
                                        <select class="form-control" name="no_of_bathrooms">
                                            <option value="">Select any</option>
                                            <option <?php echo @($list['no_of_bathrooms'] == '0')?"selected":""; ?> value="0">0</option>
                                            <option <?php echo @($list['no_of_bathrooms'] == '1')?"selected":""; ?> value="1">1</option>
                                            <option <?php echo @($list['no_of_bathrooms'] == '2')?"selected":""; ?> value="2">2</option>
                                            <option <?php echo @($list['no_of_bathrooms'] == '3')?"selected":""; ?> value="3">3</option>
                                            <option <?php echo @($list['no_of_bathrooms'] == '4')?"selected":""; ?> value="4">4</option>
                                            <option <?php echo @($list['no_of_bathrooms'] == '5')?"selected":""; ?> value="5">5</option>
                                            <option <?php echo @($list['no_of_bathrooms'] == '5+')?"selected":""; ?> value="5+">5+</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Land area</label>
                                        <input type="text" class="form-control" name="land_area" placeholder="" value="<?php echo @$list['land_area']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Unit</label>
                                        <select class="form-control" name="unit_area">
                                            <option value="">Select any</option>
                                            <option <?php echo @($list['unit'] == 'square_feet')?"selected":""; ?> value="square_feet">Square feet</option>
                                            <option <?php echo @($list['unit'] == 'square_yards')?"selected":""; ?> value="square_yards">Square yards</option>
                                            <option <?php echo @($list['unit'] == 'square_meters')?"selected":""; ?> value="square_meters">Square meters</option>
                                            <option <?php echo @($list['unit'] == 'hectares')?"selected":""; ?> value="hectares">Hectares</option>
                                            <option <?php echo @($list['unit'] == 'acres')?"selected":""; ?> value="acres">Acres</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea name="property_desc" class="form-control" rows="5" placeholder="Describe your property..."><?php echo @$list['description']; ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <hr>
                                    <div class="form-group pull-left">
                                        <a href="<?php echo base_url() ?>listing/step1" class="btn back-btn">Go Back</a>
                                    </div>
                                    <div class="form-group pull-right">
                                        <a href="javascript:void(0)" id="submit_list_details" class="btn next-btn">Next Step</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>		
        </section>
        <!-- Become Space Provider End-->

        <?php $this->load->view('common/scripts'); ?>
        <?php $this->load->view('common/footer'); ?>
        <script type="text/javascript">
            $('body').on('click', '#submit_list_details', function (event) {
                var btn = $(this);
                $(btn).button('loading');
                var value = $("#step2_form").serialize();
                $.ajax({
                    url: '<?php echo base_url(); ?>listing/submit_data',
                    type: 'post',
                    data: value,
                    dataType: 'json',
                    success: function (status) {
                        //$(btn).button('reset');
                        if (status.msg == 'success') {
                            $.gritter.add({
                                title: 'Success!',
                                sticky: false,
                                time: '15000',
                                before_open: function () {
                                    if ($('.gritter-item-wrapper').length >= 3)
                                    {
                                        return false;
                                    }
                                },
                                text: status.response,
                                class_name: 'gritter-info'
                            });
                            setTimeout(function (){
                                console.log(status.new_url);
                                window.location.replace(status.new_url);
                                //window.location.href = status.new_url;
                            },3000);
                            
                        } else if (status.msg == 'not_login') {
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
                                class_name: 'gritter-error'
                            });
                            $(btn).button('reset');
                            $('#loginModal').modal('show');
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
                                class_name: 'gritter-error'
                            });
                            $(btn).button('reset');
                        }
                    }
                });
            });
        </script>
    </body>
</html>