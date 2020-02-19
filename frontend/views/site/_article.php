<?php

/** @var $model Article */

use common\models\Article;
?>
<div class="col-md-4">
    <div class="panel panel-default card-of-article">
        <div class="panel-heading">
            <h3 class="panel-title"><?= $model->title ?> </h3>
        </div>
        <div class="panel-body">
            <?= $model->preview_text ?>
            <div id="date-create">
                <?= $model->created_at ?>
            </div>
        </div>
    </div>
</div>