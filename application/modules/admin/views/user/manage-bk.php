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
                    <div class="col-md-12">
                        <!-- BEGIN EXAMPLE TABLE PORTLET-->
                        <div class="portlet box red">
                            <div class="portlet-title">
                                <div class="caption">
                                    <span class="caption-subject bold uppercase"> Manage Users</span>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="row">
                                    <?php if($this->session->flashdata('success_msg') != ''){ ?>
                                        <div class="alert alert-success"><?php echo $this->session->flashdata('success_msg'); ?></div>
                                    <?php } ?>
                                    <?php if($this->session->flashdata('error_msg') != ''){ ?>
                                        <div class="alert alert-danger"><?php echo $this->session->flashdata('error_msg'); ?></div>
                                    <?php } ?>
                                </div>
                                <table class="table table-striped table-bordered table-hover table-checkable order-column dataTable no-footer" id="buyer" role="grid" aria-describedby="sample_1_info">
                                    <thead>
                                        <tr role="row">
                                            <th style="width: 100px"> ID </th>
                                            <th class="sorting" tabindex="0" aria-controls="sample_1"> Name </th>
                                            <th class="sorting" tabindex="0" aria-controls="sample_1"> Email </th>
                                            <th class="sorting" tabindex="0" aria-controls="sample_1"> Profile Status </th>
                                            <th class="sorting" tabindex="0" aria-controls="sample_1"> Status </th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($details as $detail) { ?>
                                            <tr id="row_<?php echo $detail['unique_id'] ?>">
                                                <td width="12%">
                                                    <?php echo $detail['unique_id'] ?>
                                                </td>
                                                <td><?php echo $detail['first_name']." ".$detail['last_name']; ?></td>
                                                <td><?php echo $detail['email'] ?></td>
                                                <td>
                                                    <?php if ($detail['profile_updated'] == "1") {
                                                        $text = "Updated";
                                                        $class = "label label-sm label-success";
                                                    }else{
                                                        $text = "Not Updated";
                                                        $class = "label label-sm label-danger";
                                                    } ?>
                                                    <label class="<?php echo $class; ?>">
                                                        <b><?php echo $text; ?></b>
                                                    </label>
                                                </td>
                                                <td>
                                                    <?php if ($detail['status'] == "1") {
                                                        $text = "Active";
                                                        $class = "label label-sm label-success";
                                                    }else{
                                                        $text = "InActive";
                                                        $class = "label label-sm label-danger";
                                                    } ?>
                                                    <label class="<?php echo $class; ?>">
                                                        <b><?php echo $text; ?></b>
                                                    </label>
                                                </td>
                                                <td style="text-align: center;">
                                                    <div class="row-actions">
                                                        <span class="view">
                                                            <a class="btn btn-success btn-xs" href="<?php echo base_url() ?>admin/users/view/<?php echo $detail['id'] ?>">View</a>
                                                        </span>
                                                        <!-- <span class="edit">
                                                            <a class="btn btn-primary btn-xs" href="<?php echo base_url() ?>admin/buyer/edit/<?php echo $detail['id'] ?>">Edit</a>
                                                        </span> -->
                                                        <span class="delete">
                                                            <a class="btn btn-danger btn-xs deleteBtn" href="<?php echo base_url() ?>admin/users/delete/<?php echo $detail['id'] ?>">Delete</a>
                                                        </span>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- END EXAMPLE TABLE PORTLET-->
                    </div>
                </div>
            </div>
            <!-- END PAGE HEADER-->
        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->
</div>
<!-- END CONTAINER -->

<?php $this->load->view('admin_common/footer');?>
<script type="text/javascript">
    $(document).ready(function(){
        $("#buyer").dataTable({
            "ordering": false
        } );
    });

    $(document).on('click','.deleteBtn',function(e){
        var anchor = $(this).attr('href');
        e.preventDefault();
        $.confirm({
            title: 'Delete User!',
            type:'red',
            content: 'Are you sure? you won\'t be able to undo this.',
            buttons: {
                Cancel: function () {
                },
                Delete: {
                    text: 'Delete',
                    btnClass: 'btn-red',
                    action: function(){
                        window.location = anchor;
                    }
                }
            }
        });
    });
</script>