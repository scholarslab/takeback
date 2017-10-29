<?php
$collectionTitle = metadata('collection', 'display_title');
echo head(array('title'=> $collectionTitle, 'bodyclass' => 'collections show'));
$totalItems = metadata('collection', 'total_items');
$myId = metadata('collection', 'id');
$myItems = get_records('Item', ['collection_id' => $myId], $totalItems); // 10/23 - make commit for this
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
<?php foreach (loop('items', $myItems) as $item): ?>
<?php $itemTitle = metadata('item', 'display_title'); // NB: this is setting var, not printing anything ?> 
<li class="item record hentry">
    <?php if (metadata('item', 'has files')): ?>
    <div class="item-img">
    	<span><?php echo __('File Preview:'); ?></span>
        <?php echo link_to_item(item_image('thumbnail')); ?>
    </div>
    <?php endif; ?>

    <span><?php echo __('Title:'); ?></span>
    <?php echo link_to_item($itemTitle, array('class'=>'permalink')); ?>

    <?php if($date = check_date_string(metadata('item', array('Dublin Core', 'Date')))): ?>
    <span><?php echo __('Date:'); ?></span>
	<em class="eyebrow dc-date"><?php echo date('F j, Y', $date); ?></em>
	<?php endif; ?>

</li>
<?php endforeach; ?>
</ul>
</div>

<?php fire_plugin_hook('public_collections_show', array('view' => $this, 'collection' => $collection)); ?>
</article>

<?php echo foot(); ?>
