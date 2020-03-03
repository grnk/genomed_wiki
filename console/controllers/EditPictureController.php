<?php

namespace console\controllers;

use console\classes\ChangeLinksInContent;
use yii\console\Controller;

class EditPictureController extends Controller
{
    public $defaultAction = 'edit';

    /**
     *
     */
    public function actionEdit()
    {
        (new ChangeLinksInContent())->run();
    }
}