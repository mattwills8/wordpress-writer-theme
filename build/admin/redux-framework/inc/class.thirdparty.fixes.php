<?php
 if ( ! defined( 'ABSPATH' ) ) { exit; } if ( has_action( 'ecpt_field_options_' ) ) { global $pagenow; if ( $pagenow === 'admin.php' ) { remove_action( 'admin_init', 'pb_admin_init' ); } }