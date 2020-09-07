<!DOCTYPE html>
<html lang="en"> 
<?php $this->load->view('common/head'); ?>
<body class="header-1 page-header-1">
    <!-- ====== BEGIN HEADER ====== -->
    <?php $this->load->view('common/header'); ?>

    <section class="become-space section-bg">
        <div class="container">
          <div class="row">

            <div class="col-md-6 col-md-offset-3 login-popup sign-pop">

              <h2>Reset Password</h2>

              <form id="reset_form" action="" method="post">
                <div class="input-group" style="width:100%;">   
                    <span><i class="fa fa-lock lock-icon"></i></span>
                    <input class="form-control" name="password" placeholder="Password" required="" type="password">
                </div>
                <div class="input-group" style="width:100%;">   
                    <span><i class="fa fa-lock lock-icon"></i></span>
                    <input class="form-control" name="c_password" placeholder="Confirm Password" required="" type="password">
                </div>
                <input type="hidden" name="secret_key" value="<?php echo $user['forgot_pass_key'] ?>">
                <div class="form-group">
                    <button type="button" id="reset_btn" class="login-btn btn">Reset</button>
                </div>

            </form>
        </div>



    </div>
</div>    
</section>

<?php $this->load->view('common/footer'); ?>
<?php $this->load->view('common/scripts'); ?>
</body>
<script type="text/javascript">
    $(document).on('click', '#reset_btn', function(){
        var btn = $(this);
        $(btn).button('loading');
        var form = $('#reset_form').serialize();
        $.ajax({
            url:"<?php echo base_url(); ?>home/resetPassword",
            type:"post",
            data:form,
            dataType:"json",
            success: function(status){
                if (status.msg == 'success') {
                    $.gritter.add({
                        title: 'Success!',
                        sticky: false,
                        time: '15000',
                        before_open: function () {
                            if ($('.gritter-item-wrapper').length >= 3)
                            {
                                return false;
                            }
                        },
                        text: status.response,
                        class_name: 'gritter-info'
                    });
                    $(btn).button('reset');
                    setTimeout(function(){
                        window.location = "<?php echo base_url(); ?>login";
                    }, 1000);
                } else if (status.msg == 'error') {
                    $.gritter.add({
                        title: 'Error!',
                        sticky: false,
                        time: '5000',
                        before_open: function () {
                            if ($('.gritter-item-wrapper').length >= 3)
                            {
                                return false;
                            }
                        },
                        text: status.response,
                        class_name: 'gritter-error'
                    });
                    $(btn).button('reset');
                }
            }
        });
    });
</script>
</html>