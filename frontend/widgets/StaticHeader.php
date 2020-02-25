<?php


namespace frontend\widgets;


use yii\base\Widget;

class StaticHeader extends  Widget
{
    public function run()
    {
        parent::run();

        return $this->render('static-header');
    }
}