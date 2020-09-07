<?php $this->load->view('admin_common/header.php');?>
<!-- BEGIN HEADER & CONTENT DIVIDER -->
<div class="clearfix"> </div>
<!-- END HEADER & CONTENT DIVIDER -->
<!-- BEGIN CONTAINER -->
<div class="page-container">
    <?php $this->load->view('admin_common/sidebar.php');?>
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content" id="edit-booking-sheet">
            <!-- BEGIN PAGE HEADER-->
            <div class="col-xs-12">
                <form  action="<?php echo base_url();?>admin/listing/emailToBuyer" method="POST" >
                    <div class="row review-email">
                        <div class="col-xs-12">
                            <h3 class="review-email-h3">Send Details to Buyer</h3>
                        </div>
                        <?php 
                        $detail = getAll('sell_description','sell_id',$id);
                        $detail = $detail[0];
                        ?>
                        <div class="col-xs-12 ent_email_container">
                            <div class="form-group">
                                <label for="to">To:</label>
                                <input class="input-field form-control" id="to" type="text" name="email" value="">
                            </div>
                            <div class="form-group">
                                <label for="subject">Subject:</label>
                                <input class="input-field form-control" id="subject" type="text" name="subject" value="Home Description and Detail - Kasah">
                            </div>
                            <br>
                            <a href="<?php echo base_url('admin/listing/view_email').'/'.$id ?>" target="_blank" type="button" class="btn btn-default btn-success">View Email Content</a>
                            <br><br>
                            <div class="form-group">
                                <label for="subject" class="col-xs-12 no-padding">Desired House Price:</label>
                                <div class="col-md-4 col-sm-6 no-padding">
                                <input class="input-field form-control" min="0" id="subject" type="number" name="admin_home_worth" value="<?php echo (!empty($detail['admin_home_worth']))?$detail['admin_home_worth']:$detail['home_worth'] ?>">
                                </div>
                                <div class="col-xs-12 no-padding">
                                    <span style="color: #000;font-size: 12px">* Actual price against this listing is  <b><?php echo "$".number_format(($detail['home_worth'])) ?></b>. Leave the field blank if you dont want to modify the actual price. </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="message" class="col-xs-12 no-padding marg20">Additional Message:</label>
                                <div class="col-md-12 no-padding">
                                    <textarea  name="message" id="message">

                                    </textarea>
                                    <script>
                                        CKEDITOR.replace( 'message' );
                                    </script>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <input type="hidden" name="sell_id" value="<?php echo $id; ?>">
                            <input type="submit" name="emailToBuyer" class="btn" value="Send Email">
                        </div>
                    </div>
                    <div class="row">
                        <img src="img/statuskeys.png" class="img-responsive pull-right">
                    </div>
                </form>
            </div>
            <!-- END PAGE HEADER-->
        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<?php $this->load->view('admin_common/footer.php');?>
