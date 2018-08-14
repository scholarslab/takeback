<?php
$bodyclass = 'page simple-page';
if ($is_home_page):
    $bodyclass .= ' simple-page-home';
endif;

echo head(array(
    'title' => metadata('simple_pages_page', 'title'),
    'bodyclass' => $bodyclass,
    'bodyid' => metadata('simple_pages_page', 'slug')
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
    <nav id="simple-pages-navigation">
<?php echo simple_pages_navigation(); ?>
    </nav>

</div>

<?php echo foot(); ?>
