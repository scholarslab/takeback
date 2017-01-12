<?php
$collectionTitle = metadata('collection', 'display_title');
echo head(array('title'=> $collectionTitle, 'bodyclass' => 'collections show'));
?>

<article class="collection">
<header>
<h1><?php echo $collectionTitle; ?></h1>
<div class="collection-metadata">
<?php if ($description = metadata('collection', array('Dublin Core', 'Description'))): ?>
<div class="description"><?php echo $description; ?></div>
<?php endif; ?>
</div>
</header>
<div class="content">

</div>

<?php fire_plugin_hook('public_collections_show', array('view' => $this, 'collection' => $collection)); ?>
</article>

<?php echo foot(); ?>
