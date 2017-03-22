<?php
$pageTitle = __('Collections');
echo head(array('title'=>$pageTitle,'bodyid'=>'collections','bodyclass' => 'browse'));
?>
    <h1><?php echo $pageTitle; ?></h1>
    <?php if (total_records('Collection')): ?>
    <?php echo pagination_links(); ?>
    <ul class="collections gallery">
    <?php foreach (loop('collections') as $collection): ?>
    <li class="collection" id="collection-<?php echo metadata('collection', 'id'); ?>">
      <?php
        $link_string = '<div class="image"></div>'.metadata('collection', array('Dublin Core', 'Title'));
        echo link_to_collection($link_string); ?></li><!-- end class="collection" -->
    <?php endforeach; ?>
    </ul>
    <?php echo pagination_links(); ?>

    <?php else: ?>

    <p><?php echo __('There are no collections.'); ?></p>

    <?php endif; ?>

    <?php fire_plugin_hook('public_collections_browse', array('collections'=>$collections, 'view' => $this)); ?>

<?php echo foot(); ?>
