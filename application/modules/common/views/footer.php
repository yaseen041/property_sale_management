<!-- Forgot Password Popup Model -->
<div class="modal fade centered-modal login-popup" id="forgotModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close close-login" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Reset Password</h4>
            </div>
            <div class="modal-body">
                <form id="retrieve_password_form" action="" method="post" novalidate>
                    <p>Enter the email address associated with your account, and we’ll email you a link to reset your password.</p>
                    <div class="input-group" style="width:100%;">
                        <span><i class="fa fa-envelope mail-icon"></i></span>
                        <input type="email" class="form-control" name="email" placeholder="Email Address">
                    </div>
                </form>
            </div>
            <div class="modal-footer text-center">
                <p class="pull-left back-login"><a href="javascript:void(0)" id="back_to_login_mdl"><i class="fa fa-angle-left"></i> Back to Login </a> </p>
                <button type="button" id="retrieve_password" class="btn next-btn pull-right">Send Reset Link</button>
            </div>
        </div>
    </div>
</div>
<!-- Forgot Password End -->
<!-- Login Popup Model -->
<div class="modal fade centered-modal login-popup" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close close-login" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Login</h4>
            </div>
            <div class="modal-body">
                <form id="login_form" action="" method="post">
                    <div class="input-group" style="width:100%;">
                        <span><i class="fa fa-envelope mail-icon"></i></span>
                        <input type="email" class="form-control" name="login_email" placeholder="Email Address" required>
                    </div>
                    <div class="input-group" style="width:100%;">	
                        <span><i class="fa fa-lock lock-icon"></i></span>
                        <input type="password" class="form-control" name="login_password" placeholder="Password" required>
                    </div>
                    <div class="forgot-outer">
                        <div class="form-check pull-left" style="margin-left: -17px;">
                            <label>
                                <!-- <input type="checkbox" name="check"> <span class="label-text" > </span><span class="remb">Remember me</span> -->
                            </label>
                        </div>
                        <div class="pull-right">
                            <span class="label-text forgot"><a href="javascript:void(0)" id="forgot_mdl_btn">Forgot Password</a> </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="button" id="login_btn" class="login-btn btn">Login</button>
                    </div>
                    <!-- <div class="form-group">
                            <p class="divider-text">
                                    <span class="bg-light">OR</span>
                            </p>
                            <p>
                                    <a href="#" class="btn btn-block btn-facebook"> <i class="fa fa-facebook fb"></i> Login with facebook</a>	
                            </p>
                    </div> -->
                </form>
            </div>
            <div class="modal-footer text-center">
                <p class="pull-left">Don’t have an account?</p>
                <a href="javascript:void(0)" id="signup_mdl_btn" class="btn pop-signup pull-right">Sign up</a>
            </div>
        </div>
    </div>
</div>
<!-- Login Popup End -->
<!-- SignUp Popup Model -->
<div class="modal fade centered-modal login-popup sign-pop" id="signModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close close-login" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Sign Up</h4>
            </div>
            <div class="modal-body">
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
                        <input type="password" name="c_password" id="c_password" class="form-control" placeholder="Confirm Password" required>
                    </div>
                    <div class="forgot-outer">
                        <div class="form-check pull-left" style="margin-left: -17px;">
                            <label>
                                <input type="checkbox" name="check_policy" id="check_policy"> <span class="label-text" > </span><span class="remb">I accept the <a target="_blank" href="<?php echo base_url(); ?>terms_conditions">Terms of Use</a> & <a target="_blank" href="<?php echo base_url(); ?>privacy_policy">Privacy Policy</a></span>
                                <p id="confirm_error" class="text-danger"></p>
                            </label>
                        </div>
                    </div>
                    <div class="input-group m-b-10" style="width:100%;">	
                        <div class="g-recaptcha" data-sitekey="6Le1qmYUAAAAALxOwhF7v572oSnTG3nFSSQzLkuw"></div>
                        <!-- <button class="g-recaptcha" data-sitekey="6Le1qmYUAAAAALxOwhF7v572oSnTG3nFSSQzLkuw" data-callback="YourOnSubmitFn"> Submit </button> -->
                    </div>
                    <div class="form-group">
                        <button type="button" id="registration_btn" class="btn sign-up">Sign Up</button>
                    </div>
                    <!-- <div class="form-group">
                            <p class="divider-text">
                                    <span class="bg-light">OR</span>
                            </p>
                            <p>
                                    <a href="#" class="btn btn-block btn-facebook"> <i class="fa fa-facebook fb"></i> Login with facebook</a>	
                            </p>
                    </div> -->
                </form>
            </div>
            <div class="modal-footer text-center">
                <p class="pull-left">Already have an account?</p>
                <a href="javascript:void(0)" class="btn pop-signin pull-right" id="login_mdl_btn">Log in</a>
            </div>
        </div>
    </div>
</div>
<!-- SignUp Popup End -->
<!-- ====== FOOTER ====== -->
<footer id="footer" class="position-md-absolute">
    <div class="container">
        <div class="row footer-body">
            <!-- Footer Brand Column -->
            <div class="col-md-4 col-sm-6 footer-column">
                <a href="<?php echo base_url() ?>" class="footer-brand">
                    <img src="<?php echo base_url() ?>assets/images/footer-logo-default.png" alt="emc2 Property" />
                </a>
                <!-- <p>Lorem ipsum dolor sit amet, ds adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore agna aliquam erat. Lorem ipsum dolor sit amet, ds adipiscing elit, sed diam.</p> -->
            </div>
            <!-- Usefull Link Column -->
            <div class="col-md-2 col-sm-6 footer-column">
                <h3 class="footer-title">Useful links</h3>
                <ul class="footer-menu">
                    <li><a href="<?php echo base_url(); ?>about_us">About Us</a></li>
                    <li><a href="<?php echo base_url(); ?>contact_us">Contact Us</a></li>
					<!-- <li><a href="<?php echo base_url(); ?>policies">Policies</a></li> -->
                    <li><a href="<?php echo base_url(); ?>help">Help</a></li>
                </ul>
            </div>
            <!-- Information Column -->	
            <div class="col-md-2 col-sm-6 footer-column">
                <h3 class="footer-title">Information</h3>
                <ul class="footer-menu">
                    <li><a href="<?php echo base_url(); ?>terms_conditions">Term & conditions</a></li>
                    <li><a href="<?php echo base_url(); ?>privacy_policy">Privacy policy</a></li>
                </ul>
            </div>
            <!-- Contact Us Column -->
            <div class="col-md-4 col-sm-6 footer-column footer-icon">
                <h3 class="footer-title">Contact Us</h3>
<!--                <div class="row">
                    <div class="col-md-1 col-sm-1 col-xs-12">
                        <i class="fa fa-map-marker fa-2x"></i>
                    </div>	
                    <div class="col-md-11 col-sm-11 col-xs-12">
                        <p class="item-text"> 774 Walker County Rd #241, Mountain View, WY, 82939</p> 
                    </div>
                </div>	
                <div class="row">
                    <div class="col-md-1 col-sm-1 col-xs-12">
                        <i class="fa fa-phone fa-2x"></i>
                    </div>	
                    <div class="col-md-11 col-sm-11 col-xs-12">
                        <p class="item-text"> (307) 786-2619</p> 
                    </div>
                </div>-->
                <div class="row">
                    <div class="col-md-1 col-sm-1 col-xs-12">
                        <i class="fa fa-envelope fa-2x"></i>
                    </div>	
                    <div class="col-md-11 col-sm-11 col-xs-12">
                        <p class="item-text"><a href="mailto:info@emc2property.co.uk">info@emc2property.co.uk</a></p> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 social-icon">
                        <ul class="social-network social-circle">
                            <li style="margin-left: 0px;"><a target="_blank" href="https://www.facebook.com/EMC2-Property-998409077035203/" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                            <li><a target="_blank" href="https://twitter.com/Emc2Property" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                            <li><a target="_blank" href="https://www.instagram.com/emc2_property/" class="icoInstagram" title="Instagram"><i class="fa fa-instagram"></i></a></li>
                          <!--   <li><a href="#" class="icoGoogle" title="Google +"><i class="fa fa-google-plus"></i></a></li> -->
                            <!-- <li><a href="#" class="icoInsta" title="Linkedin"><i class="fa fa-linkedin"></i></a></li> -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright -->
    <div class="copyright">
        <div class="container clearfix">
            <p> &copy; Copyright <?php echo date('Y'); ?> - All Rights Reserved By <a target="_blank" href="<?php echo base_url(); ?>">EMC2 Property</a></p>
        </div>
    </div>
    <div class="scroll-top-wrapper">
        <span class="scroll-top-inner">
            <i class="fa fa-2x fa-angle-double-up"></i>
        </span>
    </div>
</footer>
<div class="opc" ></div>
