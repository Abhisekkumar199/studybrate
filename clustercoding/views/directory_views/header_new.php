<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$cities_info = cities_info();
$categories_info = categories_info();
?>
<!DOCTYPE html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
     
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="studybrate - Find Competetive exams Institute , Teachers , Study material and more ....">
    <meta name="author" content="Ansonika">
    <title>studybrate - Find Competetive exams Institute , Teachers , Study material and more ...</title>
    <!-- Favicons-->
    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

    <!-- BASE CSS -->
    <link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>css/style.css" rel="stylesheet">
    <link href="<?php echo base_url();?>css/color-red.css" rel="stylesheet">

	   <link href="<?php echo base_url();?>css/vendors.css" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="<?php echo base_url();?>css/custom.css" rel="stylesheet">
    <link href="<?php echo base_url();?>css/blog.css" rel="stylesheet">

</head>

<body>

	<div id="page" class="theia-exception">

	<header class="header_in">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-2 col-12">
					<div id="logo">
						<a href="<?php echo base_url();?>">
								<img src="<?php echo base_url();?>img/logo.png" width="195"  alt="" class="logo_sticky">
						</a>
					</div>
				</div>
				<div class="col-lg-10 col-12">
          <ul id="top_menu">
      			<li><a href="<?php echo base_url('user/login.html');?>" class="btn_add">Login/Register</a></li>
      		</ul>
      		<!-- /top_menu -->
      		<a href="#menu" class="btn_mobile">
      			<div class="hamburger hamburger--spin" id="hamburger">
      				<div class="hamburger-box">
      					<div class="hamburger-inner"></div>
      				</div>
      			</div>
      		</a>
          <nav id="menu" class="main-menu">
      			<ul> 
      				 <?php echo $header_menu; ?> 
  				</ul>
      		</nav>
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	 
	</header>
	<!-- /header -->

	<main>
	 


		<div class="collapse" id="collapseMap">
			<div id="map" class="map"></div>
		</div>
		<!-- /Map -->

  <?php echo $main_content; ?>

	</main>
	<!--/main-->

  <footer>
		<div class="container margin_60_35">
			<div class="row">
				<div class="col-lg-3 col-md-6 col-sm-6">
					<a data-toggle="collapse" data-target="#collapse_ft_1" aria-expanded="false" aria-controls="collapse_ft_1" class="collapse_bt_mobile">
						<h3>Quick Links</h3>
						<div class="circle-plus closed">
							<div class="horizontal"></div>
							<div class="vertical"></div>
						</div>
					</a>
					<div class="collapse show" id="collapse_ft_1">
						<ul class="links">
							<li><a href="#0">About us</a></li>
							<li><a href="#0">Faq</a></li>
							<li><a href="#0">Help</a></li>
							<li><a href="#0">My account</a></li>
							<li><a href="#0">Create account</a></li>
							<li><a href="#0">Contacts</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6">
					<a data-toggle="collapse" data-target="#collapse_ft_2" aria-expanded="false" aria-controls="collapse_ft_2" class="collapse_bt_mobile">
						<h3>Categories</h3>
						<div class="circle-plus closed">
							<div class="horizontal"></div>
							<div class="vertical"></div>
						</div>
					</a>
					<div class="collapse show" id="collapse_ft_2">
						<ul class="links">
							<li><a href="#0">Top Institutes in India</a></li>
							<li><a href="#0">Top CA Institutes in India</a></li>
							<li><a href="#0">Top Engineering Institutes in India</a></li>
							<li><a href="#0">Top IAS Institutes in India</a></li>
							<li><a href="#0">Top Law Institutes in India</a></li>
							<li><a href="#0">Top Medical Institutes in India</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6">
					<a data-toggle="collapse" data-target="#collapse_ft_3" aria-expanded="false" aria-controls="collapse_ft_3" class="collapse_bt_mobile">
						<h3>Contacts</h3>
						<div class="circle-plus closed">
							<div class="horizontal"></div>
							<div class="vertical"></div>
						</div>
					</a>
					<div class="collapse show" id="collapse_ft_3">
						<ul class="contacts">
							<li><i class="ti-home"></i>Sector 62<br>Noida</li>
							<li><i class="ti-headphone-alt"></i>+91 9876543210</li>
							<li><i class="ti-email"></i><a href="#0">info@studybrate.com</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6">
					<a data-toggle="collapse" data-target="#collapse_ft_4" aria-expanded="false" aria-controls="collapse_ft_4" class="collapse_bt_mobile">
						<div class="circle-plus closed">
							<div class="horizontal"></div>
							<div class="vertical"></div>
						</div>
						<h3>Shape Your Future</h3>
					</a>
					<div class="collapse show" id="collapse_ft_4">
						<div id="newsletter">
							<div id="message-newsletter"></div>
							<form method="post" action="assets/newsletter.php" name="newsletter_form" id="newsletter_form">
								<div class="form-group">
									<input type="email" name="email_newsletter" id="email_newsletter" class="form-control" placeholder="Your email">
									<input type="submit" value="Submit" id="submit-newsletter">
								</div>
							</form>
						</div>
						<div class="follow_us">
							<h5>Follow Us</h5>
							<ul>
								<li><a href="#0"><i class="ti-facebook"></i></a></li>
								<li><a href="#0"><i class="ti-twitter-alt"></i></a></li>
								<li><a href="#0"><i class="ti-google"></i></a></li>
								<li><a href="#0"><i class="ti-pinterest"></i></a></li>
								<li><a href="#0"><i class="ti-instagram"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<!-- /row-->
			<hr>
			<div class="row">
				<div class="col-lg-6">
					<ul id="footer-selector">
						<li>
							<div class="styled-select" id="lang-selector">
								<select>
									<option value="English" selected>English</option>
									<option value="French">Hindi</option>
								</select>
							</div>
						</li>

						<li><img src="img/cards_all.svg" alt=""></li>
					</ul>
				</div>
				<div class="col-lg-6">
					<ul id="additional_links">
						<li><a href="#0">Terms and conditions</a></li>
						<li><a href="#0">Privacy</a></li>
						<li><span>© 2018 studybrate Pvt. Ltd.</span></li>
					</ul>
				</div>
			</div>
		</div>
	</footer>
	<!--/footer-->
	</div>
	<!-- page -->

	<!-- Sign In Popup -->
	<div id="sign-in-dialog" class="zoom-anim-dialog mfp-hide">
		<div class="small-dialog-header">
			<h3>Sign In</h3>
		</div>
		<form>
			<div class="sign-in-wrapper">
				<a href="#0" class="social_bt facebook">Login with Facebook</a>
				<a href="#0" class="social_bt google">Login with Google</a>
				<div class="divider"><span>Or</span></div>
				<div class="form-group">
					<label>Email</label>
					<input type="email" class="form-control" name="email" id="email">
					<i class="icon_mail_alt"></i>
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" class="form-control" name="password" id="password" value="">
					<i class="icon_lock_alt"></i>
				</div>
				<div class="clearfix add_bottom_15">
					<div class="checkboxes float-left">
						<label class="container_check">Remember me
						  <input type="checkbox">
						  <span class="checkmark"></span>
						</label>
					</div>
					<div class="float-right mt-1"><a id="forgot" href="javascript:void(0);">Forgot Password?</a></div>
				</div>
				<div class="text-center"><input type="submit" value="Log In" class="btn_1 full-width"></div>
				<div class="text-center">
					Don’t have an account? <a href="register.html">Sign up</a>
				</div>
				<div id="forgot_pw">
					<div class="form-group">
						<label>Please confirm login email below</label>
						<input type="email" class="form-control" name="email_forgot" id="email_forgot">
						<i class="icon_mail_alt"></i>
					</div>
					<p>You will receive an email containing a link allowing you to reset your password to a new preferred one.</p>
					<div class="text-center"><input type="submit" value="Reset Password" class="btn_1"></div>
				</div>
			</div>
		</form>
		<!--form -->
	</div>
	<!-- /Sign In Popup -->

	<div id="toTop"></div><!-- Back to top button -->

	<!-- COMMON SCRIPTS -->
    <script src="<?php echo base_url();?>js/common_scripts.js"></script>
	<script src="<?php echo base_url();?>js/functions.js"></script>
	<script src="assets/validate.js"></script>

	<!-- Map -->
	<script src="http://maps.googleapis.com/maps/api/js"></script>
	<script src="<?php echo base_url();?>js/markerclusterer.js"></script>
	<script src="<?php echo base_url();?>js/map.js"></script>
	<script src="<?php echo base_url();?>js/infobox.js"></script>
  <script>
      $(document).ready(function () {
          $(document).on('click', '#btn_more', function () {
              // first ID
              var id = $(this).data("id");
              // second ID
              var cid = $(this).data("cid");
              //controller location
              var link = $(this).data("link");
              //created dynamic url
              var url = "<?php echo base_url(); ?>" + link;

              $('#btn_more').html("Loading...");
              $.ajax({
                  url: url,
                  method: "POST",
                  data: {
                      id: id,
                      cid: cid
                  },
                  dataType: "text",
                  success: function (data)
                  {
                      if (data !== '')
                      {
                          $('#remove_row').remove();
                          $('#load_data').append(data);
                      } else
                      {
                          $('#btn_more').html("No Data");
                      }
                  }
              });
          });
      });
  </script>

</body>
</html>
