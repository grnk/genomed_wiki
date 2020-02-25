<?php
/**
 * @var $leftMenu string
 * @var $content string
 * @var $this yii\web\View
 */

?>

<div class="row">
    <div class="col-md-3">
        <div class="left-block-menu">
            <?= $leftMenu ?>
        </div>
    </div>

    <div class="col-md-9">
        <?= $content ?>
    </div>
</div>