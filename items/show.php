<?php 
echo head(array('title' => metadata('item', array('Dublin Core', 'Title')), 'bodyclass' => 'items show'));
// set vars for carousel:
$currentItem = get_current_record('item');
$collection = get_collection_for_item();
$totalItems = metadata($collection, 'total_items');
$myId = metadata($collection, 'id');
$collectionItems = get_records('Item', array('collection_id' => $myId), $totalItems);
?>

<!-- Carousel gallery if item associated with collection. -->
<?php if ($collection): ?>
<?php $startTime = microtime(true); ?>
<div class="carousel-wrapper--top">
  <div class="carousel-wrapper--visible">
    <button class="carousel-btn left">&laquo;</button>
    <button class="carousel-btn right">&raquo;</button>
    <div class="carousel-overflow-mask">
      <div class="carousel-item-container" data-item="<?php echo metadata('item','id')?>">
        <?php $imageDataArray = array(); ?>
        <?php foreach (loop('items', $collectionItems) as $item): ?>
        <div class="carousel-item">
          <?php if (metadata('item', 'has files')): ?>
          <?php $text = item_image('square_thumbnail') . '<div>' . metadata('item', 'display_title') . '</div>';
                array_push($imageDataArray, array(link_to_item($text, array('class' => 'download-file')), metadata('item', 'id')));
          ?>
          <?php // echo link_to_item($text, array('class' => 'download-file')); ?>
          <?php endif; ?>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</div>
<?php echo "Time:  " . number_format(( microtime(true) - $startTime), 4) . " Seconds\n"; ?>
<?php endif; ?>

<?php
// Reset current item after carousel:
set_current_record('item', $currentItem);
?>

<!-- Item image or URL: -->
<?php if (metadata('item', 'has files')): ?>
<?php echo video_files_for_item(); ?>
<div class="item-files">
  <div class="files__pic">
    <?php echo files_for_item(array('imageSize' => 'fullsize'), array()); ?>
    <div class="pic__click-note"><?php echo __('Click image for full-page PDF scan.'); ?></div>
  </div>
</div>
<?php elseif ($url = metadata('item', array('Item Type Metadata', 'URL'))): ?>
<div class="item-url">
    <?php echo __('URL: ') . $url; ?>
</div>
<?php elseif ($itemText = metadata('item', array('Item Type Metadata', 'Text'))): ?>
<div class="item-text">
    <?php // put this later: echo __('Transcription: ') . $itemText; ?>
</div>
<?php endif; ?>

<div class="item-information"><?php echo __('Item Information'); ?></div>
<div class="item-grid-wrapper">
  <div class="item-title">
    <span><?php echo __('Title') ?></span><br/>
    <?php echo metadata('item', array('Dublin Core', 'Title')); ?>
  </div>

  <div class="item-stats">
    <?php
    $date = check_date_string(metadata('item', array('Dublin Core', 'Date')));
    $source = metadata('item', array('Dublin Core', 'Source'));
    $itemId = metadata('item', 'id');
    $itemType = metadata('item', 'item_type_name');
    ?>
    <div><?php echo __('Summary Statistics'); ?></div>
    <!-- If date, display date as "Month [D/DD, no leading 0], YYYY" -->
    <?php if ($date): ?>
    <span><?php echo __('Date'); ?>:</span><?php echo date('F j, Y', $date); ?><br/>
    <?php endif; ?>
    <!-- Source of item: -->
    <?php if ($source): ?>
    <span><?php echo __('Source'); ?>:</span><?php echo $source; ?><br/>
    <?php endif; ?>
    <!-- Unique ID: -->
    <span><?php echo __('Item ID'); ?>:</span><?php echo $itemId; ?><br/>
    <!-- Type of resource: -->
    <?php if ($itemType): ?>
    <span><?php echo __('Item Type'); ?>:</span><?php echo $itemType; ?>
    <?php endif; ?>
  </div>

  <?php if ($description = metadata('item', array('Dublin Core', 'Description'))): ?>
  <div class="item-description">
    <span><?php echo __('Description'); ?></span><br/>
    <?php echo $description; ?>
  </div>
  <?php endif; ?>

  <div class="the-relationships"><?php echo __('Relationship to Other Items'); ?></div>
  <div class="relationships-wrapper">
    <?php if ($collection): ?>
    <div class="item-collection">
      <span><?php echo __('Collection'); ?></span><span><br/></span>
      <?php echo link_to_collection_for_item() ?>
    </div>
    <?php endif; ?>
    <?php if (metadata('item', 'has tags')): ?>
    <div class="item-tags">
      <span><?php echo __('Tags'); ?></span><span><br/></span>
      <?php echo tag_string('item', 'items/browse', array('tag_delimiter' => '')); ?>
    </div>
    <?php endif; ?>
    <?php if ($subjects = metadata('item', array('Dublin Core', 'Subject'), array('all' => true))): ?>
    <div class="item-subjects">
      <span><?php echo __('LoC Subject Headings'); ?></span><span><br/></span>
      <?php echo implode('', $subjects); ?>
    </div>
    <?php endif; ?>
  </div>
</div>

<?php $json = json_encode($imageDataArray); ?>
<script>
  var imageDataArray = <?php echo $json; ?>;
  var itemId = <?php echo metadata($currentItem, 'id'); ?>;
</script>
<?php fire_plugin_hook('public_items_show', array('view' => $this, 'item' => $item)); ?>
<?php echo foot(); ?>
