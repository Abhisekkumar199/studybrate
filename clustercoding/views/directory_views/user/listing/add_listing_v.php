<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="row content-title">
    <div class="col-md-6 col-sm-6 col-xs-6">
        <h6 class="pull-left"> Add Profile</h6>
    </div>
    <div class="col-md-6 col-sm-6 col-xs-6">
        <ul class="list-inline pull-right">
            <li><a href="<?php echo base_url('user/dashboard.html'); ?>"><i class="fa fa-home"></i> Dashboard</a></li> >
            <li><a href="<?php echo base_url('user/listing.html'); ?>"> Manage Institutes/Teachers</a></li> >
            <li><a class="active"> Add New</a></li>
        </ul>
    </div>
</div>

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

<!-- Star Add Container -->
<div class="row manage-container">
    <div class="col-md-12 col-sm-12 col-xs-12 padding-top-10">
        <?php
        $package_info = package_info();
        if ($count_listing < $package_info['listing']) {
            ?>
            <form name="add_business_form" class="custom-form" action="<?php echo base_url('user/listing/store_company_details.html'); ?>" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <h6 class="brown-1">Institute/ Teacher Details</h6>
                        <hr>
                    </div>
                    <!-- End Col -->
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group custom-group">
                            <label for="company_name">Profile Name <span class="required-field">*</span></label>
                            <input type="text" name="company_name" value="<?php echo set_value('company_name'); ?>" class="form-control margin-top-5" id="company_name" placeholder="Enter profile name">
                            <span class="error-message"><?php echo form_error('company_name'); ?></span>
                        </div>
                    </div>
                    <!-- End Col -->
                    
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="category_id">Tutor Category <span class="required-field">*</span></label>
                            <select name="category_id" class="form-control margin-top-5 categorychange" id="category_id">
                                <option value="" selected>Select</option> 
                                <?php
                                foreach ($categories_info as $v_category_info) 
                                {
                                ?>
                                     <option value="<?php echo $v_category_info['category_id'];?>"   ><?php echo $v_category_info['category_name'];?></option>
                                <?php
                                }
                                ?>
                            </select>
                            <span class="error-message"><?php echo form_error('category_id'); ?></span>
                        </div>
    
                        <span id="subcat1show"  >
                            <div class="form-group">
                                <label for="subcat11" class="pull-left">Sub Category</label> 
                                <select name="cat_id1" id="subcat11" class="form-control custom-select categorychange1">
                                    <option value="">Select</option> 
                                    <?php
                                    foreach ($sub_categories_info as $sub_categories_infos) {
                                        echo "<option value='" . $sub_categories_infos['category_id'] . "' selected='selected'>" . $sub_categories_infos['category_name'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </span>
                        <span id="subcat2show"  style="display:none;">
                            <div class="form-group">
                                <label class="form-label" class="pull-left" for="subcat12">Sub Category</label>
                                <select name="cat_id2" id="subcat12" class="form-control custom-select categorychange2">
                                <option value="">Select</option> 
                                </select>
                            </div>
                        </span>
                        <span id="subjectshow"  >
                            <div class="form-group">
                                <label class="form-label pull-left"   for="subject">Subject</label>
                                <select name="subject[]" id="subject" class="form-control custom-select"  style="height: 150px;" multiple="multiple">
                                    <option value="">Select</option> 
                                    <?php
                                    
                                    foreach ($subjectlist as $subjectlists) 
                                    {
                                    ?>
                                        <option value="<?php echo $subjectlists['subject_name'];?>"  ><?php echo $subjectlists['subject_name'];?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </span>
                        <input type="hidden"   name="subcat" id="subcat" value=" " >
                    </div>
                    <!-- End Col -->
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="experiance">Experiance</label>
                            <input type="text" name="experiance" value="" class="form-control margin-top-5" id="experiance" placeholder="Enter Experiance">
                            <span class="error-message"><?php echo form_error('experiance'); ?></span>
                        </div>
                    </div>
                    <!-- End Col -->
                   
                    <!-- End Col --> 
                    <!--<div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="establishment_year">Establishment Year <span class="required-field">*</span></label>
                            <select name="establishment_year" class="form-control margin-top-5" id="establishment_year">
                                <option value="" selected="" disabled="">Select one</option>
                                <?php
                                $i = 1800;
                                for ($j = date("Y"); $j >= $i; $j--) {
                                    echo "<option value='" . $j . "'>" . $j . "</option>";
                                }
                                ?>
                            </select>
                            <span class="error-message"><?php echo form_error('establishment_year'); ?></span>
                        </div>
                    </div>-->
                    <!-- End Col -->
                  
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="company_manager">Profile Manager <span class="required-field">*</span></label>
                            <input type="text" name="company_manager" value="<?php echo set_value('company_manager'); ?>" class="form-control margin-top-5" id="company_manager" placeholder="Contact Person for Institute/ Name of Teacher">
                            <span class="error-message"><?php echo form_error('company_manager'); ?></span>
                        </div>
                    </div>
                    <!-- End Col -->
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="employees">Type of Profile <span class="required-field">*</span></label>
                            <select name="employees" class="form-control margin-top-5" id="employees">
                                <option value="" selected="" disabled="">Select one</option>
                                <option value="i">Institute</option>
                                <option value="t">Teacher</option>

                            </select>
                            <span class="error-message"><?php echo form_error('employees'); ?></span>
                        </div>
                    </div>
                    <!-- End Col -->
                    
                <div class="clearfix"></div>
                    
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="other_from">Other Education </label>
                        <input type="text" name="other_from" value="" class="form-control margin-top-5" id="other_from" placeholder="Other Education">
                        <span class="error-message"><?php echo form_error('other_from'); ?></span>
                    </div>
                </div>
                <div class="col-md-5 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="other_board">Board </label>
                        <input type="text" name="other_board" value="" class="form-control margin-top-5" id="other_board" placeholder="Board">
                        <span class="error-message"><?php echo form_error('other_board'); ?></span>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="other_year">Year </label>
                        <input type="text" name="other_year" value="" class="form-control margin-top-5" id="other_year" placeholder="Year">
                        <span class="error-message"><?php echo form_error('other_year'); ?></span>
                    </div>
                </div>


                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="twelve_from">12th </label>
                        <input type="text" name="twelve_from" value="" class="form-control margin-top-5" id="twelve_from" placeholder="12th From">
                        <span class="error-message"><?php echo form_error('twelve_from'); ?></span>
                    </div>
                </div>
                <div class="col-md-5 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="twelve_board">Board </label>
                        <input type="text" name="twelve_board" value="" class="form-control margin-top-5" id="twelve_board" placeholder="12th Board">
                        <span class="error-message"><?php echo form_error('twelve_board'); ?></span>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="twelve_year">Year </label>
                        <input type="text" name="twelve_year" value="" class="form-control margin-top-5" id="twelve_year" placeholder="12th Year">
                        <span class="error-message"><?php echo form_error('twelve_year'); ?></span>
                    </div>
                </div>

                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="graduation_from">Graduation </label>
                        <input type="text" name="graduation_from" value="" class="form-control margin-top-5" id="graduation_from" placeholder="Graduation From">
                        <span class="error-message"><?php echo form_error('graduation_from'); ?></span>
                    </div>
                </div>
                <div class="col-md-5 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="graduation_collage">Collage/University </label>
                        <input type="text" name="graduation_collage" value="" class="form-control margin-top-5" id="graduation_collage" placeholder="Graduation Collage">
                        <span class="error-message"><?php echo form_error('graduation_collage'); ?></span>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="graduation_year">Year </label>
                        <input type="text" name="graduation_year" value="" class="form-control margin-top-5" id="graduation_year" placeholder="Graduation Year">
                        <span class="error-message"><?php echo form_error('graduation_year'); ?></span>
                    </div>
                </div>

                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="post_graduation_from">Post Graduation </label>
                        <input type="text" name="post_graduation_from" value="" class="form-control margin-top-5" id="post_graduation_from" placeholder="Post Graduation From">
                        <span class="error-message"><?php echo form_error('post_graduation_from'); ?></span>
                    </div>
                </div>
                <div class="col-md-5 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="post_graduation_collage">Collage/University </label>
                        <input type="text" name="post_graduation_collage" value="" class="form-control margin-top-5" id="post_graduation_collage" placeholder="Post Graduation Collage">
                        <span class="error-message"><?php echo form_error('post_graduation_collage'); ?></span>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="post_graduation_year">Year </label>
                        <input type="text" name="post_graduation_year" value="" class="form-control margin-top-5" id="post_graduation_year" placeholder="Post Graduation Year">
                        <span class="error-message"><?php echo form_error('post_graduation_year'); ?></span>
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="post_graduation_year">Languages Spoken </label>  
                        <ul style="margin-top:20px;">
                        <li style="text-align: left;"><input class="pull-left" style="height: 10px;" type="checkbox" name="is_hindi" value="Yes" >&nbsp;Hindi</li>
                        <li style="text-align: left;"><input class="pull-left" style="height: 10px;" type="checkbox" name="is_english" value="Yes" > English </li>
                        </ul>
                    </div>  
                </div>
                <div class="col-md-3 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="post_graduation_year">Taught in School or College</label>  
                        <ul style="margin-top:20px;">
                        <li style="text-align: left;"><input class="pull-left" style="height: 10px;" type="checkbox" name="taught_in_school" value="Yes" >&nbsp;Yes</li> 
                        </ul>
                    </div>  
                </div>
                <div class="col-md-3 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="post_graduation_year">Demo Class</label>  
                        <ul style="margin-top:20px;">
                        <li style="text-align: left;"><input class="pull-left" style="height: 10px;" type="checkbox" name="demo_class" value="Yes" >&nbsp;Yes</li> 
                        
                        <li style="text-align: left;"><input class="pull-left" style="height: 10px;" type="checkbox" name="demo_class_is_paid" value="Yes" >&nbsp;Paid</li> 
                        </ul>
                    </div>  
                </div>

                <div class="col-md-3 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="post_graduation_year">Class Location</label>  
                        <ul style="margin-top:20px;">
                        <li style="text-align: left;"><input class="pull-left" style="height: 10px;" type="checkbox" name="class_location_student_home" value="Yes"  >&nbsp;Student's Home</li>
                        <li style="text-align: left;"><input class="pull-left" style="height: 10px;" type="checkbox" name="class_location_tutor_home" value="Yes" > Tutor's Home </li>
                        <li style="text-align: left;"><input class="pull-left" style="height: 10px;" type="checkbox" name="online" value="Yes" > Online </li>
                        </ul>
                    </div>  
                </div>
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="city_id">Proficiency Level</label> 
                        <input type="text" name="proficiency_level" value="" class="form-control margin-top-5" id="proficiency_level" placeholder="Proficiency Level"> 
                        <span class="error-message"><?php echo form_error('proficiency_level'); ?></span>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="city_id">Gender</label>
                        <ul style="margin-top:20px;">
                        <li style="text-align: left;"><input class="pull-left" style="height: 10px;" type="radio" name="gender" value="Male" <?php if($listing_info['gender'] == 'Male') { echo "checked";} ?>>&nbsp;Male</li> 
                        <li style="text-align: left;"><input class="pull-left" style="height: 10px;" type="radio" name="gender" value="Female" <?php if($listing_info['gender'] == 'Female') { echo "checked";} ?>>&nbsp;Female</li> 
                        <li style="text-align: left;"><input class="pull-left" style="height: 10px;" type="radio" name="gender" value="Both" <?php if($listing_info['gender'] == 'Both') { echo "checked";} ?>>&nbsp;Both</li> 
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="student_age_group">Student Age Group</label>
                        <input type="text" name="student_age_group" value="" class="form-control margin-top-5" id="mother_tongue" placeholder="Student Age Group">
                        <span class="error-message"><?php echo form_error('student_age_group'); ?></span>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="student_age_group">Fee</label>
                        <input type="text" name="fee" value="" class="form-control margin-top-5" id="fee" placeholder="Fee">
                        <span class="error-message"><?php echo form_error('fee'); ?></span>
                    </div>
                </div>
                <div class="clearfix"></div>
                
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="mother_tongue">Other Languages</label>
                        <input type="text" name="mother_tongue" value="" class="form-control margin-top-5" id="mother_tongue" placeholder="Mother Tongue">
                        <span class="error-message"><?php echo form_error('mother_tongue'); ?></span>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="boards">Board Taught</label>
                        <input type="text" name="boards" value="" class="form-control margin-top-5" id="boards" placeholder="CBSE,ICSE,State">
                        <span class="error-message"><?php echo form_error('boards'); ?></span>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="boards">Taught in school/college/institute (Name)</label>
                        <input type="text" name="taught_in_school_name" value="" class="form-control margin-top-5" id="taught_in_school_name" placeholder="Taught in School">
                        <span class="error-message"><?php echo form_error('taught_in_school_name'); ?></span>
                    </div>
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="cbse_board_subject">CBSE Board Subject</label>
                        <input type="text" name="cbse_board_subject" value="" class="form-control margin-top-5" id="cbse_board_subject" placeholder="CBSE Board Subject">
                        <span class="error-message"><?php echo form_error('cbse_board_subject'); ?></span>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="icsc_board_subject">ISC/ICSE Board Subject </label>
                        <input type="text" name="icsc_board_subject" value="" class="form-control margin-top-5" id="icsc_board_subject" placeholder="ISC/ICSE Board Subject">
                        <span class="error-message"><?php echo form_error('icsc_board_subject'); ?></span>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="other_board_subject">Other Board Subject </label>
                        <input type="text" name="other_board_subject" value="" class="form-control margin-top-5" id="other_board_subject" placeholder="Other Board Subject">
                        <span class="error-message"><?php echo form_error('other_board_subject'); ?></span>
                    </div>
                </div>
 
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" value="" class="form-control margin-top-5" id="title" placeholder="Enter Title">
                            <span class="error-message"><?php echo form_error('title'); ?></span>
                        </div>
                    </div>
                    <!-- End Col -->
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="about_company">About Institute/Teacher <span class="required-field">*</span></label>
                            <textarea rows="4" name="about_company" class="form-control margin-top-5" id="about_company" placeholder="About Institute or Teacher"></textarea>
                            <span class="error-message"><?php echo form_error('about_company'); ?></span>
                        </div>
                    </div>
                    <!-- End Col -->
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="company_logo">Profile Picture</label>
                            <input name="company_logo" class="margin-top-5" type="file" id="company_logo">
                            <span class="help-block"><strong>Note:</strong> Only .jpg .png .jpeg .gif allowed. <br>(width image will better view such as <strong>320x480</strong> pixel)</span>
                            <span class="error-message"><?php echo form_error('company_logo'); ?></span>
                        </div>
                    </div>
                    <!-- End Col -->
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <hr>
                        <h6 class="brown-1">Contact Details</h6>
                        <hr>
                    </div>
                    <!-- End Col -->
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="city_id">City <span class="required-field">*</span></label>
                            <select name="city_id" class="form-control margin-top-5" id="city_id">
                                <option value="" selected="" disabled="">Select one</option>
                                <?php
                                foreach ($cities_info as $v_city_info) {
                                    echo "<option value='" . $v_city_info['city_id'] . "'>" . $v_city_info['city_name'] . "</option>";
                                }
                                ?>
                            </select>
                            <span class="error-message"><?php echo form_error('city_id'); ?></span>
                        </div>
                    </div>
                    <!-- End Col -->
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="state">State<span class="required-field">*</span></label>
                            <input type="text" name="state" value="<?php echo set_value('state'); ?>" class="form-control margin-top-5" id="state" placeholder="Enter state">
                            <span class="error-message"><?php echo form_error('state'); ?></span>
                        </div>
                    </div>
                    <!-- End Col -->
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="address">Address <span class="required-field">*</span></label>
                            <input type="text" name="address" value="<?php echo set_value('address'); ?>" class="form-control margin-top-5" id="address" placeholder="Enter address">
                            <span class="error-message"><?php echo form_error('address'); ?></span>
                        </div>
                    </div>
                    <!-- End Col -->
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="zip">Zip <span class="required-field">*</span></label>
                            <input type="text" name="zip" value="<?php echo set_value('zip'); ?>" class="form-control margin-top-5" id="zip" placeholder="Enter zip code">
                            <span class="error-message"><?php echo form_error('zip'); ?></span>
                        </div>
                    </div>
                    <!-- End Col -->
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="mobile">Mobile <span class="required-field">*</span></label>
                            <input type="text" name="mobile" value="<?php echo set_value('mobile'); ?>" class="form-control margin-top-5" id="mobile" placeholder="Enter mobile number">
                            <span class="error-message"><?php echo form_error('mobile'); ?></span>
                        </div>
                    </div>
                    <!-- End Col -->
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="email">Email <span class="required-field">*</span></label>
                            <input type="email" name="email" value="<?php echo set_value('email'); ?>" class="form-control margin-top-5" id="email" placeholder="Enter email address">
                            <span class="error-message"><?php echo form_error('email'); ?></span>
                        </div>
                    </div>
                    <!-- End Col -->
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="award">Award and recognition</label>
                            <input type="text" name="award" value="<?php echo set_value('award'); ?>" class="form-control margin-top-5" id="award" placeholder="Award and recognition">
                            <span class="error-message"><?php echo form_error('award'); ?></span>
                        </div>
                    </div>
                    <!-- End Col -->
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="type_of_class">Type of class</label>
                            <input type="text" name="type_of_class" value="<?php echo set_value('type_of_class'); ?>" class="form-control margin-top-5" id="type_of_class" placeholder="Type of class">
                            <span class="error-message"><?php echo form_error('type_of_class'); ?></span>
                        </div>
                    </div>
                    <!-- End Col -->
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="website">Website</label>
                            <input type="text" name="website" value="<?php echo set_value('website'); ?>" class="form-control margin-top-5" id="website" placeholder="Enter website name">
                            <span class="error-message"><?php echo form_error('website'); ?></span>
                        </div>
                    </div>
                    <!-- End Col -->
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="contact_person">Contact Person <span class="required-field">*</span></label>
                            <input type="text" name="contact_person" value="<?php echo set_value('contact_person'); ?>" class="form-control margin-top-5" id="contact_person" placeholder="Enter contact person">
                            <span class="error-message"><?php echo form_error('contact_person'); ?></span>
                        </div>
                    </div>
                   
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <hr>
                        <a href="<?php echo base_url('user/listing.html'); ?>" class="btn btn-danger btn-custom"><i class="fa fa-remove"></i> Cancel</a>
                        <button type="submit" class="btn btn-success btn-custom"><i class="fa fa-plus"></i> Add Info</button>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </form>
        <?php } else { ?>
            <p>You need to upgrade your package for add more business. Please upgrade your package.</p>
        <?php } ?>

    </div>
</div>
<!-- End Add Container -->
<!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>-->
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCruIR-E1OQ9TEh5pABARsl8drCCc2PASs&callback=initMap"></script>

<script>
    function initMap() {
        var uluru = {lat: 25.7458153578196, lng: 89.26883062744139}


        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 10,
            center: uluru
        });
        var marker = new google.maps.Marker({
            position: uluru,
            map: map,
            draggable: true
        });
        google.maps.event.addListener(marker, 'dragend', function () {
            //console.log(marker.getPosition().lat());
            //console.log(marker.getPosition().lng());

            var lat = marker.getPosition().lat();
            var lng = marker.getPosition().lng();
            $('#lat').val(lat);
            $('#lng').val(lng);
        });
        // var searchBox = new google.maps.places.SearchBox(document.getElementById('mapsearch'));

    }
</script>
<script type="text/javascript">
    document.forms['add_business_form'].elements['category_id'].value = '<?php echo set_value('category_id'); ?>';
    document.forms['add_business_form'].elements['employees'].value = '<?php echo set_value('employees'); ?>';
    document.forms['add_business_form'].elements['establishment_year'].value = '<?php echo set_value('establishment_year'); ?>';
    document.forms['add_business_form'].elements['city_id'].value = '<?php echo set_value('city_id'); ?>';
</script>
<script type="text/javascript"> 
    $(document).ready(function(){  
        $(".categorychange").change(function(event){    
            var catId =  $(this).val();    
            var href = "<?php echo base_url(); ?>ajax-get-childcategory/"+catId;
            var btn = this;
            $.ajax({
            type: "POST",
            url: href,
            success: function(response) {   
               // var response1 = response.split("-");   
                var dataObj = jQuery.parseJSON(response);  
                if(dataObj != '')
                {
                    $('#subcat1show').show();  
                    $('#subcat').val(catId);
                    $('#subcat11').html('');
                    
                    $('#subcat11').append('<option value="">Select</option>'); 
                    $(dataObj).each(function(){         
                        $('#subcat11').append('<option value="'+ this.category_id +'">'+ this.category_name +'</option>');
                    });
                  
                }
                else
                {
                    $('#subcat11').html('');
                    $('#subcat').val(catId);
                }  
            }
            }); 
        });

        $(".categorychange1").change(function(event){    
            var catId =  $(this).val();  
            var href = "<?php echo base_url(); ?>ajax-get-subject/"+catId;
            var btn = this;
            $.ajax({
            type: "POST",
            url: href,
            success: function(response) {  
                var dataObj = jQuery.parseJSON(response); 
                if(dataObj != '')
                { 
                    $('#subjectshow').show();  
                    $('#subject').html('');
                    $('#subject').append('<option value="">Select</option>'); 
                    $(dataObj).each(function(){         
                        $('#subject').append('<option value="'+ this.subject_id +'">'+ this.subject_name +'</option>');
                    }); 
                    $('#subcat').val(catId);
                } 
                else
                {
                    $('#subject').html('');
                    $('#subcat').val(catId);
                }   
            }
          }); 
        });
        
        $(".categorychange2").change(function(event){    
            var catId =  $(this).val();  
            var href = "<?php echo base_url(); ?>ajax-get-childcategory/"+catId;
            var btn = this;
            $.ajax({
            type: "POST",
            url: href,
            success: function(response) {  
                var dataObj = jQuery.parseJSON(response); 
                if(dataObj != '')
                {
                    $('#subcat3show').show();  
                    $('#subjectshow').show(); 
                    $('#subcat').val(catId);
                    $(dataObj).each(function(){         
                        $('#subcat13').append('<option value="'+ this.cat_id +'">'+ this.categoryname +'</option>');
                    });
                } 
                else
                {
                    $('#subcat').val(catId);
                }   
            }
          }); 
        });


    });
</script>
