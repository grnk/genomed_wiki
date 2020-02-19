<?php

/**
 * @var $this yii\web\View
 * @var $model Section
 */

use common\models\Section;

foreach ($model->getArticles()->all() as $article) {
    echo \yii\helpers\Html::tag('div', $article->title);
}

