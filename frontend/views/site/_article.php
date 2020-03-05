<?php

/** @var $model Article */

use common\models\Article;
use yii\helpers\Url;

?>
<a class="main-page-article-link" href="<?= Url::to([
    '/article/view',
    'articleId' => $model->id,
]) ?>">
<div class="main-page-article-card">
    <div class="main-page-article-card-text">
        <div class="main-page-article-card-text-title">
            <?= $model->title ?>
        </div>
        <div class="main-page-article-card-text-description">
            <?= $model->preview_text ?>
        </div>
    </div>
    <div class="main-page-article-card-info">
        <div class="main-page-article-card-info-image">
            <img alt="" width="150px" src="<?= $model->getUrlArticleImagePreview() ?>">
        </div>
        <div class="main-page-article-card-info-date">
            <?= Yii::$app->formatter->asDate($model->updated_at, 'php:d.m.Y') ?>
        </div>
    </div>
</div>
</a>