<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model common\models\Section */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sections'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="section-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Section').' '. Html::encode($this->title) ?></h2>
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
        'order',
        [
            'attribute' => 'parent.title',
            'label' => Yii::t('app', 'Parent'),
        ],
        'status',
        'meta_description',
        'meta_keywords',
        'slug',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]);
?>
    </div>
    <div class="row">
        <h4>Section<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnSection = [
        ['attribute' => 'id', 'visible' => false],
        'title',
        'order',
        'status',
        'meta_description',
        'meta_keywords',
        'slug',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumnSection    ]);
    ?>
    
    <div class="row">
<?php
if($providerSection->totalCount){
    $gridColumnSection = [
        ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'id', 'visible' => false],
            'title',
            'order',
                        'status',
            'meta_description',
            'meta_keywords',
            'slug',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerSection,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-section']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode(Yii::t('app', 'Section')),
        ],
        'export' => false,
        'columns' => $gridColumnSection
    ]);
}
?>

    </div>
    
    <div class="row">
<?php
if($providerSectionArticle->totalCount){
    $gridColumnSectionArticle = [
        ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'id', 'visible' => false],
                        [
                'attribute' => 'article.title',
                'label' => Yii::t('app', 'Article')
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
