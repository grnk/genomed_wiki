<?php

namespace frontend\controllers;

use frontend\models\searches\ArticleSearch;
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
        $searchModel = new ArticleSearch([
            'section' => Section::findOne(['id' => $sectionId]),
        ]);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('view', [
            'dataProvider' => $dataProvider,
        ]);

//        if($model->getLevel() === 3) {
//            return $this->render('view', [
//                'model' => $model,
//            ]);
//        }
//
//        if($model->getLevel() === 2) {
//            return $this->render('view', [
//                'model' => $model,
//                'sections' => $model->sections,
//            ]);
//        }

//        return $this->render('index');
    }

}
