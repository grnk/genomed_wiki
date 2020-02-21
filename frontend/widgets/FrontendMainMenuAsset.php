<?php


namespace frontend\widgets;


use yii\web\AssetBundle;

class FrontendMainMenuAsset extends AssetBundle
{
    public $sourcePath = '@frontend/widgets/assetsFrontendMainMenu';
    public $css = [
        'css/frontend-main-menu.css',
    ];
    public $js = [
        'js/frontend-main-menu.js',
    ];
    public $publishOptions = ['forceCopy' => true];
//    public $depends = [
//        'yii\web\JqueryAsset',
//    ];
}