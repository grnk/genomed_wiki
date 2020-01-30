<?php
/* @var $this yii\web\View */
?>

<div class="sortable-section connectedSortable">

    <div class="item" data-id="1" data-order="1" data-parent-id="">
        <div class="item-header">Раздел 1</div>
        <div class="item-body">
            <div class="sortable-section connectedSortable">
                <div class="item" data-id="2" data-order="1" data-parent-id="1">
                    <div class="item-header">Подраздел 1.1</div>
                    <div class="item-body">
                        <div class="sortable-section connectedSortable">
                        </div>
                    </div>
                </div>
                <div class="item" data-id="3" data-order="2" data-parent-id="1">
                    <div class="item-header">Подраздел 1.2</div>
                    <div class="item-body">
                        <div class="sortable-section connectedSortable" data-id="3" data-order="1" data-parent-id="1">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


