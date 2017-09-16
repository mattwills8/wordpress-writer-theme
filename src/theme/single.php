<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Writer
 */

get_header(); 

    $sidebar = writer_sidebar_options();

    ?>
	<div id="primary" class="content-area <?php echo $sidebar['class']; ?>">
		<main id="main" class="site-main">

		<?php
            
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_type() );

			the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php

if ( $sidebar['display'] == '1' ) {
    get_sidebar();
}
get_footer();
