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
                        <h2>Hi, <?php echo get_session('username'); ?>! Let’s get started listing your property.</h2>
                        <p class="dark-sky">STEP 1</p>
                        <h3></h3>
                        <h4 class="gray">Property type and location</h4>	
                        <form id="step1_form" method="POST">
                            <input type="hidden" name="form_id" value="step1">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Build year</label>
                                        <input type="number" class="form-control" id="build_year" name="build_year" min="1800" max="<?php echo date("Y") ?>" maxlength="4" placeholder="E.g 2008" value="<?php echo @$list['build_year']; ?>" />
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Purpose</label>
                                        <select class="form-control" name="purpose">
                                            <option value="">Select any</option>
                                            <option <?php echo @($list['purpose'] == 'sale')?"selected":""; ?> value="sale">For Sale</option>
                                            <option <?php echo @($list['purpose'] == 'rent')?"selected":""; ?> value="rent">To Rent</option>
                                            <option <?php echo @($list['purpose'] == 'student')?"selected":""; ?> value="student">Student</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Property type</label>
                                        <?php $types = getAll('property_types'); ?>
                                        <select class="form-control" name="property_type">
                                            <option value="">Select property type</option>
                                            <?php foreach ($types as $type): ?>
                                            <option <?php echo @($list['property_type'] == $type['id'])?"selected":""; ?> value="<?php echo $type['id']; ?>"><?php echo $type['name']; ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
<!--                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>City</label>
                                        <input type="text" class="form-control" name="city" placeholder="Enter city here" value="">                                        
                                    </div>
                                </div>-->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Location</label>
                                        <input type="text" class="form-control" id="property_loc" name="location" placeholder="Enter location here" value="<?php echo @$list['location']; ?>">
                                        <input type="hidden" name="lat_long" id="property_lat_long" value="<?php echo @$list['latitude'].', '.@$list['longitude']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <hr>
                                    <div class="form-group">
                                        <a href="javascript:void(0)" id="submit_list_details" class="btn cont-btn">Next</a>
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
            
            $(document).ready(function(){
                
                $("#build_year").on('keyup keypress blur change', function(e) {
                    var currentYear = <?php echo date("Y"); ?>;
                    if($(this).val() > currentYear){
                        $(this).val(currentYear);
                        return false;
                    }
                });
//                $("#build_year").make(9999);
            });

            $('body').on('click', '#submit_list_details', function (event) {
                var btn = $(this);
                $(btn).button('loading');
                var value = $("#step1_form").serialize();
                $.ajax({
                    url: '<?php echo base_url(); ?>listing/submit_data',
                    type: 'post',
                    data: value,
                    dataType: 'json',
                    success: function (status) {
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
                        } else {
                            $(btn).button('reset');
                        }
                    }
                });
            });
        </script>
    </body>
</html>