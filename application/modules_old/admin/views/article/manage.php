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
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet box red">
                        <div class="portlet-title">
                            <div class="caption">
                                <span class="caption-subject bold uppercase"> Manage Articles</span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="row" id="errorMessages">
                                <?php if($this->session->flashdata('success_msg') != ''){ ?>
                                    <div class="alert alert-success"><?php echo $this->session->flashdata('success_msg'); ?></div>
                                <?php } ?>
                                <?php if($this->session->flashdata('error_msg') != ''){ ?>
                                    <div class="alert alert-danger"><?php echo $this->session->flashdata('error_msg'); ?></div>
                                <?php } ?>
                            </div>
                            <div class="table-toolbar">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="btn-group">
                                            <a class="btn sbold btn-info" href="<?php echo base_url(); ?>admin/articles/add"> Add New
                                                <i class="fa fa-plus"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <table class="table table-striped table-bordered table-hover table-checkable order-column dataTable no-footer" id="buyer" role="grid" aria-describedby="sample_1_info">
                                <thead>
                                    <tr role="row">
                                        <th style="width: 100px"> ID </th>
                                        <th class="sorting" tabindex="0" aria-controls="sample_1"> Banner </th>
                                        <th class="sorting" tabindex="0" aria-controls="sample_1"> Category </th>
                                        <th class="sorting" tabindex="0" aria-controls="sample_1"> Title </th>
                                        <th class="sorting" tabindex="0" aria-controls="sample_1"> Status </th>
                                        <th class="sorting" tabindex="0" aria-controls="sample_1"> Date </th>
                                        <th> Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($articles)) {
                                        $count = 1;
                                        foreach ($articles as $article) { ?>
                                            <tr>
                                                <td><?php echo $count++; ?></td>
                                                <td>
                                                    <img src="<?php echo base_url(); ?>uploads/banners/<?php echo $article['banner']; ?>" class="img-thumbnail" style="width: 70px">
                                                </td>
                                                <td>
                                                    <?php echo $article['topic']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $article['title']; ?>
                                                </td>
                                                <td>
                                                    <?php if ($article['is_active'] == "Y") {
                                                        $text = "Active";
                                                        $class = "label label-success label-sm";
                                                    }else{
                                                        $text = "In-Active";
                                                        $class = "label label-danger label-sm";
                                                    } ?>
                                                    <label class="<?php echo $class; ?>"><?php echo $text; ?></label>
                                                </td>
                                                <td><?php echo date('M d, Y - h:i A', strtotime($article['date_added'])); ?></td>
                                                <td style="text-align: center;">
                                                    <div class="row-actions">
                                                        <?php if ($article['is_active'] == "Y") { ?>
                                                            <span class="edit">
                                                                <a target="_blank" href="<?php echo base_url() ?>news/<?php echo $article['slug']; ?>" class="btn btn-success btn-xs">View Article</a>
                                                            </span>
                                                        <?php } ?>
                                                        <span class="edit">
                                                            <a href="<?php echo base_url() ?>admin/articles/edit/<?php echo $article['id']; ?>" class="btn btn-success btn-xs">Edit</a>
                                                        </span>
                                                        <span class="delete">
                                                            <button class="btn btn-danger btn-xs deleteTopic" data-topic-id="<?php echo $article['id']; ?>">Delete</button>
                                                        </span>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php }
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
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

    $(document).on('click','.deleteTopic',function(e){
        var btn = $(this);
        var articleID = $(this).attr('data-topic-id');
        $.confirm({
            title: 'Delete Article!',
            type:'red',
            content: 'Are you sure? you won\'t be able to undo this.',
            buttons: {
                Cancel: function () {
                },
                Delete: {
                    text: 'Delete',
                    btnClass: 'btn-red',
                    action: function(){
                        $.ajax({
                            url:"<?php echo base_url(); ?>admin/articles/deleteArticle",
                            type:"post",
                            data:"id="+articleID,
                            dataType:"json",
                            success: function(status){
                                $('#errorMessages').html("<div class='alert alert-success'>"+status.response+"</div>");
                                $(btn).parents('tr').remove();
                            }
                        })
                    }
                }
            }
        });
    });
</script>