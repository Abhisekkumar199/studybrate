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
margin: 0 15px 15px;
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
padding: 15px;
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
.zoom {      
-webkit-transition: all 0.35s ease-in-out;    
-moz-transition: all 0.35s ease-in-out;    
transition: all 0.35s ease-in-out;     
cursor: -webkit-zoom-in;      
cursor: -moz-zoom-in;      
cursor: zoom-in;  
}     

.zoom:hover,  
.zoom:active,   
.zoom:focus {
/**adjust scale to desired size, 
add browser prefixes**/
-ms-transform: scale(3.5);    
-moz-transform: scale(3.5);  
-webkit-transform: scale(3.5);  
-o-transform: scale(3.5);  
transform: scale(3.5);    
position:relative;      
z-index:100;  
}

/**To keep upscaled images visible on mobile, 
increase left & right margins a bit**/  
@media only screen and (max-width: 768px) {   
ul.gallery {      
margin-left: 15vw;       
margin-right: 15vw;
}

/**TIP: Easy escape for touch screens,
give gallery's parent container a cursor: pointer.**/
.DivName {cursor: pointer}
}
.rev-thumb img{
  height: 110px;
width: 150px;  
}
.rev-text h6{
    color: #f0151f;
}
.hotel_booking{
        width: 137px;
    background: #ef1f1f;
    color: #fff !important;
    padding: 4px;
    border-radius: 3px
}
.Courses {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  display: inline-block;
 
}

.Courses-1 {
  float: left;
}

.Courses-1 a {
  display: block;
  color: #000;
  text-align: center;
  padding: 5px 10px;
  text-decoration: none;
}
</style>
<!--/hero_in-->


<div class="container margin_60_35">
    <div class="row">
      <div class="col-lg-8"> 
        <div class="row mb30">
            <div class=" bg-white p20 full-width">
                <div class="col-lg-4 pl0-pr0">
                    <img src="<?php $company_logo = '';
                    if (!empty($listing_info['company_logo'])) 
                    {
                    $company_logo = "assets/uploaded_files/company_logo/" . $listing_info['company_logo'];
                    } 
                    else 
                    {
                    $company_logo = "assets/uploaded_files/company_logo/logo_not_available.png";
                    }
                    echo base_url($company_logo);?>" alt="doc name" width="100%">
                                    <br>
                    <?php echo $listing_info['package']; ?>
                </div>
                <div class="col-lg-8">
                    <div class="doctor-card">
                        <div class="info"> 
                            <div class="details">
                                <div class="name">
                                    <?php echo $listing_info['company_name']; if($listing_info['paid_status'] == 'Paid') { ?>
                                    <img src="https://studybrate.com/assets/tick.jpg" alt="doc name" style="width:17px;background-color:#ffffff;" >
                                    <?php } ?>
                                    
                                </div>
                                <div class="meta-info"> 
                                    <?php if($listing_info['title'] != '') {  ?><span class="sp"> <?php echo $listing_info['title']; ?></span><br><?php } ?> 
                                </div>
                                <div class="meta-info">  
                                  <?php if($listing_info['address'] != '') {  ?> <span class="sp"><?php echo $listing_info['address']; ?></span><br><?php } ?> 
                                </div>
                            </div>
                        </div>
                        <div class="actions p0"> 
                            <div class="appo">
                                <a href="tel: <?php echo $listing_info['mobile'];  ?>" class="btn">Call Now</a>
                            </div>
                            <div class="appo">
                                <a href="mailto: <?php echo $listing_info['email'];  ?>" class="btn">Send Message</a>
                            </div>
                        </div> 
                    </div>
                </div>
           </div>
        </div>
        <nav class="secondary_nav sticky_horizontal_2 mb30">
            <div class="container">
                <ul class="clearfix">
                    <li><a href="#description" class="active">Description</a></li>
                    <li><a href="#Questions">Articles</a></li>
                    <li><a href="#blogs">Blogs</a></li>
                    <li><a href="#notes">Notes</a></li>
                    <li><a href="#Courses">Courses</a></li>
                    <li><a href="#Gallary">Gallery</a></li>
                    <li><a href="#AskQuestion">Ask a Question</a></li>
                    <li><a href="#Review">Review</a></li> 
                    <li><a href="">Fees</a></li>
                </ul>
            </div>
        </nav>
        <section id="description" class=" bg-white p20"> 
           
            <div class="detail_title_1"> <h6><?php echo $listing_info['company_name'];  ?> </h6> 
            
            </div>
            <p><?php echo $listing_info['about_company']; ?></p> 
            <div class="profileContent clearfix">  
                <h6 >Languages Spoken</h6>  
                <p ><?php if($listing_info['mother_tongue'] != '')  { ?>Other Languages : <?php echo $listing_info['mother_tongue'];  ?><br><?php } ?>
                English : <?php if($listing_info['is_english'] == 'Yes') { echo $listing_info['is_english'];  } else { echo "No";} ?><br>
                Hindi : <?php if($listing_info['is_hindi'] == 'Yes') {  echo $listing_info['is_hindi']; } else { echo "No";} ?></p>  
            </div>
            <?php  if($listing_info['other_from'] != '' or $listing_info['twelve_from'] != '' or $listing_info['graduation_from'] != '' or $listing_info['post_graduation_from'] != '') { ?>
            <div class="profileContent clearfix">  
                <h6 >Education</h6>  
                <p><?php  if($listing_info['other_from'] != '') { ?> <strong>Other Education</strong>: <?php echo $listing_info['other_from'];  ?>,<?php echo $listing_info['other_board'];  ?> <?php echo $listing_info['other_year'];  ?> <br><?php } ?>
                <?php  if($listing_info['twelve_from'] != '') { ?> <strong>12th</strong>: <?php echo $listing_info['twelve_from'];  ?>,<?php echo $listing_info['twelve_board'];  ?> <?php echo $listing_info['twelve_year'];  ?> <br><?php } ?>
                <?php  if($listing_info['graduation_from'] != '') { ?> <strong>Graduation</strong>: <?php echo $listing_info['graduation_from'];  ?>,<?php echo $listing_info['graduation_collage'];  ?> <?php echo $listing_info['graduation_year'];  ?><br><?php } ?>
                <?php  if($listing_info['post_graduation_from'] != '') { ?> <strong>Post Graduation</strong>: <?php echo $listing_info['post_graduation_from'];  ?>,<?php echo $listing_info['post_graduation_collage'];  ?> <?php echo $listing_info['post_graduation_year'];  ?><?php } ?> </p> 
            </div> 
            <?php } ?>
          
            <?php if($listing_info['experiance'] != '')  { ?> 
                <div class="profileContent clearfix">  
                  <h6>Years of Experience</h6>  
                  <p ><?php echo $listing_info['experiance'];  ?><br>
                </div>  
            <?php } ?> 

            <div class="profileContent clearfix">  
                <h6>Class Location</h6>  
                <p >Student's Home : <?php  if($listing_info['class_location_student_home'] == 'Yes') { echo $listing_info['class_location_student_home']; } else { echo "No";}  ?><br>
                Tutor's Home : <?php  if($listing_info['class_location_tutor_home'] == 'Yes') { echo $listing_info['class_location_tutor_home']; } else { echo "No";} ?><br>
                Online  : <?php  if($listing_info['online'] == 'Yes') { echo $listing_info['online']; } else { echo "No";}  ?></p>  
            </div> 
            <div class="profileContent clearfix">  
                <h6 >Demo Class</h6>  <p >  <?php  if($listing_info['demo_class'] == 'Yes') {  echo $listing_info['demo_class']; } else { echo "No";}  ?> (<?php  if($listing_info['demo_class_is_paid'] == 'Yes') {  echo "Paid"; } else { echo "Free"; }  ?>) </p>  
            </div> 
            <div class="profileContent clearfix">  
                <h6 >Taught in school/college/institute</h6> 
                <p >  <?php  if($listing_info['taught_in_school'] == 'Yes') { echo $listing_info['taught_in_school']; } else { echo "No";}   ?> </p> 
                <?php  if($listing_info['taught_in_school_name'] != '') {  ?><p > <strong>School Name:</strong> <?php echo $listing_info['taught_in_school_name'];   ?> </p>  <?php } else { }  ?>
            </div>  
            <?php  if($listing_info['fee'] != '') { ?> 
                <div class="profileContent clearfix">  
                <h6>Fee</h6>  
                <p >  <span class="sp"><?php echo $listing_info['fee']; ?></span> </p>  
                </div>
            <?php } ?>  
            <?php  if($listing_info['student_age_group'] != '') { ?> 
                <div class="profileContent clearfix">  
                <h6>Student Age Group</h6>  
                <p >  <span class="sp"><?php echo $listing_info['student_age_group']; ?></span> </p>  
                </div>
            <?php } ?> 
            <?php  if($listing_info['gender'] != '') { ?> 
                <div class="profileContent clearfix">  
                <h6>Gender</h6>  
                <p >  <span class="sp"><?php echo $listing_info['gender']; ?></span> </p>  
                </div>
            <?php } ?>
            <?php  if($listing_info['proficiency_level'] != '') { ?> 
                <div class="profileContent clearfix">  
                <h6>Proficiency Level</h6>  
                <p >  <span class="sp"><?php echo $listing_info['proficiency_level']; ?></span> </p>  
                </div>
            <?php } ?>
            
            <?php  if($listing_info['address'] != '') { ?> 
                <div class="profileContent clearfix">  
                <h6>Address</h6>  
                <p >  <span class="sp"><?php echo $listing_info['address']; ?></span> </p>  
                </div>
            <?php } ?>
            
            <?php  if($listing_info['category_name'] != '') { ?> 
                <div class="profileContent clearfix">  
                <h6>Class</h6>  
                <p >  <span class="sp"><?php echo $listing_info['category_name']; ?></span> </p>  
                </div>
            <?php } ?>
            
            <?php  if($listing_info['boards'] != '') { ?> 
                <div class="profileContent clearfix">  
                <h6 >Boards</h6>  
                <p >  <span class="sp"><?php echo $listing_info['boards']; ?></span> </p>  
                </div>
            <?php } ?>
            
            <?php  if($listing_info['cbse_board_subject'] != '') { ?> 
                <div class="profileContent clearfix">  
                <h6>CBSE Board Subject</h6>  
                <p >  <span class="sp"><?php echo $listing_info['cbse_board_subject']; ?></span> </p>  
                </div>
            <?php } ?>
            
            <?php  if($listing_info['icsc_board_subject'] != '') { ?> 
                <div class="profileContent clearfix">  
                <h6>ICSE Board Subject</h6>  
                <p >  <span class="sp"><?php echo $listing_info['icsc_board_subject']; ?></span> </p>  
                </div>
            <?php } ?>
            
            <?php  if($listing_info['other_board_subject'] != '') { ?> 
                <div class="profileContent clearfix">  
                <h6>Other Board Subject</h6>  
                <p >  <span class="sp"><?php echo $listing_info['other_board_subject']; ?></span> </p>  
                </div>
            <?php } ?>
            <?php  if($listing_info['award'] != '') { ?> 
                <div class="profileContent clearfix">  
                <h6>Award & Recognization</h6>  
                <p >  <span class="sp"><?php echo $listing_info['award']; ?></span> </p>  
                </div>
            <?php } ?>
            
            <?php  if($listing_info['type_of_class'] != '') { ?> 
                <div class="profileContent clearfix">  
                <h6>Type of class</h6>  
                <p >  <span class="sp"><?php echo $listing_info['type_of_class']; ?></span> </p>  
                </div>
            <?php } ?>
            
            <?php  if($listing_info['website'] != '') { ?> 
                <div class="profileContent clearfix">  
                <h6>Website</h6>  
                <p >  <span class="sp"><?php echo $listing_info['website']; ?></span> </p>  
                </div>
            <?php } ?>
         
 
  




          <!-- End Map -->
        </section>
        <!-- /section -->

        <section id="Questions" class=" bg-white p20">
          <h6>Recent Articles Published by <?php echo $listing_info['company_name']; ?></h6>
          <div class="Questions-container add_bottom_30">
            <div class="row">


            </div>
            <!-- /row -->
          </div>

          <div class="Questions-container">
            <div class="row"> 
            <?php foreach ($recent_articles as $v_recent_article) { ?>
            <div class="col-sm-4">
                <div class="Question-box clearfix">
                  <figure class="rev-thumb"><img src="<?php echo base_url('assets/uploaded_files/company_articles/' . $v_recent_article['image_path']); ?>" alt="" width="150">
                  </figure>
                  <div class="rev-content"> 
                    <div class="rev-info">
                      <?php echo date("d F Y h:ia", strtotime($v_recent_article['date_added'])); ?>
                    </div>
                    <div class="rev-text">
                    <a href="<?php echo base_url('articles/article_details/' . $v_recent_article['article_id'] . '.html'); ?>">  <h6><?php echo $character = character_limiter($v_recent_article['article_name'], 15); ?></h6></a>
                    </div>
                  </div>
                    </div>
                </div>
            <?php } ?>
            <!-- /Question-box -->

            </div>
            <!-- /Question-box -->
          </div>
          <!-- /Question-container -->
        </section>
        <!-- /section -->
        <hr>
        <section id="blogs" class=" bg-white p20">
          <h6>Recent Blogs Published by <?php echo $listing_info['company_name']; ?></h6>
          <div class="Questions-container add_bottom_30">
            <div class="row"> 
            </div>
            <!-- /row -->
          </div>

          <div class="Questions-container">
        <div class="row"> 
            <?php foreach ($recent_blogs as $recent_blog) { ?>
            <div class="col-sm-4">
                <div class="Question-box clearfix">
                  <figure class="rev-thumb"><img src="<?php echo base_url('assets/uploaded_files/company_blogs/' . $recent_blog['image_path']); ?>" alt="" >
                  </figure>
                  <div class="rev-content"> 
                    <div class="rev-info">
                      <?php echo date("d F Y h:ia", strtotime($recent_blog['date_added'])); ?>
                    </div>
                    <div class="rev-text">
                    <a href="<?php echo base_url('blogs/blog_details/' . $recent_blog['blog_id'] . '.html'); ?>">  <h6><?php echo $character = character_limiter($recent_blog['blog_name'], 15); ?></h6></a>
                    </div>
                  </div>

                </div>
                </div>
            <?php } ?>
            <!-- /Question-box -->

            </div>
            <!-- /Question-box -->
          </div>
          <!-- /Question-container -->
        </section>
        
        <hr>
        <section id="notes" class=" bg-white p20">
          <h6>Recent Notes Published by <?php echo $listing_info['company_name']; ?></h6>
          <div class="Questions-container add_bottom_30">
            <div class="row"> 
            </div>
            <!-- /row -->
          </div>

          <div class="Questions-container">
            <div class="row"> 
            <?php foreach ($recent_notes as $recent_note) { ?>
            <div class="col-sm-4">
                <div class="Question-box clearfix">
                   <figure class="rev-thumb"><img src="https://studybrate.com/assets/logo/nots.png" >
                  </figure>
                  <div class="rev-content"> 
                    <div class="rev-info">
                      <?php echo date("d F Y h:ia", strtotime($recent_note['date_added'])); ?>
                    </div>
                    <div class="rev-text">
                    <a href="<?php echo base_url('notes/note_details/' . $recent_note['note_id'] . '.html'); ?>">  <h6><?php echo $character = character_limiter($recent_note['note_name'], 15); ?></h6></a>
                    </div>
                  </div>
                </div>
                </div>
            <?php } ?>
            <!-- /Question-box -->

            </div>
            <!-- /Question-box -->
          </div>
          <!-- /Question-container -->
        </section>
        <hr>
        <!-- /section -->
        <section id="Courses" class=" bg-white p20">
          <h6>Courses offered by <?php echo $listing_info['company_name']; ?></h6>
          <div class="Questions-container ">
            <div class="row">
              <div class="container">
                <div class="box_booking">
                <?php foreach ($recent_courses as $v_courses) { ?>


                      
                   
            
                <ul class="Courses">
                    
                    <li class="Courses-1"><a  class="hotel_booking"><?php echo $v_courses['service_name'];?></a></li>
                </ul>
            
               
                          
                         
                        
                        <!-- /row -->
                     

                <?php } ?>
              </div>
            </div>
          </div>
        </div>
        </section>
        <hr>
        <section id="Gallary" class=" bg-white p20"> 
            <h6>Gallery</h6>
            <div class="row"> 
            <?php foreach ($recent_galaries as $recent_galarie) { ?>
                <div class="col-md-3">
                  <figure class="rev-thumb zoom"><img src="<?php echo base_url('assets/uploaded_files/company_gallary/' . $recent_galarie['image_path']); ?>" alt="" width="150">
                  </figure>  
                </div>
            <?php } ?> 
            </div>
          <!-- /Question-container -->
        </section>
        <hr>

        <div class="add-Question bg-white p20" id="AskQuestion">
            <h6>Leave a Question</h6>
            <?php
            $success = $this->session->userdata('success');
            $exception = $this->session->userdata('exception');
            if (!empty($success)) {
                echo "<div class='row content-title'>
                        <div class='col-md-12 col-sm-12 col-xs-12'>
                            <div class='notification'>
                                <span class='success-message'>" . $success . "</span>
                            </div>
                        </div>
                    </div>";
                $this->session->unset_userdata('success');
            } else if (!empty($exception)) {
                echo "<div class='row content-title'>
                        <div class='col-md-12 col-sm-12 col-xs-12'>
                            <div class='notification'>
                                <span class='error-message'>" . $exception . "</span>
                            </div>
                        </div>
                    </div>";
                $this->session->unset_userdata('exception');
            }
            ?>
            <form action="https://studybrate.com/user/questions/store_question_details.html" method="POST">
                    <input type="hidden" name="listing_id" id="listing_id" value="<?php echo $listing_id; ?>" >
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
            <h6>Questions</h6>
            <section id="description" class=" bg-white p20">  
                <?php foreach ($question_list as $question) { ?> 
                    <div class="profileContent clearfix">  
                        <h6 ><i class="ti-help-alt"></i> by <?php echo $question['name']; ?> </h6>  
                        <p ><?php echo $question['question'];  ?></p>  
                    </div>
                    <?php if($question['answer']!='') { ?>
                        <div  class="profileContent clearfix">  
                        <h6 style="margin-left:50px;"><i class="ti-share"></i> by <?php echo $listing_info['company_name']; ?> </h6>  
                        <p style="margin-left:50px;" ><?php echo $question['answer'];  ?></p>  
                    </div>
                    <?php } ?>
                <?php } ?>  
            </section>
        </div>
        <hr>
        <div class="add-Question bg-white p20" id="Review">
            
            <h6>Add Review</h6>
            <form action="https://studybrate.com/user/reviews/store_review_details.html" method="POST">
                    <input type="hidden" name="listing_id" id="listing_id" value="<?php echo $listing_id; ?>" >
              <div class="row">
                <div class="form-group col-md-6">
                    <label>Name*</label>
                    <input type="text" name="name" id="name" placeholder="" class="form-control" required>
                </div>
                <div class="form-group col-md-6">
                    <label>Email *</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div> 
                <div class="form-group col-md-12">
                    <label>Rating *</label><br>
                    <div class="row">
                        <div class="col-md-2">
                            <input type="radio" name="rating" id="rating" value="5" checked>&nbsp;<div class="cat_star"><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i></div> 
                        </div>
                        <div class="col-md-2">
                            <input type="radio" name="rating" id="rating" value="4" >&nbsp;<div class="cat_star"><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i></div> 
                        </div>
                        <div class="col-md-2">
                            <input type="radio" name="rating" id="rating" value="3" >&nbsp;<div class="cat_star"><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i></div> 
                        </div>
                        <div class="col-md-2">
                            <input type="radio" name="rating" id="rating" value="2" >&nbsp;<div class="cat_star"><i class="icon_star"></i><i class="icon_star"></i></div> 
                        </div>
                        <div class="col-md-2">
                            <input type="radio" name="rating" id="rating" value="1" >&nbsp;<div class="cat_star"><i class="icon_star"></i></div> 
                        </div>
                    </div>
                </div> 
                <div class="form-group col-md-12">
                  <label>Remarks</label>
                  <textarea name="remarks" id="remarks" class="form-control" style="height:130px;" required></textarea>
                </div>
                <div class="form-group col-md-12 add_top_20 add_bottom_30">
                  <input type="submit" value="Submit Review" class="btn_1" id="submit-review">
                </div>
              </div>
            </form>
            
            <h6>Review</h6>
            <section id="description" class=" bg-white p20">  
                <?php foreach ($review_list as $review) { ?> 
                    <div class="profileContent clearfix">  
                        <h6 >
                            <?php echo $review['name']; ?> 
                            <div class="cat_star">
                                <?php for($i=1;$i<=$review['rating'];$i++)  {?>
                                <i class="icon_star"></i>
                                <?php } ?>
                            </div>
                        </h6>  
                        <p ><?php echo $review['remarks'];  ?></p>  
                    </div>
                <?php } ?>  
            </section>
        </div>
      </div>
      <!-- /col -->

      <aside class="col-lg-4" id="sidebar">
        <div class="box_detail booking">
          <h6 class="price">Request Tution</h6>

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
