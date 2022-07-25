<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$cities_info = cities_info();
//$categories_info = categories_info();
?>
<style>
    .owl-item
    {
        width:400px!important;
    }
</style>
<main>
  <section class="hero_single version_4">
    <div class="wrapper">
      <div class="container">
        <h3 style="font-size: 1.80rem;">Search & Learn with Expert Tutor | Trainer | Institute<span id="h_city"> </span></h3>
        <p>Discover top rated educational Institutess, teachers and study material to make your dreams true ...</p>
        <form action="<?php echo base_url('teachers'); ?>" method="post">
          <div class="row no-gutters custom-search-input-2">
            <div class="col-lg-4">
              <div class="form-group">
                <input class="form-control" name="tutor_name" placeholder="Search Teachers ..." type="text">
                <i class="icon_search"></i>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="form-group">
                <select class="wide" name="city_id" >
                      <option class="options" value="">All Cities </option>
                      <?php
                      foreach ($cities_info as $v_city_info) { ?>
                          <option class="options" value="<?php echo $v_city_info['city_name'];?>" <?php if($v_city_info['city_name'] == $city) { echo "selected"; } ?> ><?php echo $v_city_info['city_name']; ?></option>
                     <?php }
                      ?> 
                  </select>
              </div>
            </div>
            <div class="col-lg-3">
              <select class="wide" name="category_id" >
                <option value="">All Categories</option> 
                <?php foreach ($categories_info2 as $v_categories_info2) 
                {  
                    echo "<option class='options' value='" . $v_categories_info2['category_id'] . "'>" . $v_categories_info2['category_name'] . "</option>";
                }
                ?>
              </select>
            </div>
            <div class="col-lg-2">
              <input type="submit" value="Search">
            </div>
          </div>
          <!-- /row -->
        </form>
        <ul class="counter">
          <li><strong>20+</strong> States</li>
          <li><strong>150,543</strong> Active users</li>
        </ul>
        <span style="color: #fff;font-size:24px;margin-top: 40px;">Top Categories</span>
      </div>
    </div>
  </section>

  <div class="main_categories">
    <div class="container">
      <ul class="clearfix">
        <?php foreach ($categories_info2 as $v_categories_info2) { ?>
        <li style="margin-bottom:20px;">
          <a href="<?php echo base_url('search/'.$v_categories_info2['cat_slug']); ?>">
          <?php
          $avatar = $v_categories_info2['category_image'];
          if (!empty($avatar)) 
          {
              $profile_picture = base_url('assets/uploaded_files/category_img/' . $avatar);
          } else {
              $profile_picture = base_url('assets/backend/dist/img/user4-128x128.jpg');
          }
          ?>
          <img src="<?php echo $profile_picture; ?>" alt="" height="50"> 
            <h3><?php echo $v_categories_info2['category_name']; ?></h3>
          </a>
        </li>
        <?php } ?>
        

      </ul>
      
    </div>
    <!-- /container -->
  </div>
  <!-- /hero_single -->
  
  <div class="container margin_60_35">
     
    <?php if(count($featured_listing_tution) > 0) { ?>  
        <div class="main_title_3">
          <span></span>
          <h2>Tution</h2> 
          <a href="search/tution">See all</a>
        </div>
        <div class="row add_bottom_30">
            <?php  foreach ($featured_listing_tution as $v_featured_listing_t) { ?>
            <div class="col-lg-3 col-sm-6">
            <a href="<?php echo base_url('teachers_listing/teacher_details/' . $v_featured_listing_t['listing_id'] . '.html'); ?>" class="grid_item small">
              <figure>
                <img src="<?php
                $company_logo = '';
                if (!empty($v_featured_listing_t['company_logo'])) {
                    $company_logo = "assets/uploaded_files/company_logo/" . $v_featured_listing_t['company_logo'];
                } else {
                    $company_logo = "assets/uploaded_files/company_logo/logo_not_available.png";
                } echo base_url($company_logo);
                ?>" alt="">
                
                <div class="info">
                    <small><?php echo $v_featured_listing_t['category_name']; ?></small>
                  <h3><?php echo character_limiter($v_featured_listing_t['company_name'], 25); ?></h3>
                  <ul>
                      <li><span class="loc_open"><?php echo $v_featured_listing_t['city_name']; ?></span></li> 
                    </ul>
                </div>
              </figure>
            </a>
            </div>
        <?php } ?> 
        </div>
    <?php } ?> 
    
    <!--<?php if(count($featured_listing_institute) > 0) { ?>  
        <div class="main_title_3">
          <span></span>
          <h2>Institute</h2> 
          <a href="search/institute">See all</a>
        </div>
        <div class="row add_bottom_30"> 
            <?php foreach ($featured_listing_institute as $v_featured_listing_t) { ?>
            <div class="col-lg-3 col-sm-6">
            <a href="<?php echo base_url('teachers_listing/teacher_details/' . $v_featured_listing_t['listing_id'] . '.html'); ?>" class="grid_item small">
              <figure>
                <img src="<?php
                $company_logo = '';
                if (!empty($v_featured_listing_t['company_logo'])) {
                    $company_logo = "assets/uploaded_files/company_logo/" . $v_featured_listing_t['company_logo'];
                } else {
                    $company_logo = "assets/uploaded_files/company_logo/logo_not_available.png";
                } echo base_url($company_logo);
                ?>" alt="">
                <div class="info">
            
                  <h3><?php echo character_limiter($v_featured_listing_t['company_name'], 25); ?></h3>
                </div>
              </figure>
            </a>
            </div>
            <?php } ?>
        </div>
    <?php } ?> -->
    
    
    <?php if(count($featured_listing_collage) > 0) { ?>  
        <div class="main_title_3">
          <span></span>
          <h2>Collage</h2> 
          <a href="search/collage">See all</a>
        </div>
        <div class="row ">
          <?php foreach ($featured_listing_collage as $v_featured_listing_t) { ?>
          <div class="col-lg-3 col-sm-6">
            <a href="<?php echo base_url('teachers_listing/teacher_details/' . $v_featured_listing_t['listing_id'] . '.html'); ?>" class="grid_item small">
              <figure>
                <img src="<?php
                $company_logo = '';
                if (!empty($v_featured_listing_t['company_logo'])) {
                    $company_logo = "assets/uploaded_files/company_logo/" . $v_featured_listing_t['company_logo'];
                } else {
                    $company_logo = "assets/uploaded_files/company_logo/logo_not_available.png";
                } echo base_url($company_logo);
                ?>" alt="">
                <div class="info">
                    <small><?php echo $v_featured_listing_t['category_name']; ?></small>
                  <h3><?php echo character_limiter($v_featured_listing_t['company_name'], 25); ?></h3>
                  <ul>
                      <li><span class="loc_open"><?php echo $v_featured_listing_t['city_name']; ?></span></li> 
                    </ul>
                </div>
              </figure>
            </a>
          </div>
        <?php } ?> 
        </div> 
    <?php } ?>  
    
    
   <!-- <?php if(count($featured_listing_comp_exam) > 0) { ?> 
        <div class="main_title_3">
          <span></span>
          <h2>Compatative Exam</h2> 
          <a href="search/competative-exam-coaching">See all</a>
        </div>
        <div class="row ">
          <?php foreach ($featured_listing_comp_exam as $v_featured_listing_t) { ?>
          <div class="col-lg-3 col-sm-6">
            <a href="<?php echo base_url('teachers_listing/teacher_details/' . $v_featured_listing_t['listing_id'] . '.html'); ?>" class="grid_item small">
              <figure>
                <img src="<?php
                $company_logo = '';
                if (!empty($v_featured_listing_t['company_logo'])) {
                    $company_logo = "assets/uploaded_files/company_logo/" . $v_featured_listing_t['company_logo'];
                } else {
                    $company_logo = "assets/uploaded_files/company_logo/logo_not_available.png";
                } echo base_url($company_logo);
                ?>" alt="">
                <div class="info">
                  <h3><?php echo character_limiter($v_featured_listing_t['company_name'], 25); ?></h3>
                </div>
              </figure>
            </a>
          </div>
        <?php } ?> 
        </div> 
    <?php } ?> --> 
    
    
    <?php if(count($featured_listing_itcourses) > 0) { ?>
        <div class="main_title_3">
          <span></span>
          <h2>IT Courses</h2> 
          <a href="search/it-courses">See all</a>
        </div>
        <div class="row ">
          <?php foreach ($featured_listing_itcourses as $v_featured_listing_t) { ?>
          <div class="col-lg-3 col-sm-6">
            <a href="<?php echo base_url('teachers_listing/teacher_details/' . $v_featured_listing_t['listing_id'] . '.html'); ?>" class="grid_item small">
              <figure>
                <img src="<?php
                $company_logo = '';
                if (!empty($v_featured_listing_t['company_logo'])) {
                    $company_logo = "assets/uploaded_files/company_logo/" . $v_featured_listing_t['company_logo'];
                } else {
                    $company_logo = "assets/uploaded_files/company_logo/logo_not_available.png";
                } echo base_url($company_logo);
                ?>" alt="">
                <div class="info">
                    <small><?php echo $v_featured_listing_t['category_name']; ?></small>
                  <h3><?php echo character_limiter($v_featured_listing_t['company_name'], 25); ?></h3>
                  <ul>
                      <li><span class="loc_open"><?php echo $v_featured_listing_t['city_name']; ?></span></li> 
                    </ul>
                </div>
              </figure>
            </a>
          </div>
        <?php } ?>
        </div> 
    <?php } ?>  
    
    
    <?php if(count($featured_listing_language) > 0) { ?>
        <div class="main_title_3">
          <span></span>
          <h2>Language</h2> 
          <a href="search/languages">See all</a>
        </div>
        <div class="row ">
        <?php foreach ($featured_listing_language as $v_featured_listing_t) { ?>
        <div class="col-lg-3 col-sm-6">
        <a href="<?php echo base_url('teachers_listing/teacher_details/' . $v_featured_listing_t['listing_id'] . '.html'); ?>" class="grid_item small">
          <figure>
            <img src="<?php
            $company_logo = '';
            if (!empty($v_featured_listing_t['company_logo'])) {
                $company_logo = "assets/uploaded_files/company_logo/" . $v_featured_listing_t['company_logo'];
            } else {
                $company_logo = "assets/uploaded_files/company_logo/logo_not_available.png";
            } echo base_url($company_logo);
            ?>" alt="">
            <div class="info">
                    <small><?php echo $v_featured_listing_t['category_name']; ?></small>
              <h3><?php echo character_limiter($v_featured_listing_t['company_name'], 25); ?></h3>
              <ul>
                      <li><span class="loc_open"><?php echo $v_featured_listing_t['city_name']; ?></span></li> 
                    </ul>
            </div>
          </figure>
        </a>
        </div>
        <?php } ?>
        </div>  
    <?php } ?>  
    
    <?php if(count($featured_listing_studyabroad) > 0) { ?>
        <div class="main_title_3"> 
            <span></span>
            <h2>Study Abroad</h2> 
            <a href="search/study-abroad">See all</a>
        </div> 
        <div class="row ">
        <?php foreach ($featured_listing_studyabroad as $v_featured_listing_t) { ?>
          <!-- /item -->
            <div class="col-lg-3 col-sm-6">
              <a href="<?php echo base_url('teachers_listing/teacher_details/' . $v_featured_listing_t['listing_id'] . '.html'); ?>" class="grid_item small">
                  <figure>
                    <img src="<?php
                    $company_logo = '';
                    if (!empty($v_featured_listing_t['company_logo'])) {
                        $company_logo = "assets/uploaded_files/company_logo/" . $v_featured_listing_t['company_logo'];
                    } else {
                        $company_logo = "assets/uploaded_files/company_logo/logo_not_available.png";
                    } echo base_url($company_logo);
                    ?>" alt="">
                    <div class="info">
                        <small><?php echo $v_featured_listing_t['category_name']; ?></small>
                        <h3><?php echo character_limiter($v_featured_listing_t['company_name'], 25); ?></h3>
                        <ul>
                          <li><span class="loc_open"><?php echo $v_featured_listing_t['city_name']; ?></span></li> 
                        </ul>
                    </div>
                  </figure>
                </a> 
            </div> 
          <!-- /item -->
        <?php } ?>
        </div> 
    <?php } ?>  
    
    <?php if(count($featured_listing_hobbies) > 0) { ?> 
        <div class="main_title_3">
          <span></span>
          <h2>Hobbies</h2> 
          <a href="search/hobbies">See all</a>
        </div>
        <div class="row ">
          <?php foreach ($featured_listing_hobbies as $v_featured_listing_t) { ?>
          <div class="col-lg-3 col-sm-6">
            <a href="<?php echo base_url('teachers_listing/teacher_details/' . $v_featured_listing_t['listing_id'] . '.html'); ?>" class="grid_item small">
              <figure>
                <img src="<?php
                $company_logo = '';
                if (!empty($v_featured_listing_t['company_logo'])) {
                    $company_logo = "assets/uploaded_files/company_logo/" . $v_featured_listing_t['company_logo'];
                } else {
                    $company_logo = "assets/uploaded_files/company_logo/logo_not_available.png";
                } echo base_url($company_logo);
                ?>" alt="">
                <div class="info">
                    <small><?php echo $v_featured_listing_t['category_name']; ?></small>
                    <h3><?php echo character_limiter($v_featured_listing_t['company_name'], 25); ?></h3>
                    <ul>
                      <li><span class="loc_open"><?php echo $v_featured_listing_t['city_name']; ?></span></li> 
                    </ul>
                </div>
              </figure>
            </a>
          </div>
        <?php } ?>
        </div> 
    <?php } ?>  
    
    <!-- /carousel -->
    <!--<div class="container">
      <div class="btn_home_align"><a href="teachers_listing.html" class="btn_1 rounded">View all</a></div>
    </div>-->
    <!-- /container -->
  </div>
  <!-- /container -->



  <!--<div class="container-fluid margin_80_55" style="padding-top:0px!important;">
    <div class="main_title_2">
      <span><em></em></span>
      <h2>Popular Institutes</h2>
      <p>The most popular Institutes having most experianced faculties and outstanding success rate.</p>
    </div>
    <div id="reccomended2" class="owl-carousel owl-theme">
      <?php foreach ($featured_listing as $v_featured_listing) { ?> 
      <div class="item" style="padding: 20px;">
        <div class="strip grid">
          <figure>
            <a href="<?php echo base_url('institutes_listing/listing_details/' . $v_featured_listing['listing_id'] . '.html'); ?>" class="wish_bt"></a>
            <a href="<?php echo base_url('institutes_listing/listing_details/' . $v_featured_listing['listing_id'] . '.html'); ?>"><img src="<?php
            $company_logo = '';
            if (!empty($v_featured_listing['company_logo'])) {
                $company_logo = "assets/uploaded_files/company_logo/" . $v_featured_listing['company_logo'];
            } else {
                $company_logo = "assets/uploaded_files/company_logo/logo_not_available.png";
            } echo base_url($company_logo);
            ?>" class="img-fluid" alt="" width="400" height="266"><div class="read_more"><span>Read more</span></div></a>
            <small><?php echo character_limiter($v_featured_listing['category_name'], 24); ?></small>
          </figure>
          <div class="wrapper">
            <h3><a href="<?php echo base_url('institutes_listing/listing_details/' . $v_featured_listing['listing_id'] . '.html'); ?>"><?php echo character_limiter($v_featured_listing['company_name'], 15); ?></a></h3>
            <p><?php echo character_limiter($v_featured_listing['about_company'], 80); ?></p>
            <a class="address" href="#"></a>
          </div>
          <ul>
            <li><span class="loc_open"><?php echo character_limiter($v_featured_listing['city_name'], 24); ?></span></li>
            <li><div class="score"><span>Good<em><?php echo $v_featured_listing['total_views']; ?> Searches</em></span><strong>Quality Index : <?php echo $v_featured_listing['total_views']/100; ?></strong></div></li>
          </ul>
        </div>
      </div> 
      <?php } ?> 
    </div> 
    <div class="container">
      <div class="btn_home_align"><a href="<?php echo base_url();?>institutes_listing.html" class="btn_1 rounded">View all</a></div>
    </div> 
  </div>-->

  <div class="call_section image_bg">
    <div class="wrapper">
      <div class="container margin_80_55">
        <div class="main_title_2">
          <span><em></em></span>
          <h2>How it Works</h2>
          <p>Worried about finding the right institute to fulfill your dreams ? no worries we have everything for you.</p>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="box_how wow">
              <i class="pe-7s-search"></i>
              <h3>Search Locations</h3>
              <p>whatever city you are residing , we support almost all cities of India for Institutes.</p>
              <span></span>
            </div>
          </div>
          <div class="col-md-4">
            <div class="box_how">
              <i class="pe-7s-info"></i>
              <h3>Select Course/Exam</h3>
              <p>You can select any course/exam for which you're planning to prepare.</p>
              <span></span>
            </div>
          </div>
          <div class="col-md-4">
            <div class="box_how">
              <i class="pe-7s-like2"></i>
              <h3>Contact us </h3>
              <p>Once you find appropriate teacher/institute you're intrested just leave your contact details and we'll connect you to the institute.</p>
            </div>
          </div>
        </div>
        <!-- /row -->
        <p class="text-center add_top_30 wow bounceIn" data-wow-delay="0.5"><a href="user/registration/index/4.html" class="btn_1 rounded">Register Now</a></p>
      </div>
    </div>
    <!-- /wrapper -->
  </div>
  <!--/call_section-->
  
  <div class="container margin_80_55" id="online_doubts">
    <div class="main_title_2">
      <span><em></em></span>
      <h2>its Free ! Ask doubts with Tutor</h2>
      <p>Get free response from tutor within few minutes.</p><p><img src="img/rec.svg" alt="" width="20"> 1 Lakhs + Active students</p>
      <a href="Qa.html">See all</a>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="row">
            <div class="col-md-6">
                <article class="blog"> 
                    <div class="post_info">
                    <small>Ask a Question ??</small>
                    <form action="Home/ask_q" method="post">
                    <input type="text" name="name" placeholder="Your Name.." required>
                    <input type="text" name="city" placeholder="Your City.." required>
                    <input type="text" name="mobile" placeholder="Your Mobile.." required><hr>
                    <input type="text" name="email" placeholder="Your Email.." required>
                    <input type="text" name="class" placeholder="Your Class/Course.." required>
                    <input type="text" name="subject" placeholder="Your Subject.." required><hr>
                    <textarea name="question" rows="3" cols="65" placeholder="Your Question here ..." required></textarea>
                    <input type="submit" name="" class="btn_add" value="Ask Now"> 
                    </form>
                    </div>
                </article> 
            </div>
            <?php foreach ($qa as $qa) {?> 
                <div class="col-md-6">
                    <article class="blog"> 
                      <div class="post_info">
                        <small>A User from <?php echo $qa['city'];?> asked ..</small>
                        <h2><a href="#"><?php echo $qa['question']; ?></a></h2>
                        <ul>
                          <li>
                            <div class="thumb"><img src="img/avatar.jpg" alt=""></div> <?php if(!empty($qa['first_name'])){echo $qa['first_name'].' '.$qa['last_name'].' Answered :';}else{echo 'Not Answered Yet !!!';} ?>  <p><?php echo $qa['content']; ?></p>
                          </li>
                          <li><i class="ti-comment"></i></li>
                        </ul>
                      </div>
                    </article> 
                </div>
            <?php } ?>

        </div>
      </div>
    </div>
  </div>
</main>
<!-- /main -->
