<?php

use yii\widgets\DetailView;

echo DetailView::widget([
    'model' => $model,
    'attributes' => [
        'title',                                           // title свойство (обычный текст)
        'content:html',                                // description свойство, как HTML
        'created_at:datetime',                             // дата создания в формате datetime
    ],
]);