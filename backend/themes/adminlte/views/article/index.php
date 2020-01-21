<?php

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\ArticleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;

$this->title = Yii::t('app', 'Articles');
//$this->params['breadcrumbs'][] = $this->title;
//$search = "$('.search-button').click(function(){
//	$('.search-form').toggle(1000);
//	return false;
//});";
//$this->registerJs($search);
?>
<div class="article-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php /*echo Html::a(Yii::t('app', 'Create Article'), ['create'], ['class' => 'btn btn-success'])*/ ?>
        <?php /*echo Html::a(Yii::t('app', 'Advance Search'), '#', ['class' => 'btn btn-info search-button'])*/ ?>
    </p>
    <div class="search-form" style="display:none">
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    </div>
    <?php 
    $gridColumn = [
        ['class' => 'yii\grid\SerialColumn'],
        [
            'class' => 'kartik\grid\ExpandRowColumn',
            'width' => '50px',
            'value' => function ($model, $key, $index, $column) {
                return GridView::ROW_COLLAPSED;
            },
            'detail' => function ($model, $key, $index, $column) {
                return Yii::$app->controller->renderPartial('_expand', ['model' => $model]);
            },
            'headerOptions' => ['class' => 'kartik-sheet-style'],
            'expandOneOnly' => true
        ],
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
//        'date',
        'meta_description',
        'created_at:datetime:Дата добавления',
//        'content:ntext',
//        'status',
//        'meta_keywords',
//        'preview_text:ntext',
//        'preview_image:ntext',
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
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-article']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode($this->title)
                .Html::a(Yii::t('app', 'Create Article'), ['create'], ['class' => 'btn btn-success', 'style' => 'margin-left: 50px;']),
        ],
        'export' => false,
        // your toolbar can include the additional full export menu
        'toolbar' => [
            '{export}',
            ExportMenu::widget([
                'dataProvider' => $dataProvider,
                'columns' => $gridColumn,
                'target' => ExportMenu::TARGET_BLANK,
                'fontAwesome' => true,
                'dropdownOptions' => [
                    'label' => 'Full',
                    'class' => 'btn btn-default',
                    'itemsBefore' => [
                        '<li class="dropdown-header">Export All Data</li>',
                    ],
                ],
                'exportConfig' => [
                    ExportMenu::FORMAT_PDF => false
                ]
            ]) ,
        ],
    ]); ?>

</div>
