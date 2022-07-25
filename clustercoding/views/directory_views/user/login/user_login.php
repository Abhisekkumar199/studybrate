<div class="container margin_60">
  <div class="row justify-content-center">
  <div class="col-xl-6 col-lg-6 col-md-8">
    <div class="box_account">
      <h3 class="client">Already Registered? </h3>
      <div class="form_container">
        <form action="<?php echo base_url('user/login/check_user_login.html'); ?>" method="post">
            <div class="form-group">
                <i class="fa fa-user blue-1"></i>
                <input class="form-control" type="text" name="username_or_email_address" placeholder="username ">
            </div>
            <div class="form-group">
                <i class="fa fa-lock blue-1"></i>
                <input class="form-control" type="password" name="password" placeholder="password">
            </div>
            <div class="form-group">
                <input type="checkbox" id="checkbox-1-1" class="regular-checkbox"><label for="checkbox-1-1"></label>
                <label class="checkbox-lable"> Remember me</label>
                <div class="float-right"><a href="<?php echo base_url('user/login/forgot_password.html'); ?>">forgot password?</a></div>
            </div>
            <div class="form-group">
                <input class="btn_1 full-width" type="submit" value="login">
            </div>
        </form>
        <a href="registration/index/4.html">Signup as Tutor/Institute ...</a>
      </div>
      <!-- /form_container -->
    </div>
    <!-- /box_account -->
    <div class="row hidden_tablet">
      <div class="col-md-6">
        <ul class="list_ok">
          <li>Find Institutes</li>
          <li>Insitute Quality check</li>
          <li>Data Protection</li>
        </ul>
      </div>
      <div class="col-md-6">
        <ul class="list_ok">
          <li>Secure Payments</li>
          <li>H24 Support</li>
        </ul>
      </div>
    </div>
    <!-- /row -->
  </div>

</div>
<!-- /row -->
</div>
