<?php

use mootensai\components\JsBlock;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\web\View;
use yii\widgets\ActiveForm;
use mihaildev\elfinder\ElFinder;
use mihaildev\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model common\models\Article */
/* @var $form yii\widgets\ActiveForm */

JsBlock::widget(['viewFile' => '_script', 'pos'=> View::POS_END,
    'viewParams' => [
        'class' => 'SectionArticle', 
        'relID' => 'section-article', 
        'value' => Json::encode($model->sectionArticles),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
?>

<div class="article-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true, 'placeholder' => 'Title']) ?>

    <?php /*echo $form->field($model, 'date')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATETIME,
        'saveFormat' => 'php:Y-m-d H:i:s',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => Yii::t('app', 'Choose Date'),
                'autoclose' => true,
            ]
        ],
    ]);*/ ?>

    <?= $form->field($model, 'content')->widget(CKEditor::class, ['editorOptions' => ElFinder::ckeditorOptions(['elfinder'], [
        'height'=>500,
        'preset'=>'full',
        'customConfig' => '/js/ckeditor/config.js',
        'basicEntities' => false,
        'filebrowserUploadUrl' => '/file/ckeditor_image_upload'
    ])]); ?>

    <?= $form->field($model, 'status')->textInput(['placeholder' => 'Status', 'value' => '1']) ?>

    <?= $form->field($model, 'meta_description')->textInput(['maxlength' => true, 'placeholder' => 'Meta Description']) ?>

    <?= $form->field($model, 'meta_keywords')->textInput(['maxlength' => true, 'placeholder' => 'Meta Keywords']) ?>

    <?php /*echo $form->field($model, 'preview_text')->textarea(['rows' => 6])*/ ?>

    <?php /*echo $form->field($model, 'preview_image')->textarea(['rows' => 6])*/ ?>

    <?php /*echo $form->field($model, 'slug')->textInput(['maxlength' => true, 'placeholder' => 'Slug'])*/ ?>

    <?php
    $forms = [
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode(Yii::t('app', 'SectionArticle')),
            'content' => $this->render('_formSectionArticle', [
                'row' => ArrayHelper::toArray($model->sectionArticles),
            ]),
        ],
    ];
    echo kartik\tabs\TabsX::widget([
        'items' => $forms,
        'position' => kartik\tabs\TabsX::POS_ABOVE,
        'encodeLabels' => false,
        'pluginOptions' => [
            'bordered' => true,
            'sideways' => true,
            'enableCache' => false,
        ],
    ]);
    ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Cancel'), Yii::$app->request->referrer , ['class'=> 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
