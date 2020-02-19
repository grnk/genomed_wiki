<?php

/* @var $this \yii\web\View */
/* @var $content string */

use frontend\helpers\AppHelper;
use frontend\widgets\FrontendLeftMenu;
use frontend\widgets\FrontendMainMenu;
use frontend\widgets\MainBlock;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <div class="container">

        <div class="row" style="border: 2px solid black;">
            <div class="col-md-12">
                <?= Html::a('Главная', '/') ?>
                static header
            </div>
        </div>

        <div class="row" style="border: 2px solid black;">
            <div class="frontend-main-menu">
                <?php
                echo FrontendMainMenu::widget([
                    'options'=>['class'=>'nav nav-pills'],
                ]);
                ?>
            </div>
        </div>

        <div class="row" style="border: 2px solid black;">
            <div class="col-md-12">
                Breadcrumbs Alert
                <?= Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>
                <?= Alert::widget() ?>
            </div>
        </div>

        <?= MainBlock::widget([
            'leftMenu' => FrontendLeftMenu::widget([
                    'options'=>['class'=>'nav nav-pills left-menu-items'],
                    'sectionId' => Yii::$app->request->get('sectionId', null),
                ]),
            'content' => $content,
            'isMainPage' => AppHelper::isMainPage(),
        ]) ?>

    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
