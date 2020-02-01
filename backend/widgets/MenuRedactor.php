<?php

namespace backend\widgets;

use yii\base\Widget;
use yii\helpers\Html;
use yii\web\AssetBundle;

class MenuRedactor extends Widget
{
    public $items = [];

    public function init()
    {
        parent::init();
        //
    }

    public function run()
    {
        MenuRedactorAsset::register($this->view);

        return $this->renderWrapper();
    }

    public function renderItems($items)
    {
        $resultsItems = [];
        foreach ($items as $i => $item) {
            $resultsItems[] = $this->renderItem($item);
        }

        return implode("\n", $resultsItems);
    }

    public function renderItem($item)
    {
        return $this->render('menu-redactor/item', [
            'id' => $item['id'],
            'title' => $item['title'],
            'order' => $item['order'],
            'parentId' => $item['parentId'],
            'htmlItems' => $this->renderItems($item['items']),
        ]);
    }

    public function renderWrapper()
    {
        return Html::tag('div', $this->renderItems($this->items) , [
            'class' => 'sortable-section connectedSortable',
            'data' => [
                'item-id' => '0',
            ],
        ]);
    }
}