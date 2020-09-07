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
               <!--  <div class="row">
                    <h2 class="first-h2">Manage Properties</h2>
                </div> -->
                <div class="row">
                	<div class="col-md-12">
                		<!-- BEGIN EXAMPLE TABLE PORTLET-->
                		<div class="portlet box red">
                			<div class="portlet-title">
                				<div class="caption">
                					<span class="caption-subject bold uppercase"> <?php echo $title; ?> </span>
                				</div>
                			</div>
                			<div class="portlet-body" id="ajax_return">
                                <div class="row">
                                    <?php if($this->session->flashdata('success_msg') != ''){ ?>
                                        <div class="alert alert-success"><?php echo $this->session->flashdata('success_msg'); ?></div>
                                    <?php } ?>
                                    <?php if($this->session->flashdata('error_msg') != ''){ ?>
                                        <div class="alert alert-danger"><?php echo $this->session->flashdata('error_msg'); ?></div>
                                    <?php } ?>
                                </div>
                                <table class="table table-striped table-bordered table-hover table-checkable order-column dataTable" id="listing">
                                 <thead>
                                  <tr>
                                   <th class="sorting" tabindex="0" aria-controls="sample_1"> Title </th>
                                   <th class="sorting" tabindex="0" aria-controls="sample_1"> Seller </th>
                                   <th class="sorting" tabindex="0" aria-controls="sample_1"> Property Type </th>
                                   <th class="sorting" tabindex="0" aria-controls="sample_1"> Home Worth </th>
                                   <th class="sorting" tabindex="0" aria-controls="sample_1"> Listed Date </th>
                                   <th class="sorting" tabindex="0" aria-controls="sample_1"> Status </th>
                                   <th>Action</th>
                               </tr>
                           </thead>
                           <tbody>
                              <?php foreach ($listing as $list) {
                                 $seller = singleRow('users','*', 'id = '.$list['users_id']); 
                                 ?>
                                 <tr id="row_<?php echo $list['unique_id'] ?>">
                                    <td style="width: 15%"><?php echo $list['title']?></td>
                                    <td><?php echo $seller['first_name'].' '.$seller['last_name']; ?></td>
                                    <td><?php echo ucfirst($list['property_type']); ?></td>
                                    <td><?php echo currency().number_format($list['price']); ?></td>
                                    <td><?php echo date('F d, Y', strtotime($list['created_at'])); ?></td>
                                    <td>
                                        <?php if ($list['is_approved'] == "N") {
                                            $text= "Pending Approval";
                                            $class = "label label-sm label-danger";
                                        }else if ($list['is_approved'] == "Y") {
                                            if ($list['is_active'] == "Y") {
                                                $text= "Active";
                                                $class = "label label-sm label-success";
                                            }else if ($list['is_active'] == "N") {
                                                $text= "Not Active";
                                                $class = "label label-sm label-danger";
                                            }
                                        } ?>
                                        <label class="<?php echo $class; ?>"><?php echo $text; ?></label>
                                    </td>
                                    <td class="text-center">
                                       <div class="row-actions">
                                        <span class="view">
                                            <a class="btn btn-success btn-xs" href="<?php echo base_url() ?>admin/listing/view/<?php echo $list['unique_id'] ?>">View</a>
                                        </span>
                                        <?php if ($list['is_approved'] == "N") { ?>
                                            <span class="approve">
                                                <button data-listing-id="<?php echo $list['id']; ?>" class="btn btn-primary btn-xs approveProperty">Approve</button>
                                            </span>
                                        <?php }else{ 
                                            if ($list['is_active'] == "N") { ?>
                                                <span class="active">
                                                    <button data-listing-id="<?php echo $list['id']; ?>" class="btn btn-primary btn-xs activeProperty">Active</button>
                                                </span>
                                            <?php }else{ ?>
                                                <span class="active">
                                                    <button data-listing-id="<?php echo $list['id']; ?>" class="btn btn-danger btn-xs inActiveProperty">In-Active</button>
                                                </span>
                                            <?php } ?>
                                        <?php } ?>
                                        <span class="delete">
                                            <a data-listing-id="<?php echo $list['id']; ?>" class="btn btn-danger btn-xs deleteListing" href="javascript:void(0)">Delete</a>
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
	$("#listing").dataTable({
		"ordering": false
	});

	$(document).on('click','.status',function(){
		var id = $(this).attr('data-id');
		$(".btn_"+id).removeClass('active');
		var value = $(this).attr('data-value');
        //var value = $(this).val();
        $.ajax({
        	type: "POST",
        	url: "<?php echo base_url(); ?>admin/listing/updatePropertyStatus",
        	data: 'id=' + id + '&val='+value,
        	success: function(response){
                //$(this).addClass('active');
                if(value == 'Y'){
                	swal("Approved!", "The record has been approved successfully.", "success");
                	$('.div_'+id).parent('td').addClass('text-center');
                	$('.div_'+id).replaceWith('<span class="label label-sm label-success"> Published </span>');
                }else if(value == 'N'){
                	swal("Rejected!", "The record has been rejected.", "error");
                	$('.div_'+id).parent('td').addClass('text-center');
                	$('.div_'+id).replaceWith('<span class="label label-sm label-warning"> Draft </span>');
                }
            }
        });
    });

	$(document).on('change','#view_changer', function(){
		var column = $(this).find(":selected").val();
		$.ajax({
			type: "POST",
			url: "<?php echo base_url(); ?>admin/listing/getListingByAjax",
			data: 'column=' + column,
			datatype: "JSON",
			success: function(response){
				var output = $.parseJSON(response);
				$('#ajax_return').html(output.view);
			}
		});
	});
</script>
<script type="text/javascript">
    $(document).on('click','.approveProperty',function(){
        var listing_id = $(this).attr('data-listing-id');
        $.confirm({
            title: 'Approve Property',
            type:'red',
            content: 'Are you sure? you won\'t be able to undo this.',
            buttons: {
                Cancel: function () {
                },
                Approve: {
                    text: 'Approve',
                    btnClass: 'btn-red',
                    action: function(){
                        $.ajax({
                            url:"<?php echo base_url(); ?>admin/listing/approveListing",
                            type:"post",
                            data:"listing_id="+listing_id,
                            dataType:"json",
                            success: function(status){
                                location.reload(true);
                            }
                        });
                    }
                }
            }
        });
    });

    $(document).on('click','.deleteListing',function(){
        var listing_id = $(this).attr('data-listing-id');
        $.confirm({
            title: 'Delete Property',
            type:'red',
            content: 'Are you sure? you won\'t be able to undo this.',
            buttons: {
                Cancel: function () {
                },
                Approve: {
                    text: 'Delete',
                    btnClass: 'btn-red',
                    action: function(){
                        $.ajax({
                            url:"<?php echo base_url(); ?>admin/listing/deleteListing",
                            type:"post",
                            data:"listing_id="+listing_id,
                            dataType:"json",
                            success: function(status){
                                location.reload(true);
                            }
                        });
                    }
                }
            }
        });
    });

    $(document).on('click','.activeProperty',function(){
        var listing_id = $(this).attr('data-listing-id');
        $.confirm({
            title: 'Active Property',
            type:'red',
            content: 'Are you sure you want to active this propert?',
            buttons: {
                Cancel: function () {
                },
                Active: {
                    btnClass: 'btn-red',
                    action: function(){
                        $.ajax({
                            url:"<?php echo base_url(); ?>admin/listing/activeListing",
                            type:"post",
                            data:"listing_id="+listing_id,
                            dataType:"json",
                            success: function(status){
                                location.reload(true);
                            }
                        });
                    }
                }
            }
        });
    });

    $(document).on('click','.inActiveProperty',function(){
        var listing_id = $(this).attr('data-listing-id');
        $.confirm({
            title: 'In-Active Property',
            type:'red',
            content: 'Are you sure you want to in-active this property.',
            buttons: {
                Cancel: function () {
                },
                Approve: {
                    text: 'In-Active',
                    btnClass: 'btn-red',
                    action: function(){
                        $.ajax({
                            url:"<?php echo base_url(); ?>admin/listing/inActiveListing",
                            type:"post",
                            data:"listing_id="+listing_id,
                            dataType:"json",
                            success: function(status){
                                location.reload(true);
                            }
                        });
                    }
                }
            }
        });
    });
</script>