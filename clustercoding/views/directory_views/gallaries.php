<div class="container margin_60_35">
  <div class="main_title_2">
    <span><em></em></span>
    <h2>All Blogs</h2>
    <p>Read popluar blogs published by to Tutors.</p><p><img src="img/rec.svg" alt="" width="20"> 1 Lakhs + Active students</p>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="row">
        <?php foreach ($all_blogs as $blog): ?>


        <div class="col-md-4">
          <article class="blog">
            <figure>
              <a href="<?php echo base_url('blogs/blog_details/' . $blog['blog_id'] . '.html'); ?>"><img src="<?php echo base_url('assets/uploaded_files/company_blogs/' . $blog['image_path']); ?>" alt="">
                <div class="preview"><span>Read more</span></div>
              </a>
            </figure>
            <div class="post_info">
              <small>Written By : <?php echo $blog['company_name']; ?><br>Specialized in : <?php echo $blog['subjects']; ?></small>
              <h2><a href="<?php echo base_url('blogs/blog_details/' . $blog['blog_id'] . '.html'); ?>"><?php echo $blog['blog_name']; ?></a></h2>
              <p><?php echo $character = character_limiter($blog['blog_name'], 15); ?></p>

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
