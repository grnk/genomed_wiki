<?php


namespace frontend\widgets;


use common\assets\LoadedFilesAsset;
use Yii;
use yii\base\Widget;

class StaticHeader extends  Widget
{
    public function run()
    {
        StaticHeaderAsset::register($this->view);
        parent::run();

        $assetBundle = LoadedFilesAsset::register(Yii::$app->view);
        $logoPath = $assetBundle->baseUrl . '/images/logo.svg';

        return $this->render('static-header', [
            'logoPath' => $logoPath,
        ]);
    }
}