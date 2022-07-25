<style media="screen">
  .error-message{
    color: red;
  }
</style>
<div class="container margin_60">
  <div class="row justify-content-center">
    <?php $user_data = $this->session->userdata('userdata');

            //Returns User's name
            echo $user_data['exception']; ?>
<div class="col-xl-6 col-lg-6 col-md-8">
  <div class="box_account">
    <h3 class="new_client">New Signup for Teacher/Institute</h3> <small class="float-right pt-2">* Required Fields</small>
    <div class="form_container">
      <form class="custom-form" action="<?php echo base_url('user/registration/create_account.html'); ?>" method="post">
          <hr>
          <h6 class="green-4">Contact Information</h6>
          <hr>
          <div class="form-group">
              <label for="first_name">First Name <span class="required-field">*</span></label>
              <input type="hidden" name="package_id" value="<?php echo $package_info['package_id']; ?>">
              <input type="text" name="first_name" value="<?php echo set_value('first_name'); ?>" class="form-control margin-top-5" id="first_name" placeholder="Enter first name">
              <span class="error-message"><?php echo form_error('first_name'); ?></span>
          </div>
          <div class="form-group">
              <label for="last_name">Last Name <span class="required-field">*</span></label>
              <input type="text" name="last_name" value="<?php echo set_value('last_name'); ?>" class="form-control margin-top-5" id="last_name" placeholder="Enter last name">
              <span class="error-message"><?php echo form_error('last_name'); ?></span>
          </div>
          <div class="form-group">
              <label for="email_address">Email Address <span class="required-field">*</span></label>
              <input type="text" name="email_address" value="<?php echo set_value('email_address'); ?>" class="form-control margin-top-5" id="email_address" placeholder="Enter email address">
              <span class="error-message"><?php echo form_error('email_address'); ?></span>
          </div>
          <div class="form-group">
              <label for="mobile_number">Mobile Number <span class="required-field">*</span></label> 
              <input type="text" name="mobile_number" value="<?php echo set_value('mobile_number'); ?>" class="form-control margin-top-5 mobile_number" id="mobile_number" placeholder="Enter mobile number">
              <span class="error-message"><?php echo form_error('mobile_number'); ?></span> 
          </div> 
          <div class="form-group otpshow" style="display:none;">
              <label for="otp">OTP <span class="required-field">*</span></label> 
              <input type="text" name="otp" value="<?php echo set_value('otp'); ?>" class="form-control margin-top-5 otp" id="otp" placeholder="Enter otp">
              <span class="error-message"><?php echo form_error('otp'); ?></span> 
          </div>
          <hr>
          <h6 class="green-4">Account Information</h6>
          <hr>
          <div class="form-group">
              <label for="username">Username <span class="required-field">*</span></label>
              <input type="text" name="username" value="<?php echo set_value('username'); ?>" class="form-control margin-top-5" id="username" placeholder="Enter username">
              <span class="error-message"><?php echo form_error('username'); ?></span>
          </div>
          <div class="form-group">
              <label for="password">Password <span class="required-field">*</span></label>
              <input type="password" name="password" value="<?php echo set_value('password'); ?>" class="form-control margin-top-5" id="password" placeholder="Enter password">
              <span class="error-message"><?php echo form_error('password'); ?></span>
          </div>
          <div class="form-group">
              <label for="confirm_password">Confirm Password <span class="required-field">*</span></label>
              <input type="password" name="confirm_password" value="<?php echo set_value('confirm_password'); ?>" class="form-control margin-top-5" id="confirm_password" placeholder="Enter confirm password">
              <span class="error-message"><?php echo form_error('confirm_password'); ?></span>
          </div> 
           
          <button type="submit" class="btn_1 full-width">Create Account</button>
      </form>
    </div>
    <!-- /form_container -->

  </div>
  <!-- /box_account -->

</div>
<div class="container margin_80_55">
  <div class="main_title_2">
    <span><em></em></span>
    <h2>Why Choose Studybrate</h2>
    <p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p>
  </div>
  <div class="row">
    <div class="col-lg-4 col-md-6">
      <a class="box_feat" href="#0">
        <i class="pe-7s-medal"></i>
        <h3>+ 100000 Students</h3>
        <p>Id mea congue dictas, nec et summo mazim impedit. Vim te audiam impetus interpretaris, cum no alii option, cu sit mazim libris.</p>
      </a>
    </div>
    <div class="col-lg-4 col-md-6">
      <a class="box_feat" href="#0">
        <i class="pe-7s-help2"></i>
        <h3>H24 Support</h3>
        <p>Id mea congue dictas, nec et summo mazim impedit. Vim te audiam impetus interpretaris, cum no alii option, cu sit mazim libris. </p>
      </a>
    </div>
    <div class="col-lg-4 col-md-6">
      <a class="box_feat" href="#0">
        <i class="pe-7s-culture"></i>
        <h3>+ 557 Cities</h3>
        <p>Id mea congue dictas, nec et summo mazim impedit. Vim te audiam impetus interpretaris, cum no alii option, cu sit mazim libris.</p>
      </a>
    </div>
    <div class="col-lg-4 col-md-6">
      <a class="box_feat" href="#0">
        <i class="pe-7s-headphones"></i>
        <h3>Help Direct Line</h3>
        <p>Id mea congue dictas, nec et summo mazim impedit. Vim te audiam impetus interpretaris, cum no alii option, cu sit mazim libris. </p>
      </a>
    </div>
    <div class="col-lg-4 col-md-6">
      <a class="box_feat" href="#0">
        <i class="pe-7s-credit"></i>
        <h3>Secure Payments</h3>
        <p>Id mea congue dictas, nec et summo mazim impedit. Vim te audiam impetus interpretaris, cum no alii option, cu sit mazim libris.</p>
      </a>
    </div>
    <div class="col-lg-4 col-md-6">
      <a class="box_feat" href="#0">
        <i class="pe-7s-chat"></i>
        <h3>Support via Chat</h3>
        <p>Id mea congue dictas, nec et summo mazim impedit. Vim te audiam impetus interpretaris, cum no alii option, cu sit mazim libris. </p>
      </a>
    </div>
  </div>
  <!--/row-->
</div>
<!-- /container -->

<div class="bg_color_1">
  <div class="container margin_80_55">
    <div class="main_title_2">
      <span><em></em></span>
      <h2>Our Origins and Story</h2>
      <p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p>
    </div>
    <div class="row justify-content-between">
      <div class="col-lg-6 wow" data-wow-offset="150">
        <figure class="block-reveal">
          <div class="block-horizzontal"></div>
          <img src="<?php echo base_url();?>img/study-skills-assessments.jpg" class="img-fluid" alt="">
        </figure>
      </div>
      <div class="col-lg-5">
        <p>Lorem ipsum dolor sit amet, homero erroribus in cum. Cu eos <strong>scaevola probatus</strong>. Nam atqui intellegat ei, sed ex graece essent delectus. Autem consul eum ea. Duo cu fabulas nonumes contentiones, nihil voluptaria pro id. Has graeci deterruisset ad, est no primis detracto pertinax, at cum malis vitae facilisis.</p>
        <p>Dicam diceret ut ius, no epicuri dissentiet philosophia vix. Id usu zril tacimates neglegentur. Eam id legimus torquatos cotidieque, usu decore <strong>percipitur definitiones</strong> ex, nihil utinam recusabo mel no. Dolores reprehendunt no sit, quo cu viris theophrastus. Sit unum efficiendi cu.</p>
        <p><em>CEO Marc Schumaker</em></p>
      </div>
    </div>
    <!--/row-->
  </div>
  <!--/container-->
</div></div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript"> 
    $(document).ready(function(){  
        $(".mobile_number").keyup(function(event){    
            var mobile_number =  $(this).val();   
            var href = "<?php echo base_url(); ?>send-mobile-otp/"+mobile_number;
            var btn = this;
            $.ajax({
            type: "POST",
            url: href,
            success: function(response) {   
              $('#otp').val(response);
              $('.otpshow').show();
                if(response == true)
                {
                    $('#otp').show();  
                }
                else
                {
                     
                }  
            }
            }); 
      }); 
    });
</script>
