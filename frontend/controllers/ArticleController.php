<?php

namespace frontend\controllers;

use common\models\search\ArticleSearch;
use Yii;
use yii\web\Controller;

class ArticleController extends Controller
{
    public function actionIndex($sectionId)
    {
        $searchModel = new ArticleSearch(['sectionId' => $sectionId]);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
}
