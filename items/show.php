<?php echo head(array('title' => metadata('item', array('Dublin Core', 'Title')), 'bodyclass' => 'items show')); ?>

<!-- START ITEM CONTENT: -->
<?php if (metadata('item', 'has files')): ?>
<?php echo video_files_for_item(); ?>
<?php endif; ?>

<!-- If date, display date as "Month [D/DD, no leading 0], YYYY" -->
<?php if($date = check_date_string(metadata('item', array('Dublin Core', 'Date')))): ?>
<em class="eyebrow dc-date"><?php echo date('F j, Y', $date); ?></em>
<?php endif; ?>

<!-- Item title: -->
<h1><?php echo metadata('item', array('Dublin Core', 'Title')); ?></h1>

<!-- If description, display item description. -->
<?php if ($description = metadata('item', array('Dublin Core', 'Description'))): ?>
<?php echo $description; ?>
<?php endif; ?>

<!-- The following returns all of the files associated with an item. -->
<?php if (metadata('item', 'has files')): ?>
<div id="item-files" class="element"> <!-- id DNE -->
    <h2><?php echo __('Files'); ?></h2>
    <div class="element-text"><?php echo files_for_item(array('imageSize' => 'fullsize')); ?></div>
    <div class="element-text"><?php echo files_for_item(array('imageSize' => 'square_thumbnail')); ?></div>
</div>
<?php endif; ?>

<?php
$fields = array(
  array('Dublin Core', 'Subject'),
  array('Item Type Metadata', 'URL')
);
?>

<table id="element-sets"> <!-- id DNE -->
<!-- Tag list: -->
<?php if (metadata('item', 'has tags')): ?>
<tr id="item-tags" class="element"> <!-- id yes -->
    <th><?php echo __('Tags'); ?></th>
    <td class="element-text"><?php echo tag_string('item'); ?></td>
</tr>
<?php endif;?>
<!-- Subject list: -->
<?php foreach ($fields as $field) : ?>
  <?php if ($field_value = metadata('item', $field, array('all' => true))): ?>
    <tr>
      <th><?php echo $field[1]; ?></th>
      <td><?php echo implode(', ', $field_value); ?></td>
    </tr>
  <?php endif; ?>
<?php endforeach; ?>
</table>

<!-- If the item belongs to a collection, the following creates a link to that collection. -->
<?php if (metadata('item', 'Collection Name')): ?>
<div id="item-collection" class="element"> <!-- id DNE -->
    <h2><?php echo __('Collection'); ?></h2>
    <div class="element-text"><p><?php echo link_to_collection_for_item(); ?></p></div>
</div>
<?php endif; ?>
<!-- END ITEM CONTENT-->

<?php fire_plugin_hook('public_items_show', array('view' => $this, 'item' => $item)); ?>

</div>

<nav class="item-pagination">
<ul class="navigation">
    <?php if ($previous = link_to_previous_item_show()): ?>
    <li id="previous-item" class="previous"><?php echo $previous; ?></li> <!-- id DNE -->
    <?php endif; ?>
    <?php if ($next = link_to_next_item_show()): ?>
    <li id="next-item" class="next"><?php echo $next; ?></li> <!-- id DNE -->
    <?php endif; ?>
</ul>
</nav>

<?php echo foot(); ?>
