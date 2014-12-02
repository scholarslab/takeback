<!DOCTYPE html>
<html lang="<?php echo get_html_lang(); ?>" class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?php echo option('site_title'); echo isset($title) ? ' | ' . strip_formatting($title) : ''; ?></title>
    <meta name="viewport" content="width=device-width">

    <?php echo auto_discovery_link_tags(); ?>

   <?php fire_plugin_hook('public_head', array('view'=>$this)); ?>

    <!-- Style Sheets -->
    <?php echo head_css(); ?>

    <!-- JavaScripts -->
    <?php echo head_js(); ?>
</head>

<?php echo body_tag(array('id' => @$bodyid, 'class' => @$bodyclass)); ?>
<a class="audible" href="#main">Skip to main content</a>
    <?php fire_plugin_hook('public_body', array('view'=>$this)); ?>
    <header role="banner" id="banner">
    <?php echo link_to_home_page('<span>Take Back</span> <span>the Archive</span>', array('id' => 'homelink')); ?>
    </header>

    <main id="main" role="main">

        <?php fire_plugin_hook('public_content_top', array('view'=>$this)); ?>

