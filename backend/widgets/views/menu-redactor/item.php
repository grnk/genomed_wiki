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

use yii\helpers\Html;
use yii\helpers\Url; ?>

<div class="item" data-id="<?= $id ?>" data-order="<?= $order ?>" data-parent-id="<?= $parentId ?>">
    <div class="item-header">
        <span class="action-buttons">
            <?= Html::tag('span', '', [
                'class' => 'glyphicon glyphicon-plus showModalButton',
                'value' => Url::to(['section/create-ajax', 'parentId'=>$id]),
            ]); ?>
            <?= Html::tag('span', '', [
                'class' => 'glyphicon glyphicon-pencil showModalButton',
                'value' => Url::to(['section/update-ajax', 'id'=>$id]),
            ]); ?>
            <span class='glyphicon glyphicon-resize-small item-toggle'></span>
        </span>
        <?= $title ?>
    </div>
    <div class="item-body">
        <div class="sortable-section connectedSortable section-level-<?= $sectionLevel ?>" data-item-id="<?= $id ?>">
            <?= $htmlItems ?>
        </div>
    </div>
</div>
