<?php

use common\models\Section;
use kartik\widgets\Select2;
use mootensai\components\JsBlock;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Section */
/* @var $form yii\widgets\ActiveForm */
/* @var $parentId int */

JsBlock::widget(['viewFile' => '_script', 'pos'=> View::POS_END,
    'viewParams' => [
        'class' => 'Section', 
        'relID' => 'section', 
        'value' => Json::encode($model->sections),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
JsBlock::widget(['viewFile' => '_script', 'pos'=> View::POS_END,
    'viewParams' => [
        'class' => 'SectionArticle', 
        'relID' => 'section-article', 
        'value' => Json::encode($model->sectionArticles),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);

?>

<div class="section-form">

    <?php $form = ActiveForm::begin([
        'id' => 'create-ajax-form',
        'enableClientValidation' => false,
        'options' => [
            'data' => [
                'url' => Url::to(['/section/create-ajax', 'parentId' => $parentId])
            ],
        ],
    ]); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'title', [
        'hintOptions' => ['style' => 'display: none;'],
    ])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status', [
        'hintOptions' => ['style' => 'display: none;'],
    ])->textInput() ?>

    <?= $form->field($model, 'meta_description', [
        'hintOptions' => ['style' => 'display: none;'],
    ])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'meta_keywords', [
        'hintOptions' => ['style' => 'display: none;'],
    ])->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Cancel'), Yii::$app->request->referrer , ['class'=> 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
