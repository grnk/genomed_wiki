<?php

namespace frontend\widgets;

use common\models\Section;
use kartik\nav\NavX;

class FrontendLeftMenu extends NavX
{
    public $sectionId;

    private $section;

    public function init()
    {
        parent::init();

        $this->section = $this->section();

        $this->items = $this->getItems();
    }

    public function run()
    {
        FrontendLeftMenuAsset::register($this->view);

        parent::run();
    }

    public function getItems()
    {
        if($this->section() === null) {
            return [];
        }

        return Section::getItemsSectionForFrontendLeftMenu($this->section->id);
    }

    private function section()
    {
        $section = Section::findOne($this->sectionId);

        if(!$section) {
            return null;
        }

        $level = $section->getLevel();

        if($level < 3) {
            return $section;
        } elseif ($level === 3) {
            return $section->parent;
        }

        return null;
    }

}