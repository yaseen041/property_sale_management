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

              <h2>Registration</h2>

              <form id="registration_form" action="" method="post">

                <div class="input-group" style="width:100%;">
                    <span><i class="fa fa-envelope lock-icon"></i></span>
                    <input type="email" class="form-control" id="register_email"  name="email" placeholder="Email Address" required>
                </div> 


                <div class="input-group" style="width:100%;">   
                    <span><i class="fa fa-lock lock-icon"></i></span>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                </div>

                <div class="input-group" style="width:100%;">   
                    <span><i class="fa fa-lock lock-icon"></i></span>
                    <input type="password" name="c_password" class="form-control" placeholder="Confirm Password" required>
                </div>

                <div class="forgot-outer">
                    <div class="form-check pull-left" style="margin-left: -17px;">
                        <label>
                            <input type="checkbox" name="check_policy" id="check_policy"> <span class="label-text" > </span><span class="remb">I accept the <a target="_blank" href="<?php echo base_url(); ?>terms_conditions">Terms of Use</a> & <a target="_blank" href="<?php echo base_url(); ?>privacy_policy">Privacy Policy</a></span>
                            <p id="confirm_error" class="text-danger"></p>
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <button type="button" id="registration_btn" class="btn sign-up">Sign Up</button>
                </div>


                <!-- <div class="form-group">
                    <p class="divider-text div-text">
                        <span class="bg-light divider-span">OR</span>
                    </p>
                    <p>
                        <a href="<?php // echo fb_login(); ?>" class="btn btn-block btn-facebook"> <i class="fa fa-facebook fb"></i> Continue with facebook</a>   
                    </p>
                </div> -->

                <div class="text-center">
                    <p class="pull-left">Already have an account?</p>
                    <a href="<?php echo base_url(); ?>login" class="btn pop-signin pull-right" id="login_mdl_btn">Log in</a>
                    <!-- <a href="<?php echo base_url(); ?>login" class="btn sign-btn pull-right" id="login_mdl_btn">Log in</a> -->
                </div>


            </form>
        </div>



    </div>
</div>    
</section>

<?php $this->load->view('common/footer'); ?>
<?php $this->load->view('common/scripts'); ?>
</body>
</html>