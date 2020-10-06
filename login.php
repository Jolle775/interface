<?php
/**
 * Template Name: login
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

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->
</div>
<!-- End of Main Content -->

<?php

get_footer();
