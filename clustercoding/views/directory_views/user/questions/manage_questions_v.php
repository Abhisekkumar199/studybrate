<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<style>
    .keyword-table thead tr th{
        font-weight: bold;
        font-size: 14px;
    }
    .keyword-table tbody tr td{
        font-size: 14px;
    }
    .keyword-table tbody tr td a{
        font-size: 14px;
        text-align: left
    }
</style>
<div class="row content-title">
    <div class="col-md-6 col-sm-6 col-xs-6">
        <h6 class="pull-left"> Manage Question</h6>
    </div>
    <div class="col-md-6 col-sm-6 col-xs-6">
        <ul class="list-inline pull-right">
            <li><a href="<?php echo base_url('user/dashboard.html'); ?>"><i class="fa fa-home"></i> Dashboard</a></li> >
            <li><a class="active"> Manage Question</a></li>
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
        <table class="table table-striped keyword-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Question</th> 
                    <th>Teacher Answer</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $sl = 1; ?>
                <?php foreach ($questions_info as $v_questions_info) { ?>
                    <tr> 
                        <td><?php echo $v_questions_info['name']; ?></td>
                        <td><?php echo $v_questions_info['email']; ?></td>
                        <td><?php echo $v_questions_info['question']; ?></td> 
                        <td><?php echo $v_questions_info['answer']; ?></td>
                        <td>
                            <?php
                            $status = $v_questions_info['publication_status'];
                            if ($status == 1) {
                                echo "<a href='" . base_url('user/questions/unpublished_question/' . $v_questions_info['question_id'] . '.html') . "' class='btn btn-block btn-success btn-xs' data-toggle='tooltip' title='Click to unpublished'><i class='fa fa-arrow-down'></i> Published</a>";
                            } else {
                                echo "<a href='" . base_url('user/questions/published_question/' . $v_questions_info['question_id'] . '.html') . "' class='btn btn-block btn-warning btn-xs' data-toggle='tooltip' title='Click to published'><i class='fa fa-arrow-up'></i> Unpublished</a>";
                            }
                            ?>
                            <a href="<?php echo base_url('user/questions/remove_question/' . $v_questions_info['question_id'] . '.html'); ?>"><i class="fa fa-remove"></i> Delete</a>
                            <a href="<?php echo base_url('user/questions/reply/' . $v_questions_info['question_id'] . '.html') ?>" class="btn btn-success btn-xs  " data-toggle="tooltip" title="Reply">  Reply</a> 
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<!-- End Add Container -->