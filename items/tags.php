<?php
$pageTitle = __('Item Tags');
echo head(array('title'=>$pageTitle, 'bodyclass'=>'items tags'));
?>

<h1><?php echo $pageTitle; ?></h1>

<?php echo tag_cloud($tags, 'items/browse'); ?>

<?php echo foot(); ?>
