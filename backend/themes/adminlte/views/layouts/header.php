<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */
?>

<header class="main-header">

    <?= Html::a('<span class="logo-mini">WG</span><span class="logo-lg">' . 'Wiki Genomed' . '</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">


                <li class="dropdown user user-menu">
                    <?= Html::a(
                        Yii::t('app', 'Logout (' . Yii::$app->user->identity->username . ')'),
                        ['/site/logout'],
                        ['data-method' => 'post', 'class' => 'btn']
                    ) ?>
                </li>

                <!-- User Account: style can be found in dropdown.less -->
<!--                <li>-->
<!--                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>-->
<!--                </li>-->
            </ul>
        </div>
    </nav>
</header>
