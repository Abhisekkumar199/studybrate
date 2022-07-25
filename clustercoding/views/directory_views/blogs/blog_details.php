<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$cities_info = cities_info();
$categories_info = categories_info();
?>
<div class="container margin_60_35">
  <div class="row">
    <div class="col-lg-9">
      <div class="singlepost">
       <h5 class="mb30"><?php echo $blog['blog_name']; ?></h5>
        <div class="postmeta">

            <div class="row">
              <div class="col-3">
                <img src="<?php 
                    if (!empty($blog['company_logo'])) 
                    {
                    $company_logo = "assets/uploaded_files/company_logo/" . $blog['company_logo'];
                    } 
                    else 
                    {
                    $company_logo = "assets/uploaded_files/company_logo/logo_not_available.png";
                    }
                    echo base_url($company_logo);?>" alt="doc name" width="100%">
              </div>
              <div class="col-9">
                <ul>
                  <li><a href="#"><h6>Written & Reviewed by :</h6></a></li><br>

                <li><a href="#"><i class="ti-folder"></i><a> <?php echo $blog['company_name']; ?></a></li><br>
                <li><a href="#"><i class="ti-folder"></i><a> <?php echo $blog['education']; ?></a></li><br>
                <li><a href="#"><i class="ti-folder"></i><a> <?php echo $blog['subjects']; ?> , <?php echo $blog['address'].' , ('.$blog['experiance'].') Years of Exp'; ?></a></li><br>
                <li><a href="#"><i class="ti-calendar"></i> <?php echo date("d F Y - h:ia", strtotime($blog['date_added'])); ?></a></li>
                <li><a href="#"><i class="ti-user"></i> <?php echo $blog['total_views']; ?> &nbsp; Total views</a></li>

              </ul>
              </div>
            </div>

        </div>
        <!-- /post meta -->

        <figure style="margin: 0px -30px 30px -30px;"><img alt="" class="img-fluid" src="<?php echo base_url('assets/uploaded_files/company_blogs/' . $blog['image_path']); ?>"></figure>
        <div class="post-content">
          <div class="dropcaps">
            <p style="text-align: justify;"><?php echo $blog['blog_details']; ?></p>
          </div>
          <div class="clearfix" style="margin-bottom:20px;"></div>
          <div class="dropcaps">
            <div class="row">
                <ul class="share-buttons">
                  <li><a class="fb-share" href="#0"><i class="social_facebook"></i> Share</a></li>
                  <li><a class="twitter-share" href="#0"><i class="social_twitter"></i> Tweet</a></li>
                  <li><a class="gplus-share" href="#0"><i class="social_googleplus"></i> Share</a></li>
                </ul> 
            </div>
          </div>
        </div>
        <!-- /post -->
      </div>
      <!-- /single-post -->



      <hr>





    </div>
    <!-- /col -->

    <aside class="col-lg-3" id="sidebar">
      <div id="filters_col">
        <a data-toggle="collapse" href="#collapseFilters" aria-expanded="false" aria-controls="collapseFilters" id="filters_col_bt">Filters </a>
        <div class="collapse show" id="collapseFilters">
          <div class="filter_type">
            <h6>Category</h6>
            <ul>
                <?php
                foreach ($categories_info as $v_category_info) {
                    echo "<li><label class='container_check'><a  href='" . base_url('institutes_listing/category_listing/' . $v_category_info['category_id'] . '.html') . "'><i class='fa fa-".$v_category_info['icon_name']." ".$v_category_info['color_name']." white'></i>" . $v_category_info['category_name'] . "<span class='checkmark'></span></a></label></li>";
                }
                ?>
            </ul>
          </div>

          <div class="filter_type">
            <h6>Cities</h6>
            <ul>
                <?php
                foreach ($cities_info as $v_city_info) {
                    echo "<li><a class='nohover' href='" . base_url('institutes_listing/location_listing/' . $v_city_info['city_id'] . '.html') . "'><i class='fa fa-map-marker blue-1'></i>" . $v_city_info['city_name'] . "</a></li>";
                }
                ?>
            </ul>
          </div>
        </div>
        <!--/collapse -->
      </div>
      <!--/filters col-->
    </aside>
    <!-- /aside -->
  </div>
  <!-- /row -->
</div>
