<?php
/* @var $this yii\web\View */

use yii\widgets\ListView;

echo ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => '_article',
]);
