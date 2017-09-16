<?php
 if ( ! function_exists('writer_masthead') ){ function writer_masthead() { ob_start(); ?>
        <header id="masthead" class="site-header container-fluid">
            <div class="site-branding">
                <?php
 the_custom_logo(); if ( is_front_page() && is_home() ) : ?>
                    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                <?php else : ?>
                    <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                <?php
 endif; $description = get_bloginfo( 'description', 'display' ); if ( $description || is_customize_preview() ) : ?>
                    <p class="site-description"><?php echo $description; ?></p>
                <?php
 endif; ?>
            </div><!-- .site-branding -->

            <nav id="site-navigation" class="navbar main-navigation">
                <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'writer' ); ?></button>
                <?php
 wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'primary-menu', 'menu_class' => 'nav navbar-nav', 'container' => 'div', 'container_class' => 'collapse navbar-collapse', 'container_id' => '', 'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback', 'walker' => new WP_Bootstrap_Navwalker() ) ); ?>
            </nav><!-- #site-navigation -->
        </header><!-- #masthead -->
        <?php
 return ob_clean(); } } ?>