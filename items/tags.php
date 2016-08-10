<?php
$pageTitle = __('Item Tags');
echo head(array('title'=>$pageTitle, 'bodyclass'=>'items tags'));
?>

<h1><?php echo $pageTitle; ?></h1>

<?php echo tbta_tag_list(); ?>

<?php echo foot(); ?>
