<?php

use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

Modal::begin([
    'toggleButton' => [
        'label' => 'Заказать обратный звонок',
        'class' => 'btn btn-link static-header-info-contacts-callback',
    ],
]);
?>
<div class="site-callback">
    <h1>Заявка на обратный звонок</h1>

    <p>
        Оставьте заявку, наш специалист свяжется с вами в ближайшее время, и проконсультирует по интересующим вопросам.
    </p>

    <div class="row">
        <div class="col-md-12">
            <?php $form = ActiveForm::begin([
                    'action' => ['/site/callback'],
                    'id' => 'modal-callback-form',
            ]); ?>

                <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'phone') ?>

                <div class="form-group">
                    <?= Html::submitButton('Заказать обратный звонок', ['class' => 'btn btn-primary', 'name' => 'callback-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>
<?php

Modal::end();
?>