<?php echo head(array('bodyid'=>'home')); ?>

<?php if ($homepageText = get_theme_option('Homepage Text')): ?>
<div id="homepage-text">
<?php echo $homepageText; ?>
</div>
<?php endif; ?>

<?php $exhibits = get_records('Exhibit'); ?>
<?php if (count($exhibits) > 0): ?>
<div class="exhibits">
<?php foreach ($exhibits as $exhibit): ?>
    <div class="exhibit">
        <h2><?php echo exhibit_builder_link_to_exhibit($exhibit); ?></h2>
        <?php if ($exhibitImage = record_image($exhibit)): ?>
            <?php echo exhibit_builder_link_to_exhibit($exhibit, $exhibitImage, array('class' => 'image')); ?>
        <?php endif; ?>
        <?php if ($exhibitDescription = metadata($exhibit, 'description', array('no_escape' => true))): ?>
        <div class="description"><?php echo $exhibitDescription; ?></div>
        <?php endif; ?>
    </div>

<?php endforeach; ?>
</div>
<?php endif; ?>

<?php fire_plugin_hook('public_append_to_home', array('view' => $this)); ?>

<?php echo foot(); ?>
