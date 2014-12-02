<?php
$pageTitle = __('Browse Collections');
echo head(array('title'=>$pageTitle,'bodyid'=>'collections','bodyclass' => 'browse'));
?>
<div id="primary">
    <h1><?php echo $pageTitle; ?></h1>

    <?php if (total_records('Collection')): ?>
    <?php echo pagination_links(); ?>

    <?php foreach (loop('collections') as $collection): ?>
    <div class="collection">

        <h2><?php echo link_to_collection(); ?></h2>

        <?php if ($description = snippet_by_word_count(metadata('collection', array('Dublin Core', 'Description')), 50)): ?>
        <div class="description collection-description">
            <div class="element-text"><?php echo $description; echo link_to_collection('show more.');?></div>
        </div>
        <?php endif; ?>

        <div class="meta collection-meta">
            <?php if ($collection->hasContributor()): ?>
            <div class="element">
                <h3><?php echo __('Contributors(s)'); ?></h3>
                <div class="element-text">
                    <p><?php echo metadata('collection', array('Dublin Core', 'Contributor'), array('all'=>true, 'delimiter'=>', ')); ?></p>
                </div>
            </div>
            <?php endif; ?>

<p class="view-items-link">
<?php echo link_to_items_browse(
                __("Items"),
                array('collection' => metadata('collection', 'id')),
                array('title' => __('View the items in %s', strip_tags(metadata('collection', array('Dublin Core', 'Title')))))
                ); ?></p>

            <?php fire_plugin_hook('public_collections_browse_each', array('view' => $this, 'collection' => $collection)); ?>
        </div>

    </div><!-- end class="collection" -->
    <?php endforeach; ?>

    <?php echo pagination_links(); ?>

    <?php else: ?>

    <p><?php echo __('There are no collections.'); ?></p>

    <?php endif; ?>

    <?php fire_plugin_hook('public_collections_browse', array('collections'=>$collections, 'view' => $this)); ?>

</div><!-- end primary -->

<?php echo foot(); ?>
