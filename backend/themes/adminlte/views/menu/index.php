<?php
/* @var $this yii\web\View */
?>

<?= \backend\widgets\MenuRedactor::widget(['items' => [
        [
            'id' => 200,
            'title' => 'Раздел 1 тест',
            'order' => '123',
            'parent_id' => null,
            'items' => [],
        ],
        [
            'id' => 201,
            'title' => 'Раздел 2 тест',
            'order' => '123',
            'parent_id' => null,
            'items' => [],
        ],
        [
            'id' => 202,
            'title' => 'Раздел 3 тест',
            'order' => '123',
            'parent_id' => null,
            'items' => [],
        ],
    ]]) ?>

<div class="sortable-section connectedSortable" data-item-id="0">

    <div class="item" data-id="201" data-order="1" data-parent-id="0">
        <div class="item-header">Раздел 1 ТЕСТ</div>
        <div class="item-body">
            <div class="sortable-section connectedSortable" data-item-id="201">
                <div class="item" data-id="202" data-order="1" data-parent-id="1">
                    <div class="item-header">Подраздел 1.1 ТЕСТ</div>
                    <div class="item-body">
                        <div class="sortable-section connectedSortable" data-item-id="202">
                        </div>
                    </div>
                </div>
                <div class="item" data-id="203" data-order="2" data-parent-id="1">
                    <div class="item-header">Подраздел 1.2 ТЕСТ</div>
                    <div class="item-body">
                        <div class="sortable-section connectedSortable" data-item-id="203">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


