<?php

/**
 * @var $this yii\web\View
 */

use backend\widgets\MenuRedactor;
use yii\helpers\Html;
use yii\helpers\Url; ?>

<?= Html::button('view section', ['value' => Url::to(['section/view', 'id'=>203]), 'title' => 'view section', 'class' => 'showModalButton btn btn-success']); ?>
<?= Html::button('create section', ['value' => Url::to(['section/create']), 'title' => 'create section', 'class' => 'showModalButton btn btn-success']); ?>
<?= Html::button('update section', ['value' => Url::to(['section/update', 'id'=>203]), 'title' => 'update section', 'class' => 'showModalButton btn btn-success']); ?>

<?= MenuRedactor::widget() ?>



