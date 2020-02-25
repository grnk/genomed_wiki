<?php

namespace frontend\widgets;


use yii\web\AssetBundle;

class StaticHeaderAsset extends AssetBundle
{
    public $sourcePath = '@frontend/widgets/assetsStaticHeader';
    public $css = [
        'css/static-header.css',
    ];
    public $js = [
        'js/static-header.js',
    ];
    public $publishOptions = ['forceCopy' => true];
//    public $depends = [
//        'yii\web\JqueryAsset',
//    ];
}