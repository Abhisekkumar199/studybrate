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
    <title>Studybrate - Search & Learn with Expert Tutor | Trainer | Institute </title>
    <!-- Favicons-->
    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet"> 
    <!-- BASE CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/color-red.css" rel="stylesheet"> 
    <link href="css/vendors.css" rel="stylesheet">
    <link href="css/blog.css" rel="stylesheet"> 
    <!-- YOUR CUSTOM CSS -->
    <link href="css/custom.css" rel="stylesheet"> 
     
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>

<body onload="initialize()"> 
	<div id="page"> 
    	<header class="header  menu_fixed">
    		<div id="logo">
    			<a href="<?php echo base_url();?>" title="Sparker - Directory and listings template">
    				<img src="img/logo.png" width="195"  alt="" class="logo_normal">
    				<img src="img/logo.png" width="195"  alt="" class="logo_sticky">
    			</a>
    		</div> 
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
        		<ul id="top_menu">
          			<li><a href="<?php echo base_url('user/login.html');?>" class="btn_add">Login/Register</a></li>
          		</ul>
                <span class="mainMenu-hamburgerContainer mainMenu-hamburger-hoverIcon"> <span class="mainMenuhamburgerMenuIcon"></span> </span>
                <img src="img/header_search_white.png" width="24px" height="24px" class="mainMenu-search-header">
                <img src="img/header_search.png" width="24px" height="24px" class="mainMenu-search-header sticky-search-header" style="display:none">  
    		</nav>
    	</header>
    	
    	<!-- /header -->
        <?php echo $main_content; ?>
    
    
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
    						<li><span>© 2019 studybrate Pvt. Ltd.</span></li>
    					</ul>
    				</div>
    			</div>
    		</div>
    	</footer>
    	<!--/footer-->
	</div>
	<!-- page -->
    
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>This is a small modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
    </div> 
    
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
					Don’t have an account? <a href="account.html">Sign up</a>
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
	<div class="mainMenu-searchHeaderOverlay" style="display: none;"> </div>
    <div class=" mainMenu-headerRightStickyNav">
        <div class="mainMenu-menuNavigationLinks">
            <p class="mainMenu-locationInMenu">Location <span class=" "><a href="javascript:void(0)" data-toggle="modal" data-target="#myModal">Set your Location</a></span></p>
            <a href="<?php echo base_url(); ?>career_counselling" >Career Counselling</a>
            <a href="<?php echo base_url(); ?>notes">Class Notes</a>
            <a class="hidewidget" href="https://studybrate.com/#online_doubts" >Online Doubts Clearing</a>
            <a href="<?php echo base_url(); ?>articles" >Articles</a>
            <a href="<?php echo base_url(); ?>blogs" >Blogs</a>
            <a href="#" >Contact us</a> 
        </div>
        <div class="mainMenu-menuFooter"> 
            <a href="#" class="mainMenu-postNeedNavButton">Sign up as Student</a>
            <a href="<?php echo base_url(); ?>user/registration/index/4.html" class="mainMenu-postNeedNavButton">Sign up as Tutor</a>
            <a href="#" class="mainMenu-postNeedNavButton">Sign up as Institute/Collage</a>
        </div> 
    </div>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDUnQ9ZEP2to48Qe-RouL4IgTeXAFXCdco&libraries=places,geocoder&callback=initAutocomplete"
      async defer></script>
    <script type="text/javascript">
        var geocoder;

        if (navigator.geolocation) 
        {
            navigator.geolocation.watchPosition(successFunction, errorFunction);
        }
        
        //Get the latitude and the longitude;
        function successFunction(position) 
        {
            var lat = position.coords.latitude;
            var lng = position.coords.longitude;
            codeLatLng(lat, lng)
        }
        
        function errorFunction()
        {
            // alert("Geocoder failed");
        }
        
        function initialize() 
        {
            geocoder = new google.maps.Geocoder(); 
        }

        function codeLatLng(lat, lng) 
        { 
            var latlng = new google.maps.LatLng(lat, lng);
            geocoder.geocode({'latLng': latlng}, function(results, status) 
            {
                if (status == google.maps.GeocoderStatus.OK) 
                {
                    console.log(results)
                    if (results[1]) 
                    {
                        //formatted address
                        //alert(results[0].formatted_address)
                        //find country name
                        for (var i=0; i<results[0].address_components.length; i++) 
                        {
                            for (var b=0;b<results[0].address_components[i].types.length;b++) 
                            {
                            
                                //there are different types that might hold a city admin_area_lvl_1 usually does in come cases looking for sublocality type will be more appropriate
                                if (results[0].address_components[i].types[b] == "sublocality_level_2") 
                                {
                                    //this is the object you are looking for
                                    city= results[0].address_components[i];
                                    break;
                                }
                            }
                        }
                        //city data
                        //alert( city.long_name)
                        document.getElementById("city").value = city.long_name;
                        document.getElementById("h_city").innerHTML =' in ' + city.long_name; 
                    } 
                    else 
                    {
                        // alert("No results found");
                    }
                } 
                else 
                {
                    // alert("Geocoder failed due to: " + status);
                } 
            });
        }

    </script>
	<!-- COMMON SCRIPTS -->
    <script src="<?php echo base_url();?>js/common_scripts.js"></script>
	<script src="<?php echo base_url();?>js/functions.js"></script>
	<script src="<?php echo base_url();?>assets/validate.js"></script>
	<script>
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

</body>
</html>
