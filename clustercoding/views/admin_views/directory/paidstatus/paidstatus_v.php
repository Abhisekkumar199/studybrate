<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1> Update <small>  Paid Status</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard.html'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#"><i class="fa fa-cogs"></i> Directory</a></li> 
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Update Paid Status</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
        </div>

        <!-- form start -->
        <form role="form" name="category_add_form" action="<?php echo base_url('directory/listing/update-paidstatus/process.html'); ?>" method="post">
            <input type="hidden" name="listingid" value="<?php echo $listingid; ?>" />
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    
                    <!-- /.col -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="paid_status">Status </label>
                            <select name="paid_status" class="form-control" id="paid_status" required>
                                <option value="" selected="" disabled="">Select Status</option>
                                <option value="Paid" <?php if($listing_info['paid_status'] == 'Paid' ) { echo "selected";} ?> >Paid</option>
                                <option value="Unpaid" <?php if($listing_info['paid_status'] == 'Unpaid' ) { echo "selected";} ?>>Unpaid</option> 
                            </select>
                            <span class="help-block error-message"><?php echo form_error('paid_status'); ?></span>
                        </div> 
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="package">Package Name </label>
                            <select name="package" class="form-control" id="package" >
                                <option value="" selected="" >Select Package</option>
                                <option value="Basic" <?php if($listing_info['package'] == 'Basic' ) { echo "selected";} ?> >Basic</option>
                                <option value="Medium" <?php if($listing_info['package'] == 'Medium' ) { echo "selected";} ?>>Medium</option> 
                                <option value="Citytop" <?php if($listing_info['package'] == 'Citytop' ) { echo "selected";} ?>>Citytop</option> 
                                <option value="Institutional" <?php if($listing_info['package'] == 'Institutional' ) { echo "selected";} ?>>Institutional</option>
                                <option value="Platinum" <?php if($listing_info['package'] == 'Platinum' ) { echo "selected";} ?>>Platinum</option>  
                            </select>
                            <span class="help-block error-message"><?php echo form_error('package'); ?></span>
                        </div> 
                    </div>
                     
                    <!-- /.col -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="expire_date">Expiry Date</label>
                            <input type="date" name="expire_date" class="form-control" value="<?php echo $listing_info['expire_date']; ?>" required />
                            <span class="help-block error-message"><?php echo form_error('expire_date'); ?></span>
                        </div>
                    </div>
                    <!-- /.col -->
                     
                </div>
                <!-- /.row -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <a href="<?php echo base_url('directory/categories.html'); ?>" class="btn btn-danger" data-toggle="tooltip" title="Go back"><i class="fa fa-remove"></i> Cancel</a>
                <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Update Status</button>
            </div>
        </form>
        <!-- /.form -->
    </div>
</section>
 