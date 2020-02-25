<?php

namespace frontend\controllers;

use common\models\Article;
use yii\web\Controller;

class ArticleController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionView($articleId, $sectionId = null)
    {
        $model = Article::findOne([$articleId]);

        return $this->render('view', [
            'model' => $model,
            'sectionId' => $sectionId ? $sectionId : null,
        ]);
    }
}
