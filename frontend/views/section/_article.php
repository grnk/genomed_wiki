<?php

use common\models\Article;
use yii\helpers\Html;
use yii\helpers\Url;

/** @var $model Article */
?>

<div class="col-md-12">
    <div class="panel panel-default card-of-article-list">
        <div class="panel-heading">
            <h3 class="panel-title"><?= $model->title ?> </h3>
        </div>
        <div class="panel-body">
            <?= $model->preview_text ?>
            <div id="date-create">
                <?= $model->created_at ?>
            </div>
            <div>
                <?= Html::a(Yii::t('app', 'read'), Url::to(['/article/view', 'articleId' => $model->id]))?>
            </div>
            <div>
                <img width="200px" src="<?= $model->getUrlArticleImagePreview() ?>">
            </div>
        </div>
    </div>
</div>
