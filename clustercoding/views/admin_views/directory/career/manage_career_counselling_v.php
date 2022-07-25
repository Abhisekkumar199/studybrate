<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Career Counselling
        <small>Manage Career Counselling</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard.html'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#"><i class="fa fa-cogs"></i> Directory</a></li>
        <li><a class="active"><i class="fa fa-cogs"></i> Manage Reviews</a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Career Counselling</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
        </div>

        <!-- form start -->
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                            <tr> 
                                <th>Student Name</th>
                                <th>Email</th>
                                <th>Contact No.</th>
                                <th>Class</th> 
                                <th>Subject</th>
                                <th>location</th>
                                <th>Time to Call</th>
                                <th>Student Details</th>
                                <th>Date Added</th> 
                            </tr>
                        </thead>
                        <tbody>
                            <?php $sl = 1; ?>
                            <?php foreach ($career_info as $v_career_info) { ?>
                                <tr> 
                                    <td><?php echo $v_career_info['student_name']; ?></td>
                                    <td><?php echo $v_career_info['email']; ?></td>
                                    <td><?php echo $v_career_info['contact']; ?></td>
                                    <td><?php echo $v_career_info['class']; ?></td>
                                    <td><?php echo $v_career_info['subject']; ?></td>
                                    <td><?php echo $v_career_info['location']; ?></td>
                                    <td><?php echo $v_career_info['time_to_call']; ?></td>
                                    <td><?php echo $v_career_info['student_details']; ?></td>
                                     
                                    <td><?php echo date("d F Y", strtotime($v_career_info['date_added'])); ?></td>
                                    
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