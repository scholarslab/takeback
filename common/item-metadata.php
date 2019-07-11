<?php foreach ($elementsForDisplay as $setName => $setElements): ?>
<div class="element-set">
    <?php if ($showElementSetHeadings): ?>
    <h2><?php echo html_escape(__($setName)); ?></h2>
    <?php endif; ?>
    <table>
    <?php foreach ($setElements as $elementName => $elementInfo): ?>
    <?php if ($setName == 'Dublin Core' && ($elementName == 'Title' || $elementName == 'Description')) continue; ?>
    <tr id="<?php echo text_to_id(html_escape("$setName $elementName")); ?>" class="element">
        <th><?php echo html_escape(__($elementName)); ?></th>
        <td>
        <?php foreach ($elementInfo['texts'] as $text): ?>
        <div class="element-text"><?php echo $text; ?></div>
        <?php endforeach; ?>
        </td>
    </tr><!-- end element -->
    <?php endforeach; ?>
    </table>
</div><!-- end element-set -->
<?php endforeach; ?>