<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="row content-title">
    <div class="col-md-6 col-sm-6 col-xs-6">
        <h6 class="pull-left"> Answer Questions</h6>
    </div>
    <div class="col-md-6 col-sm-6 col-xs-6">
        <ul class="list-inline pull-right">
            <li><a href="<?php echo base_url('user/dashboard.html'); ?>"><i class="fa fa-home black"></i> Dashboard</a></li> >
            <li><a class="active"> </a></li>
        </ul>
    </div>
</div>

<div class="listing-section">
    <div class=""><!-- section container -->
        <div class="add-listing-wrapper">



            <div class="listing-main gridview tab-content padding-top-30">
                <div id="latest-listing" class="tab-pane active">
                    <div class="listing-wrapper three-column row">

                        <?php foreach ($qa as $q) { ?>
                            <div class="item col-md-4 col-sm-6 col-xs-12"><!-- .ITEM -->
                                <div class="listing-item clearfix">

                                    <div class="listing-content clearfix">
                                        <div class="listing-meta-cat" style="top: -42px;">
                                            <a class="bgorange-1" style="height: 25px;width: 25px;"><i class="fa fa-question-circle"></i></a><br><br><br>
                                        </div>
                                        <div class="listing-title">
                                            <h6><?php echo $q['name'].' Asked '; ?></h6>
                                              <p><?php echo $q['question'] ?></p>
                                        </div>
                                        <div class="listing-disc">
                                            <p><?php echo $q['question'] ?></p>
                                        </div>
                                        <div class="listing-location pull-left"><!-- location-->
                                        <form class="" action="<?php echo base_url(); ?>Home/ans_q" method="post">
                                          <input type="hidden" name="uid" value="<?php echo $this->session->userdata('user_id'); ?>">
                                          <input type="hidden" name="qid" value="<?php echo $q['id']; ?>">
                                          <textarea name="answer" rows="8" cols="25" placeholder="answer this question"></textarea>
                                          <input type="submit" name="" class="btn" value="Answer">
                                        </form>
                                        </div><!-- location end-->
                                        <!--<div class="star-rating pull-right"> rating
                                            <div class="score-callback" data-score="5"></div>
                                        </div>-->
                                        <!-- rating end-->
                                    </div>
                                </div>
                                <div class="listing-border-bottom bgorange-1"></div>
                            </div><!-- /.ITEM -->
                        <?php } ?>

                    </div>
                </div>
            </div>
        </div>
    </div><!-- section container end -->
</div>
