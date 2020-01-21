<?php
use yii\helpers\Html;
use kartik\tabs\TabsX;
$items = [
    [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode(Yii::t('app', 'Preview')),
        'content' => $this->render('_view', [
            'model' => $model,
        ]),
    ],
//    [
//        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode(Yii::t('app', 'Article')),
//        'content' => $this->render('_detail', [
//            'model' => $model,
//        ]),
//    ],
//        [
//        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode(Yii::t('app', 'Section Article')),
//        'content' => $this->render('_dataSectionArticle', [
//            'model' => $model,
//            'row' => $model->sectionArticles,
//        ]),
//    ],
    ];
echo TabsX::widget([
    'items' => $items,
    'position' => TabsX::POS_ABOVE,
    'encodeLabels' => false,
    'class' => 'tes',
    'pluginOptions' => [
        'bordered' => true,
        'sideways' => true,
        'enableCache' => false
    ],
]);
?>
