<?php


namespace frontend\widgets;


use yii\base\Widget;

class StaticHeader extends  Widget
{
    public function run()
    {
        StaticHeaderAsset::register($this->view);
        parent::run();

        return $this->render('static-header');
    }
}