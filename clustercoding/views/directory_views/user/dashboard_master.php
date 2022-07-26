<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<style type="text/css">
    .btn-custom{
        padding: 10px 15px;
        border-radius: 0px;
        font-size: 14px;
        color: #ffffff
    }
    .btn-custom:hover{
        color:#f2efef;
    }
    .add-btn{
        padding: 8px 15px;
        border-radius: 0px;
        font-size: 14px;
        color: #ffffff
    }
    .notification .success-message{
        color: #51A351;
    }
    .notification .error-message{
        color: #BD362F;
    }
    .notification .notification-message{
        color: #F89406;
    }
</style>
<!--================================PAGE TITLE==========================================-->
<div class="page-title-wrap bgblue-1 padding-top-30 padding-bottom-30"><!-- section title -->
    <div class="container">
        <h4 class="pull-left"><a class="white" href="<?php echo base_url('user/dashboard.html'); ?>"><i class="fa fa-home"></i> Dashboard</a></h4>

    </div>
</div><!-- section title end -->

<!--================================CATEGOTY SECTION==========================================-->

<section class="aside-layout-section padding-top-20 padding-bottom-40">
    <div class="container"><!-- section container -->
        <div class="row"><!-- row -->
            <div class="col-md-3 col-sm-4 col-xs-12"><!-- sidebar column -->
                <div class="sidebar sidebar-wrap">
                    <div class="sidebar-widget shadow-1">
                        <div class="sidebar-widget-title">
                            <div class="row">
                                <div class="col-md-4 col-sm-4 col-xs-6">
                                    <?php
                                    $profile_picture = '';
                                    if (!empty($this->session->userdata('avatar'))) {
                                        $profile_picture = base_url() . "assets/uploaded_files/profile_img/resize/" . $this->session->userdata('avatar');
                                    } else {
                                        $profile_picture = base_url() . "assets/uploaded_files/profile_img/resize/user4-128x128.jpg";
                                    }
                                    ?>
                                    <img src="<?php echo $profile_picture; ?>" class="img-circle"  alt="<?php echo $profile_picture; ?>">
                                </div>
                                <div class="user-panel-active col-md-8 col-sm-8 col-xs-6">
                                    <p>
                                        <?php echo $this->session->userdata('first_name') . " " . $this->session->userdata('last_name') ?>
                                        <br>
                                        <!-- Status -->
                                        <i class="fa fa-circle text-success"></i> Online
                                    </p>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="sidebar-widget-content category-widget clearfix">
                            <div class="sidebar-category-widget-wrap">
                                <?php $total = count_all_service_info(); ?>
                                <ul>
                                    <li><a href="<?php echo base_url('user/dashboard.html'); ?>"><i class="fa fa-dashboard bgblue-1 white"></i> Dashboard</a></li>
                                    <li><a href="<?php echo base_url('user/listing.html'); ?>"><i class="fa fa-briefcase bgbrown-1 white"></i> My Institute/Teachers <span> ( <?php echo $total['total_listing']; ?> ) </span></a></li>
                                <!--<li><a href="<?php echo base_url('user/images.html'); ?>"><i class="fa fa-image bggreen-1 white"></i> Images <span>( <?php echo $total['total_images']; ?> )</span></a></li>
                                    <li><a href="<?php echo base_url('user/videos.html'); ?>"><i class="fa fa-video-camera bgpurpal-1 white"></i> Videos <span>( <?php echo $total['total_videos']; ?> )</span></a></li>-->
                                   <!-- <li><a href="<?php echo base_url('user/exams.html'); ?>"><i class="fa fa-tags bgyallow-1 white"></i> Q/A's <span>( <?php echo $total['total_products']; ?> )</span></a></li>-->
                                    <li><a href="<?php echo base_url('user/services.html'); ?>"><i class="fa fa-cogs bgblue-3 white"></i> Courses <span>( <?php echo $total['total_services']; ?> )</span></a></li>
                                    <li><a href="<?php echo base_url('user/articles.html'); ?>"><i class="fa fa-book bgorange-1 white"></i> Articles <span>( <?php echo $total['total_articles']; ?> )</span></a></li>
                                    <li><a href="<?php echo base_url('user/Blogs.html'); ?>"><i class="fa fa-rss bgblue-1 white"></i> Blogs <span>( <?php echo $total['total_blogs']; ?> )</span></a></li>
                                    <li><a href="<?php echo base_url('user/Notes.html'); ?>"><i class="fa fa-rss bgblue-1 white"></i> Notes <span>( <?php echo $total['total_notes']; ?> )</span></a></li>
                                    <li><a href="<?php echo base_url('user/Gallaries.html'); ?>"><i class="fa fa-rss bgblue-1 white"></i> Gallary <span></span></a></li>
                                    <!--<li><a href="<?php echo base_url('user/reviews.html'); ?>"><i class="fa fa-rss bgblue-1 white"></i> Reviews <span></span></a></li>-->
                                    <li><a href="<?php echo base_url('user/questions.html'); ?>"><i class="fa fa-rss bgblue-1 white"></i> Questions <span></span></a></li>
                                    <li><a href="<?php echo base_url('user/keywords.html'); ?>"><i class="fa fa-search bggreen-2 white"></i> Keywords <span>( <?php echo $total['total_keywords']; ?> )</span></a></li>
                                <!--<li><a href="<?php echo base_url('user/bookmarks.html'); ?>"><i class="fa fa-bookmark bgred-1 white"></i> Bookmarks <span>( <?php echo $total['total_bookmarks']; ?> )</span></a></li>-->
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="sidebar-widget shadow-1">
                        <div class="sidebar-widget-title">
                            <h5><span class="bgpurpal-1"></span>Settings</h5>
                        </div>
                        <div class="sidebar-widget-content location-widget clearfix">
                            <div class="sidebar-location-widget-wrap">
                                <ul>
                                    <li><a class="nohover" href="<?php echo base_url('user/profile.html'); ?>"><i class="fa fa-user blue-1"></i> Profile</a></li>
                                    <li><a class="nohover" href="<?php echo base_url('user/profile/change_password.html'); ?>"><i class="fa fa-cog blue-1"></i> Change Password</a></li>
                                    <li><a class="nohover" href="<?php echo base_url('user/logout.html'); ?>"><i class="fa fa-lock blue-1"></i> Logout</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-9 col-sm-8 col-xs-12 main-wrap">
                <!-- start user content -->
                <?php echo $user_content; ?>

                <!-- end user content -->
            </div>
        </div>
    </div><!-- section container end -->
</section>
