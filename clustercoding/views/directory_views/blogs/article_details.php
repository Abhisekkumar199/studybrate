<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$cities_info = cities_info();
$categories_info = categories_info();
?>
<div class="container margin_60_35">
  <div class="row">
    <div class="col-lg-9">
      <div class="singlepost">
        <figure><img alt="" class="img-fluid" src="<?php echo base_url('assets/uploaded_files/company_articles/' . $article_info['image_path']); ?>"></figure>
        <h1><?php echo $article_info['article_name']; ?></h1>
        <div class="postmeta">
          <ul>
            <li><a href="#"><i class="ti-folder"></i> Posted by: <a><?php echo $article_info['company_name']; ?></a></li>
            <li><a href="#"><i class="ti-calendar"></i> <?php echo date("d F Y - h:ia", strtotime($article_info['date_added'])); ?></a></li>
            <li><a href="#"><i class="ti-user"></i> <?php echo $article_info['total_views']; ?> &nbsp; Total views</a></li>

          </ul>
        </div>
        <!-- /post meta -->
        <div class="post-content">
          <div class="dropcaps">
            <p style="text-align: justify;"><?php echo $article_info['article_details']; ?></p>
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
