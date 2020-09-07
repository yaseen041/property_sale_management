<!DOCTYPE html>
<html lang="en"> 
<?php $this->load->view('common/head'); ?>
<body class="header-1 page-header-1">
    <!-- ====== BEGIN HEADER ====== -->
    <?php $this->load->view('common/header'); ?>
    <!-- Become Space Provider -->
    <section class="page-header">
        <div class="container">
            <h1 class="page-header-title">Property Detail</h1>
            <ul class="breadcrumb">
                <li><a href="<?php echo base_url(); ?>">Home</a></li>
                <li class="active">Property Detail</li>
            </ul>
        </div>
    </section>
    <!-- ====== SINGLE PROPERTY CONTENT ====== -->
    <section class="page-section">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <!-- Content -->
                    <div id="content">
                        <article class="post property-item">
                            <div class="post-property-header">
                                <div class="row">
                                    <div class="col-md-8 col-sm-8">
                                        <h3 class="post-title"><?php echo ucwords($listing['title']); ?></h3>
                                    </div>
                                    <div class="col-md-4 col-sm-4 text-right">
                                        <span class="property-price"><?php echo currency() . number_format($listing['price'], 0); ?><?php echo ($listing['purpose'] == 'rent' || $listing['purpose'] == 'student') ? " PCM" : ""; ?></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 col-sm-8">
                                        <div class="property-address">
                                            <?php echo $listing['location']; ?>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <!-- Property Gallery Slider -->
                                <?php
                                $images = listingImages($listing['id']);
                                if (!empty($images)) {
                                    ?>
                                    <div class="property-image">
                                        <div id="property-slider" class="property-slider">
                                            <?php foreach ($images as $image) { ?>
                                                <a class="image-link" href="<?php echo base_url() ."assets/listing_images/". $image['image_name']; ?>">
                                                    <img style="width: 100%" src="<?php echo base_url(); ?>assets/listing_images/<?php echo $image['image_name']; ?>" alt="Property Photo">
                                                </a>
                                            <?php } ?>
                                        </div>
                                        <!-- Property Gallery Slider Navigation -->
                                        <div id="property-slider-nav" class="property-slider-nav">
                                            <?php foreach ($images as $image) { ?>
                                                <img src="<?php echo base_url(); ?>assets/listing_images/<?php echo $image['image_name']; ?>" alt="Property Photo">
                                            <?php } ?>
                                        </div>
                                    </div>
                                <?php } ?>
                                <!-- Property facility Detail -->
                                <!-- The Space Section -->
                                <hr>
                                <div class="row">
                                    <div class="col-md-3 col-sm-3"><h3 class="heading-title">Feature</h3></div>
                                    <div class="col-md-9 col-sm-9">
                                        <ul class="feature-list">
                                            <li><i class="fa fa-bed"></i>Bedrooms: <strong><?php echo $listing['no_of_bedrooms']; ?></strong></li>
                                            <li><i class="fa fa-bath"></i>Bathrooms: <strong><?php echo $listing['no_of_bathrooms']; ?></strong></li>
                                            <li><i class="fi flaticon-wide"></i> Area: <strong><?php echo $listing['land_area'] . ' ' .getUnit($listing['unit']); ?></strong></li>
                                        </ul>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-3 col-sm-3"><h3 class="heading-title">Purpose</h3></div>
                                    <div class="col-md-9 col-sm-9">
                                        <ul class="feature-list">
                                            <li>
                                                <?php
                                                if ($listing['purpose'] == "sale") {
                                                    echo "For Sale";
                                                } elseif ($listing['purpose'] == "rent") {
                                                    echo "To Rent";
                                                } else {
                                                    echo "For Students";
                                                }
                                                ?>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-3 col-sm-3"><h3 class="heading-title">Property type</h3></div>
                                    <div class="col-md-9 col-sm-9">
                                        <ul class="feature-list">
                                            <li><?php echo ucfirst($listing['property_type']); ?></li>
                                        </ul>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-3 col-sm-3"><h3 class="heading-title">Build Year</h3></div>
                                    <div class="col-md-9 col-sm-9">
                                        <ul class="feature-list">
                                            <li><i class="fa fa-check"></i> <?php echo $listing['build_year']; ?></li>
                                        </ul>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-3 col-sm-3"><h3 class="heading-title">Description</h3></div>
                                    <div class="col-md-9 col-sm-9">
                                        <p>
                                            <?php echo nl2br($listing['description']); ?>
                                        </p>
                                        <div class="social-icon pull-right">
                                            <ul class="social-network social-circle share-icon">
                                                <!--<li><a href="javascript:void(0)" class="icoInsta" title="Share Email"><i class="fa fa-envelope"></i></a></li>-->
                                                <!--<li style="margin-left: 0px;"><a href="javascript:void(0)" class="icoFacebook" title="Share Facebook"><i class="fa fa-facebook"></i></a></li>-->
                                                <!--<li><a href="javascript:void(0)" class="icoTwitter" title="Share Twitter"><i class="fa fa-twitter"></i></a></li>-->
                                                <li><a class="icoInsta" href="mailto:?subject=Checkout This Property Details&body=<?php echo base_url().'listing/detail/'.$listing['unique_id']; ?>" target="_blank" title="Share By Email"> <i class="fa fa-envelope"></i></a></li>
                                                <li><a class="icoInsta fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo base_url().'listing/detail/'.$listing['unique_id']; ?>"><i class="fa fa-facebook"></i></a></li>
                                                <li><a class="icoInsta" href="https://twitter.com/intent/tweet?url=<?php echo base_url().'listing/detail/'.$listing['unique_id']; ?>" target="_blank" title="Share By Twitter"> <i class="fa fa-twitter"></i></a> </li>
                                                <li><a class="icoInsta CopytoClip" href="javascript:void(0)" title="Copy To Clipboard"> <i class="fa fa-clipboard"></i></a> </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- Availability Section -->
                            </article>
                            <!-- Property Location / Map -->
                            <div class="property-location widget panel-box">
                                <div class="panel-header">
                                    <h3 class="panel-title">Property Location</h3>
                                </div>
                                <div class="panel-body">
                                    <iframe src="http://maps.google.com/maps?q=<?php echo @$listing['latitude']; ?>, <?php echo @$listing['longitude']; ?>&z=15&output=embed" width="750" height="350" frameborder="0" style="border:0"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div id="sidebar">
                            <div class="widget">
                                <div class="panel-box">
                                    <div class="panel-header">
                                        <h3 class="panel-title">Agent Information</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="profile-box">
                                            <div class="profile-header">
                                                <a href="<?php echo base_url(); ?>agent/<?php echo $listing['user_unique_id']; ?>">
                                                    <div class="profile-img">
                                                        <img src="<?php echo base_url(); ?>uploads/images/<?php echo $listing['agency_image'] ?>" alt="Agency Image">
                                                    </div>
                                                    <h5 class="profile-title"><?php echo $listing['agency_name']; ?></h5>
                                                </a>
                                            </div>
                                            <div class="property-item text-center">
                                                <span class="property-label">
                                                    <p style="display: none;"><i class="fa fa-phone"></i> <?php echo $listing['contact_phone']; ?></p>
                                                    <button class="show-email property-label__type showInfo" tabindex="0" data-value="<?php echo $listing['contact_phone']; ?>">Show Phone number</button>
                                                </span>			
                                            </div>
                                            <div class="property-item text-center">
                                                <span class="property-label">
                                                    <p style="display: none;"><i class="fa fa-envelope"></i>&nbsp;<?php echo $listing['contact_email']; ?></p>
                                                    <button class="show-phone property-label__type showInfo" tabindex="0" data-value="<?php echo $listing['contact_email']; ?>">Show Email</button>
                                                </span>			
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- widget section Message -->
                            <div class="widget">
                                <div class="panel-box">
                                    <div class="panel-header">
                                        <h3 class="panel-title">Leave Message</h3>
                                    </div>
                                    <div class="panel-body">
                                        <form action="" method="post" id="messageForm">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Name" name="name">
                                            </div>
                                            <input type="hidden" name="listing_id" value="<?php echo $listing['unique_id']; ?>">
                                            <div class="form-group">
                                                <input type="email" class="form-control" placeholder="Email" name="email">
                                            </div>
                                            <div class="form-group">
                                                <textarea name="message" id="messages" cols="30" rows="3" class="form-control" placeholder="Message"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <input type="button" class="btn-submit btn-primary btn leaveMessage" value="Submit">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- widget section Recent Property-->
                            <div class="widget">
                                <div class="panel-box">
                                    <!-- Panel Header / Title -->
                                    <div class="panel-header">
                                        <h3 class="panel-title">Recent Property</h3>
                                    </div>
                                    <?php $recentListings = getRecentListings(); ?>
                                    <!-- Panel Body -->
                                    <div class="panel-body">
                                        <!-- Recent Property -->
                                        <ul class="recent-property">
                                            <?php foreach ($recentListings as $recent) {
                                                $image_name = array_column($recent['images'],'image_name');
                                                $first_image = current($image_name);
                                                $image1= '';
                                                if(!empty($first_image) && file_exists(FCPATH.'assets/listing_images/'.$first_image)){
                                                    $image1 = base_url()."assets/listing_images/". $first_image;
                                                }else{
                                                    $image1 = "https://via.placeholder.com/350x150?text=No+Image";
                                                }
                                                ?>
                                                <li>
                                                    <div class="property-image">
                                                        <img src="<?php echo $image1; ?>" alt="Property Image" />
                                                    </div>
                                                    <div class="property-content">
                                                        <a href="<?php echo base_url(); ?>listing/detail/<?php echo $recent['unique_id']; ?>"><?php echo ucwords($recent['title']); ?></a>
                                                        <span class="property-price" style="margin:0px !important;"><?php echo currency() . number_format($recent['price'], 0); ?><?php echo ($recent['purpose'] == 'rent' || $recent['purpose'] == 'student') ? " PCM" : ""; ?></span>
                                                        <ul class="property-footer">
                                                            <li class="item-wide"><span class="fi flaticon-wide"></span> <?php echo $recent['land_area'] . " " . getUnit($recent['unit']); ?></li>
                                                            <li class="item-garage"><span class="fi flaticon-room"></span> <?php echo $recent['no_of_bedrooms']; ?></li>
                                                        </ul>
                                                    </div>
                                                </li>
                                            <?php } ?>
                                            <!-- Property List Item -->
                                        </ul>
                                    </div>
                                </div>
                            </div>	
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <input type="hidden" name="currentUrl" id="currentUrl" value="<?php echo $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>">
        <!-- Become Space Provider End-->
        <?php $this->load->view('common/footer'); ?>
        <?php $this->load->view('common/scripts'); ?>
    </body>
    <script>
        $(document).on('click', '.CopytoClip', function(){
            var dummy = document.createElement('input'),
            text = window.location.href;

            document.body.appendChild(dummy);
            dummy.value = text;
            dummy.select();
            document.execCommand('copy');
            document.body.removeChild(dummy);
            $.gritter.add({
                title: 'Success!',
                sticky: false,
                time: '15000',
                before_open: function () {
                    if ($('.gritter-item-wrapper').length >= 1)
                    {
                        return false;
                    }
                },
                text: 'Property URL has been copied to clipboard.',
                class_name: 'gritter-info'
            });
        });
        window.fbAsyncInit = function() {
            FB.init({
              appId      : '170009077079135',
              xfbml      : true,
              version    : 'v2.8'
          });
        };

        (function(d, s, id){
         var js, fjs = d.getElementsByTagName(s)[0];
         if (d.getElementById(id)) {return;}
         js = d.createElement(s); js.id = id;
         js.src = "//connect.facebook.net/en_US/sdk.js";
         fjs.parentNode.insertBefore(js, fjs);
     }(document, 'script', 'facebook-jssdk'));
 </script>
 <script type="text/javascript">
    $(document).on('click', '.showInfo', function(){
        $(this).parent().find('p').css('display','block');
        $(this).css('display','none');
            // $(this).text($(this).attr('data-value'));
            // $(this).removeClass('showInfo');
            // $(this).addClass('disabled');
        });
    $(document).on('click', '.leaveMessage', function () {
        var btn = $(this);
        var form = $('#messageForm').serialize();
        $(btn).button('loading');
        $.ajax({
            url: "<?php echo base_url(); ?>listing/leaveMessage",
            type: "post",
            data: form,
            dataType: "json",
            success: function (output) {
                if (output.msg == 'success') {
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
                        text: output.response,
                        class_name: 'gritter-info'
                    });
                    $("#messageForm")[0].reset();
                } else if (output.msg == 'error') {
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
                        text: output.response,
                        class_name: 'gritter-error'
                    });
                }
                $(btn).button('reset');
            }
        })
    });
</script>
</html>