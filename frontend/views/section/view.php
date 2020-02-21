<?php

/**
 * @var $this yii\web\View
 * @var $dataProvider ActiveDataProvider
 */

use yii\data\ActiveDataProvider;
use yii\widgets\ListView;

echo ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => '_article',
    'summary' => false,
]);

