<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Category
        <small>Add Category</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard.html'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#"><i class="fa fa-cogs"></i> Directory</a></li>
        <li><a href="<?php echo base_url('directory/categories.html'); ?>"><i class="fa fa-cogs"></i> Manage Categories</a></li>
        <li><a class="active"><i class="fa fa-cogs"></i> Add Category</a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Add Category</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
        </div>

        <!-- form start -->
        <form role="form" name="category_add_form" action="<?php echo base_url('admin/directory/categories/create_category.html'); ?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="parent_category" value="<?php echo $parentcategory; ?>"  >
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="category_name">Category Name</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-tag"></i></span>
                                <input type="text" name="category_name" value="<?php echo set_value('category_name'); ?>" class="form-control" id="category_name" placeholder="Enter category name">
                            </div>
                            <span class="help-block error-message"><?php echo form_error('category_name'); ?></span>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="color_name">Color</label>
                            <select name="color_name" class="form-control" id="color_name">
                                <option value="" selected="" disabled="">Select one</option>
                                <option value="bgblue-1">Blue</option>
                                <option value="bgbrown-1">Brown</option>
                                <option value="bggreen-2">Green</option>
                                <option value="bgpurpal-1">Purple</option>
                                <option value="bgyallow-1">Yellow</option>
                                <option value="bgorange-1">Orange</option>
                                <option value="bgred-1">Red</option>
                            </select>
                            <span class="help-block error-message"><?php echo form_error('color_name'); ?></span>
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
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="icon_name">Icon Name</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-picture-o"></i></span>
                                <input type="text" name="icon_name" value="" class="form-control" id="icon_name" placeholder="Enter icon name">
                            </div>
                            <p class="help-block">Note: <a href="http://fontawesome.io/icons/" target="_blank">Click here</a> choose a icon and place the icon name here.</p>
                            <span class="help-block error-message"><?php echo form_error('icon_name'); ?></span>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="picture_name">Picture</label>
                            <input type="file" id="picture_name" name="picture_name">
                            <p class="help-block" style="color: #f39c12;"><b>Note:</b> Only .jpg .png .jpeg .gif allowed. <br>(width image will better view such as <b>320x480</b> pixel)</p>
                            <span class="help-block error-message"><?php echo form_error('picture_name'); ?></span>
                        </div>
                    </div>
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
<script type="text/javascript">
    document.forms['category_add_form'].elements['publication_status'].value = '<?php echo set_value('publication_status'); ?>';
     document.forms['category_add_form'].elements['color_name'].value = '<?php echo set_value('color_name'); ?>';
</script>