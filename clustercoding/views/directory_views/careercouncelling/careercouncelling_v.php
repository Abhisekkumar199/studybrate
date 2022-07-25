<div class="sub_header_in">
  <div class="container">
    <h1>Career Counselling </h1>
  </div>
  <!-- /container -->
</div>
<!-- /sub_header -->

<main>
   
  <div class="container margin_60_35">
    <div class="row justify-content-center">

      <div class="col-xl-8 col-lg-12 pr-xl-12">
        <div class="main_title_3">
          <span></span>
          <h2>Career Counselling Form</h2> 
        </div>
        <?php
            $success = $this->session->userdata('success');
            $exception = $this->session->userdata('exception');
            if (!empty($success)) {
                echo "<div class='add-listing-nav shadow-1 margin-top-20'>
                        <div class='row clearfix'>
                            <div class='col-md-12 col-sm-12 col-xs-12'>
                                <div class='notification'>
                                <span class='success-message'>" . $success . "</span>
                                </div>
                            </div>
                        </div>
                    </div>";
                $this->session->unset_userdata('success');
            } else if (!empty($exception)) {
                echo "<div class='add-listing-nav shadow-1 margin-top-20'>
                        <div class='row clearfix'>
                            <div class='col-md-12 col-sm-12 col-xs-12'>
                                <div class='notification'>
                                <span class='error-message'>" . $exception . "</span>
                                </div>
                            </div>
                        </div>
                    </div>";
                $this->session->unset_userdata('exception');
            }
            ?>
        <div id="message-contact"></div>
        <form method="post" action="<?php echo base_url('career_councelling/add_student_query.html'); ?>" id="careerform" autocomplete="off">
          <div class="form-group">
            <label>Student Name</label>
            <input class="form-control" type="text" id="student_name" name="student_name" required >
          </div>
           
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Email</label>
                <input class="form-control" type="email" id="email" name="email"  >
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Contact No.</label>
                <input class="form-control" type="number" id="contact" name="contact" maxlength="10" required  >
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Class</label>
                <input class="form-control" type="text" id="class" name="class" required  >
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Subject</label>
                <input class="form-control" type="text" id="subject" name="subject" required >
              </div>
            </div>
          </div>
          <div class="form-group">
            <label>Location</label>
            <input class="form-control" type="text" id="location" name="location" required >
          </div> 
          <div class="form-group">
            <label>Comfortable time to call</label>
            <input class="form-control" type="text" id="time_to_call" name="time_to_call">
          </div>  
          <div class="form-group">
            <label>Why you need career counselling session?</label>
            <textarea class="form-control" id="student_details" name="student_details" style="height:120px;"  ></textarea>
          </div>  
            <button type="submit" id="submit-form" class="btn btn-success btn-custom"><i class="fa fa-plus"></i> Submit</button>
        </form>
      </div> 
    </div>
  </div>
  <!-- /container -->
</main>
<!--/main-->
<script type="text/javascript">
    var form = document.getElementById("careerform");

document.getElementById("submit-form").addEventListener("click", function () {
  var student_name =  $("#student_name").val();
  var email =  $("#email").val();
  var contact =  $("#contact").val();
  var class1 =  $("#class").val();
  var subject =  $("#subject").val();
  var location =  $("#location").val();
  if(student_name == '')
  {
      return false;
  }
  if(email == '')
  {
      return false;
  }
  if(subject == '')
  {
      return false;
  }
  form.submit();
});
</script>
