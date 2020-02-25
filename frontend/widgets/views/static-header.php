<?php

/**
 * @var $logoPath string
 */

?>

<div class="static-header">
    <div class="static-header-info">
        <div class="static-header-info-image">
            <img src="<?= $logoPath ?>" alt="logo">
        </div>
        <div class="static-header-info-title">
            <div class="static-header-info-title-main">Медико-генетический центр</div>
            <div class="static-header-info-title-subtitle">лаборатория молекулярной патологии</div>
        </div>
        <div class="static-header-info-contacts">
            <div class="static-header-info-contacts-text">Бесплатная горячая линия</div>
            <div class="static-header-info-contacts-phone">
                <a href="tel:+78003501226" target="_blank">+7 (800) 350-12-26</a>
            </div>
            <div id="callback-form" class="static-header-info-contacts-callback">Заказать обратный звонок</div>
            <div class="static-header-info-contacts-find">
                <i class="glyphicon glyphicon-search"></i>
                <div class="static-header-info-contacts-find-text">
                    <form id="find-form">
                        <input placeholder="Поиск по сайту">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="static-header-menu">
        <div class="static-header-menu-item"><a href="<?= \yii\helpers\Url::to(['/']) ?>">О нас</a></div>
        <div class="static-header-menu-item"><a href="<?= \yii\helpers\Url::to(['/']) ?>">Медицинские офисы</a></div>
        <div class="static-header-menu-item"><a href="<?= \yii\helpers\Url::to(['/']) ?>">Анализы и цены</a></div>
        <div class="static-header-menu-item"><a href="<?= \yii\helpers\Url::to(['/']) ?>">Лаборатория</a></div>
        <div class="static-header-menu-item"><a href="<?= \yii\helpers\Url::to(['/']) ?>">Онлайн консультант</a></div>
    </div>
</div>
