<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="row content-title">
    <div class="col-md-6 col-sm-6 col-xs-6">
        <h6 class="pull-left"> Edit note</h6>
    </div>
    <div class="col-md-6 col-sm-6 col-xs-6">
        <ul class="list-inline pull-right">
            <li><a href="<?php echo base_url('user/dashboard.html'); ?>"><i class="fa fa-home"></i> Dashboard</a></li> >
            <li><a href="<?php echo base_url('user/notes.html'); ?>"> Manage notes</a></li> > 
            <li><a class="active"> Edit note</a></li>
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

        <form name="edit_note_form" class="custom-form" action="<?php echo base_url('user/notes/update_note_details/' . $note_info['note_id'] . '.html'); ?>" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group custom-group">
                        <label for="note_name">Title <span class="required-field">*</span></label>
                        <input type="text" name="note_name" value="<?php echo $note_info['note_name']; ?>" class="form-control margin-top-5" id="note_name" placeholder="Enter company name">
                        <span class="error-message"><?php echo form_error('note_name'); ?></span>
                    </div>
                </div>
                <!-- End Col -->
                <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="note_details">note Details <span class="required-field">*</span></label>
                            <textarea rows="4" name="note_details" class="form-control margin-top-5" id="note_details" placeholder="Enter note details"><?php echo $note_info['note_details']; ?></textarea>
                            <span class="error-message"><?php echo form_error('note_details'); ?></span>
                        </div>
                    </div>
                    <!-- End Col -->
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="listing_id">Company Name <span class="required-field">*</span></label>
                        <select name="listing_id" class="form-control margin-top-5" id="listing_id">
                            <option value="" selected="" disabled="">Select one</option>
                            <?php
                            foreach ($listing_info as $v_listing_info) {
                                echo "<option value='" . $v_listing_info['listing_id'] . "'>" . $v_listing_info['company_name'] . "</option>";
                            }
                            ?>
                        </select>
                        <span class="error-message"><?php echo form_error('listing_id'); ?></span>
                    </div>
                </div> 
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label for="picture_name">Upload Picture <span class="required-field">*</span></label>
                        <input name="picture_name[]" class="margin-top-5" type="file" id="picture_name" multiple="multiple">
                        <span class="help-block"><strong>Note:</strong> Only .jpg .png .jpeg .gif allowed. <br>(width blog will better view such as <strong>320x480</strong> pixel)</span>
                        <span class="error-message"><?php echo form_error('picture_name'); ?></span>
                    </div>
                </div>
                <!-- End Col -->
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group"> 
                            <?php foreach ($notes_images as $notes_image) { ?> 
                                <div class="col-md-3">
                                <img src="<?php echo base_url('assets/uploaded_files/company_notes/' . $notes_image['image']); ?>" width="80" alt="<?php echo $notes_image['image']; ?>">
                                </div>   
                        <?php } ?>
                    </div>
                </div>
                <!-- End Col -->
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <hr>
                    <a href="<?php echo base_url('user/notes.html'); ?>" class="btn btn-danger btn-custom"><i class="fa fa-remove"></i> Cancel</a>
                    <button type="submit" class="btn btn-success btn-custom"><i class="fa fa-plus"></i> Update Info</button>
                </div>
                <!-- End Col -->
            </div>
            <!-- End Row -->
        </form>

    </div>
</div>
<!-- End Add Container -->

<script type="text/javascript">
    document.forms['edit_note_form'].elements['listing_id'].value = '<?php echo $note_info['listing_id']; ?>';
</script>
