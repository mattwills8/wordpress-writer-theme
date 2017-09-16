<?php

    /**
     * For full documentation, please visit: http://docs.reduxframework.com/
     * For a more extensive sample-config file, you may look at:
     * https://github.com/reduxframework/redux-framework/blob/master/sample/sample-config.php
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    // This is your option name where all the Redux data is stored.
    $opt_name = "redux_writer_theme";

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        'opt_name' => 'redux_writer_theme',
        'dev_mode' => TRUE,
        'use_cdn' => FALSE,
        'display_name' => 'Writer Theme',
        'display_version' => '1.0.0',
        'page_title' => 'Writer Options',
        'update_notice' => TRUE,
        'admin_bar' => TRUE,
        'menu_type' => 'menu',
        'menu_title' => 'Writer Options',
        'allow_sub_menu' => TRUE,
        'page_parent_post_type' => 'your_post_type',
        'page_priority' => TRUE,
        'customizer' => TRUE,
        'default_show' => TRUE,
        'default_mark' => '*',
        'google_api_key' => 'AIzaSyCKGcsjmKZNSkPVwXa_sZVMQleayIenpmo',
        'hints' => array(
            'icon' => 'el el-bulb',
            'icon_position' => 'right',
            'icon_color' => 'lightgray',
            'icon_size' => 'normal',
            'tip_style' => array(
                'color' => 'light',
                'style' => 'bootstrap',
            ),
            'tip_position' => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect' => array(
                'show' => array(
                    'effect' => 'slide',
                    'duration' => '500',
                    'event' => 'mouseover',
                ),
                'hide' => array(
                    'effect' => 'fade',
                    'duration' => '500',
                    'event' => 'mouseleave unfocus',
                ),
            ),
        ),
        'output' => TRUE,
        'output_tag' => TRUE,
        'settings_api' => TRUE,
        'cdn_check_time' => '1440',
        'compiler' => TRUE,
        'page_permissions' => 'manage_options',
        'save_defaults' => TRUE,
        'show_import_export' => TRUE,
        'database' => 'options',
        'transient_time' => '3600',
        'network_sites' => TRUE,
    );

    // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
    $args['share_icons'][] = array(
        'url'   => 'https://github.com/ReduxFramework/ReduxFramework',
        'title' => 'Visit us on GitHub',
        'icon'  => 'el el-github'
        //'img'   => '', // You can use icon OR img. IMG needs to be a full URL.
    );
    $args['share_icons'][] = array(
        'url'   => 'https://www.facebook.com/pages/Redux-Framework/243141545850368',
        'title' => 'Like us on Facebook',
        'icon'  => 'el el-facebook'
    );
    $args['share_icons'][] = array(
        'url'   => 'http://twitter.com/reduxframework',
        'title' => 'Follow us on Twitter',
        'icon'  => 'el el-twitter'
    );
    $args['share_icons'][] = array(
        'url'   => 'http://www.linkedin.com/company/redux-framework',
        'title' => 'Find us on LinkedIn',
        'icon'  => 'el el-linkedin'
    );

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */

    /*
     * ---> START HELP TABS
     */

    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => __( 'Theme Information 1', 'admin_folder' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'admin_folder' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => __( 'Theme Information 2', 'admin_folder' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'admin_folder' )
        )
    );
    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = __( '<p>This is the sidebar content, HTML is allowed.</p>', 'admin_folder' );
    Redux::setHelpSidebar( $opt_name, $content );


    /*
     * <--- END HELP TABS
     */


    /*
     *
     * ---> START SECTIONS
     *
     */

    Redux::setSection( $opt_name, array(
        'title'  => __( 'General', 'writer' ),
        'id'     => 'general_section',
        'desc'   => __( 'Main settings', 'writer' ),
        'fields' => array(
            array(
                'id'       => 'logo',
                'type'     => 'media',
                'title'    => __( 'Upload your logo', 'writer' ),
                'desc'     => __( 'Field Description', 'writer' ),
                'required' => array(
                    array('logo_display','!=','0')
                )
            ),
            array(
                'id'       => 'logo_mobile',
                'type'     => 'media',
                'title'    => __( 'Upload a mobile logo', 'writer' ),
                'desc'     => __( 'This should be smaller and more simplified', 'writer' ),
                'required' => array(
                    array('logo_display','!=','0')
                )
            )
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'  => __( 'Breadcrumb', 'writer' ),
        'id'     => 'general_breadcrumb_section',
        'desc'   => __( 'Breadcrumb Settings', 'writer' ),
        'subsection' => true,
        'fields' => array(
            array(
                'id'       => 'header_style',
                'type'     => 'button_set',
                'title'    => __( 'Header and Breadcrumb Style', 'writer' ),
                'options' => array(
                    'featured_image' => 'Featured Image', 
                    'title_banner' => 'Title Banner'
                 ), 
                'default' => 'featured_image'
            ),
            array(
                'id'       => 'breadcrumb_content',
                'type'     => 'button_set',
                'title'    => __( 'Breadcrumb Content', 'writer' ),
                'desc'     => __( 'Home page will display site identity regardless', 'writer' ),
                'options' => array(
                    'site_identity' => 'Site Identity', 
                    'page_info' => 'Page Info'
                 ), 
                'default' => 'page_info'
            ),
            // if page info
            array(
                'id'       => 'breadcrumb_title_display',
                'type'     => 'button_set',
                'title'    => __( 'Display the page title?', 'writer' ),
                'options' => array(
                    '1' => 'Yes', 
                    '0' => 'No'
                 ), 
                'default' => '1',
                'required' => array(
                    array('breadcrumb_content','!=','site_identity')
                )
            ),
            array(
                'id'       => 'breadcrumb_author_display',
                'type'     => 'button_set',
                'title'    => __( 'Display the post author?', 'writer' ),
                'desc'     => __( 'Only applies to posts', 'writer' ),
                'options' => array(
                    '1' => 'Yes', 
                    '0' => 'No'
                 ), 
                'default' => '1',
                'required' => array(
                    array('breadcrumb_content','!=','site_identity')
                )
            ),
            array(
                'id'       => 'breadcrumb_category_display',
                'type'     => 'button_set',
                'title'    => __( 'Display the post category?', 'writer' ),
                'desc'     => __( 'Only applies to posts', 'writer' ),
                'options' => array(
                    '1' => 'Yes', 
                    '0' => 'No'
                 ), 
                'default' => '1',
                'required' => array(
                    array('breadcrumb_content','!=','site_identity')
                )
            ),
            array(
                'id'       => 'breadcrumb_date_display',
                'type'     => 'button_set',
                'title'    => __( 'Display the post publish date?', 'writer' ),
                'desc'     => __( 'Only applies to posts', 'writer' ),
                'options' => array(
                    '1' => 'Yes', 
                    '0' => 'No'
                 ), 
                'default' => '1',
                'required' => array(
                    array('breadcrumb_content','!=','site_identity')
                )
            ),
            array(
                'id'       => 'breadcrumb_font_color',
                'type'     => 'color_rgba',
                'title'    => __( 'Breadcrumb Font Color', 'writer' ),
                'default'   => array(
                    'color'     => '#000',
                    'alpha'     => 1
                ),
                'options'       => array(
                    'show_input'                => true,
                    'show_initial'              => true,
                    'show_alpha'                => true,
                    'show_palette'              => true,
                    'show_palette_only'         => false,
                    'show_selection_palette'    => true,
                    'max_palette_size'          => 10,
                    'allow_empty'               => true,
                    'clickout_fires_change'     => false,
                    'choose_text'               => 'Choose',
                    'cancel_text'               => 'Cancel',
                    'show_buttons'              => true,
                    'use_extended_classes'      => true,
                    'palette'                   => null,  // show default
                    'input_text'                => 'Select Color'
                ),
                'required' => array(
                    array('breadcrumb_content','!=','site_identity')
                )
            )
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'  => __( 'Sidebar', 'writer' ),
        'id'     => 'general_sidebar',
        'desc'   => __( 'Sidebar Settings', 'writer' ),
        'subsection' => true,
        'fields' => array(
            array(
                'id'       => 'sidebar_home_display',
                'type'     => 'button_set',
                'title'    => __( 'Display the sidebar on the homepage?', 'writer' ),
                'options' => array(
                    '1' => 'Yes', 
                    '0' => 'No'
                 ), 
                'default' => '0'
            ),
            array(
                'id'       => 'sidebar_post_display',
                'type'     => 'button_set',
                'title'    => __( 'Display the sidebar on single post pages?', 'writer' ),
                'options' => array(
                    '1' => 'Yes', 
                    '0' => 'No'
                 ), 
                'default' => '0'
            ),
            array(
                'id'       => 'sidebar_page_display',
                'type'     => 'button_set',
                'title'    => __( 'Display the sidebar on generic pages?', 'writer' ),
                'options' => array(
                    '1' => 'Yes', 
                    '0' => 'No'
                 ), 
                'default' => '0'
            ),
            array(
                'id'       => 'sidebar_search_display',
                'type'     => 'button_set',
                'title'    => __( 'Display the sidebar on the search page?', 'writer' ),
                'options' => array(
                    '1' => 'Yes', 
                    '0' => 'No'
                 ), 
                'default' => '0'
            )
        )
    ) );







    Redux::setSection( $opt_name, array(
        'title' => __( 'Home', 'writer' ),
        'id'    => 'home_section',
        'desc'  => __( 'Home subsection', 'writer' ),
        'icon'  => 'el el-home'
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Header', 'writer' ),
        'desc'       => __( 'Header settings', 'writer' ),
        'id'         => 'header_section',
        'subsection' => true,
        'fields' => array(
            array(
                'id'       => 'header_featured_image',
                'type'     => 'media',
                'title'    => __( 'Upload your featured image', 'writer' ),
                'desc'     => __( 'Recommended dimensions: 1024x800', 'writer' ),
                'required' => array(
                    array('header_style','!=','title_banner')
                )
            ),
            array(
                'id'       => 'logo_display',
                'type'     => 'button_set',
                'title'    => __( 'Display your logo?', 'writer' ),
                'options' => array(
                    '1' => 'Yes', 
                    '0' => 'No'
                 ), 
                'default' => '1'
            ),
            array(
                'id'       => 'header_title_display',
                'type'     => 'button_set',
                'title'    => __( 'Display the site title?', 'writer' ),
                'options' => array(
                    '1' => 'Yes', 
                    '0' => 'No'
                 ), 
                'default' => '1'
            ),
            array(
                'id'       => 'header_desc_display',
                'type'     => 'button_set',
                'title'    => __( 'Display the site description?', 'writer' ),
                'options' => array(
                    '1' => 'Yes', 
                    '0' => 'No'
                 ), 
                'default' => '1'
            ),
            array(
                'id'       => 'header_desc',
                'type'     => 'textarea',
                'title'    => __( 'Write a site description', 'writer' ),
                'desc'     => __( 'Go on.. something snappy!', 'writer' ),
                'required' => array(
                    array('header_desc_display','!=','0')
                )
            ),
            array(
                'id'       => 'header_font_color',
                'type'     => 'color_rgba',
                'title'    => __( 'Header Font Color', 'writer' ),
                'required' => array(
                    array('header_desc_display','!=','0')
                ),
                'default'   => array(
                    'color'     => '#000',
                    'alpha'     => 1
                ),
                'options'       => array(
                    'show_input'                => true,
                    'show_initial'              => true,
                    'show_alpha'                => true,
                    'show_palette'              => true,
                    'show_palette_only'         => false,
                    'show_selection_palette'    => true,
                    'max_palette_size'          => 10,
                    'allow_empty'               => true,
                    'clickout_fires_change'     => false,
                    'choose_text'               => 'Choose',
                    'cancel_text'               => 'Cancel',
                    'show_buttons'              => true,
                    'use_extended_classes'      => true,
                    'palette'                   => null,  // show default
                    'input_text'                => 'Select Color'
                )
            )
        )
    ) );

    /*
     * <--- END SECTIONS
     */
