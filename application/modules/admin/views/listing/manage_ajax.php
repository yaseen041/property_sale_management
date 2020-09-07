
<table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
    <thead>
        <tr>
            <th class="sorting_asc" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" style="width: 152px;" aria-sort="ascending"> ID </th>
            <th class="sorting" tabindex="0" aria-controls="sample_1"> Seller Name </th>
            <th class="sorting" tabindex="0" aria-controls="sample_1"> Property Type </th>
            <th class="sorting" tabindex="0" aria-controls="sample_1"> Home Worth </th>
            <th style="width: 18%" class="sorting" tabindex="0" aria-controls="sample_1"> Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($listing as $list) { ?>
        <tr id="row_<?php echo $list['sell_id'] ?>">
            <td style="width: 5%">
                <?php echo $list['sell_id'] ?>
            </td>
            <td><?php echo $list['fullname']?></td>
            <td><?php echo $list['property_type'] ?></td>
            <td><?php echo "$".$list['home_worth'] ?></td>
            <?php if ($list['draft'] == "Y") {?>
            <td class="text-center">
                <span class="label label-sm label-warning"> Draft </span>
            </td>
            <?php }elseif ($list['publish_approve'] == "Y") {?>
            <td>
                <div class="btn-group btn-group-circle div_<?php echo $list['sell_id'] ?>">
                    <button type="button" data-id="<?php echo $list['sell_id'] ?>" data-value="Y" class="margr0 btn btn-outline btn_<?php echo $list['sell_id'] ?> green btn-sm status">Approve</button>
                    <button type="button" data-id="<?php echo $list['sell_id'] ?>" data-value="N" class="btn btn-outline btn_<?php echo $list['sell_id'] ?> red btn-sm status">Reject</button>
                </div>
            </td>
            <?php }elseif ($list['is_sold'] == "Y") {?>
            <td style="text-align: center;">
                <span class="label label-sm label-danger"> Sold </span>
            </td>
            <?php }elseif ($list['is_approved'] == "Y") {?>
            <td style="text-align: center;">
                <span class="label label-sm label-success"> Published </span>
            </td>
            <?php }?>
            <td class="text-center">
                <div class="row-actions">
                    <span class="view">
                        <a class="btn btn-success btn-xs" href="<?php echo base_url() ?>admin/listing/view/<?php echo $list['sell_id'] ?>">View</a>
                    </span>
                    <?php if ($list['draft'] != "Y" && $list['is_sold'] != "Y" ) {?>
                    <span class="edit">
                        <a class="btn btn-primary btn-xs" href="<?php echo base_url() ?>admin/listing/edit/<?php echo $list['sell_id'] ?>">Edit</a>
                    </span>
                    <span class="delete">
                        <a class="btn btn-danger btn-xs" href="<?php echo base_url() ?>admin/listing/delete/<?php echo $list['sell_id']?>">Delete</a>
                    </span>
                    <?php if ($list['is_approved'] == "Y"): ?>
                        <span class="email">
                            <a class="btn btn-success btn-xs" href="<?php echo base_url() ?>admin/listing/senddetails/<?php echo $list['sell_id']?>">Email to Buyer
                            </a>
                        </span>
                    <?php endif ?>
                    <?php } ?>
                </div>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>
<script type="text/javascript">
    $(document).ready(function(){
        $("#sample_1").dataTable({
            "ordering": false
        } );
    });
</script>