
<div class="container margin_80_55">
  <div class="main_title_2">
    <span><em></em></span>
    <h2>All Questions/Answers</h2>
    <p>Get free response from tutor within few minutes.</p><p><img src="img/rec.svg" alt="" width="20"> 1 Lakhs + Active students</p>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="row">
<?php foreach ($qa as $qa) {?>


          <div class="col-md-6">
            <article class="blog">

              <div class="post_info">
                <small>A User from <?php echo $qa['city'];?> asked ..</small>
                <h2><a href="#"><?php echo $qa['question']; ?></a></h2>
                <ul>
                  <li>
                    <div class="thumb"><img src="img/avatar.jpg" alt=""></div> <?php if(!empty($qa['first_name'])){echo $qa['first_name'].' '.$qa['last_name'].' Answered :';}else{echo 'Not Answered Yet !!!';} ?>  <p><?php echo $qa['content']; ?></p>
                  </li>
                  <li><i class="ti-comment"></i></li>
                </ul>
              </div>
            </article>
            <!-- /article -->
          </div>
      <?php    }?>
</div>
</div>
</div>
</div>
