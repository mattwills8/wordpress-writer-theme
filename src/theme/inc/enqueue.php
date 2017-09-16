<?php

/**
 * Enqueue scripts and styles.
 */
function writer_scripts() {
    
    // theme stylesheet
	wp_enqueue_style( 'writer-style', get_stylesheet_uri() );
    
    // minified css incl boostrap 4
    wp_enqueue_style( 'main-css', get_template_directory_uri() . '/assets/css/main.css' );
    
    
    // enqueing jquery helpers
    wp_enqueue_script( 'jquery' );

    
    // minified and concated js
	wp_enqueue_script( 'main-js', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'writer_scripts' );

?>