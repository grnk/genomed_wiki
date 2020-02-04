<?php

namespace backend\widgets;

use common\models\Section;
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
        $this->items = $this->getItems();
    }

    public function run()
    {
        MenuRedactorAsset::register($this->view);

        return $this->renderWrapper();
    }

    private function getItems()
    {
        return Section::getItemsSectionForMenuRedactor();
    }

    public function renderItems($items, $level = 1)
    {
        $resultsItems = [];
        foreach ($items as $i => $item) {
            $resultsItems[] = $this->renderItem($item, $level);
        }

        return implode("\n", $resultsItems);
    }

    public function renderItem($item, $level)
    {
        return $this->render('menu-redactor/item', [
            'id' => $item['id'],
            'title' => $item['title'],
            'order' => $item['order'],
            'parentId' => $item['parentId'],
            'htmlItems' => $this->renderItems($item['items']),
            'sectionLevel' => $item['level'],
        ]);
    }

    public function renderWrapper()
    {
        return Html::tag('div', $this->renderItems($this->items) , [
            'class' => 'sortable-section connectedSortable section-level-0',
            'data' => [
                'item-id' => '0',
            ],
        ]);
    }
}