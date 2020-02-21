<?php

namespace frontend\controllers;

use common\models\Article;
use common\models\search\ArticleSearch;
use Yii;
use yii\web\Controller;

class ArticleController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionView($articleId)
    {
        $model = Article::findOne([$articleId]);

        return $this->render('view', [
            'model' => $model,
        ]);
    }
}
