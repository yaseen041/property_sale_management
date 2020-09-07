<!DOCTYPE html>
<html lang="en">
    <?php $this->load->view('common/head'); ?>
    <body class="header-1 page-header-1">
        <?php $this->load->view('common/header'); ?>
        <!-- Become Space Provider -->
        <section class="become-space section-bg">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-10 col-xs-12 col-md-offset-3 col-sm-offset-1">
                        <h2>Please provide some contact details to be shown in your listing.</h2>
                        <p class="dark-sky">STEP 3</p>
                        <h3></h3>
                        <h4 class="gray">Contact details</h4>
                        <form id="step3_form" action="javascript:void(0)" method="POST">
                            <input type="hidden" name="form_id" value="step3">                            
                            <div class="row">
                                <div class="col-md-12 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Contact person</label>
                                        <input type="text" class="form-control" name="contact_person" placeholder="John" value="<?php echo $user_detail['first_name'].' '.$user_detail['last_name']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Phone number</label>
                                        <input type="text" class="form-control" name="contact_phone" placeholder="+44 7911 123456" value="<?php echo $user_detail['phone']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="contact_email" placeholder="example@gmail.com" value="<?php echo $user_detail['email']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <hr>
                                    <div class="form-group pull-left">
                                        <a href="<?php echo base_url() ?>listing/step2" class="btn back-btn">Go Back</a>
                                    </div>
                                    <div class="form-group pull-right">
                                        <a id="submit_list_details" href="javascript:void(0)" class="btn next-btn">Next Step</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>		
        </section>
        <!-- Become Space Provider End-->
        <?php $this->load->view('common/scripts'); ?>
        <?php $this->load->view('common/footer'); ?>
        <script type="text/javascript">
            $('body').on('click', '#submit_list_details', function (event) {
                var btn = $(this);
                $(btn).button('loading');
                var value = $("#step3_form").serialize();
                $.ajax({
                    url: '<?php echo base_url(); ?>listing/submit_data',
                    type: 'post',
                    data: value,
                    dataType: 'json',
                    success: function (status) {
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
                            setTimeout(function () {
                                console.log(status.new_url);
                                window.location.replace(status.new_url);
                                //window.location.href = status.new_url;
                            }, 3000);
                        } else if (status.msg == 'not_login') {
                            $.gritter.add({
                                title: 'Error!',
                                sticky: false,
                                time: '15000',
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
                            $('#loginModal').modal('show');
                        } else if (status.msg == 'error') {
                            $.gritter.add({
                                title: 'Error!',
                                sticky: false,
                                time: '15000',
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
    </body>
</html>