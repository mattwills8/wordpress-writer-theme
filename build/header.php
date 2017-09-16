<?php
 ?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site container-fluid">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'writer' ); ?></a>

	<?php do_action('writer_header_hook'); ?>

	<div id="content" class="site-content row">
