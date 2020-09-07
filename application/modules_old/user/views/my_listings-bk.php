<!DOCTYPE html>
<html lang="en"> 
    <?php $this->load->view('common/head'); ?>
    <body class="header-1 page-header-1">
        <!-- ====== BEGIN HEADER ====== -->
        <?php $this->load->view('common/header'); ?>
        <section class="panel-bg">
            <div class="container">
                <div class="row">
                    <?php $this->load->view('common/dashboard_sidebar'); ?>
                    <div class="col-md-9">
                        <div class="panel with-nav-tabs panel-default">
                            <div class="panel-heading">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#for-sale" data-toggle="tab">For Sale</a></li>
                                    <li><a href="#rent" data-toggle="tab">To Rent</a></li>
                                    <li><a href="#student" data-toggle="tab">Student</a></li>
                                    <a href="<?php echo base_url(); ?>listing/step1" class="btn btn-primary btn-listing  pull-right">Add New Listing</a>
                                </ul>
                            </div>
                            <div class="panel-body">
                                <div class="tab-content">
                                    <div class="tab-pane fade in active" id="for-sale">
                                        <?php
                                        if (!empty($sales)) {
                                            foreach ($sales as $listing) {
                                                $images = listingImages($listing['id']);
                                                ?>
                                                <div class="property-list archive-flex archive-with-footer padd-top-30">
                                                    <div class="row">
                                                        <div class="property-item booking-item property-archive col-lg-12 col-md-12 col-md-6 col-sm-12">
                                                            <div class="list-btn-outer">
                                                                <a href="javascript:void(0)" data-listing-id="<?php echo $listing['unique_id']; ?>" class="btn sign-btn delete-btn pull-right btn-primary">Delete</a>
                                                                <a href="<?php echo base_url() . 'listing/edit_listing/' . $listing['unique_id'] ?>" class="btn pull-right signin-btn edit-btn btn-primary">Edit</a>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-5 col-sm-5 no-padding">
                                                                    <a href="<?php echo base_url() . "user/listing_detail/" . $listing['unique_id']; ?>" class="property-image listing-property-img">
                                                                        <img src="<?php echo base_url(); ?>assets/listing_images/<?php echo $images[0]['image_name']; ?>" alt="Listing Image">
                                                                    </a>
                                                                    <!-- <a href="javascript:void(0)" class="btn-compare" title="Add to favourite"><i class="fa fa-heart"></i></a> -->
                                                                </div>
                                                                <div class="col-lg-7 col-sm-7 property-padding">
                                                                    <div class="property-content listing-content">
                                                                        <p class="text-center" style="background: #ed193f; color: white"><?php echo ($listing['is_approved'] == 'N') ? 'Awaiting approval' : ''; ?></p>
                                                                        <div class="row">
                                                                            <div class="col-md-8 col-sm-8 col-xs-9">
                                                                                <h3 class="property-title"><a href="<?php echo base_url() . "user/listing_detail/" . $listing['unique_id']; ?>"><?php echo ucwords($listing['title']); ?></a></h3>
                                                                            </div>
                                                                            <div class="col-md-4 col-sm-4 col-xs-3 text-right">
                                                                                <?php
                                                                                if (!empty($listing['agency_image'])) {
                                                                                    $src = base_url() . "uploads/images/" . $listing['agency_image'];
                                                                                } else {
                                                                                    $src = "https://via.placeholder.com/350x100?text=No+image+found";
                                                                                }
                                                                                ?>
                                                                                <img style="width: 70px !important;" class="img-responsive agent-logo" src="<?php echo $src; ?>">
                                                                            </div>
                                                                        </div>
                                                                        <p>
                                                                            <span class="property-price"><?php echo currency() . number_format($listing['price'], 0); ?></span>
                                                                            <span class="property-label">
                                                                                <a href="javascript:void(0)" class="property-label__type"><?php echo ucfirst($listing['property_type']); ?></a>
                                                                            </span>
                                                                        </p>
                                                                        <div class="property-address">
                                                                            <?php echo $listing['location']; ?>
                                                                        </div>
                                                                        <div class="row feature-list-icon">
                                                                            <div class="col-md-5">
                                                                                <div class="contact-icon">
                                                                                    <p>
                                                                                        <i class="fa fa-phone"></i> 
                                                                                        <?php echo $listing['contact_phone']; ?>
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-7">
                                                                                <div class="contact-icon">
                                                                                    <p>
                                                                                        <i class="fa fa-envelope"></i>
                                                                                        <?php echo $listing['contact_email'] ?>
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <p class="property-description">
                                                                            <?php echo custom_substr($listing['description'], 100); ?>
                                                                        </p>
                                                                        <div class="property-footer">
                                                                            <div class="item-wide">
                                                                                <span class="fi flaticon-wide"></span> <?php echo $listing['land_area'] . " " . getUnit($listing['unit']); ?>
                                                                            </div>
                                                                            <div class="item-room"><span class="fi flaticon-room"></span> <?php echo $listing['no_of_bedrooms']; ?></div>
                                                                            <div class="item-bathroom"><span class="fi flaticon-bathroom"></span> <?php echo $listing['no_of_bathrooms']; ?></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                        } else {
                                            ?>
                                            No listing found!
                                        <?php } ?>
                                    </div>
                                    <div class="tab-pane fade" id="rent">	
                                        <?php
                                        if (!empty($rents)) {
                                            foreach ($rents as $listing) {
                                                $images = listingImages($listing['id']);
                                                ?>
                                                <div class="property-list archive-flex archive-with-footer padd-top-30">
                                                    <div class="row">
                                                        <div class="property-item booking-item property-archive col-lg-12 col-md-12 col-md-6 col-sm-12">
                                                            <div class="list-btn-outer">
                                                                <a href="javascript:void(0)" data-listing-id="<?php echo $listing['unique_id']; ?>" class="btn sign-btn delete-btn pull-right btn-primary">Delete</a>
                                                                <a href="<?php echo base_url() . 'listing/edit_listing/' . $listing['unique_id'] ?>" class="btn pull-right signin-btn edit-btn btn-primary">Edit</a>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-5 col-sm-5 no-padding">
                                                                    <a href="<?php echo base_url() . "user/listing_detail/" . $listing['unique_id']; ?>" class="property-image listing-property-img">
                                                                        <img src="<?php echo base_url(); ?>assets/listing_images/<?php echo $images[0]['image_name']; ?>" alt="Listing Image">
                                                                    </a>
                                                                    <!-- <a href="javascript:void(0)" class="btn-compare" title="Add to favourite"><i class="fa fa-heart"></i></a> -->
                                                                </div>
                                                                <div class="col-lg-7 col-sm-7 property-padding">
                                                                    <div class="property-content listing-content">
                                                                        <p class="text-center" style="background: #ed193f; color: white"><?php echo ($listing['is_approved'] == 'N') ? 'Awaiting approval' : ''; ?></p>
                                                                        <div class="row">
                                                                            <div class="col-md-8 col-sm-8 col-xs-9">
                                                                                <h3 class="property-title"><a href="<?php echo base_url() . "user/listing_detail/" . $listing['unique_id']; ?>"><?php echo ucwords($listing['title']); ?></a></h3>
                                                                            </div>
                                                                            <div class="col-md-4 col-sm-4 col-xs-3 text-right d-block">
                                                                                <?php
                                                                                if (!empty($listing['agency_image'])) {
                                                                                    $src = base_url() . "uploads/images/" . $listing['agency_image'];
                                                                                } else {
                                                                                    $src = "https://via.placeholder.com/350x100?text=No+image+found";
                                                                                }
                                                                                ?>
                                                                                <img style="width: 70px !important;" class="img-responsive agent-logo" src="<?php echo $src; ?>">
                                                                            </div>
                                                                        </div>
                                                                        <p>
                                                                            <span class="property-price"><?php echo currency() . number_format($listing['price'], 0); ?> PW</span>
                                                                            <span class="property-label">
                                                                                <a href="javascript:void(0)" class="property-label__type"><?php echo ucfirst($listing['property_type']); ?></a>
                                                                            </span>
                                                                        </p>
                                                                        <div class="property-address">
                                                                            <?php echo $listing['location']; ?>
                                                                        </div>
                                                                        <div class="row feature-list-icon">
                                                                            <div class="col-md-5">
                                                                                <div class="contact-icon">
                                                                                    <p>
                                                                                        <i class="fa fa-phone"></i> 
                                                                                        <?php echo $listing['contact_phone']; ?>
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-7">
                                                                                <div class="contact-icon">
                                                                                    <p>
                                                                                        <i class="fa fa-envelope"></i>
                                                                                        <?php echo $listing['contact_email'] ?>
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <p class="property-description">
                                                                            <?php echo custom_substr($listing['description'], 200); ?>
                                                                        </p>
                                                                        <div class="property-footer">
                                                                            <div class="item-wide">
                                                                                <span class="fi flaticon-wide"></span> <?php echo $listing['land_area'] . " " . getUnit($listing['unit']); ?>
                                                                            </div>
                                                                            <div class="item-room"><span class="fi flaticon-room"></span> <?php echo $listing['no_of_bedrooms']; ?></div>
                                                                            <div class="item-bathroom"><span class="fi flaticon-bathroom"></span> <?php echo $listing['no_of_bathrooms']; ?></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                        } else {
                                            ?>
                                            No listing found!
                                        <?php } ?>
                                    </div>
                                    <div class="tab-pane fade" id="student">	
                                        <?php
                                        if (!empty($students)) {
                                            foreach ($students as $listing) {
                                                $images = listingImages($listing['id']);
                                                ?>
                                                <div class="property-list archive-flex archive-with-footer padd-top-30">
                                                    <div class="row">
                                                        <div class="property-item booking-item property-archive col-lg-12 col-md-12 col-md-6 col-sm-12">
                                                            <div class="list-btn-outer">
                                                                <a href="javascript:void(0)" data-listing-id="<?php echo $listing['unique_id']; ?>" class="btn sign-btn delete-btn pull-right btn-primary">Delete</a>
                                                                <a href="<?php echo base_url() . 'listing/edit_listing/' . $listing['unique_id'] ?>" class="btn pull-right signin-btn edit-btn btn-primary">Edit</a>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-5 col-sm-5 no-padding">
                                                                    <a href="<?php echo base_url() . "user/listing_detail/" . $listing['unique_id']; ?>" class="property-image listing-property-img">
                                                                        <img src="<?php echo base_url(); ?>assets/listing_images/<?php echo $images[0]['image_name']; ?>" alt="Listing Image">
                                                                    </a>
                                                                    <!-- <a href="javascript:void(0)" class="btn-compare" title="Add to favourite"><i class="fa fa-heart"></i></a> -->
                                                                </div>
                                                                <div class="col-lg-7 col-sm-7 property-padding">
                                                                    <div class="property-content listing-content">
                                                                        <p class="text-center" style="background: #ed193f; color: white"><?php echo ($listing['is_approved'] == 'N') ? 'Awaiting approval' : ''; ?></p>
                                                                        <div class="row">
                                                                            <div class="col-md-8 col-sm-8 col-xs-9">
                                                                                <h3 class="property-title"><a href="<?php echo base_url() . "user/listing_detail/" . $listing['unique_id']; ?>"><?php echo ucwords($listing['title']); ?></a></h3>
                                                                            </div>
                                                                            <div class="col-md-4 col-sm-4 col-xs-3 text-right">
                                                                                <?php
                                                                                if (!empty($listing['agency_image'])) {
                                                                                    $src = base_url() . "uploads/images/" . $listing['agency_image'];
                                                                                } else {
                                                                                    $src = "https://via.placeholder.com/350x100?text=No+image+found";
                                                                                }
                                                                                ?>
                                                                                <img style="width: 70px !important;" class="img-responsive agent-logo" src="<?php echo $src; ?>">
                                                                            </div>
                                                                        </div>
                                                                        <p>
                                                                            <span class="property-price"><?php echo currency() . number_format($listing['price'], 0); ?> PW</span>
                                                                            <span class="property-label">
                                                                                <a href="javascript:void(0)" class="property-label__type"><?php echo ucfirst($listing['property_type']); ?></a>
                                                                            </span>
                                                                        </p>
                                                                        <div class="property-address">
                                                                            <?php echo $listing['location']; ?>
                                                                        </div>
                                                                        <div class="row feature-list-icon">
                                                                            <div class="col-md-5">
                                                                                <div class="contact-icon">
                                                                                    <p>
                                                                                        <i class="fa fa-phone"></i> 
                                                                                        <?php echo $listing['contact_phone']; ?>
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-7">
                                                                                <div class="contact-icon">
                                                                                    <p>
                                                                                        <i class="fa fa-envelope"></i>
                                                                                        <?php echo $listing['contact_email'] ?>
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <p class="property-description">
                                                                            <?php echo custom_substr($listing['description'], 200); ?>
                                                                        </p>
                                                                        <div class="property-footer">
                                                                            <div class="item-wide">
                                                                                <span class="fi flaticon-wide"></span> <?php echo $listing['land_area'] . " " . getUnit($listing['unit']); ?>
                                                                            </div>
                                                                            <div class="item-room"><span class="fi flaticon-room"></span> <?php echo $listing['no_of_bedrooms']; ?></div>
                                                                            <div class="item-bathroom"><span class="fi flaticon-bathroom"></span> <?php echo $listing['no_of_bathrooms']; ?></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                        } else {
                                            ?>
                                            No listing found!
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>		
        </section>
        <div class="modal fade login-popup centered-modal" id="priceModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close close-login" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Set Price and Publish</h4>
                    </div>
                    <div class="modal-body">
                        <form id="set_price_form" action="" method="post" novalidate>
                            <p>Price</p>
                            <div class="input-group" style="width:100%;">
                                <span><i class="fa fa-dollar mail-icon"></i></span>
                                <input type="hidden" name="unique_id" id="price_unique_id">
                                <input type="text" class="form-control" id="price" name="price" placeholder="">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer text-center">
                        <button type="button" id="set_now_price" class="btn next-btn pull-right">Publish</button>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view('common/footer'); ?>
        <?php $this->load->view('common/scripts'); ?>
    </body>
</html>
<script type="text/javascript">
    $(document).on('click', '.delete-btn', function () {
        var listing_id = $(this).attr('data-listing-id');
        $.confirm({
            title: 'Delete Property!',
            content: 'Are you sure? You won\'t be able to undo this.',
            type: "red",
            buttons: {
                cancel: function () {
                },
                Delete: {
                    text: 'Delete',
                    btnClass: 'btn-red',
                    action: function () {
                        $.ajax({
                            url: '<?php echo base_url(); ?>user/deleteProperty',
                            type: 'post',
                            data: 'id=' + listing_id,
                            dataType: 'json',
                            success: function (status) {
                                if (status.msg == 'success') {
                                    $.gritter.add({
                                        title: 'Success!',
                                        sticky: false,
                                        time: '5000',
                                        before_open: function () {
                                            if ($('.gritter-item-wrapper').length >= 3)
                                            {
                                                return false;
                                            }
                                        },
                                        text: status.response,
                                        class_name: 'gritter-info'
                                    });
                                    setTimeout(function () {
                                        location.reload(true);
                                    }, 1500)
                                } else if (status.msg == 'error') {
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
    });
    $('body').on('click', '#set_now_price', function () {
        var values = $('#set_price_form').serialize();
        if ($('#price').val() == '') {
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
                text: "Price is required.",
                class_name: 'gritter-error'
            });
            return false;
        }
        $.ajax({
            url: '<?php echo base_url(); ?>user/set_price_publish',
            type: 'post',
            data: values,
            dataType: 'json',
            success: function (status) {
                if (status.msg == 'success') {
                    $.gritter.add({
                        title: 'Success!',
                        sticky: false,
                        time: '5000',
                        before_open: function () {
                            if ($('.gritter-item-wrapper').length >= 3)
                            {
                                return false;
                            }
                        },
                        text: status.response,
                        class_name: 'gritter-info'
                    });
                    $('#priceModal').modal('hide');
                } else if (status.msg == 'error') {
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
                        text: status.response,
                        class_name: 'gritter-error'
                    });
                }
            }
        });
    });
</script>