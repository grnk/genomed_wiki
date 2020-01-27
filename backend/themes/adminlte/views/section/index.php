<?php

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\SectionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use common\models\Section;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;

$this->title = Yii::t('app', 'Sections');
//$this->params['breadcrumbs'][] = $this->title;
$search = "$('.search-button').click(function(){
	$('.search-form').toggle(1000);
	return false;
});";
$this->registerJs($search);
?>
<div class="section-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php /*echo Html::a(Yii::t('app', 'Create Section'), ['create'], ['class' => 'btn btn-success'])*/ ?>
        <?php /*echo Html::a(Yii::t('app', 'Advance Search'), '#', ['class' => 'btn btn-info search-button'])*/ ?>
    </p>
    <div class="search-form" style="display:none">
        <?=  $this->render('_search', ['model' => $searchModel]); ?>
    </div>
    <?php 
    $gridColumn = [
        ['class' => 'yii\grid\SerialColumn'],
//        [
//            'class' => 'kartik\grid\ExpandRowColumn',
//            'width' => '50px',
//            'value' => function ($model, $key, $index, $column) {
//                return GridView::ROW_COLLAPSED;
//            },
//            'detail' => function ($model, $key, $index, $column) {
//                return Yii::$app->controller->renderPartial('_expand', ['model' => $model]);
//            },
//            'headerOptions' => ['class' => 'kartik-sheet-style'],
//            'expandOneOnly' => true
//        ],
        ['attribute' => 'id', 'visible' => false],
        [
            'class' => 'yii\grid\ActionColumn',
            'visibleButtons' => [
                'view' => false,
                'delete' => false,
            ],
            'contentOptions' => [
                'style' => 'white-space: nowrap;',
            ],
        ],
        'title',
        'order',
        [
                'attribute' => 'parent_id',
                'label' => Yii::t('app', 'Parent'),
                'value' => function($model){
                    if ($model->parent)
                    {return $model->parent->title;}
                    else
                    {return NULL;}
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => ArrayHelper::map(Section::find()->asArray()->all(), 'id', 'title'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'Section', 'id' => 'grid-section-search-parent_id']
            ],
        'status',
        'meta_description',
//        'meta_keywords',
        'created_at:datetime:Дата добавления',
//        'slug',
        [
            'class' => 'yii\grid\ActionColumn',
            'visibleButtons' => [
                'update' => false,
            ],
            'contentOptions' => [
                'style' => 'white-space: nowrap;',
            ],
        ],
    ]; 
    ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumn,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-section']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode($this->title)
                . Html::a(Yii::t('app', 'Create Section'), ['create'], ['class' => 'btn btn-success', 'style' => 'margin-left: 50px;']),
        ],
        'export' => false,
        // your toolbar can include the additional full export menu
//        'toolbar' => [
//            '{export}',
//            ExportMenu::widget([
//                'dataProvider' => $dataProvider,
//                'columns' => $gridColumn,
//                'target' => ExportMenu::TARGET_BLANK,
//                'fontAwesome' => true,
//                'dropdownOptions' => [
//                    'label' => 'Full',
//                    'class' => 'btn btn-default',
//                    'itemsBefore' => [
//                        '<li class="dropdown-header">Export All Data</li>',
//                    ],
//                ],
//                'exportConfig' => [
//                    ExportMenu::FORMAT_PDF => false
//                ]
//            ]) ,
//        ],
    ]); ?>

</div>
