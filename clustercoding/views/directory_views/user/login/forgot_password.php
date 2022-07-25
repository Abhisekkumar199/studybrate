<div class="container margin_60">
  <div class="row justify-content-center">
  <div class="col-xl-6 col-lg-6 col-md-8">
    <div class="box_account">
      <h3 class="client">Forgot Password? </h3>
      <div class="form_container">
        <form action="<?php echo base_url('user/login/reset_request.html'); ?>" method="post">
            <div class="form-group">
                <i class="fa fa-user blue-1"></i>
                <input class="form-control" type="text" name="email_address" placeholder="Your E-mail ...">
            </div>

            <div class="form-group">
                <input class="btn_1 full-width" type="submit" value="Reset">
            </div>
        </form>
        <p>A Reset instruction will be sent on above mentioned E-Mail.</p>
        <p><a class="btn_1 full-width" href="<?php echo base_url('user/login.html'); ?>">Login</a></p>
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
