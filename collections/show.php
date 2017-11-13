<?php
$collectionTitle = metadata('collection', 'display_title');
echo head(array('title'=> $collectionTitle, 'bodyclass' => 'collections show'));
$totalItems = metadata('collection', 'total_items');
$myId = metadata('collection', 'id');
$myItems = get_records('Item', array('collection_id' => $myId), $totalItems); // 10/23 - make commit for this
$years = array();
?>

<!-- Calculate date range: -->
<?php foreach (loop('items', $myItems) as $item): ?>
<?php if($date = check_date_string(metadata('item', array('Dublin Core', 'Date')))): ?>
    <?php $years[] = date('Y', $date); ?>
<?php endif; ?>
<?php endforeach; ?>

<article class="my-collection" id="collection-<?php echo metadata('collection', 'id'); ?>">
<!-- Landing page -->
<header>
    <div class="small-diagonal"></div>
    <div class="big-diagonal"></div>
    <div class="title">
        <span>COLLECTION</span><br/>
        <h1><?php echo $collectionTitle; ?></h1>
    </div>
</header>

<div class="content">

    <div class="line-wrapper">
        <div class="item-wrapper">
            <div class="vertical-line"></div>
        </div>
        <!-- Summary statistics: -->
        <div class="collection-stats">
            <div>Summary Statistics</div>
            <?php if ($totalItems > 0): ?>
            <span>Number of Records:</span> <?php echo $totalItems . " " . $hasURL . " " . $hasFiles; ?><br/>
            <?php endif; ?>
            <span>Year Range:</span> <?php echo min($years) . ' - ' . max($years); ?><br/> <!-- LOOP -->
            <span>Collection ID:</span> <?php echo $myId; ?>
        </div>
    </div> <!-- end ".line-wrapper" -->
    
    <!-- Description: -->
    <?php if ($description = metadata('collection', array('Dublin Core', 'Description'))): ?>
    <div class="description"><span>DESCRIPTION</span><br/><?php echo $description; ?></div>
    <?php endif; ?>

    <div class="the-collection">Gallery</div>

    <div class="gallery-bg">
    <div class="item-container">
    <!-- Loop through items: -->
    <?php foreach (loop('items', $myItems) as $item): ?>
    <?php $itemTitle = metadata('item', 'display_title'); // NB: this is setting var, not printing anything ?> 
    <!-- Display files, title, and date for each item: -->
    <div class="item record entry">
        <!-- Files -->
        <?php if (metadata('item', 'has files')): ?>
        <div class="item-img">
    	   <span><?php echo __('File Preview:'); ?></span>
            <?php echo link_to_item(item_image('thumbnail')); ?>
        </div>
        <?php endif; ?>
        <!-- Title -->
        <span><?php echo __('Title:'); ?></span>
        <?php echo link_to_item($itemTitle, array('class'=>'permalink')); ?>
        <!-- Date -->
        <?php if($date = check_date_string(metadata('item', array('Dublin Core', 'Date')))): ?>
        <span><?php echo __('Date:'); ?></span>
	   <div class="date"><?php echo date('F j, Y', $date); ?></div>
	   <?php $years[] = date('Y', $date); ?>
	   <?php endif; ?>
    </div>
    <?php endforeach; ?>
    <!-- End loop -->
    </div>
    </div>

<?php fire_plugin_hook('public_collections_show', array('view' => $this, 'collection' => $collection)); ?>
</article>

<?php echo foot(); ?>
