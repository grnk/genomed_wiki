<?php


namespace frontend\models;


use Yii;
use yii\base\Model;

class CallbackForm extends Model
{
    public $name;
    public $phone;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'phone'], 'required'],
        ];
    }

    public function sendEmail()
    {
        return Yii::$app->mailer->compose()
            ->setTo(Yii::$app->params['adminEmail'])
            ->setFrom([Yii::$app->params['senderEmail'] => Yii::$app->params['senderName']])
            ->setSubject('callback form')
            ->setTextBody('Name ' . $this->name . '. ' . 'Phone ' . $this->phone)
            ->send();
    }
}