<?php $this->load->view('admin_common/header');?>
<!-- BEGIN HEADER & CONTENT DIVIDER -->
<div class="clearfix"> </div>
<!-- END HEADER & CONTENT DIVIDER -->
<!-- BEGIN CONTAINER -->
<div class="page-container">
   <?php $this->load->view('admin_common/sidebar');?>
   <!-- BEGIN CONTENT -->
   <div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE TITLE-->
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="">
            <!-- BEGIN PAGE TITLE-->
            <h3 class="page-title"> Dashboard
                <small>dashboard & statistics</small>
            </h3>
            <!-- END PAGE TITLE-->
            <!-- END PAGE HEADER-->
            <!-- BEGIN DASHBOARD STATS 1-->
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <a class="dashboard-stat dashboard-stat-v2 red" href="<?php echo base_url() ?>admin/users">
                        <div class="visual">
                            <i class="icon-users"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                <span data-counter="counterup" data-value="<?php echo $users; ?>"><?php echo $users; ?></span>
                            </div>
                            <div class="desc"> Total Users </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <a class="dashboard-stat dashboard-stat-v2 blue" href="<?php echo base_url() ?>admin/listing">
                        <div class="visual">
                            <i class="icon-layers"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                <span data-counter="counterup" data-value="<?php echo $listings; ?>"><?php echo $listings; ?></span>
                            </div>
                            <div class="desc"> Total Listings </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <a class="dashboard-stat dashboard-stat-v2 yellow" href="<?php echo base_url() ?>admin/topics">
                        <div class="visual">
                            <i class="icon-pencil"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                <span data-counter="counterup" data-value="<?php echo $topics; ?>"><?php echo $topics; ?></span>
                            </div>
                            <div class="desc"> Total Categories </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <a class="dashboard-stat dashboard-stat-v2 green" href="<?php echo base_url() ?>admin/articles">
                        <div class="visual">
                            <i class="icon-layers"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                <span data-counter="counterup" data-value="<?php echo $articles; ?>"><?php echo $articles; ?></span>
                            </div>
                            <div class="desc"> Total Articles </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->

<?php $this->load->view('admin_common/footer');?>

