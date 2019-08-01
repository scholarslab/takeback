<?php
$bodyclass = 'page simple-page';
if ($is_home_page):
    $bodyclass .= ' simple-page-home';
endif;

$page_slug = metadata('simple_pages_page', 'slug');

echo head(array(
    'title' => metadata('simple_pages_page', 'title'),
    'bodyclass' => $bodyclass,
    'bodyid' => $page_slug
));
?>

<div id="primary">
    <?php if (!$is_home_page): ?>
    <h1><?php echo metadata('simple_pages_page', 'title'); ?></h1>
    <?php endif; ?>
<div class="page-text">
    <?php
    $text = metadata('simple_pages_page', 'text', array('no_escape' => true));
    echo $this->shortcodes($text);
?>
</div>
<?php if ($page_slug != 'classroom_use'): ?>
    <nav id="simple-pages-navigation">
<?php echo simple_pages_navigation(); ?>
    </nav>
<?php endif;?>
</div>

<?php echo foot(); ?>
