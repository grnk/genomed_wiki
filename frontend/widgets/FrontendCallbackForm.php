<?php


namespace frontend\widgets;


use frontend\models\CallbackForm;
use yii\base\Widget;

class FrontendCallbackForm extends Widget
{
    /**
     * @var CallbackForm
     */
    protected $model;

    public function run()
    {
        parent::run();

        $this->model = new CallbackForm();

        return $this->render('frontend-callback-form', [
            'model' => $this->model,
        ]);
    }
}