<?php

use common\models\Section;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\search\SectionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-section-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true, 'placeholder' => 'Title']) ?>

    <?= $form->field($model, 'order')->textInput(['placeholder' => 'Order']) ?>

    <?= $form->field($model, 'parent_id')->widget(Select2::class, [
        'data' => ArrayHelper::map(Section::find()->orderBy('id')->asArray()->all(), 'id', 'title'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Section')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'status')->textInput(['placeholder' => 'Status']) ?>

    <?php /* echo $form->field($model, 'meta_description')->textInput(['maxlength' => true, 'placeholder' => 'Meta Description']) */ ?>

    <?php /* echo $form->field($model, 'meta_keywords')->textInput(['maxlength' => true, 'placeholder' => 'Meta Keywords']) */ ?>

    <?php /* echo $form->field($model, 'slug')->textInput(['maxlength' => true, 'placeholder' => 'Slug']) */ ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
