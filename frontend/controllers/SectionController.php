<?php

namespace frontend\controllers;

use common\models\Section;
use Yii;
use yii\web\Controller;

class SectionController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionView($sectionId)
    {
        $model = Section::findOne(['id' => $sectionId]);

        if($model->getLevel() === 3) {
            return $this->render('view', [
                'model' => $model,
            ]);
        }

        return $this->render('index');
    }

}
