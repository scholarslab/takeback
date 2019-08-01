<?php
$title = __('Browse Exhibits');
echo head(array('title' => $title, 'bodyclass' => 'exhibits browse'));
?>

<h1><?php echo $title; ?></h1>
<?php if (count($exhibits) > 0): ?>
<div class="exhibits">
    <div class="exhibit">
        <h2><a href="/administrative-timeline/">Administrative Timeline</a></h2>
        <a class="image" href="/administrative-timeline"><img alt="" src="/themes/takeback/images/administrative-timeline.png"></a>
        <div class="description">
        Expulsions. Vigils. Task forces. Policies. Protests. Excuses. This timeline charts administrative responses to reports of sexual violence from 1824, five years after the University’s founding, through 2015, in the aftermath of the Rolling Stone article, “A Rape on Campus.”
        </div>
     </div>
<?php foreach ($exhibits as $exhibit): ?>
    <div class="exhibit">
        <h2><?php echo exhibit_builder_link_to_exhibit($exhibit); ?></h2>
        <?php 
        $exhibitImage = false;
        
        if ($exhibit->id == '4') {
            $exhibitImage = '<img alt="" src="'.img('exhibit-4.jpg').'">';
        } else {
            $exhibitImage = record_image($exhibit);
        }

        ?>
        <?php if ($exhibitImage): ?>
            <?php echo exhibit_builder_link_to_exhibit($exhibit, $exhibitImage, array('class' => 'image')); ?>
        <?php endif; ?>
        <?php if ($exhibitDescription = metadata($exhibit, 'description', array('no_escape' => true))): ?>
        <div class="description"><?php echo $exhibitDescription; ?></div>
        <?php endif; ?>
    </div>

<?php endforeach; ?>
</div>
<?php endif; ?>

<?php echo foot(); ?>
