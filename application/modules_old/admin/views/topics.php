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
                                    <span class="caption-subject bold uppercase"> Manage Categories</span>
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
                                                <button class="btn sbold btn-info" data-toggle="modal" data-target="#basic"> Add New
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <table class="table table-striped table-bordered table-hover table-checkable order-column dataTable no-footer" id="buyer" role="grid" aria-describedby="sample_1_info">
                                    <thead>
                                        <tr role="row">
                                            <th style="width: 100px"> ID </th>
                                            <th class="sorting" tabindex="0" aria-controls="sample_1"> Category </th>
                                            <th class="sorting" tabindex="0" aria-controls="sample_1"> Status </th>
                                            <th> Action </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($topics)) {
                                            $count = 1;
                                            foreach ($topics as $topic) { ?>
                                                <tr>
                                                    <td><?php echo $count++; ?></td>
                                                    <td><?php echo ucwords($topic['topic']); ?> ( <?php echo $topic['total_articles']; ?> Articles )</td>
                                                    <td>
                                                        <?php if ($topic['is_active'] == "Y") {
                                                            $text = "Active";
                                                            $class = "label label-success label-sm";
                                                        }else{
                                                            $text = "In-Active";
                                                            $class = "label label-danger label-sm";
                                                        } ?>
                                                        <label class="<?php echo $class; ?>"><?php echo $text; ?></label>
                                                    </td>
                                                    <td style="text-align: center;">
                                                        <div class="row-actions">
                                                            <?php if ($topic['is_active'] == "Y") { ?>
                                                            <span class="edit">
                                                                <a target="_blank" href="<?php echo base_url() ?>news/category/<?php echo $topic['topic']; ?>" class="btn btn-success btn-xs">View Articles</a>
                                                            </span>
                                                        <?php } ?>
                                                            <span class="edit">
                                                                <button class="btn btn-success btn-xs editTopic" data-topic-id="<?php echo $topic['id']; ?>">Edit</button>
                                                            </span>
                                                            <span class="delete">
                                                                <button class="btn btn-danger btn-xs deleteTopic" data-topic-id="<?php echo $topic['id']; ?>">Delete</button>
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
<div class="modal fade in" id="basic" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <form class="form-horizontal" action="" method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Add Category</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label>Enter Category</label>
                            <input required="" type="text" name="topic" class="form-control" placeholder="Enter category heading here">
                        </div>
                        <div class="col-md-12">
                            <div class="mt-checkbox-list">
                                <label class="mt-checkbox mt-checkbox-outline"> Is Active ?
                                    <input type="checkbox" value="1" name="is_active">
                                    <span></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn red" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-info" name="add_topic" value="1">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade in" id="editTopicModal" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <form class="form-horizontal" action="" method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Edit Category</h4>
                </div>
                <div class="modal-body">
                    <div class="row" id="editTopicHtml"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn red" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-info" name="edit_topic" value="1">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $this->load->view('admin_common/footer');?>
<script type="text/javascript">
    $(document).ready(function(){
        $("#buyer").dataTable({
            "ordering": false
        } );
    });

    $(document).on('click','.deleteTopic',function(e){
        var btn = $(this);
        var topicID = $(this).attr('data-topic-id');
        $.confirm({
            title: 'Delete Category!',
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
                            url:"<?php echo base_url(); ?>admin/deleteTopic",
                            type:"post",
                            data:"id="+topicID,
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
    $(document).on('click','.editTopic',function(e){
        var topicID = $(this).attr('data-topic-id');
        $.ajax({
            url:"<?php echo base_url(); ?>admin/editTopic",
            type:"post",
            data:"id="+topicID,
            dataType:"json",
            success: function(html){
                $('#editTopicHtml').html(html);
                $('#editTopicModal').modal('show');
            }
        })
    });
</script>