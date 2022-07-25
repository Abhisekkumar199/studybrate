<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// Load city and category function in global model
//$cities_info = cities_info();
//$categories_info = categories_info();
?>
<!--================================PAGE TITLE==========================================-->
<div class="page-title-wrap bgbrown-1 padding-top-30 padding-bottom-30"><!-- section title -->
    <h4 class="white"><?php echo $listing_info['company_name']; ?></h4>
</div><!-- section title end -->

<!--================================listing SECTION==========================================-->

<section class="aside-layout-section padding-top-70 padding-bottom-40">
    <div class="container"><!-- section container -->
        <div class="row"><!-- row -->
            <div class="col-md-3 col-sm-4 col-xs-12"><!-- sidebar column -->
                <div class="sidebar sidebar-wrap">

                    <!-- start profile picture -->
                    <div class="sidebar-widget shadow-1">
                        <div class="sidebar-widget-content advertise  clearfix">
                            <div class="sidebar-image-ads">
                                <?php
                                $company_logo = '';
                                if (!empty($listing_info['company_logo'])) {
                                    $company_logo = "assets/uploaded_files/company_logo/resize/" . $listing_info['company_logo'];
                                } else {
                                    $company_logo = "assets/uploaded_files/company_logo/logo_not_available.png";
                                }
                                ?>
                                <img src="<?php echo base_url($company_logo); ?>" alt="<?php echo $listing_info['company_name']; ?>">
                            </div>
                        </div>
                        <div class="sidebar-widget-title">
                            <h5><a href="<?php echo base_url('listing/listing_details/' . $listing_info['listing_id'] . '.html'); ?>" class="red-2"><span class="bgblue-1"></span><?php echo $listing_info['company_name']; ?></a></h5>
                        </div>
                    </div><!-- Item end-->

                    <div class="sidebar-widget shadow-1">
                        <div class="sidebar-widget-content category-widget clearfix">
                            <div class="sidebar-category-widget-wrap">
                                <ul>
                                    <li><a href="<?php echo base_url('listing/images/' . $listing_info['listing_id'] . '.html'); ?>"><i class="fa fa-image bggreen-1 white"></i> Images <span>( <?php echo $total_images; ?> )</span></a></li>
                                    <li><a href="<?php echo base_url('listing/videos/' . $listing_info['listing_id'] . '.html'); ?>"><i class="fa fa-video-camera bgpurpal-1 white"></i> Videos <span>( <?php echo $total_videos; ?> )</span></a></li>
                                    <li><a href="<?php echo base_url('listing/products/' . $listing_info['listing_id'] . '.html'); ?>"><i class="fa fa-tags bgyallow-1 white"></i> Products <span>( <?php echo $total_products; ?> )</span></a></li>
                                    <li><a href="<?php echo base_url('listing/services/' . $listing_info['listing_id'] . '.html'); ?>"><i class="fa fa-cogs bgblue-3 white"></i> Services <span>( <?php echo $total_services; ?> )</span></a></li>
                                    <li><a href="<?php echo base_url('listing/articles/' . $listing_info['listing_id'] . '.html'); ?>"><i class="fa fa-book bgorange-1 white"></i> Articles <span>( <?php echo $total_articles; ?> )</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- start recent post -->
                    <div class="sidebar-widget shadow-1">
                        <div class="sidebar-widget-title">
                            <h5><span class="bgyallow-1"></span>recent articles</h5>
                        </div>
                        <div class="sidebar-widget-content recent-post clearfix">

                            <?php foreach ($recent_articles as $v_recent_article) { ?>
                                <div class="recent-post-entry clearfix">
                                    <div class="recent-entry-figure">
                                        <img src="<?php echo base_url('assets/uploaded_files/company_articles/' . $v_recent_article['image_path']); ?>" alt="recent post"/>
                                    </div>
                                    <div class="recent-entry-content">
                                        <p class="recent-entry-title"><a href="<?php echo base_url('articles/article_details/' . $v_recent_article['article_id'] . '.html'); ?>"><?php echo $character = character_limiter($v_recent_article['article_name'], 15); ?></a></p>
                                        <p class="recent-entry-meta date"><?php echo date("d F Y h:ia", strtotime($v_recent_article['date_added'])); ?></p>
                                    </div>
                                </div>
                            <?php } ?>

                        </div>
                    </div><!-- Item end-->

                    <!-- start opening hours -->
                    <div class="sidebar-widget shadow-1">
                        <div class="sidebar-widget-title">
                            <h5><span class="bggreen-1"></span>opening hours</h5>
                        </div>
                        <div class="sidebar-widget-content opening-hours  clearfix">
                            <div class="sidebar-opening-hours-widget">
                                <div class="opening-hours-field clearfix">
                                    <span>Sunday</span>
                                    <span><?php echo $listing_info['sunday']; ?></span>
                                </div>
                                <div class="opening-hours-field clearfix">
                                    <span>Monday</span>
                                    <span><?php echo $listing_info['monday']; ?></span>
                                </div>
                                <div class="opening-hours-field clearfix">
                                    <span>Tuesday</span>
                                    <span><?php echo $listing_info['tuesday']; ?></span>
                                </div>
                                <div class="opening-hours-field clearfix">
                                    <span>Wednesday</span>
                                    <span><?php echo $listing_info['wednesday']; ?></span>
                                </div>
                                <div class="opening-hours-field clearfix">
                                    <span>Thursday</span>
                                    <span><?php echo $listing_info['thursday']; ?></span>
                                </div>
                                <div class="opening-hours-field clearfix">
                                    <span>Friday</span>
                                    <span><?php echo $listing_info['friday']; ?></span>
                                </div>
                                <div class="opening-hours-field clearfix">
                                    <span>Saturday</span>
                                    <span><?php echo $listing_info['saturday']; ?></span>
                                </div>
                            </div>
                        </div>
                    </div><!-- end item -->

                    <div class="sidebar-widget shadow-1">
                        <div class="sidebar-widget-title">
                            <h5><span class="bgblue-1"></span>ADVERTISING</h5>
                        </div>
                        <div class="sidebar-widget-content advertise  clearfix">
                            <div class="sidebar-image-ads">
                                <a href="#"><img src="<?php echo base_url(); ?>assets/frontend/images/01.jpg" alt="custom-image"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9 col-sm-8 col-xs-12 main-wrap"><!-- content area column -->
                <div class="listing-single padding-bottom-40">
                    <div class="single-listing-wrap">

                        <!-- declare a map -->
                        <div id="map" width="100%"></div>
                        <!-- end a map -->

                        <div class="listing-details padding-top-40">
                            <div class="tab-content current">
                                <h5>business description</h5>
                                <p><?php echo $listing_info['about_company']; ?></p>
                            </div>
                        </div>

                        <div class="listing-contact-detail-wrap">
                            <div class="listing-contact-section-title">
                                <h5>contact</h5>
                            </div>
                            <div class="listing-contact-section-table">
                                <div class="listing-contact-table-field">
                                    <ul>
                                        <li class="info">Address</li>
                                        <li class="details"><?php echo $listing_info['address']; ?></li>
                                    </ul>
                                </div>
                                <div class="listing-contact-table-field">
                                    <ul>
                                        <li class="info">State</li>
                                        <li class="details"><?php echo $listing_info['state']; ?></li>
                                    </ul>
                                </div>
                                <div class="listing-contact-table-field">
                                    <ul>
                                        <li class="info">Zip</li>
                                        <li class="details"><?php echo $listing_info['zip']; ?></li>
                                    </ul>
                                </div>
                                <div class="listing-contact-table-field">
                                    <ul>
                                        <li class="info">Fax</li>
                                        <li class="details"><?php echo $listing_info['fax']; ?></li>
                                    </ul>
                                </div>
                                <div class="listing-contact-table-field">
                                    <ul>
                                        <li class="info">Mobile</li>
                                        <li class="details"><?php echo $listing_info['mobile']; ?></li>
                                    </ul>
                                </div>
                                <div class="listing-contact-table-field">
                                    <ul>
                                        <li class="info">Landline</li>
                                        <li class="details"><?php echo $listing_info['phone']; ?></li>
                                    </ul>
                                </div>
                                <div class="listing-contact-table-field">
                                    <ul>
                                        <li class="info">E-mail</li>
                                        <li class="details"><?php echo $listing_info['email']; ?></li>
                                    </ul>
                                </div>
                                <div class="listing-contact-table-field">
                                    <ul>
                                        <li class="info">Website</li>
                                        <li class="details"><a style="text-align: left; color: #08c2f3" href="<?php echo $listing_info['website']; ?>" target="_blank"><?php echo $listing_info['website']; ?></a></li>
                                    </ul>
                                </div>
                                <div class="listing-contact-table-field">
                                    <ul>
                                        <li class="info">Category</li>
                                        <li class="details"><?php echo $listing_info['category_name']; ?></li>
                                    </ul>
                                </div>
                                <div class="listing-contact-table-field">
                                    <ul>
                                        <li class="info">Location</li>
                                        <li class="details"><?php echo $listing_info['city_name']; ?></li>
                                    </ul>
                                </div>
                                <!--<div class="listing-contact-table-field">
                                    <ul>
                                        <li class="info">Tags</li>
                                        <li class="details">Ads, Bikes, Cars, Fashion, Foods, Jobs kids</li>
                                    </ul>
                                </div>-->
                            </div>
                        </div>


                        <?php if (!empty($recent_videos)) { ?>
                            <div class="listing-video-section bgwhite">
                                <div class="listing-video-section-title">
                                    <h5>VIDEO</h5>
                                </div>
                                <div class="listing-video-wrapper clearfix">  
                                    <div class="video">
                                        <?php
                                        //https://youtu.be/LKNHVDPKy7g
                                        //https://www.youtube.com/embed/LKNHVDPKy7g
                                        $current_url = $recent_videos['video_url'];
                                        $current_word = array('youtu.be');
                                        $replace_with = array('www.youtube.com/embed');
                                        $converted_url = str_replace($current_word, $replace_with, $current_url);
                                        ?>
                                        <iframe width="100%" height="480"  src="<?php echo $converted_url; ?>" frameborder="0" allowfullscreen></iframe>
                                    </div>			
                                </div>
                            </div>
                        <?php } ?>

                        <?php if (!empty($recent_images)) { ?>
                            <div class="listing-owner-section">
                                <div class="listing-video-section-title padding-bottom-20">
                                    <h5>Recent Photos</h5>
                                </div>
                                <div class="listing-wrapper three-column row">
                                    <?php foreach ($recent_images as $v_recent_image) { ?>
                                        <div class="item col-md-4 col-sm-6 col-xs-12"><!-- .ITEM -->
                                            <div class="listing-item clearfix">
                                                <div class="figure">
                                                    <img src="<?php echo base_url('assets/uploaded_files/company_img/resize/' . $v_recent_image['image_path']); ?>" width="270" alt="<?php echo $v_recent_image['caption']; ?>"/>
                                                    <div class="listing-overlay">
                                                        <div class="listing-overlay-inner rgba-bgyallow-1">
                                                            <div class="overlay-content">
                                                                <ul class="listing-links">
                                                                    <li><a class="bgwhite nohover" href="<?php echo base_url('images/image_details/' . $v_recent_image['image_id'] . '.html'); ?>"><i class="fa fa-search green-1 "></i></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="listing-content clearfix">
                                                    <div class="listing-meta-cat">
                                                        <a class="bgyallow-1" href="#"><i class="fa fa-suitcase white"></i></a>
                                                    </div>
                                                    <div class="listing-title">
                                                        <h6><a href="<?php echo base_url('images/image_details/' . $v_recent_image['image_id'] . '.html'); ?>"><?php echo character_limiter($v_recent_image['caption'], 15); ?></a></h6>
                                                    </div>
                                                    <div class="listing-disc">
                                                        <p></p>
                                                    </div>
                                                    <div class="listing-location pull-left"><!-- location-->
                                                        <a href="#"><i class="fa fa-briefcase"></i> <?php echo character_limiter($v_recent_image['company_name'], 24); ?></a>
                                                        <a href="#"><i class="fa fa-map-marker"></i> <?php echo $v_recent_image['address'] . ", " . $v_recent_image['state'] . ", " . $v_recent_image['city_name'] . ", " . $v_recent_image['zip']; ?></a>
                                                    </div><!-- location end-->
                                                    <div class="star-rating pull-right"><!-- rating-->
                                                        <!--<div class="score-callback" data-score="5"></div>-->
                                                    </div><!-- rating end-->
                                                </div>
                                            </div>
                                            <div class="listing-border-bottom bgyallow-1"></div>
                                        </div><!-- /.ITEM -->
                                    <?php } ?>
                                </div>
                            </div>
                        <?php } ?>

                    </div>
                </div>
            </div><!-- content area end -->

        </div>
    </div><!-- section container end -->
</section>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCruIR-E1OQ9TEh5pABARsl8drCCc2PASs&callback=initMap"></script>
<script>
    function initMap() {
        var uluru = {lat: <?php echo $listing_info['lat']; ?>, lng: <?php echo $listing_info['lng']; ?>}


        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 10,
            center: uluru
        });
        var marker = new google.maps.Marker({
            position: uluru,
            map: map,
            draggable: false
        });
        google.maps.event.addListener(marker, 'dragend', function () {
//            //console.log(marker.getPosition().lat());
//            //console.log(marker.getPosition().lng());
//
//            var lat = marker.getPosition().lat();
//            var lng = marker.getPosition().lng();
//            $('#lat').val(lat);
//            $('#lng').val(lng);
        });
        // var searchBox = new google.maps.places.SearchBox(document.getElementById('mapsearch'));

    }
</script>