<form action="<?php echo base_url() ?>admin/profile/upload_avatar" method="post" enctype='multipart/form-data'>
<div class="modal-content">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h2 class="modal-title">Update Profile Photo</h2>
</div>
<div class="modal-body">
        <div class="row">
            <div class="form-group">
                <div class="col-md-4"><b>Accepted Types:</b></div>
                <div class="col-md-8">PNG, JPG, GIF</div>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <div class="col-md-4"><b>Select Image:</b></div>
                <div class="col-md-8">
                    <input type="file" name="avatar">
                </div>
            </div>
        </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <input type="hidden" name="admin_id" value="<?php echo $id ?>">
    <button type="submit" class="btn btn-success">Upload</button>
</div>
</div>
</form>