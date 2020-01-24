<?php

namespace common\assets;

use yii\web\AssetBundle;

class LoadedFilesAsset extends AssetBundle
{
    public $publishOptions = ['forceCopy' => true];
    public $sourcePath = '@files/upload';
}