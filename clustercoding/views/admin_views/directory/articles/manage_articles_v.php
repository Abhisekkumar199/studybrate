<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Articles
        <small>Manage Articles</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard.html'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#"><i class="fa fa-cogs"></i> Directory</a></li>
        <li><a class="active"><i class="fa fa-cogs"></i> Manage Articles</a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Articles</h3>

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
                                <th>SL#</th>
                                <th>Article Title</th>
                                <th>Company</th>
                                <th>Category</th>
                                <th>City</th>
                                <th>Image</th>
                                <th>Date Added</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $sl = 1; ?>
                            <?php foreach ($articles_info as $v_article_info) { ?>
                                <tr>
                                    <td><?php echo $sl++; ?></td>
                                    <td><a target="_blank" href="<?php echo base_url('articles/article_details/' . $v_article_info['article_id'] . '.html'); ?>"><?php echo $v_article_info['article_name']; ?></a></td>
                                    <td><a target="_blank" href="<?php echo base_url('listing/listing_details/' . $v_article_info['listing_id'] . '.html'); ?>"><?php echo $v_article_info['company_name']; ?></a></td>
                                    <td><?php echo $v_article_info['category_name']; ?></td>
                                    <td><?php echo $v_article_info['city_name']; ?></td>
                                    <td>
                                        <?php
                                        $image_path = '';
                                        if (!empty($v_article_info['image_path'])) {
                                            $image_path = "assets/uploaded_files/company_articles/resize/" . $v_article_info['image_path'];
                                        } else {
                                            $image_path = "assets/uploaded_files/company_logo/logo_not_available.png";
                                        }
                                        ?>
                                        <img src="<?php echo base_url($image_path); ?>" width="70" alt="<?php echo $v_article_info['article_name']; ?>" class="img-responsive img-bordered img-rounded"/>
                                    </td>
                                    <td><?php echo date("d F Y", strtotime($v_article_info['date_added'])); ?></td>
                                    <td>
                                        <?php
                                        $status = $v_article_info['publication_status'];
                                        if ($status == 1) {
                                            echo "<a href='" . base_url('directory/listing/articles/unpublished/' . $v_article_info['article_id'] . '.html') . "' class='btn btn-block btn-success btn-xs' data-toggle='tooltip' title='Click to unpublished'><i class='fa fa-arrow-down'></i> Published</a>";
                                        } else {
                                            echo "<a href='" . base_url('directory/listing/articles/published/' . $v_article_info['article_id'] . '.html') . "' class='btn btn-block btn-warning btn-xs' data-toggle='tooltip' title='Click to published'><i class='fa fa-arrow-up'></i> Unpublished</a>";
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo base_url('directory/listing/articles/remove/' . $v_article_info['article_id'] . '.html') ?>" class="btn btn-danger btn-xs check_delete" data-toggle="tooltip" title="Delete"><i class="fa fa-remove"></i> Remove</a>
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



