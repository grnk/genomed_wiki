<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\CallbackForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Callback';
?>
<div class="site-callback">
    <h1>Заявка на обратный звонок</h1>

    <p>
        Оставьте заявку, наш специалист свяжется с вами в ближайшее время, и проконсультирует по интересующим вопросам.
    </p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'phone') ?>

                <div class="form-group">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'callback-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>
