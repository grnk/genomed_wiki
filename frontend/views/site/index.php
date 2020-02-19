<?php

/* @var $this yii\web\View */

use yii\widgets\ListView;

$this->title = 'main';

echo ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => '_article',
    'summary' => false,
]);
