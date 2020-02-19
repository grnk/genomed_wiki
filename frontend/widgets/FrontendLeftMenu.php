<?php

namespace frontend\widgets;

use common\classes\MainMenu;
use common\models\Section;
use Yii;

class FrontendleftMenu extends MainMenu
{
    public $sectionId;
    public function run()
    {
        FrontendLeftMenuAsset::register($this->view);

        parent::run();
    }

    public function init()
    {
        parent::init();

        $this->items = $this->getItems();
    }

    public function getItems()
    {
        $section = $this->section();
        $level = $section->getLevel();

        if($level < 3) {
            return Section::getItemsSectionForFrontendLeftMenu($this->sectionId);
        }

        if($level === 3) {
            $section = Section::findOne(['id' => $this->sectionId]);

            return Section::getItemsSectionForFrontendLeftMenu($section->parent_id);
        }

        return [];
    }

    private function section()
    {
        return Section::findOne($this->sectionId);
    }

}