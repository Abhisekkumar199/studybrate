<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="row content-title">
    <div class="col-md-6 col-sm-6 col-xs-6">
        <h6 class="pull-left"> Reply Question</h6>
    </div>
    <div class="col-md-6 col-sm-6 col-xs-6">
        <ul class="list-inline pull-right">
            <li><a href="<?php echo base_url('user/dashboard.html'); ?>"><i class="fa fa-home"></i> Dashboard</a></li> > 
            <li><a class="active"> Reply Question</a></li>
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
    <div class="col-md-12 col-sm-12 col-xs-12">
        <?php
        $package_info = package_info();
        if (1) {
            ?>
            <form name="add_blog_form" class="custom-form" action="<?php echo base_url('user/questions/reply_process.html'); ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" id="question_id" name="question_id" value="<?php echo $question_id; ?>" />
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="blog_name">Question <span class="required-field">*</span></label>
                             <p style="text-align: left;"><?php echo $question; ?></p>
                        </div>
                    </div>
                    <!-- End Col -->
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="blog_details">Answer <span class="required-field">*</span></label>
                            <textarea rows="4" name="answer" class="form-control margin-top-5" id="answer" placeholder="Enter blog contents"><?php echo set_value('blog_details'); ?></textarea>
                            <span class="error-message"><?php echo form_error('blog_details'); ?></span>
                        </div>
                    </div>
                    
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <hr>
                        <a href="<?php echo base_url('user/blogs.html'); ?>" class="btn btn-danger btn-custom"><i class="fa fa-remove"></i> Cancel</a>
                        <button type="submit" class="btn btn-success btn-custom"><i class="fa fa-plus"></i> Add Info</button>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </form>
        <?php } else { ?>
            <p>You need to upgrade your package for add more blogs. Please upgrade your package.</p>
        <?php } ?>
    </div>
</div>
<!-- End Add Container -->

<script type="text/javascript">
    document.forms['add_blog_form'].elements['listing_id'].value = '<?php echo set_value('listing_id'); ?>';
</script>
