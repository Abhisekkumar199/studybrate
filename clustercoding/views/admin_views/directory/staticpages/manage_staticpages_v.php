<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Staticpages
        <small>Manage Staticpage</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard.html'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#"><i class="fa fa-cogs"></i> Directory</a></li>
        <li><a class="active"><i class="fa fa-cogs"></i> Manage Staticpage</a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">staticpages</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
        </div>

        <!-- form start -->
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-md-6" >
                    <a href="<?php echo base_url('directory/staticpages/add_staticpage.html?category='.$category); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Add staticpage </a>
                </div>
                
                <div class="col-md-12" style="margin-top: 25px;">
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                            <tr> 
                                <th>Page Title</th> 
                                <th>Description</th> 
                                <th>Date Added</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $sl = 1; ?>
                            <?php foreach ($staticpage_info as $v_staticpage_info) { ?>
                                <tr> 
                                    <td><?php echo $v_staticpage_info['page_title']; ?></td> 
                                    <td><?php echo substr($v_staticpage_info['description'], 0, 100);  ?></td> 
                                    <td><?php echo date("d F Y", strtotime($v_staticpage_info['date_added'])); ?></td>
                                    <td>
                                        <?php
                                        $status = $v_staticpage_info['publication_status'];
                                        if ($status == 1) {
                                            echo "<a href='" . base_url('admin/directory/staticpages/unpublished_staticpage/' . $v_staticpage_info['staticpage_id'] . '.html') . "' class='btn btn-block btn-success btn-xs' data-toggle='tooltip' title='Click to unpublished'><i class='fa fa-arrow-down'></i> Published</a>";
                                        } else {
                                            echo "<a href='" . base_url('admin/directory/staticpages/published_staticpage/' . $v_staticpage_info['staticpage_id'] . '.html') . "' class='btn btn-block btn-warning btn-xs' data-toggle='tooltip' title='Click to published'><i class='fa fa-arrow-up'></i> Unpublished</a>";
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo base_url('directory/staticpages/edit_staticpage/' . $v_staticpage_info['staticpage_id'] . '.html'); ?>" class="btn btn-info btn-xs" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i></a>
                                        <a href="<?php echo base_url('admin/directory/staticpages/remove_staticpage/' . $v_staticpage_info['staticpage_id'] . '.html') ?>" class="btn btn-danger btn-xs check_delete" data-toggle="tooltip" title="Delete"><i class="fa fa-remove"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <!-- /.table -->
                </div>
            </div>
        </div>
        <!-- /.box-body -->
    </div>
</section>
