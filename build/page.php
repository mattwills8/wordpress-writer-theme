<?php
 get_header(); $sidebar = writer_sidebar_options(); ?>
	<div id="primary" class="content-area <?php echo $sidebar['class']; ?>">
		<main id="main" class="site-main">

			<?php
 while ( have_posts() ) : the_post(); get_template_part( 'template-parts/content', 'page' ); if ( comments_open() || get_comments_number() ) : comments_template(); endif; endwhile; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
 if ( $sidebar['display'] == '1' ) { get_sidebar(); } get_footer(); 