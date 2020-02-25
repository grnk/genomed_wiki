<?php

use common\models\Article;
use yii\helpers\Html;
use yii\helpers\Url;

/** @var $model Article */
/** @var $sectionId string */
?>

<div class="article-card">

    <div class="article-card-block">

        <div class="article-card-block-top">
            <div class="article-card-block-top-text">
                <div class="article-card-block-top-text-title">
                    <?= $model->title ?>
                </div>
                <div class="article-card-block-top-text-preview">
                    <?= $model->preview_text ?>
                </div>
            </div>
        </div>

        <div class="article-card-block-bottom">
            <div class="article-card-block-bottom-date">
                <?= Yii::$app->formatter->asDate($model->created_at, 'php:d.m.Y') ?>
            </div>
            <div class="article-card-block-bottom-link">
                <?= Html::a(Yii::t('app', 'read'), Url::to([
                    '/article/view',
                    'articleId' => $model->id,
                    'sectionId' => $sectionId ? $sectionId : null,
                ]))?>
            </div>
        </div>

    </div>

    <div class="article-card-image">
        <img alt="" width="200px" src="<?= $model->getUrlArticleImagePreview() ?>">
    </div>

</div>


