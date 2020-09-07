<?php $this->load->view('admin_common/header');?>
<!-- END HEADER -->
<!-- BEGIN HEADER & CONTENT DIVIDER -->
<div class="clearfix"> </div>
<!-- END HEADER & CONTENT DIVIDER -->
<!-- BEGIN CONTAINER -->
<div class="page-container">
    <!-- BEGIN SIDEBAR -->
    <?php $this->load->view('admin_common/sidebar');?>
    
    <!-- END SIDEBAR -->
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN VALIDATION STATES-->
                    <div class="portlet light portlet-fit portlet-form bordered">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-pencil font-red"></i>
                                <span class="caption-subject font-red sbold uppercase">Edit Article</span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <!-- BEGIN FORM-->
                            <form action="" class="form-horizontal" id="addArticle" method="post" enctype="multipart/form-data">
                                <div class="form-body">
                                    <?php if($this->session->flashdata('success_msg') != ''){ ?>
                                        <div class="alert alert-success"><?php echo $this->session->flashdata('success_msg'); ?></div>
                                    <?php } ?>
                                    <?php if($this->session->flashdata('error_msg') != ''){ ?>
                                        <div class="alert alert-danger"><?php echo $this->session->flashdata('error_msg'); ?></div>
                                    <?php } ?>
                                    <div class="alert alert-danger display-hide">
                                        <button class="close" data-close="alert"></button> You have some form errors. Please check below. 
                                    </div>
                                    <div class="alert alert-success display-hide">
                                        <button class="close" data-close="alert"></button> Your form validation is successful! 
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-2">Banner
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-6">
                                            <div>
                                                <img src="<?php echo base_url(); ?>uploads/banners/<?php echo $article['banner']; ?>" class="img-thumbnail" style="width: 350px">
                                                <input type="hidden" name="old_banner" value="<?php echo $article['banner']; ?>">
                                            </div>
                                            <input type="file" name="banner" accept=".jpeg,.jpg,.png" /> 
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-2">Category
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-6">
                                            <select class="form-control" name="topic">
                                                <option value="">-- Select --</option>
                                                <?php foreach ($topics as $topic){ ?>
                                                    <option <?php echo ($topic['id'] == $article['topic_id'])?"selected":""; ?> value="<?php echo $topic['id']; ?>"><?php echo $topic['topic']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-2">Title
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-6">
                                            <input type="text" name="title" class="form-control" value="<?php echo $article['title']; ?>" /> 
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-2">Description
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-7">
                                            <textarea class="ckeditor" id="description" name="description"><?php echo $article['description']; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-2"></label>
                                        <div class="col-md-7">
                                            <div class="mt-checkbox-list">
                                                <label class="mt-checkbox mt-checkbox-outline"> Is Active ?
                                                    <input type="checkbox" <?php echo ($article['is_active'] == "Y")?"checked":""; ?> value="1" name="is_active">
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
                                            <button type="submit" class="btn green formSubmit">Submit</button>
                                            <a href="<?php echo base_url(); ?>admin/articles" class="btn red btn-outline">Cancel</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!-- END FORM-->
                        </div>
                    </div>
                    <!-- END VALIDATION STATES-->
                </div>
            </div>
        </div>
        <!-- END CONTENT BODY -->
    </div>

    <?php $this->load->view('admin_common/footer');?>

    <!-- END THEME LAYOUT SCRIPTS -->
</body>
<script type="text/javascript">
    var e = $("#addArticle"),
    r = $(".alert-danger", e),
    i = $(".alert-success", e);
   //  $('#addArticle').validate({
   //      errorElement: "span",
   //      errorClass: "help-block help-block-error",
   //      focusInvalid: !1,
   //      ignore: "",
   //      rules: {
   //          topic: {
   //              required: !0
   //          },
   //          title: {
   //              required: !0
   //          },
   //          description: {
   //              required: function() {
   //                  CKEDITOR.instances.description.updateElement();
   //              },
   //              minlength: 20,
   //          },
   //      },
   //      invalidHandler: function(e, t) {
   //          i.hide(), r.show(), App.scrollTo(r, -200)
   //      },
   //      errorPlacement: function(e, r) {
   //          var i = $(r).parent(".input-group");
   //          i ? i.after(e) : r.after(e)
   //      },
   //      highlight: function(e) {
   //          $(e).closest(".form-group").addClass("has-error")
   //      },
   //      unhighlight: function(e) {
   //          $(e).closest(".form-group").removeClass("has-error")
   //      },
   //      success: function(e) {
   //          e.closest(".form-group").removeClass("has-error")
   //      },
   //      submitHandler: function(form) {
   //          if ($(form).valid()){
   //             form.submit(); 
   //         }
   //         i.show(), r.hide()
   //     }
   // });
    // $(document).on('click', '.formSubmit', function(){
    //     alert('ok ok');
    //     if ($('#addArticle').valid()) {
    //         $('#addArticle').submit();
    //     }else{
    //         alert('not ok');
    //     }
    // });
    // CKEDITOR.replace( 'description' );
    CKEDITOR.replace( 'description' ,{
        extraPlugins: 'image2,uploadimage',
        format_tags: 'p;h1;h2;h3;pre',
        removeDialogTabs: 'image:advanced;link:advanced',
        height: 450
    });
</script>
</html>