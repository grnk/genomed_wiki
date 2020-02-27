<?php

/* @var $this yii\web\View */
/* @var $model Article */

//use yii\widgets\DetailView;
use common\models\Article;

$this->title = $model->title;


//
//echo DetailView::widget([
//    'model' => $model,
//    'attributes' => [
//        'title',                                           // title свойство (обычный текст)
//        'content:html',                                // description свойство, как HTML
//        'created_at:datetime',                             // дата создания в формате datetime
//    ],
//]);
?>

<div class="article-detail-view">
    <div class="article-detail-view-title"><h1><?= $model->title ?></h1></div>
    <div class="article-detail-view-content"><?= $model->content ?></div>
    <div class="article-detail-view-time"><?= Yii::$app->formatter->asDate($model->created_at, 'php:d.m.Y') ?></div>
</div>
