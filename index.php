<?php echo head(array('bodyid'=>'home')); ?>

<?php if ($introText = get_theme_option('Intro Text')): ?>
<div id="introduction">
<!-- <p>Take Back the Archive is a public history project created by UVa faculty, students, librarians, and archivists. It is meant to preserve, visualize, and contextualize the history of rape and sexual violence at the University of Virginia, honoring individual stories and documenting systemic issues and trends.</p> -->
<p><?php echo $introText; ?></p>
</div>
<?php endif; ?>

<?php if ($homepageText = get_theme_option('Homepage Text')): ?>
<div id="homepage-text">
<?php echo $homepageText; ?>
</div>
<?php endif; ?>

<nav id="homepage-navigation">
<a id="home-collections" href="/collections/">
    <img src="/themes/takeback/images/home_collections_image.png" alt="">
    Collections
</a>
<a id="home-exhibits" href="/exhibits/">
    <img src="/themes/takeback/images/home_exhibits_image.jpg" alt="">
    Exhibits
</a>
<a id="home-classroom" href="/classroom_use/">
    <img src="/themes/takeback/images/home_classroom_image.jpg" alt="">
    Classroom Use
</a>
</nav>

<?php fire_plugin_hook('public_append_to_home', array('view' => $this)); ?>

<?php echo foot(); ?>
