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

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
      <style>
      .main-menu > ul > li.sub-listing span > a:after{border-top: 4px solid #000 !important;}
      header.header_in {padding: 10px 30px !important;}
      </style>
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
				<div class="col-lg-10 col-12" style="position:static">
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
		<!-- search_mobile -->
		<div class="layer"></div>
		<div id="search_mobile">
			<a href="#" class="side_panel"><i class="icon_close"></i></a>
			<div class="custom-search-input-2">
      <form action="<?php echo base_url('teachers'); ?>" method="post">

				<div class="form-group">
			  <input class="form-control" name="keyword_name" placeholder="Enter Search Terms ..." type="text"/>
					<i class="icon_search"></i>
				</div>
				<div class="form-group">
          <select class="wide" name="city_id" >
              <option class="options" value="">all locations</option>
              <?php
              foreach ($cities_info as $v_city_info) {
                  echo "<option class='options' value='". $v_city_info['city_name'] ."'>" . $v_city_info['city_name'] . "</option>";
              }
              ?>
          </select>
					<i class="icon_pin_alt"></i>
				</div>
        <select class="wide" name="category_id">
          <option class="options" value="">all categories</option>
          <?php
          foreach ($categories_info as $v_category_info) {
              echo "<option class='options' value='" . $v_category_info['category_id'] . "'>" . $v_category_info['category_name'] . "</option>";
          }
          ?>
        </select>
				<input type="submit" value="Search">
      </form>
			</div>
		</div>
		<!-- /search_mobile -->
	</header>
	<!-- /header -->

	<main>
		<div id="results">
		   <div class="container">
			   <div class="row">
				   <div class="col-lg-2 col-md-4 col-10">
					   <h4><strong><?php if(isset($results)){echo $results.' results found !!!';}else{ } if(isset($category_info['category_name'])) {echo $category_info['category_name']; }?></strong> </h4>
				   </div>
				   <div class="col-lg-10 col-md-8 col-2">
					   <a href="#0" class="side_panel btn_search_mobile"></a> <!-- /open search panel -->
             <form action="<?php echo base_url('teachers'); ?>" method="post">
						<div class="row no-gutters custom-search-input-2 inner">

							<div class="col-lg-3">
								<div class="form-group">
								  <input class="form-control" name="keyword_name" value="<?php echo $keyword; ?>" placeholder="Enter Subjects ..." type="text"/>
									<i class="icon_search"></i>
								</div>
							</div>
							<div class="col-lg-2">
								<div class="form-group">
                  <select class="wide" name="city_id" >
                      <option class="options" value="">All Cities </option>
                      <?php
                      foreach ($cities_info as $v_city_info) { ?>
                          <option class="options" value="<?php echo $v_city_info['city_name'];?>" <?php if($v_city_info['city_name'] == $city) { echo "selected"; } ?> ><?php echo $v_city_info['city_name']; ?></option>
                     <?php }
                      ?> 
                  </select>
									<i class="icon_pin_alt"></i>
								</div>
							</div>
							<div class="col-lg-3">
                                <select class="wide categorychange" name="category_id">
                                <option class="options" value="">all categories  </option>
                                <?php
                                foreach ($categories_info as $v_category_info) { ?>
                                <option class="options" value="<?php echo $v_category_info['category_id'];?>" <?php if($v_category_info['category_id'] == $category) { echo "selected"; } ?> ><?php echo $v_category_info['category_name']; ?></option>
                                <?php }
                                ?>
                                </select>
							</div>
							<div class="col-lg-3 subcategory">
                                <select class="wide" id="subcat11" name="sub_category">
                                <option class="options" value="">Sub Categories  </option>
                                <?php
                                foreach ($child_categories as $category) { ?>
                                <option class="options" value="<?php echo $category['category_id'];?>" <?php if($category['category_id'] == $sub_category) { echo "selected"; } ?> ><?php echo $category['category_name']; ?></option>
                                <?php }
                                ?>
                                </select>
								
							</div>
							<div class="col-lg-1">
								<input type="submit" value="Search">
							</div>
						</div>
          </form>
				   </div>
			   </div>
			   <!-- /row -->
		   </div>
		   <!-- /container -->
	   </div>
	   <!-- /results -->


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
						    
							<li><a href="<?php echo base_url(); ?>">Home</a></li>
							<?php 
					        foreach ($static_pages as $static_page) 
                            {  
                                echo "<li><a href=" . "pages/".$static_page['page_name'] . ">" . $static_page['page_title'] . "</a>";
                            }
                            ?> 
							<li><a href="<?php echo base_url(); ?>/user/dashboard.html">My account</a></li>
							<li><a href="<?php echo base_url(); ?>/user/registration/index/4.html">Create account</a></li>
							<li><a href="<?php echo base_url('contact.html'); ?>">Contacts</a></li>
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
							<?php 
					        foreach ($categories_info as $category) 
                            {  
                                ?>
                                 <li><a href=" <?php echo base_url(); ?>search/<?php echo $category['cat_slug']; ?>" > <?php echo $category['category_name'];?> </a></li>
                            <?php
                            }
                            ?>  
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
							<li><i class="ti-home"></i>Sector-63, <br>Noida, Uttar pradesh</li>
    							<li><i class="ti-headphone-alt"></i>+91 9690419041</li>
    							<li><i class="ti-email"></i><a href="#0">Info@studybrate.com</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6">
					<a data-toggle="collapse" data-target="#collapse_ft_4" aria-expanded="false" aria-controls="collapse_ft_4" class="collapse_bt_mobile">
						<div class="circle-plus closed">
							<div class="horizontal"></div>
							<div class="vertical"></div>
						</div> 
					</a>
					<div class="collapse show" id="collapse_ft_4">
						 
						<div class="follow_us">
							<h5>Follow Us</h5>
							<ul>
    								<li><a href="https://www.facebook.com/Studybrate/?modal=admin_todo_tour" target="blank"><i class="ti-facebook"></i></a></li>
    								<li><a href="https://twitter.com/studybrate" target="blank"><i class="ti-twitter-alt"></i></a></li> 
    								<li><a href="https://www.instagram.com/studybrate/" target="blank"><i class="ti-pinterest" ></i></a></li>
    								<li><a href="https://in.pinterest.com/0csiu2u1n5vfmzgb3henglfckcm9p2/" target="blank"><i class="ti-instagram"></i></a></li>
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
	 
    <script>

            $(".categorychange").change(function(event){   
            var catId =  $(this).val();  
            var href = "<?php echo base_url(); ?>ajax-get-adminchildcategory/"+catId;
            var btn = this;
            $.ajax({
            type: "POST",
            url: href,
            success: function(response) {    
                var dataObj = jQuery.parseJSON(response);  
                if(dataObj != '')
                { 
                    $(dataObj).each(function(){   
                        $('#subcattoshow1').append('<option value="'+ this.category_id +'">'+ this.category_name +'</option>');
                        $('#subcattoshow').append('<li data-value="'+ this.category_id +'" class="option">'+ this.category_name +'</li>');
                    }); 
                    $('.subcategory .list').html($('#subcattoshow').html());
                    $('#subcat11').html($('#subcattoshow1').html());
                    $('#subcattoshow').html('');
                }
                else
                {
                    $('#subcat').val(catId);
                }  
            }
            }); 
        });
        $(document).ready(function(){
            
            
            $(".hidewidget").click(function(){ 
                $(".mainMenu-searchHeaderOverlay").removeClass("active");
                $(".mainMenu-headerRightStickyNav").removeClass("active");
            });
            
           
            $(".mainMenu-hamburger-hoverIcon").click(function(){
                $(".mainMenuhamburgerMenuIcon").toggleClass("active");
                $(".mainMenu-headerRightStickyNav").toggleClass("active");
                $(".mainMenu-searchHeaderOverlay").toggleClass("active");
            });
        }); 
    </script>
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
<span id="subcattoshow"></span>
<span id="subcattoshow1"></span>
