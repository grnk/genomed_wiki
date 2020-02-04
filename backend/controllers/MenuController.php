<?php

namespace backend\controllers;

use common\classes\SectionUpdater;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;

class MenuController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index', 'view', 'create', 'update', 'delete', 'add-section-article', 'articles'],
                        'roles' => ['@']
                    ],
                    [
                        'allow' => false
                    ]
                ]
            ]
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionUpdate()
    {
        $changesData = [];
        if (Yii::$app->request->isPost) {
            $changesData = Yii::$app->request->post();
        }

        $sectionUpdater = new SectionUpdater(
            $changesData['section-id'] === '0' ? null : $changesData['section-id'],
            isset($changesData['item-ids']) ? $changesData['item-ids'] : []
        );

        $sectionUpdater->update();

        return true;
    }

}
