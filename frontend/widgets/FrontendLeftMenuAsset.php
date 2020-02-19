<?php


namespace frontend\widgets;


use yii\web\AssetBundle;

class FrontendleftMenuAsset extends AssetBundle
{
    public $sourcePath = '@frontend/widgets/assetsFrontendLeftMenu';
    public $css = [
        'css/frontend-left-menu.css',
    ];
    public $js = [
        'js/frontend-left-menu.js',
    ];
    public $publishOptions = ['forceCopy' => true];
//    public $depends = [
//        'yii\web\JqueryAsset',
//    ];
}