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
        
        <form method="post" action="<?php echo base_url(); ?>tutors">
            <input type="hidden" name="parent_cat_id" value="<?php echo $current_category; ?>" />
        <div class="collapse show" id="collapseFilters">
          <div class="filter_type">
            <h6>Category </h6> 
            <ul>
                <?php
                foreach ($child_categories as $v_category_info) 
                {
                    if (in_array($v_category_info['category_id'], $catids))
                    {
                        $ischecked =  "checked";
                    }
                    else
                    {
                        $ischecked  = '';
                    }
                    echo "<li><input type='checkbox' class=' ' name='category[]' ".$ischecked."  value='".$v_category_info['category_id']."' onChange='this.form.submit();' />&nbsp;" . $v_category_info['category_name'] . " </li>";
                }
                ?>
            </ul>
          </div>

          <div class="filter_type">
            <h6>Cities</h6>
            <ul>
                <?php
                foreach ($cities_info as $v_city_info) 
                {
                    if (in_array($v_city_info['city_id'], $cityids))
                    {
                        $ischecked1 =  "checked";
                    }
                    else
                    {
                        $ischecked1  = '';
                    }
                    echo "<li><input type='checkbox' class=' ' name='city[]' ".$ischecked1." value='".$v_city_info['city_id']."' onChange='this.form.submit();' />&nbsp;" . $v_city_info['city_name'] . "</li>";
                }
                ?>
            </ul>
          </div>
        </div>
        </form>
        <!--/collapse -->
      </div>
      <!--/filters col-->
    </aside>
    <!-- /aside -->

    <div class="col-lg-9">
      <div class="row">
        <?php if (!empty($search_result)) { ?>
            <?php foreach ($search_result as $v_listing_info) { ?>
        <div class="col-md-6">
          <div class="strip grid">
            <figure>
              <a href="<?php if($v_listing_info['type']==0){echo base_url('teachers_listing/teacher_details/' . $v_listing_info['listing-id'] . '.html');}else {
                echo base_url('institutes_listing/listing_details/' . $v_listing_info['listing-id'] . '.html');
              }?>" class="wish_bt"></a>
              <a href="<?php if($v_listing_info['type']==0){echo base_url('teachers_listing/teacher_details/' . $v_listing_info['listing-id'] . '.html');}else {
                echo base_url('institutes_listing/listing_details/' . $v_listing_info['listing-id'] . '.html');
              }?>"><img src="<?php
              $company_logo = '';
              if (!empty($v_listing_info['company_logo'])) {
                  $company_logo = "assets/uploaded_files/company_logo/" . $v_listing_info['company_logo'];
              } else {
                  $company_logo = "assets/uploaded_files/company_logo/logo_not_available.png";
              } echo base_url($company_logo);
              ?>" class="img-fluid" alt="" width="400" height="266"><div class="read_more"><span>Read more</span></div></a>
              <small><?php echo $v_listing_info['category_name']; ?></small>
            </figure>
            <div class="wrapper">
              <h3><a href=" <?php if($v_listing_info['type']==0){echo base_url('teachers_listing/teacher_details/' . $v_listing_info['listing-id'] . '.html');}else {
                echo base_url('institutes_listing/listing_details/' . $v_listing_info['listing-id'] . '.html');
              }?>"><?php echo $v_listing_info['company_name']; ?></a></h3>
              <p><?php echo substr($v_listing_info['about_company'], 0, 180); ?>...</p>
              <a class="address" href="#"></a>
            </div>
            <ul>
              <li><span class="loc_open"><?php echo $v_listing_info['city_name']; ?></span></li>
              <li><div class="score"><?php echo $v_listing_info['totalreview']; ?> Reviews &nbsp;&nbsp;</em></span><strong><?php echo number_format($v_listing_info['averagerating']); ?> <i class="icon_star"></i></strong></div></li>
            </ul>
          </div>
        </div>
        <!-- /strip grid -->
      <?php } } else { ?>
          <div class="item col-md-12 col-sm-12 col-xs-12"><!-- .ITEM -->
              <h5 style="text-align: center; ">No result found !</h5>
          </div>
      <?php } ?>
        <!-- /strip grid -->
      </div>
      <!-- /row -->

      <p class="text-center"><a href="#0" class="btn_1 rounded add_top_30">Load more</a></p>
    </div>
    <!-- /col -->
  </div>
</div>
<!-- /container -->
