<?php

/**
 * @var $this yii\web\View
 * @var $dataProvider ActiveDataProvider
 */

use yii\data\ActiveDataProvider;
use yii\widgets\ListView;
?>

<div class="article-list">
<?= ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => '_article',
    'summary' => false,
]); ?>
</div>
