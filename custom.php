<?php

/**
 * Functions applied to hooks and filters are defined in the theme's
 * functions.php file.
 */
require_once dirname(__FILE__) . '/functions.php';

/* Hooks */
add_plugin_hook('public_head', 'queue_theme_assets');
//add_plugin_hook('public_head', 'queue_slides_assets');

/* Filters */
add_filter(array('Display', 'Item', 'Item Type Metadata', 'URL'), 'make_url_link');
add_filter(array('Display', 'Item', 'Dublin Core', 'Subject'), 'make_subject_link');
