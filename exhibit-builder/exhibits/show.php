<?php
echo head(array(
    'title' => metadata('exhibit_page', 'title') . ' &middot; ' . metadata('exhibit', 'title'),
    'bodyclass' => 'exhibits show'));
?>
<nav id="exhibit-pages">
    <strong><?php echo exhibit_builder_link_to_exhibit($exhibit); ?></strong>
    <?php echo exhibit_builder_page_tree($exhibit, $exhibit_page); ?>
</nav>

<h1><span class="exhibit-page"><?php echo metadata('exhibit_page', 'title'); ?></span></h1>

<div id="exhibit-blocks">
<?php exhibit_builder_render_exhibit_page(); ?>
</div>

<div id="exhibit-page-navigation">
    <?php if ($prevLink = exhibit_builder_link_to_previous_page()): ?>
    <div id="exhibit-nav-prev">
    <?php echo $prevLink; ?>
    </div>
    <?php endif; ?>
    <?php if ($nextLink = exhibit_builder_link_to_next_page()): ?>
    <div id="exhibit-nav-next">
    <?php echo $nextLink; ?>
    </div>
    <?php endif; ?>
</div>
<?php echo foot(); ?>
