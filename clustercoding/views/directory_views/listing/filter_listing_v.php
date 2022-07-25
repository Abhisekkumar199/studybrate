<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$cities_info = cities_info();
//$categories_info = categories_info();
?>
<div class="container margin_60_35">
  <div class="row">
    <aside class="col-lg-3" id="sidebar">
      <div id="filters_col">
        <a data-toggle="collapse" href="#collapseFilters" aria-expanded="false" aria-controls="collapseFilters" id="filters_col_bt">Filters </a>
        <div class="collapse show" id="collapseFilters">
          <div class="filter_type">
            <h6>Category</h6>
            <ul>
                <?php
                foreach ($child_categories as $v_category_info) {
                    echo "<li><label class='container_check'><a  href='" . base_url('teachers_listing/category_listing/' . $v_category_info['category_id']."-".$current_category . '.html') . "'><i class='fa fa-".$v_category_info['icon_name']." ".$v_category_info['color_name']." white'></i>" . $v_category_info['category_name'] . "<span class='checkmark'></span></a></label></li>";
                }
                ?>
            </ul>
          </div>

          <div class="filter_type">
            <h6>Cities</h6>
            <ul>
                <?php
                foreach ($cities_info as $v_city_info) {
                    echo "<li><a class='nohover' href='" . base_url('teachers_listing/location_listing/' . $v_city_info['city_id']."-".$current_category . '.html') . "'><i class='fa fa-map-marker blue-1'></i>" . $v_city_info['city_name'] . "</a></li>";
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

    <div class="col-lg-9">
      <div class="row"  id="load_data">
        <?php if (!empty($all_listing)) { ?>
            <?php foreach ($all_listing as $v_listing_info) { ?>
        <div class="col-md-6">
          <div class="strip grid">
            <figure>
              <a href="<?php echo base_url('teachers_listing/teacher_details/' . $v_listing_info['listing_id'] . '.html'); ?>" class="wish_bt"></a>
              <a href="<?php echo base_url('teachers_listing/teacher_details/' . $v_listing_info['listing_id'] . '.html'); ?>"><img src="<?php
              $company_logo = '';
              if (!empty($v_listing_info['company_logo'])) {
                  $company_logo = "assets/uploaded_files/company_logo/" . $v_listing_info['company_logo'];
              } else {
                  $company_logo = "assets/uploaded_files/company_logo/logo_not_available.png";
              } echo base_url($company_logo);
              ?>" class="img-fluid" alt="" width="400" height="266"><div class="read_more"><span>Read more</span></div></a>
              <small><?php echo $v_listing_info['category_name']; ?></small>
            </figure>
            <div class="wrapper" style="min-height: 184px;">
              <h3><a href="<?php echo base_url('teachers_listing/teacher_details/' . $v_listing_info['listing_id'] . '.html'); ?>"><?php echo $v_listing_info['company_name']; ?></a></h3>
              
              <p><?php echo substr($v_listing_info['about_company'], 0, 160); ?>...</p>
              <a class="address" href=""></a>
            </div>
            <ul>
              <li><span class="loc_open"><?php echo $v_listing_info['city_name']; ?></span></li>
              <li><div class="score"><span>Superb<em><?php echo $v_listing_info['totalreview']; ?> Reviews</em></span><strong><?php echo number_format($v_listing_info['averagerating']); ?></strong></div></li>
            </ul>
          </div>
        </div>
          <?php $listing_id = $v_listing_info['listing_id']; ?>
        <!-- /strip grid -->
      <?php } } else { ?>
          <div class="item col-md-12 col-sm-12 col-xs-12"><!-- .ITEM -->
              <h5 style="text-align: center; ">No result found !</h5>
          </div>
      <?php } ?>
        <!-- /strip grid -->
      </div>
      <!-- /row -->

      <div id="remove_row">
          <center>
              <button type="button" name="btn_more" data-id="<?php if(isset($listing_id)){ echo $listing_id; } ?>" data-cid="" data-link="teachers_listing/load_more_listing" id="btn_more" class="btn btn-sm bgbrown-1">Load more...</button>
          </center>
      </div>
    </div>
    <!-- /col -->
  </div>
</div>
<!-- /container -->
