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
                    <h2>Update Listing</h2>

                    <h4 class="gray">Property type and location</h4>	
                    <form id="edit_listing_form" method="POST">
                        <div class="row">
                            <!-- <div class="col-md-12">
                                <div class="form-group">
                                    <label>Build year</label>
                                    <input type="number" class="form-control" id="build_year" name="build_year" min="1800" max="<?php //echo date("Y") ?>" maxlength="4" placeholder="E.g 2008" value="<?php //echo $listing_detail['build_year']; ?>" />
                                </div>
                            </div> -->
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>Purpose</label>
                                    <select class="form-control" name="purpose">
                                        <option value="">Select any</option>
                                        <option value="sale" <?php echo ($listing_detail['purpose'] == 'sale')? "selected" : ""; ?> >For Sale</option>
                                        <option value="rent" <?php echo ($listing_detail['purpose'] == 'rent')? "selected" : ""; ?> >To Rent</option>
                                        <option value="student" <?php echo ($listing_detail['purpose'] == 'student')? "selected" : ""; ?> >Student</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>Property type</label>
                                    <?php $types = getAll('property_types'); ?>
                                    <select class="form-control" name="property_type">
                                        <option value="">Select property type</option>
                                        <?php foreach ($types as $type) { ?>
                                            <option <?php echo ($type['id'] == $listing_detail['property_type'])?"selected":""; ?> value="<?php echo $type['id']; ?>"><?php echo $type['name']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Location</label>
                                    <input type="text" class="form-control" id="property_loc" name="location" value="<?php echo $listing_detail['location']; ?>" placeholder="Enter location here">
                                    <input type="hidden" name="lat_long" id="property_lat_long" value="<?php echo $listing_detail['latitude'].', '.$listing_detail['longitude'] ?>" >
                                </div>
                            </div>
                            <div class="col-md-12">
                                <hr>
                            </div>
                        </div>

                        <h4 class="gray">Property details</h4>
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <div class="form-group">
                                    <label>Ad title</label>
                                    <input type="text" class="form-control" name="property_title" value="<?php echo $listing_detail['title']; ?>" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>Price</label>
                                    <div class="pound-block">
                                        <input class="form-control poundfield" rows="2" type="text" name="property_price" min="0" value="<?php echo $listing_detail['price']; ?>" placeholder="10,0000" />
                                    </div>
                                    <!--<input type="text" class="form-control" name="property_price" placeholder="&dollar;10,0000">-->
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>Number of bedrooms</label>
                                    <select class="form-control" name="no_of_bedrooms">
                                        <option value="">Select any</option>
                                        <option value="0" <?php echo ($listing_detail['no_of_bedrooms'] == '0')? "selected" : ""; ?> >0</option>
                                        <option value="1" <?php echo ($listing_detail['no_of_bedrooms'] == '1')? "selected" : ""; ?> >1</option>
                                        <option value="2" <?php echo ($listing_detail['no_of_bedrooms'] == '2')? "selected" : ""; ?> >2</option>
                                        <option value="3" <?php echo ($listing_detail['no_of_bedrooms'] == '3')? "selected" : ""; ?> >3</option>
                                        <option value="4" <?php echo ($listing_detail['no_of_bedrooms'] == '4')? "selected" : ""; ?> >4</option>
                                        <option value="5" <?php echo ($listing_detail['no_of_bedrooms'] == '5')? "selected" : ""; ?> >5</option>
                                        <option value="5+" <?php echo ($listing_detail['no_of_bedrooms'] == '5+')? "selected" : ""; ?> >5+</option>
                                    </select>
                                </div>
                            </div>
                            <!-- <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>Number of living rooms</label>
                                    <select class="form-control" name="no_of_living_rooms">
                                        <option value="">Select any</option>
                                        <option value="1" <?php //echo ($listing_detail['no_of_living_rooms'] == '1')? "selected" : ""; ?> >1</option>
                                        <option value="2" <?php //echo ($listing_detail['no_of_living_rooms'] == '2')? "selected" : ""; ?> >2</option>
                                        <option value="3" <?php //echo ($listing_detail['no_of_living_rooms'] == '3')? "selected" : ""; ?> >3</option>
                                        <option value="4" <?php //echo ($listing_detail['no_of_living_rooms'] == '4')? "selected" : ""; ?> >4</option>
                                        <option value="5" <?php //echo ($listing_detail['no_of_living_rooms'] == '5')? "selected" : ""; ?> >5</option>
                                        <option value="5+" <?php //echo ($listing_detail['no_of_living_rooms'] == '5+')? "selected" : ""; ?> >5+</option>
                                    </select>
                                </div>
                            </div> -->
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>Number of bathrooms</label>
                                    <select class="form-control" name="no_of_bathrooms">
                                        <option value="">Select any</option>
                                        <option value="0" <?php echo ($listing_detail['no_of_bathrooms'] == '0')? "selected" : ""; ?> >0</option>
                                        <option value="1" <?php echo ($listing_detail['no_of_bathrooms'] == '1')? "selected" : ""; ?> >1</option>
                                        <option value="2" <?php echo ($listing_detail['no_of_bathrooms'] == '2')? "selected" : ""; ?> >2</option>
                                        <option value="3" <?php echo ($listing_detail['no_of_bathrooms'] == '3')? "selected" : ""; ?> >3</option>
                                        <option value="4"<?php echo ($listing_detail['no_of_bathrooms'] == '4')? "selected" : ""; ?> >4</option>
                                        <option value="5" <?php echo ($listing_detail['no_of_bathrooms'] == '5')? "selected" : ""; ?> >5</option>
                                        <option value="5+" <?php echo ($listing_detail['no_of_bathrooms'] == '5+')? "selected" : ""; ?> >5+</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Land area</label>
                                    <input type="text" class="form-control" name="land_area" value="<?php echo $listing_detail['land_area'] ?>" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>Unit</label>
                                    <select class="form-control" name="unit_area">
                                        <option value="">Select any</option>
                                        <option value="square_feet" <?php echo ($listing_detail['unit'] == 'square_feet')? "selected" : ""; ?> >Square feet</option>
                                        <option value="square_yards" <?php echo ($listing_detail['unit'] == 'square_yards')? "selected" : ""; ?> >Square yards</option>
                                        <option value="square_meters" <?php echo ($listing_detail['unit'] == 'square_meters')? "selected" : ""; ?> >Square meters</option>
                                        <option value="hectares" <?php echo ($listing_detail['unit'] == 'hectares')? "selected" : ""; ?> >Hectares</option>
                                        <option value="acres" <?php echo ($listing_detail['unit'] == 'acres')? "selected" : ""; ?> >Acres</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="property_desc" class="form-control" rows="5" placeholder="Describe your property..."><?php echo trim($listing_detail['description']); ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <hr>
                            </div>
                        </div>

                        <h4 class="gray">Contact details</h4>
                        <div class="row">
                            <div class="col-md-12 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>Contact person</label>
                                    <input type="text" class="form-control" name="contact_person" value="<?php echo $listing_detail['contact_person'] ?>" placeholder="John">
                                </div>
                            </div>
                            <input type="hidden" name="listing_id" value="<?php echo $listing_detail['unique_id']; ?>">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>Phone number</label>
                                    <input type="text" class="form-control" name="contact_phone" value="<?php echo $listing_detail['contact_phone'] ?>" placeholder="+44 7911 123456">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="contact_email" value="<?php echo $listing_detail['contact_email'] ?>" placeholder="example@gmail.com">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <hr>
                            </div>
                        </div>

                        <h4 class="gray">Property Images</h4>
                        <div class="row">

                            <div class="col-xs-12 photo-thumbnail card no-box">
                                <!--<div class="col-md-4 col-sm-4 col-xs-4 row_47">-->
                                    <?php
                                    if(!empty($images)){
                                        foreach ($images as $img) { ?>
                                            <div class="thumbnail col-xs-6 row_<?php echo $img['id']; ?>">
                                                <div class="card-image" style="background: url(<?php echo base_url().'assets/listing_images/'.$img['image_name']; ?>) no-repeat center center; height: 190px; background-size: cover;">
                                                </div>
                                                <div class="caption inputSort">
                                                    <div class="row">
                                                        <div class="col-xs-12 col-sm-12">
                                                            <input type="number" min="1" name="image_sort[<?php echo $img['id']; ?>]" value="<?php echo $img['sort_order']; ?>" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="caption">
                                                    <div class="row">
                                                        <!-- <div class="col-xs-6 col-sm-6">
                                                            <button data-id="<?php echo $img['id']; ?>" class="btn btn-block btn-success btn-sm updateSortOrder" type="button">Update</button>
                                                        </div> -->
                                                        <div class="col-xs-12 col-sm-12">
                                                            <button data-id="<?php echo $img['id']; ?>" data-listing-id="<?php echo $img['listing_id']; ?>" data-img-name="<?php echo $img['image_name']; ?>" class="btn btn-block btn-danger btn-sm imgDeleteBtn" type="button">Delete</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php }
                                    }
                                    ?>
                                    <!--</div>-->
                                </div>
                                
                                <div class="col-md-12 col-sm-6 col-xs-12">
                                    <div style="background: #f7f8fa;">
                                        <!--<input type="file" multiple="multiple" name="files[]" id="input2">--> 
                                        <div class="dropzone" id="myDropzone">
                                            <div class="dz-message" data-dz-message>
                                                <span>
                                                    <b>Drop files here to upload</b>
                                                    <br> 
                                                    <i>You can maximum upload 10 images, 5MB is the maximum size for as image.</i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <hr>
                                <div class="form-group pull-right">
                                    <a href="javascript:void(0)" id="update_list_details" class="btn next-btn">Update</a>
                                </div>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>		
        </section>
        <!-- Become Space Provider End-->
        <div id='preview-template' style='display: none;'>
            <div class='dz-preview dz-file-preview'>
                <div class='dz-image center-block'>
                    <img data-dz-thumbnail=''>
                </div>
                <div class='dz-details'>
                    <div class='dz-size margin-bottom-5' data-dz-size=''></div>
                    <div class='dz-filename'>
                        <span data-dz-name=''></span>
                    </div>
                </div>
                <div class='dz-progress'>
                    <span class='dz-upload' data-dz-uploadprogress=''></span>
                </div>
                <div class='dz-custom'>
                    <input type="number" min="1" max="10" name="img_order[]" class="requiredFields" style="margin-top: 5px; padding-left: 15px; padding-right: 15px;" placeholder="Image Order">
                </div>
                <div class='dz-error-message'>
                    <span data-dz-errormessage=''></span>
                </div>
                <div class='dz-success-mark'>
                    <span></span>
                </div>
                <div class='dz-error-mark' style='margin-top:-10px'>
                    <span></span>
                </div>
                <a class='btn next-btn dz-remove' data-dz-remove='' style='margin-top:5px'>
                    <i class='glyphicon glyphicon-trash'></i>
                    Remove
                </a>
            </div>
        </div>

        <?php $this->load->view('common/scripts'); ?>
        <?php $this->load->view('common/footer'); ?>
        <script type="text/javascript">

            $(document).ready(function (){
                var globalBtn = $('#update_list_details').attr('id');
                Dropzone.options.myDropzone = {
                    url: '<?php echo base_url() ?>listing/submit_updated_data',
                    previewTemplate: document.getElementById('preview-template').innerHTML,
                    autoProcessQueue: false,
                    uploadMultiple: true,
                    parallelUploads: 5,
                    maxFiles: 10,//5
                    maxFilesize: 5,//1
                    acceptedFiles: 'image/*',
                    // addRemoveLinks: true,
                    success: function(file, response){
                        response = jQuery.parseJSON(response);
                        if(response.code == 501){ // succeeded
                            return file.previewElement.classList.add("dz-success"); // from source
                        }else if (response.code == 403){  //  error
                            // below is from the source code too
                            var node, _i, _len, _ref, _results;
                            var message = response.msg // modify it to your error message
                            file.previewElement.classList.add("dz-error");
                            _ref = file.previewElement.querySelectorAll("[data-dz-errormessage]");
                            _results = [];
                            for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                                node = _ref[_i];
                                _results.push(node.textContent = message);
                            }
                            return _results;
                        }
                    },
                    init: function () {
                        dzClosure = this; // Makes sure that 'this' is understood inside the functions below. 
                        // for Dropzone to process the queue (instead of default form behavior):
                        document.getElementById("update_list_details").addEventListener("click", function (e) {
                            // Make sure that the form isn't actually being sent.
                            $("#"+globalBtn).button('loading');
                            e.preventDefault();
                            e.stopPropagation();
                            if (dzClosure.getQueuedFiles().length > 0) {
                                dzClosure.processQueue();
                            } else {
                                var blob = new Blob();
                                blob.upload = { 'chunked': dzClosure.defaultOptions.chunking };
                                dzClosure.uploadFile(blob);
                                //dzClosure.uploadFiles([]); //send empty
                            }
                            //dzClosure.processQueue();
                        });
                        //send all the form data along with the files:
                        this.on("sendingmultiple", function (data, xhr, formData) {
                            formData.append("form_id", $("#edit_listing_form").serialize());
                            var name = "image_order";
                            var values = $("input[name='img_order[]']").map(function(){return $(this).val();}).get();
                            formData.append(name, values);
//                            formData.append("job_title", $("#job_title").val());
//                            formData.append("job_description", $("#job_description").val());
});
                        this.on("successmultiple", function(files, response) {
                            response = JSON.parse(response);
                            if(response.msg == "success"){
                                $.gritter.add({
                                    title: 'Success!',
                                    sticky: false,
                                    time: '5000',
                                    before_open: function(){
                                        if($('.gritter-item-wrapper').length >= 3)
                                        {
                                            return false;
                                        }
                                    },
                                    text: "Your listing has been saved successfully!",
                                    class_name: 'gritter-info'
                                });
                                setTimeout(function(){
                                    location.href = "<?php echo base_url() ?>user/listings";                                
                                },3000);
                                
                            } else if (response.msg == 'not_login') {
                                $.gritter.add({
                                    title: 'Error!',
                                    sticky: false,
                                    time: '5000',
                                    before_open: function () {
                                        if ($('.gritter-item-wrapper').length >= 3)
                                        {
                                            return false;
                                        }
                                    },
                                    text: response.response,
                                    class_name: 'gritter-error'
                                });
                                $(btn).button('reset');
                                $('#loginModal').modal('show');
                                
                            } else{
                                $.gritter.add({
                                    title: 'Error!',
                                    sticky: false,
                                    time: '5000',
                                    before_open: function(){
                                        if($('.gritter-item-wrapper').length >= 3)
                                        {
                                            return false;
                                        }
                                    },
                                    text: response.response,
                                    class_name: 'gritter-error'
                                });
                            }
                            //console.log("success multiple");
                            $("#"+globalBtn).button('reset');
                        });
                        this.on("errormultiple", function(files, response) {
                            console.log("error multiple");
                        });            
                    }
                }
                $(document).on('click','.imgDeleteBtn', function(){
                    var img_id = $(this).attr('data-id');
                    //var listing_id = $(this).attr('data-listing-id');
                    //var img_name = $(this).attr('data-img-name');
                    
                    $.confirm({
                        title: 'Confirm!',
                        content: 'Are you sure you want to confirm it?',
                        buttons: {
                            cancel: function () {
                                //$.alert('Canceled!');
                            },
                            confirm: {
                                btnClass: 'btn-red',
                                action: function(){
                                    $.ajax({
                                        type: "POST",
                                        url: "<?php echo base_url() ?>listing/deleteImg",
                                        data: "listing_img_id=" + img_id,
                                        success: function(result){
                                            $(".row_"+img_id).remove();
                                        }
                                    });
                                }
                            }
                        }
                    });
                    
                });

            });


$('body').on('click', '#update_list_details', function (event) {
    var btn = $(this);
    $(btn).button('loading');
    event.preventDefault();
    var value = new FormData(this);
            //var value = $("#edit_listing_form").serialize();
            $.ajax({
                url: '<?php echo base_url(); ?>listing/submit_updated_data',
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
                            //window.location.replace(status.new_url);
                            //window.location.href = status.new_url;
                        },3000);

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
                    }
                    $(btn).button('reset');
                }
            });
        });

    </script>
</body>
</html>