<?php

/* @var $this yii\web\View */

use yii\widgets\ListView;
use yii2masonry\yii2masonry;

$this->title =Yii::t('app', 'main');
?>

<div class="main-page-block">
    <?php
    yii2masonry::begin([
        'clientOptions' => [
            'itemSelector' => '.main-page-article-card',
            'columnWidth' => 20,
//            'percentPosition' => true
        ]
    ]); ?>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_article',
        'summary' => false,
        'options' => [
            'class' => 'article-list-view',
        ],
    ]);

    yii2masonry::end();
    ?>
</div>
