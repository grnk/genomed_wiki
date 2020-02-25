<?php

/**
 * @var $this yii\web\View
 * @var $dataProvider ActiveDataProvider
 * @var $sectionId string
 */

use yii\data\ActiveDataProvider;
use yii\widgets\ListView;
?>

<div class="article-list">
<?= ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => '_article',
    'summary' => false,
    'viewParams' => [
        'sectionId' => $sectionId,
    ],
]); ?>
</div>
