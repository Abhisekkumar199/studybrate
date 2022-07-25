<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$settings_info = settings_info();
?>
<!DOCTYPE html>
<html>
  <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        
        <meta name="viewport" content="user-scalable = yes" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="description" content="studybrate- Find best tutors near you ...">
        <meta name="author" content="Vikas Sheoran">
        <title><?php echo $settings_info['site_name'] . " - " . $title; ?></title>

        <!--================================FAVICON================================-->

        <link rel="icon" type="image/png" sizes="32x32" href="">
        <link rel="manifest" href="<?php echo base_url(); ?>assets/frontend/images/favicon/manifest.json">
        <meta name="msapplication-TileImage" content="<?php echo base_url('assets/favicon/thumb/' . $settings_info['site_favicon']); ?>">

        <!--================================BOOTSTRAP STYLE SHEETS================================-->

        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/frontend/bootstrap/css/bootstrap.min.css">

        <!--================================ Main STYLE SHEETs====================================-->

        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/frontend/css/custom.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/frontend/css/style.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/frontend/css/menu.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/frontend/css/color/color.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/frontend/assets/testimonial/css/style.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/frontend/assets/testimonial/css/elastislide.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/frontend/css/responsive.css">

        <!--================================FONTAWESOME==========================================-->

        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/frontend/css/font-awesome.css">

        <!--================================GOOGLE FONTS=========================================-->
        <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Montserrat:400,700|Lato:300,400,700,900'>
        <!--================================SLIDER REVOLUTION =========================================-->

        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/frontend/assets/revolution_slider/css/revslider.css" media="screen" />
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/jquery-1.11.3.min.js"></script>

    </head>
    <body class="red-1">
        <div class="preloader"><span class="preloader-gif"></span></div>
        <div class="theme-wrap clearfix">
            <!--================================responsive log and menu==========================================-->
            <div class="wsmenucontent overlapblackbg"></div>
            <div class="wsmenuexpandermain slideRight">
                <a id="navToggle" class="animated-arrow slideLeft"><span></span></a>
                <a href="<?php echo base_url(); ?>" class="smallogo"><img src="<?php echo base_url();?>img/logo.png" width="180" alt="<?php echo $settings_info['site_name']; ?>" /></a>
            </div>
            
            <!--================================HEADER==========================================-->
            <div class="header">
                <div class="top-toolbar"><!--header toolbar-->
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4 col-sm-12 col-xs-12 pull-left">
                                <div class="social-content">
                                    <ul class="social-links">
                                        <?php if (!empty($settings_info['facebook'])) { ?>
                                            <li><a class="facebook" href="<?php echo $settings_info['facebook']; ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                        <?php } ?>
                                        <?php if (!empty($settings_info['twitter'])) { ?>
                                            <li><a class="twitter" href="<?php echo $settings_info['twitter']; ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                        <?php } ?>
                                        <?php if (!empty($settings_info['youtube'])) { ?>
                                            <li><a class="youtube" href="<?php echo $settings_info['youtube']; ?>" target="_blank"><i class="fa fa-youtube"></i></a></li>
                                        <?php } ?>
                                        <?php if (!empty($settings_info['google_plus'])) { ?>
                                            <li><a class="youtube" href="<?php echo $settings_info['google_plus']; ?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                                        <?php } ?>

                                        <?php
                                        $user_id = $this->session->userdata('user_id');
                                        $full_name = $this->session->userdata('first_name') . " " . $this->session->userdata('last_name');
                                        if (!empty($user_id)) {
                                            ?>
                                            <li><a class="dashboard" href="<?php echo base_url('user/dashboard.html'); ?>"><?php echo $full_name; ?> </a></li> |
                                            <li><a class="dashboard" href="<?php echo base_url('user/logout.html'); ?>">Logout</a></li>
                                        <?php } else { ?>
                                            <li><a class="dashboard" href="<?php echo base_url('user/login.html'); ?>">Login</a></li> |
                                            <li><a class="dashboard" href="<?php echo base_url('user/packages.html'); ?>">Register</a></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-8 col-sm-12 col-xs-12 pull-right">
                                <div class="top-contact-info">
                                    <ul>
                                        <li class="toolbar-email"><i class="fa fa-envelope-o"></i> <?php echo $settings_info['email_address']; ?></li>
                                        <li class="toolbar-contact"><i class="fa fa-phone"></i> <?php echo $settings_info['mobile_number']; ?></li>
                                        <?php if (!empty($this->session->userdata('user_id'))) { ?>
                                            <li><a class="toolbar-new-listing" href="<?php echo base_url('user/listing/add_listing.html'); ?>"><i class="fa fa-plus-circle"></i> Add Listing</a></li>
                                        <?php } else { ?>

                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--header toolbar end-->
                <div class="nav-wrapper"><!--main navigation-->
                    <div class="container">
                        <!--Main Menu HTML Code-->
                        <nav class="wsmenu slideLeft clearfix">
                            <div class="logo pull-left"><a href="<?php echo base_url(); ?>" title="Responsive Slide Menus"><img src="<?php echo base_url();?>img/logo.jpg" width="250" alt="<?php echo $settings_info['site_name']; ?>" /></a></div>
                        
                        </nav>
                         
                    </div>
                </div><!--main navigation end-->
            </div><!-- header end -->


            <?php echo $main_content; ?>


            <!--================================SOCIAL SECTION==========================================-->

            <section class="social-section  style-2">
                <div class="container"><!-- section container -->
                    <div class="row social-wrap clearfix">
                        <div class="col-md-2 col-sm-4 col-xs-12 social-connect pull-left">
                            <h5>let's connect</h5>
                        </div>
                        <div class="col-md-10 col-sm-8 col-xs-12 social-links">
                            <ul class="pull-right clearfix">
                                <?php if (!empty($settings_info['facebook'])) { ?>
                                    <li class="item"><a class="" href="<?php echo $settings_info['facebook']; ?>"><i class="fa fa-facebook-square"></i></a></li><!-- .ITEM -->
                                <?php } ?>
                                <?php if (!empty($settings_info['twitter'])) { ?>
                                    <li class="item"><a class="" href="<?php echo $settings_info['twitter']; ?>"><i class="fa fa-twitter-square"></i></a></li><!-- .ITEM -->
                                <?php } ?>
                                <?php if (!empty($settings_info['google_plus'])) { ?>
                                    <li class="item"><a class="" href="<?php echo $settings_info['google_plus']; ?>"><i class="fa fa-google-plus-square"></i></a></li><!-- .ITEM -->
                                <?php } ?>
                                <?php if (!empty($settings_info['youtube'])) { ?>
                                    <li class="item"><a class="" href="<?php echo $settings_info['youtube']; ?>"><i class="fa fa-youtube-play"></i></a></li><!-- .ITEM -->
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div><!-- container end -->
            </section>

            <!--================================ FOOTER AREA ==========================================-->

            <footer class="footer style-1 padding-top-60 bg222">
                <div class="container">
                    <div class="footer-main padding-bottom-10">
                        <div class="row">
                            <div class="col-md-4 col-sm-4 col-xs-12 margin-bottom-30">
                                <div class="footer-logo">
                                    <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url();?>img/Logo_red.png" alt="<?php echo $settings_info['site_name']; ?>"></a>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12 margin-bottom-30">
                                <div class="footer-widget-title">
                                    <h5>address</h5>
                                </div>
                                <div class="footer-recent-post-widget">

                                    <div class="footer-recent-post clearfix">
                                        <div class="footer-recent-post-content">
                                            <div class="footer-recent-post-caption">
                                                <p class="date"><?php echo $settings_info['address']; ?></p>
                                                <p class="date"><?php echo $settings_info['state'] . " , " . $settings_info['city']; ?></p>
                                                <p class="date"><?php echo $settings_info['postal_code']; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12 margin-bottom-30">
                                <div class="footer-widget-title">
                                    <h5>contact</h5>
                                </div>
                                <div class="footer-recent-post-widget">

                                    <div class="footer-recent-post clearfix">
                                        <div class="footer-recent-post-content">
                                            <div class="footer-recent-post-caption">
                                                <p class="date"><?php echo $settings_info['email_address']; ?></p>
                                                <p class="date"><?php echo $settings_info['phone_number']; ?></p>
                                                <p class="date"><?php echo $settings_info['mobile_number']; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-12 col-sm-12 col-xs-12 margin-bottom-30">
                                <div class="search-form-wrap2">
                                    <form class="clearfix" action="<?php echo base_url('subscribers/add_subscriber.html'); ?>" method="post">
                                        <div class="input-field-wrap pull-left" style="width: 78%">
                                            <input class="search-form-input" name="email_address" placeholder="enter email address" type="email" required="">
                                        </div>
                                        <div class="submit-field-wrap pull-left">
                                            <input class="search-form-submit bgred-1 white" value="Subscribe" type="submit">
                                        </div>
                                    </form>
                                </div>
                            </div>


                        </div>
                    </div>
                </div><!-- .container end -->
                <div class="footer-bottom">
                    <div class="container">
                        <div class="row clearfix">
                            <div class="col-md-8 col-sm-12 col-xs-12 pull-right margin-bottom-20">
                                <nav class="footer-menu wsmenu clearfix">
                                    <ul class="wsmenu-list pull-right">
                                        <li><a href="<?php echo base_url(); ?>" class="">Home</a></li>
                                        <li><a href="<?php echo base_url('terms_conditions.html'); ?>" class="">Terms & Conditions</a></li>
                                        <li><a href="<?php echo base_url('privacy_policy.html'); ?>" class="">Privacy & Policy</a></li>
                                        <li><a href="<?php echo base_url('contact.html'); ?>">Contact Us</a></li>
                                    </ul>
                                </nav>
                            </div>
                            <div class="col-md-4 col-sm-12 col-xs-12 pull-left margin-bottom-20">
                                <div class="footer-copyright">
                                    <p>&copy; 2017 All Rights Reserved @ <a href="http://studybrate.com/" target="_blank">Studybrate</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!--================================MODAL WINDOWS FOR REGISTER AND LOGIN FORMS ===========================================-->

        <!-- Modal registration form -->
        <div class = "modal fade" id = "register" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true">
            <div class = "listing-modal-1 modal-dialog">
                <div class = "modal-content">
                    <div class = "modal-header">
                        <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">&times;</button>
                        <h4 class = "modal-title" id = "myModalLabel2">registration</h4>
                    </div>
                    <div class = "modal-body">
                        <div class=" listing-register-form">
                            <form action="<?php echo base_url(); ?>">
                                <div class="listing-form-field">
                                    <input class="form-field bgwhite" type="text" name="user_name" placeholder="name"  />
                                </div>
                                <div class="listing-form-field">
                                    <input class="form-field bgwhite" type="email" name="user_email" placeholder="email" />
                                </div>
                                <div class="listing-form-field">
                                    <input class="form-field bgwhite" type="password" name="user_password" placeholder="password"  />
                                </div>
                                <div class="listing-form-field">
                                    <input class="form-field bgwhite" type="password" name="user_confirm_password" placeholder="confirm password" />
                                </div>
                                <div class="listing-form-field clearfix margin-top-20 margin-bottom-20">
                                    <input type="checkbox" id="checkbox-1-2" class="regular-checkbox" /><label for="checkbox-1-2"></label>
                                    <label class="checkbox-lable">i agree with</label>
                                    <a href="<?php echo base_url(); ?>">terms & conditions</a>
                                </div>
                                <div class="listing-form-field">
                                    <input class="form-field submit bgred-1" type="submit"  value="create account" />
                                </div>
                            </form>
                            <div class="bottom-links">
                                <p>login with social network</p>
                                <div class="listing-form-social">
                                    <ul>
                                        <li><a class=" bgred-4 white" href="<?php echo base_url(); ?>"><i class="fa fa-facebook"></i></a></li>
                                        <li><a class=" bgred-1 white" href="<?php echo base_url(); ?>"><i class="fa fa-twitter"></i></a></li>
                                        <li><a class=" bgred-2 white" href="<?php echo base_url(); ?>"><i class="fa fa-google-plus"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <!--================================JQuery===========================================-->

        <script src="<?php echo base_url(); ?>assets/frontend/js/jquery.js"></script><!-- jquery 1.11.2 -->
        <script src="<?php echo base_url(); ?>assets/frontend/js/jquery.easing.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/frontend/js/modernizr.custom.js"></script>

        <!--================================BOOTSTRAP===========================================-->

        <script src="<?php echo base_url(); ?>assets/frontend/bootstrap/js/bootstrap.min.js"></script>

        <!--================================NAVIGATION===========================================-->

        <script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/menu.js"></script>

        <!--================================SLIDER REVOLUTION===========================================-->

        <script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/assets/revolution_slider/js/revolution-slider-tool.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/assets/revolution_slider/js/revolution-slider.js"></script>

        <!--================================OWL CARESOUL=============================================-->

        <script src="<?php echo base_url(); ?>assets/frontend/js/owl.carousel.js"></script>
        <script src="<?php echo base_url(); ?>assets/frontend/js/triger.js" type="text/javascript"></script>

        <!--================================FunFacts Counter===========================================-->

        <script src="<?php echo base_url(); ?>assets/frontend/js/jquery.countTo.js"></script>

        <!--================================jquery cycle2=============================================-->

        <script src="<?php echo base_url(); ?>assets/frontend/js/jquery.cycle2.min.js" type="text/javascript"></script>

        <!--================================waypoint===========================================-->

        <script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/jquery.waypoints.min.js"></script><!-- Countdown JS FILE -->

        <!--================================RATINGS===========================================-->

        <script src="<?php echo base_url(); ?>assets/frontend/js/jquery.raty-fa.js"></script>
        <script src="<?php echo base_url(); ?>assets/frontend/js/rate.js"></script>

        <!--================================ testimonial ===========================================-->
        <script id="img-wrapper-tmpl" type="text/x-jquery-tmpl">

            <div class="rg-image-wrapper">
            <div class="rg-image"></div>
            <div class="rg-caption-wrapper">
            <div class="rg-caption" style="display:none;">
            <p></p>
            <h5></h5>
            <div class="caption-metas">
            <p class="position"></p>
            <p class="orgnization"></p>
            </div>
            </div>
            </div>
            <div class="clear"></div>
            </div>
        </script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/assets/testimonial/js/jquery.tmpl.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/assets/testimonial/js/jquery.elastislide.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/assets/testimonial/js/gallery.js"></script>

        <!--================================custom script===========================================-->

        <script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/custom.js"></script>

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

    <!-- Mirrored from demo.designsvilla.com/html/templates/listing-classified/main/index-3.html by HTTrack Website Copier/3.x [XR&CO'2013], Tue, 21 Mar 2017 18:49:07 GMT -->
</html>
