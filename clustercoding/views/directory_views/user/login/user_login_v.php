<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!--================================LOGIN SECTION==========================================-->
<section class="aside-layout-section padding-top-100 padding-bottom-100">
    <div class="container"><!-- section container -->
        <div class="row"><!-- row -->
            <div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12">

                <div class="page-title-wrap bgblue-1 padding-top-30 padding-bottom-30"><!-- section title -->
                    <h4 class="white">Login</h4>
                </div><!-- section title end -->

                <hr>
                <div class="notification">
                    <?php
                    $success = $this->session->userdata('success');
                    $exception = $this->session->userdata('exception');
                    if (!empty($success)) {
                        echo "<span class='success-message'>" . $success . "</span>";
                        $this->session->unset_userdata('success');
                    } else if (!empty($exception)) {
                        echo "<span class='error-message'>" . $exception . "</span>";
                        $this->session->unset_userdata('exception');
                    } else {
                        echo "<span class='notification-message'>Login with your username or email and password.</span>";
                    }
                    ?>
                </div>
                <hr>

                <div class="listing-login-form">
                    <form action="<?php echo base_url('user/login/check_user_login.html'); ?>" method="post">
                        <div class="listing-form-field">
                            <i class="fa fa-user blue-1"></i>
                            <input class="form-field bgwhite" type="text" name="username_or_email_address" placeholder="username ">
                        </div>
                        <div class="listing-form-field">
                            <i class="fa fa-lock blue-1"></i>
                            <input class="form-field bgwhite" type="password" name="password" placeholder="password">
                        </div>
                        <div class="listing-form-field clearfix margin-top-20 margin-bottom-20">
                            <input type="checkbox" id="checkbox-1-1" class="regular-checkbox"><label for="checkbox-1-1"></label> 
                            <label class="checkbox-lable"> Remember me</label>
                            <a href="<?php echo base_url('user/login/forgot_password.html'); ?>">forgot password?</a>
                        </div>
                        <div class="listing-form-field">
                            <input class="form-field submit bgblue-1" type="submit" value="login">
                        </div>
                    </form>
                    <div class="bottom-links">
                        <p>not a member?<a href="<?php echo base_url('user/packages.html'); ?>">create account</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- section container end -->
</section>