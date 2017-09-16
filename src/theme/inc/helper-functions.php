<?php 

/**
 * Check sidebar display options
 */

function writer_sidebar_options(){
    
    $sidebar_disp = '0';
    $primary_classes = 'col-md-12';
    $type = 'page';
    
    if( is_home() || is_front_page() ) {
        $type = 'home';
    }
    if( get_post_type() === 'post' ) {
        $type = 'post';
    }
    if( is_search() ) {
        $type = 'search';
    } 
    
    $sidebar_option = 'sidebar_'.$type.'_display';
    if( writer_get_option($sidebar_option) == '1' ) {
        $sidebar_disp = '1';
        $primary_classes = 'col-md-8';
    }
    
    $sidebar = array(
        'display'   =>  $sidebar_disp,
        'class'     =>  $primary_classes
    );
    
    return $sidebar;
    
}



/**
 * Check redux options
 */

function writer_get_option( $option = ''){
    global $redux_writer_theme;
    
    $option_check = '';
    if (isset($redux_writer_theme[$option])) {
        $option_check =  $redux_writer_theme[$option];
    }

    $setting = '';
    if ($option_check != NULL) {
        $setting = $option_check;
    }
    
    return $setting;
}

