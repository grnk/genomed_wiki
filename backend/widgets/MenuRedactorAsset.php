<?php


namespace backend\widgets;


use yii\web\AssetBundle;

class MenuRedactorAsset extends AssetBundle
{
    public $sourcePath = '@backend/widgets/assetsMenuRedactor';
    public $css = [
        'css/jquery-ui.css',
        'css/menu-backend-sortable.css'
    ];
    public $js = [
        'js/jquery-ui.min.js',
        'js/menu-backend-sortable.js',
    ];
    public $publishOptions = ['forceCopy' => true];
    public $depends = [
        'yii\web\JqueryAsset',
    ];
}