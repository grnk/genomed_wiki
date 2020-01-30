<?php

namespace backend\controllers;

use common\classes\SectionUpdater;
use common\models\Section;
use Yii;

class MenuController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionUpdate()
    {
        dd(Yii::$app->request->post());
        $changesData = [];
        if (Yii::$app->request->isPost) {
            $changesData = Yii::$app->request->post();
        }
        foreach ($changesData as $change) {
            $sectionUpdater = new SectionUpdater('');
        }

        return true;
    }

}
