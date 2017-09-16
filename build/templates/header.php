<?php
 if ( ! function_exists('writer_header') ){ function writer_header() { do_action('writer_breadcrumb_hook'); do_action('writer_masthead_hook'); } } if ( ! function_exists('writer_masthead') ){ function writer_masthead() { global $redux_writer_theme; $masthead_classes = $masthead_style = ''; if ( $redux_writer_theme['header_style'] === 'featured_image' ) { $masthead_classes = 'masthead-featured-image'; } ?>
        <header id="masthead" class="site-header row <?php echo $masthead_classes; ?>" style="<?php echo $masthead_style; ?>">
            
            <?php  do_action('writer_site_navigation_hook'); ?>
            
        </header><!-- #masthead -->

        <?php  } } if ( ! function_exists('writer_site_navigation') ){ function writer_site_navigation() { ?>
        
        <nav id="site-navigation" class="navbar main-navigation">
            <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'writer' ); ?></button>
            <?php
 wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'primary-menu', 'menu_class' => 'nav navbar-nav', 'container' => 'div', 'container_class' => 'navbar-collapse', 'container_id' => '', 'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback', 'walker' => new WP_Bootstrap_Navwalker() ) ); ?>
        </nav><!-- #site-navigation -->
        
        <?php
 } } ?>