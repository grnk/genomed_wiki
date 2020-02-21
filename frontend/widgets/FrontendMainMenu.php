<?php

namespace frontend\widgets;

use common\classes\MainMenu;
use common\models\Section;

class FrontendMainMenu extends MainMenu
{
    public function run()
    {
        FrontendMainMenuAsset::register($this->view);

        parent::run();
    }

    public function init()
    {
        parent::init();

        $this->items = $this->getItems();
    }

    public function getItems()
    {
        return Section::getItemsSectionForFrontendMainMenu();
    }

}