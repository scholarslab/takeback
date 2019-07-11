<?php echo head(array('title' => metadata('item', array('Dublin Core', 'Title')), 'bodyclass' => 'items show')); ?>

<!-- START ITEM CONTENT: -->
<?php if (metadata('item', 'has files')): ?>
<?php echo video_files_for_item(); ?>
<?php endif; ?>

<?php

$eyebrow = array();
if($date = prettify_date(metadata('item', array('Dublin Core', 'Date')))) {
    $eyebrow[] = $date;
}

if ($publisher = metadata('item', array('Dublin Core', 'Publisher'))) {
    $eyebrow[] = '<i>'.$publisher.'</i>';
}
?>

<?php if(!empty($eyebrow)): ?>
<em class="eyebrow"><?php echo implode(" · ", $eyebrow); ?></em>
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
</div>
<?php endif; ?>

<?php echo all_element_texts('item', array('partial' => 'common/item-metadata.php', 'show_element_set_headings' => false)); ?>

<table id="element-sets"> <!-- id DNE -->

<!-- Tag list: -->
<?php if (metadata('item', 'has tags')): ?>
<tr id="item-tags" class="element"> <!-- id yes -->
    <th><?php echo __('Tags'); ?></th>
    <td class="element-text"><?php echo tag_string('item'); ?></td>
</tr>
<?php endif;?>
<tr>
      <th>Date Added</th>
      <td><?php echo prettify_date(metadata('item', 'added')); ?></td>
    </tr>
<tr>
      <th>Date Modifed</th>
      <td><?php echo prettify_date(metadata('item', 'modified')); ?></td>
    </tr>
    
<!-- If the item belongs to a collection, the following creates a link to that collection. -->
<?php if (metadata('item', 'Collection Name')): ?>
<tr id="item-collection" class="element"> <!-- id DNE -->
    <th><?php echo __('Collection'); ?></th>
    <td><?php echo link_to_collection_for_item(); ?></td>
</tr>
<?php endif; ?>
</table>

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
