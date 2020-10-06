<?php
/**
 * Template Name: My Docs
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Interface
 */

get_header();
?>
<div id="content-wrapper" class="d-flex flex-column">

<!-- Main Content -->
<div id="content">
<main id="primary" class="site-main">
              <!-- DataTales Example -->
              <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"><?php the_title();?></h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">

    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Download</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Name</th>
                   
                      <th>Download</th>
                    </tr>
                  </tfoot>
                  <tbody>
<?php foreach (get_docs(get_current_user_id()) as $mypost): ?>


                    <tr>
                      <td><?php echo $mypost->post_title;?></td>
               
                      <td><a class="btn btn-primary" href="<?php echo $mypost->guid;?>">Download</a></td>
                    </tr>
<?php endforeach;?>

                  </tbody>
    </table>
              </div>
            </div>
              </div>
            
	</main><!-- #main -->
</div>
<!-- End of Main Content -->

<?php

get_footer();
