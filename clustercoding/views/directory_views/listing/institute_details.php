
<div class="hero_in hotels_detail" >
  <div class="wrapper" style="background: url(<?php
  $company_logo = '';
  if (!empty($listing_info['company_logo'])) {
      $company_logo = "assets/uploaded_files/company_logo/resize/" . $listing_info['company_logo'];
  } else {
      $company_logo = "assets/uploaded_files/company_logo/logo_not_available.png";
  }
  echo base_url($company_logo);?>) center center no-repeat;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;">

  </div>
</div>
<!--/hero_in-->

<nav class="secondary_nav sticky_horizontal_2">
  <div class="container">
    <ul class="clearfix">
      <li><a href="#description" class="active">Description</a></li>
      <li><a href="#Questions">Articles</a></li>
      <li><a href="#Courses">Courses</a></li>
      <li><a href="#AskQuestion">Ask a Questions</a></li>
        <li><a href="">Fees</a></li>
    </ul>
  </div>
</nav>

<div class="container margin_60_35">
    <div class="row">
      <div class="col-lg-8">
        <section id="description">
          <div class="detail_title_1">
            <div class="cat_star"><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i></div>
            <h1><?php echo $listing_info['company_name']; ?></h1>
            <a class="address" href="#"><?php echo $listing_info['city_name']; ?></a>
          </div>
          <p><?php echo $listing_info['about_company']; ?></p>



          <!-- End Map -->
        </section>
        <!-- /section -->

        <section id="Questions">
          <h2>Recent Articles Published by <?php echo $listing_info['company_name']; ?></h2>
          <div class="Questions-container add_bottom_30">
            <div class="row">


            </div>
            <!-- /row -->
          </div>

          <div class="Questions-container">

            <?php foreach ($recent_articles as $v_recent_article) { ?>
                <div class="Question-box clearfix">
                  <figure class="rev-thumb"><img src="<?php echo base_url('assets/uploaded_files/company_articles/' . $v_recent_article['image_path']); ?>" alt="" width="150">
                  </figure>
                  <div class="rev-content">
                    <div class="rating"><?php echo $v_recent_article['total_views'];?>
                      <i class="icon-star voted"></i>
                    </div>
                    <div class="rev-info">
                      <?php echo date("d F Y h:ia", strtotime($v_recent_article['date_added'])); ?>
                    </div>
                    <div class="rev-text">
                    <a href="<?php echo base_url('articles/article_details/' . $v_recent_article['article_id'] . '.html'); ?>">  <h5><?php echo $character = character_limiter($v_recent_article['article_name'], 55); ?></h5></a>
                    </div>
                  </div>

                </div>
            <?php } ?>
          </div>

          <!-- /Question-container -->
        </section>
        <hr>
        <!-- /section -->
        <section id="Courses">
          <h2>Courses offered by <?php echo $listing_info['company_name']; ?></h2>
          <div class="Questions-container add_bottom_30">
            <div class="row">
              <div class="container margin_60_35">
                <div class="box_booking">
                <?php foreach ($recent_courses as $v_courses) { ?>


                      <div class="strip_booking">
                        <div class="row">
                          <div class="col-lg-10 col-md-5">
                            <h3 class="hotel_booking"><?php echo $v_courses['service_name'];?></h3>
                          </div>
                          <div class="col-lg-2 col-md-2">
                            <div class="booking_buttons">
                              <a href="#0" class="btn_2">Views</a>
                            </div>
                          </div>
                        </div>
                        <!-- /row -->
                      </div>

                <?php } ?>
              </div>
            </div>
          </div>
        </div>
        </section>

        <hr>
        <section id="AskQuestion">

          <div class="add-Question">
            <h2>Leave a Question</h2>
            <form>
              <div class="row">
                <div class="form-group col-md-6">
                  <label>Name and Lastname *</label>
                  <input type="text" name="name_Question" id="name_Question" placeholder="" class="form-control">
                </div>
                <div class="form-group col-md-6">
                  <label>Email *</label>
                  <input type="email" name="email_Question" id="email_Question" class="form-control">
                </div>

                <div class="form-group col-md-12">
                  <label>Your Question</label>
                  <textarea name="Question_text" id="Question_text" class="form-control" style="height:130px;"></textarea>
                </div>
                <div class="form-group col-md-12 add_top_20 add_bottom_30">
                  <input type="submit" value="Ask Now" class="btn_1" id="submit-Question">
                </div>
              </div>
            </form>
          </div>
        </section>
      </div>
      <!-- /col -->

      <aside class="col-lg-4" id="sidebar">
        <div class="box_detail booking">
          <div class="price">
            <span>Request Admission</span>
          </div>

          <div class="form-group" id="input-dates">
            <input class="form-control" type="text" name="dates" placeholder="Your Name">
          </div>
          <div class="form-group" id="input-dates">
            <input class="form-control" type="text" name="dates" placeholder="Your Email">
          </div>
          <div class="form-group" id="input-dates">
            <input class="form-control" type="text" name="dates" placeholder="Your Phone">
          </div>
          <div class="form-group" id="input-dates">
            <textarea class="form-control" type="text" name="dates" placeholder="Your Course Requirements ..."></textarea>
          </div>


          <a href="#" class=" add_top_30 btn_1 full-width purchase">Enquire Now</a>
          <div class="text-center"><small>Once Filled our counselling team will get in touch with you.</small></div>
        </div>
        <ul class="share-buttons">
          <li><a class="fb-share" href="#0"><i class="social_facebook"></i> Share</a></li>
          <li><a class="twitter-share" href="#0"><i class="social_twitter"></i> Tweet</a></li>
          <li><a class="gplus-share" href="#0"><i class="social_googleplus"></i> Share</a></li>
        </ul>
      </aside>
    </div>
    <!-- /row -->
</div>
<!-- /container -->
