<div class="form-group" id="add-section-article">
<?php

use common\models\Section;
use kartik\grid\GridView;
use kartik\builder\TabularForm;
use kartik\widgets\Select2;
use yii\data\ArrayDataProvider;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

$dataProvider = new ArrayDataProvider([
    'allModels' => $row,
    'pagination' => [
        'pageSize' => -1
    ]
]);
echo TabularForm::widget([
    'dataProvider' => $dataProvider,
    'formName' => 'SectionArticle',
    'checkboxColumn' => false,
    'actionColumn' => false,
    'attributeDefaults' => [
        'type' => TabularForm::INPUT_TEXT,
    ],
    'attributes' => [
        "id" => ['type' => TabularForm::INPUT_HIDDEN, 'columnOptions' => ['hidden'=>true]],
        'section_id' => [
            'label' => Yii::t('app', 'Section'),
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => Select2::class,
            'options' => [
                'data' => ArrayHelper::map(Section::find()->orderBy('title')->asArray()->all(), 'id', 'title'),
                'options' => ['placeholder' => Yii::t('app', 'Choose Section')],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'order' => [
            'type' => TabularForm::INPUT_TEXT,
            'label' => Yii::t('app', 'order'),
        ],
        'del' => [
            'type' => 'raw',
            'label' => '',
            'value' => function($model, $key) {
                return
                    Html::hiddenInput('Children[' . $key . '][id]', (!empty($model['id'])) ? $model['id'] : "") .
                    Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' =>  Yii::t('app', 'Delete'), 'onClick' => 'delRowSectionArticle(' . $key . '); return false;', 'id' => 'section-article-del-btn']);
            },
        ],
    ],
    'gridSettings' => [
        'panel' => [
            'heading' => false,
            'type' => GridView::TYPE_DEFAULT,
            'before' => false,
            'footer' => false,
            'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . Yii::t('app', 'Add Section Article'), ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowSectionArticle()']),
        ]
    ]
]);
echo  "    </div>\n\n";
?>

