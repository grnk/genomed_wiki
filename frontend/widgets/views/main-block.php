<?php
/**
 * @var $leftMenu string
 * @var $content string
 * @var $this yii\web\View
 */

?>

<div class="row">
    <div class="col-md-3" style="border: 2px solid black;">
        left block menu
        <?= $leftMenu ?>
    </div>

    <div class="col-md-9" style="border: 2px solid black;">
        content
        <?= $content ?>
    </div>
</div>