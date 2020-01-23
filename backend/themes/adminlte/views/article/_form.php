<?php

use kartik\widgets\FileInput;
use mootensai\components\JsBlock;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\helpers\Url;
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

    <?= $form->field($model, 'title', [
        'hintOptions' => ['style' => 'display: none;'],
    ])->textInput(['maxlength' => true]) ?>

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

    <?= $form->field($model, 'content', [
        'hintOptions' => ['style' => 'display: none;'],
    ])->widget(CKEditor::class, ['editorOptions' => ElFinder::ckeditorOptions(['elfinder'], [
        'height'=>500,
        'preset'=>'full',
        'customConfig' => '/js/ckeditor/config.js',
        'basicEntities' => false,
        'filebrowserUploadUrl' => '/file/ckeditor_image_upload'
    ])]); ?>

    <?= $form->field($model, 'status', [
        'hintOptions' => ['style' => 'display: none;'],
    ])->textInput(['value' => '1']) ?>

    <?= $form->field($model, 'meta_description', [
        'hintOptions' => ['style' => 'display: none;'],
    ])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'meta_keywords', [
        'hintOptions' => ['style' => 'display: none;'],
    ])->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'preview_text')->textarea(['rows' => 3]) ?>

    <?php echo $form->field($model, 'preview_image', [
//        'options' => [
//            'style' => 'display:none'
//        ]
    ]); ?>

    <?php echo $form->field($model, 'upload_files')->widget(FileInput::class, [
    'options' => [
        'multiple' => false,
    ],
    'pluginOptions' => [
        'maxFileCount' => 1,
        'previewFileType' => 'any',
        'uploadUrl' => Url::to(['/file/file-upload']),
        'allowedFileExtensions'=>['jpg','png']
    ],
    'pluginEvents' => [
        'fileuploaded' => 'function(event, data, previewId, index){'
            . 'var inputPreviewImage = $("#article-preview_image");'
            . 'inputPreviewImage.val(data.response.preview_image);'
            . 'console.log(data, inputPreviewImage);'
            . '}',
    ],
    ]); ?>

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
