<?php
 get_header(); $sidebar = writer_sidebar_options(); ?>

	<div id="primary" class="content-area <?php echo $sidebar['class']; ?>">
		<main id="main" class="site-main row">

		<?php
 if ( have_posts() ) : if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>

			<?php
 endif; while ( have_posts() ) : the_post(); get_template_part( 'template-parts/content', get_post_format() ); endwhile; the_posts_navigation(); else : get_template_part( 'template-parts/content', 'none' ); endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
 if ( $sidebar['display'] == '1' ) { get_sidebar(); } get_footer(); 