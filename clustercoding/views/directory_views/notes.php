<div class="container margin_60_35">
  <div class="main_title_2">
    <span><em></em></span>
    <h2>All Notes</h2> 
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="row">
        <?php foreach ($all_notes as $note): ?>


        <div class="col-md-4">
          <article class="blog"> 
            <figure>
              <a href="<?php echo base_url('notes/note_details/' . $note['note_id'] . '.html'); ?>"><img src="https://studybrate.com/img/notes.jpg" width="270" alt="listing item">
                <div class="preview"><span>Read more</span></div>
              </a>
            </figure>
            <div class="post_info">
              <small>Written By : <?php echo $note['company_name']; ?><br>Specialized in : <?php echo $note['subjects']; ?></small>
              <h2><a href="<?php echo base_url('notes/note_details/' . $note['note_id'] . '.html'); ?>"><?php echo $note['note_name']; ?></a></h2>
              <p><?php echo $character = character_limiter($note['note_name'], 15); ?></p> 
            </div>
          </article>
          <!-- /article -->
        </div>
        <!-- /col -->
<?php endforeach; ?>
      </div>
      <!-- /row -->
      <!-- /pagination -->
    </div>
    <!-- /col -->


    <!-- /aside -->
  </div>
  <!-- /row -->
</div>
