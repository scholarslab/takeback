<?php
$collectionTitle = metadata('collection', 'display_title');
echo head(array('title'=> $collectionTitle, 'bodyclass' => 'collections show'));
$totalItems = metadata('collection', 'total_items');
?>

    <article class="collection" id="collection-<?php echo metadata('collection', 'id'); ?>">
<header>
<h1><?php echo $collectionTitle; ?></h1>
<?php if ($totalItems > 0): ?>
<em class="total-records"><?php echo $totalItems; ?> Items</em>
<?php endif; ?>
<div class="collection-metadata">
<?php if ($description = metadata('collection', array('Dublin Core', 'Description'))): ?>
<div class="description"><?php echo $description; ?></div>
<?php endif; ?>

</div>
</header>
<div class="content">
<ul class="gallery">
<?php foreach (loop('items') as $item): ?>
<?php $itemTitle = metadata('item', 'display_title'); ?>
<li class="item record hentry">
    <?php if (metadata('item', 'has files')): ?>
    <div class="item-img">
        <?php echo link_to_item(item_image('thumbnail')); ?>
    </div>
    <?php endif; ?>

    <?php echo link_to_item($itemTitle, array('class'=>'permalink')); ?>

</li>
<?php endforeach; ?>
</ul>
</div>

<?php fire_plugin_hook('public_collections_show', array('view' => $this, 'collection' => $collection)); ?>
</article>

<?php echo foot(); ?>
