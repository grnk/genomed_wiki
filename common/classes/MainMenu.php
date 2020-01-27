<?php

namespace common\classes;


use common\models\Section;
use kartik\nav\NavX;

class MainMenu extends NavX
{
    public function init()
    {
        parent::init();

        $this->items = $this->getItems();
    }

    public function getItems()
    {
        return Section::getItemsSectionForMainMenu();

//        dd(Section::getItemsSectionForMainMenu());
//        return [
//            ['label' => 'Action', 'url' => '#'],
//            ['label' => 'Submenu 1', 'active'=>true, 'items' => [
//                ['label' => 'Action', 'url' => '#'],
//                ['label' => 'Another action', 'url' => '#'],
//                ['label' => 'Something else here', 'url' => '#'],
//                '<div class="dropdown-divider"></div>',
//                ['label' => 'Submenu 2', 'items' => [
//                    ['label' => 'Action', 'url' => '#'],
//                    ['label' => 'Another action', 'url' => '#'],
//                    ['label' => 'Something else here', 'url' => '#'],
//                    '<div class="dropdown-divider"></div>',
//                    ['label' => 'Separated link', 'url' => '#'],
//                ]],
//            ]],
//            ['label' => 'My Link', 'url' => '#'],
//            ['label' => 'Disabled', 'linkOptions' => ['class' => 'disabled'], 'url' => '#'],
//        ];
    }

}