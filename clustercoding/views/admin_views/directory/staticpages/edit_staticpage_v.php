<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Static Page
        <small>Edit Static Page </small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard.html'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#"><i class="fa fa-cogs"></i> Directory</a></li>
        <li><a href="<?php echo base_url('directory/subjects.html'); ?>"><i class="fa fa-cogs"></i> Manage Static Page</a></li>
        <li class="active"><i class="fa fa-circle-o"></i> Edit Static Page </li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Edit Static Page </h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
        </div>

        <!-- form start -->
        <form role="form" name="category_edit_form" action="<?php echo base_url('admin/directory/staticpages/update_staticpage/' . $staticpage_info['staticpage_id'] . '.html'); ?>" method="post">
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="page_title">Page Title</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-tag"></i></span>
                                <input type="text" name="page_title" value="<?php echo $staticpage_info['page_title']; ?>" class="form-control" id="page_title" placeholder="Enter Page Tile">
                            </div>
                            <span class="help-block error-message"><?php echo form_error('page_title'); ?></span>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="page_name">Select Page </label>
                            <select name="page_name" class="form-control" id="">
                                <option value="" selected >Select</option>
                                <option value="about-us" <?php if($staticpage_info['page_name'] == 'about-us') { echo "selected";} ?> >About Us</option>
                                <option value="faq" <?php if($staticpage_info['page_name'] == 'faq') { echo "selected";} ?>>FAQ</option>
                                <option value="terms-and-conditions" <?php if($staticpage_info['page_name'] == 'terms-and-conditions') { echo "selected";} ?> >Terms and Conditions</option>
                                <option value="privacy-policy" <?php if($staticpage_info['page_name'] == 'privacy-policy') { echo "selected";} ?> >Privacy Policy</option>
                                <option value="help" <?php if($staticpage_info['page_name'] == 'help') { echo "selected";} ?> >Help</option>  
                            </select>
                            <span class="help-block error-message"><?php echo form_error('page_name'); ?></span>
                        </div>
                         
                    </div>
                    
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" class="form-control" id="description" placeholder="Enter description" rows="4"><?php echo $staticpage_info['description']; ?></textarea>
                            <span class="help-block error-message"><?php echo form_error('description'); ?></span>
                        </div>
                    </div>
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
                </div>
                <!-- /.row -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <a href="<?php echo base_url('directory/categories.html'); ?>" class="btn btn-danger" data-toggle="tooltip" title="Go back"><i class="fa fa-remove"></i> Cancel</a>
                <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Update Info</button>
            </div>
        </form>
        <!-- /.form -->
    </div>
</section>
<script type="text/javascript">
    document.forms['category_edit_form'].elements['publication_status'].value = '<?php echo $category_info['publication_status']; ?>';
    document.forms['category_edit_form'].elements['color_name'].value = '<?php echo $category_info['color_name']; ?>';
</script>