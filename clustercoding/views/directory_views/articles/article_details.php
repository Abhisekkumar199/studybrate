<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$cities_info = cities_info();
$categories_info = categories_info();
?>
<style media="screen">
div#results .col-lg-9.col-md-8.col-2 {
    margin: 0 auto;
}
div#results .col-lg-3.col-md-4.col-10 {
    display: none;
}
doctor-card {
max-width: 700px;
background: #fff;
border-radius: 2px;
margin: auto;
position: relative;
box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
position: relative;
}
.doctor-card .info {
padding: 15px;
display: grid;
grid-template-columns: 350px auto;
}
.doctor-card .info .avatar {
overflow: hidden;
height: 72px;
width: 72px;
border-radius: 3px;
margin-top: 5px;
}
.doctor-card .info .avatar img {
width: 100%;
border-radius: 3px;
overflow: hidden;
}
.doctor-card .info .details {
align-self: center;
padding: 10px 0;
}
.doctor-card .info .details .name {
font-size: 18px;
line-height: 1;
padding: 2px 0;
font-weight: 400;
}
.doctor-card .info .details .meta-info {
padding: 2px 0;
color: #787878;
line-height: 16px;
font-weight: 400;
}
.doctor-card .info .details .meta-info .prac-area:not(:empty)::before,
.doctor-card .info .details .meta-info .exp-yr:not(:empty)::before {
content: "|";
padding: 10px;
}
@media (max-width: 575px) {
.doctor-card .info {
  grid-template-columns: 1fr;
  justify-items: center;
}
.doctor-card .info .details {
  text-align: center;
}
.doctor-card .info .details .meta-info {
  padding: 5px;
}
.doctor-card .info .details .meta-info .exp-yr {
  display: block;
}
.doctor-card .info .details .meta-info .exp-yr:not(:empty) {
  margin-top: 5px;
}
.doctor-card .info .details .meta-info .exp-yr:not(:empty)::before {
  content: none;
}
}
.doctor-card .actions {
margin: 0 ;
display: table;
width: calc(100% - 30px);
border-collapse: collapse;
border-radius: 3px;
border-style: hidden;
box-shadow: 0 0 0 1px #f6f7f8;
}
.doctor-card .actions > div {
text-align: center;
padding: 0;
display: table-cell;
border: 1px solid #f2f2f2;
vertical-align: middle;
height: 64px;
}
.doctor-card .actions .ratings {
width: 24%;
}
.doctor-card .actions .ratings .rating-control {
display: block;
}
.doctor-card .actions .ratings .rating-control .fa {
font-size: 18px;
color: #ffdc40;
}
.doctor-card .actions .ratings .rating-count {
font-size: 12px;
text-transform: uppercase;
color: #898989;
}
.doctor-card .actions .comments {
width: 23%;
}
.doctor-card .actions .comments .comment-count {
font-size: 12px;
text-transform: uppercase;
color: #898989;
}
.doctor-card .actions .comments .comment-count strong {
display: block;
color: #f0151f;
font-size: 18px;
font-weight: 400;
line-height: 20px;
}
.doctor-card .actions .consultation {
width: 23%;
}
.doctor-card .actions .consultation .fee {
font-size: 12px;
text-transform: uppercase;
color: #898989;
}
.doctor-card .actions .consultation .fee strong {
display: block;
color: #f0151f;
font-size: 18px;
font-weight: 400;
line-height: 20px;
}
.doctor-card .actions .appo {
width: 30%;
}
.doctor-card .actions .appo .btn {
background: #f0151f;
display: block;
text-decoration: none;
color: #fff;
text-transform: uppercase;
padding: 8px;
margin: 0 5px;
}
@media (max-width: 575px) {
.doctor-card .actions > div {
  display: block;
  padding: 10px;
  height: auto;
}
.doctor-card .actions > div.comments, .doctor-card .actions > div.consultation {
  width: 50%;
  display: inline-block;
}
.doctor-card .actions > div.ratings, .doctor-card .actions > div.appo {
  width: 100%;
}
}
.doctor-card .locations {
padding: 15px 15px 20px;
border-top: 1px solid #f6f7f8;
border-radius: 0 0 2px 2px;
line-height: 1;
font-size: 12px;
color: #898989;
font-weight: 400;
text-transform: capitalize;
}
@media (max-width: 575px) {
.doctor-card .locations {
  text-align: center;
}
}
.doctor-card.hoverable:hover {
box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
}
.doctor-card.certified::after {
content: '';
background: url("//via.placeholder.com/100") no-repeat;
background-size: contain;
height: 30px;
width: 30px;
position: absolute;
top: 10px;
right: 10px;
border-radius: 50%;
}
@media (max-width: 575px) {
.doctor-card {
  padding: 10px;
}
}
.doctor-card + .doctor-card {
margin-top: 1rem;
}

</style>
<div class="container margin_60_35">
  <div class="row">
    <div class="col-lg-9">
      <div class="singlepost">
        <h5 class="mb30"><?php echo $article_info['article_name'];  ?></h5>
        <div class="postmeta">

            <div class="row">
              <div class="col-3"> 
                <img src="<?php 
                    if (!empty($article_info['company_logo'])) 
                    {
                    $company_logo = "assets/uploaded_files/company_logo/" . $article_info['company_logo'];
                    } 
                    else 
                    {
                    $company_logo = "assets/uploaded_files/company_logo/logo_not_available.png";
                    }
                    echo base_url($company_logo);?>" alt="doc name" width="100%">
              </div>
              <div class="col-9">
                  <div class="doctor-card">
                <ul>
                  <li><a href="#"><h6>Written & Reviewed by :</h6></a></li><br>

                <li><a href="#"><i class="ti-user"></i><a> <?php echo $article_info['company_name']; ?></a></li><br>
                <li><a href="#"><i class="ti-book"></i><a> <?php echo $article_info['subjects']; ?></a></li><br>
                <li><a href="#"><i class="ti-folder"></i><a> <?php echo $article_info['experiance'].' of Exp.'; ?></a></li><br>
                <li><a href="#"><i class="ti-location-pin"></i><a>  <?php echo $article_info['address']; ?></a></li><br>
                <li><a href="#"><i class="ti-calendar"></i> <?php echo date("d F Y - h:ia", strtotime($article_info['date_added'])); ?></a></li>
                <li><a href="#"><i class="ti-user"></i> <?php echo $article_info['total_views']; ?> &nbsp; Total views</a></li>

              </ul>
                <div class="actions p0"> 
                    <div class="appo">
                        <a href="tel: <?php echo $article_info['mobile'];  ?>" class="btn">Call Now</a>
                    </div>
                    <div class="appo">
                        <a href="mailto: <?php echo $article_info['email'];  ?>" class="btn">Send Message</a>
                    </div>
                </div> </div>
              </div>
            </div>

        </div>
        <!-- /post meta -->

        <figure style="margin: 0px -30px 30px -30px;">
            <img alt="" class="img-fluid" src="<?php echo base_url('assets/uploaded_files/company_articles/' . $article_info['image_path']); ?>" style="width: 100%;">
            <br>
            <span><small>powered by studybrate</small> </span>
        </figure>
        <div class="post-content">
          <div class="dropcaps">
            <p style="text-align: justify;"><?php echo nl2br($article_info['article_details']); ?></p>
          </div>
          <div class="clearfix" style="margin-bottom:20px;"></div>
          <div class="dropcaps">
            <div class="row">
                <script src="//platform-api.sharethis.com/js/sharethis.js#property=5b5af79bf5aa6d001130d0db&amp;product=inline-share-buttons" type="text/javascript"></script>
                <div class="sharethis-inline-share-buttons col-xs-9 col-sm-4 text-left st-inline-share-buttons st-animated mb30" id="st-1"><div class="st-btn st-first" data-network="facebook" style="display: inline-block;">
                  <img src="https://platform-cdn.sharethis.com/img/facebook.svg">
                  
                </div><div class="st-btn" data-network="twitter" style="display: inline-block;">
                  <img src="https://platform-cdn.sharethis.com/img/twitter.svg">
                  
                </div><div class="st-btn" data-network="pinterest" style="display: inline-block;">
                  <img src="https://platform-cdn.sharethis.com/img/pinterest.svg">
                  
                </div><div class="st-btn st-last" data-network="whatsapp" style="display: inline-block;">
                  <img src="https://platform-cdn.sharethis.com/img/whatsapp.svg">
                  
                </div></div>
                 

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
