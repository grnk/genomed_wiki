<?php

/**
 * @var $this yii\web\View
 * @var $id int
 * @var $title string
 * @var $order int
 * @var $parentId int
 * @var $sectionLevel int
 * @var $htmlItems
 *
 */

?>

<div class="item" data-id="<?= $id ?>" data-order="<?= $order ?>" data-parent-id="<?= $parentId ?>">
    <div class="item-header"><?= $title ?></div>
    <div class="item-body">
        <div class="sortable-section connectedSortable section-level-<?= $sectionLevel ?>" data-item-id="<?= $id ?>">
            <?= $htmlItems ?>
        </div>
    </div>
</div>
