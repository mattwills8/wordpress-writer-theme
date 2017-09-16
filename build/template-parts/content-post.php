<?php
 ?>


<?php  if (has_post_thumbnail( get_the_ID() ) ) { $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' ); $avatar_src = $image[0]; } ?>

<article id="post-<?php the_ID(); ?>" <?php post_class( array('article-single') ); ?>>
    
	<header class="entry-header">
        <h3 class="single-author">
		  <?php the_author(); ?>
        </h3>
        <div class="author-avatar-wrapper">
            <img class="author-avatar" src="<?php echo $avatar_src; ?>">
        </div>
        
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
 the_content(); wp_link_pages( array( 'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'writer' ), 'after' => '</div>', ) ); ?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
 edit_post_link( sprintf( wp_kses( __( 'Edit <span class="screen-reader-text">%s</span>', 'writer' ), array( 'span' => array( 'class' => array(), ), ) ), get_the_title() ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
