<?php

/**
 * @var $logoPath string
 */

use yii\helpers\Html;
use yii\helpers\Url; ?>

<div class="static-header">
    <div class="static-header-info">
        <div class="static-header-info-image">
            <a href="<?= Url::to(['/']) ?>"><img src="<?= $logoPath ?>" alt="logo"></a>
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
        <div class="static-header-menu-item"><?= Html::a('О нас', 'http://genomed.ru/#tab_70011', ['target' => '_blank', 'rel' => 'nofollow']) ?></div>
        <div class="static-header-menu-item"><?= Html::a('Медицинские офисы', 'http://genomed.ru/#tab_70012', ['target' => '_blank', 'rel' => 'nofollow']) ?></div>
        <div class="static-header-menu-item"><?= Html::a('Услуги', 'http://genomed.ru/#tab_70015', ['target' => '_blank', 'rel' => 'nofollow']) ?></div>
        <div class="static-header-menu-item"><?= Html::a('Анализы и цены', 'http://price.genomed.ru/', ['target' => '_blank', 'rel' => 'nofollow']) ?></div>
        <div class="static-header-menu-item"><?= Html::a('Лаборатория', 'http://genomed.ru/#tab_70013', ['target' => '_blank', 'rel' => 'nofollow']) ?></div>
        <div class="static-header-menu-item"><?= Html::a('Онлайн консультант', 'http://genomed.ru/#tab_70014', ['target' => '_blank', 'rel' => 'nofollow']) ?></div>
    </div>
</div>
