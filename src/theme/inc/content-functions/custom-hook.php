<?php

/**
 * HEADER
 */

// header
add_action('writer_header_hook', 'writer_header');
// masthead
add_action('writer_masthead_hook', 'writer_masthead');
// site navigation
add_action('writer_site_navigation_hook', 'writer_site_navigation');


/**
 * BREADCRUMB
 */

// breadcrumb
add_action('writer_breadcrumb_hook', 'writer_breadcrumb');
// site branding
add_action('writer_site_branding_hook', 'writer_site_branding');
// breadcrumb none
add_action('writer_breadcrumb_none_hook', 'writer_breadcrumb_none');


/**
 * CONTENT LOOP
 */

// content loop
add_action('writer_content_loop_hook', 'writer_content_loop');
// entry header
add_action('writer_entry_header_hook', 'writer_entry_header');
// entry content
add_action('writer_entry_content_hook', 'writer_entry_content');
// entry footer
add_action('writer_entry_footer_hook', 'writer_entry_footer');
