<?php

namespace backend\widgets;

use yii\base\Widget;
use yii\helpers\Html;

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
        return $this->renderItems();
    }

    public function renderItems()
    {
        $items = [];
        foreach ($this->items as $i => $item) {
            $items[] = $this->renderItem($item);
        }

        return Html::tag('div', implode("\n", $items), [
            'class' => 'sortable-section connectedSortable',
            'data' => [
                'item-id' => '0',
            ],
        ]);
    }

    public function renderItem($item)
    {
        $id = '';
        $title = '';
        $order = '';
        $parentId = '';
        $items = '';

        return Html::tag('div', implode("\n", $items), [
            'class' => 'sortable-section connectedSortable',
            'data' => [
                'item-id' => '0',
            ],
    }
}