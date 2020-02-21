<?php

namespace frontend\helpers;

class AppHelper
{
    public static function isMainPage()
    {
        if((\Yii::$app->controller->id === 'site') && (\Yii::$app->controller->action->id === 'index')) {
            return true;
        }

        return false;
    }
}