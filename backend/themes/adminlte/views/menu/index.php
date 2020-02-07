<?php

/**
 * @var $this yii\web\View
 */

use backend\widgets\MenuRedactor;
use yii\helpers\Html;
use yii\helpers\Url; ?>

<?= Html::button(Yii::t('app', 'Close all'), [
    'value' => Url::to(['#']),
    'title' => Yii::t('app', 'Close all'),
    'class' => 'btn btn-success',
    'id' => 'button-close-all'
]); ?>
<?= Html::button(Yii::t('app', 'Open all'), [
    'value' => Url::to(['#']),
    'title' => Yii::t('app', 'Open all'),
    'class' => 'btn btn-info',
    'id' => 'button-open-all'
]); ?>

<?= MenuRedactor::widget() ?>



