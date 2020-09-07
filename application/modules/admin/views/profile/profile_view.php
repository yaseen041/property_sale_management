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
		<div class="page-content" id="booking-sheet">
			<!-- BEGIN PAGE HEADER-->
			<div class="col-xs-12">
               <div class="row">
                <?php if($this->session->flashdata('success_msg') != ''){ ?>
                    <div class="alert alert-success"><?php echo $this->session->flashdata('success_msg'); ?></div>
                <?php } ?>
                <?php if($this->session->flashdata('error_msg') != ''){ ?>
                    <div class="alert alert-danger"><?php echo $this->session->flashdata('error_msg'); ?></div>
                <?php } ?>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet">
                        <div class="portlet-title">
                        </div>
                        <div class="portlet-body">
                            <div class="table-container">         
                                <div class="portlet box red">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            Manage Your Profile
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <table class="table table-striped table-bordered table-hover" >
                                            <tbody>
                                                <tr class="odd gradeX">
                                                  <td width="20%" rowspan="4" align="center">
                                                    <div style="border:#999 solid 2px; width:75%; height:140px;">
                                                        <img src="<?php echo base_url() ?>assets/images/user.png" style="width:100%; height:100%;" />
                                                    </div>
                                                </td>
                                                <td width="25%">Full Name</td>
                                                <td width="38%"><?php echo $admin_details['username']; ?></td>
                                                <td width="17%" align="right">
                                                    <a class="btn btn-success btn-small"  data-toggle="modal" href="#basic">
                                                    Update Profile </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Username</td>
                                                <td><?php echo $admin_details['username'] ?></td>
                                                <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td>Email Address</td>
                                                <td><?php echo $admin_details['email'] ?></td>
                                                <td>&nbsp;</td>
                                            </tr>
                                            <!-- <tr>
                                                <td align="center"><a href="#large" data-toggle="modal" id="mws-form-dialog-profile-photo" class="btn btn-success btn-small imgUpload" data-admin-id="<?php echo $admin_details['id'] ?>" title="Click here to change photo">Change Photo</a></td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                            </tr> -->
                                        </tbody>
                                    </table>
                                    <div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h4 class="modal-title">Update Profile</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="<?php echo base_url() ?>admin/profile" method="post" accept-charset="utf-8" name="change_profile" class="form-horizontal" id="mws-validate">
                                                        <div class="form-body">
                                                            <div class="form-group">
                                                                <label class="col-md-3 control-label">Username</label>
                                                                <div class="col-md-6">
                                                                    <input type="text" name="username" id="username" value="<?php echo $admin_details['username'] ?>" class="form-control" disabled="disabled">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-body">
                                                            <div class="form-group">
                                                                <label class="col-md-3 control-label">Password</label>
                                                                <div class="col-md-6">
                                                                    <input type="password" name="password" id="password" value="" class="form-control">
                                                                    <span style="font-size: 12px">Leave this field empty if you don't want to update password</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-body">
                                                            <div class="form-group">
                                                                <label class="col-md-3 control-label">Email Address</label>
                                                                <div class="col-md-6">
                                                                    <input type="text" disabled="" name="email_address" id="email_address" value="<?php echo $admin_details['email'] ?>" class="email form-control">
                                                                    <input type="hidden" name="id" value="<?php echo $admin_details['userid']; ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn green">Submit</button>
                                                    </div>
                                                </form>                                                                        
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END PAGE CONTENT-->

    </div>
</div>
</div>
<!-- END PAGE HEADER-->
</div>
<!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->
</div>
<div class="modal fade bs-modal-lg" id="large" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md" id="ajax_modal">

    </div>
    <!-- /.modal-dialog -->
</div>
<!-- END CONTAINER -->

<?php $this->load->view('admin_common/footer');?>

<script src="<?php echo base_url();?>assets/js/sweetalert.min.js"></script>
<script type="text/javascript">
    $(document).on('click','.imgUpload',function(){
        var id = $(this).attr('data-admin-id');
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>admin/profile/ajax_modal",
            data: 'id=' + id,
            datatype: "json",
            success: function(response){
                var json = $.parseJSON(response);
                $('#ajax_modal').html(json);
            }
        });
    });
</script>
