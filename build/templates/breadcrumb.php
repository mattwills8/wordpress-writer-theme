<?php  if ( ! function_exists('writer_breadcrumb') ){ function writer_breadcrumb() { global $redux_writer_theme; $breadcrumb_content = $redux_writer_theme['breadcrumb_content']; if (is_home() || $breadcrumb_content === 'site_identity') { do_action('writer_site_branding_hook'); } else { do_action('writer_breadcrumb_none_hook'); } } } if ( ! function_exists('writer_site_branding') ){ function writer_site_branding() { global $redux_writer_theme; $site_branding_classes = $site_branding_style = $header_style = ''; $logo_display = $redux_writer_theme['logo_display']; $title_display = $redux_writer_theme['header_title_display']; $desc_display = $redux_writer_theme['header_desc_display']; $font_color = $redux_writer_theme['header_font_color']['rgba']; if ( $logo_display == '1' ) { $logo_src = $redux_writer_theme['logo']['url']; } if ( $font_color != '' ) { $header_style = 'color: '.$font_color.';'; } if ( $redux_writer_theme['header_style'] === 'featured_image' ) { $site_branding_classes = 'featured-image'; if ($redux_writer_theme['header_featured_image']['url'] != '' && is_home() ) { $featured_image_src = $redux_writer_theme['header_featured_image']['url']; $site_branding_style = "background-image: url('".$featured_image_src."');"; } } ?>
        <div class="breadcrumb-writer site-branding row <?php echo $site_branding_classes; ?>" style="<?php echo $site_branding_style; ?>">
                
            <?php if ( $logo_display == '1' ) { ?>
            <div class="logo-wrapper col-12">
                <img src="<?php echo $logo_src; ?>" class="logo">
            </div>
            <?php } ?>    

            <?php if ( $title_display == '1' ) { ?>
            <h1 class="site-title col-12"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" style="<?php echo $header_style; ?>"><?php bloginfo( 'name' ); ?></a></h1>
            <?php } ?>   
            
            
            <?php if ( $desc_display == '1' ) { $description = writer_get_option('header_desc'); if ( $description || is_customize_preview() ) : ?>
                    <div class="site-description col-12">
                        <h3 class="" style="<?php echo $header_style; ?>"><?php echo $description; ?></h3>
                    </div>
                <?php
 endif; } ?>
            
        </div><!-- .site-branding -->

        <?php
 } } if ( ! function_exists('writer_breadcrumb_none') ){ function writer_breadcrumb_none() { global $redux_writer_theme; $breadcrumb_none_classes = $breadcrumb_none_style = $header_style = ''; $title_display = $redux_writer_theme['breadcrumb_title_display']; $author_display = $redux_writer_theme['breadcrumb_author_display']; $category_display = $redux_writer_theme['breadcrumb_category_display']; $date_display = $redux_writer_theme['breadcrumb_date_display']; $font_color = $redux_writer_theme['breadcrumb_font_color']['rgba']; if ( $font_color != '' ) { $header_style = 'color: '.$font_color.';'; } if ( $redux_writer_theme['header_style'] === 'featured_image' ) { $breadcrumb_none_classes = 'featured-image'; if (has_post_thumbnail( get_the_ID() ) ) { $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' ); $breadcrumb_none_style .= "background-image: url('".$image[0]."');"; } } ?>
        <div class="breadcrumb-writer breadcrumb-none row <?php echo $breadcrumb_none_classes; ?>" style="<?php echo $breadcrumb_none_style; ?>">

            <div class="breadcrumb-content-wrapper">
                
                <?php if ( $title_display == '1' ) { ?>
                <div id="breadcrumb-title" class="breadcrumb-content"><?php the_title('<h1>'); ?></div>
                <?php } ?>

                <?php if ( $category_display == '1' ) { ?>
                <div id="breadcrumb-category" class="breadcrumb-content"><?php the_category( '<h3>' ); ?></div>
                <?php } ?>

                <?php if ( $date_display == '1' ) { ?>
                <div id="breadcrumb-date" class="breadcrumb-content"><?php the_time('j.n.Y'); ?></div>
                <?php } ?>
            
            </div>
        </div><!-- .breadcrumb_none -->

        <?php
 } } ?>