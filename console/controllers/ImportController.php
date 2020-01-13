<?php

namespace console\controllers;

use Yii;
use yii\console\Controller;
use console\classes\ImportFromOldBase;
use yii\db\Exception;

class ImportController extends Controller
{
    public $defaultAction = 'import';

    /**
     *
     * @throws Exception
     */
    public function actionImport()
    {
        $importFromOldBase = new ImportFromOldBase;
        $importFromOldBase->importAll();
    }

    /**
     * @throws Exception
     */
    public function actionClear()
    {
        $tables = [
            'section_article',
            'article',
            'section',
            ];

        foreach ($tables as $table) {
            Yii::$app->db->createCommand('DELETE FROM ' . $table)->execute();
        }
    }
}