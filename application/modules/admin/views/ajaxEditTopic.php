
<div class="col-md-12">
    <label>Enter Category</label>
    <input required="" type="text" name="topic" class="form-control" placeholder="Enter category heading here" value="<?php echo $topic['topic']; ?>">
</div>
<div class="col-md-12">
    <div class="mt-checkbox-list">
        <label class="mt-checkbox mt-checkbox-outline"> Is Active ?
            <input <?php echo ($topic['is_active'] == "Y")?"checked":""; ?> type="checkbox" value="1" name="is_active">
            <span></span>
        </label>
        <input type="hidden" name="topicID" value="<?php echo $topic['id']; ?>">
    </div>
</div>
