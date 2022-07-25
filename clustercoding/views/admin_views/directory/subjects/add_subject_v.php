<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Subject
        <small>Add Subject</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard.html'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#"><i class="fa fa-cogs"></i> Directory</a></li>
        <li><a href="<?php echo base_url('directory/categories.html'); ?>"><i class="fa fa-cogs"></i> Manage Subjects</a></li>
        <li><a class="active"><i class="fa fa-cogs"></i> Add Subject</a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Add Subject</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
        </div>

        <!-- form start -->
        <form role="form" name="category_add_form" action="<?php echo base_url('admin/directory/subjects/create_subject.html'); ?>" method="post">
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="subject_name">Subject Name</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-tag"></i></span>
                                <input type="text" name="subject_name" value="<?php echo set_value('subject_name'); ?>" class="form-control" id="category_name" placeholder="Enter subject name">
                            </div>
                            <span class="help-block error-message"><?php echo @form_error('subject_name'); ?></span>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="color_name">Category</label>
                            <select name="color_name" class="form-control categorychange" id="color_name">
                                <option value="" selected="" disabled="">Select Category</option>
                                <?php foreach($categories_info as $categories_info1) { ?>
                                <option value="<?php echo $categories_info1['category_id']; ?>"  ><?php echo $categories_info1['category_name']; ?></option> 
                                <?php } ?>
                            </select>
                            <span class="help-block error-message"><?php echo form_error('color_name'); ?></span>
                        </div>
                        <span id="subcat1show" style="display:none;">
                            <div class="form-group">
                                <label class="form-label">Sub Category</label>
                                <select name="cat_id1" id="subcat11" class="form-control custom-select categorychange1">
                                <option value="">Select</option> 
                                </select>
                            </div>
                        </span>
                        <span id="subcat2show" style="display:none;">
                            <div class="form-group">
                                <label class="form-label">Sub Category</label>
                                <select name="cat_id2" id="subcat12" class="form-control custom-select categorychange2">
                                <option value="">Select</option> 
                                </select>
                            </div>
                        </span>
                        <input type="hidden"   name="subcat" id="subcat"  >
                    </div>
                    
                    <div class="clearfix"></div>
                    <!-- /.col -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="publication_status">Publication Status</label>
                            <select name="publication_status" class="form-control" id="publication_status">
                                <option value="" selected="" disabled="">Select one</option>
                                <option value="1">Published</option>
                                <option value="0">Unpublished</option>
                            </select>
                            <span class="help-block error-message"><?php echo form_error('publication_status'); ?></span>
                        </div>
                    </div>
                    <!-- /.col -->
                    
                    <!-- /.col -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" class="form-control" id="description" placeholder="Enter category description" rows="4"><?php echo set_value('description'); ?></textarea>
                            <span class="help-block error-message"><?php echo form_error('description'); ?></span>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <a href="<?php echo base_url('directory/categories.html'); ?>" class="btn btn-danger" data-toggle="tooltip" title="Go back"><i class="fa fa-remove"></i> Cancel</a>
                <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Add Info</button>
            </div>
        </form>
        <!-- /.form -->
    </div>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
    document.forms['category_add_form'].elements['publication_status'].value = '<?php echo set_value('publication_status'); ?>';
     document.forms['category_add_form'].elements['color_name'].value = '<?php echo set_value('color_name'); ?>';
    $(document).ready(function(){  
        $(".categorychange").change(function(event){    
            var catId =  $(this).val();  
            var href = "<?php echo base_url(); ?>ajax-get-adminchildcategory/"+catId;
            var btn = this;
            $.ajax({
            type: "POST",
            url: href,
            success: function(response) {    
                var dataObj = jQuery.parseJSON(response); 
                if(dataObj != '')
                {
                    $('#subcat1show').show(); 
                    $('#subcat').val(catId);
                    $(dataObj).each(function(){         
                        $('#subcat11').append('<option value="'+ this.category_id +'">'+ this.category_name +'</option>');
                    });
                }
                else
                {
                    $('#subcat').val(catId);
                }  
            }
            }); 
        });

        $(".categorychange1").change(function(event){    
            var catId =  $(this).val();  
            var href = "<?php echo base_url(); ?>ajax-get-adminchildcategory/"+catId;
            var btn = this;
            $.ajax({
            type: "POST",
            url: href,
            success: function(response) { 
                
                var dataObj = jQuery.parseJSON(response); 
                if(dataObj != '')
                {
                    $('#subcat2show').show(); 
                    $('#subcat').val(catId);
                    $(dataObj).each(function(){         
                        $('#subcat12').append('<option value="'+ this.cat_id +'">'+ this.categoryname +'</option>');
                    });
                } 
                else
                {
                    $('#subcat').val(catId);
                }   
            }
          }); 
        });
        
        $(".categorychange2").change(function(event){    
            var catId =  $(this).val();  
            var href = "<?php echo base_url(); ?>ajax-get-adminchildcategory/"+catId;
            var btn = this;
            $.ajax({
            type: "POST",
            url: href,
            success: function(response) {  
                var dataObj = jQuery.parseJSON(response); 
                if(dataObj != '')
                {
                    $('#subcat3show').show(); 
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