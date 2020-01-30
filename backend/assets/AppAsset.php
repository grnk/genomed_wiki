<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/backend.css',
        'css/jquery-ui.css',
        'css/menu-backend-sortable.css'
    ];
    public $js = [
        'js/basic.js',
        'js/jquery-ui.min.js',
        'js/menu-backend-sortable.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
