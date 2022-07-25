<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Subjects
        <small>Manage Subjects</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard.html'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#"><i class="fa fa-cogs"></i> Directory</a></li>
        <li><a class="active"><i class="fa fa-cogs"></i> Manage Subjects</a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Subjects</h3>

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
                    <a href="<?php echo base_url('directory/subjects/add_subject.html?category='.$category); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Add Subject </a>
                </div>
                <div class="col-md-6" >
                    <form role="form" name="category_add_form" action="<?php echo base_url('admin/directory/subjects.html'); ?>" method="get">
                     
                    <select name="category" class="btn btn-success form-control custom-select categoryfilter pull-right"style="width: 100px;"  onchange="this.form.submit()" >
                            <option value="1">Subject</option>
                            <?php foreach($categories_info as $categories_info1) { ?>
                            <option value="<?php echo $categories_info1['category_id']; ?>"  ><?php echo $categories_info1['category_name']; ?></option> 
                            <?php } ?>
                    </select>
                     </form>
                </div>
                <div class="col-md-12" style="margin-top: 25px;">
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>SL#</th>
                                <th>Subject Name</th> 
                                <th>Category</th>
                                <th>Description</th>
                                <th>Added By</th>
                                <th>Date Added</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $sl = 1; ?>
                            <?php foreach ($subject_info as $v_subject_info) { ?>
                                <tr>
                                    <td><?php echo $sl++; ?></td>
                                    <td><?php echo $v_subject_info['subject_name']; ?></td>
                                    <td><?php echo $v_subject_info['category_name']; ?></td>
                                    <td><?php echo $v_subject_info['description']; ?></td>
                                    <td><?php echo $v_subject_info['first_name'] . " " . $v_subject_info['last_name']; ?></td>
                                    <td><?php echo date("d F Y", strtotime($v_subject_info['date_added'])); ?></td>
                                    <td>
                                        <?php
                                        $status = $v_subject_info['publication_status'];
                                        if ($status == 1) {
                                            echo "<a href='" . base_url('admin/directory/subjects/unpublished_subject/' . $v_subject_info['subject_id'] . '.html') . "' class='btn btn-block btn-success btn-xs' data-toggle='tooltip' title='Click to unpublished'><i class='fa fa-arrow-down'></i> Published</a>";
                                        } else {
                                            echo "<a href='" . base_url('admin/directory/subjects/published_subject/' . $v_subject_info['subject_id'] . '.html') . "' class='btn btn-block btn-warning btn-xs' data-toggle='tooltip' title='Click to published'><i class='fa fa-arrow-up'></i> Unpublished</a>";
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo base_url('directory/subjects/edit_subject/' . $v_subject_info['subject_id'] . 'html'); ?>" class="btn btn-info btn-xs" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i></a>
                                        <a href="<?php echo base_url('admin/directory/subjects/remove_subject/' . $v_subject_info['subject_id'] . '.html') ?>" class="btn btn-danger btn-xs check_delete" data-toggle="tooltip" title="Delete"><i class="fa fa-remove"></i></a>
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
