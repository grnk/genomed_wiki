<?php

use yii\helpers\Html;
use yii\helpers\Url;
?>

<div id="menu-redactor-buttons">
    <?= Html::button(Yii::t('app', 'Create Section'), [
        'value' => Url::to(['/section/create-ajax']),
        'title' => Yii::t('app', 'Create Section'),
        'class' => 'btn btn-primary showModalButton',
        'id' => 'button-create-section'
    ]); ?>
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
</div>
