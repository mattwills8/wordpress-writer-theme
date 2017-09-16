<?php


if (! function_exists('writer_content_loop')) {
    function writer_content_loop() {
        
        if (has_post_thumbnail( get_the_ID() ) ) {

            $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
            $content_wrapper_style = "background-image: url('".$image[0]."');";
        }

        ?>

        <article id="post-<?php the_ID(); ?>" 
                 <?php post_class( array('col-md-6 article-loop') ); ?>>
            <div class="article-content-wrapper" style="<?php echo $content_wrapper_style; ?>" >
                
                <?php
        
                do_action('writer_entry_header_hook');
        
                do_action('writer_entry_content_hook');
        
                //do_action('writer_entry_footer_hook');
        
                ?>        

            </div>
        </article><!-- #post-<?php the_ID(); ?> -->

        <?php
    }
}


if (! function_exists('writer_entry_header')) {
    function writer_entry_header() {
        ?>

        <header class="entry-header">

            <?php
            if ( is_singular() ) :
                the_title( '<h1 class="entry-title">', '</h1>' );
            else :
                the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
            endif; 
        
            if ( 'post' === get_post_type() ) : ?>
            <div class="entry-meta-wrapper">
                <div class="entry-meta">
                    <?php the_time('j.n.Y'); ?>
                </div>
            </div><!-- .entry-meta -->
            <?php endif; ?>
            
        </header><!-- .entry-header -->

        <?php
    }
}



if (! function_exists('writer_entry_content')) {
    function writer_entry_content() {
        ?>

        <div class="entry-content">
            <?php
        
                the_excerpt();

                wp_link_pages( array(
                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'writer' ),
                    'after'  => '</div>',
                ) );
            ?>
        </div><!-- .entry-content -->

        <?php
    }
}



if (! function_exists('writer_entry_footer')) {
    function writer_entry_footer() {
        ?>

        <footer class="entry-footer">
            <?php writer_entry_footer(); ?>
        </footer><!-- .entry-footer -->

        <?php
    }
}
?>