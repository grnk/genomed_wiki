<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Section */
/* @var $parentId int */

$this->title = Yii::t('app', 'Create subsection from section ') . $model->getParentTitle();
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sections'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="section-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formCreateAjax', [
        'model' => $model,
        'parentId' => $parentId,
    ]) ?>

</div>
