<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model common\models\Article */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Articles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Article').' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-3" style="margin-top: 15px">
            
            <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ])
            ?>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
        'title',
        'date',
        'content:html',
        'status',
        'meta_description',
        'meta_keywords',
        'preview_text:ntext',
        'preview_image:ntext',
        'slug',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]);
?>
    </div>
    
    <div class="row">
<?php
if($providerSectionArticle->totalCount){
    $gridColumnSectionArticle = [
        ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'id', 'visible' => false],
            [
                'attribute' => 'section.title',
                'label' => Yii::t('app', 'Section')
            ],
                        'order',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerSectionArticle,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-section-article']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode(Yii::t('app', 'Section Article')),
        ],
        'export' => false,
        'columns' => $gridColumnSectionArticle
    ]);
}
?>

    </div>
</div>
